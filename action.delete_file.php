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

if( !isset($params['upload_id']) ) return;

$upload_id = (int)$params['upload_id'];

// 1.  get the upload info
$query = 'SELECT upload_category_id FROM '.cms_db_prefix().'module_uploads WHERE upload_id = ?';
$category_id = $db->GetOne($query,array($upload_id));
if( !$category_id ) {
	return;
 }

// 2.  get the category
$query = 'SELECT upload_category_deletable FROM '.cms_db_prefix().'module_uploads_categories
           WHERE upload_category_id = ?';
$deletable = $db->GetOne($query,array($category_id));

// 2.  check if we can delete
if( !$this->GetPreference('allow_delete',0) == 1 || !$deletable )
	{
		$this->RedirectContent($returnid);
	}

$this->_AdminDoDeleteUpload( $upload_id, $params, $returnid, 0 );
$this->RedirectContent($returnid);

// 
#
# EOF
#
?>