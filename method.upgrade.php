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

$taboptarray = array ('mysql' => 'TYPE=MyISAM');

    $current_version = $oldversion;
    switch( $oldversion )
      {
      case "1.1.0":
      case "1.1.1":
      case "1.1.2":
      case "1.1.3":
      case "1.1.4":
      case "1.1.5":
      case "1.1.6":
	$this->SetPreference ('send_upload_notifications_to','');
	$this->SetTemplate( 'upload_emailtemplate', $this->dflt_emailnotifytemplate );
	return;
      }

    switch ($oldversion)
    {
    case "1.0":
    case "1.0.1":
    case "1.0.2":
    case "1.0.3":
    case "1.0.4":
    case "1.0.5":
    case "1.0.6":
    case "1.0.7":
    case "1.0.8":
    case "1.0.9":
    case "1.2.0":
    case '1.2.1':
    case '1.2.2':
    case '1.2.3':
      return false;

    case '1.3.0-beta3':
      {
	$this->SetPreference ('download_chunksize',8);
      }
    case '1.3.0-beta5':
      {
	// add a groups field to the categories table
	// it contains FEU group ID's (comma seperated)
	$db =& $this->GetDb();
	$dict = NewDataDictionary($db);
	$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_uploads_categories",
					"upload_category_groups C(255)");
	$dict->ExecuteSQLArray( $sqlarray );
      }
    case '1.3.0':
    case '1.3.1':
      {
	// and an upload_thumbnail field to the uploads table.
	$db =& $this->GetDb();
	$dict = NewDataDictionary($db);
	$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_uploads",
					"upload_thumbnail C(255)");
	$dict->ExecuteSQLArray( $sqlarray );

	//
	// Get list of categories
	//
	$query = 'SELECT upload_category_id,upload_category_path 
                    FROM '.cms_db_prefix().'module_uploads_categories';
	$tmp = $db->GetArray($query);
	$categories = array();
	foreach( $tmp as $one )
	  {
	    $categories[$one['upload_category_id']] = $one;
	  }

	//
	// For each file
	//
	$now = $db->DbTimeStamp(time());
	$query = 'SELECT upload_category_id,upload_id,upload_name 
                    FROM '.cms_db_prefix().'module_uploads';
	$dbr = $db->Execute($query);
	$updatequery = 'UPDATE '.cms_db_prefix().'module_uploads
                           SET upload_thumbnail = ?
                         WHERE upload_id = ?';
	while( $dbr && ($row = $dbr->FetchRow()) )
	  {
	    // get path to thumbnail
	    $dir = cms_join_path($config['uploads_path'],
				 $categories[$row['upload_category_id']]['upload_category_path']);
	    $oldthumb = cms_join_path($dir,'.thumbs',
				      $row['upload_id'].'_thumb');
	    if( !file_exists($oldthumb) ) continue;

	    $tmp = @getimagesize($oldthumb);
	    if( !is_array($tmp) || $tmp[0] == 0 ) continue;

	    $thumbtype = $tmp[2];
	    $thumbext = @image_type_to_extension($thumbtype);
	    $fnameext = strrchr($row['upload_name'],'.');
	    $fname = substr($row['upload_name'],0,strlen($row['upload_name'])-strlen($fnameext));
	    $thumbname = 'thumb_'.$fname.$thumbext;
	    $newthumb = cms_join_path($dir,$thumbname);
	    
	    // rename thumbnail files
	    @rename($oldthumb,$newthumb);
	    @unlink($oldthumb);

	    // update the database
	    $db->Execute($updatequery,array($thumbname,$row['upload_id']));
	  }

        // remove the .thumbs directory for each category
	for( $i = 0; $i < count($categories); $i++ )
	  {
	    $dir = cms_join_path($config['uploads_path'],
				 $categories[$i]['uploads_category_path'],
				 '.thumbs');
	    recursive_delete($dir);
	  }
      }
    case '1.4':
    case '1.4.1':
      {
	$db =& $this->GetDb();
	$dict = NewDataDictionary($db);
	$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_uploads_categories",
					"upload_category_deletable I");
	$dict->ExecuteSQLArray( $sqlarray );
      }

    case '1.5':
    case '1.5.1':
      {
	// sendfile form template
	$fn = dirname(__FILE__).'/templates/orig_sendfileform_template.tpl';
	if( file_exists( $fn ) )
	  {
	    $template = @file_get_contents($fn);
	    $this->SetPreference('sendfileform_sysdefault',$template);
	    $this->SetTemplate('sendfileform_default',$template);
	    $this->SetPreference('default_sendfileform','default');
	  }

	// yousenditform template
	$fn = dirname(__FILE__).'/templates/orig_yousenditform_template.tpl';
	if( file_exists( $fn ) )
	  {
	    $template = @file_get_contents($fn);
	    $this->SetPreference('yousenditform_sysdefault',$template);
	    $this->SetTemplate('yousenditform_default',$template);
	    $this->SetPreference('default_yousenditform','default');
	  }

	// template used for sendfile email
	$fn = dirname(__FILE__).'/templates/orig_sendfilerpt_template.tpl';
	if( file_exists($fn) )
	  {
	    $template = @file_get_contents($fn);
	    $this->SetTemplate( 'upload_sendfilerpt', $template);
	  }
      }

    case '1.6':
      {
	$db =& $this->GetDb();
	$dict = NewDataDictionary($db);

	// a table for field definitions.
	$flds = "
         id      I KEY AUTO,
         name    C(255),
         type    C(20),
         attribs X,
         iorder  I,
         public  I1";
	$sqlarray = $dict->CreateTableSQL( cms_db_prefix().'module_uploads_fielddefs',
					   $flds, $taboptarray);
	$dict->ExecuteSQLArray ($sqlarray);


	// a table for field values
	$flds = "upload_id I KEY,
         fld_id    I KEY,
         value     X";
	$sqlarray = $dict->CreateTableSQL( cms_db_prefix().'module_uploads_fieldvals',
					   $flds, $taboptarray);
	$dict->ExecuteSQLArray ($sqlarray);

	// a table for time limited urls
	$flds = "
         tlkey_id  I KEY AUTO,
         upload_id I,
         email     C(255),
         url_key   C(16),
         created   ".CMS_ADODB_DT.",
         expires   ".CMS_ADODB_DT.",
         max_downloads I";
	$sqlarray = $dict->CreateTableSQL( cms_db_prefix().'module_uploads_timelimit',
					   $flds, $taboptarray);
	$dict->ExecuteSQLArray ($sqlarray);

	$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_uploads_downloads",
					"url_key C(40)");
	$dict->ExecuteSQLArray( $sqlarray );

      }

    case '1.9':
    case '1.9.1':
    case '1.9.2':
    case '1.9.3':
    case '1.9.4':
      {
	$db =& $this->GetDb();
	$dict = NewDataDictionary($db);
	$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_uploads_categories",
					"upload_category_expires_hrs I");
	$dict->ExecuteSQLArray( $sqlarray );

	$this->SetPreference ('category_expiry',0);
	$this->AddEventHandler('Core','ContentPostRender');
      }

    case '1.10':
    case '1.10.1':
      {
	$this->CreatePermission ('Upload Files to Uploads', 'Upload Files to Uploads');
      }

    case '1.10.2':
    case '1.10.3':
    case '1.10.4':
      {
	$db =& $this->GetDb();
	$dict = NewDataDictionary($db);
	$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_uploads_categories",
					"upload_category_scannable I1");
	$dict->ExecuteSQLArray( $sqlarray );

	$query = 'UPDATE '.cms_db_prefix().'module_uploads_categories
                     SET upload_category_scannable = 1';
	$db->Execute($query);

	$sqlarray = $dict->CreateIndexSQL('index_download_fileid',cms_db_prefix().'module_uploads_downloads','file_id');
	$dict->ExecuteSQLArray($sqlarray);
      }
    }
    // anything past here should be fine.
    return;
?>