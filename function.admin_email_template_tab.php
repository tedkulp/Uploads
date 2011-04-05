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

$smarty->assign('formstart1',$this->CreateFormStart ($id, 'updateemailtemplate'));
$smarty->assign('formend1',$this->CreateFormEnd());
$smarty->assign('notify_email_template',
		$this->CreateTextArea (false, $id, $this->GetTemplate ('upload_emailtemplate'),
				       'templatecontent', '')); 
$smarty->assign('submit1',$this->CreateInputSubmit ($id, 'submitbutton',$this->Lang ('submit'))); 
$smarty->assign('default1',$this->CreateInputSubmit ($id, 'defaultbutton', $this->Lang ('default'), '', '', 
						     $this->Lang('restoredefaultsconfirm')));
$smarty->assign('prompt_notify_email_template',$this->Lang('prompt_notify_email_template'));



$smarty->assign('formstart2',$this->CreateFormStart( $id, 'updatesendfileemail'));
$smarty->assign('prompt_sendfile_email_template',$this->Lang('prompt_sendfile_email_template'));
$smarty->assign('submit2',$this->CreateInputSubmit ($id, 'submitbutton',$this->Lang ('submit'))); 
$smarty->assign('default2',$this->CreateInputSubmit ($id, 'defaultbutton', $this->Lang ('default'), '', '', 
						     $this->Lang('restoredefaultsconfirm')));
$smarty->assign('sendfile_email_template',
		$this->CreateTextArea (false, $id, $this->GetTemplate('upload_sendfilerpt'),
				       'templatecontent',''));
$smarty->assign('formend2',$this->CreateFormEnd());


echo $this->ProcessTemplate('admin_email_template_tab.tpl');

# EOF
?>