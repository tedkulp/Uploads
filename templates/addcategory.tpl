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
    <p class="pagetext">{$prompt_categoryname}</p>
    <p class="pageinput">{$input_categoryname}<br/>{$info_categoryname}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_categorydesc}</p>
    <p class="pageinput">{$input_categorydesc}<br/>{$info_categorydesc}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_categorypath}</p>
    <p class="pageinput">{$input_categorypath}</p>
    <p class="pageinput">{$info_categorypath}<br/>{$pathmessage}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_categorylistable}</p>
    <p class="pageinput">
 	{$input_categorylistable}
    </p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_categorydeletable}</p>
    <p class="pageinput">
       	{$input_categorydeletable}
	<br/>
        {$mod->Lang('info_categorydeletable')}
    </p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_category_expires_hrs')}</p>
    <p class="pageinput">
       	{$input_category_expires_hrs}
	<br/>
        {$mod->Lang('info_category_expires_hrs')}
    </p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_category_scannable')}</p>
    <p class="pageinput">
       	{$input_category_scannable}
	<br/>
        {$mod->Lang('info_category_scannable')}
    </p>
  </div>
{if isset($prompt_grouplist)}
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_grouplist}</p>
    <p class="pageinput">{$input_grouplist}<br/>{$info_grouplist}</p>
  </div>
{/if}
  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput">{$hidden}{$scan}{$thumbnails}{$submit}{$cancel}</p>
  </div>
{$endform}
{/if}
