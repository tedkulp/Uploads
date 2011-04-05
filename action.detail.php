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
$config = $gCms->GetConfig();

// check input data
if( !isset($params['upload_id']) )
	{
		$this->_DisplayErrorPage ($id, $params, $returnid,
															$this->Lang ('error_insufficientparams','upload_id'));
		return;
	}

// get the template
$template = 'detailrpt_'.$this->GetPreference('default_detailrpt');
if( isset( $params['detailtemplate'] ) )
	{
		$template = 'detailrpt_'.$params['detailtemplate'];
	}
else if( isset($params['template']) )
	{
		$template = 'detailrpt_'.$params['template'];
	}

// handle the sendfilepage parameter
$sendfilepage = $returnid;
if( isset($params['sendfilepage']) )
	{
		global $gCms;
		$manager =& $gCms->GetHierarchyManager();
		$node =& $manager->sureGetNodeByAlias($params['sendfilepage']);
		if (isset($node))
			{
				$content =& $node->GetContent();
				if (isset($content))
					{
						$sendfilepage = $content->Id();
					}
			}
		else
			{
				$node =& $manager->sureGetNodeById($params['sendfilepage']);
				if (isset($node))
					{
						$sendfilepage = $params['sendfilepage'];
					}
			}
	}
if( empty($sendfilepage) )
	{
		$tmp = $this->GetPreference('default_sendfilepage',-1);
		if( $tmp > 0 )
			{
				$sendfilepage = $tmp;
			}
		else
			{
				$sendfilepage = $returnid;
			}
	}

//
// Get the data
//
$imgpath = 'modules/'.basename(dirname(__FILE__)).'/images/';
$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads
           WHERE upload_id = ?';
$data = $db->GetRow($query,array($params['upload_id']));
$category = '';
if( !$data )
	{
		$this->_DisplayErrorPage ($id, $params, $returnid,
															$this->Lang ('error_nosuchrow'));
		return;
	}
$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_categories
          WHERE upload_category_id = ?';
$category = $db->GetRow($query,array($data['upload_category_id']));
$row = new StdClass();
foreach( $data as $key => $value )
{
	if( startswith($key,'upload_') )
		{
			$key = substr($key,7);
		}
	if( !empty($value) )
		{
			$row->$key = $value;
		}
}


if( $this->GetPreference('allow_delete',0) == 1 &&
		$category['upload_category_deletable'] == 1)
	{
		$row->delete_url =
			$this->CreateLink( $id, 'delete_file', $returnid, '',
												 array('upload_id' => $row->id),
												 '', true );
	}

$row->sendfile_url =
	$this->CreateLink ($id, 'sendfile', $sendfilepage, '',
										 array('upload_id'=>$row->id),
										 '', true, true, '', false);


$row->category = $category['upload_category_name'];
$row->download_url = 
	$this->CreateFrontendLink($id,$returnid,'getfile','',
														array('upload_id'=>$params['upload_id']),
														'', true, true, '', false,
														$this->_getFileURL($data['upload_id'],$data['upload_name']));
$row->filetype = $this->_GetFiletype( $data['upload_name'] );
if( $row->filetype !== false )
	{
		$row->iconurl = $imgpath.$filetype['image'];
	}
else
	{
		$onerow->iconurl = $imgpath.'unknown.png';
	}

$row->origfile_url = $config['uploads_url'].'/'.$category['upload_category_path'].'/'.$data['upload_name'];

if( !empty($data['upload_thumbnail']) )
	{
		$tnfile = $this->_categoryPath( $category['upload_category_path'].'/'.$data['upload_thumbnail']);
		if( @file_exists($tnfile) )
			{
				$tnurl = $config['uploads_url'].'/'.$category['upload_category_path'].'/'.$data['upload_thumbnail'];
				$row->thumbnail_url = $tnurl;
			}
	}

// get extra fields.
{
	$query = 'SELECT A.id,A.name,A.type,B.upload_id,B.value 
              FROM '.cms_db_prefix().'module_uploads_fielddefs A 
              LEFT JOIN '.cms_db_prefix().'module_uploads_fieldvals B 
                ON A.id = B.fld_id 
             WHERE B.upload_id = ? AND A.public = 1
             ORDER BY A.iorder ASC';
	$tmp = $db->GetArray($query,array($params['upload_id']));
	if( $tmp )
		{
			$row->fields = cge_array::to_hash($tmp,'name');
		}
}

switch($params['mode'])
	{
	case 'link':
		echo $this->CreateFrontendLink($id,$returnid,'getfile',
																	 $row->name,
																	 array('upload_id'=>$params['upload_id']),
																	 '', false, true, '', false,
																	 $this->_getFileURL($row->id,$row->name));
		return;

	case 'url':
		echo $row->download_url;
		return;

	default:
		$items = array();
		$items[] = $row;
		$smarty->assign('items',$items); // backwards compatibility.
		$smarty->assign('entry',$row);
	}

//
// Give everything to smarty
//
$this->smarty->assign('category',$this->Lang('category'));
$this->smarty->assign('id',$this->Lang('id'));
$this->smarty->assign('name',$this->Lang('name'));
$smarty->assign('areyousure',$this->Lang('areyousure'));
$smarty->assign('delete',$this->Lang('delete'));
$this->smarty->assign('date',$this->Lang('date'));
$this->smarty->assign('author',$this->Lang('author'));
$this->smarty->assign('size',$this->Lang('sizekb'));
$this->smarty->assign('details',$this->Lang('details'));
$this->smarty->assign('summary',$this->Lang('summary'));
$this->smarty->assign('description',$this->Lang('description'));
$this->smarty->assign('thumbnail',$this->Lang('thumbnail'));
$this->smarty->assign('icon',$this->Lang('icon'));
$this->smarty->assign('image',$this->Lang('image'));

//
// Process The template
//
if( !isset($params['nooutput']) )
	{
		echo $this->ProcessTemplateFromDatabase($template);
	}
#
# EOF
#
?>
