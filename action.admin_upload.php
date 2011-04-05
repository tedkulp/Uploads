<?php
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
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
    die('permission denied');
  }

#
# Initialization
#
$this->SetCurrentTab('files');
$record = array('category_id'=>'',
		'destname'=>'',
		'author'=>$_SESSION['cms_admin_username'],
		'summary'=>'',
		'description'=>'');
$curcategory = '';

#
# Setup
#
if( isset($params['category']) )
  {
    $curcategory = $params['category'];
  }
$categorylist = array();
{
  $query =
    "SELECT upload_category_id AS id, upload_category_name AS name FROM ".cms_db_prefix ().
       "module_uploads_categories ORDER BY upload_category_name ASC";
  $tmp = $db->GetArray($query);
  for( $i = 0; $i < count($tmp); $i++ )
    {
      $categorylist[$tmp[$i]['id']] = $tmp[$i]['name'];
    }
}

$fields = array();
{
  $query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fielddefs ORDER BY iorder';
  $tfields = $db->GetArray($query);
  for( $i = 0; $i < count($tfields); $i++ )
    {
      $tfields[$i]['attrib'] = unserialize($tfields[$i]['attribs']);
      unset($tfields[$i]['attribs']);
      
      switch($tfields[$i]['type'])
	{
	case 'textarea':
	  $tfields[$i]['input'] = 
	  $this->CreateTextArea(isset($tfields[$i]['attrib']['usewysiwyg']) && $tfields[$i]['attrib']['usewysiwyg'] == 1 &&
				$this->GetPreference('allow_comment_wysiwyg',0),
				$id,
				$tfields[$i]['attrib']['dfltcontent'],
				'field_'.$tfields[$i]['id']);
	  break;
	case 'dropdown':
	case 'multiselect':
	  if( isset($tfields[$i]['attrib']['options']) )
	    {
	      $tmp = explode("\n",$tfields[$i]['attrib']['options']);
	      $tmp2 = array();
	      foreach( $tmp as $one )
		{
		  $key = '';
		  $value = '';
		  if( strstr($one,'=') !== FALSE )
		    list($key,$value) = explode('=',trim($one),2);
		  else
		    {
		      $value = $one;
		      $key = $one;
		    }
		  $tmp2[trim($value)] = trim($key);
		}
	      $tfields[$i]['attrib']['options'] = $tmp2;
	    }
	  break;
	}
      
      $fields[$tfields[$i]['id']] = $tfields[$i];
    }
}


#
# Handle Form Submission
#
if( isset($params['cancel']) )
  {
    $this->RedirectToTab($id);
  }
else if( isset($params['submit']) )
  {
    $record['category_id'] = (int)$params['category_id'];
    $record['destname'] = trim($params['input_destname']);
    $record['author'] = trim($params['input_author']);
    $record['summary'] = trim($params['input_summary']);
    $record['description'] = trim($params['input_description']);

    $userid = get_userid();
    $username = $_SESSION['cms_admin_username'];

    $ret = $this->AttemptUpload( $id, $params, $returnid );
    if( $ret[0] == false )
      {
	echo $this->ShowErrors($ret[1]);
      }
    else
      {
	$upload_id = $ret[1];
	$thename = '';
	if( count($ret) == 3 ) $thename = $ret[2];

	// it uploaded... now for the tl stuff
	if( $this->GetPreference('allow_upload_sendfile',0) &&
	    isset($params['tl_email']) && !empty($params['tl_email']) )
	  {
	    // we're creating time limited access key.
	    $hours = (int)$params['tl_hours'];
	    $downloads = (int)$params['tl_downloads'];
	    $email = trim($params['tl_email']);
	    $sendit = (int)$params['tl_sendit'];

	    $downloads = max($downloads,0);
	    $hours = max($hours,0);

	    $now = $db->DbTimeStamp(time());
	    $expires = null;
	    if( $hours > 0 )
	      {
		$expires = $db->DbTimeStamp(strtotime('+'.$hours.' hours'));
	      }
	    $urlkey = substr(str_shuffle(md5(time().$upload_id.$thename.$now.$email.$expires)),0,16);
	    $query = 'INSERT INTO '.cms_db_prefix()."module_uploads_timelimit 
                   (upload_id,email,url_key,created,expires,max_downloads)
                  VALUES (?,?,?,$now,$expires,?)";
	    $dbr = $db->Execute($query,array($upload_id,$email,$urlkey,$downloads));
	    if( $dbr )
	      {
		// maybe send an email
		$cmsmailer =& $this->GetModuleInstance('CMSMailer');
		if( $cmsmailer )
		  {
		    $contentops =& $gCms->GetContentOperations();
		    $pageid = $this->GetPreference('default_sendfilepage');
		    if( $pageid <= 0 )
		      {
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

	  }

	$this->RedirectToTab($id);
      }
  }

#
# Give everything to smarty
#
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_upload',$returnid,$params,false,'post','multipart/form-data'));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('categories',$categorylist);
if( !empty($curcategory) )
  {
    $smarty->assign('curcategory',$curcategory);
  }
$smarty->assign('allow_replace',0);
$smarty->assign('upload',$record);
if( count($fields) )
  {
    $smarty->assign('fields',$fields);
  }
$smarty->assign('tl_hours',$this->GetPreference('timelimited_hours',0));
$smarty->assign('tl_downloads',$this->GetPreference('timelimited_downloads',0));
$smarty->assign('allow_upload_sendfile',$this->GetPreference('allow_upload_sendfile',0));

#
# Display the template
#
echo $this->ProcessTemplate('admin_upload.tpl');

#
# EOF
#
?>