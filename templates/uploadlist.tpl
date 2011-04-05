{if $message != ''}
  {if $error != ''}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
{if $noform == ''}
{$startform}
  <table>
    <tr><td>{$category}</td><td>{$input_category}{$input_select}{$input_hidden}<br/></td></tr>
  </table>
{*
<fieldset>
<legend>&nbsp;{$legend_uploadform}:&nbsp;</legend>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_author}:</p>
    <p class="pageinput">{$input_author}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_destname}:</p>
    <p class="pageinput">{$input_destname}<br/>{$info_destname}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_summary}:</p>
    <p class="pageinput">{$input_summary}<br/>{$info_summary}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_thumbnail}:</p>
    <p class="pageinput">{$input_thumbnail}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_replace}:</p>
    <p class="pageinput">{$input_replace}<br/>{$info_replace}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$prompt_browse}:</p>
    <p class="pageinput">{$input_browse}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput">{$input_submit}</p>
  </div>
</fieldset>
  <br/>
*}
{$endform}
<div class="pageoptions">
 {$addfile_link}
</div>
{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>&nbsp;</th>
	                <th>&nbsp;</th>
			<th width="15%">{$titletext}</th>
			<th width="40%">{$summarytext}</th>
			<th>{$sizetext}</th>
			<th>{$authortext}</th>
			<th>{$iptext}</th>
			<th>{$postdatetext}</th>
			<th>{$dltext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}">
			<td>{$entry->id}</td>
			<td><img src="{$entry->icon}" height="16" width="16" alt="{$entry->icon}"/></td>
			<td><a href="{$entry->editurl}">{$entry->name}</a></td>
			<td>{$entry->summary}</td>
			<td>{$entry->size}</td>
			<td>{$entry->author}</td>
			<td>{$entry->ip}</td>
			<td>{$entry->date}</td>
			<td>{$entry->downloads}</td>
			<td>{$entry->timelimited_link}</td>
			<td>{$entry->editlink}</td>
			<td>{$entry->deletelink}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{if $itemcount > 10}
<div class="pageoptions">
 {$addfile_link}
</div>
{/if}
{else}
<div class="pageoverflow">
   <p class="pageoptions">No Files Detected</p>
</div>
{/if}
{/if}
