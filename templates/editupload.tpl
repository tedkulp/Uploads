{$title}
{if $message != ''}
  {if $error != ''}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{else}
{$startform}
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_uploadname}:</p>
    <p class="pageinput">{$input_uploadname} 
      {*<input type="submit" name="{$actionid}fix" value="{$mod->Lang('fixme')}" title="{$mod->Lang('title_fixspaces')}"/>*}
      <br/>
      {$mod->Lang('renamemessage')}
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_replacefile')}:</p>
    <p class="pageinput">
      <input type="file" name="{$actionid}replace_file" value="" size="50"/>
      <input type="submit" name="{$actionid}replace" value="{$mod->Lang('replace')}" title="{$mod->Lang('info_replace')}"/>
      <br/>
      {$mod->Lang('info_replacefile')}
    </p>
  </div>

  {if isset($thumb_url)}
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_thumbnail}</p>
    <p class="pageinput">
      {if isset($file_url)}
        <a href="{$file_url}" class="fancybox">
      {/if}
      <img src="{$thumb_url}" alt=""/>
      {if isset($file_url)}
        </a>
      {/if}
    </p>
  </div>
  {/if}
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_newthumbnail}</p>
    <p class="pageinput">{$input_newthumbnail}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_movecategory}:</p>
    <p class="pageinput">{$input_movecategory}
      <br/>
      {$mod->Lang('pathmessage')}
    </p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_uploadsize}:</p>
    <p class="pageinput">{$data_uploadsize}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_uploaddate}:</p>
    <p class="pageinput">{$data_uploaddate}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_uploadauthor}:</p>
    <p class="pageinput">{$input_uploadauthor}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_uploadsummary}:</p>
    <p class="pageinput">{$input_uploadsummary}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_uploaddesc}:</p>
    <p class="pageinput">{$input_uploaddesc}</p>
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
          {html_options options=$one.attrib.options selected=$one.value}
        </select>
      {elseif $one.type == 'multiselect'}
        <select multiple="multiple" size="4" name="{$actionid}field_{$one.id}[]">
          {html_options options=$one.attrib.options selected=$one.value}
        </select>
      {/if}
    </p>
  </div>
  {/foreach}
  {/if}

  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput">{$hidden}{$thumbnail}{$submit}{$cancel}</p>
  </div>
  {if $itemcount > 0}
    <br/>
    <table cellspacing="0" class="pagetable">
      <thead>
        <tr>
          <th>{$datetext}</th>
          <th>{$iptext}</th>
          <th>{$usertext}</th>
        </tr>
      </thead>
      <tbody>
      {foreach from=$items item=entry}
        <tr class="{$entry->rowclass}">
          <td>{$entry->date}</td>
          <td>{$entry->ip}</td>
          <td>{$entry->user}</td>
        </tr>
      {/foreach}
      </tbody>
    </table>
  {/if}
{$endform}
{/if}
