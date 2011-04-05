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
if (!$this->CheckPermission ('Manage Uploads')) exit;

//
// initialization
//
$this->SetCurrentTab('categories');
if( isset($params['cancel']) )
	{
		$this->RedirectToTab($id);
	}
if( !isset($params['cat_multiselect']) && !isset($params['bulkcopy_submit']) )
	{
		$this->SetError($this->Lang('error_nothing_selected'));
		$this->RedirectToTab($id);
	}

switch( $params['multiaction'] )
	{
	case 'delete':
		foreach( $params['cat_multiselect'] as $onecategory )
			{
				$msg = $this->_AdminDoDeleteCategory($onecategory);
				if( $msg )
					{
						$this->SetError($msg);
						$this->RedirectToTab($id);
					}
			}
		break;

	case 'copy':
		{
			if( isset($params['bulkcopy_submit']) )
				{
					// do data validation
					$error = '';
					if( !isset($params['copycategory']) )
						{
							$error = $this->Lang('error_missing_invalid','copycategory');
						}

					if( empty($error) )
						{
							foreach( $params['copycategory'] as $category_id => &$onecat )
								{
									$onecat['name'] = trim($onecat['name']);
									$onecat['description'] = trim($onecat['description']);
									$onecat['path'] = trim($onecat['path']);

									Uploads::load_admin();
									$error = _uploads_CopyCategory($this,$category_id,
																								 $onecat['name'],
																								 $onecat['path'],
																								 $onecat['description'],
																								 $onecat['dofiles'],
																								 true);
									if( $error ) break;
								}
						}

					if( !empty($error) )
						{
							$this->SetError($error);
						}

					$this->RedirectToTab($id);
					
				} // submit

			$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_categories
                 WHERE upload_category_id IN ('.implode(',',$params['cat_multiselect']).')';
			$tmp = $db->GetArray($query);
			$smarty->assign('categories',$tmp);
			$parms = array();
			$parms['multiaction'] = $params['multiaction'];
			if( isset($params['cat_multiselect']) )
				$parms['categories'] =  implode(',',$params['cat_multiselect']);
			$smarty->assign('category_ids',$params['cat_multiselect']);
			$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_multicategory',$returnid,$parms));
			$smarty->assign('formend',$this->CreateFormEnd());
			echo $this->ProcessTemplate('admin_cat_bulkcopy.tpl');
			return;
		}
		break;

	default:
		$this->SetError($this->Lang('error_missing_invalid','category_id'));
		$this->RedirectToTab($id);
	}


$this->RedirectToTab($id);

#
# EOF
#
?>