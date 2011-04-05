<!-- Start Upload Detail template -->
<table>
  <tr>
    {if isset($entry->thumbnail_url)}
    <td>{$thumbnail}</td>
    <td><img src="{$entry->thumbnail_url}" border="0" /></td>
    {else}
    <td>{$icon}</td>
    <td><img src="{$entry->iconurl}" border="0" /></td>
    {/if}
  </tr>
  <tr>
    <td>{$category}</td>
    <td>{$entry->category}</td>
  </tr>
  <tr>
    <td>{$id}</td>
    <td>{$entry->id}</td>
  </tr>
  <tr>
    <td>{$name}</td>
    <td><a href="{$entry->download_url}" title="{$entry->name}">{$entry->name}</a>&nbsp;&nbsp;
        <a href="{$entry->sendfile_url}" title="">Send this file</a><br/>
    </td>
  </tr>
  {if isset($entry->delete_url)}
  <tr>
    <td>{$delete}</td>
    <td><a href="{$entry->delete_url}" title="{$delete}" onclick="return confirm('{$areyousure}');">{$entry->name}</a></td>
  </tr>
  {/if}
  <tr>
    <td>{$date}</td>
    <td>{$entry->date}</td>
  </tr>
  <tr>
    <td>{$author}</td>
    <td>{$entry->author}</td>
  </tr>
  <tr>
    <td>{$size}</td>
    <td>{$entry->size}</td>
  </tr>
  <tr>
    <td>{$summary}</td>
    <td>{$entry->summary}</td>
  </tr>
  <tr>
    <td>{$description}</td>
    <td>{$entry->description}</td>
  </tr>
  {foreach name=fields from=$entry->fields key='fldname' item='field'}
  <tr>
    <td>{$field.name}</td>
    <td>{$field.value}</td>
  </tr>
  {/foreach}
</table>
<!-- End Upload Detail template -->
