<?php // -*- mode:php; c-set-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
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
if( !isset($gCms) ) exit;
if( !isset($params['upload_id']) ) exit;

// initialization
$upload_id = (int)$params['upload_id'];
$thetemplate = $this->GetPreference('default_sendfileform');
$notes = '';
$sendto = '';
$subject = '';
$error = '';
$message = '';

// setup
$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads 
           WHERE upload_id = ?';
$upload_data = $db->GetRow($query,array($upload_id));
if( !$upload_data ) return;
$smarty->assign('mod',$this);
$smarty->assign('actionid',$id);

// handle form data
if( isset($params['input_cancel']) )
  {
    $this->RedirectContent($returnid);
  }
else if( isset($params['input_submit']) )
  {
    $notes = trim($params['input_notes']);
    $sendto = trim($params['input_sendto']);
    $subject = trim($params['input_subject']);
    $addresses = array();

    // check the subject
    if( empty($subject) )
      {
	$error = $this->Lang('error_nosubject');
      }

    if( empty($error) && empty($sendto) )
      {
	$error = $this->Lang('error_noaddresses');
      }

    if( empty($error) )
      {
	$tmp = explode(',',$sendto);
	if( !count($tmp) )
	  {
	    $error = $this->Lang('error_noaddresses');
	  }
	else
	  {
	    for( $i = 0; $i < count($tmp); $i++ )
	      {
		$t2 = trim($tmp[$i]);
		if( !empty($t2) )
		  {
		    $addresses[] = $t2;
		  }
	      }
	    if( !count($addresses) )
	      {
		$error = $this->Lang('error_noaddresses');
	      }
	  }
      }

    // got all the addresses.
    // now send the mail.
    if( empty($error) )
      {
	$cmsmailer =& $this->GetModuleInstance('CMSMailer');
	
	// get everything into smarty.
	$params['nooutput'] = 1;
	include(dirname(__FILE__).'/action.detail.php');

	$cmsmailer->reset();
	$cmsmailer->SetSubject($subject);
	$cmsmailer->IsHTML(true);
	foreach( $addresses as $one )
	  {
	    $cmsmailer->AddAddress($one);
	  }
	$body = $this->ProcessTemplateFromDatabase('upload_sendfilerpt');
	$cmsmailer->SetBody($body);
	$cmsmailer->Send();
	
	// now try to redirect to a different page
	$str = $this->GetPreference('redirect_on_sendfile');
	if( $str != '' )
	  {
	    $tmp = ContentManager::GetPageIDFromAlias($str);
	    if( $tmp )
	      {
					$this->RedirectContent($tmp);
					return;
	      }
	  }

	// redirect isn't set... so display a nice message.
	$message = $this->Lang('msg_file_sent');
      }
  }

// give everything to smarty
if( !empty($error) )
  {
    $smarty->assign('error',$error);
  }
if( !empty($message) )
  {
    $smarty->assign('message',$message);
  }
$smarty->assign('upload_info',$upload_data);
$smarty->assign('formstart',$this->CreateFormStart($id,'sendfile',$returnid,'post','',false,'',$params));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('notes',$notes);
$smarty->assign('sendto',$sendto);
$smarty->assign('subject',$subject);

// display the template
echo $this->ProcessTemplateFromDatabase('sendfileform_'.$thetemplate);

# EOF
?>