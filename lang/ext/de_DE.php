<?php
$lang['prompt_tl_access'] = 'Zeitlich beschr&auml;nkter Zugriff';
$lang['prompt_allow_upload_sendfile'] = 'Allow sending files immediately on admin upload';
$lang['msg_auto_delete_file'] = 'Automatically deleted expired file: %s';
$lang['msg_auto_delete_file_failed'] = 'Permissions problem, auto delete of %s failed';
$lang['info_category_expires_hrs'] = 'Specify a number of hours before files in this category can be deleted.  Use a value of 0 to indicate that files should not be deleted';
$lang['prompt_category_expires_hrs'] = 'Number of hours until files in this category are automatically deleted';
$lang['info_dflt_category_expiry'] = 'The default value for new categories that specifies how long files in this category exist before they are automatically deleted.  Use a value of 0 to indicate no deletion';
$lang['title_category_expiry'] = 'Category expiry period <em>(hrs)</em>';
$lang['info_categorydeletable'] = 'Authorized users will have permission to delete these files.  This means that a url will be provided in the appropriate templates to allow deleting of the file.  A website developer can use appropriate smarty logic to show a link to authorized users.';
$lang['copy_files'] = 'Dateien kopieren';
$lang['error_filetoolarge'] = 'The file you attempted to uploade is larger than the CMSMS maximum upload file size';
$lang['areyousure_deletecategory'] = 'Wollen Sie wirklich diese Kategorie l&ouml;schen?';
$lang['error_delete'] = 'An item cound not be deleted (%s)';
$lang['confirm_cat_multiaction'] = 'Are you sure you want to perform this action on the selected categories?';
$lang['error_nothing_selected'] = 'Error: Nothing selected';
$lang['with_selected'] = 'With Selected:';
$lang['error_replace_mismatched_fileext'] = 'When replacing a file, you must upload a file of the same exact type (by file extension).  The file you selected does not match that of the original file.';
$lang['replace'] = 'Ersetzen';
$lang['info_replacefile'] = 'You may upload a replacement file, if the file is an image type, and you have not specified a replacement thumbnail, a new thumbnail will be generated';
$lang['prompt_replacefile'] = 'Upload replacement file';
$lang['title_fixspaces'] = 'Fix spaces in the filename';
$lang['category_copied'] = 'Die Kategorie wurde erfolgreich kopiert';
$lang['error_duplicatepath'] = 'Please specify a directory name that is different from the source, and is not already in use';
$lang['operation_cancelled'] = 'Operation abgebrochen';
$lang['source'] = 'Quelle';
$lang['destination'] = 'Ziel';
$lang['prompt_copy_files'] = 'Copy category Files';
$lang['info_copy_files'] = 'Copy the files from the source category to the destination category';
$lang['extra'] = 'Extra';
$lang['copy'] = 'Kopieren';
$lang['selectone'] = 'Select One';
$lang['autowatermark'] = 'Automaticall place watermarks on images';
$lang['image_settings'] = 'Image Settings';
$lang['prompt_getfile_resultpage'] = 'Page to use for errors or other messages related to file downloading';
$lang['error_invalid_key'] = 'The upload key specified is invalid (maybe it has reached its maximum download capacity or has expired)';
$lang['dflt_timelimited_subject'] = '{$sitename} - You have been granted access to {$entry->upload_name|strip_tags} for a limited time';
$lang['prompt_timelimited_subject'] = 'Subject for email created when sending a time limited URL';
$lang['prompt_timelimited_autodelete'] = 'Auto delete expired entries after N hours <em>(specify 0 to disable autodelete)</em>:';
$lang['prompt_timelimited_sendit'] = 'Send this url to the designated email address?';
$lang['url_key'] = 'URL Key';
$lang['created'] = 'Erstellt';
$lang['expires'] = 'Expires';
$lang['addedit_timelimited_key'] = 'Add/Edit Time Limited Key';
$lang['time_limited_key_added'] = 'Time Limited Key Added';
$lang['num_hours'] = 'Number of Hours';
$lang['num_downloads'] = 'Number of Downloads';
$lang['email_address'] = 'Email-Adresse';
$lang['error_missing_invalid'] = 'A required value is missing or invalid: %s';
$lang['add_timelimited_key'] = 'Add Time Limited Key';
$lang['file_info2'] = 'File %s (id=%d)';
$lang['info_timelimited_downloads'] = 'Specify the default number of times that a file identified by a particular key can be downloaded';
$lang['prompt_timelimited_downloads'] = 'Default Number of Downloads';
$lang['info_timelimited_hours'] = 'Specify the default number of hours that a time limited key is valid for.  Specify 0 for unlimited';
$lang['prompt_timelimited_hours'] = 'Number of hours a Time Limited Key is valid for';
$lang['timelimited_url_settings'] = 'Time Limited Key Settings';
$lang['manage_timelimited'] = 'Manage Time Limited Access';
$lang['uploading_settings'] = 'File Upload Settings';
$lang['general_settings'] = 'Allgemeine Einstellungen';
$lang['thumbnail_settings'] = 'Thumbnail Generation';
$lang['title_redirect_on_sendfile'] = 'Page to redirect to after sending a file';
$lang['lbl_back'] = 'Zur&uuml;ck';
$lang['lbl_templates'] = 'Templates bearbeiten';
$lang['prompt_public_field'] = 'Field is public <em>(can be viewed by site visitors)</em>';
$lang['upload_edited'] = 'File Details Edited on %s';
$lang['info_thumbnail'] = 'Ein optionales Vorschaubild';
$lang['upload_file'] = 'Eine neue Datei hochladen';
$lang['msg_field_deleted'] = 'Feld gel&ouml;scht';
$lang['ask_delete_field'] = 'Are you sure you want to delete this field definition and all associated values?';
$lang['yes'] = 'Ja';
$lang['no'] = 'Nein';
$lang['type'] = 'Typ';
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
$lang['prompt_field_type'] = 'Feldtyp';
$lang['prompt_field_name'] = 'Feldname';
$lang['title_add_field'] = 'Add or Edit a Field Definition';
$lang['field_definitions'] = 'Felddefinitionen';
$lang['prompt_add_field'] = 'Add a Field Definition';
$lang['param_action'] = 'Specifies the behaviour of the module tag.  Possible values are: default - (the defafault behavior), detail - to display a detail view of a single file based on the upload_id, and yousendit - to display a form to allow uploading a file, and sending it to numerous addresses in one step';
$lang['param_sendfilepage'] = 'Specify the page id or alias of a page that should be used for the send a file form';
$lang['file_uploaded'] = 'Datei erfolgreich hochgeladen';
$lang['to'] = 'An';
$lang['title_yousenditform_template'] = 'Add or Edit a &quot;You Send It&quot; Form Template';
$lang['yousenditform_template'] = 'YouSendIt Form Templates';
$lang['title_yousenditform_sysdefault'] = 'System default &quot;you send it&quot; template';
$lang['msg_file_sent'] = 'A message has been sent to the selected addresses that contains information about the file and how to retrieve it.';
$lang['error_noaddresses'] = 'You must supply at least one destination address';
$lang['error_nosubject'] = 'You must supply a subject';
$lang['subject'] = 'Betreff';
$lang['title_sendfilepage'] = 'Seite f&uuml;r das &quot;Send a File&quot; Formular';
$lang['file_info'] = 'Datei Info';
$lang['send'] = 'Senden';
$lang['notes'] = 'Notizen';
$lang['addressees'] = 'Sende Informationen &uuml;ber diese Datei an';
$lang['prompt_sendfile_email_template'] = '&quot;Send a File&quot; Email Template';
$lang['title_sendfileform_template'] = 'Add or Edit a &quot;Send a File&quot; Form Template';
$lang['sendfileform_template'] = '&quot;Send a File&quot; Form Templates';
$lang['prompt_notify_email_template'] = 'File upload notification email template';
$lang['title_sendfileform_sysdefault'] = 'System default &quot;Send a File&quot; form template';
$lang['prompt_categorydeletable'] = 'Dateien in dieser Kategorie k&ouml;nnen gel&ouml;scht werden';
$lang['title_allow_delete'] = 'Das L&ouml;schen von Dateien im Frontend erlauben';
$lang['default_templates'] = 'Standard Templates';
$lang['firstpage'] = 'Erste Seite';
$lang['prevpage'] = 'Vorherige Seite';
$lang['nextpage'] = 'N&auml;chste Seite';
$lang['lastpage'] = 'Letzte Seite';
$lang['firstpage_arrow'] = '<<';
$lang['prevpage_arrow'] = '<';
$lang['nextpage_arrow'] = '>';
$lang['lastpage_arrow'] = '>>';
$lang['page'] = 'Seite';
$lang['of'] = 'von';
$lang['prompt_grouplist'] = 'Autorisierte FEU-Gruppen';
$lang['info_grouplist'] = 'W&auml;hlen Sie die Gruppen des FrontendUsers-Moduls, die Zugriff auf diese Kategorie haben sollen. Wenn Sie alle Eintr&auml;ge abw&auml;hlen, erlauben Sie allen den Zugriff.';
$lang['title_scan'] = 'Diese Kategorie auf neue Dateien pr&uuml;fen';
$lang['title_create_thumbnails'] = 'Fehlende Vorschaubilder f&uuml;r die Dateien dieser Kategorie';
$lang['create_thumbnails'] = 'Vorschaubilder erzeugen';
$lang['title_create_thumbnail'] = 'Ein Vorschaubild f&uuml;r diese Datei erzeugen';
$lang['create_thumbnail'] = 'Ein Vorschaubild erzeugen';
$lang['error_patherror'] = 'Konnte das Verzeichnis nicht &ouml;ffnen (Berechtigungs-Problem?)';
$lang['title_download_chunksize'] = 'Gr&ouml;&szlig;e des Downloads';
$lang['info_download_chunksize'] = 'Die Verwendung dieses Parameters hat Auswirkungen auf die Geschwindigkeit beim Herunterladen und kann helfen, wenn nur wenig Speicher zur Verf&uuml;gung steht.';
$lang['warning_safe_mode'] = 'Der PHP-Safe-Modus ist aktiviert. Aufgrund dessen kann es beim Hochladen von Dateien zu Problemen kommen (Berechtigungen). Au&szlig;erdem kann es mit der F&auml;higkeit des Moduls, einige Einstellungen in der ini-Datei &uuml;berschreiben zu k&ouml;nnen, zu unerw&uuml;nschten &Uuml;berschneidungen kommen. Sie sollten sich daher mit Ihrem Provider in Verbindung setzen, ob er den Safe-Modus deaktivieren kann.';
$lang['param_detailpage'] = 'Dies ist insbesondere dann n&uuml;tzlich, wenn die Details mit einem anderen Seiten-Template angezeigt werden sollen. Dieser Parameter ben&ouml;tigt entweder die ID oder den Alias der Seite, die zur Anzeige der Details verwendet werden soll.';
$lang['param_prefix'] = 'Ein boolscher Wert, der anzeigt, mit welchem Prefix die Dateien gekennzeichnet werden sollen';
$lang['param_prefix_feu'] = 'Ein boolscher Wert, der anzeigt, mit welchem Prefix die Dateien des aktuellen Autors gekennzeichnet werden sollen. Ohne Vorgabe wird die aktuelle Zeit als Prefix verwendet (im dechex-Format)';
$lang['param_nocaptcha'] = 'Captcha-Support (standardma&szlig;ig aktiviert) beim Hochladen deaktivieren';
$lang['title_uploadform_template'] = 'Template f&uuml;r das Formular zum Hochladen von Dateien bearbeiten';
$lang['captcha_title'] = 'Bitte geben Sie den Text ein, der in diesem Bild angezeigt wird';
$lang['error_captchamismatch'] = 'Der Text, den Sie eingegeben haben, entspricht nicht dem angezeigten Bild';
$lang['title_autothumbnail_extensions'] = 'F&uuml;r Dateien mit dieser Namenserweiterung Vorschaubilder erzeugen';
$lang['title_autothumbnail_size'] = 'Maximale Gr&ouml;&szlig;e f&uuml;r die erzeugten Vorschaubilder (in Pixel)';
$lang['prompt_upload_icon'] = 'Ein Icon hochladen';
$lang['info_sysdefault'] = 'Dieser Text wird verwendet, wenn ein neues Template dieses Typs erstellt wird';
$lang['title_detailrpt_sysdefault'] = 'Template f&uuml;r den detailierten Bericht (Modulstandard)';
$lang['title_summaryrpt_sysdefault'] = 'Template f&uuml;r den Kurzbericht (Modulstandard)';
$lang['title_uploadform_sysdefault'] = 'Template f&uuml;r das Hochladen von Dateien (Modulstandard)';
$lang['template'] = 'Template ';
$lang['resettodefault'] = 'Auf den Modulstandard zur&uuml;cksetzen';
$lang['title_summaryrpt_template'] = 'Template f&uuml;r den Kurzbericht';
$lang['title_detailrpt_template'] = 'Template f&uuml;r den detailierten Bericht';
$lang['prompt_name'] = 'Name ';
$lang['prompt_default'] = 'Standard';
$lang['legend_uploadform'] = 'Eine Datei hochladen';
$lang['error_missingparam'] = 'Es fehlt ein erforderlicher Parameter';
$lang['error_missingname'] = 'F&uuml;r den Dateitypen muss ein Name festgelegt werden';
$lang['error_missingextensions'] = 'Es muss mindestens eine Dateinamenserweiterung festgelegt werden';
$lang['error_missingicon'] = 'Daf&uuml;r muss ein Icon festgelegt werden';
$lang['error_nosuchrow'] = 'Die festgelegte Zeile konnte nicht gefunden werden';
$lang['name_unknown'] = 'Unbekannt';
$lang['description_unknown'] = 'Beschreibung der Dateitypen f&uuml;r nicht &uuml;bereinstimmende Dateien';
$lang['image'] = 'Bild';
$lang['icon'] = 'Ikon';
$lang['extensions'] = 'Dateinamenserweiterungen';
$lang['addfiletype'] = 'Einen neuen Dateitypen hinzuf&uuml;gen';
$lang['file_types'] = 'Dateitypen';
$lang['error_nocategoryid'] = 'Es wurde keine Kategorie-ID eingegeben';
$lang['error_nocategory'] = 'Es wurde keine Kategorie-ID eingegeben';
$lang['error_templatenameexists'] = 'Es existiert bereits ein Template mit diesem Namen.';
$lang['prompt_templatename'] = 'Template-Name';
$lang['prompt_template'] = 'Template ';
$lang['prompt_newtemplate'] = 'Ein neues Template erstellen';
$lang['help_OnDownload'] = '<p>Ein Ereignis, wenn ein User eine Datei heruntergeladen hat</p>
<h4>Parameter</h4>
<ul>
<li><em>id</em> - ID der hochgeladenen Datei</li>
<li><em>name</em> - Dateiname</li>
<li><em>ip</em> - IP-Adresse des herunterladenden Users</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '<p>Ein Ereignis, wenn eine Kategorie gel&ouml;scht wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>name</em> - Name der Kategorie</li>
<li><em>path</em> - Pfad der Kategorie</li>
</ul>
';
$lang['help_OnCreateCategory'] = '<p>Ein Ereignis, wenn eine Kategorie erstellt wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>name</em> - Name der Kategorie</li>
<li><em>description</em> - Beschreibung der Kategorie</li>
<li><em>path</em> - Kategoriepfad</li>
<li><em>path</em> - Ein Flag, der anzeigt, ob die Kategorie gelistet werden soll</li>
</ul>
';
$lang['help_OnRemove'] = '<p>Ein Ereignis, wenn eine Datei &uuml;ber die Administration oder das Frontend entfernt wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>name</em> - Name der entfernten Datei</li>
<li><em>id</em> - ID der entfernten Datei</li>
<li><em>category_id</em> - ID der Kategorie</li>
</ul>
';
$lang['help_OnUpload'] = '<p>Ein Ereignis, wenn eine Datei &uuml;ber die Administration oder das Frontend hochgeladen wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>category</em> - Name der Kategorie</li>
<li><em>name</em> - Name der hochgeladenen Datei</li>
<li><em>size</em> - Gr&ouml;&szlig;e der hochgeladenen Datei</li>
<li><em>summary</em> - Kurzbeschreibung der hochgeladenen Datei (kann leer sein)</em></li>
<li><em>description</em> - die lange Beschreibung der hochgeladenen Datei (kann leer sein)</em></li>
<li><em>author</em> - Autor der hochgeladenen Datei (falls verf&uuml;gbar)</em></li>
<li><em>ip_address</em> - Internet-Adresse des Clients, der die Datei hochgeladen hat</li>
</ul>';
$lang['info_event_ondeletecategory'] = 'Ereignis, wenn eine Kategorie gel&ouml;scht wurde';
$lang['info_event_oncreatecategory'] = 'Ereignis, wenn eine Kategorie erstellt wurde';
$lang['info_event_ondownload'] = 'Ereignis, wenn eine Datei herunter geladen wurde';
$lang['info_event_onupload'] = 'Ereignis, wenn eine neue Datei hochgeladen wurde';
$lang['info_event_onremove'] = 'Ereignis, wenn eine Datei entfernt wurde';
$lang['title_usertag_onupload'] = 'Benutzerdefinierter Tag, der aufgerufen wird, wenn die Datei vollst&auml;ndig hochgeladen ist';
$lang['none'] = 'Nichts';
$lang['matchesfound'] = '&Uuml;bereinstimmungen gefunden';
$lang['filter'] = 'Filter ';
$lang['title_redirectonupload'] = 'Den Benutzer nach dem Hochladen einer Datei auf diese Seite weiterleiten (ID/Alias)';
$lang['details'] = 'Details ';
$lang['confirm_preferences'] = 'Wollen Sie wirklich die Einstellungen &auml;ndern?';
$lang['error_nofilesuploaded'] = 'Es wurden keine Dateien hochgeladen.';
$lang['prompt_replace'] = '&Uuml;berschreiben erlauben';
$lang['info_replace'] = 'Ersetzt eine Datei mit dem gleichen Namen (ohne &Auml;nderung der ID)';
$lang['param_no_initial'] = 'Keine einleitenden Ergebnisse anzeigen, wenn der Filter aktiviert ist';
$lang['param_key'] = 'Ein zus&auml;tzlicher Schl&uuml;ssel f&uuml;r die k&uuml;nftige Verwaltung von hochgeladenen Dateien. Dieser Schl&uuml;ssel kann ein encodierter String wie etwa: &#039;feusers:uid&#039; oder &auml;hnlich sein kann.  Dieser Parameter wird nur ben&ouml;tigt, wenn das Uploads-Modul in einem anderen Modul eingebettet wird';
$lang['param_noauthor'] = 'Verbirgt das Feld Autor im Formular zum Hochladen. Dieser Parameter ist nur m&ouml;glich, wenn der Modus &#039;upload&#039; ist. Wenn das FrontendUsers-Modul installiert und ein Benutzer aktuell angemeldet ist, enth&auml;lt das verborgene Feld dessen Namen';
$lang['param_upload_id'] = 'upload_id=&quot;id&quot; - definiert eine einzelne Datei f&uuml;r einen Link oder f&uuml;r den Single-Modus</li>';
$lang['param_detailtemplate'] = 'Ein Template mit diesem Namen f&uuml;r den detailierten Bericht verwenden.';
$lang['param_template'] = 'Verwendet ein Template mit diesem Namen f&uuml;r diesen Bericht bzw. das Formular. Dieses Template ruft entsprechend dem festgelegten Modus automatisch ein weiteres Template mit dem vorgegebenen Namen auf';
$lang['param_filter'] = 'Das Filter-Formular anzeigen';
$lang['param_no_intitial'] = 'Nur n&uuml;tzlich, wenn der Filter-Parameter gesetzt wurde. Standardm&auml;&szlig;ig zeigt dieser Parameter an, welche einleitenden Ergebnisse zur&uuml;ckgegeben werden sollen.';
$lang['param_filetypes'] = 'Zeigt nur Dateien an, deren Typ in der mit Kommata getrennten Liste aufgef&uuml;hrt ist';
$lang['param_sortorder'] = '  
  <p>Sortierreihenfolge
  <ul>
  <li><em>date_asc</em> - sortiert aufsteigend nach Datum</li>
  <li><em>date_desc</em> - sortiert absteigend nach Datum</li>
  <li><em>name_asc</em> - sortiert aufsteigend nach Name</li>
  <li><em>name_desc</em> - sortiert absteigend nach Name</li>
  <li><em>size_asc</em> - sortiert aufsteigend nach Gr&ouml;&szlig;e</li>
  <li><em>size_desc</em> - sortiert absteigend nach Gr&ouml;&szlig;e</li>
  <li><em>desc_asc</em> - sortiert aufsteigend nach Beschreibung</li>
  <li><em>desc_desc</em> - sortiert absteigend nach Beschreibung</li>
  <li><em>author_asc</em> - sortiert aufsteigend nach Autor</li>
  <li><em>author_desc</em> - sortiert absteigend nach Autor</li>
  <li><em>ip_asc</em> - sortiert aufsteigend nach IP-Adresse</li>
  <li><em>ip_desc</em> - sortiert absteigend nach IP-Adresse</li>
  <li><em>random</em> - zuf&auml;llige Reihenfolge</li>
  </ul>
  </p>';
$lang['param_listingtemplate'] = 'Das Template, welches f&uuml;r die Kategorieliste verwendet werden soll, nachdem die Kategorie-Zusammenfassungsseite geklickt wurde';
$lang['param_listingsortorder'] = 'Die Sortierreihenfolge (siehe param_sortorder), die f&uuml;r die Kategorieliste verwendet werden soll, nachdem die Kategorien-Zusammenfassungsseite geklickt wurde';
$lang['param_fileextensions'] = 'file_extensions=&quot;ext1,ext2,ext3&quot;
<p>ist nur g&uuml;ltig, wenn der Parameter mode=upload ist, dieser Parameter beschr&auml;nkt die Dateitypen, die hochgeladen werden k&ouml;nnen.  Die Voreinstellungen des Moduls werden dabei &uuml;berschrieben.</p>';
$lang['param_count'] = 'count=&quot;N&quot;
<p>Ein Parameter, um nur die ersten &quot;N&quot; Ergebnisse einer Abfrage aufzulisten. Ein Seitenumbruch w&auml;re zwar besser, aber bis dahin gibts diesen Trick.</p>';
$lang['param_category'] = 'category=&quot;name&quot;
<p><b>Hinweis:</b> category kann auch den Wert &quot;all&quot; haben. Dann werden alle hochgeladenen Dateien in allen <em>gelisteten</em> Kategorien angezeigt.</p>';
$lang['param_mode'] = ' 
 <ul>
  <li><em>detailed</em> - zeigt eine detaillierte Liste aller Dateien dieser Kategorie</li>
  <li><em>upload</em> - zeigt ein Formular, um Besuchern der Site das Hochladen einer Datei zu erm&ouml;glichen</li>
  <li><em>url <i>or</i> link</em> - zeigt einen Link zu einer Datei</li>
  <li><em>summary</em> - zeigt eine zusammengefasste Liste aller Dateien dieser Kategorie</li>
  <li><em>single</em> - zeigt einen detaillierten Bericht &uuml;ber eine bestimmte, hochgeladene Datei</li>
  </ul>';
$lang['param_selectform'] = 'Im &#039;select&#039;-Modus enth&auml;lt dieser Parameter die Formular-ID des &uuml;bergeordneten Formulars. Kann verwendet werden, um bestimmte Parameter weiterzugeben.';
$lang['param_selectname'] = 'Im &#039;select&#039;-Modus kann mit diesem Parameter der Names des Feldes festgelegt werden.';
$lang['param_selectvalue'] = 'Im &#039;select&#039;-Modus kann mit diesem Parameter der voreingestellte Wert des Feldes festgelegt werden.';
$lang['param_selectnone'] = 'Im &#039;select&#039;-Modus kann mit diesem Parameter festgelegt werden, ob &#039;none&#039; eine g&uuml;ltige Auswahl ist.';
$lang['returntomodule'] = 'Zur&uuml;ck zur Moduloberfl&auml;che';
$lang['error_nocategories'] = 'Es wurden keine Kategorien definiert.';
$lang['title_enforceextensions'] = 'Erfordert Namenserweiterungen f&uuml;r alle hochgeladenen Dateien';
$lang['restoredefaultsconfirm'] = 'Dies setzt das Template auf den Systemstandard zur&uuml;ck. Alle &Auml;nderungen gehen dabei verloren. Wollen Sie das wirklich?';
$lang['thumbnail'] = 'Vorschaubild';
$lang['newthumbnail'] = 'Ein neues Vorschaubild hochladen';
$lang['info_summary'] = 'Eine kurze Beschreibung der Datei (wird dies leer gelassen, wird der Dateiname ohne Erweiterung verwendet)';
$lang['info_categoryname'] = 'Ein kurzer Name f&uuml;r Ihre Kategorie';
$lang['info_categorydesc'] = 'Eine Beschreibung Ihrer Kategorie';
$lang['info_categorypath'] = 'Das Unterverzeichnis im Verzeichnis /uploads, welches f&uuml;r die Speicherung der Dateien dieser Kategorie verwendet werden soll. Falls dieses Verzeichnis noch nicht existiert, wird es erzeugt.';
$lang['info_destname'] = 'Verwenden Sie das Feld &#039;Hochladen als&#039;, um den Namen der hochgeladenen Datei zu ver&auml;ndern. Ohne Vorgabe wird der Dateiname nicht ver&auml;ndert.';
$lang['error_cantcreatedirectory'] = 'Das Verzeichnis konnte nicht erstellt werden.';
$lang['error_nomailermodule'] = 'Die Verbindung zum CMSMailer-Modul konnte nicht hergestellt werden.';
$lang['upload_notification'] = 'Es wurde eine neue Datei hochgeladen.';
$lang['title_email_on_upload'] = 'Die Benachrichtigung &uuml;ber eine hochgeladene Datei senden an:';
$lang['email_template'] = 'Email-Template';
$lang['title_dummy_index_html'] = 'Soll in jedem Verzeichnis eine Dummy-index.html-Datei erstellt werden?<br/><em>Bereits existierende index.html-Dateien bleiben erhalten</em>';
$lang['about'] = '&Uuml;ber';
$lang['error_permissiondenied'] = 'Zugriff verweigert. Bitte pr&uuml;fen Sie Ihre Berechtigungen.';
$lang['error_couldnotwrite'] = 'Konnte nicht geschrieben werden.';
$lang['addcategory'] = 'Kategorie hinzuf&uuml;gen';
$lang['all'] = 'Alle';
$lang['areyousure'] = 'Wollen Sie das wirklich?';
$lang['author'] = 'Autor';
$lang['cancel'] = 'Abbrechen';
$lang['cannotmodifypath'] = '(Der Pfad konnte nicht ge&auml;ndert werden.)';
$lang['categories'] = 'Kategorien';
$lang['category'] = 'Kategorie';
$lang['message_categoryadded'] = 'Die Kategorie wurde erfolgreich hinzugef&uuml;gt.';
$lang['date'] = 'Datum';
$lang['dateuploaded'] = 'Hochgeladen am';
$lang['default'] = 'Voreinstellungen';
$lang['delete'] = 'L&ouml;schen';
$lang['description'] = 'Beschreibung';
$lang['destname'] = 'Hochladen als';
$lang['detail_template'] = 'Detail-Template';
$lang['downloaded'] = 'Die Datei %s wurde heruntergeladen.';
$lang['downloads'] = 'Heruntergeladene Dateien';
$lang['edit'] = 'Bearbeiten';
$lang['editcategory'] = 'Kategorie bearbeiten';
$lang['editupload'] = 'Hochgeladene Datei bearbeiten';
$lang['error'] = 'Fehler!';
$lang['error_pathinuse2'] = 'Es existiert bereits eine Kategorie, die diesen Pfad (%s) verwendet';
$lang['error_pathinuse'] = 'Es existiert bereits eine Kategorie mit diesem Pfad.';
$lang['error_categoryexists2'] = 'Fehler: Eine Kategorie mit dem Namen %s existiert bereits';
$lang['error_categoryexists'] = 'Fehler: Die Kategorie existiert bereits';
$lang['error_categorynotempty'] = 'Fehler: Die Kategorie kann nicht gel&ouml;scht werden, da sie nicht leer ist!';
$lang['error_categorynotfound'] = 'Fehler: Kategorie nicht gefunden!';
$lang['error_dberror'] = 'Fehler: Datenbankfehler!';
$lang['error_emptycategory'] = 'Fehler: Kategorie-Feld leer!';
$lang['error_emptypath'] = 'Fehler: Pfad leer!';
$lang['error_fileexists'] = 'Fehler: Die Datei %s existiert bereits.';
$lang['error_filenotfound'] = 'Fehler: Die Datei %s wurde nicht gefunden.';
$lang['error_insufficientparams'] = 'Fehler: Das Modul wurde mit nicht ausreichenden Parametern aufgerufen! <br/>Der fehlende Parameter ist: %s';
$lang['error_invalidauthor'] = 'Fehler: Autor ung&uuml;ltig (oder leer).';
$lang['error_invalidcategory'] = 'Fehler: Kategorie ung&uuml;ltig (oder leer).';
$lang['error_invaliddescription'] = 'Fehler: Beschreibung ung&uuml;ltig (oder leer).';
$lang['error_invalidfile'] = 'Fehler: Dateiname ung&uuml;ltig (oder leer).';
$lang['error_invaliduploadfilename'] = 'Fehler: Dateien mit dieser Namenserweiterung sind nicht erlaubt (%s).';
$lang['error_invaliduploadid'] = 'Fehler: Ung&uuml;ltige ID';
$lang['error_nofiles'] = 'Fehler: Keine entspechenden Dateien!';
$lang['files'] = 'Dateien';
$lang['fixme'] = 'Leerzeichen entfernen';
$lang['friendlyname'] = 'Dateien (Uploads-Modul)';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Das Modul erlaubt den Besuchern Ihrer Homepage, auf Ihrer Seite Dateien hoch- und runterzuladen. Dabei wird protokolliert, wer eine Datei hochgeladen und wer eine Datei heruntergeladen hat. Desweiteren k&ouml;nnen die Dateien kategorisiert werden. Die hochgeladenen Dateien k&ouml;nnen so verwaltet werden, wie dies ein Administrator k&ouml;nnte.</p> 
<h3>Wie wird es eingesetzt ?</h3>
<p><strong>Achtung</strong> - Die Funktionsf&auml;higkeit dieses Moduls ist von verschiedenen Werten Ihrer PHP-Konfiguration wie zum Beispiel php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize und max_execution_time abh&auml;ngig. Unter Umst&auml;nden m&uuml;ssen diese Werte f&uuml;r die Funktionsf&auml;higkeit dieses Moduls angepasst werden. Sie sollten daher gegebenenfalls Kontakt mit Ihrem Provider aufnehmen, um diese Einstellungen entsprechend Ihren Bed&uuml;rfnissen anzupassen.</p>
<p>Um den Besuchern Ihrer Seite das Hochladen von Dateien zu erlauben, sollten Sie das Modul zun&auml;chst installieren und dann eine oder mehrere Kategorien (=Verzeichnisse) f&uuml;r die hochzuladenden Dateien erstellen. Dann f&uuml;gen Sie den Tag {cms_module module=&quot;Uploads&quot; category=&quot;Kategorie&quot; mode=&quot;Modus&quot;} in eine Seite oder ein Template ein, wobei Modus jeweils einem der unten aufgef&uuml;hrten Modi entspricht. Je nach ausgew&auml;hltem Modus werden unterschiedliche Informationen ausgegeben.</p>
<p>Dieses Modul kann optional das FrontendUser-Modul verwenden, um Informationen &uuml;ber die aktuell angemeldeten Benutzer zu erhalten, die dann in das Formular beim Hochladen von Dateien eingetragen werden.</p>
<h3>Berechtigungen</h3>
<ul>
<li>Die Berechtigung <em>Manage Uploads</em> wird ben&ouml;tigt, um die Kategorien und die darin befindlichen Dateien zu verwalten.</li>
<li>Die Berechtigung <em>Modify Templates</em>  wird ben&ouml;tigt, um Templates zu bearbeiten.</li>
<li><em>Modify Site Preferences</em> diese Berechtigung wird ben&ouml;tigt, um dateibezogene Einstellungen zu ver&auml;ndern.</li>
</ul>
<h3>Kategorie-&Uuml;bersicht</h3>
<p>Wenn Sie einen Tag wie etwa {cms_module module=&quot;Uploads&quot; action=&quot;categorysummary&quot; template=&quot;summarytemplate&quot; sortorder=&quot;name_asc&quot; listingtemplate=&quot;listtemplate&quot; listingsortorder=&quot;listsortorder&quot;} verwenden, wird eine interaktive Kategorien-&Uuml;bersicht angezeigt. Die Sortierreihenfolge (sortorder) kann sein: name_asc (aufsteigend nach Namen), name_desc (absteigend nach Namen), summ_asc (aufsteigend nach der Zusammenfassung), summ_desc (absteigend nach der Zusammenfassung) oder random (zuf&auml;llige Auswahl).
Die Parameter f&uuml;r listingtemplate und listingsortorder sind identisch mit den template- und sortorder-Parametern des Zusammenfassungsmodus.</p>
<h3>Emailversand</h3>
<p>Mit diesem Modul ist es m&ouml;glich, eine Email zu versenden, wenn immer eine Datei hochgeladen wurde. Schauen Sie hierzu in die Einstellungen. Daf&uuml;r muss das <b>CMSMailer</b>-Modul installiert und konfiguriert sein. Diese M&ouml;glichkeit ist nur <em>optional</em>. Wenn das CMSMailer-Modul nicht installiert ist, wird dem User nichts angezeigt, sondern nur ein Eintrag im Logbuch des Administrators erstellt.</p>
<h3>Systemeinstellungen</h3>
<p><b>Hinweis:</b> Das Modul umgeht nicht die Beschr&auml;nkungen hinsichtlich der Dateigr&ouml;&szlig;e in PHP. Es funktioniert nur in Verbindung mit diesem. Wenn Sie gr&ouml;&szlig;ere Dateien zum Hochladen zulassen m&ouml;chten, m&uuml;ssen Sie Ihre php.ini-Datei und/oder httpd.conf Datei(en) sowie die Voreinstellungen des Moduls entsprechend bearbeiten.
<h4>Hinweise f&uuml;r den Apache-Server</h4>
<p>Um das Hochladen von gr&ouml;&szlig;eren Dateien zu erlauben, m&uuml;ssen Sie den Parameter upload_max_filesize in ihrer php.ini bearbeiten. Zus&auml;tzlich muss der Parameter LimitRequestBody in Ihrer Apache-Konfiguration an den Parameter upload_max_filesize angepasst werden.</p>
<p>Hinweis:  der Parameter upload_max_filesize kann in Bytes, Kilobytes oder Megabytes angegeben werden, w&auml;hrenddessen der Parameter LimitRequestBody nur in Bytes festgelegt werden kann.</p>';
$lang['id'] = 'ID';
$lang['installed'] = 'Modulversion %s installiert.';
$lang['ip_address'] = 'IP-Adresse';
$lang['moddescription'] = 'Ein Modul, welches den Benutzern das Hochladen und das Verwalten von Dateien erm&ouml;glicht.';
$lang['name'] = 'Name ';
$lang['renamemessage'] = '&Auml;ndern Sie hier den Namen, um die Datei umzubenennen';
$lang['path'] = 'Pfad';
$lang['pathmessage'] = '&Auml;ndern Sie hier die Kategorie, um die Datei in ein anderes Verzeichnis zu verschieben.';
$lang['pathinuploads'] = '(relativ zum /uploads Verzeichnis)';
$lang['postinstall'] = '<p>Das Uploads-Modul wurde erfolgreich installiert. Stellen Sie sicher, dass zur Verwendung dieses Moduls die Berechtigung &quot;Manage Uploads&quot; gesetzt wurde!</p>
<p><strong>Achtung</strong> - Die Funktionsf&auml;higkeit dieses Moduls ist von verschiedenen Werten Ihrer PHP-Konfiguration wie zum Beispiel php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize und max_execution_time abh&auml;ngig. Unter Umst&auml;nden m&uuml;ssen diese Werte f&uuml;r die Funktionsf&auml;higkeit dieses Moduls angepasst werden. Sie sollten daher gegebenenfalls Kontakt mit Ihrem Provider aufnehmen, um diese Einstellungen entsprechend Ihren Bed&uuml;rfnissen anzupassen.</p>';
$lang['postuninstall'] = 'Das Uploads-Modul wurde entfernt. Es wurden keine Dateien aus dem /uploads-Verzeichnis entfernt oder besch&auml;digt.';
$lang['preferences'] = 'Einstellungen';
$lang['prefsupdated'] = 'Moduleinstellungen aktualisiert.';
$lang['prompt_categorydesc'] = 'Beschreibung';
$lang['prompt_categorylistable'] = 'Die Dateien in diesem Verzeichnis k&ouml;nnen angezeigt werden.';
$lang['prompt_categoryname'] = 'Name der Kategorie';
$lang['prompt_categorypath'] = 'Serverpfad';
$lang['prompt_deletedirectory'] = 'Kategorieverzeichnis l&ouml;schen?';
$lang['prompt_max_uploadsize'] = 'Maximal erlaubte Dateigr&ouml;&szlig;e (Kb)';
$lang['prompt_valid_uploadextensions'] = 'G&uuml;ltige Dateinerweiterungen';
$lang['scan'] = 'Scannen';
$lang['selectcategory'] = 'Kategorie ausw&auml;hlen';
$lang['size'] = 'Gr&ouml;&szlig;e';
$lang['sizekb'] = 'Gr&ouml;&szlig;e (Kb)';
$lang['submit'] = 'Absenden';
$lang['summary_template'] = 'Zusammenfassungs-Template';
$lang['summary'] = 'Zusammenfassung';
$lang['title_admin_panel'] = 'Uploads-Modul';
$lang['title_mod_admin'] = 'Modul-Administration';
$lang['title_mod_prefs'] = 'Moduleinstellungen';
$lang['title_subnet_exclusions'] = 'Subnets von der Statistik ausschlie&szlig;en';
$lang['title_valid_uploadextensions'] = 'G&uuml;ltige Namenserweiterungen';
$lang['uninstalled'] = 'Modul deinstalliert.';
$lang['upgraded'] = 'Modul auf Version %s aktualisiert.';
$lang['upload'] = 'Hochladen';
$lang['uploaded'] = 'Die Datei %s wurde von %s hochgeladen.';
$lang['replaced'] = 'Die Datei %s wurde durch %s ersetzt.';
$lang['deleted'] = 'Die Datei %s wurde gel&ouml;scht.';
$lang['uploadform_template'] = 'Template hochladen';
$lang['username'] = 'Benutzername';
$lang['warning_deletecategory'] = 'WARNUNG: Seien Sie vorsichtig, wenn Sie Kategorien l&ouml;schen. Die Dateien k&ouml;nnen dabei verloren gehen.';
$lang['qca'] = 'P0-791661323-1267013541670';
$lang['utma'] = '156861353.995922747.1267014547.1267014547.1267014547.1';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1267014547.1.1.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/project/files/647|utmcmd=referral';
?>