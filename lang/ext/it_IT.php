<?php
$lang['prompt_category_scannable'] = 'Scansione automatica di questa categoria per nuovi file?';
$lang['info_category_scannable'] = 'Quando accede dal front end questa categoria &egrave; automaticamente scansionata per nuovi file';
$lang['prompt_tl_access'] = 'Accesso limitato nel tempo';
$lang['prompt_allow_upload_sendfile'] = 'Allow sending files immediately on admin upload';
$lang['msg_auto_delete_file'] = 'Automaticamente cancella i file scaduti: %s';
$lang['msg_auto_delete_file_failed'] = 'Problemi di permessi, auto-cancellazione di %s fallita';
$lang['info_category_expires_hrs'] = 'Specifica un numero di ore prima che i file di questa categoria possono essere cancellati. Usate un valore di 0 per indicare che i file non dovrebbero essere cancellati';
$lang['prompt_category_expires_hrs'] = 'Number of hours until files in this category are automatically deleted';
$lang['info_dflt_category_expiry'] = 'The default value for new categories that specifies how long files in this category exist before they are automatically deleted.  Use a value of 0 to indicate no deletion';
$lang['title_category_expiry'] = 'Periodo di scadenza della Categoria <em>(ore)</em>';
$lang['info_categorydeletable'] = 'Authorized users will have permission to delete these files.  This means that a url will be provided in the appropriate templates to allow deleting of the file.  A website developer can use appropriate smarty logic to show a link to authorized users.';
$lang['copy_files'] = 'Copia file';
$lang['error_filetoolarge'] = 'The file you attempted to uploade is larger than the CMSMS maximum upload file size';
$lang['areyousure_deletecategory'] = 'Siete sicuro di voler cancellare questa categoria?';
$lang['error_delete'] = 'An item cound not be deleted (%s)';
$lang['confirm_cat_multiaction'] = 'Are you sure you want to perform this action on the selected categories?';
$lang['error_nothing_selected'] = 'Errore: Niente &egrave; selezionato';
$lang['with_selected'] = 'With Selected:';
$lang['error_replace_mismatched_fileext'] = 'When replacing a file, you must upload a file of the same exact type (by file extension).  The file you selected does not match that of the original file.';
$lang['replace'] = 'Replace';
$lang['info_replacefile'] = 'You may upload a replacement file, if the file is an image type, and you have not specified a replacement thumbnail, a new thumbnail will be generated';
$lang['prompt_replacefile'] = 'Upload replacement file';
$lang['title_fixspaces'] = 'Fix spaces in the filename';
$lang['category_copied'] = 'Category successfully copied';
$lang['error_duplicatepath'] = 'Please specify a directory name that is different from the source, and is not already in use';
$lang['operation_cancelled'] = 'Operazione cancellata';
$lang['source'] = 'Sorgente';
$lang['destination'] = 'Destinazione';
$lang['prompt_copy_files'] = 'Copy category Files';
$lang['info_copy_files'] = 'Copy the files from the source category to the destination category';
$lang['extra'] = 'Extra';
$lang['copy'] = 'Copia';
$lang['selectone'] = 'Seleziona uno';
$lang['autowatermark'] = 'Automaticall place watermarks on images';
$lang['image_settings'] = 'Image Settings';
$lang['prompt_getfile_resultpage'] = 'Page to use for errors or other messages related to file downloading';
$lang['error_invalid_key'] = 'The upload key specified is invalid (maybe it has reached its maximum download capacity or has expired)';
$lang['dflt_timelimited_subject'] = '{$sitename} - You have been granted access to {$entry->name|strip_tags} for a limited time';
$lang['prompt_timelimited_subject'] = 'Subject for email created when sending a time limited URL';
$lang['prompt_timelimited_autodelete'] = 'Auto delete expired entries after N hours <em>(specify 0 to disable autodelete)</em>:';
$lang['prompt_timelimited_sendit'] = 'Send this url to the designated email address?';
$lang['url_key'] = 'URL Key';
$lang['created'] = 'Creato';
$lang['expires'] = 'scaduto';
$lang['addedit_timelimited_key'] = 'Add/Edit Time Limited Key';
$lang['time_limited_key_added'] = 'Time Limited Key Added';
$lang['num_hours'] = 'Numero di ore';
$lang['num_downloads'] = 'Number of Downloads';
$lang['email_address'] = 'Email Address';
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
$lang['general_settings'] = 'General Settings';
$lang['thumbnail_settings'] = 'Thumbnail Generation';
$lang['title_redirect_on_sendfile'] = 'Page to redirect to after sending a file';
$lang['lbl_back'] = 'Back';
$lang['lbl_templates'] = 'Modify Templates';
$lang['prompt_public_field'] = 'Field is public <em>(can be viewed by site visitors)</em>';
$lang['upload_edited'] = 'File Details Edited on %s';
$lang['info_thumbnail'] = 'Un file di anteprima opzionale';
$lang['upload_file'] = 'Upload a new file';
$lang['msg_field_deleted'] = 'Field deleted';
$lang['ask_delete_field'] = 'Are you sure you want to delete this field definition and all associated values?';
$lang['yes'] = 'S&igrave;';
$lang['no'] = 'No';
$lang['type'] = 'Tipo';
$lang['fieldtype_multiselect'] = 'Multiselect List';
$lang['fieldtype_dropdown'] = 'Dropdown List';
$lang['fieldtype_checkbox'] = 'Checkbox';
$lang['fieldtype_textarea'] = 'Text Area';
$lang['fieldtype_textinput'] = 'Text Input';
$lang['prompt_use_wysiwyg'] = 'Use the wysiwyg when editing the value for this field';
$lang['prompt_default_content'] = 'Default content for text area';
$lang['prompt_dropdown_options'] = 'Options (one entry per line)';
$lang['prompt_field_maxlength'] = 'Lunghezza massima del campo';
$lang['prompt_field_length'] = 'Lunghezza del campo';
$lang['prompt_field_type'] = 'Tipo di campo';
$lang['prompt_field_name'] = 'Nome campo';
$lang['title_add_field'] = 'Add or Edit a Field Definition';
$lang['field_definitions'] = 'Definizioni del campo';
$lang['prompt_add_field'] = 'Aggiungere una definizione del campo';
$lang['param_action'] = 'Specifica il comportamento del modulo tag. Possibili valori sono: default - (il comportamrnto predefinito), detail - per visualizzare il dettaglio di un singolo file basato sul upload_id e yousendit -  per visualizzare un form per permetter l&#039;upload di un file e spedirlo a numerosi indirizzi in un singolo passo';
$lang['param_sendfilepage'] = 'Specifica la pagina id o alias di pagina che dovrebbe essere usata per spedire un file';
$lang['file_uploaded'] = 'File Successfully Uploaded';
$lang['to'] = 'A';
$lang['title_yousenditform_template'] = 'Aggiunge o Modifica un &quot;You Send It&quot; Form Template';
$lang['yousenditform_template'] = 'YouSendIt Form Templates';
$lang['title_yousenditform_sysdefault'] = 'Template predefinito &quot;You Send It&quot;';
$lang['msg_file_sent'] = 'Un messaggio &egrave; stato spedito agli indirizzi selezionati che contengono informazioni circa il file e come poterlo recuperarlo.';
$lang['error_noaddresses'] = 'Voi dovete inserire almeno un indirizzo di destinazione';
$lang['error_nosubject'] = 'Voi dovete inserire un oggetto';
$lang['subject'] = 'Oggetto';
$lang['title_sendfilepage'] = 'Page for &quot;Send a File&quot; form';
$lang['file_info'] = 'Informazioni sul File';
$lang['send'] = 'Spedire';
$lang['notes'] = 'Note';
$lang['addressees'] = 'Spedisce informazioni su questo file a';
$lang['prompt_sendfile_email_template'] = '&quot;Spedisci un File&quot; Template Email';
$lang['title_sendfileform_template'] = 'Aggiunge o Modifica un &quot;Spedisci un File&quot; Form Template';
$lang['sendfileform_template'] = '&quot;Spedisci un File&quot; Form Template';
$lang['prompt_notify_email_template'] = 'Email Template del File notificazione di upload';
$lang['title_sendfileform_sysdefault'] = 'Template predefinito &quot;Spedisci un File&quot;';
$lang['prompt_categorydeletable'] = 'File in questa categoria possono essere cancellati';
$lang['title_allow_delete'] = 'Permette la cancellazione di file dal frontend';
$lang['default_templates'] = 'Template predefiniti';
$lang['firstpage'] = 'Prima pagina';
$lang['prevpage'] = 'Pagina precedente';
$lang['nextpage'] = 'Pagina seguente';
$lang['lastpage'] = 'Ultima pagina';
$lang['firstpage_arrow'] = '<<';
$lang['prevpage_arrow'] = '<';
$lang['nextpage_arrow'] = '>';
$lang['lastpage_arrow'] = '>>';
$lang['page'] = 'Pagina';
$lang['of'] = 'di';
$lang['prompt_grouplist'] = 'Gruppi FEU autorizzati';
$lang['info_grouplist'] = 'Seleziona il gruppi FEU permessi ad accedere ai files in questa categoria. Deseleziona tutto per permettere l&#039;accesso a tutti';
$lang['title_scan'] = 'Scan per nuovi files in questa categoria';
$lang['title_create_thumbnails'] = 'Crea Miniature mancanti per i files in questa categoria.';
$lang['create_thumbnails'] = 'Crea Miniature';
$lang['title_create_thumbnail'] = '(re)Crea la Miniatura per questo file';
$lang['create_thumbnail'] = 'Crea Miniatura';
$lang['error_patherror'] = 'Non posso aprire la directory (problemi di permessi?)';
$lang['title_download_chunksize'] = 'Dimensione del pezzo di ciascun download';
$lang['info_download_chunksize'] = 'Modificando questo parametro avr&agrave; effetto sulla velocit&agrave; di download, e pu&ograve; aiutare in un ambienti con poca memoria';
$lang['warning_safe_mode'] = 'PHP safe mode &egrave; abilitato. Questo pu&ograve; causare problemi con uploading (permessi), ed interferire con l&#039;abilit&agrave; di questo modulo di spedire files per la non possibilit&agrave; di sovrascrivere alcuni settaggi. Siete avvisati di contattare il Vostro provider per vedere di disabilitare il safe mode.';
$lang['param_detailpage'] = 'Utile per visualizzare un report dettagliato usando una pagina (eventualmente con altro Modello) differente, questo parametro prende id o alias di pagina che dovrebbe essere usata per visualizzare il report di dettaglio';
$lang['param_prefix'] = 'Un booleano che indica se i nomi dei file dovrebbero essere prefissati';
$lang['param_prefix_feu'] = 'Un booleano che indica  che il prefisso dovrebbe essere preso dall&#039;autore corrente, se non specificato, il prefisso &egrave; il tempo corrente (in formato dechex)';
$lang['param_nocaptcha'] = 'Disabilita il supporto captcha (attivo di default) nel modulo di upload';
$lang['title_uploadform_template'] = 'Modifica il Modello del Modulo di Upload';
$lang['captcha_title'] = 'Inserite il testo contenuto nell&#039;immagine';
$lang['error_captchamismatch'] = 'Il testo inserito non corrisponde con l&#039;immagine visualizzata';
$lang['title_autothumbnail_extensions'] = 'Crea anteprime per i file con queste estensioni';
$lang['title_autothumbnail_size'] = 'Dimensione massima (in pixel) dell&#039;anteprima generata';
$lang['prompt_upload_icon'] = 'Carica un Icona';
$lang['info_sysdefault'] = 'Questo testo viene usato quando si crea un nuovo modello di questo tipo';
$lang['title_detailrpt_sysdefault'] = 'Default di Sistema del Modello di Rapporto Dettagli';
$lang['title_summaryrpt_sysdefault'] = 'Default di Sistema del Modello di Rapporto Sommario';
$lang['title_uploadform_sysdefault'] = 'Default di Sistema del Modello del Modulo di upload';
$lang['template'] = 'Modello';
$lang['resettodefault'] = 'Ripristina valori predefiniti';
$lang['title_summaryrpt_template'] = 'Modello di Rapporto Sommario';
$lang['title_detailrpt_template'] = 'Modello di Rapporto Dettagli';
$lang['prompt_name'] = 'Nome';
$lang['prompt_default'] = 'Predefinito';
$lang['legend_uploadform'] = 'Carica un File';
$lang['error_missingparam'] = 'Manca un parametro essenziale';
$lang['error_missingname'] = 'Deve essere specificato un nome per il file';
$lang['error_missingextensions'] = 'Deve essere specificata almeno un&#039;estensione di file';
$lang['error_missingicon'] = 'Deve essere specificata un&#039;icona';
$lang['error_nosuchrow'] = 'Non &egrave; possibilie trovare la riga specificata ';
$lang['name_unknown'] = 'Sconosciuto';
$lang['description_unknown'] = 'Descrizione del tipo di file per file non corrispondenti';
$lang['image'] = 'Immagine';
$lang['icon'] = 'Icona';
$lang['extensions'] = 'Estensione File';
$lang['addfiletype'] = 'Aggiungi un Nuovo Tipo di File';
$lang['file_types'] = 'Tipi di File';
$lang['error_nocategoryid'] = 'Nessun ID di Categoria fornito';
$lang['error_nocategory'] = 'Nessun ID di Categoria fornito';
$lang['error_templatenameexists'] = 'Esiste gi&agrave; un modello con lo stesso nome';
$lang['prompt_templatename'] = 'Nome Modello';
$lang['prompt_template'] = 'Modello';
$lang['prompt_newtemplate'] = 'Crea un nuovo Modello';
$lang['help_OnDownload'] = '<p>Un evento generato qiando un utente termina il download di un file</p>
<h4>Parametri</h4>
<ul>
<li><em>id</em> - ID di Upload</li>
<li><em>name</em> - Nome file</li>
<li><em>ip</em> - L&#039;indirizzo IP di chi effettua il download</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '<p>Un evento generato quando viene cancellata una Categoria</p>
<h4>Parametri</h4>
<ul>
<li><em>name</em> - Nome Categoria</li>
<li><em>path</em> - Percorso della Categoria</li>
</ul>
';
$lang['help_OnCreateCategory'] = '<p>Un evento generato quando viene creata una Categoria</p>
<h4>Parametri</h4>
<ul>
<li><em>name</em> - Il nome della categoria</li>
<li><em>description</em> - La descrizione della categoria</li>
<li><em>path</em> - Il percorso della categoria</li>
<li><em>path</em> - Un opzione che indica se la categoria &egrave; elencabile</li>
</ul>
';
$lang['help_OnRemove'] = '<p>Un evento generato quando un file viene rimosso tramite l&#039;interfaccia amministratore o utente</p>
<h4>Parametri</h4>
<ul>
<li><em>name</em> - Il nome del file rimosso</li>
<li><em>id</em> - L&#039;id del file rimosso</li>
<li><em>category_id</em> - L&#039;id della categoria</li>
</ul>
';
$lang['help_OnUpload'] = '<p>Un evento generato quando un file viene caricato tramite l&#039;interfaccia amministratore o utente</p>
<h4>Parametri</h4>
<ul>
<li><em>category</em> - Il nome della categoria</li>
<li><em>name</em> - Il nome del file caricato</li>
<li><em>size</em> - La dimensione del file caricato</li>
<li><em>summary</em> - La descrizione breve del file caricato (pu&ograve; essere vuota)</em></li>
<li><em>description</em> - La descrizione completa per il file caricato (pu&ograve; essere vuota)</em></li>
<li><em>author</em> - L&#039;autore del file caricato (se disponibile)</em></li>
<li><em>ip_address</em> - L&#039;indirizzo internet del client che ha caricato il file</li>
</ul>
';
$lang['info_event_ondeletecategory'] = 'Evento generato dopo la cancellazione di una categoria';
$lang['info_event_oncreatecategory'] = 'Evento generato dopo la creazione di una categoria';
$lang['info_event_ondownload'] = 'Evento generato dopo lo scaricamento di un file';
$lang['info_event_onupload'] = 'Evento generato dopo il caricamento di un nuovo file';
$lang['info_event_onremove'] = 'Evento generato quando un file viene rimosso';
$lang['title_usertag_onupload'] = 'Tag definito dall&#039;utente da invocare al termine del caricamento file';
$lang['none'] = 'Nessuno';
$lang['matchesfound'] = 'Corrispondenze trovate';
$lang['filter'] = 'Filtro';
$lang['title_redirectonupload'] = 'Redireziona all&#039; id/alias della pagina al caricamento dell&#039;utente';
$lang['details'] = 'Dettagli';
$lang['confirm_preferences'] = 'Siete certi di volere correggere le preferenze?';
$lang['error_nofilesuploaded'] = 'Nessun file caricato.';
$lang['prompt_replace'] = 'Permetti Sovrascrittura';
$lang['info_replace'] = 'Sostituisci qualsiasi file con lo stesso nome (non modifica l&#039;ID)';
$lang['param_no_initial'] = 'Non mostra nessun risultato iniziale quando il filtro &egrave; attivato';
$lang['param_key'] = 'Fornisce una chiave aggiuntiva al modulo per una successiva organizzazione degli upload.  Questa chiave pu&ograve; essere una stringa codificata come: &#039;feusers:uid&#039;, etc.  Questo parametro solitamente &egrave; necessario solo quando viene incorporato il modulo Uploads in un altro modulo';
$lang['param_noauthor'] = 'Nasconde il campo autore dal modulo di Upload. Questo parametro &egrave; valido solo quando &egrave; impostato mode=&#039;upload&#039;.  Se presente il modulo FrontendUsers e un utente &egrave; attualmente loggato, il nome utente verr&agrave; conservato in un campo nascosto';
$lang['param_upload_id'] = 'upload_id=&quot;id&quot; - specifica un file singolo per le modalit&agrave; url/link o singolo (sopra)';
$lang['param_detailtemplate'] = 'Utilizzare un modello con questo nome per il rapporto dettagliato.';
$lang['param_template'] = 'Utilizzare un modello con questo nome per questo rapporto o modulo. Questo modello inserisce automaticamente un modello con il nome corrispondente dalla lista appropriata basata sulla modalit&agrave; specificata';
$lang['param_filter'] = 'Visualizza il modulo di filtraggio';
$lang['param_no_intitial'] = 'E&#039; utile solo quando il parametro filtro viene fornito, o &egrave; attivo come valore predefinito, questo parametro indica se debbanno essere restituiti i valori iniziali';
$lang['param_filetypes'] = 'Visualizza solo i file il cui tipo corrisponde con questa lista separata da virgola';
$lang['param_sortorder'] = '  <p>Tipi di ordinamento
  <ul>
  <li><em>date_asc</em> - Ordina per data ascendente</li>
  <li><em>date_desc</em> - Ordina per data discendete</li>
  <li><em>name_asc</em> - Ordina per nome ascendente</li>
  <li><em>name_desc</em> - Ordina per nome discendente</li>
  <li><em>size_asc</em> - Ordina per dimensione ascendente</li>
  <li><em>size_desc</em> - Ordina per dimensione discendente</li>
  <li><em>desc_asc</em> - Ordina per descrizione ascendente</li>
  <li><em>desc_desc</em> - Ordina per descrizione discendente</li>
  <li><em>author_asc</em> - Ordina per autore ascendente</li>
  <li><em>author_desc</em> - Ordina per autore discendente</li>
  <li><em>ip_asc</em> - Ordina per indirizzo ip ascendente</li>
  <li><em>ip_desc</em> - Ordina per indirizzo ip discendente</li>
  <li><em>random</em> - Ordine casuale</li>
  </ul>
  </p>';
$lang['param_listingtemplate'] = 'Template usato per la lista delle categorie dopo la pagina Sommario Categoria';
$lang['param_listingsortorder'] = 'Ordinamento (come param_sortorder) usato per la lista delle categorie dopo la pagina Sommario Categoria';
$lang['param_fileextensions'] = 'file_extensions=&quot;ext1,ext2,ext3&quot;
<p>valido solo con mode=upload, questo parametro limita i tipi di file che possono essere caricati.  Sovrascrive qualsiasi impostazione nelle preferenze del modulo.</p>';
$lang['param_count'] = 'count=&quot;N&quot;
<p>Un parametro per elencare solo i primi N risultati della query.  L&#039;impaginazione sarebbe migliore, ma per ora questo risolver&agrave; il problema.</p>';
$lang['param_category'] = 'category=&quot;name&quot;
<p><b>Nota:</b> La Categoria pu&ograve; essere &quot;all&quot;, che elencher&agrave; tutti gli upload da tutte le categirie <em>elencabili</em></p>';
$lang['param_mode'] = '  <ul>
  <li><em>detailed</em> - Visualizza un elenco dettagliato di tutti i file nella categoria</li>
  <li><em>upload</em> - Visualizza un modulo che permetta ad un Utente Frontend di caricare un file</li>
  <li><em>url <i>or</i> link</em> - Visualizza il link ad un file</li>
  <li><em>summary</em> - Visualizza una lista a sommario di tutti i file nella categoria</li>
  <li><em>single</em> - Visualizza un rapporto dettagliato su un upload singolo</li>
  </ul>';
$lang['param_selectform'] = 'When using the &#039;select&#039; mode, this parameter is the formid of the parent form.  Used to handle parameter passing';
$lang['param_selectname'] = 'when using the &#039;select&#039; mode, this parameter specifies the name of the field';
$lang['param_selectvalue'] = 'When using the &#039;select&#039; mode, this parameter specifies the default field value';
$lang['param_selectnone'] = 'When using the &#039;select&#039; mode, this parameter specifies wether &#039;none&#039; is a valid choice.';
$lang['returntomodule'] = 'Torna al pannello del modulo';
$lang['error_nocategories'] = 'Non ci sono categorie definite';
$lang['title_enforceextensions'] = 'Estensione necessaria per tutti i file caricati';
$lang['restoredefaultsconfirm'] = 'Questa operazione ripristiner&agrave; il modello al predefinito di sistema. Ogni modifica fatta verr&agrave; persa.  Siete certi di volere procedere?';
$lang['thumbnail'] = 'Anteprima';
$lang['newthumbnail'] = 'Upload nuova Miniatura';
$lang['info_summary'] = 'Una breve descrizione del file (se vuoto, il nome del file viene utilizzato senza estensione)';
$lang['info_categoryname'] = 'Un nome breve per la vostra categoria (leggibile)';
$lang['info_categorydesc'] = 'Una descrizione per la vostra categoria';
$lang['info_categorypath'] = 'Il nome della cartella dentro la cartella di upload che verr&agrave; utilizzata per contenere i file di questa categoria. Se la cartella con questo nome non esiste pu&ograve; essere creata.';
$lang['info_destname'] = 'Utilizza il campo &#039;Upload As&#039; (Carica Come) per modificare il nome del file nel caricamento.  Lasciate vuoto per mantenere lo stesso nome di file.';
$lang['error_cantcreatedirectory'] = 'Non posso creare la cartella';
$lang['error_nomailermodule'] = 'Non riesco a inizializzare il modulo CMSMailer';
$lang['upload_notification'] = 'E&#039; stato caricato un nuovo file';
$lang['title_email_on_upload'] = 'Invia notifica di upload a:';
$lang['email_template'] = 'Modello di E-mail';
$lang['title_dummy_index_html'] = 'Creare un file index.html in ogni cartella?Create dummy index.html files in each directory?<br/><em>Ogni file index.html esistente verr&agrave; conservato</em>';
$lang['about'] = 'Informazioni su';
$lang['error_permissiondenied'] = 'Accesso Negato. Verificate i vostri permessi.';
$lang['error_couldnotwrite'] = 'Non posso scrivere';
$lang['addcategory'] = 'Aggiungi Categoria';
$lang['all'] = 'Tutto';
$lang['areyousure'] = 'Siete Sicuri?';
$lang['author'] = 'Autore';
$lang['cancel'] = 'Annulla';
$lang['cannotmodifypath'] = '(Il percorso non pu&ograve; essere modificato)';
$lang['categories'] = 'Categorie';
$lang['category'] = 'Categoria';
$lang['message_categoryadded'] = 'Categoria aggiunta con successo';
$lang['date'] = 'Data';
$lang['dateuploaded'] = 'Data Caricamento';
$lang['default'] = 'Valori predefiniti';
$lang['delete'] = 'Elimina';
$lang['description'] = 'Descrizione';
$lang['destname'] = 'Carica Come';
$lang['detail_template'] = 'Modello Dettagli';
$lang['downloaded'] = 'Il file %s &egrave; stato scaricato.';
$lang['downloads'] = 'Download';
$lang['edit'] = 'Modifica';
$lang['editcategory'] = 'Modifica Categoria';
$lang['editupload'] = 'Modifica Upload';
$lang['error'] = 'Errore!';
$lang['error_pathinuse2'] = 'A category using the path (%s) already exists';
$lang['error_pathinuse'] = 'E&#039; gi&agrave; presente una categoria che utilizza questo percorso';
$lang['error_categoryexists2'] = 'Errore: Nome Categoria %s gi&agrave; esiste';
$lang['error_categoryexists'] = 'Errore: la Categoria esiste gi&agrave;';
$lang['error_categorynotempty'] = 'Errore! Non posso eliminare una categoria che non sia vuota';
$lang['error_categorynotfound'] = 'Errore: Categoria non trovata!';
$lang['error_dberror'] = 'Errore: Errore del Database!';
$lang['error_emptycategory'] = 'Errore: Catgoria vuota!';
$lang['error_emptypath'] = 'Errore: Percorso vuoto!';
$lang['error_fileexists'] = 'Errore! Il file %s &egrave; gi&agrave; presente.';
$lang['error_filenotfound'] = 'Errore! Non &egrave; possibile trovare il file %s.';
$lang['error_insufficientparams'] = 'Errore: Parametri insufficienti passati al modulo!';
$lang['error_invalidauthor'] = 'Errore: Autore non valido (o vuoto).';
$lang['error_invalidcategory'] = 'Errore: Categoria non valida (o vuota).';
$lang['error_invaliddescription'] = 'Errore: Descrizione non valida (o vuota).';
$lang['error_invalidfile'] = 'Errore: Nome File non valido (o vuoto).';
$lang['error_invaliduploadfilename'] = 'Errore: File con questo nome (probabilmente l&#039;estensione) non sono consentiti (%s).';
$lang['error_invaliduploadid'] = 'Errore: id di caricamento non valido';
$lang['error_nofiles'] = 'Errore: Nessun File Corrispondente!';
$lang['files'] = 'File';
$lang['fixme'] = 'Correggi Spazi';
$lang['friendlyname'] = 'Gestione di Frontend dei File (Modulo Uploads)';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>It is a module for allowing people to upload and download files to and from your site.  It keeps track of who uploaded a file, and who has downloaded it.  As well, you can sort files into categories, and manage the files that were uploaded like every administrator would do</p> 
<h3>How Do I Use It</h3>
<p><strong>Warning</strong> - The proper behaviour of this module depends on numerous php configuration variables.  These include <em>(but are not limited to)</em>, php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize, and max_execution_time.  These variables may need adjustment for this module to work properly on your site.  It is advised that you work with your system administrator or host provider to tune these settings for your requirements.</p>
<p>To use this module, to allow users to upload files to your site, you should install the module, and then create one or more categories (a.k.a) directories for the uploaded files to go into. Then add a tag into a page or template somewhere like {cms_module module=&quot;Uploads&quot; category=&quot;somecategory&quot; mode=&quot;somemode&quot;}.  Where mode matches one of the modes listed below.  The output will differ depending upon which mode you select.</p>
<p>This module can use the FrontendUsers module (optional) to get information about any currently logged in users to partly fill in the form when uploading files;</p>
<h3>Permissions</h3>
<ul>
<li><em>Manage Uploads</em> permission is needed to manage categories, and the files within them.</li>
<li><em>Modify Templates</em> permission is needed edit any of the templates.</li>
<li><em>Modify Site Preferences</em> permission is needed any of the file settings.</li>
</ul>
<h3>Category Browsing</h3>
<p>Placing a tag like {cms_module module=&quot;Uploads&quot; action=&quot;categorysummary&quot; template=&quot;summarytemplate&quot; sortorder=&quot;name_asc&quot; listingtemplate=&quot;listtemplate&quot; listingsortorder=&quot;listsortorder&quot;}
allows you to display an interactive category browser. sortorder can be: name_asc, name_desc, summ_asc, summ_desc, or random.
listingtemplate and listingsortorder are identical to the template and sortorder parameters for
the &quot;summary&quot; mode.</p>
<h3>Emailing</h3>
<p>This module is capable of sending an email whenever a file is uploaded, see the preferences tab.  However, to do this the <b>CMSMailer</b> package must be installed and configured.  This is an <em>optional</em> step, and if the CMSMailer module is not installed, nothing will be displayed to the user, only a log message will be placed into the admin log</p>
<h3>System Settings</h3>
<p><b>Note:</b> This module does not bypass or get past any file size limitations in php.  It works in conjunction with them.  Therefore you may need to modify your php.ini file and/or your httpd.conf file(s) to allow you to upload files as large as what you have set in the uploads module preferences.</p>
<h3>Apache Notes</h3>
<p>In order to allow large file uploads, you may need to modify the upload_max_filesize parameter in your php.ini  In addition, the LimitRequestBody parameter in your apache configuration, may need to be adjusted to match the upload_max_filesize parameter</p>
<p>Note:  the upload_max_filesize parameter can be specified in bytes, kilobytes, or megabytes, however the LimitRequetBody parameter is only specified in bytes</p>';
$lang['id'] = 'ID';
$lang['installed'] = 'Versione %s del Modulo installata.';
$lang['ip_address'] = 'Indirizzo IP';
$lang['moddescription'] = 'Un modulo che permette agli utenti di caricare file, e permette a voi di gestirli.';
$lang['name'] = 'Nome';
$lang['renamemessage'] = 'Modifica il nome qui per rinominarlo';
$lang['path'] = 'Percorso';
$lang['pathmessage'] = 'Modifica la categoria qui per spostare il file in un&#039;altra cartella';
$lang['pathinuploads'] = '(Relativo alla cartella degli upload)';
$lang['postinstall'] = '<p>The uploads module has been successfully installed. Be sure to set &quot;Manage Uploads&quot; permissions to use this module!</p>
<p><strong>Warning</strong> - The proper behaviour of this module depends on numerous php configuration variables.  These include <em>(but are not limited to)</em>, php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize, and max_execution_time.  These variables may need adjustment for this module to work properly on your site.  It is advised that you work with your system administrator or host provider to tune these settings for your requirements.</p>';
$lang['postuninstall'] = 'Il modulo Uploads &egrave; stato rimosso con successo.  Nessun file &egrave; stato rimosso dalla vostra cartella di upload e l&#039;integrit&agrave; dei file &egrave; intatta';
$lang['preferences'] = 'Preferenze';
$lang['prefsupdated'] = 'Preferenze del modulo aggiornate.';
$lang['prompt_categorydesc'] = 'Descrizione';
$lang['prompt_categorylistable'] = 'I file in questa cartella possono essere elencati';
$lang['prompt_categoryname'] = 'Nome della Categoria';
$lang['prompt_categorypath'] = 'Percorso del Server';
$lang['prompt_deletedirectory'] = 'Eliminare cartella della categoria?';
$lang['prompt_max_uploadsize'] = 'Dimensione massima del file permessa (Kb)';
$lang['prompt_valid_uploadextensions'] = 'Estensioni valide per l&#039;upload';
$lang['scan'] = 'Esamina';
$lang['selectcategory'] = 'Seleziona Categoria';
$lang['size'] = 'Dimensione';
$lang['sizekb'] = 'Dimensione (Kb)';
$lang['submit'] = 'Invia';
$lang['summary_template'] = 'Modello del Sommario';
$lang['summary'] = 'Sommario';
$lang['title_admin_panel'] = 'Modulo Uploads';
$lang['title_mod_admin'] = 'Pannello di Amministrazione Modulo';
$lang['title_mod_prefs'] = 'Preferenze del Modulo';
$lang['title_subnet_exclusions'] = 'Escludere le sottoreti dalla statistiche';
$lang['title_valid_uploadextensions'] = 'Estensioni Valide';
$lang['uninstalled'] = 'Modulo Disinstallato.';
$lang['upgraded'] = 'Modulo aggiornato alla versione %s.';
$lang['upload'] = 'Carica';
$lang['uploaded'] = 'File %s caricato da %s.';
$lang['replaced'] = 'File %s sostituito da %s.';
$lang['deleted'] = 'Il File %s &egrave; stato cancellato.';
$lang['uploadform_template'] = 'Modello di Upload';
$lang['username'] = 'Username';
$lang['warning_deletecategory'] = 'ATTENZIONE: Usate cautela quando cancellate categorie. E&#039; possibile perdere file';
$lang['qca'] = 'P0-250679722-1271187168764';
?>