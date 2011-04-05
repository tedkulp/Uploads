<?php
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

if( !$this->CheckPermission ('Manage Uploads') )
  {
    return;
  }

// populate the template
$smarty->assign ('title', $this->Lang ('addcategory'));
$smarty->assign ('startform',
		 $this->CreateFormStart ($id,
					 'do_addcategory',
					 $returnid));
$smarty->assign ('endform', $this->CreateFormEnd ());
$smarty->assign ('submit',
		 $this->CreateInputSubmit ($id, 'submit',
					   $this->Lang('submit')));
$smarty->assign ('cancel',
		 $this->CreateInputSubmit ($id, 'cancel',
					   $this->Lang('cancel')));

$smarty->assign ('prompt_categoryname',
		 $this->Lang ('prompt_categoryname'));
$smarty->assign ('input_categoryname',
		 $this->CreateInputText ($id, 'input_categoryname',
					 "", 20, 80));
$smarty->assign ('info_categoryname', $this->Lang('info_categoryname'));
$smarty->assign ('prompt_categorydesc',  $this->Lang ('prompt_categorydesc'));
$smarty->assign ('input_categorydesc',
		 $this->CreateInputText ($id, 'input_categorydesc',
					 "", 80, 255));
$smarty->assign ('info_categorydesc', $this->Lang('info_categorydesc'));
$smarty->assign ('prompt_categorypath',
		 $this->Lang ('prompt_categorypath'));
$smarty->assign ('input_categorypath',
		 $this->CreateInputText ($id, 'input_categorypath',
					 "", 40, 255));
$smarty->assign ('info_categorypath', $this->Lang('info_categorypath'));
$smarty->assign ('pathmessage', $this->Lang ('pathinuploads'));

$smarty->assign ('prompt_categorylistable',
		 $this->Lang ('prompt_categorylistable'));
$smarty->assign ('input_categorylistable',
		 $this->CreateInputHidden($id,'input_categorylistable',0).
		 $this->CreateInputCheckbox ($id,
					     'input_categorylistable',
					     1,0));
$smarty->assign('prompt_categorydeletable',
		$this->Lang ('prompt_categorydeletable'));
$smarty->assign('input_categorydeletable',
		 $this->CreateInputHidden($id,'input_categorydeletable',0).
		$this->CreateInputCheckbox ($id,
					    'input_categorydeletable',
					    1,0));

$smarty->assign('input_category_expires_hrs',
		$this->CreateInputText($id,
				       'input_category_expires_hrs',
				       $this->GetPreference('category_expires','0'),3,4));

$smarty->assign('input_category_scannable',
		$this->CreateInputYesNoDropdown($id,'input_category_scannable',
						1));

$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( $feusers )
  {
    // get a list of the groups in the FrontEndUsers module
    $groups = $feusers->GetGroupList();
    if( count($groups) > 0 )
      {
	$smarty->assign('prompt_grouplist',$this->Lang('prompt_grouplist'));
	$smarty->assign('input_grouplist',
			$this->CreateInputSelectList($id,'input_grouplist[]',
						     $groups));
	$smarty->assign('info_grouplist',$this->Lang('info_grouplist'));
      }
  }

// Display the populated template
echo $this->ProcessTemplate ('addcategory.tpl');

// EOF
?>