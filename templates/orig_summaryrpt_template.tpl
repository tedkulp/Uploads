<!-- Start Upload Summary Template -->
{if isset($input_filter) }
{$startform}
{$prompt_filter}{$input_filter}{$hidden_params}{$input_submit}
{$endform}
<br/>
{if isset($matches)}
{$matches}&nbsp;{$matchestext}
{/if}
{/if}

<div>
{if isset($prevpage_url)}
  <a href="{$firstpage_url}" title="{$firstpage}">{$firstpage_arrow}</a>
  <a href="{$prevpage_url}" title="{$prevpage}">{$prevpage_arrow}</a>
{/if}
{if $numpages > 1}
  &nbsp;&nbsp;{$pagetext} {$pagenum} {$oftext} {$numpages}&nbsp;&nbsp;
{/if}
{if isset($nextpage_url)}
  <a href="{$nextpage_url}" title="{$nextpage}">{$nextpage_arrow}</a>
  <a href="{$lastpage_url}" title="{$lastpage}">{$lastpage_arrow}</a>
{/if}
</div>

{foreach from=$items item='entry' name='uploads'}
  {if ($smarty.foreach.uploads.index == 0) or ($smarty.foreach.uploads.index % 3 == 0)}
    <div class="row" style="width: 100%; padding-bottom: 10px;">
  {/if}
 
  <div class="upload" style="float: left; width: 33%;">
    <a href="{$entry->detailurl}">{$entry->upload_name}</a>&nbsp;({$entry->size})<br/>
    <a href="{$entry->download_url}" title="{$entry->upload_name}">
      {if isset($entry->thumbnail_url)}
        <img src="{$entry->thumbnail_url}" alt="">
      {else}
        <img src="{$entry->iconurl}" alt="">
      {/if}
    </a>
    <br/>
    <a href="{$entry->sendfile_url}" title="">Send this file</a><br/>
    {$author}: {$entry->author}<br/>
    {$date}: {$entry->date}<br/>
    {$entry->summary}
  </div>

  {if ($smarty.foreach.uploads.index == 0) or ($smarty.foreach.uploads.index % 3 == 0)}
    </div>
  {/if}
  {foreach name=fields from=$entry->fields key='fldname' item='field'}
    {$field.name}: {$field.value}<br/>
  {/foreach}
{/foreach}
<!-- End Upload Summary Template -->
