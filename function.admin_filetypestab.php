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
#-------------------------------------------------------------------------

if( !$this->CheckPermission('Manage Uploads') )
  {
    return;
  }

if( isset($params['direction']) && isset($params['rowid']) )
  {
    switch( $params['direction'] )
      {
      case 'up':
	$q = "UPDATE ".cms_db_prefix()."module_uploads_filetypes
                 SET sortorder = (sortorder + 1)
               WHERE sortorder = ?";
	$db->Execute( $q, array( $params['sortorder'] - 1 ) );
	$q = "UPDATE ".cms_db_prefix()."module_uploads_filetypes
                 SET sortorder = (sortorder - 1)
               WHERE id = ?";
	$db->Execute( $q, array( $params['rowid'] ) );
	break;

      case 'down':
	$q = "UPDATE ".cms_db_prefix()."module_uploads_filetypes
                 SET sortorder = (sortorder - 1)
               WHERE sortorder = ?";
	$db->Execute( $q, array( $params['sortorder'] + 1 ) );
	$q = "UPDATE ".cms_db_prefix()."module_uploads_filetypes
                 SET sortorder = (sortorder + 1)
               WHERE id = ?";
	$db->Execute( $q, array( $params['rowid'] ) );
	break;
      }
  }

$smarty =& $this->smarty;
$db =& $this->GetDb();
$query = "SELECT * FROM ".cms_db_prefix()."module_uploads_filetypes
          ORDER BY sortorder";
$dbresult = $db->Execute( $query );

global $gCms;
$themeObject =& $gCms->variables['admintheme'];
$downImg = $themeObject->DisplayImage('icons/system/arrow-d.gif', lang('down'),'','','systemicon');
$upImg = $themeObject->DisplayImage('icons/system/arrow-u.gif', lang('up'),'','','systemicon');
$editImg = $themeObject->DisplayImage('icons/system/edit.gif', lang('edit'),'','','systemicon');
$deleteImg = $themeObject->DisplayImage('icons/system/delete.gif', lang('delete'),'','','systemicon');
$newObject = $themeObject->DisplayImage('icons/system/newobject.gif',$this->Lang('addfiletype'),'','','systemicon');


$rowclass = 'row1';
$entries = array();
$count = 0;
while( $dbresult && $row = $dbresult->FetchRow() )
  {
    $obj = new StdClass();
    foreach( $row as $key=>$value )
      {
	$obj->$key = $value;
      }

    $obj->icon = '<img src="../modules/'.basename(dirname(__FILE__)).'/images/'.$obj->image.'" alt="'.$obj->name.'"/>';
    if( $count != 0 )
      {
	$obj->uplink = $this->CreateLink($id,'defaultadmin',$returnid,$upImg,
					 array('active_tab'=>'file_types',
					       'direction'=>'up',
					       'sortorder'=>$row['sortorder'],
					       'rowid'=>$row['id']));
      }
    if( $count < ($dbresult->RecordCount() - 1) )
      {
	$obj->downlink = $this->CreateLink($id,'defaultadmin',$returnid,$downImg,
					   array('active_tab'=>'file_types',
						 'direction'=>'down',
						 'sortorder'=>$row['sortorder'],
						 'rowid'=>$row['id']));
      }
    $obj->editlink = $this->CreateLink($id,'addfiletype',$returnid,$editImg,
				       array('active_tab'=>'file_types',
					     'typeid'=>$row['id']));
    $obj->deletelink = $this->CreateLink($id,'deletetype',$returnid,$deleteImg,
					 array('active_tab'=>'file_types',
					       'typeid'=>$row['id']));
    $obj->rowclass = $rowclass;
    $count++;
    $rowclass = ($rowclass == 'row1') ? 'row2' : 'row1';
    $entries[] = $obj;
  }

// the unknown row
$obj = new StdClass();
$obj->name = $this->Lang('name_unknown');
$obj->description = '<em>'.$this->Lang('description_unknown').'</em>';
$obj->rowclass = 'row3';
$obj->icon = '<img src="../modules/'.basename(dirname(__FILE__)).'/images/unknown.png" alt="'.$obj->name.'"/>';
$entries[] = $obj;
$smarty->assign('items',$entries);
$smarty->assign('itemcount',count($entries));

$smarty->assign('addlink',
		$this->CreateLink($id,'addfiletype',$returnid,$newObject,
				  array('active_tab'=>'file_types')).
		$this->CreateLink($id,'addfiletype',$returnid,$this->Lang('addfiletype'),
				  array('active_tab'=>'file_types')));

$smarty->assign('startform',
		$this->CreateFormStart($id,'uploadicon',$returnid,'post',
				       'multipart/form-data',false,'',
				       array('active_tab'=>'file_types')));
$smarty->assign('endform',
		$this->CreateFormEnd());
$smarty->assign('prompt_upload_icon',
		$this->Lang('prompt_upload_icon'));
$smarty->assign('input_upload_icon',
		$this->CreateFileUploadInput($id,'input_upload_icon','',50));
$smarty->assign('submit',
		$this->CreateInputSubmit($id,'submit',$this->Lang('submit')));
echo $this->ProcessTemplate('filetypes.tpl');

// EOF
?>
