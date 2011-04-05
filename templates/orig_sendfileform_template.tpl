{* form to send a file *}
{if isset($message)}
<div style="border: 1px solid #99FD99; color: #000; background: #DAFEDA;">
{$message}
</div>
{/if}

{if isset($error)}
<div style="border: 1px dashed #FD9999; color: #000; background: #FEDADA;">
{$error}
</div>
{/if}

{$formstart}
<fieldset>
<legend>{$mod->Lang('file_info')}:&nbsp;</legend>
<p>{$mod->Lang('name')}:&nbsp;{$upload_info.upload_name} ({$upload_info.upload_id})</p>
<p>{$upload_info.upload_summary}</p>
</fieldset>

<div class="row" style="width: 80%;">
  <p style="margin-left: 4em; margin-top: 1em;">
    {$mod->Lang('addressees')}
  </p>
  <p style="margin-left: 4em; margin-top: 0;">
   <textarea name="{$actionid}input_sendto" rows="2" cols="50">{$sendto}</textarea>
  </p>
</div>

<div class="row" style="width: 80%;">
  <p style="margin-left: 4em; margin-top: 1em;">
    {$mod->Lang('subject')}
  </p>
  <p style="margin-left: 4em; margin-top: 0;">
    <input type="text" name="{$actionid}input_subject" size="50" maxlength="50" value="{$subject}"/>
  </p>
</div>

<div class="row" style="width: 80%;">
  <p style="margin-left: 4em; margin-top: 1em;">
    {$mod->Lang('notes')}
  </p>
  <p style="margin-left: 4em; margin-top: 0;">
   <textarea name="{$actionid}input_notes" rows="5" cols="50">{$notes}</textarea>
  </p>
</div>

<div class="row" style="width: 80%;">
  <p style="margin-left: 4em; margin-top: 1em;">&nbsp;</p>
  <p style="margin-left: 4em; margin-top: 0;">
    <input type="submit" name="{$actionid}input_submit" value="{$mod->Lang('send')}"/>
    <input type="submit" name="{$actionid}input_cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}