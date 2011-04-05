<?php
#-------------------------------------------------------------------------
# Module: Uploads = allow users to upload stuff, a pseudo file manager module
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
if( !$this->CheckPermission('Modify Site Preferences') )
  {
    die('permission denied');
  }

#
# Setup
#
$this->SetCurrentTab('fields');
if( !isset($params['fid']) )
  {
    $this->SetError($this->Lang('error_missingparam'));
    $this->RedirectToTab($id);
  }

$query = 'SELECT iorder FROM '.cms_db_prefix().'module_uploads_fielddefs WHERE id = ?';
$iorder = $db->GetOne($query,array((int)$params['fid']));
if( $iorder )
  {
    $query = 'DELETE FROM '.cms_db_prefix().'module_uploads_fieldvals WHERE fld_id = ?';
    $db->Execute($query,array((int)$params['fid']));

    $query = 'DELETE FROM '.cms_db_prefix().'module_uploads_fielddefs WHERE id = ?';
    $db->Execute($query,array((int)$params['fid']));

    $query = 'UPDATE '.cms_db_prefix().'module_uploads_fielddefs SET iorder=iorder-1 WHERE iorder > ?';
    $db->Execute($query,array($iorder));
  }


$this->SetMessage($this->Lang('msg_field_deleted'));
$this->RedirectToTab($id);

#
# EOF
#
?>
