<h3>{$mod->Lang('title_add_field')}</h3>

{$formstart}
<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('prompt_field_name')}:</p>
  <p class="pageinput"><input type="text" name="{$actionid}name" value="{$fld.name}" size="50" maxlength="255"/></p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('prompt_field_type')}:</p>
  <p class="pageinput">
     <select name="{$actionid}type" onchange="this.form.submit();">
       {html_options options=$fldtypes selected=$fld.type}
     </select>
  </p>
</div>

{if $fld.type == 'textinput'}
  {* text field or email field *}
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_field_length')}:</p>
    <p class="pagetext"><input type="text" name="{$actionid}attrib_length" value="{$fld.attrib.length}" size="3" maxlength="3"/></p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_field_maxlength')}:</p>
    <p class="pagetext"><input type="text" name="{$actionid}attrib_maxlength" value="{$fld.attrib.maxlength}" size="4" maxlength="4"/></p>
  </div>
{elseif $fld.type == 'textarea'}
  {* text area field *}
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_default_content')}:</p>
    <p class="pagetext">
      <textarea name="{$actionid}attrib_dfltcontent" rows="5">{$fld.attrib.dfltcontent}</textarea>
    </p>
  </div>

  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_use_wysiwyg')}:</p>
    <p class="pagetext">
      <select name="{$actionid}attrib_usewysiwyg">
        {html_options options=$yesno selected=$flds.attrib.usewysiwyg}
      </select>
    </p>
  </div>
{elseif $fld.type == 'dropdown' or $fld.type == 'multiselect'}
  {* dropdown or multiselect *}
  <div class="pageoverflow">
    <p class="pagetext">{$mod->Lang('prompt_dropdown_options')}:</p>
    <p class="pagetext">
      <textarea name="{$actionid}attrib_options" rows="5">{$fld.attrib.options}</textarea>
    </p>
  </div>
{/if}

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('prompt_public_field')}</p>
  <p class="pageinput">
    <select name="{$actionid}public">
      {html_options options=$yesno value=$fld.public}
    </select>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}