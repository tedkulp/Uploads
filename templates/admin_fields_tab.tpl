{if isset($fields)}
<div class="pageoverflow">
  <table class="pagetable cms_sortable tablesorter" cellspacing="0">
    <thead>
      <tr>
        <th>{$mod->Lang('id')}</th>
        <th>{$mod->Lang('name')}</th>
        <th>{$mod->Lang('type')}</th>
        <th class="{literal}{sorter: false}{/literal} pageicon"></th>
        <th class="{literal}{sorter: false}{/literal} pageicon"></th>
        <th class="{literal}{sorter: false}{/literal} pageicon"></th>
        <th class="{literal}{sorter: false}{/literal} pageicon"></th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$fields item='onefield'}
      {cycle values="row1,row2" assign='rowclass'}
      <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
        <td>{$onefield.id}</td>
        <td><a href="{$onefield.edit_url}" title="{$mod->Lang('edit_this_field')}">{$onefield.name}</a></td>
        <td>{$fieldtypes[$onefield.type]}</td>
        <td>
          {if isset($onefield.movedown_url)}
            <a href="{$onefield.movedown_url}" title="{$mod->Lang('move_down')}">{cgimage image='icons/system/sort_down.gif' alt=$mod->Lang('down')}</a>
          {/if}
        </td>
        <td>
          {if isset($onefield.moveup_url)}
            <a href="{$onefield.moveup_url}" title="{$mod->Lang('move_up')}">{cgimage image='icons/system/sort_up.gif' alt=$mod->Lang('up')}</a>
          {/if}
        </td>
        <td><a href="{$onefield.edit_url}" title="{$mod->Lang('edit_this_field')}">{cgimage image='icons/system/edit.gif' alt=$mod->Lang('edit')}</a></td>
        <td><a href="{$onefield.delete_url}" title="{$mod->Lang('delete_this_field')}" onclick="return confirm('{$mod->Lang('ask_delete_field')}');">{cgimage image='icons/system/delete.gif' alt=$mod->Lang('delete')}</a></td>
      </tr>
    {/foreach}
    </tbody>
  </table>
</div>
{/if}

<p class="pageoverflow">
  {$addfield_link}
</p>