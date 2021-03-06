<?php
$lang['prompt_category_scannable'] = 'Automatically scan this category for new files?';
$lang['info_category_scannable'] = 'When accessed from the front end this category is automatically scanned for new files';
$lang['prompt_tl_access'] = 'Time Limited Access';
$lang['prompt_allow_upload_sendfile'] = 'Allow sending files immediately on admin upload';
$lang['msg_auto_delete_file'] = 'Automatically deleted expired file: %s';
$lang['msg_auto_delete_file_failed'] = 'Permissions problem, auto delete of %s failed';
$lang['info_category_expires_hrs'] = 'Specify a number of hours before files in this category can be deleted.  Use a value of 0 to indicate that files should not be deleted';
$lang['prompt_category_expires_hrs'] = 'Number of hours until files in this category are automatically deleted';
$lang['info_dflt_category_expiry'] = 'The default value for new categories that specifies how long files in this category exist before they are automatically deleted.  Use a value of 0 to indicate no deletion';
$lang['title_category_expiry'] = 'Category expiry period <em>(hrs)</em>';
$lang['info_categorydeletable'] = 'Authorized users will have permission to delete these files.  This means that a url will be provided in the appropriate templates to allow deleting of the file.  A website developer can use appropriate smarty logic to show a link to authorized users.';
$lang['copy_files'] = 'Copy Files';
$lang['error_filetoolarge'] = 'The file you attempted to uploade is larger than the CMSMS maximum upload file size';
$lang['areyousure_deletecategory'] = 'Are you sure you want to delete this category?';
$lang['error_delete'] = 'An item cound not be deleted (%s)';
$lang['confirm_cat_multiaction'] = "Are you sure you want to perform this action on the selected categories?";
$lang['error_nothing_selected'] = 'Error: Nothing selected';
$lang['with_selected'] = 'With Selected:';
$lang['error_replace_mismatched_fileext'] = 'When replacing a file, you must upload a file of the same exact type (by file extension).  The file you selected does not match that of the original file.';
$lang['replace'] = 'Replace';
$lang['info_replacefile'] = 'You may upload a replacement file, if the file is an image type, and you have not specified a replacement thumbnail, a new thumbnail will be generated';
$lang['prompt_replacefile'] = 'Upload replacement file';
$lang['title_fixspaces'] = 'Fix spaces in the filename';
$lang['category_copied'] = 'Category successfully copied';
$lang['error_duplicatepath'] = 'Please specify a directory name that is different from the source, and is not already in use';
$lang['operation_cancelled'] = 'Operation Cancelled';
$lang['source'] = 'Source';
$lang['destination'] = 'Destination';
$lang['prompt_copy_files'] = 'Copy category Files';
$lang['info_copy_files'] = 'Copy the files from the source category to the destination category';
$lang['extra'] = 'Extra';
$lang['copy'] = 'Copy';
$lang['selectone'] = 'Select One';
$lang['autowatermark'] = 'Automaticall place watermarks on images';
$lang['image_settings'] = 'Image Settings';
$lang['prompt_getfile_resultpage'] = 'Page to use for errors or other messages related to file downloading';
$lang['error_invalid_key'] = 'The upload key specified is invalid (maybe it has reached its maximum download capacity or has expired)';
$lang['dflt_timelimited_subject'] = '{$sitename} - You have been granted access to {$entry->name|strip_tags} for a limited time';
$lang['prompt_timelimited_subject'] = 'Subject for email created when sending a time limited URL';
$lang['prompt_timelimited_autodelete'] = 'Auto delete expired entries after N hours <em>(specify 0 to disable autodelete)</em>:';
$lang['prompt_timelimited_sendit'] = 'Send this url to the designated email address?';
$lang['url_key'] = 'URL Key';
$lang['created'] = 'Created';
$lang['expires'] = 'Expires';
$lang['addedit_timelimited_key'] = 'Add/Edit Time Limited Key';
$lang['time_limited_key_added'] = 'Time Limited Key Added';
$lang['num_hours'] = 'Number of Hours';
$lang['num_downloads'] = 'Number of Downloads';
$lang['email_address'] = 'Email Address';
$lang['error_missing_invalid'] = 'A required value is missing or invalid: %s';
$lang['add_timelimited_key'] = 'Add Time Limited Key';
$lang['file_info2'] = 'File %s (id=%d)';
$lang['info_timelimited_downloads']= 'Specify the default number of times that a file identified by a particular key can be downloaded';
$lang['prompt_timelimited_downloads'] = 'Default Number of Downloads';
$lang['info_timelimited_hours'] = 'Specify the default number of hours that a time limited key is valid for.  Specify 0 for unlimited';
$lang['prompt_timelimited_hours'] = 'Number of hours a Time Limited Key is valid for';
$lang['timelimited_url_settings'] = 'Time Limited Key Settings';
$lang['manage_timelimited'] = 'Manage Time Limited Access';
$lang['uploading_settings'] = 'File Upload Settings';
$lang['general_settings'] = 'General Settings';
$lang['thumbnail_settings'] = 'Thumbnail Generation';
$lang['title_redirect_on_sendfile'] = 'Page to redirect to after sending a file';
$lang['lbl_back'] = 'Back';
$lang['lbl_templates'] = 'Modify Templates';
$lang['prompt_public_field'] = 'Field is public <em>(can be viewed by site visitors)</em>';
$lang['upload_edited'] = 'File Details Edited on %s';
$lang['info_thumbnail'] = 'Use this field to upload a thumbnail to associate with this file.  This can be handy if uploading files other than images that thumbnails cannot be generated from automatically';
$lang['upload_file'] = 'Upload a new file';
$lang['msg_field_deleted'] = 'Field deleted';
$lang['ask_delete_field'] = 'Are you sure you want to delete this field definition and all associated values?';
$lang['yes'] = 'Yes';
$lang['no'] = 'No';
$lang['type'] = 'Type';
$lang['fieldtype_multiselect'] = 'Multiselect List';
$lang['fieldtype_dropdown'] = 'Dropdown List';
$lang['fieldtype_checkbox'] = 'Checkbox';
$lang['fieldtype_textarea'] = 'Text Area';
$lang['fieldtype_textinput'] = 'Text Input';
$lang['prompt_use_wysiwyg'] = 'Use the wysiwyg when editing the value for this field';
$lang['prompt_default_content'] = 'Default content for text area';
$lang['prompt_dropdown_options'] = 'Options (one entry per line)';
$lang['prompt_field_maxlength'] = 'Field Maximum Length';
$lang['prompt_field_length'] = 'Field Length';
$lang['prompt_field_type'] = 'Field Type';
$lang['prompt_field_name'] = 'Field Name';
$lang['title_add_field'] = 'Add or Edit a Field Definition';
$lang['field_definitions'] = 'Field Definitions';
$lang['prompt_add_field'] = 'Add a Field Definition';
$lang['param_action'] = 'Specifies the behaviour of the module tag.  Possible values are: default - (the defafault behavior), detail - to display a detail view of a single file based on the upload_id, and yousendit - to display a form to allow uploading a file, and sending it to numerous addresses in one step';
$lang['param_sendfilepage'] = 'Specify the page id or alias of a page that should be used for the send a file form';
$lang['file_uploaded'] = 'File Successfully Uploaded';
$lang['to'] = 'To';
$lang['title_yousenditform_template'] = 'Add or Edit a &quot;You Send It&quot; Form Template';
$lang['yousenditform_template'] = 'YouSendIt Form Templates';
$lang['title_yousenditform_sysdefault'] = 'System default &quot;you send it&quot; template';
$lang['msg_file_sent'] = 'A message has been sent to the selected addresses that contains information about the file and how to retrieve it.';
$lang['error_noaddresses'] = 'You must supply at least one destination address';
$lang['error_nosubject'] = 'You must supply a subject';
$lang['subject'] = 'Subject';
$lang['title_sendfilepage'] = 'Page to use for time limited or &quot;YouSendIt&quot; URLS';
$lang['file_info'] = 'File Info';
$lang['send'] = 'Send';
$lang['notes'] = 'Notes';
$lang['addressees'] = 'Send information about this file to';
$lang['prompt_sendfile_email_template'] = '&quot;Send a File&quot; Email Template';
$lang['title_sendfileform_template'] = 'Add or Edit a &quot;Send a File&quot; Form Template';
$lang['sendfileform_template'] = '&quot;Send a File&quot; Form Templates';
$lang['prompt_notify_email_template'] = 'File upload notification email template';
$lang['title_sendfileform_sysdefault'] = 'System default &quot;Send a File&quot; form template';
$lang['prompt_categorydeletable'] = 'Files in this category can be deleted';
$lang['title_allow_delete'] = 'Allow deletion of files from the frontend';
$lang['default_templates'] = 'Default Templates';
$lang['firstpage'] = 'First Page';
$lang['prevpage'] = 'Previous Page';
$lang['nextpage'] = 'Next Page';
$lang['lastpage'] = 'Last Page';
$lang['firstpage_arrow'] = '&lt;&lt;';
$lang['prevpage_arrow'] = '&lt;';
$lang['nextpage_arrow'] = '&gt;';
$lang['lastpage_arrow'] = '&gt;&gt;';
$lang['page'] = 'Page';
$lang['of'] = 'of';
$lang['prompt_grouplist'] = 'Authorized FEU Groups';
$lang['info_grouplist'] = 'Select the FEU groups that are allowed access to files in this category.  Deselect all entries to allow all access';
$lang['title_scan'] = 'Scan for new files in this category';
$lang['title_create_thumbnails'] = 'Create missing thumbnails for files in this category.';
$lang['create_thumbnails'] = 'Create Thumbnails';
$lang['title_create_thumbnail'] = '(re)Create the thumbnail for this file';
$lang['create_thumbnail'] = 'Create Thumbnail';
$lang['error_patherror'] = 'Could not open directory (permissions problem?)';
$lang['title_download_chunksize'] = 'Size of each download chunk';
$lang['info_download_chunksize'] = 'Adjusting this parameter will effect download speed, and may help in lower memory environments';
$lang['warning_safe_mode'] = 'PHP\'s safe mode is enabled.  This may cause problems with uploading files (permissions), and may also interfere with this module\'s ability to send some files due to an inability to override some ini settings.  You are advised to contact your provider to see about disabling safe mode.';
$lang['param_detailpage'] = 'Useful for displaying a detail report using a different page template, this parameter takes the page id or page alias of a page that should be used to display the detail report';
$lang['param_prefix'] = 'A boolean that indicates wether file names should be prefixed';
$lang['param_prefix_feu'] = 'A boolean parameter that indicates that the prefix should be taken from the current author, if not specified, the prefix is the current time (in dechex format)';
$lang['param_nocaptcha'] = 'Disable captcha support (on by default) in the upload form';
$lang['title_uploadform_template'] = 'Edit Upload Form Template';
$lang['captcha_title'] = 'Enter the text displayed in this image';
$lang['error_captchamismatch'] = 'Text entered did not match the image displayed';
$lang['title_autothumbnail_extensions'] = 'Create thumbnails for files with these extensions';
$lang['title_autothumbnail_size'] = 'Maximum size (pixels) of the generated thumbnail';
$lang['prompt_upload_icon'] = 'Upload An Icon';
$lang['info_sysdefault'] = 'This text is used when creating a new template of this type';
$lang['title_detailrpt_sysdefault'] = 'System Default Detail Report Template';
$lang['title_summaryrpt_sysdefault'] = 'System Default Summary Report Template';
$lang['title_uploadform_sysdefault'] = 'System Default Upload Form Template';
$lang['template'] = 'Template';
$lang['resettodefault'] = 'Reset to Defaults';
$lang['title_summaryrpt_template'] = 'Summary Report Template';
$lang['title_detailrpt_template'] = 'Detail Report Template';
$lang['prompt_name'] = 'Name';
$lang['prompt_default'] = 'Default';
$lang['legend_uploadform'] = 'Upload A File';
$lang['error_missingparam'] = 'A required parameter is missing';
$lang['error_missingname'] = 'A name for the file type must be specified';
$lang['error_missingextensions'] = 'At least one file extension must be specified';
$lang['error_missingicon'] = 'An icon must be specified';
$lang['error_nosuchrow'] = 'The specified row could not be found';
$lang['name_unknown'] = 'Unknown';
$lang['description_unknown'] = 'File type description for unmatched files';
$lang['image'] = 'Image';
$lang['icon'] = 'Icon';
$lang['extensions'] = 'File Extensions';
$lang['addfiletype'] = 'Add New File Type';
$lang['file_types'] = 'File Types';
$lang['error_nocategoryid'] = 'No Category id was supplied';
$lang['error_nocategory'] = 'No Category id was supplied';
$lang['error_templatenameexists'] = 'A template by that name already exists';
$lang['prompt_templatename'] = 'Template Name';
$lang['prompt_template'] = 'Template';
$lang['prompt_newtemplate'] = 'Create a new template';
$lang['help_OnDownload'] = '
<p>An event generated when a user finishes downloading a file</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - Upload ID</li>
<li><em>name</em> - File name</li>
<li><em>ip</em> - The IP Address of the downloader</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '
<p>An event generated when a category is Deleted</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - Category name</li>
<li><em>path</em> - Category path</li>
</ul>
';
$lang['help_OnCreateCategory'] = '
<p>An event generated when a category is Created</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - The name of the category</li>
<li><em>description</em> - The category description</li>
<li><em>path</em> - The category path</li>
<li><em>listable</em> - A flag indicating if the category is listable</li>
<li><em>deletable</em> - A flag indicating if files in the category are deletable</li>
</ul>
';
$lang['help_OnRemove'] = '
<p>An event generated when a file is removed via the admin or frontend interfaces</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - The name of the removed file</li>
<li><em>id</em> - The id of the removed file</li>
<li><em>category_id</em> - The id of the category</li>
</ul>
';
$lang['help_OnUpload'] = '
<p>An event generated when a new file is uploaded via the admin or frontend interfaces</p>
<h4>Parameters</h4>
<ul>
<li><em>upload_id</em> - The upload id</li>
<li><em>category</em> - The category name</li>
<li><em>name</em> - The name of the uploaded file</li>
<li><em>size</em> - The size of the uploaded file</li>
<li><em>summary</em> - The short description for the uploaded file (may be empty)</em></li>
<li><em>description</em> - The long description for the uploaded file (may be empty)</em></li>
<li><em>author</em> - The author of the uploaded file (if available)</em></li>
<li><em>ip_address</em> - The internet address of the client that uploaded the file</li>
</ul>
';
$lang['help_OnEditUpload'] = '
<p>An event generated when a file is updated via the admin or frontend interfaces</p>
<h4>Parameters</h4>
<ul>
<li><em>upload_id</em> - The upload id</li>
<li><em>category</em> - The category name</li>
<li><em>name</em> - The name of the uploaded file</li>
<li><em>size</em> - The size of the uploaded file</li>
<li><em>summary</em> - The short description for the uploaded file (may be empty)</em></li>
<li><em>description</em> - The long description for the uploaded file (may be empty)</em></li>
<li><em>author</em> - The author of the uploaded file (if available)</em></li>
<li><em>ip_address</em> - The internet address of the client that uploaded the file</li>
</ul>
';
$lang['info_event_ondeletecategory'] = 'Event generated when a category is deleted';
$lang['info_event_oncreatecategory'] = 'Event generated when a category is created';
$lang['info_event_ondownload'] = 'Event generated when a file is downloaded';
$lang['info_event_onupload'] = 'Event generated when a new file is uploaded';
$lang['info_event_oneditupload'] = 'Event generated when a file is updated';
$lang['info_event_onremove'] = 'Event generated when a file is removed';
$lang['title_usertag_onupload'] = 'User defined tag to call after upload is complete';
$lang['title_usertag_oneditupload'] = 'User defined tag to call after updating an upload is complete';
$lang['none'] = 'None';
$lang['matchesfound'] = 'Matches found';
$lang['filter'] = 'Filter';
$lang['title_redirectonupload'] = 'Redirect to page id/alias on user upload';
$lang['details'] = 'Details';
$lang['confirm_preferences'] = 'Are you sure you want to adjust the preferences?';
$lang['error_nofilesuploaded'] = 'No files were uploaded.';
$lang['prompt_replace'] = 'Allow Overwrite';
$lang['info_replace'] = 'Replace any file with the same name (does not change id)';
$lang['param_no_initial'] = 'Do not display any initial results when the filter is on';
$lang['param_key'] = 'Provide an additional key to the module for further organizing uploads.  This key could be an encoded string like: \'feusers:uid\', etc.  This parameter is usually only needed when embedding the uploads module into another module';
$lang['param_noauthor'] = 'Hide the author field from the upload form.  This parameter is only valid when mode=\'upload\'.  If The FrontendUsers module is present, and a user is currently logged in, a hidden field will hold the currently logged in username';
$lang['param_upload_id'] = '
upload_id="id" - specify a single file for the url/link,detailed or single modes (above)';
$lang['param_detailtemplate'] = 'Use a template with this name for the detail report.';
$lang['param_template'] = 'Use a template with this name for this report or form.  The mode is used to determine what type of template is requirerd, and then a name match is performed within that type.';
$lang['param_filter'] = 'Display the filtering form.  If this parameter is set to any value';
$lang['param_no_intitial'] = 'Only useful when the filter parameter is supplied, or on by default, this parameter indicates wether initial results should be returned';
$lang['param_filetypes'] = 'Display only files whose type matches this comma separated list';
$lang['param_sortorder'] = '
  <p>Sort Orders
  <ul>
  <li><em>date_asc</em> - Sort by ascending date</li>
  <li><em>date_desc</em> - Sort by descending date</li>
  <li><em>name_asc</em> - Sort by ascending name</li>
  <li><em>name_desc</em> - Sort by descending name</li>
  <li><em>size_asc</em> - Sort by ascending size</li>
  <li><em>size_desc</em> - Sort by descending size</li>
  <li><em>author_asc</em> - Sort by ascending author</li>
  <li><em>author_desc</em> - Sort by descending author</li>
  <li><em>ip_asc</em> - Sort by ascending ip address</li>
  <li><em>ip_desc</em> - Sort by descending ip address</li>
  <li><em>desc_asc</em> - Sort by ascending description</li>
  <li><em>desc_desc</em> - Sort by descending description</li>
  <li><em>downloads_asc</em> - Sort by download count in ascending order.</li>
  <li><em>downloads_desc</em> - Sort by download count in descending order.</li>
  <li><em>random</em> - Random sort order</li>
  </ul>
  </p>';
$lang['param_listingtemplate']='Template to use for category listings after clickthrough from Category Summary page';
$lang['param_listingsortorder']='Sort order (ala param_sortorder) to use for category listings after clickthrough from Category Summary page';
$lang['param_fileextensions'] = ' 
file_extensions="ext1,ext2,ext3"
<p>valid only when mode=upload, this parameter limits the types of files that can be uploaded.  It overrides any settings in the module preferences.</p>';
$lang['param_count'] = 'count="N" <p>A parameter to limit the results to N entries per page.</p>';
$lang['param_category'] = '
category="name"
<p><b>Note:</b> Category can be "all", which will list all of the uploads from all <em>listable</em> categories</p>';
$lang['param_mode'] = '
  <ul>
  <li><em>detailed</em> - Display a detailed report for a single upload.</li>
  <li><em>single</em> - Alias for the detailed mode.</li>
  <li><em>upload</em> - Display a form to allow a frontend user to upload a file</li>
  <li><em>url <i>or</i> link</em> - Display a link to a file</li>
  <li><em>summary</em> - Display a summarized list of all files in the specified category</li>
  </ul>';
$lang['param_selectform'] = 'When using the \'select\' mode, this parameter is the formid of the parent form.  Used to handle parameter passing';
$lang['param_selectname'] = 'when using the \'select\' mode, this parameter specifies the name of the field';
$lang['param_selectvalue'] = 'When using the \'select\' mode, this parameter specifies the default field value';
$lang['param_selectnone'] = 'When using the \'select\' mode, this parameter specifies wether \'none\' is a valid choice.';
$lang['returntomodule'] = 'Return to module panel';
$lang['error_nocategories'] = 'There are no defined categories';
$lang['title_enforceextensions'] = 'Require extensions on all uploaded files';
$lang['restoredefaultsconfirm'] = 'This operation will restore the template to system defaults.  Any changes you have made will be lost.  Are you sure you want to proceed?';
$lang['info_thumbnail'] = 'An optional thumbnail file';
$lang['thumbnail'] = 'Thumbnail';
$lang['newthumbnail'] = 'Upload a new thumbnail';
$lang['info_summary'] = 'A brief description of the file (if empty, the file name is used without the extension)';
$lang['info_categoryname'] = 'A brief name for your category (human readable)';
$lang['info_categorydesc'] = 'A description for your category';
$lang['info_categorypath'] = 'The directory name inside the uploads directory that will be used to store files in this category.  If the directory of this name does not already exist, it may be created';
$lang['info_destname'] = 'Use the \'Upload As\' field to change the name of the file on upload.  Leave blank to preserve the filename as-is.';
$lang['error_cantcreatedirectory'] = 'Could not create directory';
$lang['error_nomailermodule'] = 'The CMSMailer module could not be instantiated';
$lang['upload_notification'] = 'A new file has been uploaded';
$lang['title_email_on_upload'] = 'Send upload notification to';
$lang['email_template'] = 'Email Templates';
$lang['title_dummy_index_html'] = 'Create dummy index.html files in each directory?<br/><em>Any existing index.html files will remain</em>';
$lang['about'] = 'About';
$lang['error_permissiondenied'] = 'Access Denied. Please check your permissions.';
$lang['error_couldnotwrite'] = 'Could not write';
$lang['addcategory'] = 'Add Category';
$lang['all'] = 'All';
$lang['areyousure'] = 'Are You Sure?';
$lang['author'] = 'Author';
$lang['cancel'] = 'Cancel';
$lang['cannotmodifypath'] = '(The path cannot be modified)';
$lang['categories'] = 'Categories';
$lang['category'] = 'Category';
$lang['message_categoryadded'] = 'Category successfully added';
$lang['date'] = 'Date';
$lang['dateuploaded'] = 'Date Uploaded';
$lang['default'] = 'Defaults';
$lang['delete'] = 'Delete';
$lang['description'] = 'Description';
$lang['destname'] = 'Upload As';
$lang['detail_template'] = 'Detail Templates';
$lang['downloaded'] = 'File %s was downloaded.';
$lang['downloads'] = 'Downloads';
$lang['edit'] = 'Edit';
$lang['editcategory'] = 'Edit Category';
$lang['editupload'] = 'Edit Upload';
$lang['error'] = 'Error!';
$lang['error_pathinuse2'] = 'A category using the path (%s) already exists';
$lang['error_pathinuse'] = 'A category using that path already exists';
$lang['error_categoryexists2'] = 'Error: Category named %s already exists';
$lang['error_categoryexists'] = 'Error: Category already exists';
$lang['error_categorynotempty'] = 'Error! Cannot delete a category that is not empty';
$lang['error_categorynotfound'] = 'Error: Category not found!';
$lang['error_dberror'] = 'Error: Database error!';
$lang['error_emptycategory'] = 'Error: Empty Category!';
$lang['error_emptypath'] = 'Error: Empty Path!';
$lang['error_fileexists'] = 'Error! File %s already exists.';
$lang['error_filenotfound'] = 'Error! File %s was not found.';
$lang['error_insufficientparams'] = 'Error: Insufficient parameters supplied to module!<br/>Missing param is: %s';
$lang['error_invalidauthor'] = 'Error: Invalid (or empty) author.';
$lang['error_invalidcategory'] = 'Error: Invalid (or empty) category.';
$lang['error_invaliddescription'] = 'Error: Invalid (or empty) description.';
$lang['error_invalidfile'] = 'Error: Invalid (or empty) filename.';
$lang['error_invaliduploadfilename'] = 'Error: Files with that name (probably extension) are not allowed (%s).';
$lang['error_invaliduploadid'] = 'Error: Invalid upload id';
$lang['error_nofiles'] = 'Error: No Matching Files!';
$lang['files'] = 'Files';
$lang['fixme'] = 'Fix Spaces';
$lang['friendlyname'] = 'Front End File Management (Uploads)';
$lang['help'] = '
<h3>What Does This Do?</h3>
<p>It is a module for allowing people to upload and download files to and from your site.  It keeps track of who uploaded a file, and who has downloaded it.  As well, you can sort files into categories, and manage the files that were uploaded like every administrator would do</p> 
<h3>How Do I Use It</h3>
<p>To use this module, to allow users to upload files to your site, you should install the module, and then create one or more categories (a.k.a) directories for the uploaded files to go into. Then add a tag into a page or template somewhere like {cms_module module="Uploads" category="somecategory" mode="somemode"}.  Where mode matches one of the modes listed below.  The output will differ depending upon which mode you select.</p>
<p>This module can use the FrontendUsers module (optional) to get information about any currently logged in users to partly fill in the form when uploading files;</p>
<h3>Permissions</h3>
<ul>
<li><em>Manage Uploads</em> permission is needed to manage categories, and the files within them.</li>
<li><em>Modify Templates</em> permission is needed edit any of the templates.</li>
<li><em>Modify Site Preferences</em> permission is needed any of the file settings.</li>
</ul>
<h3>Category Browsing</h3>
<p>Placing a tag like {cms_module module="Uploads" action="categorysummary" template="summarytemplate" sortorder="name_asc" listingtemplate="listtemplate" listingsortorder="listsortorder"}
allows you to display an interactive category browser. sortorder can be: name_asc, name_desc, summ_asc, summ_desc, or random.
listingtemplate and listingsortorder are identical to the template and sortorder parameters for
the "summary" mode.</p>
<h3>Automatic Scanning</h3>
<p>This module will automatically scan for new files in a directory when a summary mode tag for a specific category is used on a CMSMS page.  i.e: <code>{Uploads category=category_name}</code> will perform a scan.  but <code>{Uploads category=all}</code> will not.</p>
<h3>Thumbnail Generation</h3>
<p>This module is capable of generating thumbnails for certain types of files.  There are preferences in the preferences tab of the Uploads module administration panel to specify the types of files that allow automatic thumbnail generation, and the size of the generated thumbnail (preserving aspect ratio).   Thumbnails are automatically generated upon upload, and can be generated manually by selecting the &quot;Generate Thumbnails&quot; option in the edit category forms... but are not generated when new files are detected by automatic scanning.</p>
<h3>You Send It</h3>
<p>It is possible to enable &quot;yousendit&quot; like functionality to allow automatically emailing selected people with a link to a newly uploaded file.  This is accomplished by using a tag like: <code>{Uploads action=yousendit category=categoryname}</code>.  This will display a form allowing this functionality.</p>
<h3>Time Limited Access</h3>
<p>This module supports the notion of unique keys to allow time limited access to certain files.  The functionality allows specifying a time limit (in hours) for which the key is valid, and a maximum number of downloads or download atempts.  An email is sent to the desired users with the unique URL.  After the time limit, or the number of downloads has been reached, the URL is no longer valid.  These unique time limited keys are automatically removed from the database after expiry.</p>
<h3>Restricing Access with FEU</h3>
<p>This module is capable of integrating with the FrontEndUsers module to restrict the visibility of categories (directories) to certain allowed FEU groups.  Your users would have to be logged in to your website (using FEU) and also a member of one of the allowed groups to obtain access.  This is accomplished in the category edit form.  You can select a list of FEU groups which are allowed to view files in this category.</p>
<p>This functionality also applies to the &quotTime Limited Access&quot functionality.  Allowing you to specify that certain people, who also have to be logged in to your website can have access to certain files for a limited amount of time.</p>
<h3>Emailing</h3>
<p>This module is capable of sending an email whenever a file is uploaded, see the preferences tab.  However, to do this the <b>CMSMailer</b> package must be installed and configured.  This is an <em>optional</em> step, and if the CMSMailer module is not installed, nothing will be displayed to the user, only a log message will be placed into the admin log</p>
<h3>Content Blocks <em>(CMSMS 1.7+ Only)</em></h3>
<p>For CMSMS 1.7 this module is capable of interfacing with the content editor and exporting a content block that allows selecting an uploads category within the edit content page, for later use within the template.</p>
<p>i.e: placing the following tag within a page template <code>{content_module module=&quot;Uploads&quot; block=&quot;uploads_category&quot; type=&quot;categoryselect&quot;}</code>, will add a dropdown box in the edit content view of any page utilizing that page template.</p>
<p>This content block also accepts some optional parameters:</p>
<ul>
  <li><u>selectone</u>
    <p>This parameter inserts a &quot;Select One&quot; item into the list of categories, requiring the user to select a valid category when the content page is saved.</p>
  </li>
  <li><u>allowall</u>
    <p>This parameter allows the content editor to select &quot;All&quot; as a category for the uploads display.</p>
  </li>
</ul>
<h4>How would I use it?</h4>
<p>Here is some example code:</p>
<pre>
{content_module module=&quot;Uploads&quot; block=&quot;categoryselect&quot; label=&quot;Select an uploads category&quot; selectone=1 assign=&quot;tmp&quot;}
{Uploads category=$tmp}
</pre>

<h3>System Settings</h3>
<p><b>Note:</b> This module does not bypass or get past any file size limitations in php.  It works in conjunction with them.  Therefore you may need to modify your php.ini file, your CMSMS config.php file and/or your httpd.conf file(s) to allow you to upload files as large as what you have set in the uploads module preferences.</p>
<h3>Apache Notes</h3>
<p>In order to allow large file uploads, you may need to modify the upload_max_filesize parameter in your php.ini  In addition, the LimitRequestBody parameter in your apache configuration, may need to be adjusted to match the upload_max_filesize parameter</p>
<p>Note:  the upload_max_filesize parameter can be specified in bytes, kilobytes, or megabytes, however the LimitRequetBody parameter is only specified in bytes</p>
<p><strong style="color: red;">Warning</strong> - The proper behaviour of this module depends on numerous php configuration variables.  These include <em>(but are not limited to)</em>, php\'s memory_limit, safe_mode, file_uploads, uploads_max_filesize, and max_execution_time.  These variables may need adjustment for this module to work properly on your site.  It is advised that you work with your system administrator or host provider to tune these settings for your requirements.</p>
<p><strong style="color: red;">Warning</strong> - Using this module to allow site visitors to send files (either using the standard mechanism or the yousendit mechanism) may not work with output compression enabled.  Please ensure that output_compression is set to false in the config.php.</p>
';
$lang['id'] = 'Id';
$lang['installed'] = 'Module version %s installed.';
$lang['ip_address'] = 'IP Address';
$lang['moddescription'] = 'A module that allows users to upload files, and allows you to manage them.';
$lang['name'] = 'Name';
$lang['renamemessage'] = 'Change the name here to execute a rename';
$lang['path'] = 'Path';
$lang['pathmessage'] = 'Change the category here to move the file to another directory';
$lang['pathinuploads'] = '(Relative to the uploads directory)';
$lang['postinstall'] = '<p>The uploads module has been successfully installed. Be sure to set "Manage Uploads" permissions to use this module!</p>
<p><strong>Warning</strong> - The proper behaviour of this module depends on numerous php configuration variables.  These include <em>(but are not limited to)</em>, php\'s memory_limit, safe_mode, file_uploads, uploads_max_filesize, and max_execution_time.  These variables may need adjustment for this module to work properly on your site.  It is advised that you work with your system administrator or host provider to tune these settings for your requirements.</p>';
$lang['postuninstall'] = 'The Uploads module has been successfully removed.  No files have been removed from your uploads directory, and file integrity is intact';
$lang['preferences'] = 'Preferences';
$lang['prefsupdated'] = 'Module preferences updated.';
$lang['prompt_categorydesc'] = 'Description';
$lang['prompt_categorylistable'] = 'Files in this directory can be listed';
$lang['prompt_categoryname'] = 'Category Name';
$lang['prompt_categorypath'] = 'Server Path';
$lang['prompt_deletedirectory'] = 'Delete category directory?';
$lang['prompt_max_uploadsize'] = 'Maximum file size allowed (Kb)';
$lang['prompt_valid_uploadextensions'] = 'Valid upload extensions';
$lang['scan'] = 'Scan';
$lang['selectcategory'] = 'Select Category';
$lang['size'] = 'Size';
$lang['sizekb'] = 'Size (Kb)';
$lang['submit'] = 'Submit';
$lang['summary_template'] = 'Summary Templates';
$lang['summary'] = 'Summary';
$lang['title_admin_panel'] = 'Uploads Module';
$lang['title_mod_admin'] = 'Module Admin Panel';
$lang['title_mod_prefs'] = 'Module Preferences';
$lang['title_subnet_exclusions'] = 'Exclude subnets from statistics';
$lang['title_valid_uploadextensions'] = 'Valid Extensions';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['upload'] = 'Upload';
$lang['uploaded'] = 'File %s was uploaded by %s.';
$lang['replaced'] = 'File %s was replaced by %s.';
$lang['deleted'] = 'File %s was deleted.';
$lang['uploadform_template'] = 'Upload Templates';
$lang['username'] = 'Username';
$lang['warning_deletecategory'] = 'WARNING: Use caution when deleting categories.  Files may be lost';
?>
