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

// Note: This file is virtually identical to action.getfile.php
// and this should be optimized

if( !isset( $params['upload_id'] ) )
  {
    // todo, add something to an error log
    return;
  }

// get the id
$file_id = $params['upload_id'];

// get the details
$file_details = $this->GetUploadDetails( $file_id );
if( !$file_details['upload_name'] ) 
  {
    // todo display error
    return;
  }
$category_details = $this->_getUploadCategoryDetails( $file_details['upload_category_id'] );
$path = '/';
if( !$category_details['upload_category_path'] ) 
  {
    // todo display error
    return;
  }


$file = $this->_uploadPath( $category_details['upload_category_path'],
			    str_replace( array(' ','%20'),array('_','_'),$file_details['upload_name'] ) );

if( !file_exists( $file ) || !is_readable( $file ) )
  {
    // todo display error
    return;
  }

// check for permission, if FEU module exists, and the uploads grouplist is
// not null, and the returnid is not empty (we're on the frontend)
$result = $this->_CheckDownloadSecurity($category_details);
if( !$result )
  {
    // todo, display error somehow
    return;
  }

// turn off zlib compression 
if(@ini_get('zlib.output_compression'))
  {
    @ini_set('zlib.output_compression', 'Off');
  }

if(!@ini_get_boolean('safe_mode'))
  {
    @set_time_limit(0);
  }

$chunksize = intval($this->GetPreference('download_chunksize',8)) * 1024;

$handlers = ob_list_handlers(); 
for ($cnt = 0; $cnt < sizeof($handlers); $cnt++) { ob_end_clean(); }

header('Content-Type: image/*');
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
$username = 'unknown';
$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( $feusers )
  {
    $name = $feusers->LoggedinName();
    if( $name != "" )
      {
	$username = $name;
      }
  }

// insert the download record
$query = "INSERT INTO ".cms_db_prefix()."module_uploads_downloads VALUES (?,?,?,?,?)";
$dbresult = $db->Execute( $query, 
			  array( $newid, $file_id, 
				 trim($db->DBTimeStamp(time()),"'"),
				 getenv("REMOTE_ADDR"), $username) );
/* I would normally display an error message, but don't want people to necessarily know I am tracking them */
$this->Audit( 0, $this->lang('friendlyname'),
	      $this->lang('downloaded', $file) );

// don't allow any more processing
exit();

// EOF
?>