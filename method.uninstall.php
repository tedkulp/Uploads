<?php
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
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

    $db =& $this->GetDb();

    // remove the database table
    $dict = NewDataDictionary ($db);
    $sqlarray = $dict->DropTableSQL (cms_db_prefix ()."module_uploads");
    $dict->ExecuteSQLArray ($sqlarray);

    // remove the sequence
    $db->DropSequence (cms_db_prefix ()."module_uploads_seq");

    // remove the category table
    $sqlarray =
      $dict->DropTableSQL (cms_db_prefix ()."module_uploads_categories");

    // remove it's sequence
    $db->DropSequence (cms_db_prefix ()."module_uploads_categories_seq");
    $dict->ExecuteSQLArray ($sqlarray);

    // remove the downloads table
    $sqlarray =
      $dict->DropTableSQL (cms_db_prefix ()."module_uploads_downloads");

    // and it's sequence
    $db->DropSequence (cms_db_prefix ()."module_uploads_downloads_seq");
    $dict->ExecuteSQLArray ($sqlarray);

    // remove the filetypes table
    $sqlarray =
      $dict->DropTableSQL (cms_db_prefix ()."module_uploads_filetypes");
    $dict->ExecuteSQLArray ($sqlarray);

    // and it's sequence
    $db->DropSequence (cms_db_prefix ()."module_uploads_filetypes_seq");

    $sqlarray =
      $dict->DropTableSQL (cms_db_prefix ()."module_uploads_fielddefs");
    $dict->ExecuteSQLArray ($sqlarray);

    $sqlarray =
      $dict->DropTableSQL (cms_db_prefix ()."module_uploads_fieldvals");
    $dict->ExecuteSQLArray ($sqlarray);

    $sqlarray =
      $dict->DropTableSQL (cms_db_prefix ()."module_uploads_timelimit");
    $dict->ExecuteSQLArray ($sqlarray);


    // remove the permissions
    $this->RemovePermission ('Manage Uploads');
    $this->RemovePermission ('Upload Files to Uploads');

    // remove all of the the preferences for this module
    $this->RemovePreference ();

    // remove templates
    $templates = $this->ListTemplates();
    foreach( $templates as $tpl )
      {
	$this->DeleteTemplate($tpl);
      }

    // remove events
    $this->RemoveEvent("OnUpload" );
    $this->RemoveEvent("OnRemove" );
    $this->RemoveEvent("OnDownload" );
    $this->RemoveEvent("OnCreateCategory" );
    $this->RemoveEvent("OnDeleteCategory" );
    $this->RemoveEventHandler('Core','ContentPostRender');

    // put mention into the admin log
    $this->Audit (0, $this->Lang ('friendlyname'),
		  $this->Lang ('uninstalled'));
?>