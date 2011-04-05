<?php
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
# Author: Robert Campbell <rob@techcom.dyndns.org>
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http:	//www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------

$pageid = $this->GetPreference('getfile_resultpage');
if( $pageid <= 0 || $returnid <= 0 )
  {
    $contentops =& $gCms->GetContentOperations();
    $pageid = $contentops->GetDefaultContent();
  }
if( $pageid >= 0 )
  {
    $returnid = $pageid;
  }


if( !isset($params['upload_id']) && !isset($params['url_key']) )
  {
    cge_redirect::redirect_with_error($returnid,$this->Lang ('error_insufficientparams','upload_id'));
    return;
  }


// get the id
$file_details = '';
$file_id = '';
$url_key = '';
if( isset($params['upload_id']) )
  {
    $file_id = (int)$params['upload_id'];
  }
else if( isset($params['url_key']) )
  {
    $url_key = trim($params['url_key']);
    $now = $db->DbTimeStamp(time());
    $query = 'SELECT * FROM '.cms_db_prefix()."module_uploads_timelimit
               WHERE url_key = ? AND ((expires > $now) OR (expires IS NULL))";
    $timelimit_details = $db->GetRow($query,array($url_key));

    if( !$timelimit_details )
      {
	// bad or expired key
	cge_redirect::redirect_with_error($returnid,
					  $this->Lang ('error_invalid_key'));
	return;
      }
    
    $query = 'SELECT count(file_id) FROM '.cms_db_prefix().'module_uploads_downloads
               WHERE file_id = ? AND url_key = ?';
    $count = $db->GetOne($query,array($timelimit_details['upload_id'],$url_key));
    if( $count >= $timelimit_details['max_downloads'] && $timelimit_details['max_downloads'] > 0 )
      {
	// bad or expired key
	cge_redirect::redirect_with_error($returnid,
					  $this->Lang ('error_invalid_key'));
	return;
      }
    $file_id = $timelimit_details['upload_id'];
  }

$file_details = $this->GetUploadDetails( $file_id, $returnid );
    
// get the details
if( !$file_details['upload_name'] ) 
  {
    // todo display error
    cge_redirect::redirect_with_error($returnid,
				      $this->Lang( 'error_filenotfound', $file_id ) );
    return;
  }

$category_details = $this->_getUploadCategoryDetails( $file_details['upload_category_id'] );
$path = '/';
if( !$category_details['upload_category_path'] ) 
  {
    // todo display error
    cge_redirect::redirect_with_error($returnid,
				      $this->Lang( 'error_dberror' ) );
    return;
  }

    
$file = $this->_uploadPath( $category_details['upload_category_path'],
			    str_replace( array(' ','%20'),array('_','_'),$file_details['upload_name'] ) );
if( !file_exists( $file ) || !is_readable( $file ) )
  {
    cge_redirect::redirect_with_error($returnid,
				      $this->Lang( 'error_filenotfound', $file ) );
    return;
  }


// check for permission, if FEU module exists, and the uploads grouplist is
// not null, and the returnid is not empty (we're on the frontend)
$result = $this->_CheckDownloadSecurity($category_details);
if( !$result )
  {
    cge_redirect::redirect_with_error($returnid,
				      $this->Lang('error_permissiondenied') );
    return;
  }

// turn off zlib compression 
if(ini_get('zlib.output_compression'))
  {
    ini_set('zlib.output_compression', 'Off');
  }

if(!ini_get_boolean('safe_mode'))
  {
    set_time_limit(0);
  }

$chunksize = intval($this->GetPreference('download_chunksize',8)) * 1024;
$bn = basename($file);

$handlers = ob_list_handlers(); 
for ($cnt = 0; $cnt < sizeof($handlers); $cnt++) { ob_end_clean(); }
//     @ob_clean();
//     @ob_clean();
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private',false);
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=\"$bn\"" );
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));

$handle=fopen($file,'rb');
$contents = '';
do {
  $data = fread($handle,$chunksize);
  if( strlen($data) == 0 ) break;
  print($data); 
 } while(true);
fclose($handle);

// now to add the download shtuff to the database
// if we are not excluding this subnet
$subnets = split(",",$this->GetPreference("subnet_exclusion"));
$test = 0;
foreach($subnets as $subnet)
{
  $test = $this->_testip( $subnet, getenv("REMOTE_ADDR" ) );
  if( $test )
    {
      // don't allow any more processing
      exit();
    }
}

// get a new value from the sequence database
$db =& $this->GetDb();
$newid = $db->GenID( cms_db_prefix()."module_uploads_downloads_seq" );

// get a username
$username = 'anonymous';
$feusers = $this->GetModuleInstance('FrontEndUsers');
if( $feusers )
  {
    $name = $feusers->LoggedinName();
    if( $name != "" )
      {
	$username = $name;
      }
  }

// insert the download record
$query = "INSERT INTO ".cms_db_prefix()."module_uploads_downloads 
           (download_id, file_id, download_date, download_ip, download_user, url_key)
          VALUES (?,?,?,?,?,?)";
$dbresult = $db->Execute( $query, 
			  array( $newid, 
				 $file_id, 
				 trim($db->DBTimeStamp(time()),"'"),
				 getenv("REMOTE_ADDR"), 
				 $username,
				 $url_key) );
/* I would normally display an error message, but don't want people to necessarily know I am tracking them */
$this->Audit( 0, $this->lang('friendlyname'),
	      $this->lang('downloaded', $file) );

// send an event
$parms = array();
$parms['id'] = $file_id;
$parms['name'] = $file;
$parms['ip'] = getenv("REMOTE_ADDR");
$this->SendEvent( 'OnDownload', $parms );

// don't allow any more processing
exit();
?>
