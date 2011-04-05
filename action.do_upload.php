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

// a user is trying to upload something
// first check if captcha was set
$captcha =& $this->GetModuleInstance('Captcha');
if( is_object($captcha) && !isset($params['nocaptcha']) ) {
  if (!$captcha->CheckCaptcha($params['input_captcha'])) {
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_captchamismatch'));
    return;
  }
 }

$params['input_replace'] = 0; // no replacing files allowed. 
$ret = $this->AttemptUpload ($id, $params, $returnid);
if( $ret[0] == FALSE ) {
  $this->_DisplayErrorPage( $id, $params, $returnid,
			    $ret[1] );
  return;
 }
$str = $this->GetPreference('redirect_on_upload');
$id = $returnid;
if( $str != '' )
  {
    $id = ContentManager::GetPageIDFromAlias( $str );
    if( !$id )
      {
	// page not found, ignore it
	$id = $returnid;
      }
  }
$this->RedirectContent( $id );

#
# EOF
#
?>