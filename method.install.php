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

$dict = NewDataDictionary ($db);

// table schema description
$flds = "upload_id I KEY,
             upload_category_id I,
             upload_name C(255),
             upload_author C(255),
             upload_summary C(255), 
             upload_description X,
             upload_ip C(255),
             upload_size I,
             upload_date ".CMS_ADODB_DT.",
             upload_key  C(255),
             upload_thumbnail C(255)
	    ";

// create it. This should do error checking, but I'm a lazy sod.
$taboptarray = array ('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL (cms_db_prefix()."module_uploads",
				   $flds, $taboptarray);
$dict->ExecuteSQLArray ($sqlarray);
    
// a table for downloads
$flds = "download_id I KEY,
 	 file_id     I, 
	 download_date ".CMS_ADODB_DT.",
         download_ip   C(255),
         download_user C(255),
         url_key  C(40)
	 ";

// create it. This should do error checking, but I'm a lazy sod.
$taboptarray = array ('mysql' => 'TYPE=MyISAM');
$sqlarray =
  $dict->CreateTableSQL (cms_db_prefix ()."module_uploads_downloads",
			 $flds, $taboptarray);
$dict->ExecuteSQLArray ($sqlarray);

// a table for categories
$flds = "upload_category_id I KEY,
	     upload_category_name C(255),
	     upload_category_description X,
             upload_category_path C(255) KEY,
	     upload_category_listable I,
             upload_category_groups C(255),
             upload_category_deletable I,
             upload_category_expires_hrs I,
             upload_category_scannable I1
	    ";

// create it. This should do error checking, but I'm a lazy sod.
$taboptarray = array ('mysql' => 'TYPE=MyISAM');
$sqlarray =
  $dict->CreateTableSQL (cms_db_prefix ()."module_uploads_categories",
			 $flds, $taboptarray);
$dict->ExecuteSQLArray ($sqlarray);

// a table for file types
$flds = "id I,
             sortorder I,
             name  C(255),
             description X,
             extensions C(255),
             image C(255)
            ";
$taboptarray = array ('mysql' => 'TYPE=MyISAM');
$sqlarray =
  $dict->CreateTableSQL (cms_db_prefix()."module_uploads_filetypes",
			 $flds, $taboptarray);
$dict->ExecuteSQLArray ($sqlarray);

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
$flds = "tlkey_id  I KEY AUTO,
         upload_id I,
         email     C(255),
         url_key   C(16),
         created   ".CMS_ADODB_DT.",
         expires   ".CMS_ADODB_DT.",
         max_downloads I";
$sqlarray = $dict->CreateTableSQL( cms_db_prefix().'module_uploads_timelimit',
				   $flds, $taboptarray);
$dict->ExecuteSQLArray ($sqlarray);

// create a sequence
$db->CreateSequence (cms_db_prefix ()."module_uploads_seq");
    
// and another one
$db->CreateSequence (cms_db_prefix ()."module_uploads_categories_seq");

// and a third one
$db->CreateSequence (cms_db_prefix ()."module_uploads_downloads_seq");

// and a fourth
$db->CreateSequence (cms_db_prefix ()."module_uploads_filetypes_seq");

// and an index.
$sqlarray = $dict->CreateIndexSQL('index_download_fileid',cms_db_prefix().'module_uploads_downloads','file_id');
$dict->ExecuteSQLArray($sqlarray);

// create a permission
$this->CreatePermission ('Manage Uploads', 'Manage Uploads');
$this->CreatePermission ('Upload Files to Uploads', 'Upload Files to Uploads');

// create a preference
$this->SetPreference ("valid_uploadextensions",
		      "png,gif,jpg,JPEG,bmp,wmf,wma,wmv,mpg,zip,tar,gz,bz2,mp3,wav,au,ogg,xml,pdf");
$this->SetPreference ("subnet_exclusions", "" );
$this->SetPreference ('create_dummy_index_html', 1);
$this->SetPreference ('send_upload_notifications_to','');
$this->SetPreference ('requirefilename_extensions',1);
$this->SetPreference ('autothumbnail_extensions','gif,jpg,jpeg,bmp,png');
$this->SetPreference ('autothumbnail_size',80);
$this->SetPreference ('download_chunksize',8);
$this->SetPreference ('category_expiry',0);

$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.
  'templates'.DIRECTORY_SEPARATOR.'orig_uploadform_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('uploadform_sysdefault',$template);
    $this->SetTemplate('uploadform_default',$template);
    $this->SetPreference('default_uploadform','default');
  }

$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.
  'templates'.DIRECTORY_SEPARATOR.'orig_summaryrpt_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('summaryrpt_sysdefault',$template);
    $this->SetTemplate('summaryrpt_default',$template);
    $this->SetPreference('default_summaryrpt','default');
  }

$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.
  'templates'.DIRECTORY_SEPARATOR.'orig_detailrpt_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('detailrpt_sysdefault',$template);
    $this->SetTemplate('detailrpt_default',$template);
    $this->SetPreference('default_detailrpt','default');
  }

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

// template used for email notifications
$fn = dirname(__FILE__).'/templates/orig_emailnotify_template.tpl';
if( file_exists($fn) )
  {
    $template = @file_get_contents($fn);
    $this->SetTemplate( 'upload_emailtemplate', $template);
  }

// Event handlers
$this->CreateEvent( "OnUpload" );
$this->CreateEvent( "OnRemove" );
$this->CreateEvent( "OnDownload" );
$this->CreateEvent( "OnCreateCategory" );
$this->CreateEvent( "OnDeleteCategory" );

$this->AddEventHandler('Core','ContentPostRender');

// Default file types
$this->_InsertDefaultFileTypes();

// put mention into the admin log
$this->Audit (0, $this->Lang ('friendlyname'),
	      $this->Lang ('installed', $this->GetVersion ()));

?>