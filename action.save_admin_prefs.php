<?php
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager module
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

if (!$this->CheckPermission ('Modify Site Preferences'))
  {
    return;
  }

$this->SetPreference ('autowatermark',$params['autowatermark']);
$this->SetPreference ('valid_uploadextensions',
		      isset ($params['valid_uploadextensions']) ?
		      $params['valid_uploadextensions'] : '0');
$this->SetPreference ('subnet_exclusions',
		      isset ($params['subnet_exclusions']) ?
		      $params['subnet_exclusions'] : '0');
$this->SetPreference ('create_dummy_index_html',
		      isset ($params['input_dummy_index_html']) ?
		      $params['input_dummy_index_html'] : '0');
$this->setPreference ('send_upload_notifications_to',
		      isset ($params['email_on_upload']) ?
		      $params['email_on_upload'] : '' );    
$this->SetPreference ('redirect_on_upload',
		      isset ($params['redirect_on_upload']) ?
		      $params['redirect_on_upload'] : '' );    
$this->SetPreference ('autothumbnail_extensions',
		      isset ($params['autothumbnail_extensions']) ?
		      $params['autothumbnail_extensions'] : '' );
$this->SetPreference ('autothumbnail_size',
		      isset ($params['autothumbnail_size']) ?
		      $params['autothumbnail_size'] : '' );
$this->SetPreference ('download_chunksize',
		      isset ($params['download_chunksize']) ?
		      $params['download_chunksize'] : 8 );
$this->SetPreference ('allow_delete',
		      isset ($params['allow_delete']) ? $params['allow_delete'] : 0 );
$this->SetPreference ('redirect_on_sendfile',
		      isset ($params['redirect_on_sendfile']) ?
		      $params['redirect_on_sendfile'] : '' );    
$this->SetPreference('timelimited_hours',(int)$params['timelimited_hours']);
$this->SetPreference('timelimited_downloads',(int)$params['timelimited_downloads']);
$this->SetPreference('getfile_resultpage',(int)$params['getfile_resultpage']);
$this->SetPreference('timelimited_autodelete',(int)$params['timelimited_autodelete']);
$this->SetPreference('timelimited_subject',trim($params['timelimited_subject']));

$this->SetPreference('default_sendfilepage',$params['default_sendfilepage']);
$this->SetPreference('category_expiry',(int)$params['category_expiry']);
$this->SetPreference('allow_upload_sendfile',(int)$params['allow_upload_sendfile']);
$this->RedirectToTab( $id, 'admin_prefs' );

// EOF
?>