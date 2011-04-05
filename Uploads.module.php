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

///////////////////////////////////////////////////////////////////////////
// This module is derived from CGExtensions 
$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) )
{
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);

///////////////////////////////////////////////////////////////////////////
class Uploads extends CGExtensions
{
	var $upload_extensions = '';
	var $_filetypes = '';

	/*---------------------------------------------------------
	load_common()
	---------------------------------------------------------*/
	public static function load_common()
	{
		require_once(dirname(__FILE__).'/functions.common_tools.php');
	}

	/*---------------------------------------------------------
	load_admin()
  private
	---------------------------------------------------------*/
	public static function load_admin()
	{
		require_once(dirname(__FILE__).'/functions.admin_tools.php');
	}

	/*---------------------------------------------------------
	_categoryPath( $categorypath )
  private
	
	Generate a path to a certain category
	---------------------------------------------------------*/
	public function _categoryPath( $categorypath )
	{
		global $gCms;
		return $gCms->config['uploads_path'].DIRECTORY_SEPARATOR.$categorypath;
	}


	/*---------------------------------------------------------
	UploadPath( $categorypath, $filename )
  private
	
	Generate a file specification to a file in a certain 
	category.
	---------------------------------------------------------*/
	public function _uploadPath( $categorypath, $filename )
	{
		return $this->_categoryPath( $categorypath ).DIRECTORY_SEPARATOR.$filename;
	}


	/*---------------------------------------------------------
	_testip($range,$ip)
	NOT PART OF THE MODULE API
	
	This is a function to match an IP address against an 
	address range specification.
	---------------------------------------------------------*/
	protected function _testip($range,$ip) 
	{
		$result = 1;
		
		# IP Pattern Matcher
		# J.Adams <jna@retina.net>
		#
		# Matches:
		#
		# xxx.xxx.xxx.xxx        (exact)
		# xxx.xxx.xxx.[yyy-zzz]  (range)
		# xxx.xxx.xxx.xxx/nn    (nn = # bits, cisco style -- i.e. /24 = class C)
		#
		# Does not match:
		# xxx.xxx.xxx.xx[yyy-zzz]  (range, partial octets not supported)
		
		if (ereg("([0-9]+)\.([0-9]+)\.([0-9]+)\.([0-9]+)/([0-9]+)",$range,$regs)) {
			# perform a mask match
			$ipl = ip2long($ip);
			$rangel = ip2long($regs[1] . "." . $regs[2] . "." . $regs[3] . "." . $regs[4]);
		
			$maskl = 0;
		
			for ($i = 0; $i< 31; $i++) {
				if ($i < $regs[5]-1) {
					$maskl = $maskl + pow(2,(30-$i));
				}
			}
		
			if (($maskl & $rangel) == ($maskl & $ipl)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			# range based
			$maskocts = split("\.",$range);
			$ipocts = split("\.",$ip);
		
			# perform a range match
			for ($i=0; $i<4; $i++) {
				if (ereg("\[([0-9]+)\-([0-9]+)\]",$maskocts[$i],$regs)) {
					if ( ($ipocts[$i] > $regs[2]) || ($ipocts[$i] < $regs[1])) {
						$result = 0;
					}
				}
				else
				{
					if ($maskocts[$i] <> $ipocts[$i]) {
						$result = 0;
					}
				}
			}
		}
		return $result;
	}


	/*---------------------------------------------------------
	getCategoryFromName()
	PUBLIC
	
	return the category id given a name, or false
	---------------------------------------------------------*/
	public static function getCategoryFromName($name)
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix ()."module_uploads_categories".
		" WHERE upload_category_name = ?";
		$row = $db->GetRow($query,array($name));
		if( !$row ) 
		{
			return false;
		}
		return $row;
	}


	/*---------------------------------------------------------
	load_category_by_id()
	PUBLIC
	
	return the category info given a category id, or FALSE
	---------------------------------------------------------*/
	public static function load_category_by_id($id)
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_categories
               WHERE upload_category_id = ?';
		$row = $db->GetRow($query,array($id));
		if( !$row ) return false;
		return $row;
	}


	/*---------------------------------------------------------
	category_path_in_use()
	PUBLIC
	
	returns TRUE if category path is in use, FALSE otherwise
	---------------------------------------------------------*/
	public static function category_path_in_use($path)
	{
		global $gCms;
		$db =& $gCms->GetDb();

		$query = 'SELECT upload_category_id FROM '.cms_db_prefix().'module_uploads_categories
               WHERE upload_category_path = ?';
		$tmp = $db->GetOne($query,array($path));
		if( $tmp ) return TRUE;
		return FALSE;
	}


	/*---------------------------------------------------------
	getCategoryList()
	PUBLIC
	
	return a list of category names and id's
	---------------------------------------------------------*/
	public static function getCategoryList()
	{
		global $gCms;
		$db =& $gCms->GetDB();
		$categorylist = array();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories";
		$dbresult = $db->Execute( $query );
		if( !$dbresult )
		{
			return $categorylist;
		}
		
		while( $row = $dbresult->FetchRow() )
		{
			$categorylist[$row['upload_category_name']] = $row['upload_category_id'];
		}
		return $categorylist;
	}


	/*---------------------------------------------------------
	getCategoryPathFromID()
	PUBLIC
	
	return the category path given a category id
	---------------------------------------------------------*/
	public static function getCategoryPathFromID( $category_id )
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories".
		" WHERE upload_category_id = ?";
		$dbresult = $db->Execute( $query, array( $category_id ) );
		if( !$dbresult )
		{
			return;
		}
		$row = $dbresult->FetchRow();
		if( !$row )
		{
			return;
		}
		return $row['upload_category_path'];
	}


	/*---------------------------------------------------------
	getCategoryPathFromFileID()
	PUBLIC
	
	return the category path given a file id
	---------------------------------------------------------*/
	public static function getCategoryPathFromFileID( $file_id )
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads".
		" WHERE upload_id = ?";
		$dbresult = $db->Execute( $query, array( $file_id) );
		if( !$dbresult )
		{
			return;
		}
		
		$row = $dbresult->FetchRow();
		if( !$row )
		{
			return;
		}
		$cat = $row['upload_category_id'];
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories WHERE upload_category_id = ?";
		$dbresult = $db->Execute( $query, array( $cat ) );
		if( !$dbresult )
		{
			return;
		}
		$row = $dbresult->FetchRow();
		if( !$row )
		{
			return;
		}
		return $row['upload_category_path'];
	}


	/*---------------------------------------------------------
	get_category_file_list( $category_id )
	PUBLIC
	
	return a list of files in the given category
	---------------------------------------------------------*/
	public static function get_category_file_list( $category_id )
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads
               WHERE upload_category_id = ?";
		$filelist = $db->GetArray( $query, array( $category_id ) );
		if( !$filelist )
		{
			return FALSE;
		}
		return $filelist;
	}


	/*---------------------------------------------------------
	getFileName( $file_id )
	PUBLIC
	
	return a list of files in the given category
	---------------------------------------------------------*/
	public static function getFileName( $file_id )
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads".
		" WHERE upload_id = ?";
		$dbresult = $db->Execute( $query, array( $file_id ) );
		$row = $dbresult->FetchRow();
		return $row['upload_name'];
	}
	
	
	/*---------------------------------------------------------
	getFileDetails( $file_id )
	PUBLIC
	
	return a list of files in the given category
	---------------------------------------------------------*/
	public static function getFileDetails( $file_id )
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads".
		" WHERE upload_id = ?";
		$dbresult = $db->Execute( $query, array( $file_id ) );
		$row = $dbresult->FetchRow();
		return $row;
	}

	
	/*---------------------------------------------------------
	_getUploadCategoryDetails( $category_id )
	NOT PART OF THE MODULE API
	
	returns an associative array representing the specific
	row of the categories database matching the supplied 
	category id
	---------------------------------------------------------*/
	public static function _getUploadCategoryDetails( $category_id )
	{
		global $gCms;
		$db =& $gCms->GetDb();
		$query = "SELECT * FROM ".cms_db_prefix()."module_uploads_categories 
		WHERE upload_category_id = ?";
		$dbresult = $db->Execute( $query, array( $category_id ) );
		if( !$dbresult ) {
			return;
		}
	
		$row = $dbresult->FetchRow();
		if( !$row ) {
			return;
		}
		return $row;
	}
	
	
	/*---------------------------------------------------------
	_scandir( $dir, $sort )
	NOT PART OF THE MODULE API
	
	Scan a directory and return a sorted list.
	---------------------------------------------------------*/
	protected function _scandir($dir = './', $sort = 0)
	{
		$dir_open = @opendir($dir);

		if (! $dir_open)
			return false;

		$files = array();
		while (($dir_content = readdir($dir_open)) != false)
		{
			// we ignore index.html files if the preference is set
			if( $dir_content == 'index.html' && $this->GetPreference('create_dummy_index_html'))
			{
				continue;
			}

			// ignore dot files
			if( preg_match( "/^\./", $dir_content ) )
			{
				continue;
			}

			$files[] = $dir_content;
		}

		if( is_array( $files ) )
		{
			if ($sort == 1)
				rsort($files, SORT_STRING);
			else
				sort($files, SORT_STRING);
		}
		return $files;
	}
	
	
	/*---------------------------------------------------------
	_isValidFilename( $filename )
	NOT PART OF THE MODULE API
	
	Test a string to see if it is a valid filename (i.e) the
	extension falls in our allowed extensions, and there are
	no invalid characters.
	---------------------------------------------------------*/
	public function _isValidFilename ($filename)
	{
		$file_name = trim ($filename);
		$extension = strtolower (strrchr ($file_name, "."));

		// check for extension or dot file.
		if( !strpos($file_name,'.') ) return false;
	
		// array of files we don't allow
		$ext_str = $this->upload_extensions;
		if( $ext_str == '' )
		{
			$ext_str = $this->GetPreference ("valid_uploadextensions");
		}
		$ext_array = explode(",", $ext_str);
		$ext_count = count ($ext_array);
	
		if (!$file_name)
		{
			return false;
		}
		else
		{
			if (empty($ext_array) || !$ext_array)
			{
				return true;
			}
			else
			{
				foreach ($ext_array as $value)
				{
					$first_char = substr ($value, 0, 1);
					if ($first_char <> ".")
					{
						$extensions[] = ".".strtolower ($value);
					}
					else
					{
						$extensions[] = strtolower ($value);
					}
				}

				$valid_extension = false;
				foreach ($extensions as $value)
				{
					if ($value == $extension)
					{
						$valid_extension = true;
						break;
					}
				}
			return $valid_extension;
		}
	}
}


  /*-----------------------------------------------------------
   END OF UTILITY FUNCTIONS
   ---------------------------------------------------------*/


  /*---------------------------------------------------------
   GetHeaderHTML()
   ---------------------------------------------------------*/
  public function GetHeaderHTML()
  {
    $txt = '';
    $obj =& $this->GetModuleInstance('JQueryTools');
    if( is_object($obj) )
      {
$tmpl = <<<EOT
{JQueryTools action='incjs' exclude='form'}
{JQueryTools action='ready'}
EOT;
      $txt .= $this->ProcessTemplateFromData($tmpl);

$txt .= <<<EOT
<script type="text/javascript">
	jQuery(document).ready(function(){
  	 jQuery('.fancybox').fancybox();
  });
</script>
EOT;

      }
    return $txt;
  }	


  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  public function GetName ()
  {
    return 'Uploads';
  }


  /*---------------------------------------------------------
   GetFriendlyName()
   ---------------------------------------------------------*/
  public function GetFriendlyName ()
  {
    return $this->Lang('friendlyname');
  }


	/*---------------------------------------------------------
	GetEventDescription( $name )
	---------------------------------------------------------*/
	public function GetEventDescription( $name )
	{
		switch ( $name )
		{
			case 'OnUpload':
				return $this->Lang('info_event_onupload');
				break;
			case 'OnRemove':
				return $this->Lang('info_event_onremove');
				break;
			case 'OnDownload':
				return $this->Lang('info_event_ondownload');
				break;
			case 'OnCreateCategory':
				return $this->Lang('info_event_oncreatecategory');
				break;
			case 'OnDeleteCategory':
				return $this->Lang('info_event_ondeletecategory');
				break;
		}
		return "";
	}


	/*---------------------------------------------------------
	GetVersion()
	---------------------------------------------------------*/
	public function GetVersion()
	{
		return '1.11.6';
	}


	/*---------------------------------------------------------
	GetEventHelp( $eventname )
	---------------------------------------------------------*/
	public function GetEventHelp ( $eventname )
	{
		return $this->Lang ('help_'.$eventname);
	}

	/*---------------------------------------------------------
	GetHelp()
	---------------------------------------------------------*/
	public function GetHelp ()
	{
		return $this->Lang ('help');
	}


	/*---------------------------------------------------------
	GetAuthor()
	---------------------------------------------------------*/
	public function GetAuthor ()
	{
		return 'calguy1000';
	}


	/*---------------------------------------------------------
	GetAuthorEmail()
	---------------------------------------------------------*/
	public function GetAuthorEmail ()
	{
		return 'calguy1000@cmsmadesimple.org';
	}


	/*---------------------------------------------------------
	GetChangeLog()
	---------------------------------------------------------*/
	public function GetChangeLog ()
	{
		$fn = dirname(__FILE__).'/changelog.inc';
		return @file_get_contents($fn);
	}


	/*---------------------------------------------------------
	IsPluginModule()
	---------------------------------------------------------*/
	public function IsPluginModule ()
	{
		return true;
	}


	/*---------------------------------------------------------
	HasAdmin()
	---------------------------------------------------------*/
	public function HasAdmin ()
	{
		return true;
	}


	/*---------------------------------------------------------
	GetAdminSection()
	---------------------------------------------------------*/
	public function GetAdminSection ()
	{
		return 'content';
	}


	/*---------------------------------------------------------
	MinimumCMSVersion()
	---------------------------------------------------------*/
	public function MinimumCMSVersion ()
	{
		return '1.9.2';
	}


	/*---------------------------------------------------------
	SetParameters()
	---------------------------------------------------------*/
	public function SetParameters ()
	{
    parent::SetParameters();
    
		$this->RegisterModulePlugin();
		$this->RestrictUnknownParams();
    $this->AddImageDir('images');

		$this->RegisterRoute('/[Uu]ploads\/(?P<upload_id>[0-9]+)\/(?P<junk>.*?)$/',
			array('showtemplate'=>'false', 'action'=>'getfile'));
		$this->RegisterRoute('/[Uu]ploads\/limited\/(?P<url_key>.*?)$/',
												 array('showtemplate'=>'false', 'action'=>'getfile'));
		
		$this->CreateParameter('key', 'value', $this->Lang('param_key'));
		$this->CreateParameter('noauthor', '1', $this->Lang('param_noauthor'));
		$this->CreateParameter('upload_id','id',$this->Lang('param_upload_id'));
		$this->CreateParameter('count','',$this->Lang('param_count'));
		$this->CreateParameter('sortorder','date_asc',$this->Lang('param_sortorder'));
		$this->CreateParameter('file_extensions','ext1,ext2,ext3',$this->Lang('param_fileextensions'));
		$this->CreateParameter('category','upload_category',$this->Lang('param_category'),false);
		$this->CreateParameter('filter','',$this->Lang('param_filter'));
		$this->CreateParameter('no_initial','1',$this->Lang('param_no_initial'));
		$this->CreateParameter('mode','summary',$this->Lang('param_mode'),false);
		$this->CreateParameter('template','',$this->Lang('param_template'));
		$this->CreateParameter('detailtemplate','',$this->Lang('param_detailtemplate'));
		$this->CreateParameter('nocaptcha','',$this->Lang('param_nocaptcha'));
		$this->CreateParameter('filetypes','',$this->Lang('param_filetypes'));
		$this->CreateParameter('selectname','',$this->Lang('param_selectname'));
		$this->CreateParameter('selectnone','',$this->Lang('param_selectnone'));
		$this->CreateParameter('selectvalue','',$this->Lang('param_selectvalue'));
		$this->CreateParameter('selectform','',$this->Lang('param_selectform'));
		$this->CreateParameter('prefix',0,$this->Lang('param_prefix'));
		$this->CreateParameter('prefix_feu',0,$this->Lang('param_prefix_feu'));
		$this->CreateParameter('detailpage','',$this->Lang('param_detailpage'));
		$this->CreateParameter('listingtemplate','',$this->Lang('param_listingtemplate'));
		$this->CreateParameter('listingsortorder','',$this->Lang('param_listingsortorder'));
		$this->CreateParameter('sendfilepage','',$this->Lang('param_sendfilepage'));
		$this->CreateParameter('action','default',$this->Lang('param_action'));
		$this->CreateParameter('fieldname','',$this->Lang('param_fieldname'));
		$this->CreateParameter('fieldval','',$this->Lang('param_fieldval'));
		$this->CreateParameter('fieldname2','',$this->Lang('param_fieldname'));
		$this->CreateParameter('fieldval2','',$this->Lang('param_fieldval'));
		
		$this->SetParameterType('key',CLEAN_STRING);
		$this->SetParameterType('noauthor',CLEAN_INT);
		$this->SetParameterType('upload_id',CLEAN_INT);
		$this->SetParameterType('count',CLEAN_INT);
		$this->SetParameterType('sortorder',CLEAN_STRING);
		$this->SetParameterType('file_extensions',CLEAN_STRING);
		$this->SetParameterType('category', CLEAN_STRING);
		$this->SetParameterType('filter',CLEAN_STRING);
		$this->SetParameterType('no_initial',CLEAN_INT);
		$this->SetParameterType('mode',CLEAN_STRING);
		$this->SetParameterType('template',CLEAN_STRING);
		$this->SetParameterType('detailtemplate',CLEAN_STRING);
		$this->SetParameterType('nocaptcha',CLEAN_INT);
		$this->SetParameterType('filetypes',CLEAN_STRING);
		$this->SetParameterType('selectname',CLEAN_STRING);
		$this->SetParameterType('selectnone',CLEAN_INT);
		$this->SetParameterType('selectvalue',CLEAN_STRING);
		$this->SetParameterType('selectform',CLEAN_STRING);
		$this->SetParametertype('prefix',CLEAN_INT);
		$this->SetParametertype('prefix_feu',CLEAN_INT);
		$this->SetParameterType('detailpage',CLEAN_STRING);
		$this->SetParameterType('sendfilepage',CLEAN_STRING);
		$this->SetParameterType('url_key',CLEAN_STRING);
		$this->SetParameterType('fieldname',CLEAN_STRING);
		$this->SetParameterType('fieldval',CLEAN_STRING);
		$this->SetParameterType('fieldname2',CLEAN_STRING);
		$this->SetParameterType('fieldval2',CLEAN_STRING);

		
		$this->SetParameterType('input_key',CLEAN_STRING);
		$this->SetParameterType('input_author',CLEAN_STRING);
		$this->SetParameterType('input_summary',CLEAN_STRING);
		$this->SetParameterType('input_description',CLEAN_STRING);
		$this->SetParameterType('input_destname',CLEAN_STRING);
		$this->SetParameterType('input_replace',CLEAN_INT);
		$this->SetParameterType('input_captcha',CLEAN_STRING);
		$this->SetParameterType('do_uploadfile',CLEAN_STRING);
		$this->SetParameterType('nooutput',CLEAN_INT);
		
		$this->SetParameterType('listingtemplate',CLEAN_STRING);
		$this->SetParameterType('listingsortorder',CLEAN_STRING);
		
		$this->SetParameterType('input_filter',CLEAN_STRING);
		$this->SetParameterType('hidden_params',CLEAN_STRING);
		$this->SetParameterType('input_submit',CLEAN_STRING);
		$this->SetParameterType('input_sendto',CLEAN_STRING);
		$this->SetParameterType('input_subject',CLEAN_STRING);
		$this->SetParameterType('input_notes',CLEAN_STRING);
		$this->SetParameterType('input_cancel',CLEAN_STRING);
		$this->SetParameterType('pagenum',CLEAN_INT);
    $this->SetParameterType(CLEAN_REGEXP.'/field_.*/',CLEAN_STRING);
	}


	/*---------------------------------------------------------
	GetAdminDescription()
	---------------------------------------------------------*/
	public function GetAdminDescription ()
	{
		return $this->Lang ('moddescription');
	}


  /*---------------------------------------------------------
   AllowAutoInstall()
   ---------------------------------------------------------*/
  public function AllowAutoInstall() {
    return FALSE;
  }


  /*---------------------------------------------------------
   AllowAutoUpgrade()
   ---------------------------------------------------------*/
  public function AllowAutoUpgrade() {
    return FALSE;
  }


	/*---------------------------------------------------------
	VisibleToAdminUser()
	---------------------------------------------------------*/
	public function VisibleToAdminUser ()
	{
		return $this->CheckPermission ('Manage Uploads') ||
			$this->CheckPermission('Modify Templates') ||
			$this->CheckPermission('Upload Files to Uploads') ||
			$this->CheckPermission('Modify Site Preferences');
	}


	/*---------------------------------------------------------
	GetDependencies()
	---------------------------------------------------------*/
	public function GetDependencies ()
	{
		return array ('CGExtensions'=>'1.24');
	}


	/*---------------------------------------------------------
	InstallPostMessage()
	---------------------------------------------------------*/
	public function InstallPostMessage ()
	{
		return $this->Lang ('postinstall');
	}


	/*---------------------------------------------------------
	UninstallPostMessage()
	---------------------------------------------------------*/
	public function UninstallPostMessage ()
	{
		return $this->Lang ('postuninstall');
	}


	/*---------------------------------------------------------
	DoAction($action, $id, $params, $returnid)
	---------------------------------------------------------*/
	public function DoAction ($action, $id, $params, $returnid = -1)
	{
		switch ($action)
		{		
			case 'do_deletecategory':
			{
				// check permissions again
				if ($this->CheckPermission ('Manage Uploads'))
				{
					$delete_dir = false;
					if( !isset($params['category_id']) )
						{
							$this->SetError($this->Lang('error_missing_invalid','category_id'));
							$this->RedirectToTab($id,'categories');
						}
					if( isset($params['input_deletedirectory']) && $params['input_deletedirectory'] )
						{
							$delete_dir = true;
						}
					$msg = $this->_AdminDoDeleteCategory($params['category_id'],$delete_dir);
					if( $msg )
						{
							$this->SetError($msg);
						}
					$this->RedirectToTab($id,'categories');
				}
				break;
			}
	
	
			case 'do_deleteupload':
			{
				// check permissions again
				if( $this->CheckPermission('Manage Uploads') || $this->CheckPermission('Upload Files to Uploads'))
				{
					if( !isset( $params['upload_id'] ) ) 
						{
							$module->_DisplayErrorPage ($id, $params, $returnid,
																					$module->Lang ('error_insufficientparams','upload_id'));
							return;
						}

					$msg = $this->_AdminDoDeleteUpload($params['upload_id'],true);
					if( $msg )
						{
							$this->SetError($msg);
						}
					$this->RedirectToTab($id, 'files', array( 'input_category' => $uploadrow['upload_category_id']));

				}
				break;
			}
	
			case 'updateemailtemplate':
			{
				// check permissions again
				if ($this->CheckPermission ('Modify Templates'))
				{
					if (isset ($params['defaultbutton']))
					{
						$fn = dirname(__FILE__).'/templates/orig_emailnotify_template.tpl';
						if( file_exists($fn) )
							{
								$template = @file_get_contents($fn);
								$this->SetTemplate( 'upload_emailtemplate', $template);
							}
					}
					else
					{
						$this->SetTemplate ('upload_emailtemplate', $params['templatecontent']);
					}
					$this->RedirectToTab($id, 'email_template', '', 'admin_templates');
				}
			}

			case 'updatesendfileemail':
			{
				// check permissions again
				if ($this->CheckPermission ('Modify Templates'))
				{
					if (isset ($params['defaultbutton']))
					{
						// template used for sendfile email
						$fn = dirname(__FILE__).'/templates/orig_sendfilerpt_template.tpl';
						if( file_exists($fn) )
							{
								$template = @file_get_contents($fn);
								$this->SetTemplate( 'upload_sendfilerpt', $template);
							}
					}
					else
					{
						$this->SetTemplate ('upload_sendfilerpt', $params['templatecontent']);
					}
					$this->RedirectToTab($id, 'email_template', '', 'admin_templates');
				}
			}

			default:
				parent::DoAction( $action, $id, $params, $returnid );
				break;
		}
	}


	/*---------------------------------------------------------
	SearchResult($returnid,$articleid,$attr='')
	---------------------------------------------------------*/
	public function SearchResult($returnid, $articleid, $attr = '')
	{
		$db =& $this->GetDb();
		$result = array();
		if( $attr == 'upload')
		{
			// get the category id for an upload id
			$details = $this->GetUploadDetails($articleid,'');
	
			// now get the category name instead of the category id, god 
			// was I stupid.
			$q = "SELECT upload_category_name AS name FROM ".cms_db_prefix()."module_uploads_categories WHERE upload_category_id = ?";
			$dbresult = $db->Execute( $q, array($details['upload_category_id']) );
			if( !$dbresult || !$dbresult->RecordCount() )
			{
				die( 'database error' );
				// todo, audit
				return;
			}
			$row = $dbresult->FetchRow();
			$result[0] = $this->GetFriendlyName();
			$result[1] = $details['upload_name'];
			$result[2] = $this->CreateLink( $articleid, 'default', $returnid, $details['upload_name'],
				array('mode'=>'single',
					'upload_id' => $articleid,
					'category' => $row['name'] ), '', true);
			return $result;
		}
	}


	/*---------------------------------------------------------
	SearchReIndex($module)
	---------------------------------------------------------*/
	public function SearchReIndex(&$module)
	{
		$db =& $this->GetDb();
		
		$query = "SELECT upload_id, upload_name, upload_author, upload_summary, upload_description, upload_ip, upload_date FROM ".cms_db_prefix()."module_uploads A, ".cms_db_prefix()."module_uploads_categories B WHERE A.upload_category_id = B.upload_category_id AND B.upload_category_listable = ?";
		$dbresult = $db->Execute( $query, array( 1 ) );
		if( !$dbresult )
		{
			die( $db->ErrorMsg() );
		}
		while( $row = $dbresult->FetchRow() )
		{
			$str = $row['upload_name'].' '.$row['upload_author'].' '.
			$row['upload_summary'].' '.$row['upload_description'];
			$module->AddWords( $this->GetName(), $row['upload_id'], 'upload', $str );
		}
	}

  /*---------------------------------------------------------
   BEGIN OF UI SUPPORT FUNCTIONS
   ---------------------------------------------------------*/

	/*---------------------------------------------------------
	_AdminDoDeleteCategory( $id, $params, $returnid )
	NOT PART OF THE MODULE API
	
	A function that actually does the deletion of the category
	given the category id in the parameters, and a few other
	necessary details.  This function also will optionally
	remove all files from the directory... 
	---------------------------------------------------------*/
	protected function _AdminDoDeleteCategory ($category_id)
	{
		Uploads::load_admin();
		return _uploads_AdminDoDeleteCategory($this,$category_id);
	}


	/*---------------------------------------------------------
	_AdminDoDeleteUpload( $id, $params, $returnid )
	NOT PART OF THE MODULE API
	
	Actually delete an upload from the filesystem and
	from the database.
	---------------------------------------------------------*/
	protected function _AdminDoDeleteUpload ($upload_id,$delete_file = false)
	{
		Uploads::load_admin();
		return _uploads_AdminDoDeleteUpload($this,$upload_id,$delete_file);
  }


  /*---------------------------------------------------------
   _DisplayErrorPage($id, $params, $returnid, $message)
   NOT PART OF THE MODULE API
   
   This is a method to display
   error information on the admin side.
   ---------------------------------------------------------*/
  public function _DisplayErrorPage ($id, &$params, $returnid, $message = '')
  {
    $this->smarty->assign ('title_error', $this->Lang ('error'));
    if ($message != '')
      {
				$this->smarty->assign ('message', $message);
      }
    if( $returnid == '' )
      {
				$this->smarty->assign('link',
															$this->CreateLink($id,'defaultadmin',$returnid,
																								$this->Lang('returntomodule')));
      }
    
    // Display the populated template
    echo $this->ProcessTemplate ('error.tpl');
  }


  /*---------------------------------------------------------
   GetUploadDetails($id,$returnid)
   
   Return the details about a specific upload
   upload_id
   upload_category_id
   upload_name
   upload_author
   upload_summary
   upload_description
   upload_ip
   upload_size
   upload_date
   url
   absurl
   link
   or an array (FALSE,ERRORMSG)
   ---------------------------------------------------------*/
  public function GetUploadDetails( $id, $returnid = '' )
  {
		global $gCms;
    $db =& $this->GetDb();
    $q = "SELECT * FROM ".cms_db_prefix()."module_uploads
          WHERE upload_id = ?";
		$row = $db->GetRow($q, array($id) );
    if( !$row )
      {
				return array(FALSE, $db->ErrorMsg());
      }

    // have details from the table, now
    // have to add something such that a link can be generated
    // that will still count the number of downloads, etc
    $row['url'] = $this->CreateLink ($id, 'getfile', $returnid, '',
																		 array ('upload_id' => $row['upload_id']), 
																		 '', true, true, '', false,
																		 $this->_getFileURL($row['upload_id'],$row['upload_name']));
		$row['download_url'] = $row['url'];

    $row['link'] = $this->CreateLink ($id, 'getfile', $returnid, $row['upload_name'],
																			array ('upload_id' => $row['upload_id']),
																			'', false, true, '', false,
																			$this->_getFileURL($row['upload_id'],$row['upload_name']));
		$config = $gCms->GetConfig();
    $row['absurl'] = $config['uploads_url']."/".
      $this->getCategoryPathFromFileID( $row['upload_id'] )."/".
      $row['upload_name'];
    return $row;
  }



  /*---------------------------------------------------------
   GetCategoryFiles()
   NOT PART OF THE MODULE API

	 A method to get a list of the file names and file id's given
	 a category id.
   ---------------------------------------------------------*/
  public function GetCategoryFiles($category_id)
  {
		global $gCms;
		$db =& $gCms->GetDb();

		$query = 'SELECT upload_id,upload_name 
                FROM '.cms_db_prefix().'module_uploads U
               WHERE upload_category_id = ?';
		$tmp = $db->GetArray($query,array($category_id));
		if( !$tmp ) return FALSE;

		$data = array();
		for( $i = 0; $i < count($tmp); $i++ )
			{
				$data[$tmp[$i]['upload_id']] = $tmp[$i]['upload_name'];
			}
		return $data;
  }
	 
  
  /*---------------------------------------------------------
   AttemptUpload($id, $params, $returnid, $message)
   NOT PART OF THE MODULE API
   
   This is a method to actually try uploading the file
   ensuring it is valid, and then adding the stuff to
   the database.

   Returns an array, first element is success (true/false)
   second element is (if first element is false) an error message,
   or the id of the uploaded file.

   ---------------------------------------------------------*/
  public function AttemptUpload ($id, &$params, $returnid)
  {
		Uploads::load_common();
		return _uploads_AttemptUpload($this,$id,$params,$returnid);
  }


  /*---------------------------------------------------------
   _handleUpload( $destDir  $fieldName, $nameCallbac )
	 private
   NOT PART OF THE MODULE API

   This method handles validating the upload parameters, and copying
   the file from it's temporary location to it's permanent location.
   ---------------------------------------------------------*/
  public function _handleUpload ($destDir,
													$fieldName = '_upload', $nameCallback = false,
													$destname = '',$enforceextension = true,
													$replace_existing = false,
													$filenamePrefix = '')
  {
		Uploads::load_common();
		return _uploads_handleUpload($this,$destDir,
																 $fieldName,$nameCallback,
																 $destname,
																 $enforceextension,
																 $replace_existing,
																 $filenamePrefix);
  }


  /*---------------------------------------------------------
   ScanDirectory($category_id, $dir )
   NOT PART OF THE MODULE API

   A utility to insert records into the uploads database
   for all files that currently exist in a directory.
   ---------------------------------------------------------*/
  protected function ScanDirectory($category_id, $dir )
  {
    $db =& $this->GetDb();
    $desc = "Pre-existing file";
		$now = $db->DbTimeStamp(time());

    $files = $this->_scandir( $dir );
    if( $this->GetPreference('create_dummy_index_html') )
      {
				@touch( $dir.DIRECTORY_SEPARATOR."index.html" );
      }
    if( $files )
      {
				foreach( $files as $file ) {
					// ignore directories . and ..
					if( $file == "." || $file == ".." ) {
						continue;
					}

					// ignore any directories
					$srcp = $dir.DIRECTORY_SEPARATOR.$file;
					if( is_dir( $srcp ) ) {
						continue;
					}

					// ignore thumbnail files
					if( startswith($file,'thumb_') ) {
						continue;
					}

					// got the file, now need it's size
					$size = filesize($srcp);
	  
					// now we need to maybe rename the file...
					// cuz it may have spaces in it, and http may not like that
					// we use an (optional) counter to make sure that we
					// can have numerous files with similar names
					$postfix = "";
					while( $postfix < 100 )
						{
							$destfile = str_replace (array (' ', '%20'), array ('_', '_'), $file );
							if( $postfix != "" )
								{
									$destfile .= "_" . $postfix;
								}
	      
							if( $destfile != $file )
								{
									$destp = $dir.DIRECTORY_SEPARATOR.$destfile;
		  
									// yep, we gotta rename it
									// but make sure the file doesn't already exist first
									if( file_exists( $destp ) )
										{
											// uh-oh it exists
											// increment the postfix
											if( $postfix == "" )
												{
													$postfix = 1;
												}
											else
												{
													$postfix++;
												}
											continue;
										}
		  
									rename( $srcp, $destp );
									$file = $destfile;
									$srcp = $destp;
								}
	      
							break; // get out of this while statement
						}
	  
					if( $postfix >= 100 )
						{
							// for some odd reason, we could not find a reasonable
							// filename to rename to.
							// we'll just skip this file
							continue;
						}

					// next check to make sure its not already in the database
					$q = "SELECT upload_id,upload_thumbnail FROM ".cms_db_prefix()."module_uploads WHERE
						upload_name = ? AND upload_category_id = ?";
					$fileid = '';
					$thumb_name = '';
					$tmp = $db->GetRow( $q, array( $file, $category_id) );
					if( $tmp )
						{
							// we already know about this one
							$fileid = $tmp['upload_id'];
							$thumb_name = $tmp['upload_thumbnail'];
						}
					else 
						{
							// it's a new file
							$query = "INSERT INTO ".cms_db_prefix()."module_uploads 
                               (upload_id, upload_category_id, upload_name,
                                upload_author, upload_summary, upload_description,
                                upload_ip, upload_size, upload_date)
                               VALUES (?,?,?,?,?,?,?,?,$now)";
							$userid = get_userid(false);
							if( !$userid )
								{
									// we don't know the user.
									$userid = 0;
								}
							$username = $_SESSION["cms_admin_username"];
							$fileid = $db->GenID (cms_db_prefix ()."module_uploads_seq");
							$parms = array( $fileid, 
															$category_id,
															$file, 
															$username, 
															$desc, 
															"", 
															"localhost", 
															$size );
							$dbresult = $db->Execute( $query, $parms );
							if( !$dbresult ) 
								{
									echo "DEBUG: ".$db->sql."<br/>";
									echo "ERROR: ".$db->ErrorMsg()."<br/>";
									die();
									return;
								}
						}

					// and maybe, just maybe create a thumbnail for it
					if( empty($thumb_name) )
						{
							$thumb_name = 'thumb_'.$file;
						}

					// see if we're doing thumbnailing at all
					if( $this->GetPreference('autothumbnail_extensions') != '' &&
							$this->GetPreference('autothumbnail_size') != '' )
						{
							// see if this file is thumbnailable
							$fileextension = strtolower(strrchr($file,'.'));
							$thumb_ext_arr = explode(",",
																			 $this->GetPreference('autothumbnail_extensions'));

							$is_image = false;
							foreach( $thumb_ext_arr as $thumb_ext )
								{
									if( ".".$thumb_ext == $fileextension )
										{
											$is_image = true;
											break;
										}
								}

							if( $is_image )
								{
									// yup, we can thumbnail this thing.
									$destname = $dir.DIRECTORY_SEPARATOR.$thumb_name;
									$created = false;
									if( !file_exists( $destname ) )
										{
											$this->imageTransform($srcp,$destname,
																						$this->GetPreference('autothumbnail_size'));
											if( file_exists( $destname ) )
												{
													$created = true;
												}
										}

									if( $created )
										{
											// woot, we created a new thumbnail
											// now update the database
											$query = 'UPDATE '.cms_db_prefix().'module_uploads 
												SET upload_thumbnail = ?
												WHERE upload_id = ?';
											$db->Execute($query,array($thumb_name,$fileid));
										}
								}
						}
	  
				} // foreach
      } // if
  }


  /*---------------------------------------------------------
   SmartScanDirectory($category_id, $dir )
   NOT PART OF THE MODULE API

   A method to perform a scan directory if the count of the
   files in the directory does not match the count of the files
   in the database
   ---------------------------------------------------------*/
  protected function SmartScanDirectory($category_id, $dir )
  {
    $db =& $this->GetDb();
    $query = "SELECT COUNT(*) AS count FROM ".cms_db_prefix()."module_uploads
              WHERE upload_category_id = ?";
    $dbresult = $db->Execute( $query, array( $category_id ) );
    if( !$dbresult )
      {
				echo $db->ErrorMsg()."<br/>";
				return;
      }
    $row = $dbresult->FetchRow();
    $rowcount = $row['count'];

    // get the number of files
    $files = $this->_scandir( $dir );
    $count = 0;
    if( $files )
      {
				foreach( $files as $file )
					{
						// ignore directories . and ..
						if( $file == "." || $file == ".." ) {
							continue;
						}
	    
						// ignore any directories
						$srcp = $dir.DIRECTORY_SEPARATOR.$file;
						if( is_dir( $srcp ) ) {
							continue;
						}
	    
						// ignore thumbnails
						if( startswith($srcp,'thumb_') ) {
							continue;
						}
						
						$count++;
					} // foreach
      }

    if( $count != $rowcount )
      {
				$this->ScanDirectory( $category_id, $dir );
      }
  }


  /*---------------------------------------------------------
   _InsertDefaultFileTypes()
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  protected function _InsertDefaultFileTypes()
  {
    // default file types
    $filetypes = array();
    $filetypes[] = array('sortorder'=>1,'name'=>'Sound',
												 'description'=>'Sound files',
												 'extensions'=>'mp3,ogg,wav',
												 'image'=>'sound.png');
    $filetypes[] = array('sortorder'=>2,'name'=>'Image',
												 'description'=>'Image files',
												 'extensions'=>'png,gif,jpg,jpeg,bmp',
												 'image'=>'image.png');
    $filetypes[] = array('sortorder'=>3,'name'=>'PDF Document',
												 'description'=>'Adobe Acrobat PDF Document',
												 'extensions'=>'pdf',
												 'image'=>'pdf.png');
    $filetypes[] = array('sortorder'=>4,'name'=>'Spreadsheet',
												 'description'=>'Spreadsheets',
												 'extensions'=>'xls',
												 'image'=>'spreadsheet.png');
    $filetypes[] = array('sortorder'=>5,'name'=>'Compressed',
												 'description'=>'Compressed file',
												 'extensions'=>'zip,tar,gz,rar,arj',
												 'image'=>'zip.png');
    $filetypes[] = array('sortorder'=>6,'name'=>'Text',
												 'description'=>'Text File',
												 'extensions'=>'txt,text',
												 'image'=>'txt.png');
    $filetypes[] = array('sortorder'=>7,'name'=>'Video',
												 'description'=>'Video Files',
												 'extensions'=>'avi,mpg.wmv',
												 'image'=>'video.png');
    $filetypes[] = array('sortorder'=>8,'name'=>'Word Processing',
												 'description'=>'Word Processing Files',
												 'extensions'=>'doc',
												 'image'=>'wordprocessing.png');

    $db =& $this->GetDb();
    $q = "INSERT INTO ".cms_db_prefix()."module_uploads_filetypes
      (id,sortorder,name,description,extensions,image) VALUES (?,?,?,?,?,?)";
    foreach( $filetypes as $onefiletype )
      {
				$newid = $db->GenID(cms_db_prefix()."module_uploads_filetypes_seq");
				$dbresult =  $db->Execute( $q, 
																	 array( $newid, $onefiletype['sortorder'],
																					$onefiletype['name'],
																					$onefiletype['description'],
																					$onefiletype['extensions'],
																					$onefiletype['image'] ) );
      }
  }


  /*---------------------------------------------------------
   _GetFileType( $filename )
	 private
   NOT PART OF THE MODULE API

   Given a filename, return the file type information for that 
   file.
   ---------------------------------------------------------*/
  public function _GetFileType( $filename )
  {
		if( $this->_filetypes == '' )
			{
				$db =& $this->GetDb();
				
				$the_extension = strtolower(strrchr($filename,'.'));
				$q = "SELECT * FROM ".cms_db_prefix()."module_uploads_filetypes
            ORDER BY sortorder";
				$this->_filetypes = $db->GetArray( $q );
			}

    $the_extension = strtolower(substr(strtolower(strrchr($filename,'.')),1));
		for( $i = 0; $i < count($this->_filetypes); $i++ )
			{
				$row =& $this->_filetypes[$i];

				$arr = explode( ",",$row['extensions'] );
				foreach( $arr as $oneext )
					{
						if( strtolower( $oneext ) == $the_extension ) 
							{
								return $row;
							}
					}
      }
    return false;
  }


  /*---------------------------------------------------------
   _CheckDownloadSecurity
   NOT PART OF THE MODULE API

   Given information about a category, test wether the currently logged
   in user is allowed to view the files in that category.
   ---------------------------------------------------------*/
	public function _CheckDownloadSecurity(&$category_details)
	{
		$feusers =& $this->GetModuleInstance('FrontEndUsers');
		if( $feusers && $category_details['upload_category_groups'] != '')
			{
				$uid = $feusers->LoggedInId();
				if( $uid == 0 || $uid == '' )
					{
						// user is not logged in
						return false;
					}
				
				// now check if the user is in the group
				$permittedgroups = explode(',',$category_details['upload_category_groups']);
				$permitted = false;
				{
					$membergroups1 = $feusers->GetMemberGroupsArray($uid);
					foreach( $membergroups1 as $row )
						{
							foreach( $permittedgroups as $pg )
								{
									if( $pg == $row['groupid'] ) 
										{
											$permitted = true;
											break;
										}
								}
							if( $permitted == true ) break;
						}
				}
				
				if( $permitted == false )
					{
						// access denied
						return false;
					}
			}

		return true;
	}


  /*---------------------------------------------------------
   imageTransform()
	 private
   NOT PART OF THE MODULE API

	 Handles generating of thumbnail images.
   ---------------------------------------------------------*/
  public function imageTransform($srcSpec, $destSpec, $size)
  {
  	//TODO: Some Error handling if Transformation class cannot be found (?)
    require_once(dirname(__FILE__).'/../../lib/filemanager/ImageManager/Classes/Transform.php');
     
		global $gCms;
		$config = $gCms->GetConfig();
    $it = new Image_Transform;
    $img = $it->factory($config['image_manipulation_prog']);
    $img->load($srcSpec);
    if ($img->img_x < $img->img_y)
      {
				$long_axis = $img->img_y;
      }
    else
      {
				$long_axis = $img->img_x;
      }
     
    $the_extension = substr(strtolower(strrchr($destSpec,'.')),1);
		$type = 'jpg';
		switch($the_extension)
			{
			case 'jpg':
			case 'jpeg':
				$type = 'jpeg';
				break;
			case 'bmp':
				$type = 'bmp';
				break;
			case 'png':
				$type = 'png';
				break;
			case 'gif':
				$type = 'gif';
				break;
			}

    if ($long_axis > $size)
      {
				$img->scaleByLength($size);
				$img->save($destSpec, $type);
      }
    else
      {
				$img->save($destSpec, $type);
      }
    $img->free();
  }



  /*---------------------------------------------------------
   _getFileURL
	 private
   ---------------------------------------------------------*/
	public function _getFileURL($upload_id,$upload_name)
	{
		$url = sprintf('uploads/%d/%s',$upload_id,munge_string_to_url($upload_name));
		return $url;
	}



  /*---------------------------------------------------------
   _getTimeLimitedURL
	 private
   ---------------------------------------------------------*/
	public function _getTimeLimitedURL($upload_key)
	{
		$url = sprintf('uploads/limited/%s',$upload_key);
		return $url;
	}


  /*---------------------------------------------------------
   HasCapability()
   ---------------------------------------------------------*/
  public function HasCapability($capability,$params = array())
  {
    switch( $capability )
      {
      case 'contentblocks':
				return TRUE;
      default:
				return FALSE;
      }
  }


  /*---------------------------------------------------------
   GetContentBlockInput()
   ---------------------------------------------------------*/
  public function GetContentBlockInput($blockName,$value,$params,$adding = false)
  {
		if( !isset($params['selecttype']) )
			{
				$params['selecttype'] = 'categoryselect';
			}

    switch( $params['selecttype'] )
      {
      case 'categoryselect':
				$tmp1 = array();
				if( isset($params['selectone']) )
					{
						$tmp1[$this->Lang('selectone')] = -1;
					}
				if( isset($params['allowall']) )
					{
						$tmp1[$this->Lang('all')] = 'all';
					}
				$db =& $this->GetDb();
				$query = 'SELECT upload_category_name FROM '.cms_db_prefix().'module_uploads_categories
                   WHERE upload_category_listable = 1';
				$tmp = $db->GetArray($query);
				if( $tmp )
					{
						for( $i = 0; $i < count($tmp); $i++ )
							{
								$str = $tmp[$i]['upload_category_name'];
								$tmp1[$str] = $str;
							}
						return $this->CreateInputDropdown('',$blockName,$tmp1,-1,$value);
					}
				break;
      }
    return FALSE;
  }


  /*---------------------------------------------------------
   GetContentBlockValue()
   ---------------------------------------------------------*/
  public function GetContentBlockValue($blockName,$blockParams,$inputParams)
  {
    if( isset($blockParams['selecttype']) )
      {
				if( isset($inputParams[$blockName]) )
					{
						return $inputParams[$blockName];
					}
      }
    return '';
  }


  /*---------------------------------------------------------
   ValidateContentBlockValue()
   ---------------------------------------------------------*/
  public function ValidateContentBlockValue($blockName,$value,$blockParams)
  {
    switch($blockParams['selecttype'])
      {
      case 'categoryselect':
				if( $value == -1 )
					{
						return $this->Lang('error_mustselect_category');
					}
				break;
      }
    return '';
  }

}

// EOF
?>
