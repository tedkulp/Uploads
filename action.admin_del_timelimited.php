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

$this->SetCurrentTab('files');
if( !isset($params['upload_id']) || !isset($params['tl_id']) )
  {
    $this->SetError($this->Lang('error_missingparam'));
    $this->RedirectToTab($id);
  }
$tl_id = (int)$params['tl_id'];
$upload_id = (int)$params['upload_id'];

$query = 'DELETE FROM '.cms_db_prefix().'module_uploads_timelimit WHERE upload_id = ? AND tlkey_id = ?';
$dbr = $db->Execute($query,array($upload_id,$tl_id));
if( !$dbr )
  {
    echo $db->sql.'<br/>'.$db->ErrorMsg().'<br/>';
    exit();
  }

$this->Redirect($id,'admin_manage_timelimited',$returnid,array('upload_id'=>$upload_id));

#
# EOF
#
?>