{* copy category template *}
{*
{literal}
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('#extralink').click(function(){
    jQuery('#extrainfo').toggle();
    return false;
  });
});
</script>
{/literal}
*}

{$formstart}
  <fieldset>
  <legend>{$mod->Lang('source')}:&nbsp;</legend>
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_categoryname')}:</p>
    <p class="pageinput">{$category.upload_category_name}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_categorydesc')}:</p>
    <p class="pageinput">{$category.upload_category_description}</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_categorypath')}:</p>
    <p class="pageinput">{$category.upload_category_path}</p>
  </div>
  </fieldset>
  <br/>
 
  <fieldset>
  <legend>{$mod->Lang('destination')}:&nbsp;</legend>
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_categoryname')}:</p>
    <p class="pageinput">
      <input type="text" name="{$actionid}category_name" size="50" maxlength="255" value="Copy of {$category.upload_category_name}"/>
      {$input_categoryname}
      <br/>
      {$mod->Lang('info_categoryname')}
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_categorydesc')}:</p>
    <p class="pageinput">
      <input type="text" name="{$actionid}category_desc" size="50" maxlength="255" value="{$category.upload_category_description}"/>
      {$input_categoryname}
      <br/>
      {$mod->Lang('info_categorydesc')}
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_categorypath')}:</p>
    <p class="pageinput">
      <input type="text" name="{$actionid}category_path" size="50" maxlength="255" value="{$category.upload_category_path}_copy"/>
      {$input_categoryname}
      <br/>
      {$mod->Lang('info_categorypath')}
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_copy_files')}:</p>
    <p class="pageinput">
      <input type="hidden" name="{$actionid}copyfiles" value="0"/>
      <input type="checkbox" name="{$actionid}copyfiles" value="1" checked="checked"/>
      <br/>
      {$mod->Lang('info_copy_files')}
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput">
      <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}" />
      <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}" />
    </p>
  </div>
  </fieldset>
{$formend}
