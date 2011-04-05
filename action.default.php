<?php // -*- mode:php; c-set-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
# Author: Robert Campbell <rob@techcom.dyndns.org>
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
{
	$tmp_params = array();
	if (isset ($params['hidden_params']) )
		{
			$tmp_params = cge_array::explode_with_key($params['hidden_params']);
		}
	$params = array_merge( $params, $tmp_params );
}

// check for required arguments
if (!isset ($params['mode']) )
  {
    $params['mode'] = 'summary';
  }
        
// setup
$template = 'summaryrpt_'.$this->GetPreference('default_summaryrpt');
if( isset( $params['template'] ) )
	{
		$template = 'summaryrpt_'.$params['template'];
	}
$config = $gCms->GetConfig();

// handle the sendfilepage parameter
$sendfilepage = $returnid;
if( isset($params['sendfilepage']) )
	{
		global $gCms;
		$manager =& $gCms->GetHierarchyManager();
		$node =& $manager->sureGetNodeByAlias($params['sendfilepage']);
		if (isset($node))
			{
				$content =& $node->GetContent();
				if (isset($content))
					{
						$sendfilepage = $content->Id();
					}
			}
		else
			{
				$node =& $manager->sureGetNodeById($params['sendfilepage']);
				if (isset($node))
					{
						$sendfilepage = $params['sendfilepage'];
					}
			}
	}
if( empty($sendfilepage) )
	{
		$tmp = $this->GetPreference('default_sendfilepage',-1);
		if( $tmp > 0 )
			{
				$sendfilepage = $tmp;
			}
		else
			{
				$sendfilepage = $returnid;
			}
	}


// handle the detailpage parameter
$detailpage = '';
if( isset($params['detailpage']) )
	{
		global $gCms;
		$manager =& $gCms->GetHierarchyManager();
		$node =& $manager->sureGetNodeByAlias($params['detailpage']);
		if (isset($node))
			{
				$content =& $node->GetContent();
				if (isset($content))
					{
						$detailpage = $content->Id();
					}
			}
		else
			{
				$node =& $manager->sureGetNodeById($params['detailpage']);
				if (isset($node))
					{
						$detailpage = $params['detailpage'];
					}
			}
		unset( $params['detailpage'] );
	}
if( $detailpage != '' )
	{
		$returnid = $detailpage;
	}
							 

// mode is set, now decide what to do
// handle the simple stuff (one single link)
if( $params['mode'] == 'single' || 
		$params['mode'] == 'detailed' ||
		$params['mode'] == 'detail' ||
		$params['mode'] == 'singlesummary' ||
		$params['mode'] == 'link' || 
		$params['mode'] == 'url' )
	{
		include(dirname(__FILE__).'/action.detail.php');
		return;
	}
else if( $params['mode'] == 'upload' )
	{
		include(dirname(__FILE__).'/action.upload.php');
		return;
	}

//
// Setup data for the default summary mode
//
$selectform = $id;
if( isset( $params['selectform'] ) )
	{
		$selectform = trim($params['selectform']);
	}
		
$selectname = 'file';
if( isset( $params['selectname'] ) )
	{
		$selectname = trim($params['selectname']);
	}
$selectvalue = -1;
if( isset( $params['selectvalue'] ) ) {
	$selectvalue = trim($params['selectvalue']);
 }
		
$filetypes = null;
if( isset( $params['filetypes'] ) )
	{
		$filetypes = trim($params['filetypes']);
	}
	
$field_name = null;
if( isset( $params['fieldname'] ) )
	{
		$field_name = trim($params['fieldname']);
	}

$field_val = null;
if( isset( $params['fieldval'] ) )
	{
		$field_val = trim($params['fieldval']);
	}
$field_name2 = null;
if( isset( $params['fieldname2'] ) )
	{
		$field_name2 = trim($params['fieldname2']);
	}

$field_val2 = null;
if( isset( $params['fieldval2'] ) )
	{
		$field_val2 = trim($params['fieldval2']);
	}

$key = null;
if( isset( $params['key'] ) )
	{
		$key = trim($params['key']);
	}
		 
if( !isset( $params['category'] ) )
	{
		// if mode or category isn't set... we don't display anything
		$this->_DisplayErrorPage ($id, $params, $returnid,
															$this->Lang ('error_insufficientparams','category'));
		return;
	}

// try to figure out a sort order
$sortorder = "ORDER BY upload_date ASC";
if( isset($params['sortorder']) ) {
	switch( trim($params['sortorder']) ) {
	case "date_asc":
		// ascending date
		$sortorder = "ORDER BY upload_date ASC";
		break;
	case "date_desc":
		// descending date
		$sortorder = "ORDER BY upload_date DESC";
		break;
	case "name_asc":
		// ascending name
		$sortorder = "ORDER BY upload_name ASC";
		break;
	case "name_desc":
		// descending name
		$sortorder = "ORDER BY upload_name DESC";
		break;
	case "size_asc":
		// ascending size
		$sortorder = "ORDER BY upload_size ASC";
		break;
	case "size_desc":
		// descending size
		$sortorder = "ORDER BY upload_size DESC";
		break;
	case "summ_asc":
		// ascending summary
		$sortorder = "ORDER BY upload_summary ASC";
		break;
	case "summ_desc":
		// descending summary
		$sortorder = "ORDER BY upload_summary DESC";
		break;
	case "author_asc":
		// ascending author
		$sortorder = "ORDER BY upload_author ASC";
		break;
	case "author_desc":
		// descending author
		$sortorder = "ORDER BY upload_author DESC";
		break;
	case "ip_asc":
		// ascending ip
		$sortorder = "ORDER BY upload_ip ASC";
		break;
	case "ip_desc":
		// descending ip
		$sortorder = "ORDER BY upload_ip DESC";
		break;
	case "desc_asc":
		// ascending author
		$sortorder = "ORDER BY upload_description ASC";
		break;
	case "desc_desc":
		// descending author
		$sortorder = "ORDER BY upload_description DESC";
		break;
  case 'downloads_asc':
		// ascending order of download count
		$sortorder = "ORDER BY downloads ASC";
		break;
  case 'downloads_desc':
		// descending order of download count
		$sortorder = "ORDER BY downloads DESC";
		break;
	case "random":
		// random
		$sortorder = "ORDER BY rand()";
	}
 }
$sortorder = " ".$sortorder;

// determine how many we're going to display
$limitstr = "";
$pagelimit = 100000;
$pagenum = 1;
$numpages = 1;
if( isset( $params['count'] ) )
	{
		$pagelimit = (int)$params['count'];
	}
if( isset( $params['pagenum'] ) )
	{
		$pagenum = (int)$params['pagenum'];
	}
$limitstr = " LIMIT 0,$pagelimit";

// get the category id
$category = array();
if( trim($params['category']) != 'all' )
	{
		$category = Uploads::getCategoryFromName( trim($params['category']) );
		if( !$category )
			{
				$this->_DisplayErrorPage ($id, $params, $returnid,
																	$this->Lang ('error_categorynotfound'));
				return;
			}
		$this->smarty->assign('category_name',$params['category']);
	}

// get the filter string
$filter = '';
if( isset($params['input_filter']) && $params['input_filter'] != '' )
	{
		$filter = trim($params['input_filter']);
	}
if( $filter == '' )
	{
		unset($params['hidden_params']);
	}
		
if( isset($params['filter']) )
	{
		// optionally display the filter form
		$this->smarty->assign('startform', $this->CreateFormStart($id,'default',$returnid,
																															$method='post', '', true));
		$this->smarty->assign('prompt_filter',$this->Lang('filter'));
		$this->smarty->assign('input_filter',
													$this->CreateInputText($id,'input_filter',$filter,15));
		$this->smarty->assign('input_submit',
													$this->CreateInputSubmit($id,'input_submit',
																									 $this->Lang('submit')));
		unset( $params['input_filter'] );
		$this->smarty->assign('hidden_params',
													$this->CreateInputHidden($id,'hidden_params',
																									 cge_array::implode_with_key($params)));
		$this->smarty->assign('endform',$this->CreateFormEnd());
	}
		 
$do_query = true;
if( (isset( $params['no_initial'] ) && $params['no_initial'] != '') &&
		(isset( $params['hidden_params']) == false) )
	{
		$do_query = false;
	}
		 
// adjust the filter
$adjusted_filter = $filter;
if( $filter != '' )
	{
		$tmp = explode(' ',$adjusted_filter);
		$adjusted_filter = '%'.$tmp[0].'%';
	}
		 
// get ready for array processing
$rowarray = array();
$query = '';
$query1 = '';
$dbresult = false;
$qparms = array();
     
if( trim($params['category']) == 'all' )
	{
		//
		// handle display all listable categories
		//

		// get a list of the categories we're allowed to see.
		$query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_categories';
		$cats = $db->GetArray($query);
		$allowed_cats = array();
		if( is_array($cats) )
			{
				for( $i = 0; $i < count($cats); $i++ )
					{
						$onecat = $cats[$i];
						if( !$onecat['upload_category_listable'] ) continue;

						if( $this->_CheckDownloadSecurity($onecat) )
							{
								// we're allowed to view files in this category.
								// cast to int, just for paranoia purposes.
								$allowed_cats[] = (int)$onecat['upload_category_id'];
							}

						if( $onecat['upload_category_scannable'] )
							{
								// may as well scan it.
								$dir = cms_join_path($gCms->config['uploads_path'],$onecat['upload_category_path']);
								$this->SmartScanDirectory($onecat['upload_category_id'],$dir);
							}
					}
			}

		// assume summary mode.
		$params['mode'] = 'summary';

    $query = 'SELECT B.upload_id, B.upload_category_id, B.upload_name, B.upload_author, B.upload_summary, B.upload_description, B.upload_ip, B.upload_size, B.upload_date, A.upload_category_name,
              A.upload_category_deletable, B.upload_thumbnail,C.downloads 
               FROM '.cms_db_prefix().'module_uploads_categories A 
                 LEFT JOIN '.cms_db_prefix().'module_uploads B 
                 ON A.upload_category_id = B.upload_category_id AND A.upload_category_listable = 1
                 LEFT OUTER JOIN (SELECT count(download_id) AS downloads,file_id FROM '.cms_db_prefix().'module_uploads_downloads GROUP BY file_id) AS C 
                 ON B.upload_id = C.file_id';
/*
    $query1 = "SELECT count(A.upload_id) AS count
                FROM ".cms_db_prefix()."module_uploads_categories A
                LEFT JOIN ".cms_db_prefix()."module_uploads B 
                ON   A.upload_category_id = B.upload_category_id
                WHERE upload_category_listable = 1";
		$query  = "SELECT B.upload_id, B.upload_category_id,
                  B.upload_name, B.upload_author, 
                  B.upload_summary, B.upload_description,
                  B.upload_ip, B.upload_size, B.upload_date, A.upload_category_name,
                  A.upload_category_deletable, B.upload_thumbnail,
                  count(D.download_id) AS downloads 
                FROM ".cms_db_prefix()."module_uploads_categories A
                LEFT JOIN ".cms_db_prefix()."module_uploads B
                ON  A.upload_category_id = B.upload_category_id
                LEFT OUTER JOIN ".cms_db_prefix()."module_uploads_downloads D
                ON  B.upload_id = D.file_id ";
*/
				if ($field_name != null && $field_val != null)
				{
					$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv ON fv.upload_id = B.upload_id ";
					$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd ON fd.id = fv.fld_id ";
					$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv ON fv.upload_id = B.upload_id ";
					$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd ON fd.id = fv.fld_id ";
				}
				
				if ($field_name2 != null && $field_val2 != null)
				{
					$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv2 ON fv2.upload_id = B.upload_id ";
					$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd2 ON fd2.id = fv2.fld_id ";
					$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv2 ON fv2.upload_id = B.upload_id ";
					$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd2 ON fd2.id = fv2.fld_id ";
				}
				
				//$query1 .= "WHERE A.upload_category_listable = 1";
				//$query .= "WHERE A.upload_category_listable = 1";
				if( count($allowed_cats) )
					{
						$query1 .= ' AND A.upload_category_id IN ('.implode(',',$allowed_cats).')';
						$query .= ' AND A.upload_category_id IN ('.implode(',',$allowed_cats).')';
					}
				
				if( $key != null )
				{
					$query1 .= " AND upload_key = ? ";
					$query .= " AND upload_key = ? ";
					$qparms[] = $key;
				}
				if( $adjusted_filter != '' )
				{
					$query1 .= " AND upload_name LIKE ? ";
					$query .= " AND upload_name LIKE ? ";
					$qparms[] = $adjusted_filter;
				}
				
				if ($field_name != null && $field_val != null)
				{
					$query1 .= " AND fd.name = ? AND fv.value LIKE ? ";
					$query .= " AND fd.name = ? AND fv.value LIKE ? ";
					$qparms[] = $field_name;
					$qparms[] = '%' . $field_val . '%';
				}
				
				if ($field_name2 != null && $field_val2 != null)
				{
					$query1 .= " AND fd2.name = ? AND fv2.value LIKE ? ";
					$query .= " AND fd2.name = ? AND fv2.value LIKE ? ";
					$qparms[] = $field_name2;
					$qparms[] = '%' . $field_val2 . '%';
				}

    $query  .= " GROUP BY B.upload_id";
		$query  .= $sortorder;
    $do_query = true;
//$dbresult = $db->Execute( $query, $qparms );
	}
 else {
	 //
	 // Dealing with a specific category
	 //

	 // if the category isn't listable, we can stop here
	 if( $category['upload_category_listable'] == 0 ) {
		 return;
	 }
	 $category_id = $category['upload_category_id'];

	 // check for permission, if FEU module exists, and the 
	 // uploads grouplist is
	 // not null, and the returnid is not empty (we're on the frontend)
	 $result = $this->_CheckDownloadSecurity($category);
	 if( !$result )
		 {
			 $this->_DisplayErrorPage( $id, $params, $returnid,
																 $this->Lang('error_permissiondenied') );
			 return;
		 }

	 // we're gonna scan the directory and see if anybody uploaded
	 // any files via ftp or scp or anything silly.
	 $catpath1 = $this->getCategoryPathFromID($category_id);
	 $dir = $this->_categoryPath( $catpath1 );
	 if( $category['upload_category_scannable'] )
		 {
			 $this->SmartScanDirectory( $category_id, $dir );
		 }
		

	 // Now handle our mode
	 switch( trim($params['mode'] ) ) {
	 case 'select':
		 {
			 // display a dropdown list of all of the matching files
			 $query = "SELECT U.*,C.upload_category_deletable,count(D.download_id) AS downloads 
                 FROM ".cms_db_prefix()."module_uploads U
                 LEFT JOIN ".cms_db_prefix()."module_uploads_categories C
                 ON U.upload_category_id = C.upload_category_id 
                 LEFT OUTER JOIN ".cms_db_prefix()."module_uploads_downloads D
                 ON U.upload_id = D.file_id ";

			if ($field_name != null && $field_val != null)
			{
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv ON fv.upload_id = U.upload_id ";
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd ON fd.id = fv.fld_id ";
			}
			
			if ($field_name2 != null && $field_val2 != null)
			{
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv2 ON fv2.upload_id = U.upload_id ";
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd2 ON fd2.id = fv2.fld_id ";
			}

			$query .= " WHERE U.upload_category_id = ? ";
			$qparms[] = $category_id;
			if( $key != NULL )
			{
				$query .= " AND upload_key = ?";
				$qparms[] = $key;
			}
			if ($field_name != null && $field_val != null)
			{
				$query .= " AND fd.name = ? AND fv.value LIKE ? ";
				$qparms[] = $field_name;
				$qparms[] = '%' . $field_val . '%';
			}
			if ($field_name2 != null && $field_val2 != null)
			{
				$query .= " AND fd2.name = ? AND fv2.value LIKE ? ";
				$qparms[] = $field_name2;
				$qparms[] = '%' . $field_val2 . '%';
			}
			$query .= " GROUP BY U.upload_id";
			$query .= $sortorder.$limitstr;
			$dbresult = $db->Execute ($query, $qparms);
			$items = array();
			if( isset($params['selectnone']) )
			{
				$items[$this->Lang('none')] = -1;
			}
			while( $dbresult && ($row = $dbresult->FetchRow()) ) {
				$items[$row['upload_name']] = $row['upload_id'];
			}
			 echo $this->CreateInputDropdown($selectform,$selectname,
																			 $items,-1,$selectvalue);
			 $do_query = false;
		 }
		 break;

	 case 'summary':
		 {
			 // display info about all of the files in the category
			 // possibly limited by files of a specifc type
			 $qparms = array($category_id);
			 $query1 =
				 "SELECT count(U.upload_id) AS count
            FROM ".cms_db_prefix()."module_uploads U ";
			 $query = "SELECT U.*,C.upload_category_deletable,count(D.download_id) AS downloads
                 FROM ".cms_db_prefix()."module_uploads U
                 LEFT JOIN ".cms_db_prefix()."module_uploads_categories C
                 ON U.upload_category_id = C.upload_category_id 
                 LEFT OUTER JOIN ".cms_db_prefix()."module_uploads_downloads D
                 ON U.upload_id = D.file_id";
			if ($field_name != null && $field_val != null)
			{
				$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv ON fv.upload_id = U.upload_id ";
				$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd ON fd.id = fv.fld_id ";
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv ON fv.upload_id = U.upload_id ";
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd ON fd.id = fv.fld_id ";
			}
			if ($field_name2 != null && $field_val2 != null)
			{
				$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv2 ON fv2.upload_id = U.upload_id ";
				$query1 .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd2 ON fd2.id = fv2.fld_id ";
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fieldvals fv2 ON fv2.upload_id = U.upload_id ";
				$query .= " INNER JOIN ".cms_db_prefix()."module_uploads_fielddefs fd2 ON fd2.id = fv2.fld_id ";
			}
			
			$query .= " WHERE U.upload_category_id = ? ";
			$query1 .= " WHERE U.upload_category_id = ? ";
			 if( $key != null )
				 {
					 $query1 .= " AND upload_key = ?";
					 $query .= " AND upload_key = ?";
					 $qparms[] = $key;
				 }
			 if( $adjusted_filter != '' )
				 {
					 $query1 .= " AND upload_name LIKE ?";
					 $query .= " AND upload_name LIKE ?";
					 $qparms[] = $adjusted_filter;
				 }
				if ($field_name != null && $field_val != null)
				{
					$query1 .= " AND fd.name = ? AND fv.value LIKE ? ";
					$query .= " AND fd.name = ? AND fv.value LIKE ? ";
					$qparms[] = $field_name;
					$qparms[] = '%' . $field_val . '%';
				}
				if ($field_name2 != null && $field_val2 != null)
				{
					$query1 .= " AND fd2.name = ? AND fv2.value LIKE ? ";
					$query .= " AND fd2.name = ? AND fv2.value LIKE ? ";
					$qparms[] = $field_name2;
					$qparms[] = '%' . $field_val2 . '%';
				}
			 // blah blah
			 //$query1 .= " GROUP BY U.upload_id";
			 //$query1 .= $sortorder;
			 $query .= " GROUP BY U.upload_id";
			 $query .= $sortorder;
		 }
		 break;
	 } // switch
 }

$matches = 0;
if( $do_query == true )
	{
		
		// get the total number of rows
		$matches = $db->GetOne($query1, $qparms);

		// calculate the number of pages
		$numpages = (int)($matches / $pagelimit);
		if( $matches % $pagelimit > 0 )
			{
				$numpages++;
			}
		$startoffset = ($pagenum-1) * $pagelimit;
		$dbresult = $db->SelectLimit($query,$pagelimit,$startoffset,$qparms);
// 		if( !$dbresult ) // todo: removeme.
// 			{
// 				echo "DEBUG: sql = ".$db->sql.'<br/>';
// 				echo $db->ErrorMsg().'<br/>';
// 			}

		// setup strings
		$smarty->assign('numpages',$numpages);
		$smarty->assign('pagenum',$pagenum);
		$smarty->assign('pagelimit',$pagelimit);
		$smarty->assign('matches', $matches );
		if( $pagenum > 1 )
			{
				$parms = $params;
				$parms['pagenum'] = 1;
				$smarty->assign('firstpage_url',
												$this->CreateLink($id,'default',$returnid,'',
																					$parms,'',true));
				$parms = $params;
				$parms['pagenum'] = $pagenum - 1;
				$smarty->assign('prevpage_url',
												$this->CreateLink($id,'default',$returnid,'',
																					$parms,'',true));
			}
		if( $pagenum < $numpages )
			{
				$parms = $params;
				$parms['pagenum'] = $numpages;
				$smarty->assign('lastpage_url',
												$this->CreateLink($id,'default',$returnid,'',
																					$parms,'',true));

				$parms = $params;
				$parms['pagenum'] = $pagenum + 1;
				$smarty->assign('nextpage_url',
												$this->CreateLink($id,'default',$returnid,'',
																					$parms,'',true));
			}
		$smarty->assign('firstpage',$this->Lang('firstpage'));
		$smarty->assign('firstpage_arrow',$this->Lang('firstpage_arrow'));
		$smarty->assign('prevpage',$this->Lang('prevpage'));
		$smarty->assign('prevpage_arrow',$this->Lang('prevpage_arrow'));
		$smarty->assign('nextpage',$this->Lang('nextpage'));
		$smarty->assign('nextpage_arrow',$this->Lang('nextpage_arrow'));
		$smarty->assign('lastpage',$this->Lang('lastpage'));
		$smarty->assign('lastpage_arrow',$this->Lang('lastpage_arrow'));
		$smarty->assign('pagetext',$this->Lang('page'));
		$smarty->assign('oftext',$this->Lang('of'));
		$smarty->assign('matchestext',$this->Lang('matchesfound'));
		$smarty->assign('category',$this->Lang('category'));
		$smarty->assign('id',$this->Lang('id'));
		$smarty->assign('delete',$this->Lang('delete'));
		$smarty->assign('areyousure',$this->Lang('areyousure'));
		$smarty->assign('name',$this->Lang('name'));
		$smarty->assign('date',$this->Lang('date'));
		$smarty->assign('author',$this->Lang('author'));
		$smarty->assign('size',$this->Lang('sizekb'));
		$smarty->assign('details',$this->Lang('details'));
		$smarty->assign('summary',$this->Lang('summary'));
		$smarty->assign('description',$this->Lang('description'));
		$smarty->assign('thumbnail',$this->Lang('thumbnail'));
		$smarty->assign('icon',$this->Lang('icon'));
		$smarty->assign('image',$this->Lang('image'));

		if (!$dbresult)
			{
				// maybe there are no files in this category
				$smarty->assign ('message', $this->Lang ('error_nofiles'));
			}

		// do the list
		while ($dbresult && $row = $dbresult->FetchRow())
			{
				$onerow = new StdClass ();
				foreach( $row as $key => $value )
					{
						$onerow->$key = $value;
					}

				if( $params['category'] == 'all' )
					{
						$onerow->category = $row['upload_category_name'];
					}
				else 
					{
						$onerow->category = $params['category'];
					}

				$onerow->sendfile_url =
					$this->CreateLink ($id, 'sendfile', $sendfilepage, '',
														 array('upload_id'=>$row['upload_id']),
														 '', true, true, '', false);

				$onerow->download_url =
					$this->CreateLink ($id, 'getfile', $returnid, '', 
														 array ('upload_id' => $row['upload_id']), 
														 '', true, true, '', false,
														 $this->_getFileURL($row['upload_id'],$row['upload_name']));
				$onerow->namelink =
					$this->CreateLink ($id, 'getfile', $returnid, $row['upload_name'],
														 array ('upload_id' => $row['upload_id']),
														 '', false, true, '', false,
														 $this->_getFileURL($row['upload_id'],$row['upload_name']));

				if( $this->GetPreference('allow_delete',0) == 1 &&
						$row['upload_category_deletable'] == 1)
					{
						$onerow->delete_url =
							$this->CreateLink( $id, 'delete_file', $returnid, '',
																 array('upload_id' => $row['upload_id']),
																 '', true );
					}

				$onerow->author = $row['upload_author'];
				{
					$parms = $params;
					$parms['mode'] = 'single';
					$parms['upload_id'] = $row['upload_id'];
							 
					// now handle the detail link, detail url
					$onerow->detaillink =
						$this->CreateFrontendLink ($id, $returnid, 'default', 
																			 $this->Lang('details'),
																			 $parms, '', false, true, '', false
																			 );
					$onerow->detailurl =
						$this->CreateFrontendLink ($id, $returnid, 'default', 
																			 $this->Lang('details'),
																			 $parms, '', true, false);
				}
				$onerow->summary = $row['upload_summary'];
				if( isset( $row['upload_summary'] ) && $row['upload_summary'] != "" )
					{
						$onerow->summarylink =
							$this->CreateLink ($id, 'getfile', $returnid, $row['upload_summary'],
																 array ('upload_id' => $row['upload_id']),
																 '', false, true, '', false,
																 $this->_getFileURL($row['upload_id'],$row['upload_name']));;
					}

				// original file URL
				$catpath = $this->getCategoryPathFromFileID($row['upload_id']);
				$onerow->origfile_url = $config['uploads_url']."/$catpath/".$row['upload_name'];

				// thumbnail
				if( !empty($row['upload_thumbnail']) )
					{
						$tnfile = $this->_categoryPath( $catpath.DIRECTORY_SEPARATOR.$row['upload_thumbnail'] );
						if( file_exists( $tnfile ) )
							{
								$tnurl = $config['uploads_url']."/".$catpath."/".$row['upload_thumbnail'];
								$onerow->thumbnail_url = $tnurl;
							}
					}
						 
				// get the files extension
				// see if we're allowed to display it as an image
				// if we are then create the image_url
				$fileextension = strtolower(strrchr($row['upload_name'],'.'));
				$thumb_ext_arr = explode(",",
																 $this->GetPreference('autothumbnail_extensions'));
				global $gCms;
						 
				foreach( $thumb_ext_arr as $thumb_ext )
					{
						if( ".".$thumb_ext == $fileextension )
							{
								$onerow->image_url =
									$this->CreateLink ($id, 'getimage', $returnid, '',
																		 array ('showtemplate'=>'false',
																						'upload_id'=>$row['upload_id']),
																		 '', true );
								break;
							}
					}
						 
				// filetype
				$filetype = $this->_GetFileType( $row['upload_name'] );
				if( $filetypes != '' )
					{
						$res = array_search( $filetype['name'], explode(',',$filetypes ) );
						if( $res === NULL || $res === FALSE )
							{
								// we have found a file that isn't a type we requested.
								continue;
							}
					}
						 
				$imgpath = 'modules/'.basename(dirname(__FILE__)).'/images/';
				if( $filetype !== false )
					{
						$onerow->iconurl = $imgpath.$filetype['image'];
						$onerow->filetype = $filetype;
					}
				else
					{
						$onerow->iconurl = $imgpath.'unknown.png';
					}
						 
				$onerow->description = $row['upload_description'];
				$onerow->ip = $row['upload_ip'];
				$onerow->size = intval($row['upload_size'] / 1024.0 + 0.5);
				$onerow->date = $row['upload_date'];
						 

				// get extra fields.
				{
					$query = 'SELECT A.id,A.name,A.type,B.upload_id,B.value 
              FROM '.cms_db_prefix().'module_uploads_fielddefs A 
              LEFT JOIN '.cms_db_prefix().'module_uploads_fieldvals B 
                ON A.id = B.fld_id 
             WHERE B.upload_id = ? AND A.public = 1
             ORDER BY A.iorder ASC';
					$tmp = $db->GetArray($query,array($row['upload_id']));
					if( $tmp )
					{
						$hash = cge_array::to_hash($tmp,'name');
						
						$onerow->fieldvals = array();
						foreach ($hash as $k => $v)
						{
							$onerow->fieldvals[$k] = $v['value'];
						}
						
						$onerow->fields = $hash;
					}
				}

				$rowarray[] = $onerow;
			}
				 
		$smarty->assign ('items', $rowarray);
		$smarty->assign ('itemcount', count($rowarray));
	}


// Display the populated template
if($params['mode'] != 'select')
	{
		echo $this->ProcessTemplateFromDatabase ($template);
	}

?>
