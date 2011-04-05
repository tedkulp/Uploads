{$startform}
<div class="pageoptions">
  <p class="pagetext">{$category}</p>
  <p class="pageinput">{$input_category}{$input_select}{$input_hidden}</p>
</div>
{$endform}
{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$titletext}</th>
			<th>{$postdatetext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
			<td>{$entry->id}</td>
			<td>{$entry->name}</td>
			<td>{$entry->author}</td>
			<td>{$entry->ip}</td>
			<td>{$entry->date}</td>
			<td>{$entry->deletelink}</td>
		</tr>
		<tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
	        	<td>&nbsp;</td>
               		<td colspan="5">{$entry->description}</td> 
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
</br>
<div class="pageoverflow">
   <p class="pageoptions">No Files Detected</p>
</div>
{/if}
