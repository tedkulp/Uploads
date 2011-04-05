{if $message!=''}<p>{$message}</p>{/if}
{$startform}
<fieldset>
<legend>{$mod->Lang('uploading_settings')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$title_valid_uploadextensions}:</p>
		<p class="pageinput">{$input_valid_uploadextensions}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_email_on_upload}:</p>
		<p class="pageinput">{$input_email_on_upload}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_redirect_on_upload}:</p>
		<p class="pageinput">{$input_redirect_on_upload}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_allow_upload_sendfile')}:</p>
		<p class="pageinput">
                  <input type="hidden" name="{$actionid}allow_upload_sendfile" value="0"/>
                  <input type="checkbox" name="{$actionid}allow_upload_sendfile" value="1" {if $allow_upload_sendfile}checked="checked"{/if}/>
                </p>
	</div>
</fieldset>
<fieldset>
<legend>{$mod->Lang('general_settings')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$title_dummy_index_html}:</p>
		<p class="pageinput">{$input_dummy_index_html}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_sendfilepage}:</p>
		<p class="pageinput">{$input_sendfilepage}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_redirect_on_sendfile}:</p>
		<p class="pageinput">{$input_redirect_on_sendfile}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_download_chunksize}:</p>
		<p class="pageinput">{$input_download_chunksize}&nbsp;{$info_download_chunksize}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_allow_delete}:</p>
		<p class="pageinput">{$input_allow_delete}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_getfile_resultpage')}:</p>
		<p class="pageinput">
                  {$input_getfile_resultpage}
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_subnet_exclusions}:</p>
		<p class="pageinput">{$input_subnet_exclusions}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_category_expiry')}:</p>
		<p class="pageinput"><input type="text" name="{$actionid}category_expiry" value="{$category_expiry}" size="3" maxlength="4"/><br/>{$mod->Lang('info_dflt_category_expiry')}</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('image_settings')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$title_autothumbnail_extensions}:</p>
		<p class="pageinput">{$input_autothumbnail_extensions}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_autothumbnail_size}:</p>
		<p class="pageinput">{$input_autothumbnail_size}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('autowatermark')}:</p>
		<p class="pageinput">
                  <input type="hidden" name="{$actionid}autowatermark" value="0"/>
                  <input type="checkbox" name="{$actionid}autowatermark" value="1"{if $autowatermark == 1} checked="checked"{/if}/>
                </p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('timelimited_url_settings')}:&nbsp;</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_timelimited_hours')}:</p>
		<p class="pageinput">
                  <input type="text" name="{$actionid}timelimited_hours" value="{$timelimited_hours}" size="3" maxlength="3"/>
                  <br/>
                  {$mod->Lang('info_timelimited_hours')}
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_timelimited_downloads')}:</p>
		<p class="pageinput">
                  <input type="text" name="{$actionid}timelimited_downloads" value="{$timelimited_downloads}" size="3" maxlength="3"/>
                  <br/>
                  {$mod->Lang('info_timelimited_downloads')}
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_timelimited_autodelete')}:</p>
		<p class="pageinput">
                  <input type="text" name="{$actionid}timelimited_autodelete" value="{$timelimited_autodelete}" size="3" maxlength="3"/>
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_timelimited_subject')}:</p>
		<p class="pageinput">
                  <input type="text" name="{$actionid}timelimited_subject" value="{$timelimited_subject}" size="80" maxlength="255"/>
                </p>
	</div>
</fieldset>

	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$submit}</p>
	</div>
{$endform}
