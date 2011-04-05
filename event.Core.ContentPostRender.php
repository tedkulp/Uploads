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

// get the list of categories that have expiry periods greater than 0
$query  = 'SELECT upload_category_id,upload_category_expires_hrs FROM '.cms_db_prefix().'module_uploads_categories WHERE upload_category_expires_hrs > 0';
$cats = $db->GetArray($query);
if( !$cats ) return;

// get the uploads that need to be deleted.
$query = 'SELECT U.upload_id,U.upload_name,C.upload_category_path 
          FROM '.cms_db_prefix().'module_uploads U 
          LEFT JOIN '.cms_db_prefix().'module_uploads_categories C 
          ON U.upload_category_id = C.upload_category_id 
          WHERE ';
$args = array();
$parms = array();
$now = time();
foreach( $cats as $one )
{
	$thedate = $now - $one['upload_category_expires_hrs'] * 3600;
	$thedate = $db->DbTimeStamp($thedate);
	$args[] = "( U.upload_category_id = ? AND U.upload_date < $thedate )";
	$parms[] = $one['upload_category_id'];
}
$query .= implode(' OR ',$args);

$files = $db->GetArray($query,$parms);
if( !$files ) return;

// we have something to delete.
$config = $gCms->GetConfig();
foreach( $files as $onefile )
{
	$res = $this->_AdminDoDeleteUpload($onefile['upload_id'],true);
	if( !$res )
		{
			// woot, we deleted the file
			$this->Audit($onefile['upload_id'],$this->GetName(),
									 $this->Lang('msg_auto_delete_file',$onefile['upload_name']));
		}
	else
		{
			// file not deleted, don't delete the record, just audit about it.
			$this->Audit($onefile['upload_id'],$this->GetName(),
									 $this->Lang('msg_auto_delete_file_failed',$onefile['upload_name']));
		}
}
#
# EOF
#
?>
