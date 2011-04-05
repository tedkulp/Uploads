{* yousendit interface *}
{if isset($message)}
<div style="border: 1px solid #99FD99; color: #000; background: #DAFEDA; margin-bottom: 0.5em;">
<ul>
  {foreach from=$messages item='one'}
  <li>{$one}</li>
  {/foreach}
</ul>
</div>
{/if}

{if isset($errors)}
<div style="border: 1px dashed #FD9999; color: #000; background: #FEDADA; ; margin-bottom: 0.5em;">
<ul>
  {foreach from=$errors item='one'}
  <li>{$one}</li>
  {/foreach}
</ul>
</div>
{/if}

{$startform}
<p>{$mod->Lang('author')}:&nbsp;
  <input type="text" name="author" size="20" maxlength="255" value="{$author}"/>
</p>

<p>{$mod->Lang('summary')}:
  <input type="text" name="{$actionid}input_summary" size="40" maxlength="255" value="{$summary}"/>
</p>

<p>{$mod->Lang('description')}:&nbsp;
  <textarea name="{$actionid}input_description">{$description}</textarea>
</p>

<p>{$mod->Lang('destname')}:&nbsp;
  <input type="text" name="{$actionid}input_destname" size="40" maexlength="255" value="{$destname}"/><br/>
  {$mod->Lang('info_destname')}
</p>

<p>{$mod->Lang('thumbnail')}:&nbsp;
  <input type="file" name="{$actionid}input_thumbnail" size="50"/>
</p>

<p>{$mod->Lang('prompt_replace')}:&nbsp;
  <input type="hidden" name="{$actionid}input_replace" value="0"/>
  <input type="checkbox" name="{$actionid}input_replace" value="1"/><br/>
  {$mod->Lang('info_replace')}
</p>

<p>*{$mod->Lang('upload')}:&nbsp;
  <input type="file" name="{$actionid}input_browse" size="50"/>
</p>

<br/>
<hr/>
<br/>

<p>*{$mod->Lang('to')}:&nbsp;
  <textarea name="{$actionid}input_sendto" rows="2" cols="50">{$sendto}</textarea>
</p>

<p>*{$mod->Lang('subject')}:&nbsp;
  <input type="text" name="{$actionid}input_subject" value="{$subject}" size="50"/>
</p>

<p>{$mod->Lang('notes')}:&nbsp;
  <textarea name="{$actionid}input_notes" rows="5" cols="50">{$notes}</textarea>
</p>

<p>{$captcha_title}&nbsp;{$captcha}</p>
<p>{$input_captcha}</p>
<p>
  <input type="submit" name="{$actionid}input_submit" value="{$mod->Lang('send')}"/>
  <input type="submit" name="{$actionid}input_cancel" value="{$mod->Lang('cancel')}"/>
</p>

{$endform}
<!-- Upload form template -->
