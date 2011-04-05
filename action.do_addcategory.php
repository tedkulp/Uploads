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
if (!$this->CheckPermission ('Manage Uploads'))
  {
    // do nothing, todo: this should probably be changed
    return;
  }

// are we cancelling
if (isset ($params['cancel']))
  {
    $this->RedirectToTab($id,'categories');
  }

$error = false;

// make sure we have something to work with
if (!isset ($params['input_categoryname'])
    || $params['input_categoryname'] == "")
  {
    $this->smarty->assign ('error', "1");
    $this->smarty->assign ('message', $this->Lang ("error_emptycategory"));
    $error = true;
  }
 else if (!isset ($params['input_categorypath']) || trim($params['input_categorypath']) == "")
   {
     $this->smarty->assign ('error', "1");
     $this->smarty->assign ('message', $this->Lang ("error_emptypath"));
     $error = true;
   }
 else
   {
     // check if the category doesn't already exist
     $db =& $this->GetDb();
     $query =
       "SELECT upload_category_id from ".cms_db_prefix ().
       "module_uploads_categories WHERE upload_category_name = ?";
     $dbresult =
       $db->Execute ($query, array ($params['input_categoryname']));
     
     // yep it does
     if ($dbresult->FetchRow ())
       {
	 $this->smarty->assign ('error', "1");
	 $this->smarty->assign ('message',
				$this->Lang ("error_categoryexists").' DB');
	 $error = true;
       }
     else
       {
	 $params['input_categorypath'] = trim($params['input_categorypath'],'/');
	 // check if the directory is already in use
	 $query =
	   "SELECT upload_category_id from ".cms_db_prefix ().
	   "module_uploads_categories WHERE upload_category_path = ?";
	 $dbresult =
	   $db->Execute ($query, array ($params['input_categorypath']));
	 
	 if ($dbresult->FetchRow ())
	   {
	     $this->smarty->assign ('error', "1");
	     $this->smarty->assign ('message', $this->Lang ("error_pathinuse"));
	     $error = true;
	   }
	 else
	   {
	     // Create the directory if it doesn't exist
	     $do_scan = false;
	     $dir = $this->_categoryPath($params['input_categorypath']);
	     
	     if( file_exists( $dir ) ) 
	       {
		 $do_scan = true;
	       }
	     else
	       {
		 // create the directory
		 $result = cge_dir::mkdirr($dir);
		 if ($result === FALSE) 
		   {
		     $this->smarty->assign ('error', "1");
		     $this->smarty->assign ('message',
					    $this->Lang ("error_categoryexists").': '.$dir);
		     $error = true;
		   }
		 // create an index.html file (empty)
		 if( $this->GetPreference('create_dummy_index_html') )
		   {
		     touch( $dir.DIRECTORY_SEPARATOR."index.html" );
		   }
	       }
	     
	     if( !$error )
	       {
		 $groups = null;
		 if( isset($params['input_grouplist']) )
		   {
		     $groups = implode(',',$params['input_grouplist']);
		   }
		 // Add the record to the category table
		 $catid =
		   $db->GenID (cms_db_prefix ()."module_uploads_categories_seq");
		 $params['category_id'] = $catid;
		 $query =
		   "INSERT INTO ".cms_db_prefix()."module_uploads_categories 
                    (upload_category_id, upload_category_name, upload_category_description,
                     upload_category_path, upload_category_listable, upload_category_deletable,
                     upload_category_expires_hrs, 
                     upload_category_scannable,
                     upload_category_groups)
                    VALUES (?,?,?,?,?,?,?,?,?)";
		 $dbresult =
		   $db->Execute ($query,
				 array ($catid,
					$params["input_categoryname"],
					$params["input_categorydesc"],
					$params["input_categorypath"],
					$params["input_categorylistable"],
					$params["input_categorydeletable"],
					(int)$params['input_category_expires_hrs'],
					(int)$params['input_category_scannable'],
					$groups));
		 if (!$dbresult)
		   {
		     $this->smarty->assign ('error', "1");
		     $this->smarty->assign ('message',
					    $this->Lang ("message_categoryadded"));
		     $error = true;
		   }
		 else
		   {
		     if( $do_scan )
		       {
			 // category is added, and the directory already existed... so now
			 // we're gonna scan the directory and add files to the database
			 $this->ScanDirectory( $id, $dir );
		       }
		     
		     // send an event
		     $parms = array();
		     $parms['name'] = $params['input_categoryname'];
		     $parms['description'] = $params['input_categorydesc'];
		     $parms['path'] = $params['input_categorypath'];
		     $parms['listable'] = $params['input_categorylistable'];
		     $parms['deletable'] = $params['input_categorydeletable'];
		     $parms['expires_hrs'] = $params['input_category_expires_hrs'];
		     $this->SendEvent( 'OnCreateCategory', $parms );
		   }
	       }
	   }
       }
   }

if ($error)
  {
    echo $this->ProcessTemplate ('addcategory.tpl');
  }
 else
   {
     $this->RedirectToTab ($id, 'categories');
   }
?>
