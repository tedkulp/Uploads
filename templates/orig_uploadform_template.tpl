<!-- Upload form template -->
{$startform}
{if isset($max_uploadsize)}
<input type='hidden' name="MAX_UPLOAD_SIZE" value="{$max_uploadsize}"/>
{/if}
{if isset($noauthor) } 
{$input_author}
{else}
<p>{$prompt_author}:&nbsp;<input type="text" name="{$actionid}input_author" value="{$author}" size="20" maxlength="255"/></p>
{/if}
<p>{$prompt_upload}:&nbsp;<input type="file" name="{$actionid}input_browse" value="" size="50" maxlength="255"/></p>
<p>{$prompt_summary}&nbsp;<input type="text" name="{$actionid}input_summary" value="" size="40" maxlength="255"/></p>
</p>
<p>{$prompt_description}&nbsp;<textarea name="{$actionid}input_description"></textarea></p>
<p>{$prompt_destname}&nbsp;<input type="text" name="{$actionid}input_destname" value="" size="40" maxlength="255"/>&nbsp;{$info_destname}</p>
<p>{$prompt_thumbnail}&nbsp;<input type="file" name="{$actionid}input_thumbnail" value="" size="40" maxlength="255"/>&nbsp;{$info_thumbnail}</p>

{if isset($fields)}
  {foreach from=$fields item='one' key='name'}
  {strip}<p>{$one.name}:&nbsp;
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
  {/if}{/strip}
  {/foreach}
{/if}
{if isset($captcha)}
<p>{$captcha_title}&nbsp;{$captcha}</p>
<p><input type="text" name="{$actionid}input_captcha" size="10" maxlength="10"/></p>
{/if}
<p><input type="submit" name="{$actionid}input_submit" value="{$mod->Lang('submit')}"/></p>
{$endform}
<!-- Upload form template -->
