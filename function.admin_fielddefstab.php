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

if( !isset($gCms) ) exit;

#
# Initialize
#
$types = array('textinput'=>$this->Lang('fieldtype_textinput'),
	       'textarea'=>$this->Lang('fieldtype_textarea'),
	       'checkbox'=>$this->Lang('fieldtype_checkbox'),
	       'dropdown'=>$this->Lang('fieldtype_dropdown'),
	       'multiselect'=>$this->Lang('fieldtype_multiselect'));

#
# Get the data
#
$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fielddefs ORDER BY iorder ASC';
$data = $db->GetArray($query);

#
# Give Everything to Smarty
#
$smarty->assign('fieldtypes',$types);
if( is_array($data) && count($data) > 0 )
  {
    for( $i = 0; $i < count($data); $i++ )
      {
	$edit_url = $this->CreateURL($id,'admin_add_field',$returnid,
				     array('fid'=>$data[$i]['id']));
	$delete_url = $this->CreateURL($id,'admin_del_field',$returnid,
				     array('fid'=>$data[$i]['id']));
	if( $i > 0 )
	  {
	    $moveup_url = $this->CreateURL($id,'admin_order_field',$returnid,
					   array('fid'=>$data[$i]['id'],'dir'=>'up','cur'=>$data[$i]['iorder']));
	    $data[$i]['moveup_url'] = $moveup_url;
	  }
	if( $i < (count($data) - 1) )
	  {
	    $movedown_url = $this->CreateURL($id,'admin_order_field',$returnid,
					     array('fid'=>$data[$i]['id'],'dir'=>'down','cur'=>$data[$i]['iorder']));
	    $data[$i]['movedown_url'] = $movedown_url;
	  }
	$data[$i]['edit_url'] = $edit_url;
	$data[$i]['delete_url'] = $delete_url;
      }
    $smarty->assign('fields',$data);
  }
$smarty->assign('addfield_link',
		$this->CreateLink($id,'admin_add_field',$returnid,
				  $gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif',
									       $this->Lang('prompt_add_field'),'','','systemicon'),
				  array(), '', false, false, '').' '.
		$this->CreateLink($id,'admin_add_field',$returnid,
				  $this->Lang('prompt_add_field'),
				  array(), '', false, false, 'class="pageoptions"'));

#
# Process output
#
echo $this->ProcessTemplate('admin_fields_tab.tpl');

#
# EOF
#
?>