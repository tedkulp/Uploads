<script type="text/javascript">
{literal}
jQuery(document).ready(function(){
  jQuery('#submit_cat_multiaction').click(function(){
    return confirm('{/literal}{$mod->Lang('confirm_cat_multiaction')}{literal}');
  });
  jQuery('#cat_multiaction').hide();
  jQuery('#cat_selectall').click(function(){
    var val = jQuery(this).attr('checked');
    if( val )
    {
      jQuery('#cat_multiaction').show();
     
    }
    else
    {
      jQuery('#cat_multiaction').hide();
    }

    jQuery('.cat_selectall').attr('checked',val);
  });
  jQuery('.cat_selectall').click(function(){
    var any = 0;
    jQuery('.cat_selectall').each(function(){
      any = any | jQuery(this).attr('checked');
    });
    if( any )
    {
      jQuery('#cat_multiaction').show();
    }
    else
    {
      jQuery('#cat_multiaction').hide();
    }
  });
});


{/literal}
</script>

<div class="pageoptions"><p class="pageoptions">{$itemcount} Categories Found</p></div>
{if $itemcount > 0}
{$formstart}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th width="15%">{$categorytext}</th>
			<th>{$nametext}</th>
			<th>{$pathtext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon"><input type="checkbox" id="cat_selectall" value="1"/></th>
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}">
			<td>{$entry->id}</td>
			<td>{$entry->name}</td>
			<td>{$entry->path}</td>
			<td>{$entry->editlink}</td>
			<td>{$entry->copylink}</td>
			<td>{$entry->deletelink}</td>
                        <td><input type="checkbox" class="cat_selectall" value="{$entry->id}" name="{$actionid}cat_multiselect[]"/></td>
		</tr>
		<tr class="{$entry->rowclass}"> 
			<td>&nbsp;</td>
			<td colspan="6">{$entry->description}</td>
		</tr>
	 
{/foreach}
	</tbody>
</table>
{/if}
<div class="pageoptions">
  <table width="100%">
   <tr>
     <td>{$addlink}</td>

     {if $itemcount > 0}
     <td style="text-align: right;">
       <div id="cat_multiaction" style="text-align: right;">
       {$mod->Lang('with_selected')}:
       <select name="{$actionid}multiaction" id="cat_multiaction">
       {html_options options=$cat_multiactions}
       </select>
       <input type="submit" id='submit_cat_multiaction' name="{$actionid}submit" value="{$mod->Lang('submit')}" />
       </div>
     </td>
     {/if}
   </tr>
  </table>
</div>

{if $itemcount > 0}
{$formend}
{/if}