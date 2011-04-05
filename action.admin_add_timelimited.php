<?php // -*- mode:php; c-file-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
# Version: 1.3.0-beta1, calguy1000
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
if( !isset($gCms) ) exit();
if( !$this->CheckPermission('Manage Uploads') && !$this->CheckPermission('Upload Files to Uploads'))
  {
    return;
  }

#
# Initialization
#
$this->SetCurrentTab('files');
if( !isset($params['upload_id']) )
  {
    $this->SetError($this->Lang('error_missingparam'));
    $this->RedirectToTab($id);
  }
$upload_id = (int)$params['upload_id'];
$email = '';
$hours = $this->GetPreference('timelimited_hours',72);
$downloads = $this->GetPreference('timelimited_downloads',0);
$sendit = 0;
$errors = array();

#
# Setup
#
$upload = $this->GetUploadDetails($upload_id);

#
# Handle form data
#
if( isset($params['cancel']) )
  {
		$this->Redirect($id,'admin_manage_timelimited',$returnid,
										array('upload_id'=>$upload_id));
  }
else if( isset($params['submit']) )
  {
    $hours = (int)$params['hours'];
    $downloads = (int)$params['downloads'];
    $email = trim($params['email']);
		if( isset($params['sendit']) )
			{
				$sendit = (int)$params['sendit'];
			}

    if( empty($email) )
      {
				$errors[] = $this->Lang('error_missing_invalid',$this->Lang('email_address'));
      }
    if( $downloads < 0 )
      {
				$errors[] = $this->Lang('error_missing_invalid',$this->Lang('num_downloads'));
      }
    if( $hours < 0 )
      {
				$errors[] = $this->Lang('error_missing_invalid',$this->Lang('num_hours'));
      }

    if( empty($errors) )
      {
				$now = $db->DbTimeStamp(time());
				if( $hours > 0 )
					{
						$expires = $db->DbTimeStamp(strtotime('+'.$hours.' hours'));
					}
				$urlkey = substr(str_shuffle(md5(time().$upload_id.$upload['upload_name'].$now.$email.$expires)),0,16);
				$dbr = '';
				if( $hours > 0 )
					{
						$query = 'INSERT INTO '.cms_db_prefix()."module_uploads_timelimit 
                      (upload_id,email,url_key,created,expires,max_downloads)
                      VALUES (?,?,?,$now,$expires,?)";
						$dbr = $db->Execute($query,array($upload_id,$email,$urlkey,$downloads));
					}
				else
					{
						$query = 'INSERT INTO '.cms_db_prefix()."module_uploads_timelimit 
                      (upload_id,email,url_key,created,max_downloads)
                      VALUES (?,?,?,$now,?)";
						$dbr = $db->Execute($query,array($upload_id,$email,$urlkey,$downloads));
					}
				if( !$dbr )
					{
						die($db->sql.'<br/>'.$db->ErrorMsg());
						$errors[] = $this->Lang('error_dberror');
					}
			}

		if( empty($errors) && $sendit )
			{
				// maybe send an email
				$cmsmailer =& $this->GetModuleInstance('CMSMailer');
				if( $cmsmailer )
					{
						$pageid = $this->GetPreference('default_sendfilepage');
						if( $pageid <= 0 )
							{
								$contentops =& $gCms->GetContentOperations();
								$pageid = $contentops->GetDefaultContent();
							}
						
						$tmp = $this->GetUploadDetails($upload_id,$pageid);
						$tmp['download_url'] = $this->CreateURL($id,'getfile',$pageid,
																										array('url_key'=>$urlkey),
																										false,
																										$this->_getTimeLimitedURL($urlkey));

						$upload_inf = new StdClass();
						foreach( $tmp as $key => $value )
							{
								if( startswith($key,'upload_') )
									{
										$key = substr($key,7);
									}
								if( !empty($value) )
									{
										$upload_info->$key = $value;
									}
							}
						$smarty->assign('entry',$upload_info);
						$smarty->assign('notes','');
						if( $downloads )
							{
								$smarty->assign('downloads',$downloads);
							}
						if( $hours )
							{
								$smarty->assign('hours',$hours);
							}

						$subject_tpl = $this->GetPreference('timelimited_subject',
																								$this->Lang('dflt_timelimited_subject'));
						$subject = $this->ProcessTemplateFromData($subject_tpl);

						$cmsmailer->reset();
						$cmsmailer->SetSubject($subject);
						$cmsmailer->IsHTML(true);
						$cmsmailer->AddAddress($email);
						$body = $this->ProcessTemplateFromDatabase('upload_sendfilerpt');
						$cmsmailer->SetBody($body);
						$cmsmailer->Send();
					}
			}
				

		if( empty($errors) )
			{
				// done.
				$this->SetMessage($this->Lang('time_limited_key_added'));
				$this->Redirect($id,'admin_manage_timelimited',$returnid,
												array('upload_id'=>$upload_id));
			}
  }

#
# Give Everything to Smarty
#
if( count($errors) )
  {
    echo $this->ShowErrors($errors);
  }
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_add_timelimited',$returnid,
																										 array('upload_id'=>$upload_id)));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('upload',$upload);
$smarty->assign('email',$email);
$smarty->assign('hours',$hours);
$smarty->assign('downloads',$downloads);

#
# Display the template
#
echo $this->ProcessTemplate('admin_add_timelimited.tpl');

#
# EOF
#
?>