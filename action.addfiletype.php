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

if( isset($params['cancel']) )
  {
    $this->Redirect($id,'defaultadmin',$returnid,$params);
  }

$iconlist = array();
$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'images';
if( is_dir( $dir ) )
  {
    if( $dh = opendir($dir) )
      {
	while(($file = readdir($dh)) !== false)
	  {
	    if( is_file( $dir.DIRECTORY_SEPARATOR.$file ) )
	      {
		$iconlist[$file] = $file;
	      }
	  }
	closedir($dh);
      }

  }

$hidden = '';
$name = '';
$extensions = '';
$description = '';
$icon = '';
if( isset( $params['typeid'] ) )
  {
    // get the data out of the database, we're obviously editing something
    $hidden .= $this->CreateInputHidden($id,'typeid',$params['typeid']);
    $q = "SELECT * FROM ".cms_db_prefix()."module_uploads_filetypes 
           WHERE id = ?";
    $db =& $this->GetDb();
    $row = $db->GetRow( $q, array( $params['typeid'] ) );
    if( !$row )
      {
	$this->ShowErrors($this->Lang('error_nosuchrow'));
	return;
      }
    $name = $row['name'];
    $description = $row['description'];
    $extensions = $row['extensions'];
    $icon = $row['image'];
  }

// if in the params array, then the values in there
// will override those in the database
if( isset($params['input_name']) )
  {
    $name = $params['input_name'];
  }
if( isset($params['input_description']) )
  {
    $description = $params['input_description'];
  }
if( isset($params['input_extensions']) )
  {
    $extensions = $params['input_extensions'];
  }
if( isset($params['input_icon']) )
  {
    $icon = $params['input_icon'];
  }

if( isset($params['submit']) )
  {
    // the form was submitted
    if( trim($name) == '' )
      {
	$this->ShowErrors('error_missingname');
      }
    else if( trim($extensions) == '' )
      {
	$this->ShowErrors('error_missingextensions');
      }
    else if( trim($icon) == '' )
      {
	$this->ShowErrors('error_missingicon');
      }
    else
      {
	if( isset($params['typeid']) )
	  {
	    // Update an existing record
	    $q = "UPDATE ".cms_db_prefix()."module_uploads_filetypes
                     SET name=?,description=?,extensions=?,image=?
                   WHERE id = ?";
	    $db->Execute( $q, array( trim($name), trim($description), 
				     trim($extensions), trim($icon),
				     $params['typeid'] ) );
	  }
	else
	  {
	    //
	    // Insert a new record
	    //

	    // Get a new ID
	    $newid = $db->GenID(cms_db_prefix()."module_uploads_filetypes_seq");
	    
	    // Find the maximum sort order
	    $tq = "SELECT max(sortorder) as sortorder FROM ".cms_db_prefix()."module_uploads_filetypes";
	    $row = $db->GetRow( $tq );
	    
	    $q = "INSERT INTO ".cms_db_prefix()."module_uploads_filetypes
              (id,sortorder,name,description,extensions,image) VALUES (?,?,?,?,?,?)";
	    $db->Execute( $q, array($newid,$row['sortorder']+1,
				    trim($name),trim($description),
				    trim($extensions),trim($icon)));
	  }

	// redirect back to the tab
	$this->Redirect($id,'defaultadmin',$returnid,$params);
      }
  }

$smarty =& $this->smarty;

$smarty->assign('startform',$this->CreateFormStart($id,$params['action'],$returnid,
						   'multipart/form-data'));
$smarty->assign('endform',$this->CreateFormEnd());
$smarty->assign('prompt_name',$this->Lang('name'));
$smarty->assign('prompt_description',$this->Lang('description'));
$smarty->assign('prompt_extensions',$this->Lang('extensions'));
$smarty->assign('prompt_icon',$this->Lang('icon'));
$smarty->assign('input_name',$this->CreateInputText($id,'input_name',$name,40));
$smarty->assign('input_description',$this->CreateTextArea(true,$id,$description,'input_description'));
$smarty->assign('input_extensions',$this->CreateInputText($id,'input_extensions',$extensions,40));
$smarty->assign('input_icon',$this->CreateInputDropdown($id,'input_icon',$iconlist,-1,$icon));
if( isset($params['active_tab']) )
  {
    $hidden .= $this->CreateInputHidden($id,'active_tab',$params['active_tab']);
  }
$smarty->assign('hidden',$hidden);
$smarty->assign('submit',$this->CreateInputSubmit($id,'submit',$this->Lang('submit')));
$smarty->assign('cancel',$this->CreateInputSubmit($id,'cancel',$this->Lang('cancel')));

echo $this->ProcessTemplate('addfiletype.tpl');
// EOF
?>