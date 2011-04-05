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
if( !isset($gCms) ) exit;

$templates = cge_template_utils::get_templates_by_prefix();

if (!$this->CheckPermission ('Manage Uploads'))
  {

// get the current category for the filter
$curcategory =
    (isset ($params['curcategory']) ? $params['curcategory'] : '');
if (isset ($params['submitcategory']))
  {
    $curcategory =
      (isset ($params['input_category']) ? $params['input_category'] :
       '');
  }

// are we uploading a file      
if (isset( $params['submitupload'] ) )
  {
    $params['category_id'] = $curcategory;
    
    $ret = $this->AttemptUpload( $id, $params, $returnid );
    if( $ret[0] == false )
      {
	$this->_DisplayErrorPage( $id, $params, $returnid,
				  $ret[1] );
	return;
      }
  }
  }

if( ini_get_boolean('safe_mode') )
  {
    echo '<div class="pageerrorcontainer"><div class="pageoverflow"><p class="pageerror">'.$this->Lang('warning_safe_mode').'</p></div></div>';
  }

// top nav
if( $this->CheckPermission('Modify Templates') )
  {
    echo '<div class="pageoverflow" style="text-align: right; width: 80%;">';
    echo $this->CreateImageLink($id,'admin_templates',$returnid,
				$this->Lang('lbl_templates'),
				'icons/topfiles/template.gif',array(),'','',false);
    echo '</div><br/>';
  }
    
//The tabs
echo $this->StartTabHeaders ();
if ($this->CheckPermission ('Manage Uploads') || $this->CheckPermission('Upload Files to Uploads'))
  {
    echo $this->SetTabHeader ('files', $this->Lang ('files'));
  }
if ($this->CheckPermission ('Manage Uploads'))
  {
    echo $this->SetTabHeader ('categories', $this->Lang ('categories'));
  }
if ($this->CheckPermission('Modify Site Preferences') )
  {
    echo $this->SetTabHeader ('fields', $this->Lang ('field_definitions'));
  }
if ($this->CheckPermission ('Manage Uploads'))
  {
    echo $this->SetTabHeader( 'file_types',
			      $this->Lang( 'file_types'));
  }
if ($this->CheckPermission('Modify Site Preferences') )
  {
    echo $this->SetTabHeader ('admin_prefs',
			      $this->Lang ('preferences'));
  }
echo $this->EndTabHeaders ();
    
//The content of the tabs
echo $this->StartTabContent ();

if ($this->CheckPermission ('Manage Uploads') || $this->CheckPermission('Upload Files to Uploads'))
  {
    // the files tab
    echo $this->StartTab ("files");
    include(dirname(__FILE__).'/function.admin_filestab.php');
    echo $this->EndTab ();
  }
if ($this->CheckPermission ('Manage Uploads'))
  {
    echo $this->StartTab ("categories");
    include(dirname(__FILE__).'/function.admin_categoriestab.php');
    echo $this->EndTab ();
  }
if ($this->CheckPermission('Modify Site Preferences') )
  {
    echo $this->StartTab ("fields");
    include(dirname(__FILE__).'/function.admin_fielddefstab.php');
    echo $this->EndTab ();
  }
if ($this->CheckPermission ('Manage Uploads'))
  {
    echo $this->StartTab('file_types');
    include(dirname(__FILE__).'/function.admin_filetypestab.php');
    echo $this->EndTab();
  }

if( $this->CheckPermission('Modify Site Preferences') )
  {
    echo $this->StartTab( 'admin_prefs' );
    include(dirname(__FILE__).'/function.admin_prefstab.php');
    echo $this->EndTab ();
  }

// done tabs
echo $this->EndTabContent ();
return;

?>