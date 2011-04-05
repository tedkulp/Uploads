<?php // -*- mode:php; c-file-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
#-------------------------------------------------------------------------
# Module: Uploads = allow users to upload stuff, a pseudo file manager module
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
if (!$this->CheckPermission ('Manage Uploads')) exit;

$smarty->assign ('title', $this->Lang ('editcategory'));

// check things out
if (!isset ($params['category_id']))
  {
    $smarty->assign ('message', $this->Lang ('error_nocategory'));
    $smarty->assign ('error', 1);
    echo $this->ProcessTemplate ('addcategory.tpl');
    return;
  }

// get the category info from the database (for this category)
$query =
  "SELECT * FROM ".cms_db_prefix ().
  "module_uploads_categories WHERE upload_category_id = ?";
$dbresult = $db->Execute ($query, array($params['category_id']));
if (!$dbresult)
  {
    $smarty->assign ('message', $this->Lang ('error_dberror'));
    $smarty->assign ('error', 1);
    echo $this->ProcessTemplate ('addcategory.tpl');
    return;
  }
$row = $dbresult->FetchRow ();
if (!$row)
  {
    $smarty->assign ('message', $this->Lang ('error_dberror'));
    $smarty->assign ('error', 1);
    echo $this->ProcessTemplate ('addcategory.tpl');
    return;
  }

// populate the template
$smarty->assign ("startform",
								 $this->CreateFormStart ($id, 'do_editcategory', $returnid,
																				 'post','',false,'',$params));
$smarty->assign ('submit',
								 $this->CreateInputSubmit ($id, 'submit', $this->Lang('submit')));
$smarty->assign ('cancel',
								 $this->CreateInputSubmit ($id, 'cancel', $this->Lang('cancel')));    

$addtext_thumbnails = 'title="'.$this->Lang('title_create_thumbnails').'"';
$smarty->assign ('thumbnails',
								 $this->CreateInputSubmit( $id, 'thumbnails', 
																					 $this->Lang('create_thumbnails'),
																					 $addtext_thumbnails ));

$addtext_scan = 'title="'.$this->Lang('title_scan').'"';
$smarty->assign ('scan',
								 $this->CreateInputSubmit( $id, 'scan', 
																					 $this->Lang('scan'),
																					 $addtext_scan));
$smarty->assign ('endform', $this->CreateFormEnd ());

$smarty->assign ('prompt_categoryname', 
								 $this->Lang ('prompt_categoryname'));
$smarty->assign ('input_categoryname', 
								 $this->CreateInputText ($id, 'input_categoryname',
															$row['upload_category_name'], 20, 80));
$smarty->assign ('info_categoryname', $this->Lang('info_categoryname'));
$smarty->assign ('prompt_categorydesc', $this->Lang ('prompt_categorydesc'));
$smarty->assign ('input_categorydesc',
		       $this->CreateInputText ($id, 'input_categorydesc',
					       $row['upload_category_description'], 80, 255));
$smarty->assign ('info_categorydesc', $this->Lang('info_categorydesc'));
$smarty->assign ('prompt_categorypath',$this->Lang ('prompt_categorypath'));
$smarty->assign ('input_categorypath',
		       $this->CreateInputText ($id, 'input_categorypath',
																	 $row['upload_category_path'],
																	 40, 255, 'readonly="readonly"'));
$smarty->assign ('info_categorypath', $this->Lang('info_categorypath'));
$smarty->assign ('prompt_categorylistable', 
								 $this->Lang ('prompt_categorylistable'));
$smarty->assign ('input_categorylistable',
		       $this->CreateInputCheckbox ($id,
						   'input_categorylistable', 1, $row['upload_category_listable']));
$smarty->assign('prompt_categorydeletable',
		$this->Lang ('prompt_categorydeletable'));
$smarty->assign('input_categorydeletable',
		$this->CreateInputCheckbox ($id,
					    'input_categorydeletable',
					    1,$row['upload_category_deletable']));
$smarty->assign('input_category_expires_hrs',
		$this->CreateInputText($id,
													 'input_category_expires_hrs',
													 $row['upload_category_expires_hrs'],3,4));
$smarty->assign('input_category_scannable',
		$this->CreateInputYesNoDropdown($id,'input_category_scannable',
						$row['upload_category_scannable']));

$smarty->assign ('pathmessage', $this->Lang ('cannotmodifypath'));
$smarty->assign ('hidden',
		       $this->CreateInputHidden ($id, 'category_id',
						 $params['category_id']));

$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( $feusers )
  {
    // get a list of the groups in the FrontEndUsers module
    $groups = $feusers->GetGroupList();
		$selgroups = array();
		if( isset($row['upload_category_groups']) && 
				$row['upload_category_groups'] != '' )
			{
				$selgroups = explode(',',$row['upload_category_groups']);
			}
    if( count($groups) > 0 )
      {
				$smarty->assign('prompt_grouplist',$this->Lang('prompt_grouplist'));
				$smarty->assign('input_grouplist',
												$this->CreateInputSelectList($id,'input_grouplist[]',
																										 $groups,$selgroups));
				$smarty->assign('info_grouplist',
												$this->Lang('info_grouplist'));
      }
  }
    
echo $this->ProcessTemplate ('addcategory.tpl');

// EOF
?>