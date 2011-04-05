{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$nametext}</th>
			<th>{$authortext}</th>
		        <th>{$datetext}</th>
			<th>{$sizetext}</th>	
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}">
			<td>{$entry->name}</td>
			<td>{$entry->author}</td>
			<td>{$entry->date}</td>
			<td>{$entry->size}</td>
		</tr>
		<tr class="{$entry->rowclass}">
               		<td colspan="4">{$entry->description}</td> 
		</tr>
	{/foreach}
	</tbody>
</table>
{/if}
