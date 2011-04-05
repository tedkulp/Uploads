{* send file form template *}
<html>
  <body>
    <h3>Greetings</h3>
    <p>You are receiving this email because somebody has sent you information about how to access a specific file on &quot;{sitename}&quot;.</p>
    <p>This file is located on a remote server, and has not been attached to this email.  To retrieve the file you must click on <a href="{$entry->download_url}">this link</a>.  If you are unable to click on this link, then copy the following URL into the address bar on your web browser:<br/>{$entry->download_url}</p>
    {if isset($hours)}
      <p>Access to this file is time limited.  You have {$hours} hours from now to access this file.</p>
    {/if}
    {if isset($downloads)}
      <p>You may download this file, or attempt to download it a maximum of {$downloads} times.</P
    {/if}

    If you experience difficulty with the link provided in this email please contact the administratrors at {sitename}

    {if isset($entry->thumbnail_url)}
      <img src="{$entry->thumbnail_url}" border="0"><br/>
    {/if}

    {if $notes != ''}
    <h4>Notes:</h4>
    <p>{$notes}</p>
    {/if}

    <h4>File Details:</h4>
    <table border="0">
      <tr><td>{$mod->Lang('name')}:</td><td>{$entry->name}</td></tr>
      <tr><td>{$mod->Lang('size')}:</td><td>{$entry->size}</td></tr>
      <tr><td>{$mod->Lang('summary')}:</td><td>{$entry->summary}</td></tr>
      <tr><td>{$mod->Lang('author')}:</td><td>{$entry->author}</td></tr>
      <tr><td>{$mod->Lang('description')}:</td><td>{$entry->description}</td></tr>
    </table>
  </body>
</html>