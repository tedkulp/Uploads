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
if( !$this->CheckPermission('Manage Uploads') && !$this->CheckPermission('Upload Files to Uploads'))
  {
    return;
  }

// check things out
if (!isset ($params['upload_id']))
  {
    $smarty->assign ('message', $this->Lang ('error_noid'));
    $smarty->assign ('error', 1);
    echo $this->ProcessTemplate ('editupload.tpl');
    return;
  }

// get the info from the database (for this file)
$row = $this->GetUploadDetails($params['upload_id']);
if (!$row)
  {
    $smarty->assign ('message', $this->Lang ('error_dberror'));
    $smarty->assign ('error', 1);
    echo $this->ProcessTemplate ('editupload.tpl');
    return;
  }

// Get the filename and extension of this file
$fileextension = strtolower(strrchr($row['upload_name'],'.'));
$can_gen_thumbnail = 0;
{
  $thumb_ext_arr = explode(",",
													 $this->GetPreference('autothumbnail_extensions'));
  foreach( $thumb_ext_arr as $thumb_ext )
    {
      if( ".".$thumb_ext == $fileextension )
				{
					$can_gen_thumbnail = 1;
					break;
				}
    }
}

// and the category info for this category
$catpath = $this->getCategoryPathFromID($row['upload_category_id']);

// get the category list
$categorylist = array ();
{
	$query =
		"SELECT * FROM ".cms_db_prefix ().
		"module_uploads_categories ORDER BY upload_category_name ASC";
	$dbresult = $db->Execute ($query);
	if (!$dbresult)
		{
			$smarty->assign ('error', 1);
			$smarty->assign ('message', $this->Lang ('error_nocategories'));
		}
	else
		{
			// this could probably be done with a for_each, but what the hell
			while ($row2 = $dbresult->FetchRow ())
				{
					$categorylist[$row2['upload_category_name']] =
						$row2['upload_category_id'];
				}
		}
}

// get custom field info.
$fields = array();
{
  $query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fielddefs ORDER BY iorder';
  $tfields = $db->GetArray($query);

	$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fieldvals WHERE upload_id = ?';
	$tmp = $db->GetArray($query,array($params['upload_id']));
	$tvals = cge_array::to_hash($tmp,'fld_id');

  for( $i = 0; $i < count($tfields); $i++ )
    {
      $tfields[$i]['attrib'] = unserialize($tfields[$i]['attribs']);
      unset($tfields[$i]['attribs']);
			if( is_array($tvals) && isset($tvals[$tfields[$i]['id']]) )
				{
					$tfields[$i]['value'] = $tvals[$tfields[$i]['id']]['value'];
				}
      
      switch($tfields[$i]['type'])
				{
				case 'textarea':
					$tfields[$i]['input'] = 
						$this->CreateTextArea(isset($tfields[$i]['attrib']['usewysiwyg']) && $tfields[$i]['attrib']['usewysiwyg'] == 1 &&
																	$this->GetPreference('allow_comment_wysiwyg',0),
																	$id,
																	$tfields[$i]['value'],
																	'field_'.$tfields[$i]['id']);
					break;
				case 'dropdown':
				case 'multiselect':
					if( isset($tfields[$i]['attrib']['options']) )
						{
							$tmp = explode("\n",$tfields[$i]['attrib']['options']);
							$tmp2 = array();
							foreach( $tmp as $one )
								{
									$key = $value = $one;
									if( strpos($one,'=') !== FALSE )
										list($key,$value) = explode('=',trim($one),2);
									$tmp2[trim($value)] = trim($key);
								}
							$tfields[$i]['attrib']['options'] = $tmp2;
						}
					break;
				}
      
      $fields[$tfields[$i]['id']] = $tfields[$i];
    }
}

// populate the template
$smarty->assign ("startform",
		 $this->CreateFormStart ($id, 'do_editupload', $returnid, 'post', 'multipart/form-data'));
// todo check this to see if there are spaces in the name
$addtext_thumbnail = 'title="'.$this->Lang('title_create_thumbnail').'"';
// $smarty->assign ('fix',
// 		 $this->CreateInputSubmit ($id, 'fix', $this->Lang('fixme')));
$smarty->assign ('thumbnail',
		 $this->CreateInputSubmit ($id, 'thumbnail', 
					   $this->Lang('create_thumbnail'),
					   $addtext_thumbnail));
$smarty->assign ('submit',
		 $this->CreateInputSubmit ($id, 'submit', $this->Lang('submit')));
$smarty->assign ('cancel',
		 $this->CreateInputSubmit ($id, 'cancel', $this->Lang('cancel')));
$smarty->assign ('endform', $this->CreateFormEnd ());
if( count($fields) )
	{
		$smarty->assign('fields',$fields);
	}

$smarty->assign ('title', $this->Lang ('editupload'));    
$smarty->assign ('prompt_uploadname', $this->Lang('name'));
$smarty->assign ('input_uploadname', 
		 $this->CreateInputText($id,'input_uploadname',
					$row['upload_name'], 20, 255 ));
// thumbnail?
$tnfile = $this->_categoryPath( $catpath.DIRECTORY_SEPARATOR.$row['upload_thumbnail'] );
if( file_exists( $tnfile ) )
	{
		$config = $gCms->GetConfig();
		$tnurl = $config['uploads_url']."/".$catpath.'/'.$row['upload_thumbnail'];
		$smarty->assign ('prompt_thumbnail', $this->Lang('thumbnail').':');
		$smarty->assign ('prompt_newthumbnail', $this->Lang('newthumbnail').':');
    $smarty->assign( 'input_newthumbnail',
										 $this->CreateFileUploadInput($id,'input_newthumbnail','',50) );
		$smarty->assign('thumb_url',$tnurl);
    $smarty->assign ('pic_thumbnail', '<img src="'.$tnurl.'" border="0"/>');
  }
$smarty->assign ('namemessage', $this->Lang('renamemessage'));
$smarty->assign ('prompt_uploaddate', $this->Lang('dateuploaded'));
$smarty->assign ('data_uploaddate', $row['upload_date']);
$smarty->assign ('prompt_uploadsize', $this->Lang('sizekb'));
$smarty->assign ('data_uploadsize', intval($row['upload_size'] / 1024.0 + 0.5));
$smarty->assign ('prompt_uploadauthor', $this->Lang('author'));
$smarty->assign ('input_uploadauthor', 
		 $this->CreateInputText($id, 'input_uploadauthor',
					$row['upload_author'], 20, 255));
$smarty->assign ('prompt_movecategory', $this->Lang ('prompt_categoryname'));
$smarty->assign ('input_movecategory',
		 $this->CreateInputDropDown ($id, "input_movecategory", $categorylist, -1,
					     $row['upload_category_id']));
$smarty->assign ('pathmessage', $this->Lang('pathmessage'));

$smarty->assign ('prompt_uploadsummary', $this->Lang ('summary'));
$smarty->assign ('input_uploadsummary',
		 $this->CreateInputText ($id, 'input_uploadsummary',
					 $row['upload_summary'], 80, 255));

$smarty->assign ('prompt_uploaddesc', $this->Lang ('description'));
$smarty->assign ('input_uploaddesc',
		 $this->CreateTextArea (false, $id, $row['upload_description'], 'input_uploaddesc' ));

$smarty->assign ('hidden',
		 $this->CreateInputHidden ($id, 'upload_id',$params['upload_id']).
		 $this->CreateInputHidden ($id, 'category_id',$params['category_id']));
    
// populate the rows of download information
$query = "SELECT * FROM ".cms_db_prefix()."module_uploads_downloads WHERE file_id = ?";
$dbresult = $db->Execute( $query, array( $params['upload_id'] ) );

$smarty->assign('datetext', $this->Lang('date'));
$smarty->assign('iptext', $this->Lang('ip_address'));
$smarty->assign('usertext', $this->Lang('username'));
$rowarray = array();
$rowclass = 'row1';
while( $row = $dbresult->FetchRow() )
  {
    $onerow = new stdClass();
    $onerow->date = $row['download_date'];
    $onerow->ip   = $row['download_ip'];
    $onerow->user = $row['download_user'];
    $onerow->rowclass = $rowclass;			     

    array_push( $rowarray, $onerow);
    ($rowclass == "row1" ? $rowclass = "row2" : $rowclass = "row1");
  }

$smarty->assign ('items', $rowarray);
$smarty->assign ('itemcount', count($rowarray));

echo $this->ProcessTemplate ('editupload.tpl');

// EOF
?>
