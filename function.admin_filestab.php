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

if (!$this->CheckPermission ('Manage Uploads') && !$this->CheckPermission('Upload Files to Uploads'))
  {
    return;
  }

global $gCms;
$db =& $this->GetDb();

// get the current category for the filter
if (isset ($params['submitcategory']))
  {
    $this->SetPreference('current_category',
			 (isset ($params['input_category']) ? $params['input_category'] :
			  ''));
  }
$curcategory = $this->GetPreference('current_category','');
        
// get the categories for the filter
$categorylist = array ();
$query =
  "SELECT * FROM ".cms_db_prefix ().
  "module_uploads_categories ORDER BY upload_category_name ASC";
$dbresult = $db->Execute ($query);
if (!$dbresult)
  {
    $this->smarty->assign ('error', 1);
    $this->smarty->assign ('message', $this->Lang ('error_nocategories'));
  }
 else
   {
     while ($row = $dbresult->FetchRow ())
       {
	 if( $curcategory == '' ) {
	   $curcategory = $row['upload_category_id'];
	 }
	 $categorylist[$row['upload_category_name']] =
	   $row['upload_category_id'];
       }
   }
	  
// if there are no categories, put a message out, and
// nothing else
if( !count( $categorylist ) ) 
  {
    $this->smarty->assign('error',1);
    $this->smarty->assign('noform',1);
    $this->smarty->assign('message',$this->Lang('error_nocategories'));
    echo $this->ProcessTemplate('uploadlist.tpl');
    return;
  }

$this->smarty->assign('error',"");
$this->smarty->assign('noform',"");
$this->smarty->assign('message',"");

// setup the form part of the template
$this->smarty->assign ('legend_uploadform',$this->Lang('legend_uploadform'));
$this->smarty->assign ('startform',
		       $this->CreateFormStart ($id, 'defaultadmin', $returnid, 'post', 'multipart/form-data'));
$this->smarty->assign ('category', $this->Lang ('category'));
$this->smarty->assign ('input_category',
		       $this->CreateInputDropDown ($id, "input_category", $categorylist, -1,
						   $curcategory));
$this->smarty->assign ('input_select',
		       $this->CreateInputSubmit ($id, 'submitcategory',
						 $this->Lang('selectcategory')));
$this->smarty->assign ('input_hidden',
		       $this->CreateInputHidden ($id, 'curcategory',
						 $curcategory));

// $this->smarty->assign('prompt_browse', $this->Lang('upload'));
// $this->smarty->assign( 'input_browse',
// 		       $this->CreateFileUploadInput ($id,'input_browse','',50));
// $this->smarty->assign('prompt_replace', $this->Lang('prompt_replace'));
// $this->smarty->assign('input_replace', 
// 		      $this->CreateInputCheckbox( $id, 'input_replace', 1 ));
// $this->smarty->assign('info_replace',
// 		      $this->Lang('info_replace'));
// $this->smarty->assign('prompt_thumbnail', $this->Lang('thumbnail'));
// $this->smarty->assign( 'input_thumbnail',
// 		       $this->CreateFileUploadInput ($id,'input_thumbnail','',50));
	  
// $this->smarty->assign ('prompt_destname',
// 		       $this->Lang ('destname'));
// $this->smarty->assign ('input_destname',
// 		       $this->CreateInputText ($id, 'input_destname',
// 					       '', 40, 255));
// $this->smarty->assign ('info_destname',
// 		       $this->Lang('info_destname'));
	  
// $this->smarty->assign ('prompt_summary',
// 		       $this->Lang ('summary'));
// $this->smarty->assign ('input_summary',
// 		       $this->CreateInputText ($id, 'input_summary',
// 					       '', 80, 255));
// $this->smarty->assign ('info_summary',
// 		       $this->Lang('info_summary'));
// $this->smarty->assign('prompt_author',$this->Lang('author'));
// $this->smarty->assign( 'input_author',
// 		       $this->createInputText( $id, 'input_author', $_SESSION["cms_admin_username"],
// 					       20, 255));
	  
// $this->smarty->assign( 'input_submit',
// 		       $this->CreateInputSubmit( $id, 'submitupload', $this->Lang('upload')));
$this->smarty->assign ('endform', $this->CreateFormEnd ());
	  
$dbresult = '';
$rowarray = array ();
if ($curcategory == '')
  {
    $query = "SELECT u.*,count(d.download_id) AS downloads FROM ".cms_db_prefix ()."module_uploads u 
               LEFT OUTER JOIN ".cms_db_prefix()."module_uploads_downloads d
               ON u.upload_id = d.file_id
               GROUP BY u.upload_id
               ORDER BY upload_date";
    $dbresult = $db->Execute ($query);
  }
 else
   {
     $query =
       "SELECT u.*,count(d.download_id) AS downloads FROM ".cms_db_prefix ()."module_uploads u 
         LEFT OUTER JOIN ".cms_db_prefix()."module_uploads_downloads d
         ON u.upload_id = d.file_id
         WHERE upload_category_id = ?
         GROUP BY u.upload_id
         ORDER BY upload_date";
     $dbresult = $db->Execute ($query, array ($curcategory));
   }

// now setup the rest                                                 
$rowclass = 'row1';
	  
if ($dbresult)
  {
    $this->smarty->assign('idtext',$this->Lang('name'));
    $this->smarty->assign('titletext',$this->Lang('name'));
    $this->smarty->assign('summarytext',$this->Lang('summary'));
    $this->smarty->assign('desctext',$this->Lang('description'));
    $this->smarty->assign('sizetext',$this->Lang('sizekb'));
    $this->smarty->assign('authortext',$this->Lang('author'));
    $this->smarty->assign('iptext',$this->Lang('ip_address'));
    $this->smarty->assign('dltext',$this->Lang('downloads'));
    $this->smarty->assign('postdatetext',$this->Lang('date'));
    while ($row = $dbresult->FetchRow ())
      {
	$onerow = new stdClass ();
	$onerow->id = $row['upload_id'];
	$type = $this->_GetFileType( $row['upload_name'] );
	$imgpath = '../modules/'.basename(dirname(__FILE__)).'/images/';
	if( $type != false )
	  {
	    $onerow->icon = $imgpath.$type['image'];
	  }
	else
	  {
	    $onerow->icon = $imgpath.'unknown.png';
	  }
	$onerow->name = $row['upload_name'];
	$onerow->size = intval($row['upload_size'] / 1024.0 + 0.5);
	$onerow->author = $row['upload_author'];
	$onerow->ip = $row['upload_ip'];
	$onerow->summary = $row['upload_summary'];
	$onerow->description = $row['upload_description'];
	$onerow->date = $row['upload_date'];
	$onerow->downloads = $row['downloads'];
	$onerow->rowclass = $rowclass;
		
	$onerow->editurl =
	  $this->CreateLink ($id, 'editupload', $returnid, '', 
			     array ('upload_id' => $row['upload_id'],
				    'category_id' => $curcategory),
			     '', true );

	$onerow->editlink =
	  $this->CreateLink ($id, 'editupload', $returnid,
			     $gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif',
									  $this->Lang ('edit'), '', '', 'systemicon'),
			     array ('upload_id' => $row['upload_id'],
				    'category_id' => $curcategory));

	$onerow->timelimited_link =
	  $this->CreateImageLink($id,'admin_manage_timelimited',$returnid,
				 $this->Lang('manage_timelimited'),'clock_link.png',
				 array('upload_id'=>$row['upload_id']));
		
	$onerow->deletelink = $this->CreateLink ($id,'do_deleteupload',$returnid,
						 $gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif',
											      $this->Lang ('delete'), '', '', 'systemicon'),
						 array ('upload_id' => $row['upload_id'],
							'category_id' => $curcategory),
						 $this->Lang ('areyousure'));
	array_push ($rowarray, $onerow);
	($rowclass == "row1" ? $rowclass = "row2" : $rowclass = "row1");
      }
  }

$this->smarty->assign('addfile_link',$this->CreateImageLink($id,'admin_upload',$returnid,
						       $this->Lang('upload_file'),'icons/system/newobject.gif',
							    array('category'=>$curcategory),'','',false));

$this->smarty->assign ('items', $rowarray);
$this->smarty->assign ('itemcount', count ($rowarray));
echo $this->ProcessTemplate ('uploadlist.tpl');

// EOF
?>