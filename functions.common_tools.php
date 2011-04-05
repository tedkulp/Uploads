<?php // -*- mode:php; c-file-style:linux; tab-width: 2; indent-tabs-mode:t; c-basic-offset: 2; -*-
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
# Version: 1.3.0-beta1, calguy1000
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

  /*---------------------------------------------------------
   AttemptUpload($id, $params, $returnid, $message)
   NOT PART OF THE MODULE API
   
   This is a method to actually try uploading the file
   ensuring it is valid, and then adding the stuff to
   the database.

   Returns an array, first element is success (true/false)
   second element is (if first element is false) an error message,
   or the id of the uploaded file.
   ---------------------------------------------------------*/
function _uploads_AttemptUpload (&$mod, $id, &$params, $returnid)
{
  $fieldname = $id.'input_browse';
  if( isset($params['field_name']) )
    {
      $fieldname = $params['field_name'];
    }

  // check for the filetypes param
  if (isset( $params['file_extensions'] ) )
    {
      $mod->upload_extensions = $params['file_extensions'];
    }

  // check the author
  if (!isset ($params['input_author']))
    {
      return array( FALSE, $mod->Lang('error_invalidauthor') );
    }
    
  // see if there's a key
  $key = null;
  if( isset( $params['input_key'] ) )
    {
      $key = $params['input_key'];
    }

  // validate the upload name
  if( !isset($_FILES[$fieldname]) )
    {
      return array(FALSE,$mod->Lang('error_nofilesuploaded'));
    }

	// handle filename prefix
  $filePrefix = '';
	if( isset($params['prefix']) && $params['prefix'] == 1 )
		{
			$filePrefix = dechex(time()) . "_";
			if (isset($params['prefix_feu']) && $params['prefix_feu'] == 1)
				{
					$filePrefix = $params['input_author'] . "_";
				}
		}

	// handle destination name
	$destname = '';
  if( isset($params['input_destname']) && $params['input_destname'] != '')
    {
      $destname = trim(basename($params['input_destname']));
    }

	// handle replace existing
  $replace_existing = false;
  if( isset( $params['input_replace']) && $params['input_replace'] == 1 )
    {
      $replace_existing = true;
    }

  // check the summary
  if ( !isset($params['input_summary']) || $params['input_summary'] == '' )
    {
      // we'll cheat, if the summary is left as empty
      // we'll use the upload name
      $p = strpos( $destname, '.' );
      if( $p )
				{
					$params['input_summary'] = substr( $destname, 0, $p );
				}
      else
				{
					$params['input_summary'] = $destname;
				}
      //return array( FALSE, $mod->Lang('error_invalidsummary') );
    }

  // check the category
  $db =& $mod->GetDb();
  $dbresult = "";
  $row = array();
  $category_id = 0;
  if (isset( $params['category_id'] ) )
    {
      $category_id = $params['category_id'];
      $query =
	"SELECT upload_category_id, upload_category_name, upload_category_path FROM ".cms_db_prefix().
	"module_uploads_categories WHERE upload_category_id = ?";
      $dbresult = $db->Execute ($query, array ($category_id));
    }
  else if (isset ($params['category']))
    {
      // get the category info given it's name
      $query =
	"SELECT upload_category_id, upload_category_name, upload_category_path FROM ".cms_db_prefix().
	"module_uploads_categories WHERE upload_category_name = ?";
      $dbresult = $db->Execute ($query, array ($params['category']));
    }
  if (!$dbresult)
    {
      return array( FALSE, $mod->Lang('error_invalidcategory') );
    }
  $row = $dbresult->FetchRow ();
  if( !$row )
    {
      return array( FALSE, $mod->Lang('error_invalidcategory') );
    }
  $category_id = $row['upload_category_id'];
  $category_name = $row['upload_category_name'];
 
  // now do the upload, hopefully
  // first the file itself.
  $dir = $mod->_categoryPath($row['upload_category_path']);
  $result = $mod->_handleUpload ($dir,
																 $fieldname,
																 false,
																 $destname,
																 true,
																 $replace_existing,
																 $filePrefix);
  if (!$result[0])
    {
      return array( FALSE, $result[1] );
    }
  $destname = $result[1]['name'];
	
	// see about watermarking
	if( $mod->GetPreference('autowatermark',0) )
		{
			$srcname = cms_join_path($dir,$destname);
			$wmname = cms_join_path($dir,'wm_'.$destname);

			$wmobj = cge_setup::get_watermarker();
			$res = $wmobj->create_watermarked_image($srcname,$wmname);
			
			if( FALSE !== $res )
				{
					@unlink($srcname);
					@rename($wmname,$srcname);
				}
		}


  // check for an existing database entry
  $query = "SELECT upload_id FROM ".cms_db_prefix()."module_uploads WHERE upload_name = ? AND
			upload_category_id = ?";
  $tmp_id = $db->GetOne($query, array( $destname, $category_id ) );

  $fileid = '';
  if( $replace_existing === false && $tmp_id )
    {
      return array( FALSE, $mod->Lang('error_fileexists') );
    }
  else if ($tmp_id)
    {
      // we're allowing overwrite
      $fileid = $tmp_id;
      $replace_existing = true;

      // delete field definitions.
      $query = 'DELETE FROM '.cms_db_prefix().'module_uploads_fieldvals WHERE upload_id = ?';
      $db->Execute($query,array($tmp_id));      
    }
 	       

  // create a new upload id here.
  if( $fileid == '' )
    {
      $newid = $db->GenID (cms_db_prefix ()."module_uploads_seq");
    }

  // and then maybe the thumbnail
  $thumb_name = '';
  if( isset( $_FILES[$id.'input_thumbnail']['name'] ) &&
      $_FILES[$id.'input_thumbnail']['name'] != '' && 
      $_FILES[$id.'input_thumbnail']['size'] > 0)
    {

      {
				// build the thumbnail name
				$thumb_extension = strtolower(strrchr($_FILES[$id.'input_thumbnail']['name'],'.'));
				$fileextension = strtolower(strrchr($destname,'.'));
				$filenamewoext = substr($destname,0,strlen($destname)-strlen($fileextension));
				$thumb_name = 'thumb_'.$filenamewoext.$thumb_extension;
      }

      $fid = $fileid;
      if( $fid == '' )
	{
	  $fid = $newid;
	}
      $result2 =
				$mod->_handleUpload ($dir,
														 $id.'input_thumbnail',false,
														 $thumb_name,
														 false,
														 $replace_existing,
														 $filePrefix);
      if (!$result2[0])
	{
	  // uh-oh, the second upload failed.... now we've gotta 
	  // delete the first file to avoid any corruption
	  // todo
	  unlink( $result[1]['dir'].DIRECTORY_SEPARATOR.$result[1]['name'] );
	  return array( FALSE, $result2[1] );
	}
    }
  else 
    {
      // see if we can auto-create a thumbnail
      if( $mod->GetPreference('autothumbnail_extensions') != '' &&
	  $mod->GetPreference('autothumbnail_size') != '' )
	{
	  $fid = $fileid;
	  if( $fid == '' )
	    {
	      $fid = $newid;
	    }

	  $fileextension = strtolower(strrchr($destname,'.'));
	  $thumb_ext_arr = explode(",",
				   $mod->GetPreference('autothumbnail_extensions'));

	  foreach( $thumb_ext_arr as $thumb_ext )
	    {
	      if( ".".$thumb_ext == $fileextension )
		{
		  // woohoo, we can create a thumbnail
		  $dest = $dir.DIRECTORY_SEPARATOR.'thumb_'.$destname;
		  $src  = $dir.DIRECTORY_SEPARATOR.$destname;
		  $thumb_name = 'thumb_'.$destname;
		  $mod->imageTransform($src,$dest,
					$mod->GetPreference('autothumbnail_size'));
		  break;
		}
	    }
	}
    }

  // apparently the upload succeeded, now we have to log it
  $desc = "";
  if( isset( $params['input_description'] ) )
    {
      $desc = $params['input_description'];
    }

  $audit_msg = '';
  if( $fileid == '' )
    {
      $query =
    	"INSERT INTO ".cms_db_prefix ()."module_uploads 
           (upload_id,upload_category_id,upload_name,upload_author,
            upload_summary,upload_description,upload_ip,upload_size,
            upload_date, upload_key, upload_thumbnail)
           VALUES (?,?,?,?,?,?,?,?,?,?,?)";
      $dbresult =
				$db->Execute ($query,
											array ($newid,
														 $row['upload_category_id'],
														 $destname, 
														 $params['input_author'],
														 $params['input_summary'],
														 $desc,
														 getenv ("REMOTE_ADDR"), 
														 $result[1]['size'],
														 trim($db->DBTimeStamp (time ()),"'"),
														 $key,
														 $thumb_name
			     ));
      $audit_msg = $mod->lang('uploaded', array($destname, $params['input_author']));
    }
  else
    {
      $query = "UPDATE ".cms_db_prefix()."module_uploads
           SET upload_name = ?, upload_author = ?,
               upload_summary = ?, upload_description = ?,
               upload_ip = ?, upload_size = ?, upload_date = ?,
               upload_key = ?, upload_thumbnail = ?
           WHERE upload_id = ?";
      $dbresult =
				$db->Execute( $query,
											array( $destname,
														 $params['input_author'],
														 $params['input_summary'],
														 $desc,
														 getenv( "REMOTE_ADDR" ),
														 $result[1]['size'],
														 trim($db->DBTimeStamp(time()),"'"),
														 $key,
														 $thumb_name,
														 $fileid));
			
      $newid = $fileid;
      $audit_msg = $mod->lang('replaced', $destname, $params['input_author']);
    }
	if( !$dbresult )
		{
      return array( FALSE, $mod->Lang('error_dberror') );
		}

  // do custom fields.
  $iquery = 'INSERT INTO '.cms_db_prefix().'module_uploads_fieldvals 
                 (upload_id, fld_id, value) VALUES (?,?,?)';
  foreach( $params as $key => $value )
    {
      if( !startswith($key,'field_') )
	{
	  continue;
	}

      $field_id = (int)substr($key,6);
      if( is_array( $value ) )
	{
	  $value = implode(',',$value);
	}
      $db->Execute($iquery,array($newid,$field_id,$value));
    }

  $mod->Audit( 0, $mod->lang('friendlyname'),$audit_msg );

  // that should do the trick
  // now maybe we'll send an email
  $to_address = $mod->GetPreference('send_upload_notifications_to');
  if( $to_address && $to_address != '' )
    {
      // fill out the template, and send an email
      $cmsmailer = $mod->GetModuleInstance( 'CMSMailer' );
      if( !$cmsmailer )
	{
	  // we're not gonna return an error, but put
	  // a message into the admin log
	  $mod->Audit( 0, $mod->Lang('friendlyname'),
			$mod->Lang('error_nomailermodule'));
	}
      else
	{
	  $mod->smarty->assign('name', $destname );
	  $mod->smarty->assign('size', $result[1]['size'] );
	  $mod->smarty->assign('summary', $params['input_summary'] );
	  $mod->smarty->assign('description', $desc );
	  $mod->smarty->assign('author', $params['input_author'] );
	  $mod->smarty->assign('ip_address', getenv ("REMOTE_ADDR") );
	  $body = $mod->ProcessTemplateFromDatabase('upload_emailtemplate');
	  $tmp = explode(',',$to_address);
	  foreach( $tmp as $one )
	    {
	      $cmsmailer->AddAddress( $one );
	    }
	  $cmsmailer->SetBody( $body );
	  $cmsmailer->IsHTML(true);
	  $cmsmailer->SetSubject($mod->Lang('upload_notification'));
	  $cmsmailer->Send();
	}
    }


  // update search words
  $search =& $mod->GetModuleInstance('Search');
  if ($search != FALSE)
    {
      $str = $destname.' '.$params['input_author'].' '.
				$params['input_summary'].' '.$desc;
      $search->AddWords( $mod->GetName(), $newid, 'upload', $str );
    }

  // send an event
  $parms = array();
  $parms['category'] = $category_name;
  $parms['name'] = $destname;
  $parms['size'] = $result[1]['size'];
  $parms['summary'] = $params['input_summary'];
  $parms['description'] = $desc;
  $parms['author'] = $params['input_author'];
  $parms['ip_address'] = getenv("REMOTE_ADDR");
  $mod->SendEvent( "OnUpload", $parms );

  if( $fileid == '' )
    {
      return array( TRUE, $newid, $destname );
    }
  return array( TRUE, $fileid, $destname );
}


  /*---------------------------------------------------------
   _handleUpload( $destDir, fieldName, $nameCallbac )
   NOT PART OF THE MODULE API

   This method handles validating the upload parameters, and copying
   the file from it's temporary location to it's permanent location.
   ---------------------------------------------------------*/
function _uploads_handleUpload (&$mod, $destDir, 
																$fieldName = '_upload', $nameCallback = false,
																$destname = '',$enforceextension = true,
																$replace_existing = false,
																$filenamePrefix)
{
  //make sure something is there
  if (!isset ($_FILES[$fieldName]) || !isset ($_FILES)
      || !is_array ($_FILES[$fieldName]) || !$_FILES[$fieldName]['name'])
    {
      return array (false, $mod->Lang('error_nofilesuploaded'));
    }

  //normalize the file variable
  $file = $_FILES[$fieldName];
  if (!isset ($file['type']))
    $file['type'] = '';
  if (!isset ($file['size']))
    $file['size'] = '';
  if (!isset ($file['tmp_name']))
    $file['tmp_name'] = '';
  $file['name'] =
    preg_replace('/[^a-zA-Z0-9\.\$\%\'\`\-\@\{\}\~\!\#\(\)\&\_\^]/', '',
		 str_replace (array (' ', '%20'), array ('_', '_'), $file['name']));

  // validate the filename
  if (!$mod->_isValidFilename ($file['name']))
    {
      return array (false, $mod->Lang ('error_invaliduploadfilename',$file['name']));
    }

  //was it to big?
	global $gCms;
	$maxFileSize = $gCms->config['max_upload_size'];
  if ($file['size'] > $maxFileSize)
    return array (false, $mod->Lang ('error_filetoolarge'));

  //normalize destDir
  if (strlen ($destDir) > 0 && $destDir[strlen ($destDir) - 1] != "/")
    $destDir = $destDir.'/';

  // get the destination name
  if( $destname == '' ) {
    $destname = $file['name'];
  }
	// and optionally add a prefix
	$destname = $filenamePrefix.$destname;
    
  //should we change the filename via a callback?
  if ($nameCallback)
    {
      $destname =
				call_user_func_array ($nameCallback, array ($file, $destDir));
    }

  // and clean it up
  $destname = 
    preg_replace('/[^a-zA-Z0-9\.\$\%\'\`\-\@\{\}\~\!\#\(\)\&\_\^]/', '',
		 str_replace (array (' ', '%20'), array ('_', '_'), $destname));

  if( $replace_existing == false )
    {
      if( file_exists( $destDir.$destname ) && $replace_existing == false ) {
	return array( false, $mod->Lang( 'error_fileexists', $destDir.$destname ));
      }
    }
  else
    {
      // replacing an existing file
      // delete it first, so the copy will succeed.
      @unlink($destDir.$destname);
    }

  //and now the big moment
  if (!@copy ($file['tmp_name'], $destDir.$destname))
    {
      return array (false,
		    $mod->Lang ('error_couldnotwrite').
		    ':&nbsp;'.$file['name']." -> ".$destDir . $destname . " ".
		    $mod->Lang ('error_permissiondenied'));
    }
  else
    {
      return array (true, array('name' => $destname, 'size' => $file['size'],
				'dir' => $destDir ));
    }
}


#
# EOF
#
?>
