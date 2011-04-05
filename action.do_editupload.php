<?php // -*- mode:php; c-file-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
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
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Manage Uploads') && !$this->CheckPermission('Upload Files to Uploads')) exit;

// make sure we have all the parameters we need
if( !isset($params['upload_id']) ||
    !isset($params['input_uploaddesc']) ||
    !isset($params['input_movecategory']) ) 
  {
    $this->_DisplayErrorPage ($id, $params, $returnid,
															$this->Lang ('error_insufficientparams','upload_id??'));
    return;
  }
   
// now see if we can find the details about this upload
$row = $this->GetUploadDetails($params['upload_id']);
if( !$row ) {
  $this->_DisplayErrorPage ($id, $params, $returnid,
			    $this->Lang ('error_dberror'));
  return;
 }

$newname = $row['upload_name'];
$newcategory = $row['upload_category_id'];
$newauthor = $row['upload_author'];
$newdesc = $row['upload_description'];
$newsummary = $row['upload_summary'];
$newthumb = $row['upload_thumbnail'];

// Get the category path from the category id
$catpath = '';
{
  $q = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories
         WHERE upload_category_id = ?";
  $row2 = $db->GetRow( $q, array($row['upload_category_id']));
  if( !$row2 )
    {
      $this->_DisplayErrorPage ($id, $params, $returnid,
				$this->Lang ('error_dberror'));
      return;
    }

  $catpath = $row2['upload_category_path'];
}

$fromfile = $this->_uploadPath( $catpath, trim($row['upload_name']) );

if( isset($params['cancel']) )
	{
		// operation cancelled
    $this->RedirectToTab($id, 'files', array( 'curcategory' => $params['category_id']) );
	}
else if( isset($params['replace']) )
	{
		// re-upload existing file... but we're not gonna touch the
		// other info (like author..., or the fields).
		$files_key = $id.'replace_file';
		if( !isset($_FILES[$files_key]) || 
				($_FILES[$files_key]['name'] == '') ||
				($_FILES[$files_key]['size'] == 0) ||
				($_FILES[$files_key]['error'] != 0 ) )
			{
				$this->SetError($this->Lang('error_nofilesuploaded'));
				$this->CGRedirect($id,'editupload',$returnid,$params);
			}

		// make sure it's an allowed file type
		$newfileextension = strtolower(strrchr($_FILES[$files_key]['name'],'.'));
		if( !$this->_isValidFilename($_FILES[$files_key]['name']) )
			{
				$this->SetError($this->Lang('error_invaliduploadfilename',
																		$_FILES[$files_key]['name']));
				$this->CGRedirect($id,'editupload',$returnid,$params);
			}

		$fileextension = strtolower(strrchr($fromfile,'.'));
		if( $fileextension != $newfileextension )
			{
				// uhm, you can't replace a file of a different type
				$this->SetError($this->Lang('error_replace_mismatched_fileext'));
				$this->CGRedirect($id,'editupload',$returnid,$params);
			}
		
		// we're all good to go.
		if( file_exists($fromfile) )
			{
				@unlink($fromfile);
			}
		cms_move_uploaded_file( $_FILES[$files_key]['tmp_name'],$fromfile );

		// now, if it's an image file, we may wanna re-create the thumbnail
		$thumb_ext_arr = explode(",",
														 $this->GetPreference('autothumbnail_extensions'));
		foreach( $thumb_ext_arr as $thumb_ext )
			{
				if( '.'.$thumb_ext != $fileextension ) continue;

				// it's an image file.

				// delete any previous thumbnail
				if( !empty($row['upload_thumbnail']) )
					{
						$oldfile = $this->_uploadPath($catpath,$row['upload_thumbnail']);
						@unlink($oldfile);
					}

				// generate new thumbnail
				$thumbname = 'thumb_'.$row['upload_name'];
				$thumbfile = $this->_uploadPath($catpath,$thumbname);
				$this->imageTransform($fromfile,$thumbfile,
															$this->GetPreference('autothumbnail_size'));

				// update the record.
				$thumbname = 'thumb_'.$row['upload_name'];
				$query = 'UPDATE '.cms_db_prefix().'module_uploads
                         SET upload_thumbnail = ?
                       WHERE upload_id = ?';
				$db->Execute($query,array($thumbname,$params['upload_id']));
				break;
				
			}
	}
else if( isset($params['thumbnail']) )
  {
    // we're (re)creating a thumbnail for this image
    $tndir = $this->_categoryPath($catpath);

    global $gCms;
		$fileextension = strtolower(strrchr($row['upload_name'],'.'));
    $dest = $tndir.DIRECTORY_SEPARATOR.'thumb_'.$row['upload_name'];
		$thumb_ext_arr = explode(",",
														 $this->GetPreference('autothumbnail_extensions'));
		foreach( $thumb_ext_arr as $thumb_ext )
			{
				if( ".".$thumb_ext == $fileextension )
					{
						// delete any previous thumbnail
						if( !empty($row['upload_thumbnail']) )
							{
								$oldfile = $tndir.DIRECTORY_SEPARATOR.'thumb_'.$row['upload_thumbnail'];
								if( file_exists($oldfile) )
									{
										@unlink($oldfile);
									}
							}

						// generate it.
						$this->imageTransform($fromfile,$dest,
																	$this->GetPreference('autothumbnail_size'));

						// update the record.
						$newthumb = 'thumb_'.$row['upload_name'];
						$query = 'UPDATE '.cms_db_prefix().'module_uploads
                         SET uploads_thumnail = ?
                       WHERE upload_id = ?';
						$db->Execute($query,array($newthumb,$params['upload_id']));
						break;
					}
			}
    $this->RedirectToTab($id, 'files', array( 'curcategory' => $params['category_id']) );
  }


if( $params['input_movecategory'] != $row['upload_category_id'] ||
    $params['input_uploadname'] != $row['upload_name'] ) {
  // looks like we have to move it
  // get the info for the new category
  $query = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories WHERE upload_category_id = ?";
  $dbresult = $db->Execute( $query, array( $params['input_movecategory'] ) );
  $cat1row = $dbresult->FetchRow();
  if( !$cat1row ) {
    $this->_DisplayErrorPage ($id, $params, $returnid, $this->Lang ('error_dberror'));
    return;
  }

  // and the old category
  $dbresult = $db->Execute( $query, array( $row['upload_category_id'] ) );
  $cat2row = $dbresult->FetchRow();
  if( !$cat2row ) {
    $this->_DisplayErrorPage ($id, $params, $returnid, $this->Lang ('error_dberror'));
    return;
  }
      
  // now we can move the file from directory one to two.
  // if it doesn't already exist in the destination directory
  $tofile   = $this->_uploadPath( $cat1row['upload_category_path'], trim($params['input_uploadname']) );

  // move the file
  if( file_exists( $tofile ) ) {
    $this->_DisplayErrorPage ($id, $params, $returnid, $this->Lang ('error_fileexists',$tofile));
    return;
  }
  if( !rename( $fromfile, $tofile ) ) {
    $this->_DisplayErrorPage ($id, $params, $returnid, $this->Lang ('error_cannotrename'));
    return;
  }

  // and move any thumbnail
	if( !empty($row['upload_thumbnail']) )
		{
			$tn_fromfile = $this->_categoryPath( $cat2row['upload_category_path'].DIRECTORY_SEPARATOR.
																					 $row['upload_thumbnail'] );
			$thumb_ext = strrchr($row['upload_thumbnail'],'.');
			$fn = trim($params['input_uploadname']);
			$tmp = strrpos($fn,'.');
			if( $tmp !== FALSE )
				{
					$fn = substr($fn,0,$tmp);
				}
 			$newthumb = 'thumb_'.$fn.$thumb_ext;
			$catpath = $cat1row['upload_category_path'];
			$tn_tofile   = $this->_categoryPath( $catpath.DIRECTORY_SEPARATOR.
																					 $newthumb);
			// and rename the thumbnail
			@rename( $tn_fromfile, $tn_tofile );
    }

  $newcategory = $params['input_movecategory'];
  $this->Audit( 0, $this->Lang('friendlyname'),
		$this->Lang('movedfile', $fromfile, $tofile ));
 }

if( $params['input_uploaddesc'] != $row['upload_description'] ) {
  $newdesc = trim($params['input_uploaddesc']);
 }
if( $params['input_uploadname'] != $row['upload_name'] ) {
  $newname = trim($params['input_uploadname']);
 }
if( $params['input_uploadsummary'] != $row['upload_summary'] ) {
  $newsummary = trim($params['input_uploadsummary']);
 }
if( $params['input_uploadauthor'] != $row['upload_author'] ) {
  $newauthor = trim($params['input_uploadauthor']);
 }

$query = "UPDATE ".cms_db_prefix()."module_uploads SET
                 upload_name = ?, upload_author = ?,
                 upload_summary = ?, upload_description = ?,
                 upload_category_id = ? ,
                 upload_thumbnail = ?
           WHERE upload_id = ?";
$dbresult = $db->Execute( $query, array( $newname, $newauthor, $newsummary, $newdesc, $newcategory, 
																				 $newthumb, $params['upload_id'] ) );

// delete any existing custom fields
$query = 'DELETE FROM '.cms_db_prefix().'module_uploads_fieldvals 
           WHERE upload_id = ?';
$db->Execute($query,array($params['upload_id']));

// handle new custom field values.
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
	$db->Execute($iquery,array($params['upload_id'],$field_id,$value));
}

$this->Audit( 0, $this->Lang('friendlyname'),
							$this->Lang('edited', $row['upload_name']) );

# allow new thumbnail to be uploaded
$tmp = $id.'input_newthumbnail';
if( isset($_FILES[$tmp]) && !empty($_FILES[$tmp]['name']) &&
		$_FILES[$tmp]['size'] > 0 &&
		$_FILES[$tmp]['error'] == 0 )
	{
		$name = $row['upload_name'];
		$thumb_ext = strrchr($_FILES[$tmp]['name'],'.');
		$file_ext = strrchr($name,'.');
		$fname = substr($name,0,strlen($name)-strlen($file_ext));
		$thumb_name = 'thumb_'.$fname.$thumb_ext;
		$tn_oldfile = $this->_categoryPath( $catpath.DIRECTORY_SEPARATOR.$row['upload_thumbnail']);

		if( file_exists( $tn_oldfile ) )
			{
				@unlink($tn_oldfile);
			}
		$tn_newfile   = $this->_categoryPath( $catpath.DIRECTORY_SEPARATOR.
																				 $thumb_name);
		if( file_exists($tn_newfile) )
			{
				@unlink($tn_newfile);
			}
		cms_move_uploaded_file( $_FILES[$tmp]['tmp_name'],$tn_newfile );

		$query = 'UPDATE '.cms_db_prefix().'module_uploads 
                 SET upload_thumbnail = ?
               WHERE upload_id = ?';
		$db->Execute($query,array($thumb_name,$row['upload_id']));
	}

// update search words.
$search = $this->GetModuleInstance('Search');
if( $search )
	{
		$str = $newname.' '.$newauthor.' '.$newsummary.' '.$newdesc;
		$search->AddWords( $this->Getname(), $row['upload_id'], 'upload', $str);
	}

// done.
$this->RedirectToTab($id, 'files', array( 'curcategory' => $params['category_id']) );

// EOF
?>