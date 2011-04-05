<?php
$lang['prompt_category_scannable'] = 'Skanna automatiskt denna kategori efter nya filer?';
$lang['info_category_scannable'] = 'Vid &aring;tkomst fr&aring;n front end skannas automatiskt denna kategori efter nya filer';
$lang['prompt_tl_access'] = 'Tidsbegr&auml;nsad &aring;tkomst';
$lang['prompt_allow_upload_sendfile'] = 'Till&aring;t att skicka filer direkt p&aring; admin upload';
$lang['msg_auto_delete_file'] = 'Raderade automatiskt utg&aring;ngna filer: %s';
$lang['msg_auto_delete_file_failed'] = 'R&auml;ttighetsproblem, automatisk radering av %s misslyckades';
$lang['info_category_expires_hrs'] = 'Specificera antalet timmar innan filer i denna kategori kan raderas. Anv&auml;nd v&auml;rdet 0 f&ouml;r att indikera att filer inte skall raderas.';
$lang['prompt_category_expires_hrs'] = 'Antalet timmar innan filer i denna kategori automatiskt raderas';
$lang['info_dflt_category_expiry'] = 'Standardv&auml;rdet f&ouml;r nya kategorier som specificerar hur l&auml;nge filer existerar i denna kategori innan dom automatiskt raderas. Anv&auml;nd v&auml;rdet 0 f&ouml;r att indikera att de inte skall raderas.';
$lang['title_category_expiry'] = 'Category expiry period <em>(hrs)</em>';
$lang['info_categorydeletable'] = 'Authorized users will have permission to delete these files.  This means that a url will be provided in the appropriate templates to allow deleting of the file.  A website developer can use appropriate smarty logic to show a link to authorized users.';
$lang['copy_files'] = 'Kopiera filer';
$lang['error_filetoolarge'] = 'Filen du f&ouml;rs&ouml;kte ladda upp &auml;r st&ouml;rre &auml;n CMSMSs maximala filuppladdningsstorlek';
$lang['areyousure_deletecategory'] = '&Auml;r du s&auml;ker p&aring; att du vill radera denna kategori?';
$lang['error_delete'] = 'Ett objekt kunde inte raderas (%s)';
$lang['confirm_cat_multiaction'] = '&Auml;r du s&auml;ker p&aring; att du vill genomf&ouml;ra den h&auml;r &aring;tg&auml;rden p&aring; de valda kategorierna?';
$lang['error_nothing_selected'] = 'Fel: Inget valdes';
$lang['with_selected'] = 'Med vald:';
$lang['error_replace_mismatched_fileext'] = 'N&auml;r du ers&auml;tter en fil m&aring;ste du ladda upp en fil av exakt samma typ (fil&auml;ndelse). Filen du valde matchar inte originalfilen.';
$lang['replace'] = 'Ers&auml;tt';
$lang['info_replacefile'] = 'You may upload a replacement file, if the file is an image type, and you have not specified a replacement thumbnail, a new thumbnail will be generated';
$lang['prompt_replacefile'] = 'Ladda upp ers&auml;ttningsfil';
$lang['title_fixspaces'] = 'Fixa mellanslag i filnamnet';
$lang['category_copied'] = 'Kategorin &auml;r nu kopierad';
$lang['error_duplicatepath'] = 'Var v&auml;nlig specificera ett katalognamn som skiljer sig fr&aring;n k&auml;llan, och som inte redan anv&auml;nds.';
$lang['operation_cancelled'] = 'Operation Cancelled';
$lang['source'] = 'K&auml;lla';
$lang['destination'] = 'M&aring;l';
$lang['prompt_copy_files'] = 'Kopiera kategori filer';
$lang['info_copy_files'] = 'Kopiera filerna fr&aring;n k&auml;llkategorin till m&aring;lkategorin';
$lang['extra'] = 'Extra';
$lang['copy'] = 'Kopiera';
$lang['selectone'] = 'V&auml;lj en';
$lang['autowatermark'] = 'Automatiskt placera ett vattenm&auml;rke p&aring; bilderna';
$lang['image_settings'] = 'Bildinst&auml;llningar';
$lang['prompt_getfile_resultpage'] = 'Sida att anv&auml;ndas f&ouml;r fel och andra meddelanden relaterade till filnerladdning';
$lang['error_invalid_key'] = 'The upload key specified is invalid (maybe it has reached its maximum download capacity or has expired)';
$lang['dflt_timelimited_subject'] = '{$sitename} - You have been granted access to {$entry->upload_name|strip_tags} for a limited time';
$lang['prompt_timelimited_subject'] = 'Subject for email created when sending a time limited URL';
$lang['prompt_timelimited_autodelete'] = 'Auto delete expired entries after N hours <em>(specify 0 to disable autodelete)</em>:';
$lang['prompt_timelimited_sendit'] = 'Skicka den h&auml;r URLen till den utsedda e-postadress?';
$lang['url_key'] = 'URL nyckel';
$lang['created'] = 'Skapad';
$lang['expires'] = 'F&ouml;rfaller';
$lang['addedit_timelimited_key'] = 'Add/Edit Time Limited Key';
$lang['time_limited_key_added'] = 'Time Limited Key Added';
$lang['num_hours'] = 'Antal timmar';
$lang['num_downloads'] = 'Antal nedladdningar';
$lang['email_address'] = 'Epost adress';
$lang['error_missing_invalid'] = 'Ett v&auml;rde som beg&auml;rdes saknas eller &auml;r ogiltig: %s';
$lang['add_timelimited_key'] = 'Add Time Limited Key';
$lang['file_info2'] = 'Fil %s (id=%d)';
$lang['info_timelimited_downloads'] = 'Specify the default number of times that a file identified by a particular key can be downloaded';
$lang['prompt_timelimited_downloads'] = 'Default Number of Downloads';
$lang['info_timelimited_hours'] = 'Specify the default number of hours that a time limited key is valid for.  Specify 0 for unlimited';
$lang['prompt_timelimited_hours'] = 'Number of hours a Time Limited Key is valid for';
$lang['timelimited_url_settings'] = 'Time Limited Key Settings';
$lang['manage_timelimited'] = 'Manage Time Limited Access';
$lang['uploading_settings'] = 'File Upload Settings';
$lang['general_settings'] = 'Allm&auml;nna inst&auml;llningar';
$lang['thumbnail_settings'] = 'Thumbnail Generation';
$lang['title_redirect_on_sendfile'] = 'Page to redirect to after sending a file';
$lang['lbl_back'] = 'Tillbaka';
$lang['lbl_templates'] = 'Redigera mallar';
$lang['prompt_public_field'] = 'Field is public <em>(can be viewed by site visitors)</em>';
$lang['upload_edited'] = 'File Details Edited on %s';
$lang['info_thumbnail'] = 'En valfri fil med tumnagelbild';
$lang['upload_file'] = 'Ladda upp en ny fil';
$lang['msg_field_deleted'] = 'F&auml;ltet raderat';
$lang['ask_delete_field'] = 'Are you sure you want to delete this field definition and all associated values?';
$lang['yes'] = 'Ja';
$lang['no'] = 'Nej';
$lang['type'] = 'Typ';
$lang['fieldtype_multiselect'] = 'Multiselect List';
$lang['fieldtype_dropdown'] = 'Listruta';
$lang['fieldtype_checkbox'] = 'Checkbox';
$lang['fieldtype_textarea'] = 'Textarea';
$lang['fieldtype_textinput'] = 'Textinmatning';
$lang['prompt_use_wysiwyg'] = 'Use the wysiwyg when editing the value for this field';
$lang['prompt_default_content'] = 'Standard inneh&aring;ll f&ouml;r textarea';
$lang['prompt_dropdown_options'] = 'Val (en post per rad)';
$lang['prompt_field_maxlength'] = 'Maximal l&auml;ngd f&ouml;r f&auml;lt';
$lang['prompt_field_length'] = 'F&auml;ltl&auml;ngd';
$lang['prompt_field_type'] = 'F&auml;lt typ';
$lang['prompt_field_name'] = 'F&auml;ltnamn';
$lang['title_add_field'] = 'Add or Edit a Field Definition';
$lang['field_definitions'] = 'F&auml;tdefinition';
$lang['prompt_add_field'] = 'L&auml;gg till en f&auml;ltdefinition';
$lang['param_action'] = 'Specifies the behaviour of the module tag.  Possible values are: default - (the defafault behavior), detail - to display a detail view of a single file based on the upload_id, and yousendit - to display a form to allow uploading a file, and sending it to numerous addresses in one step';
$lang['param_sendfilepage'] = 'Specify the page id or alias of a page that should be used for the send a file form';
$lang['file_uploaded'] = 'Filuppladdningen lyckades';
$lang['to'] = 'Till';
$lang['title_yousenditform_template'] = 'Add or Edit a &quot;You Send It&quot; Form Template';
$lang['yousenditform_template'] = 'YouSendIt Form Templates';
$lang['title_yousenditform_sysdefault'] = 'System default &quot;you send it&quot; template';
$lang['msg_file_sent'] = 'A message has been sent to the selected addresses that contains information about the file and how to retrieve it.';
$lang['error_noaddresses'] = 'You must supply at least one destination address';
$lang['error_nosubject'] = 'Du m&aring;ste ange ett &auml;mne';
$lang['subject'] = '&Auml;mne';
$lang['title_sendfilepage'] = 'Page for &quot;Send a File&quot; form';
$lang['file_info'] = 'Filinfo';
$lang['send'] = 'Skicka';
$lang['notes'] = 'Noteringar';
$lang['addressees'] = 'Skicka information om denna fil till';
$lang['prompt_sendfile_email_template'] = '&quot;Send a File&quot; Email Template';
$lang['title_sendfileform_template'] = 'Add or Edit a &quot;Send a File&quot; Form Template';
$lang['sendfileform_template'] = '&quot;Send a File&quot; Form Templates';
$lang['prompt_notify_email_template'] = 'File upload notification email template';
$lang['title_sendfileform_sysdefault'] = 'System default &quot;Send a File&quot; form template';
$lang['prompt_categorydeletable'] = 'Filer i den h&auml;r kategorin kan raderas';
$lang['title_allow_delete'] = 'Till&aring;t radering av filer fr&aring;n frontend';
$lang['default_templates'] = 'Standardmallar';
$lang['firstpage'] = 'F&ouml;rsta sidan';
$lang['prevpage'] = 'F&ouml;reg&aring;ende sida';
$lang['nextpage'] = 'N&auml;sta sida';
$lang['lastpage'] = 'Sista sidan';
$lang['firstpage_arrow'] = '<<';
$lang['prevpage_arrow'] = '<';
$lang['nextpage_arrow'] = '>';
$lang['lastpage_arrow'] = '>>';
$lang['page'] = 'Sida';
$lang['of'] = 'av';
$lang['prompt_grouplist'] = 'auktoriserade Frontendanv&auml;ndare-grupper';
$lang['info_grouplist'] = 'V&auml;lj de Frontendanv&auml;ndare-grupper som ska till&aring;tas komma &aring;t filer i den h&auml;r kategorin. Avmarkera alla poster f&ouml;r att till&aring;ta full &aring;tkomst';
$lang['title_scan'] = 'Leta efter nya filer i den h&auml;r kategorin';
$lang['title_create_thumbnails'] = 'Skapa saknade miniatyrbilder f&ouml;r filer i den h&auml;r kategorin.';
$lang['create_thumbnails'] = 'Skapa miniatyrbilder';
$lang['title_create_thumbnail'] = '(&aring;ter)skapa miniatyrbilder f&ouml;r den h&auml;r filen';
$lang['create_thumbnail'] = 'Skapa miniatyrbild';
$lang['error_patherror'] = 'Kunde inte &ouml;ppna katalog (R&auml;ttighetsproblem?)';
$lang['title_download_chunksize'] = 'Storlek p&aring; varje nedladdnings-stycke';
$lang['info_download_chunksize'] = 'Om du &auml;ndrar den h&auml;r parametern p&aring;verkar det nedladdningshastigheten, och kan hj&auml;lpa till i milj&ouml;er med lite minne';
$lang['warning_safe_mode'] = 'Safe mode f&ouml;r PHP &auml;r aktiverat. Detta kan orsaka problem med att ladda upp filer (r&auml;ttigheter) och kan ocks&aring; inverka p&aring; den h&auml;r modulens m&ouml;jligheter att skicka n&aring;gra filer pga sv&aring;righeter att &ouml;verskrida n&aring;gra av ini-inst&auml;llningarna. Du rekommenderas att ta kontakt med ditt webbhotell f&ouml;r att se om du kan f&aring; dem att inaktivera safe mode';
$lang['param_detailpage'] = 'Anv&auml;ndbart f&ouml;r att visa en detaljerad rapport som anv&auml;nder en annan sidmall. Den h&auml;r parametern accepterar sid-id eller sidalias f&ouml;r en sida som ska anv&auml;ndas f&ouml;r att visa den detaljerade rapporten';
$lang['param_prefix'] = 'En boolean som indikerar om filnamnet ska ha ett prefix';
$lang['param_prefix_feu'] = 'En boolean-parameter som indikerar att ett prefix ska tas fr&aring;n den aktuella f&ouml;rfattaren. Om ej specificerat &auml;r prefixet den aktuella tiden (i dechex-format)';
$lang['param_nocaptcha'] = 'Inaktivera captcha-st&ouml;d (p&aring; som standard) i uppladdningsformul&auml;ret';
$lang['title_uploadform_template'] = 'Redigera Uppladdningsformul&auml;rmallen';
$lang['captcha_title'] = 'Skriv in texten som visas i den h&auml;r bilden';
$lang['error_captchamismatch'] = 'Texten som skrevs in matchar inte bilden som visas';
$lang['title_autothumbnail_extensions'] = 'Ska miniatyrbilder f&ouml;r filer med de h&auml;r fil&auml;ndelserna';
$lang['title_autothumbnail_size'] = 'Maximal storlek (pixlar) f&ouml;r den genererade miniatyrbilden';
$lang['prompt_upload_icon'] = 'Ladda upp en ikon';
$lang['info_sysdefault'] = 'Den h&auml;r texten anv&auml;nds vid skapande av en ny mall av den h&auml;r typen';
$lang['title_detailrpt_sysdefault'] = 'Systemstandardmall f&ouml;r detaljrapport';
$lang['title_summaryrpt_sysdefault'] = 'Systemstandardmall f&ouml;r sammanfattningsrapport';
$lang['title_uploadform_sysdefault'] = 'Systemstandardmall f&ouml;r uppladdningsformul&auml;r';
$lang['template'] = 'Mall';
$lang['resettodefault'] = '&Aring;terst&auml;ll till standardv&auml;rden';
$lang['title_summaryrpt_template'] = 'Mall f&ouml;r summeringsrapport';
$lang['title_detailrpt_template'] = 'Mall f&ouml;r detaljerad rapport';
$lang['prompt_name'] = 'Namn';
$lang['prompt_default'] = 'Standard';
$lang['legend_uploadform'] = 'Ladda upp en fil';
$lang['error_missingparam'] = 'En n&ouml;dv&auml;ndig parameter saknas';
$lang['error_missingname'] = 'Ett namn f&ouml;r filen m&aring;ste anges';
$lang['error_missingextensions'] = '&Aring;tminstone en fil&auml;ndelse m&aring;ste anges';
$lang['error_missingicon'] = 'En ikon m&aring;ste anges';
$lang['error_nosuchrow'] = 'Den specificerade raden kunde inte hittas';
$lang['name_unknown'] = 'Ok&auml;nd/ok&auml;nt';
$lang['description_unknown'] = 'Filtypsbeskrivning f&ouml;r omatchade filer';
$lang['image'] = 'Bild';
$lang['icon'] = 'Ikon';
$lang['extensions'] = 'Fil&auml;ndelser';
$lang['addfiletype'] = 'L&auml;gg till ny filtyp';
$lang['file_types'] = 'Filtyper';
$lang['error_nocategoryid'] = 'Inget kategori-ID angavs';
$lang['error_nocategory'] = 'Inget kategori-ID angavs';
$lang['error_templatenameexists'] = 'En mall med det namnet finns redan';
$lang['prompt_templatename'] = 'Mallnamn';
$lang['prompt_template'] = 'Mall';
$lang['prompt_newtemplate'] = 'Skapa en ny mall';
$lang['help_OnDownload'] = '<p>En h&auml;ndelse som utf&ouml;rs n&auml;r en anv&auml;ndare slutf&ouml;r nedladdning av en fil</p>
<ul>
<li><em>id</em> - Uppladdnings-ID</li>
<li><em>name</em> - Filnamn</li>
<li><em>ip</em> - Nedladdarens IP-adress</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '<p>En h&auml;ndelse som utf&ouml;rs n&auml;r en kategori tas bort</p>
<ul>
<li><em>name</em> - Kategorinamn</li>
<li><em>path</em> - S&ouml;kv&auml;g f&ouml;r kategori</li>
</ul>
';
$lang['help_OnCreateCategory'] = '<p>En h&auml;ndelse som utf&ouml;rs n&auml;r en kategori skapas</p>
<h4>Parametrar</h4>
<ul>
<li><em>name</em> - Kategorins namn</li>
<li><em>description</em> - Kategorins beskrivning</li>
<li><em>path</em> - Kategorins s&ouml;kv&auml;g</li>
<li><em>path</em> - En flagga som indikerar om kategorin kan listas</li>
</ul>
';
$lang['help_OnRemove'] = '<p>En h&auml;ndelse som utf&ouml;rs n&auml;r en fil tas bort via administrationen eller frontend-gr&auml;nssnittet</p>
<h4>Parametrar</h4>
<ul>
<li><em>name</em> - Namnet p&aring; den borttagna filen</li>
<li><em>id</em> - Den borttagna filens ID</li>
<li><em>category_id</em> - Kategorins ID</li>
</ul>
';
$lang['help_OnUpload'] = '<p>En h&auml;ndelse som utf&ouml;rs n&auml;r en fil laddas upp via administrationen eller frontend-gr&auml;nssnittet</p>
<h4>Parametrar</h4>
<ul>
<li><em>category</em> - Kategorins namn</li>
<li><em>name</em> - Den uppladdade filens namn</li>
<li><em>size</em> - Storleken p&aring; den uppladdade filen</li>
<li><em>summary</em> - Den uppladdade filens kortfattade beskrivning (kan vara tom)</em></li>
<li><em>description</em> - Den uppladdade filens l&aring;nga beskrivning (kan vara tom)</em></li>
<li><em>author</em> - Den uppladde filens f&ouml;rfattare (om n&aring;gon)</em></li>
<li><em>ip_address</em> - Internet-adressen f&ouml;r den klient som laddade upp filen</li>
</ul>
';
$lang['info_event_ondeletecategory'] = 'H&auml;ndelse som utf&ouml;rs n&auml;r en kategori tas bort';
$lang['info_event_oncreatecategory'] = 'H&auml;ndelse som utf&ouml;rs n&auml;r en kategori skapas';
$lang['info_event_ondownload'] = 'H&auml;ndelse som utf&ouml;rs n&auml;r en fil laddas ner';
$lang['info_event_onupload'] = 'H&auml;ndelse som utf&ouml;rs n&auml;r en ny fil laddas upp';
$lang['info_event_onremove'] = 'H&auml;ndelse som utf&ouml;rs n&auml;r en fil tas bort';
$lang['title_usertag_onupload'] = 'Anv&auml;ndardefinierade taggar som kallas efter att uppladdningen &auml;r komplett';
$lang['none'] = 'Inga';
$lang['matchesfound'] = 'Tr&auml;ffar hittade';
$lang['filter'] = 'Filter ';
$lang['title_redirectonupload'] = 'Omdirigera till sid-ID/-alias n&auml;r anv&auml;ndare laddar upp';
$lang['details'] = 'Detaljer';
$lang['confirm_preferences'] = '&Auml;r du s&auml;ker p&aring; att du vill &auml;ndra inst&auml;llningarna?';
$lang['error_nofilesuploaded'] = 'Inga filer laddades upp.';
$lang['prompt_replace'] = 'Till&aring;t att skriva &ouml;ver';
$lang['info_replace'] = 'Ers&auml;tt alla filer med samma namn (&auml;ndrar inte id-numret)';
$lang['param_no_initial'] = 'Visa inte n&aring;gra inledande resultat n&auml;r det h&auml;r filtret &auml;r p&aring;';
$lang['param_key'] = 'L&auml;gg till ytterligare en nyckel f&ouml;r modulen f&ouml;r vidare organisering av uppladdningar. Denna nyckel kan vara en kodad str&auml;ng som &#039;feusers:uid&#039; osv. Denna parameter beh&ouml;vs normalt bara n&auml;r uppladdningsmodulen b&auml;ddas in i en annan module';
$lang['param_noauthor'] = 'D&ouml;lj f&auml;ltet f&ouml;r f&ouml;rfattare i uppladdningsformul&auml;ret. Denna parameter &auml;r bara giltig n&auml;r mode=&#039;upload&#039;. Om modulen FrontendUsers anv&auml;nds och en anv&auml;ndare f&ouml;r tillf&auml;llet &auml;r inloggad, sparas det inloggade anv&auml;ndarnamnet i ett dolt f&auml;lt.';
$lang['param_upload_id'] = 'upload_id=&quot;id&quot; - ange en enskild fil f&ouml;r url/l&auml;nk eller single mode (ovan)';
$lang['param_detailtemplate'] = 'Anv&auml;nd en mall med detta namnet f&ouml;r den detaljerade rapporten.';
$lang['param_template'] = 'Anv&auml;nd en mall med detta namnet f&ouml;r den h&auml;r rapporten eller formul&auml;ret. Denna mallen tar automatiskt mallen med motsvarande namn fr&aring;n passande lista beroende p&aring; stil (mode)';
$lang['param_filter'] = 'Visa filterformul&auml;ret';
$lang['param_no_intitial'] = 'Bara anv&auml;ndbar n&auml;r filterparametern anv&auml;nds, eller n&auml;r den &auml;r p&aring; som standard. Den h&auml;r parametern indikerar om inledande resultat ska returneras';
$lang['param_filetypes'] = 'Visa bara filer vars typ st&auml;mmer &ouml;verense med denna kommaseparerade lista';
$lang['param_sortorder'] = '  <p>Sorteringsordningar
  <ul>
  <li><em>date_asc</em> - Sortera efter datum, stigande</li>
  <li><em>date_desc</em> - Sortera efter datum, fallande</li>
  <li><em>name_asc</em> - Sortera efter namn, stigande</li>
  <li><em>name_desc</em> - Sortera efter namn, fallande</li>
  <li><em>size_asc</em> - Sortera efter storlek, stigande</li>
  <li><em>size_desc</em> - Sortera efter storlek, fallande</li>
  <li><em>desc_asc</em> - Sortera efter beskrivning, stigande</li>
  <li><em>desc_desc</em> - Sortera efter beskrivning, fallande</li>
  <li><em>author_asc</em> - Sortera efter f&ouml;rfattare, stigande</li>
  <li><em>author_desc</em> - Sortera efter f&ouml;rfattare, fallande</li>
  <li><em>ip_asc</em> - Sortera efter IP-adress, stigande</li>
  <li><em>ip_desc</em> - Sortera efter IP-adress, fallande</li>
  <li><em>random</em> - Slumpvis sorteringsordning</li>
  </ul>
  </p>';
$lang['param_listingtemplate'] = 'Mall att anv&auml;nda f&ouml;r kategorilistningar efter att ha klickat via kategorisammanfattningssidan';
$lang['param_listingsortorder'] = 'Sorteringsordning (param_sortorder) att anv&auml;nda vid listning av kategorier efter att ha klickat via kategorisammanfattningssidan';
$lang['param_fileextensions'] = ' 
file_extensions=&quot;ext1,ext2,ext3&quot;
<p>g&auml;ller enbart n&auml;r mode=upload. Den h&auml;r parametern begr&auml;nsar vilka filtyper som kan laddas upp. Den upph&auml;ver inst&auml;llningarna i modulinst&auml;llningar.</p>';
$lang['param_count'] = 'count=&quot;N&quot;
<p>En parameter f&ouml;r att lista enbart de N f&ouml;rsta resultaten i en fr&aring;ga. Sidindelning (pagination) skulle vara b&auml;ttre, men det h&auml;r funkar tills vidare</p>';
$lang['param_category'] = 'category=&quot;name&quot;
<p><b>Notera:</b> Kategori kan vara &quot;all&quot; (alla), vilket listar alla uppladdningar fr&aring;n alla <em>listbara</em> kategorier</p>';
$lang['param_mode'] = '  <ul>
  <li><em>detailed</em> - Visa en detaljerad lista &ouml;ver alla filer i kategorin</li>
  <li><em>upload</em> - Visa ett formul&auml;r f&ouml;r att l&aring;ta en anv&auml;ndare ladda upp filer via hemsidan</li>
  <li><em>url <i>or</i> link</em> - Visa en l&auml;nk till en fil</li>
  <li><em>summary</em> - Visa en sammanfattad lista &ouml;ver alla filer i en kategori</li>
  <li><em>single</em> - Visa en detaljerad rapport om en enskild uppladdning</li>
  </ul>';
$lang['param_selectform'] = 'When using the &#039;select&#039; mode, this parameter is the formid of the parent form.  Used to handle parameter passing';
$lang['param_selectname'] = 'when using the &#039;select&#039; mode, this parameter specifies the name of the field';
$lang['param_selectvalue'] = 'When using the &#039;select&#039; mode, this parameter specifies the default field value';
$lang['param_selectnone'] = 'When using the &#039;select&#039; mode, this parameter specifies wether &#039;none&#039; is a valid choice.';
$lang['returntomodule'] = 'Tillbaka till modulpanelen';
$lang['error_nocategories'] = 'Det finns inga definierade kategorier';
$lang['title_enforceextensions'] = 'Kr&auml;ver filtill&auml;gg f&ouml;r alla uppladdade filer';
$lang['restoredefaultsconfirm'] = 'Detta &aring;terst&auml;ller mallarna till systemstandard. Alla f&ouml;r&auml;ndringar som du har gjort kommer att f&ouml;rloras. &Auml;r du s&auml;ker p&aring; att du vill forts&auml;tta?';
$lang['thumbnail'] = 'Tumnagelbild';
$lang['newthumbnail'] = 'Ladda upp ny tumnagelbild';
$lang['info_summary'] = 'En kort beskrivning av filen (om tom anv&auml;nds filnamnet utan dess filtill&auml;gg)';
$lang['info_categoryname'] = 'En kort beskrivning av din kategori (f&ouml;r allm&auml;nheten)';
$lang['info_categorydesc'] = 'En beskrivning av din kategori';
$lang['info_categorypath'] = 'Namnet p&aring; katalogen under katalogen uploads, som ska anv&auml;ndas f&ouml;r att spara filer i den h&auml;r kategorin. Om katalogen med det h&auml;r namnet inte finns, s&aring; kan den skapas.';
$lang['info_destname'] = 'Anv&auml;nd det h&auml;r f&auml;ltet f&ouml;r att &auml;ndra namnet p&aring; filen vid uppladdning';
$lang['error_cantcreatedirectory'] = 'Kunde inte skapa katalog';
$lang['error_nomailermodule'] = 'Modulen CMSMailer kunde inte skapa en instans';
$lang['upload_notification'] = 'En ny fil har laddats upp';
$lang['title_email_on_upload'] = 'Skicka epost vid uppladdning till:';
$lang['email_template'] = 'Epostmall';
$lang['title_dummy_index_html'] = 'Skapa index.html-filer i varje mapp?<br/><em>Alla befintliga index.html-filer kommer att finnas kvar</em>';
$lang['about'] = 'Om';
$lang['error_permissiondenied'] = '&Aring;tkomst nekad. Kontrollera dina r&auml;ttigheter.';
$lang['error_couldnotwrite'] = 'Kunde inte skriva';
$lang['addcategory'] = 'L&auml;gg till kategori';
$lang['all'] = 'Alla';
$lang['areyousure'] = '&Auml;r du s&auml;ker?';
$lang['author'] = 'F&ouml;rfattare';
$lang['cancel'] = '&Aring;ngra';
$lang['cannotmodifypath'] = '(S&ouml;kv&auml;gen kan inte &auml;ndras)';
$lang['categories'] = 'Kategorier';
$lang['category'] = 'Kategori';
$lang['message_categoryadded'] = 'Kategorin har lagts till';
$lang['date'] = 'Datum';
$lang['dateuploaded'] = 'Datum uppladdad';
$lang['default'] = 'Standardinst&auml;llningar';
$lang['delete'] = 'Ta bort';
$lang['description'] = 'Beskrivning';
$lang['destname'] = 'Ladda upp som';
$lang['detail_template'] = 'Detaljmall';
$lang['downloaded'] = 'Filen %s &auml;r nedladdad.';
$lang['downloads'] = 'Nedladdningar';
$lang['edit'] = 'Redigera';
$lang['editcategory'] = 'Redigera kategori';
$lang['editupload'] = 'Redigera uppladdning';
$lang['error'] = 'Fel!';
$lang['error_pathinuse2'] = 'En kategori som anv&auml;nder s&ouml;kv&auml;gen (%s) existerar redan';
$lang['error_pathinuse'] = 'En kategori med den s&ouml;kv&auml;gen finns redan';
$lang['error_categoryexists2'] = 'Fel: Kategori med namn %s existerar redan';
$lang['error_categoryexists'] = 'Fel: Kategorin finns redan';
$lang['error_categorynotempty'] = 'Fel! Kan inte ta bort en kategori som inte &auml;r tom';
$lang['error_categorynotfound'] = 'Fel: Kategorin hittas inte!';
$lang['error_dberror'] = 'Fel: Databasfel!';
$lang['error_emptycategory'] = 'Fel: Tom kategori!';
$lang['error_emptypath'] = 'Fel: Tom s&ouml;kv&auml;g!';
$lang['error_fileexists'] = 'Fel! En fil med detta namnet finns redan.';
$lang['error_filenotfound'] = 'Fel! Filen %s hittades inte.';
$lang['error_insufficientparams'] = 'Fel: Otillr&auml;ckliga parametrar angivna f&ouml;r modulen!';
$lang['error_invalidauthor'] = 'Fel: Felaktig (eller tom) f&ouml;rfattare.';
$lang['error_invalidcategory'] = 'Fel: Felaktig (eller tom) kategori.';
$lang['error_invaliddescription'] = 'Fel: Felaktig (eller tom) beskrivning.';
$lang['error_invalidfile'] = 'Fel: Felaktigt (eller tomt) filnamn.';
$lang['error_invaliduploadfilename'] = 'Fel: Filer med det namnet (troligen med det filtill&auml;gget) &auml;r inte till&aring;tna.';
$lang['error_invaliduploadid'] = 'Fel: Ogiltigt uppladdnings-id';
$lang['error_nofiles'] = 'Fel: Inga matchande filer!';
$lang['files'] = 'Filer';
$lang['fixme'] = 'Fixa mellanslag';
$lang['friendlyname'] = 'Uppladdning';
$lang['help'] = '<h3>Vad g&ouml;r den h&auml;r modulen?</h3>
<p>Det &auml;r en modul som g&ouml;r det m&ouml;jligt att ladda upp och ladda ner filer till och fr&aring;n din webbsida. Den h&aring;ller reda p&aring; vem som laddade upp en fil och vem som har laddat ner den.
Dessutom kan du dela in filer i kategorier och hantera filerna som &auml;r uppladdade p&aring; samma s&auml;tt som alla administrat&ouml;rer ska kunna g&ouml;ra.</p> 

<h3>Hur anv&auml;nder jag modulen?</h3>
<p>F&ouml;r att anv&auml;nda den h&auml;r modulen - allts&aring; att till&aring;ta anv&auml;ndare att ladda upp filer till din webbsida - m&aring;ste du installera modulen och d&auml;refter skapa en eller flera kategorier/mappar
som de uppladdade filerna kan l&auml;ggas i (i modulinst&auml;llningarna). L&auml;gg sedan till en tagg p&aring; en sida eller mall ungef&auml;r s&aring; h&auml;r {cms_module module=&quot;Uploads&quot; category=&quot;enkategori&quot; mode=&quot;stil&quot;}. 
Stilen ska d&aring; matcha n&aring;gon av stilarna nedan. Vad som skrivs ut skiljer sig beroende p&aring; vilken stil du v&auml;ljer.</p>

<p>Den h&auml;r modulen kan anv&auml;nda UserID-modulen (valfritt) f&ouml;r att f&aring; information om alla inloggade anv&auml;ndare f&ouml;r att delvis fylla i formul&auml;ret n&auml;r filer laddas upp;</p>

<h3>R&auml;ttigheter</h3>
<ul>
<li><em>Manage Uploads</em> - beh&ouml;vs f&ouml;r att hantera kategorier och dess filer.</li>
<li><em>Modify Templates</em> - beh&ouml;vs f&ouml;r att &auml;ndra n&aring;gon av mallarna.</li>
<li><em>Modify Site Preferences</em> - beh&ouml;vs f&ouml;r att f&ouml;r att &auml;dnra filinst&auml;llningar.</li>
</ul>

<h3>Epost</h3>
<p>Den h&auml;r modulen kan skicka e-post n&auml;r en fil har laddats upp (se tabben Inst&auml;llningar). Men f&ouml;r att g&ouml;ra detta kr&auml;vs att modulen <strong>CMSMailer</strong> har installerats och konfigurerats. Detta &auml;r <em>valfritt</em> och om CMSMailer-modulen inte &auml;r installerad visas ingenting f&ouml;r anv&auml;ndaren, bara ett loggmeddelande kommer att l&auml;ggas till admin-loggen.</p>

<h3>Systeminst&auml;llningar</h3>
<p><strong>Notera:</strong> Den h&auml;r modulen kommer inte runt eller f&ouml;rbi n&aring;gra filstorleksbegr&auml;nsningar i php. Den fungerar tillsammans med dem. 
D&auml;rf&ouml;r m&aring;ste du eventuellt &auml;ndra i din php.ini-fil f&ouml;r att till&aring;ta uppladdning av filer s&aring; stora som du har st&auml;llt in i inst&auml;llningarna f&ouml;r uppladdningsmodulen.</p>

<h3>Not f&ouml;r Apache</h3>
<p>F&ouml;r att till&aring;ta st&ouml;rre filuppladdningar kan du beh&ouml;va &auml;ndra parametern upload_max_filesize i din php.ini-fil. Dessutom, parametern LimitRequestBody in din Apache-konfiguration kan beh&ouml;va &auml;ndras f&ouml;r att matcha parametern upload_max_filesize</p>
<p>Notera: parametern upload_max_filesize kan specificeras i bytes, kilobytes eller megabytes. Parameterna LimitRequestBody d&auml;remot, kan bara specificeras i bytes</p>';
$lang['id'] = 'Id ';
$lang['installed'] = 'Modulversion %s installerad.';
$lang['ip_address'] = 'IP-address';
$lang['moddescription'] = 'En modul som l&aring;ter anv&auml;ndare ladda upp filer och l&aring;ter dig hantera dem.';
$lang['name'] = 'Namn';
$lang['renamemessage'] = '&Auml;ndra namnet h&auml;r f&ouml;r att g&ouml;ra en namn&auml;ndring';
$lang['path'] = 'S&ouml;kv&auml;g';
$lang['pathmessage'] = '&Auml;ndra kategorin h&auml;r f&ouml;r att flytta filen till en annan mapp';
$lang['pathinuploads'] = '(relativ till uppladdningsmappen)';
$lang['postinstall'] = 'Meddelande efter installation, t.ex. Gl&ouml;m inte att st&auml;lla in r&auml;ttigheter f&ouml;r &quot;Manage Uploads&quot; f&ouml;r att anv&auml;nda den h&auml;r modulen!';
$lang['postuninstall'] = 'Meddelande efter avinstallation, t.ex. &quot;Skit ocks&aring;! Besegrad igen!&quot;';
$lang['preferences'] = 'Inst&auml;llningar';
$lang['prefsupdated'] = 'Modulinst&auml;llningar uppdaterade.';
$lang['prompt_categorydesc'] = 'Beskrivning';
$lang['prompt_categorylistable'] = 'Filerna i den h&auml;r mappen kan listas';
$lang['prompt_categoryname'] = 'Kategorinamn';
$lang['prompt_categorypath'] = 'Server-s&ouml;kv&auml;g';
$lang['prompt_deletedirectory'] = 'Ta bort kategorimapp?';
$lang['prompt_max_uploadsize'] = 'Maximal filstorlek till&aring;ten (Kb)';
$lang['prompt_valid_uploadextensions'] = 'Till&aring;tna filtill&auml;gg f&ouml;r uppladdade filer';
$lang['scan'] = 'Scanna';
$lang['selectcategory'] = 'V&auml;lj kategori';
$lang['size'] = 'Storlek';
$lang['sizekb'] = 'Storlek (Kb)';
$lang['submit'] = 'L&auml;gg till';
$lang['summary_template'] = 'Sammanfattningsmall';
$lang['summary'] = 'Sammanfattning';
$lang['title_admin_panel'] = 'Uppladdningsmodul';
$lang['title_mod_admin'] = 'Admin-panel f&ouml;r modul';
$lang['title_mod_prefs'] = 'Inst&auml;llningar f&ouml;r modul';
$lang['title_subnet_exclusions'] = 'Exkludera subn&auml;t fr&aring;n statistik';
$lang['title_valid_uploadextensions'] = 'Till&aring;tna filtill&auml;gg';
$lang['uninstalled'] = 'Modul avinstallerad.';
$lang['upgraded'] = 'Modul uppgraderad till version %s.';
$lang['upload'] = 'Ladda upp';
$lang['uploaded'] = 'Filen %s &auml;r uppladdad.';
$lang['replaced'] = 'Filen %s ersattes av %s.';
$lang['deleted'] = 'Filen %s &auml;r borttagen.';
$lang['uploadform_template'] = 'Uppladdningsmall';
$lang['username'] = 'Anv&auml;ndarnamn';
$lang['warning_deletecategory'] = 'VARNING: Var f&ouml;rsiktig n&auml;r du tar bort kategorier. Filer kan g&aring;r f&ouml;rlorade';
$lang['qca'] = 'P0-1231872325-1269359321195';
$lang['utma'] = '156861353.1269777603.1269359342.1269359342.1269359342.1';
$lang['utmb'] = '156861353.1.10.1269359342';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1269359342.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=cmsms';
?>