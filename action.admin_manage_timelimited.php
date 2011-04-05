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
if( !isset($params['upload_id']) )
	{
    $this->SetError($this->Lang('error_missingparam'));
    $this->RedirectToTab($id);
	}

// auto delete entries
$nhours = $this->GetPreference('timelimited_autodelete',0);
if( $nhours > 0 )
	{
		$time = strtotime('- $nhours hours');
		$query = 'DELETE FROM '.cms_db_prefix()."module_uploads_downloads 
               WHERE expires < $time";
		$db->Execute($query);
	}

$upload = $this->GetUploadDetails($params['upload_id']);
$smarty->assign('upload',$upload);
$smarty->assign('addkey_link',
								$this->CreateImageLink($id,'admin_add_timelimited',$returnid,
																			 $this->Lang('add_timelimited_key'),
																			 'icons/system/newobject.gif',
																			 $params,'','',false));

$now = $db->DbTimeStamp(time());
$query = 'SELECT * FROM '.cms_db_prefix()."module_uploads_timelimit
          WHERE upload_id = ?
          AND ((expires > $now) OR (expires IS NULL))";
$tdata = $db->GetArray($query,array($params['upload_id']));
$data = array();
if( $tdata )
	{
		for( $i = 0; $i < count($tdata); $i++ )
			{
				$rec =& $tdata[$i];
				if( is_null($rec['url_key']) ) continue;

				$q2 = 'SELECT COUNT(file_id) FROM '.cms_db_prefix().'module_uploads_downloads
                WHERE file_id = ? AND url_key = ?';
				$rec['downloads'] = $db->GetOne($q2,array($rec['upload_id'],$rec['url_key']));
				$rec['download_url'] = $this->CreateURL($id,'getfile',$returnid,
																								array('url_key'=>$rec['url_key']),
																								false,
																								$this->_getTimeLimitedURL($rec['url_key']));
				$rec['delete_link'] = $this->CreateImageLink($id,'admin_del_timelimited',
																										 $returnid,
																										 $this->Lang('delete'),
																										 'icons/system/delete.gif',
																										 array('upload_id'=>$params['upload_id'],
																													 'tl_id'=>$rec['tlkey_id']));

				$data[] = $rec;
			}

		if( $data )
			{
				$smarty->assign('data',$data);
			}
	}

$smarty->assign('back_link',$this->CreateImageLink($id,'defaultadmin',$returnid,
																									 $this->Lang('lbl_back'),
																									 'icons/system/back.gif',
																									 array(), '', '', false));

echo $this->ProcessTemplate('admin_manage_timelimited.tpl');
#
# EOF
#
?>