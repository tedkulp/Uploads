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
if( !isset($gCms) ) exit();

if( !isset( $params['category'] ) )
	{
		// if mode or category isn't set... we don't display anything
		$this->_DisplayErrorPage ($id, $params, $returnid,
															$this->Lang ('error_insufficientparams','category'));
		return;
	}

// display a form to allow the user to upload a file.... but may have to have permission first
// hmmm, I'll think about the permission stuff later.
$template = 'uploadform_'.$this->GetPreference('default_uploadform');
if( isset( $params['template'] ) )
	{
		$template = 'uploadform_'.$params['template'];
	}

{
	$query = 'SELECT upload_category_id FROM '.cms_db_prefix().'module_uploads_categories
          WHERE upload_category_name = ?';
	$tmp = $db->GetOne($query,array($params['category']));
	if( !$tmp ) 
		{
			$this->_DisplayErrorPage ($id, $params, $returnid,
																$this->Lang ('error_insufficientparams','category'));
			return;
		}
	unset($params['category']);
	$params['category_id'] = $tmp;
}

if( isset($params['key']) )
	{
		$params['input_key'] = $params['key'];
		unset($params['key']);
	}
$smarty->assign ('startform',
								 $this->CreateFormStart ($id, 'do_upload',
																				 $returnid,'post', 
																				 'multipart/form-data',
																				 $params));
$smarty->assign ('prompt_upload', $this->Lang ('upload'));

// get custom field info.
$fields = array();
{
  $query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fielddefs WHERE public = 1 ORDER BY iorder';
  $tfields = $db->GetArray($query);

	$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fieldvals WHERE upload_id = ?';
	$tmp = $db->GetArray($query,array($params['upload_id']));
	$tvals = cge_array::to_hash($tmp,'fld_id');

  for( $i = 0; $i < count($tfields); $i++ )
    {
      $tfields[$i]['attrib'] = unserialize($tfields[$i]['attribs']);
      unset($tfields[$i]['attribs']);
			$tfields[$i]['value'] = $tvals[$tfields[$i]['id']]['value'];
      
      switch($tfields[$i]['type'])
				{
				case 'textarea':
					$tfields[$i]['input'] = 
						$this->CreateTextArea(isset($tfields[$i]['attrib']['usewysiwyg']) && $tfields[$i]['attrib']['usewysiwyg'] == 1 &&
																	$this->GetPreference('allow_comment_wysiwyg',0),
																	$id,
																	$tfields[$i]['value'],
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
									list($key,$value) = explode('=',trim($one),2);
									$tmp2[trim($value)] = trim($key);
								}
							$tfields[$i]['attrib']['options'] = $tmp2;
						}
					break;
				}
      
      $fields[$tfields[$i]['name']] = $tfields[$i];
    }
}

// attempt to get an author
$author = 'anonymous';
$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( $feusers )
	{
		$tmp = $feusers->LoggedInName();
		if( $tmp )
			{
				$author = $tmp;
			}
	}

$smarty->assign('author',$author);
if( isset( $params['noauthor'] ) )
	{
		$smarty->assign('input_author',
						$this->CreateInputHidden($id, 'input_author', $author));
		$smarty->assign('noauthor',1);
						       
	}

$smarty->assign ('prompt_author', $this->Lang ('author'));
$smarty->assign ('prompt_summary',$this->Lang ('summary'));
$smarty->assign ('prompt_destname',$this->Lang ('destname'));
$smarty->assign ('info_destname',$this->Lang ('info_destname'));
$smarty->assign ('prompt_description',$this->Lang ('description'));
if( isset( $params['file_extensions'] ) )
	{
		$hidden .= 
			$this->CreateInputHidden( $id, 'file_extensions',
																$params['file_extensions'] );
	}
$captcha =& $this->GetModuleInstance('Captcha');
if( is_object($captcha) && !isset($params['nocaptcha']) )
	{
		$smarty->assign('captcha_title', $this->Lang('captcha_title'));
		$smarty->assign('captcha', $captcha->getCaptcha());
	}
$smarty->assign ('prompt_thumbnail',
								 $this->Lang ('thumbnail'));
$smarty->assign ('info_thumbnail',
								 $this->Lang ('info_thumbnail'));
$smarty->assign ('input_submit',$this->CreateInputSubmit ($id, 'do_uploadfile',
																													$this->Lang ('submit')));
if( count($fields) )
	{
		$smarty->assign('fields',$fields);
	}
$smarty->assign('max_uploadsize',$gCms->config['max_upload_size']);

$smarty->assign ('endform', $this->CreateFormEnd ());

echo $this->ProcessTemplateFromDatabase($template);
// EOF
?>