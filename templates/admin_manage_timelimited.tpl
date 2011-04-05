<h3>{$mod->Lang('manage_timelimited')}</h3>
<h4>{$mod->Lang('file_info2',$upload.upload_name,$upload.upload_id)}</h4>
<br/>

<div class="pageoptions">
{$back_link}
</div>

{if isset($data)}
<table class="pagetable" cellspacing="0">
  <thead>
    <tr>
      <th>{$mod->Lang('email_address')}</th>
      <th>{$mod->Lang('url_key')}</th>
      <th>{$mod->Lang('created')}</th>
      <th>{$mod->Lang('expires')}</th>
      <th>{$mod->Lang('downloads')}</th>
      <th class="pageicon">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$data item='otl'}
    {cycle values='row1,row2' assign='rowclass'}
    <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
      <td>{$otl.email}</td>
      <td><a href="{$otl.download_url}">{$otl.url_key}</a></td>
      <td>{$otl.created|cms_date_format}</td>
      <td>{$otl.expires|cms_date_format}</td>
      <td>{$otl.downloads} / {$otl.max_downloads}</td>
      <td>{$otl.delete_link}
    </tr>
  {/foreach}
  </tbody>
</table>
{/if}
<div class="pageoptions">
 {$addkey_link}
</div>
