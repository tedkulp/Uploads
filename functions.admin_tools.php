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

/*---------------------------------------------------------
  _AdminDoDeleteUpload( $id, $params, $returnid )
 NOT PART OF THE MODULE API
	
 Actually delete an upload from the filesystem and
 from the database.
---------------------------------------------------------*/
function _uploads_AdminDoDeleteUpload (&$module, $upload_id,$unlink_file = FALSE)
{
  // we're gonna put some thought into this... the user
  // has already answered, Yep, We're sure the file exists, don't really care anyways
  // so all we have to do is remove the file, and remove the record from the database.

  // get the info about the upload we're gonna delete
  $db =& $module->GetDb();
  $query = "SELECT upload_id, upload_category_id, upload_name, upload_thumbnail FROM ".cms_db_prefix()."module_uploads WHERE upload_id = ?";
	$uploadrow = $db->GetRow( $query, array( $upload_id ) );
  if( !$uploadrow ) {
		return $module->Lang('error_dberror');
  }

	if( $unlink_file )
		{
			// and the info about it's category
			$query = "SELECT upload_category_path FROM ".cms_db_prefix()."module_uploads_categories 
                 WHERE upload_category_id = ?";
			$categoryrow = $db->GetRow( $query, array( $uploadrow['upload_category_id'] ) );
			if( !$categoryrow ) {
				return $module->Lang('error_dberror');
			}    

			// now build the path
			$file = $module->_uploadPath( $categoryrow['upload_category_path'], $uploadrow['upload_name'] );

			// and delete the file
			@unlink( $file );

			// and the thumbnail if one exists
			if( !empty($uploadrow['upload_thumbnail']) )
				{
					$tnfile = $module->_categoryPath( $categoryrow['upload_category_path'] ).DIRECTORY_SEPARATOR;
					$tnfile .= $uploadrow['upload_thumbnail'];
					@unlink( $tnfile );
				}
		}

	// and any time limited urls
	$query = 'DELETE FROM '.cms_db_prefix().'module_uploads_timelimit WHERE upload_id = ?';
  $dbresult = $db->Execute( $query, array( $uploadrow['upload_id'] ) );

  // and the field values
  $query = 'DELETE FROM '.cms_db_prefix().'module_uploads_fieldvals WHERE upload_id = ?';
  $dbresult = $db->Execute( $query, array( $uploadrow['upload_id'] ) );

  // and the downloads
  $query = "DELETE FROM ".cms_db_prefix()."module_uploads_downloads WHERE file_id = ?";
  $dbresult = $db->Execute( $query, array( $uploadrow['upload_id'] ) );

  // and the record itself.
  $query = "DELETE FROM ".cms_db_prefix()."module_uploads WHERE upload_id = ?";
  $dbresult = $db->Execute( $query, array( $uploadrow['upload_id'] ) );

  // delete the search stuff
  $search =& $module->GetModuleInstance('Search');
  if ($search != FALSE)
    {
      $search->DeleteWords($module->GetName(), $uploadrow['upload_id'], 'upload');
    }    

  // send an event
  $parms = array();
  $parms['id'] = $uploadrow['upload_id'];
  $parms['name'] = $uploadrow['upload_name'];
  $parms['category_id'] = $uploadrow['upload_category_id'];
  $module->SendEvent('OnRemove', $parms );

  // and we're done
  $module->Audit( 0, $module->GetName(),
		$module->lang('deleted', $uploadrow['upload_name']) );

	return false;
}


function _uploads_AdminDoDeleteCategory (&$module, $category_id)
{
	// get the category details
	$category = $module->_getUploadCategoryDetails( $category_id );
	if( !$category ) {
		return $module->Lang('error_categorynotfound');
	}

	// get the files from the category
	$query = 'SELECT upload_id FROM '.cms_db_prefix().'module_uploads 
             WHERE upload_category_id = ?';
	$db =& $module->GetDb();
	$tmp = $db->GetOne($query,array($category_id) );
	if( $tmp )
		{
			return $module->Lang('error_categorynotempty');
		}

	$dir = $module->_categoryPath( $category['upload_category_path'] );
	cge_dir::recursive_rmdir($dir);
	
	if( file_exists($dir) )
		{
			return $module->Lang('error_delete',$dir);
		}


	// delete the category from the db
	$db =& $module->GetDb();
	$query = "DELETE FROM ".cms_db_prefix()."module_uploads_categories WHERE upload_category_id = ?";
	$dbresult = $db->Execute( $query, array( $category_id ) );
	
	// send an event
	$parms[] = array();
	$parms['name'] = $category['upload_category_name'];
	$parms['path'] = $category['upload_category_path'];
	$module->SendEvent('OnDeleteCategory',$parms);
		
	// and we're done
	return FALSE;
}


function _uploads_CopyCategory(&$module,$orig_category_id,$dest_name,$dest_path,$dest_desc,$copyfiles,$edit_desc = true)
{
	global $gCms;
	$config = $gCms->GetConfig();

	// get the original category
	$orig_category = Uploads::load_category_by_id($orig_category_id);
	if( !$orig_category )
		{
			return $module->Lang('error_categorynotfound');
		}
	$dest_category = $orig_category;

	if( empty($dest_name) )
		{
			return $module->Lang('error_missing_invalid','name');
		}
	if( empty($dest_path) )
		{
			return $module->Lang('error_missing_invalid','path');
		}
	$tmp = Uploads::getCategoryFromName($dest_name);
	if( is_array($tmp) )
		{
			return $module->Lang('error_categoryexists2',$dest_name);
		}
	$tmp2 = Uploads::category_path_in_use($dest_path);
	if( $tmp2 )
		{
			return $module->Lang('error_pathinuse2',$dest_path);
		}

	$srcdir = cms_join_path($config['uploads_path'],$orig_category['upload_category_path']);
	$destdir = cms_join_path($config['uploads_path'],$dest_path);
	if( file_exists($destdir) )
		{
			return $module->Lang('error_fileexists',$destdir);
		}
	if( !file_exists($srcdir) )
		{
			return $module->Lang('error_filenotfound',$srcdir);
		}

	$dest_category['upload_category_name'] = $dest_name;
	$dest_category['upload_category_path'] = $dest_path;
	if( $edit_desc )
		$dest_category['upload_category_description'] = $dest_desc;

	global $gCms;
	$db =& $gCms->GetDb();
	$catid =
		$db->GenID (cms_db_prefix ()."module_uploads_categories_seq");

	$query = 'INSERT INTO '.cms_db_prefix().'module_uploads_categories
               (upload_category_id,upload_category_name,
                upload_category_description,upload_category_path,
                upload_category_listable,upload_category_groups,
                upload_category_deletable)
              VALUES (?,?,?,?,?,?,?)';
	$dbr = $db->Execute($query,
											array($catid,
														$dest_category['upload_category_name'],
														$dest_category['upload_category_description'],
														$dest_category['upload_category_path'],
														$dest_category['upload_category_listable'],
														$dest_category['upload_category_groups'],
														$dest_category['upload_category_deletable']));

	if( !$dbr )
		{
			return $module->Lang('error_dberror');
		}

	@mkdir($destdir, 0777, true);
	if( !file_exists($destdir) )
		{
			$query = 'DELETE FROM '.cms_db_prefix().'module_uploads_categories
                 WHERE upload_category_id = ?';
			$db->Execute($query,array($catid));
			return $module->Lang('error_cantcreatedirectory'.': '.$destdir);
		}
	if( $module->GetPreference('create_dummy_index_html') )
		{
			@touch( $destdir.DIRECTORY_SEPARATOR."index.html" );
		}


	// send an event
	$parms = array();
	$parms['name'] = $dest_category['upload_category_name'];
	$parms['description'] = $dest_category['upload_category_description'];
	$parms['path'] = $dest_category['upload_category_path'];
	$parms['listable'] = $dest_category['upload_category_listable'];
	$parms['deletable'] = $dest_category['upload_category_deletable'];
	$module->SendEvent( 'OnCreateCategory', $parms );

	$error = array();
	if( $copyfiles )
		{
				// now copy the files.
			$author = $_SESSION['cms_admin_username'];
			$now = $db->DbTimeSTamp(time());
			$file_records = Uploads::get_category_file_list( $orig_category_id );
			$iquery = 'INSERT INTO '.cms_db_prefix()."module_uploads
                    (upload_id,upload_category_id,upload_name,
                     upload_author,upload_summary,upload_description,
                     upload_ip,upload_size,upload_date,
                     upload_key,upload_thumbnail)
                   VALUES(?,?,?,?,?,?,?,?,$now,?,?)";
				
			if( !is_array($file_records) )
				{
					break;
				}

			for( $i = 0; $i < count($file_records); $i++ )
				{
					if( !empty($error) ) break;
					
					$did_copy_thumb = false;
					$destthumb = '';
					$onerec =& $file_records[$i];
					
					// get the file path
					$srcfile = cms_join_path($srcdir,$onerec['upload_name']);
					$destfile = cms_join_path($destdir,$onerec['upload_name']);
					
					// copy the file
					copy($srcfile,$destfile);
					
					// check for a thumbnail
					$srcthumb = cms_join_path($srcdir,'thumb_'.$onerec['upload_name']);
					$destthumb = cms_join_path($destdir,'thumb_'.$onerec['upload_name']);
					if( file_exists($srcdir) )
						{
							// copy it
							$destthumb = cms_join_path($destdir,'thumb_'.$onerec['upload_name']);
							copy($srcthumb,$destthumb);
							$did_copy_thumb = true;
						}
						
					// generate a new file id
					$file_id =
						$db->GenID (cms_db_prefix ()."module_uploads_seq");
						
					// alter the record
					$onerec['upload_id'] = $file_id;
					$onerec['upload_category_id'] = $catid;
					$onerec['upload_author'] = $author;
					$onerec['upload_ip'] = null;

					// insert it.
					$dbr = $db->Execute($iquery,
															array($file_id,
																		$onerec['upload_category_id'],
																		$onerec['upload_name'],
																		$onerec['upload_author'],
																		$onerec['upload_summary'],
																		$onerec['upload_description'],
																		$onerec['upload_ip'],
																		$onerec['upload_size'],
																		$onerec['upload_key'],
																		$onerec['upload_thumbnail']));
						
					// on error delete files.
					if( !$dbr )
						{
							@unlink($destfile);
							@unlink($destthumb);
							if( !is_array($error) )
								{
									$error = array();
								}
							$error[] = $module->Lang('error_dberror');
						}
				}
		} // copy files

	if( !$error )
		{
			return $error;
		}
	return FALSE;
}


#
# EOF
#
?>
