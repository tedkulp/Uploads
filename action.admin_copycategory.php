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
// initialize
//
$this->SetCurrentTab('categories');
$dest_catname = '';
$dest_catdesc = '';
$dest_catpath = '';
$orig_cat_id = '';
$config = $gCms->GetConfig();
$srcdir = '';
$destdir = '';
$catid = '';
$author = $_SESSION['cms_admin_username'];
$copyfiles = 0;

//
// setup
//
if( !isset($params['category_id']) )
	{
		$this->SetError($this->Lang('error_missingparam'));
		$this->RedirectToTab($id);
	}
$category_id = (int)$params['category_id'];
$category = Uploads::load_category_by_id($category_id);
if( !$category )
	{
		$this->SetError($this->Lang('error_missingparam'));
		$this->RedirectToTab($id);
	}

//
// handle form data
//
if( isset($params['cancel']) )
	{
		$this->SetMessage($this->Lang('operation_cancelled'));
		$this->RedirectToTab($id);
	}
else if( isset($params['submit']) )
	{
		// submit pressed.
		
		// get the parameters
		if( isset($params['category_name']) )
			{
				$dest_catname = trim($params['category_name']);
			}
		if( isset($params['category_desc']) )
			{
				$dest_catdesc = trim($params['category_desc']);
			}
		if( isset($params['category_path']) )
			{
				$dest_catpath = trim($params['category_path']);
			}
		$copyfiles = $params['copyfiles'];

		Uploads::load_admin();
		$error = _uploads_CopyCategory($this,$category_id,
																	 $dest_catname,
																	 $dest_catpath,
																	 $dest_catdesc,
																	 true, true);
		if( empty($error) )
			{
				$this->SetMessage($this->Lang('category_copied'));
				$this->RedirectToTab($id);
			}
		
		echo $this->ShowErrors($error);			
	} // on submit

//
// give everything to smarty
//
$smarty->assign('category',$category);
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_copycategory',$returnid,$params));
$smarty->assign('formend',$this->CreateFormEnd());

//
// display the template
//
echo $this->ProcessTemplate('admin_copycategory.tpl');

#
# EOF
#
?>
