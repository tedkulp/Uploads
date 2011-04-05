<?php // -*- mode:php; c-set-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
#-------------------------------------------------------------------------
# Module: Uploads -= allow users to upload stuff, a pseudo file manager" module
# Author: Robert Campbell <rob@techcom.dyndns.org>
# This action added by SjG, so if it's screwed up, you know who to blame
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

     // try to figure out a sort order
     $sortorder = "ORDER BY upload_date ASC";
     if( isset($params['sortorder']) ) {
       switch( trim($params['sortorder']) ) {
       case "name_asc":
				 // ascending name
				 $sortorder = "ORDER BY upload_category_name ASC";
				 break;
       case "name_desc":
				 // descending name
				 $sortorder = "ORDER BY upload_category_name DESC";
				 break;
       case "summ_asc":
				 // ascending summary
				 $sortorder = "ORDER BY upload_category_description ASC";
				 break;
       case "summ_desc":
				 // descending summary
				 $sortorder = "ORDER BY upload_category_description DESC";
				 break;
     case "random":
				 // random
				 $sortorder = "ORDER BY rand()";
       }
     }
     $sortorder = " ".$sortorder;

     // determine how many we're going to display
     $count = "";
     if( isset( $params['count'] ) )
       {
				 $count = " LIMIT 0,".(int)trim($params['count']);
       }

				 
	  $qparms = array();
	  $query = "SELECT upload_category_id, upload_category_name, upload_category_description FROM ".cms_db_prefix()."module_uploads_categories WHERE upload_category_listable = 1";
	  $query .= $sortorder.$count;

	  $dbresult = $db->Execute( $query);

	  if( $dbresult && $dbresult->RecordCount() )
		 {
		 $matches = $dbresult->RecordCount();
		 }

	  // setup strings - assign a bunch as blank, just in case someone
	  // uses a standard summary template
	  $this->smarty->assign('category',$this->Lang('category'));
	  $this->smarty->assign('id',$this->Lang('id'));
	  $this->smarty->assign('name',$this->Lang('name'));
	  $this->smarty->assign('date','');
	  $this->smarty->assign('author','');
	 $this->smarty->assign('size','');
	 $this->smarty->assign('details','');
	 $this->smarty->assign('summary',$this->Lang('summary'));
	 $this->smarty->assign('description',$this->Lang('description'));
	 $this->smarty->assign('thumbnail','');
	 $this->smarty->assign('icon','');
	 $this->smarty->assign('image','');
     $template = 'summaryrpt_'.(isset($params['template'])?$params['template']:'default');
    $rowarray=array();
		 $rowclass = 'row1';
		 while ($row = $dbresult->FetchRow())
			{
			$onerow = new stdClass ();
			$onerow->id = $row['upload_category_id'];
			$onerow->name = $row['upload_category_name'];
			$onerow->category = '';
			$onerow->download_url = '';
			$onerow->namelink = $this->CreateLink ($id, 'default', $returnid,
            $row['upload_category_name'],array ('category'=>$onerow->name,
            'mode'=>'summary',
            'sortorder'=>(
               isset($params['listingsortorder'])?$params['listingsortorder']:'date_asc'),
            'template'=>(
               isset($params['listingtemplate'])?$params['listingtemplate']:'default'),
            ));
			$onerow->author = '';
			$onerow->detaillink = '';
			$onerow->detailurl = '';
			$onerow->summary = $row['upload_category_description'];
			$onerow->summarylink = '';
			$onerow->thumbnail_url = '';
			$onerow->image_url = '';
			$onerow->iconurl = '';
			$onerow->filetype = '';
			$onerow->description = $row['upload_category_description'];
			$onerow->ip = '';
			$onerow->size = ''; // could populate with count...
			$onerow->date = ''; // could populate with data ...
			$onerow->rowclass = $rowclass;
		     
			array_push ($rowarray, $onerow);
		    ($rowclass == "row1" ? $rowclass = "row2" : $rowclass = "row1");
			}
		$this->smarty->assign ('items', $rowarray);
		$this->smarty->assign ('itemcount', count($rowarray));

$this->smarty->assign( 'matches', $matches );

// Display the populated template
echo $this->ProcessTemplateFromDatabase ($template);
 
?>