<?php
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager module
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

if (!$this->CheckPermission ('Modify Site Preferences'))
  {
    return;
  }

// CreateFormStart sets up a proper form tag that will cause the submit to
// return control to this module for processing.
$this->smarty->assign ('startform',
		       $this->CreateFormStart ($id,
					       'save_admin_prefs',
					       $returnid));
$this->smarty->assign ('endform', $this->CreateFormEnd ());

$this->smarty->assign ('submit',
		       $this->CreateInputSubmit ($id, 'submit',
						 $this->Lang('submit'), '','',
						 $this->Lang('confirm_preferences')));    
    
// it's good practice to set even static titles using smarty, 
// so localization is easier.
$smarty->assign('autowatermark',$this->GetPreference('autowatermark',0));

$this->smarty->assign ('title_valid_uploadextensions',
		       $this->Lang ('title_valid_uploadextensions'));
$this->smarty->assign ('title_subnet_exclusions',
		       $this->Lang ('title_subnet_exclusions'));
$this->smarty->assign ('title_section',
		       $this->Lang ('title_mod_prefs'));
$this->smarty->assign ('title_dummy_index_html',
		       $this->Lang ('title_dummy_index_html'));
$this->smarty->assign ('title_email_on_upload',
		       $this->Lang ('title_email_on_upload'));
$this->smarty->assign ('title_redirect_on_upload',
		       $this->Lang('title_redirectonupload'));
$this->smarty->assign ('title_autothumbnail_extensions',
		       $this->Lang('title_autothumbnail_extensions'));
$this->smarty->assign ('title_autothumbnail_size',
		       $this->Lang('title_autothumbnail_size'));
$this->smarty->assign ('title_download_chunksize',
		       $this->Lang('title_download_chunksize'));
$this->smarty->assign ('info_download_chunksize',
		       $this->Lang('info_download_chunksize'));
$smarty->assign('title_allow_delete',$this->Lang('title_allow_delete'));

$contentops =& $gCms->GetContentOperations();
$smarty->assign('title_sendfilepage',$this->Lang('title_sendfilepage'));
$smarty->assign('input_sendfilepage',
		$contentops->CreateHierarchyDropdown('',$this->GetPreference('default_sendfilepage',-1),
						     $id.'default_sendfilepage',1));

$smarty->assign('title_redirect_on_sendfile',$this->Lang('title_redirect_on_sendfile'));
$smarty->assign('input_redirect_on_sendfile',
		$this->CreateInputText( $id, 'redirect_on_sendfile',
					$this->GetPreference('redirect_on_sendfile',''),30,80));

// you'll often want to do things like this to provide feedback:
$this->smarty->assign ('input_valid_uploadextensions',
		       $this->CreateInputText ($id, 'valid_uploadextensions',
					       $this->GetPreference ('valid_uploadextensions',
								     "zip,gz,tar"), '30', '255'));

$this->smarty->assign ('input_subnet_exclusions',
		       $this->CreateInputText( $id, 'subnet_exclusions',
					       $this->GetPreference('subnet_exclusions',""),50,255));
$this->smarty->assign ('input_dummy_index_html',
		       $this->CreateInputCheckbox( $id, 'input_dummy_index_html',
						   1, $this->GetPreference('create_dummy_index_html')));
$this->smarty->assign ('input_email_on_upload',
		       $this->CreateInputText( $id, 'email_on_upload',
					       $this->GetPreference('send_upload_notifications_to'),
					       40, 255 ));
$this->smarty->assign ('input_redirect_on_upload',
		       $this->CreateInputText( $id, 'redirect_on_upload',
					       $this->GetPreference('redirect_on_upload',''),30,80));

$this->smarty->assign ('input_autothumbnail_extensions',
		       $this->CreateInputText( $id, 'autothumbnail_extensions',
					       $this->GetPreference('autothumbnail_extensions',''),40));

$this->smarty->assign ('input_autothumbnail_size',
		       $this->CreateInputText( $id, 'autothumbnail_size',
					       $this->GetPreference('autothumbnail_size',''),3));

$smarty->assign('input_allow_delete',
		$this->CreateInputcheckbox($id,'allow_delete',1,
					   $this->GetPreference('allow_delete',0)));

$smarty->assign('input_download_chunksize',
		$this->CreateInputText($id,'download_chunksize',
				       $this->GetPreference('download_chunksize',8),5,5));

$smarty->assign('timelimited_hours',$this->GetPreference('timelimited_hours',72));
$smarty->assign('timelimited_downloads',$this->GetPreference('timelimited_downloads',0));
$smarty->assign('input_getfile_resultpage',
		$contentops->CreateHierarchyDropdown('',$this->GetPreference('getfile_resultpage'),
						     $id.'getfile_resultpage',1));
$smarty->assign('timelimited_autodelete',$this->GetPreference('timelimited_autodelete',0));
$smarty->assign('timelimited_subject',$this->GetPreference('timelimited_subject',
							   $this->Lang('dflt_timelimited_subject')));

$smarty->assign('category_expiry',$this->GetPreference('category_expiry',0));
$smarty->assign('allow_upload_sendfile',$this->GetPreference('allow_upload_sendfile',0));

// Display the populated template
echo $this->ProcessTemplate ('adminprefs.tpl');

// EOF
?>