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

$db =& $this->GetDb();
    
// are we cancelling
if (isset ($params['cancel']))
  {
    $this->RedirectToTab($id, 'categories');
  }
    
// make sure we have something to work with
if (!isset ($params['category_id']) || $params['category_id'] == "")
  {
    echo $this->ShowErrors($this->Lang('error_nocategoryid'));
  }
else if (!isset ($params['input_categoryname'])
	 || $params['input_categoryname'] == "")
  {
    echo $this->ShowErrors($this->Lang('error_emptycategory'));
  }
else if (!isset ($params['input_categorypath'])
	 || $params['input_categorypath'] == "")
  {
    echo $this->ShowErrors($this->Lang('error_emptypath'));
  }
else if (isset( $params['scan'] ) )
  {
    $query = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories
            WHERE upload_category_id = ?";
    $dbresult = $db->Execute( $query, array($params['category_id']) );
    if( !$dbresult )
      {
	$this->smarty->assign ('error', "1");
	$this->smarty->assign ('message', $this->Lang ("error_dberror"));
      } 
    else 
      {
	$row = $dbresult->FetchRow();
	if( !$row ) 
	  {
	    $this->smarty->assign ('error', "1");
	    $this->smarty->assign ('message', $this->Lang ("error_dberror"));
	  } 
	else 
	  {
	    @set_time_limit(0);
	    $dir = $this->_categoryPath( $row['upload_category_path'] );
	    $this->ScanDirectory( $params['category_id'], $dir );
	    $this->RedirectToTab($id, 'files', array('input_category' => $params['category_id']) );
	    return;
	  } 
      }
  }
else
  {
    // now prepare to update the record
    $groups = null;
    if( isset($params['input_grouplist']) &&
	is_array( $params['input_grouplist'] ) )
      {
	$groups = implode(',',$params['input_grouplist']);
      }
    $query =
      "UPDATE ".cms_db_prefix ()."module_uploads_categories 
       SET upload_category_name = ?, upload_category_description = ?, upload_category_listable = ?,
       upload_category_groups = ?, upload_category_deletable = ?,
       upload_category_expires_hrs = ?, upload_category_scannable = ?
       WHERE upload_category_id = ?";
    $dbresult =
      $db->Execute ($query,
		    array ($params['input_categoryname'],
			   $params['input_categorydesc'],
			   (isset($params['input_categorylistable']))?1:0,
			   $groups,
			   (isset($params['input_categorydeletable']))?1:0,
			   (int)$params['input_category_expires_hrs'],
			   (int)$params['input_category_scannable'],
			   $params['category_id']));
    if (!$dbresult)
      {
	echo $this->ShowErrors($this->Lang('error').': '.$db->ErrorMsg());
      }
    else
      {
	$this->RedirectToTab($id,'categories');
	return;
      }
  }

$this->ProcessTemplate ("addcategory.tpl");

// EOF
?>
