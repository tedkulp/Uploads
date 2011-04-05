<h3>{$mod->Lang('addedit_timelimited_key')}</h3>
<h4>{$mod->Lang('file_info2',$upload.upload_name,$upload.upload_id)}</h4>

{$formstart}
 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('email_address')}</p>
   <p class="pageinput">
     <input type="text" name="{$actionid}email" value="{$email}" size="40" maxlength="255"/>
   </p>
 </div>

 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('prompt_timelimited_hours')}</p>
   <p class="pageinput">
     <input type="text" name="{$actionid}hours" value="{$hours}" size="5" maxlength="5"/>
   </p>
 </div>

 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('prompt_timelimited_downloads')}</p>
   <p class="pageinput">
     <input type="text" name="{$actionid}downloads" value="{$downloads}" size="3" maxlength="3"/>
   </p>
 </div>

 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('prompt_timelimited_sendit')}</p>
   <p class="pageinput">
     <input type="checkbox" name="{$actionid}sendit" value="1" checked="checked"/>
   </p>
 </div>

 <div class="pageoverflow">
   <p class="pagetext">&nbsp;</p>
   <p class="pageinput">
     <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
     <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
   </p>
 </div>
{$formend}