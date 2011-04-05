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

// display a form to allow the user to upload a file.... but may have to have permission first
// hmmm, I'll think about the permission stuff later.

//
// initialization
//
$ysi_template = 'yousenditform_'.$this->GetPreference('default_yousenditform');
if( isset( $params['template'] ) )
  {
    $ysi_template = 'yousenditform_'.$params['template'];
  }
$notes = '';
$sendto = '';
$subject = '';
$error = array();
$message = array();
$author = 'anonymous';
$summary = '';
$destname = '';
$key = '';
$description = '';
$replace = 0;
$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( $feusers )
  {
    $tmp = $feusers->LoggedInName();
    if( !empty($tmp) ) $author = $tmp;
  }
$params['input_author'] = $author;


//
// Setup
//
if( !isset( $params['category'] ) )
  {
    // if mode or category isn't set... we don't display anything
    $this->_DisplayErrorPage ($id, $params, $returnid,
			      $this->Lang ('error_insufficientparams','category'));
    return;
  }
if( isset( $params['key'] ) )
  {
    $key = $params['key'];
    $params['input_key'] = $key;
    unset($params['key']);
  }
else if( isset( $params['input_key'] ) )
  {
    $key = $params['input_key'];
  }
$smarty->assign('mod',$this);
$smarty->assign('actionid',$id);


//
// handle form submission
//
if( isset($params['input_cancel']) )
  {
    $this->RedirectContent($returnid);
  }
else if( isset($params['input_submit']) )
  {
    if( isset($params['input_author']) )
      {
	$author = trim($params['input_author']);
      }
    if( isset($params['input_summary']) )
      {
	$summary = trim($params['input_summary']);
      }
    if( isset($params['input_description']) )
      {
	$description = trim($params['input_description']);
      }
    if( isset($params['input_destname']) )
      {
	$destname = trim($params['input_destname']);
      }
    if( isset($params['input_replace']) )
      {
	$replace = (int)$params['input_replace'];
      }
    if( isset($params['input_sendto']) )
      {
	$sendto = trim($params['input_sendto']);
      }
    if( isset($params['input_subject']) )
      {
	$subject = trim($params['input_subject']);
      }
    if( isset($params['input_notes']) )
      {
	$notes = trim($params['input_notes']);
      }

    // error checking
    if( empty($sendto) )
      {
	$error[] = $this->Lang('error_noaddresses');
      }
    
    if( empty($subject) )
      {
	$error[] = $this->Lang('error_nosubject');
      }

    // validate addresses
    $addresses = array();
    {
      $tmp = explode(',',$sendto);
      for( $i = 0; $i < count($tmp); $i++ )
	{
	  $t2 = trim($tmp[$i]);
	  if( !empty($t2) ) $addresses[] = $t2;
	}
    }

    if( !count($addresses) && !empty($sendto) )
      {
	$error[] = $this->Lang('error_noaddresses').' 2';
      }

    // check the captcha
    {
      if( is_object($captcha) && !isset($params['nocaptcha']) ) {
	$captcha =& $this->GetModuleInstance('Captcha');
	if (!$captcha->CheckCaptcha($params['input_captcha'])) {
	  $error[] = $this->Lang('error_captchamismatch');
	}
      }
    }

    // do the upload
    if( !count($error) )
      {
	$ret = $this->AttemptUpload ($id, $params, $returnid);
	if( $ret[0] == FALSE ) 
	  {
	    $error[] = $ret[1];
	  }
	else
	  {
	    $params['upload_id'] = $ret[1];
	    $message[] = $this->Lang('file_uploaded');
	  }
      }

    // send the message
    if( !count($error) )
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

	$smarty->assign('author',$author);
	$smarty->assign('notes',$notes);
	$smarty->assign('subject',$subject);
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
	$message[] = $this->Lang('msg_file_sent');
      }

  } // end form submission



//
// Give Everything to smarty
//
if( count($error) )
  {
    $smarty->assign('errors',$error);
  }
if( count($message) )
  {
    $smarty->assign('messages',$message);
  }
$smarty->assign ('startform',
		 $this->CreateFormStart ($id, 'yousendit', $returnid, 'post', 
					 'multipart/form-data', false, '',
					 $params));
$smarty->assign ('prompt_upload', $this->Lang ('upload'));

// attempt to get an author
if( !isset( $params['noauthor'] ) )
  {
    $smarty->assign ('prompt_author', $this->Lang ('author'));
    $smarty->assign ('input_author',
		     $this->CreateInputText ($id, 'input_author', 
					     $author, 20, 255));
  }
$smarty->assign ('prompt_summary',$this->Lang ('summary'));
$smarty->assign ('input_summary',$this->CreateInputText ($id, 'input_summary',$summary, 40, 255));
$smarty->assign ('prompt_destname',$this->Lang ('destname'));
$smarty->assign ('input_destname',$this->CreateInputText ($id, 'input_destname',$destname, 40, 255));
$smarty->assign ('info_destname', $this->Lang ('info_destname'));
$smarty->assign ('prompt_description',$this->Lang ('description'));
$smarty->assign ('input_description',$this->CreateTextArea(false, $id, $description, 'input_description' ));

$captcha =& $this->GetModuleInstance('Captcha');
if( is_object($captcha) && !isset($params['nocaptcha']) )
  {
    $smarty->assign('captcha_title', $this->Lang('captcha_title'));
    $smarty->assign('input_captcha',
		    $this->CreateInputText($id,'input_captcha','',10));
    $smarty->assign('captcha', $captcha->getCaptcha());
  }

$smarty->assign ('prompt_thumbnail', $this->Lang ('thumbnail'));
$smarty->assign ('info_thumbnail', $this->Lang ('info_thumbnail'));
$smarty->assign ('input_thumbnail',  $this->CreateFileUploadInput ($id,'input_thumbnail','',50));
$smarty->assign ('input_submit',$this->CreateInputSubmit ($id, 'do_uploadfile',$this->Lang ('submit')));
$smarty->assign ('endform', $this->CreateFormEnd ());

$smarty->assign('author',$author);
$smarty->assign('summary',$summary);
$smarty->assign('key',$key);
$smarty->assign('description',$description);
$smarty->assign('replace',$replace);
$smarty->assign('notes',$notes);
$smarty->assign('sendto',$sendto);
$smarty->assign('subject',$subject);

echo $this->ProcessTemplateFromDatabase($ysi_template);

# EOF
?>