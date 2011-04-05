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

if (!$this->CheckPermission ('Manage Uploads'))
  {
    return;
  }

global $gCms;
$db =& $this->GetDb();
    
$rowarray = array ();
$query = '';
$dbresult = '';
    
$query = "SELECT * FROM ".cms_db_prefix ()."module_uploads_categories";
$dbresult = $db->Execute ($query);
$rowclass = 'row1';
    
while ($row = $dbresult->FetchRow ())
  {
    $onerow = new stdClass ();
    $onerow->id = $row["upload_category_id"];
    $onerow->name = $this->CreateLink( $id, 'editcategory', $returnid, 
			 $row["upload_category_name"],
			 array('category_id'=>$row['upload_category_id']));

    $onerow->description = $row["upload_category_description"];
    $onerow->path = $row["upload_category_path"];
    $onerow->rowclass = $rowclass;

    $onerow->copylink = $this->CreateLink ($id, 'admin_copycategory', $returnid,
			 $gCms->variables['admintheme']->
			 DisplayImage ('icons/system/copy.gif',
			 	$this->Lang ('copy'), '', '', 'systemicon'),
			 array ('category_id' => $row['upload_category_id']));
    $onerow->editlink = $this->CreateLink ($id, 'editcategory', $returnid,
			 $gCms->variables['admintheme']->
			 DisplayImage ('icons/system/edit.gif',
			 	$this->Lang ('edit'), '', '', 'systemicon'),
			 array ('category_id' => $row['upload_category_id']));
    $onerow->deletelink = $this->CreateLink ($id, 'deletecategory', $returnid,
			 $gCms->variables['admintheme']->
			 DisplayImage ('icons/system/delete.gif',
				       $this->Lang ('delete'), '', '', 'systemicon'),
			 array ('category_id' => $row['upload_category_id']),
			 $this->Lang ('areyousure_deletecategory'));

    array_push ($rowarray, $onerow);
    ($rowclass == "row1" ? $rowclass = "row2" : $rowclass = "row1");
  }

$this->smarty->assign ('categorytext', $this->Lang ('category'));
$this->smarty->assign ('nametext', $this->Lang ('name'));
$this->smarty->assign ('pathtext', $this->Lang ('path'));
$this->smarty->assign ('items', $rowarray);
$this->smarty->assign ('itemcount', count ($rowarray));
$this->smarty->assign ('addlink', $this->CreateLink($id, 'addcategory', 
	$returnid, 
	$gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif', 
		$this->Lang('addcategory'),'','','systemicon'), 
		array(), '', false, false, '') .' '. 
		$this->CreateLink($id, 'addcategory', 
			$returnid, $this->Lang('addcategory'), 
			array(), '', false, false, 'class="pageoptions"'));
$smarty->assign('formstart',
		$this->CGCreateFormStart($id,'admin_multicategory',$returnid));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('cat_multiactions',
		array('delete'=>$this->Lang('delete'),
		      'copy'=>$this->Lang('copy')));

echo $this->ProcessTemplate ('categorylist.tpl');

// EOF
?>