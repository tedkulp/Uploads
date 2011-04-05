<?php
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

echo '<div class="pageoverflow" style="text-align: right; width: 80%;">'.
$this->CreateImageLink($id,'defaultadmin',$returnid,
		       $this->Lang('lbl_back'),'icons/system/back.gif',array(),'','',false).'</div><br/>';

echo $this->StartTabHeaders ();
if ($this->CheckPermission ('Modify Templates') )
  {
    echo $this->SetTabHeader ('uploadform_template',
			      $this->Lang ('uploadform_template'));
    echo $this->SetTabHeader ('summary_template',
			      $this->Lang ('summary_template'));
    echo $this->SetTabHeader ('detail_template',
			      $this->Lang ('detail_template'));
    echo $this->SetTabHeader ('sendfileform_template',
			      $this->Lang ('sendfileform_template'));
    echo $this->SetTabHeader ('yousenditform_template',
			      $this->Lang ('yousenditform_template'));
    echo $this->SetTabHeader ('email_template',
			      $this->Lang ('email_template'));
    echo $this->SetTabHeader ('default_templates',
			      $this->Lang('default_templates'));
  }
echo $this->EndTabHeaders ();
echo $this->StartTabContent ();
if ($this->CheckPermission ('Modify Templates'))
  {
    // the upload form template tab
    echo $this->StartTab ("uploadform_template");
    {
      echo $this->ShowTemplateList( $id, $returnid, 'uploadform_',
				    'uploadform_sysdefault', 'uploadform_template',
				    'default_uploadform',
				    $this->Lang('title_uploadform_template'),
				    '',
				    'admin_templates');
    }
    echo $this->EndTab();
	
    // the summary template tab
    echo $this->StartTab ("summary_template");
    {
      echo $this->ShowTemplateList( $id, $returnid, 'summaryrpt_',
				    'summaryrpt_sysdefault', 'summary_template',
				    'default_summaryrpt',
				    $this->Lang('title_summaryrpt_template'),
				    '',
				    'admin_templates');
    }
    echo $this->EndTab ();
	
    // the detail template tab
    echo $this->StartTab ("detail_template");
    {
      echo $this->ShowTemplateList( $id, $returnid, 'detailrpt_',
				    'detailrpt_sysdefault', 'detail_template',
				    'default_detailrpt',
				    $this->Lang('title_detailrpt_template'),
				    '',
				    'admin_templates');
    }
    echo $this->EndTab ();

    // the sendfileform template tab
    echo $this->StartTab ("sendfileform_template");
    {
      echo $this->ShowTemplateList( $id, $returnid, 'sendfileform_',
				    'sendfileform_sysdefault', 'sendfileform_template',
				    'default_sendfileform',
				    $this->Lang('title_sendfileform_template'),
				    '',
				    'admin_templates');
    }
    echo $this->EndTab ();

    // the yousenditform template tab
    echo $this->StartTab ("yousenditform_template");
    {
      echo $this->ShowTemplateList( $id, $returnid, 'yousenditform_',
				    'yousenditform_sysdefault', 'yousenditform_template',
				    'default_yousenditform',
				    $this->Lang('title_yousenditform_template'),
				    '',
				    'admin_templates');
    }
    echo $this->EndTab ();
	
    // the email template tab
    echo $this->StartTab('email_template');
    {
      include(dirname(__FILE__).'/function.admin_email_template_tab.php');
    }
    echo $this->EndTab();


    // the default templates tab
    echo $this->StartTab('default_templates');
    {
      echo $this->GetDefaultTemplateForm($this,$id,$returnid,'uploadform_sysdefault',
					 'admin_templates',
					 'default_templates',
					 $this->Lang('title_uploadform_sysdefault'),
					 'orig_uploadform_template.tpl',
					 $this->Lang('info_sysdefault'));

      echo '<div style="border-bottom: 1px solid black; width: 80%;"></div>';

      echo $this->GetDefaultTemplateForm($this,$id,$returnid,'summaryrpt_sysdefault',
					 'admin_templates',
					 'default_templates',
					 $this->Lang('title_summaryrpt_sysdefault'),
					 'orig_summaryrpt_template.tpl',
					 $this->Lang('info_sysdefault'));

      echo '<div style="border-bottom: 1px solid black; width: 80%;"></div>';

      echo $this->GetDefaultTemplateForm($this,$id,$returnid,'detailrpt_sysdefault',
					 'admin_templates',
					 'default_templates',
					 $this->Lang('title_detailrpt_sysdefault'),
					 'orig_detailrpt_template.tpl',
					 $this->Lang('info_sysdefault'));

      echo '<div style="border-bottom: 1px solid black; width: 80%;"></div>';

      echo $this->GetDefaultTemplateForm($this,$id,$returnid,'sendfileform_sysdefault',
					 'admin_templates',
					 'default_templates',
					 $this->Lang('title_sendfileform_sysdefault'),
					 'orig_sendfileform_template.tpl',
					 $this->Lang('info_sysdefault'));

      echo '<div style="border-bottom: 1px solid black; width: 80%;"></div>';

      echo $this->GetDefaultTemplateForm($this,$id,$returnid,'yousenditform_sysdefault',
					 'admin_templates',
					 'default_templates',
					 $this->Lang('title_yousenditform_sysdefault'),
					 'orig_yousenditform_template.tpl',
					 $this->Lang('info_sysdefault'));
      
    }
    echo $this->EndTab();
  }
echo $this->EndTabContent();

#
# EOF
#
?>