<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGUFeedback (c) 2009 by Robert Campbell
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide the ability to rate
#  and comment on specific pages or specific items in a module.
#  Includes numerous seo friendly, and designer friendly capabilities.
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
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Modify Site Preferences') )
  {
    die('permission denied');
  }

#
# Initialization
#
$this->SetCurrentTab('fields');
$status = '';
$msg = '';
$field = array('name'=>'','type'=>'textinput','attribs'=>'','iorder'=>1,'public'=>1);
$field['attrib'] = array();
$yesno = array(1=>$this->Lang('yes'),0=>$this->Lang('no'));
$types = array('textinput'=>$this->Lang('fieldtype_textinput'),
	       'textarea'=>$this->Lang('fieldtype_textarea'),
	       'checkbox'=>$this->Lang('fieldtype_checkbox'),
	       'dropdown'=>$this->Lang('fieldtype_dropdown'),
	       'multiselect'=>$this->Lang('fieldtype_multiselect'));

#
# Setup
#

#
# Get the data
#
if( isset($params['fid']) )
  {
    $query = 'SELECT * FROM '.cms_db_prefix().'module_uploads_fielddefs WHERE id = ?';
    $tmp = $db->GetRow($query,array((int)$params['fid']));
    if( $tmp )
      {
	$field = $tmp;
	$field['attrib'] = unserialize($field['attribs']);
      }
  }

#
# Process form values
#
if( isset($params['cancel']) )
  {
    $this->RedirectToTab($id);
  }
if( isset($params['name']) )
  {
    $field['name'] = trim($params['name']);
  }
if( isset($params['type']) )
  {
    $field['type'] = $params['type'];
  }
if( isset($params['public']) )
  {
    $field['public'] = $params['public'];
  }
foreach( $params as $key => $value )
{
  if( !startswith($key,'attrib_') ) continue;

  $attrib = substr($key,7);
  $field['attrib'][$attrib] = $value;
}
if( isset($params['submit']) )
  {
    // validate
    if( !isset($field['name']) || empty($field['name']) )
      {
	$status = $this->Lang('error_missingvalue','name');
      }

    if( empty($status) )
      {
	switch( $field['type'] )
	  {
	  case 'textinput':
	    {
	      if( !isset($field['attrib']['length']) || $field['attrib']['length'] <= 0 )
		{
		  $status = $this->Lang('error_missingvalue','length');
		}
	      else if( !isset($field['attrib']['maxlength']) || $field['attrib']['maxlength'] <= 0 )
		{
		  $status = $this->Lang('error_missingvalue','maxlength');
		}
	    }
	    break;
// 	  case 'checkbox':
// 	    {
// 	    }
// 	    break;
	  case 'dropdown':
	  case 'multiselect':
	    {
	      if( !isset($field['attrib']['options']) )
		{
		  $status = $this->Lang('error_missingvalue','options');
		}
	      else
		{
		  $tmp = explode("\n",$field['attrib']['options']);
		  $count = 0;
		  foreach( $tmp as $one )
		    {
		      $x = trim($one);
		      if( !empty($x) ) $count++;
		    }
		  if( $count == 0 )
		    {
		      $status = $this->Lang('error_missingvalue','options');
		    }
		}
	    }
	    break;
	  }
      }

    if( empty($status) )
      {
	// double check a field by this name doesn't already exist
	if( isset($field['id']) && $field['id'] > 0 )
	  {
	    $query = 'SELECT id FROM '.cms_db_prefix().'module_uploads_fielddefs WHERE name = ? AND id != ?';
	    $tmp = $db->GetOne($query,array($field['name'],$field['id']));
	    if( $tmp )
	      {
		$status = $this->Lang('error_nameexists');
	      }
	  }
	else
	  {
	    $query = 'SELECT id FROM '.cms_db_prefix().'module_uploads_fielddefs WHERE name = ?';
	    $tmp = $db->GetOne($query,array($field['name']));
	    if( $tmp )
	      {
		$status = $this->Lang('error_nameexists');
	      }
	  }
      }

    // now we're ready to save.
    if( empty($status) )
      {
	$field['attribs'] = serialize($field['attrib']);
	unset($field['attrib']);

	$dbr = '';
	if( isset($field['id']) && $field['id'] > 0 )
	  {
	    // it's an update
	    $msg = $this->Lang('msg_field_updated');
	    $query = 'UPDATE '.cms_db_prefix().'module_uploads_fielddefs
                         SET name = ?, type = ?, attribs = ?, public = ?
                       WHERE id = ?';
	    $dbr = $db->Execute($query,array($field['name'],$field['type'],$field['attribs'],$field['public'],$field['id']));
	  }
	else
	  {
	    $msg = $this->Lang('msg_field_added');
	    $query = 'SELECT MAX(iorder) FROM '.cms_db_prefix().'module_uploads_fielddefs';
	    $tmp = $db->GetOne($query);
	    if (empty($tmp) || $tmp < 0) {
			$field['iorder'] = 1;
		} else {
		    $field['iorder'] = $tmp + 1;
		}
	    // it's an insert
	    $query = 'INSERT INTO '.cms_db_prefix().'module_uploads_fielddefs
                       (name,type,attribs,iorder,public)
                      VALUES (?,?,?,?,?)';
	    $dbr = $db->Execute($query,array($field['name'],$field['type'],$field['attribs'],$field['iorder'],
					     $field['public']));

	  }

	if( !$dbr )
	  {
	    $status = $this->Lang('error_dberror').'<br/>'.$db->sql.'<br/>'.$db->ErrorMsg();
	  }
      }

    if( empty($status) )
      {
	// all done
	$this->RedirectToTab($id);
      }
  }

#
# Give everything to smarty
#
$smarty->assign('formstart',$this->CreateFormStart($id,'admin_add_field',$returnid,'post','',false,'',$params));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('yesno',$yesno);
$smarty->assign('fldtypes',$types);
$smarty->assign('fld',$field);

#
# Process the template
#
if( !empty($status) )
  {
    echo $this->ShowErrors($status);
  }
echo $this->ProcessTemplate('admin_add_field.tpl');

#
# EOF
#
?>
