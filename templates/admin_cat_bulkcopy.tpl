{$formstart}
{foreach from=$categories item='onecat'}
<fieldset>
<legend>{$onecat.upload_category_name}&nbsp;({$onecat.upload_category_path}):&nbsp;</legend>
 <div class="pageoverlow">
   <table class="pagetable" cellspacing="0">
     <thead>
       <tr>
         <th>{$mod->Lang('name')}:</th>
         <th>{$mod->Lang('description')}:</th>
         <th>{$mod->Lang('path')}:</th>
         <th>{$mod->Lang('copy_files')}:</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <td><input type="text" name="{$actionid}copycategory[{$onecat.upload_category_id}][name]" value="Copy of {$onecat.upload_category_name}" size="40" maxlength="255"/></td>
         <td><input type="text" name="{$actionid}copycategory[{$onecat.upload_category_id}][description]" value="{$onecat.upload_category_description}" size="40" maxlength="255"/></td>
         <td><input type="text" name="{$actionid}copycategory[{$onecat.upload_category_id}][path]" value="{$onecat.upload_category_path}_copy" size="40" maxlength="255"/></td>
         <td>
           <input type="hidden" name="{$actionid}copycategory[{$onecat.upload_category_id}][dofiles]" value="0"/>
           <input type="checkbox" name="{$actionid}copycategory[{$onecat.upload_category_id}][dofiles]" value="1"/>
         </td>
       </tr>
     </tbody>
   </table>
 </div>
</fieldset>
{/foreach}

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}bulkcopy_submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}