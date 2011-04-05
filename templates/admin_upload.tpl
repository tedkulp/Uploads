<h3>{$mod->Lang('upload_file')}</h3>

{$formstart}
<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('category')}</p>
  <p class="pageinput">
    <select name="{$actionid}category_id">
      {html_options options=$categories selected=$curcategory}
    </select>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('upload')}</p>
  <p class="pageinput">
    <input type="file" name="{$actionid}input_browse" value="" size="80"/>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('thumbnail')}</p>
  <p class="pageinput">
    <input type="file" name="{$actionid}input_thumbnail" value="" size="80"/>
    <br/>
    {$mod->Lang('info_thumbnail')}
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('destname')}</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}input_destname" value="{$upload.destname}" size="50" maxlength="255"/>
    <br/>
    {$mod->Lang('info_destname')}
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('summary')}</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}input_summary" value="{$upload.summary}" size="80" maxlength="255"/>
    <br/>
    {$mod->Lang('info_summary')}
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('author')}:</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}input_author" value="{$upload.author}" size="50" maxlength="255"/>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('description')}</p>
  <p class="pageinput">
    <textarea name="{$actionid}input_description">{$upload.description}</textarea>
  </p>
</div>

{if isset($fields)}
{foreach from=$fields item='one'}
<div class="pageoverflow">
  <p class="pagetext">{$one.name}</p>
  <p class="pageinput">
    {if isset($one.input)}
      {$one.input}
    {elseif $one.type == 'textinput'}
      <input type="text" name="{$actionid}field_{$one.id}" value="{$one.value}" size="{$one.attrib.length}" maxlength="{$one.attrib.maxlength}"/>
    {elseif $one.type == 'checkbox'}
      <input type="checkbox" name="{$actionid}field_{$one.id}" value="1"{if $one.value == 1} checked="checked"{/if}/>
    {elseif $one.type == 'dropdown'}
      <select name="{$actionid}field_{$one.id}">
        {html_options options=$one.attrib.options}
      </select>
    {elseif $one.type == 'multiselect'}
      <select multiple="multiple" size="4" name="{$actionid}field_{$one.id}[]">
        {html_options options=$one.attrib.options}
      </select>
    {/if}
  </p>
</div>
{/foreach}
{/if}

{if isset($allow_upload_sendfile) && $allow_upload_sendfile == 1}
<fieldset>
<legend>{$mod->Lang('prompt_tl_access')}:</legend>
<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('email_address')}:</p>
  <p class="pageinput">
    <input type="text" name="{$actionid}tl_email" value="" size="40" maxlength="255"/>
  </p>
</div>

 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('prompt_timelimited_hours')}</p>
   <p class="pageinput">
     <input type="text" name="{$actionid}tl_hours" value="{$tl_hours}" size="3" maxlength="3"/>
   </p>
 </div>

 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('prompt_timelimited_downloads')}</p>
   <p class="pageinput">
     <input type="text" name="{$actionid}tl_downloads" value="{$tl_downloads}" size="3" maxlength="3"/>
   </p>
 </div>

 <div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('prompt_timelimited_sendit')}</p>
   <p class="pageinput">
     <input type="hidden" name="{$actionid}tl_sendit" value="0"/>
     <input type="checkbox" name="{$actionid}tl_sendit" value="1" checked="checked"/>
   </p>
 </div>
</fieldset>
{/if}

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">
    <input type="hidden" name="{$actionid}input_replace" value="{$allow_replace}"/>
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}