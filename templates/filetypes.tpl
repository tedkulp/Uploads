{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
        <th width="4%">&nbsp;</th>
	<th>{$nametext}</th>
	<th class="pageicon">&nbsp;</th>
	<th class="pageicon">&nbsp;</th>
	<th class="pageicon">&nbsp;</th>
	<th class="pageicon">&nbsp;</th>
    </tr>
  </thead>
{foreach from=$items item=entry}
     <tr class="{$entry->rowclass}">
        <td>{$entry->icon}</td>
        <td>{$entry->name}</td>
        <td>{$entry->uplink}</td>
        <td>{$entry->downlink}</td>
        <td>{$entry->editlink}</td>
        <td>{$entry->deletelink}</td>
     </tr>
     <tr class="{$entry->rowclass}">
        <td>&nbsp;</td>
        <td colspan="5">{$entry->description}</td>
     </tr>
{/foreach}
</table>
{/if}
<table width="100%">
  <tr>
  <td width="50%">
	<div class="pageoptions"><p class="pageoptions">{$addlink}</p></div>
  </td>
  <td align="right">
	<div class="pageoverflow">
	{$startform}
	  <p class="pageinput">{$prompt_upload_icon}:&nbsp;{$input_upload_icon}{$submit}</p>
        {$endform}
	</div>
  </td>
  </tr>
</table>
