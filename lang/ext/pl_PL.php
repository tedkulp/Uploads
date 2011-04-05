<?php
$lang['prompt_grouplist'] = 'Zezwalaj grupom FEU ';
$lang['info_grouplist'] = 'Wybierz grupy FEU, kt&oacute;re mogą uploadować pliki. Nie wybraznie żadnej grupy zezwala na upload wszystkim grupom';
$lang['title_scan'] = 'Skanuj w poszukiwaniu nowych plik&oacute;w w kategorii';
$lang['title_create_thumbnails'] = 'Stw&oacute;rz brakujące miniatury dla plik&oacute;w w tej lategprii';
$lang['create_thumbnails'] = 'Stw&oacute;rz miniatury';
$lang['title_create_thumbnail'] = 'Stw&oacute;rz/odśwież miniaturę dla tego pliku';
$lang['create_thumbnail'] = 'Stw&oacute;rz miniaturę';
$lang['error_patherror'] = 'Nie można otworzyć katalogu (prblem z uprawnieniami';
$lang['title_download_chunksize'] = 'Rozmiar każdego ściąganego bloku';
$lang['info_download_chunksize'] = 'Zmiana tego parametru będzie miała wpływ na szybkość ściągania pliku, ale może pom&oacute;c w konfiguracjach z mniejszą ilością dostępnej pamięci';
$lang['warning_safe_mode'] = 'Safe mode w PHP jest włączone. Może to powodować problemy z uploadem plik&oacute;w (uprawnienia), a także ze ściąganiem (brak uprawnień do zmiany parametr&oacute;w php.ini). Skontaktuj się ze swoim administratorem i zapytaj o możliwość wyłączenia tego trybu.';
$lang['param_detailpage'] = 'Przydatne do wyświetlania raportu przy użyciu r&oacute;żnych szablon&oacute;w. Możesz tu wstawić ID strony lub jej alias.';
$lang['param_prefix'] = 'Zmienna wskazująca czy do nazw plik&oacute;w powinien być dodany prefiks.';
$lang['param_prefix_feu'] = 'Parametr kt&oacute;ry wskazuje, czy prefiks powininen być wzięty z danych autora uploadu, czy też (jeśli nic nie podano), obliczony ze znacznika aktualnego czasu.';
$lang['param_nocaptcha'] = 'Wyłącz obsługę Captcha w formularzu uploadu (włączone domyślnie)';
$lang['title_uploadform_template'] = 'Edytuj szablon formularza uploadu';
$lang['captcha_title'] = 'Wpisz tekst wyświetlany w tym obrazku';
$lang['error_captchamismatch'] = 'Wpisany tekst nie pasuje do wyświetlanego obrazka';
$lang['title_autothumbnail_extensions'] = 'Stw&oacute;rz miniatury dla plik&oacute;w z tymi rozszerzeniami';
$lang['title_autothumbnail_size'] = 'Maksymalny rozmiar miniatury (w pikselach) ';
$lang['prompt_upload_icon'] = 'Załaduj ikonę';
$lang['info_sysdefault'] = 'Ten tekst jest używany podczas tworzenia nowego szablonu tego typu';
$lang['title_detailrpt_sysdefault'] = 'Domyślny szablon dla szczeg&oacute;łowego raportu';
$lang['title_summaryrpt_sysdefault'] = 'Domyślny szablon dla podsumowującego raportu';
$lang['title_uploadform_sysdefault'] = 'Domyślny szablon dla formularza uploadu';
$lang['template'] = 'Szablon';
$lang['resettodefault'] = 'Przywr&oacute;ć domyślne';
$lang['title_summaryrpt_template'] = 'Szablon raportu podsumowującego';
$lang['title_detailrpt_template'] = 'Szablon raportu szczeg&oacute;łowego';
$lang['prompt_name'] = 'Nazwa';
$lang['prompt_default'] = 'Domyślny';
$lang['legend_uploadform'] = 'Załaduj plik';
$lang['error_missingparam'] = 'Brak wymaganego parametru';
$lang['error_missingname'] = 'Nazwa typu pliku musi być podana';
$lang['error_missingextensions'] = 'Conajmniej jedno rozszerzenie musi być podane';
$lang['error_missingicon'] = 'Musisz podać ikonę';
$lang['error_nosuchrow'] = 'Nie można znaleźć wiersza';
$lang['name_unknown'] = 'Nieznany';
$lang['description_unknown'] = 'Opis typu pliku dla niepasujących plik&oacute;w';
$lang['image'] = 'Obrazek';
$lang['icon'] = 'Ikona';
$lang['extensions'] = 'Rozszerzenia nazw plik&oacute;w';
$lang['addfiletype'] = 'Dodaj nowy typ pliku';
$lang['file_types'] = 'Typy plik&oacute;w';
$lang['error_nocategoryid'] = 'Brak ID kategorii';
$lang['error_nocategory'] = 'Brak ID kategorii';
$lang['error_templatenameexists'] = 'Szablon z taką nazwą już istnieje';
$lang['prompt_templatename'] = 'Nazwa szablonu';
$lang['prompt_template'] = 'Szablon';
$lang['prompt_newtemplate'] = 'Stw&oacute;rz nowy szablon';
$lang['help_OnDownload'] = '<p>An event generated when a user finishes downloading a file</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - Upload ID</li>
<li><em>name</em> - File name</li>
<li><em>ip</em> - The IP Address of the downloader</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '<p>An event generated when a category is Deleted</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - Category name</li>
<li><em>path</em> - Category path</li>
</ul>
';
$lang['help_OnCreateCategory'] = '<p>An event generated when a category is Created</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - The name of the category</li>
<li><em>description</em> - The category description</li>
<li><em>path</em> - The category path</li>
<li><em>path</em> - A flag indicating if the category is listable</li>
</ul>
';
$lang['help_OnRemove'] = '<p>An event generated when a file is removed via the admin or frontend interfaces</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - The name of the removed file</li>
<li><em>id</em> - The id of the removed file</li>
<li><em>category_id</em> - The id of the category</li>
</ul>
';
$lang['help_OnUpload'] = '<p>An event generated when a new file is uploaded via the admin or frontend interfaces</p>
<h4>Parameters</h4>
<ul>
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
$lang['info_event_onremove'] = 'Event generated when a file is removed';
$lang['title_usertag_onupload'] = 'Znacznik użytkownika wywoływany gdy ładowanie pliku się zakończy';
$lang['none'] = 'Brak';
$lang['matchesfound'] = 'Znaleziono';
$lang['filter'] = 'Filtr';
$lang['title_redirectonupload'] = 'Przekieruj do strony po załadowaniu pliku przez użytkownika';
$lang['details'] = 'Szczeg&oacute;ły';
$lang['confirm_preferences'] = 'Czy napewno chcesz zmienić ustawienia?';
$lang['error_nofilesuploaded'] = 'Nie załadowanego żadnych plik&oacute;w.';
$lang['prompt_replace'] = 'Pozw&oacute;l na nadpisywanie plik&oacute;w';
$lang['info_replace'] = 'Nadpisuje plik z tą samą nazwą (ale nie zmienia ID)';
$lang['param_no_initial'] = 'Nie wyświetlaj żadnych wstępnych wynik&oacute;w gdy filtr jest włączony';
$lang['param_key'] = 'Podaj dodatkowy parametr, kt&oacute;rypozwoli zorganizować pliki. Ten parametr może być np. ciągiem &#039;feusers:uid&#039; itp. Ten parametr zwykle jest potrzebny przy używaniu modułu Uploads przez inne moduły.';
$lang['param_noauthor'] = 'Ukryj pole autora z formularza uploadu. Ten parametr ma zastosowanie tylko przy mode=&#039;upload&#039;. Gdy moduł FrontEndUsers jest zainstalowany i użytkownik FEU jest zalogowany, ukryte pole zostanie wypełnione nazwą logowania tego użytkownika.';
$lang['param_upload_id'] = 'upload_id=&quot;id&quot; - specify a single file for the url/link or single modes (above)';
$lang['param_use_strict_regexp'] = 'The filter field is used as a strict regexp without preprocessing of spaces';
$lang['param_detailtemplate'] = 'Use a template with this name for the detailed report.';
$lang['param_template'] = 'Use a template with this name for this report or form.  The mode is used to determine what type of template is requirerd, and then a name match is performed within that type.';
$lang['param_filter'] = 'Display the filtering form';
$lang['param_no_intitial'] = 'Only useful when the filter parameter is supplied, or on by default, this parameter indicates wether initial results should be returned';
$lang['param_filetypes'] = 'Display only files whose type matches this comma separated list';
$lang['param_sortorder'] = '  <p>Sort Orders
  <ul>
  <li><em>date_asc</em> - Sort by ascending date</li>
  <li><em>date_desc</em> - Sort by descending date</li>
  <li><em>name_asc</em> - Sort by ascending name</li>
  <li><em>name_desc</em> - Sort by descending name</li>
  <li><em>size_asc</em> - Sort by ascending size</li>
  <li><em>size_desc</em> - Sort by descending size</li>
  <li><em>desc_asc</em> - Sort by ascending description</li>
  <li><em>desc_desc</em> - Sort by descending description</li>
  <li><em>author_asc</em> - Sort by ascending author</li>
  <li><em>author_desc</em> - Sort by descending author</li>
  <li><em>ip_asc</em> - Sort by ascending ip address</li>
  <li><em>ip_desc</em> - Sort by descending ip address</li>
  <li><em>random</em> - Random sort order</li>
  </ul>
  </p>';
$lang['param_listingtemplate'] = 'Template to use for category listings after clickthrough from Category Summary page';
$lang['param_listingsortorder'] = 'Sort order (ala param_sortorder) to use for category listings after clickthrough from Category Summary page';
$lang['param_fileextensions'] = ' 
file_extensions=&quot;ext1,ext2,ext3&quot;
<p>valid only when mode=upload, this parameter limits the types of files that can be uploaded.  It overrides any settings in the module preferences.</p>';
$lang['param_count'] = 'count=&quot;N&quot;
<p>A parameter to list only the first N results of the query.  Pagination would be better, but this will do the trick for now</p>';
$lang['param_category'] = 'category=&quot;name&quot;
<p><b>Note:</b> Category can be &quot;all&quot;, which will list all of the uploads from all <em>listable</em> categories</p>';
$lang['param_mode'] = '  <ul>
  <li><em>detailed</em> - Display a detailed list of all files in the category</li>
  <li><em>upload</em> - Display a form to allow a frontend user to upload a file</li>
  <li><em>url <i>or</i> link</em> - Display a link to a file</li>
  <li><em>summary</em> - Display a summarized list of all files in the category</li>
  <li><em>single</em> - Display a detailed report about a single upload</li>
  <li><em>singlesummary</em> - Display a summarized report about a single upload</li>
  </ul>';
$lang['param_selectform'] = 'When using the &#039;select&#039; mode, this parameter is the formid of the parent form.  Used to handle parameter passing';
$lang['param_selectname'] = 'when using the &#039;select&#039; mode, this parameter specifies the name of the field';
$lang['param_selectvalue'] = 'When using the &#039;select&#039; mode, this parameter specifies the default field value';
$lang['param_selectnone'] = 'When using the &#039;select&#039; mode, this parameter specifies wether &#039;none&#039; is a valid choice.';
$lang['returntomodule'] = 'Wr&oacute;ć do modułu panela';
$lang['error_nocategories'] = 'NIe ma zdefiniowanych kategorii';
$lang['title_enforceextensions'] = 'Wymagaj, aby wszystkie ładowane pliki miały rozszerzenie';
$lang['restoredefaultsconfirm'] = 'Ta operacja przywr&oacute;ci domyślny sablon. Wszystkie zmiany dokonane przez ciebie będą stracone. Napewno kontynuować?';
$lang['info_thumbnail'] = 'Opcjonalny plik miniatury';
$lang['thumbnail'] = 'Miniatura';
$lang['newthumbnail'] = 'Załaduj nową miniaturę';
$lang['info_summary'] = 'Kr&oacute;tki opis pliku (jeśli pusty nazwa pliku bez rozszerzenia jest używana)';
$lang['info_categoryname'] = 'Kr&oacute;tka nazwa kategorii';
$lang['info_categorydesc'] = 'Opis kategorii';
$lang['info_categorypath'] = 'Nazwa katalogu wewmatrz /uploads, kt&oacute;ry będzie użyty do przechowywania plik&oacute;w (jeśli nie istnieje to może być stworzony)';
$lang['info_destname'] = 'Użyj pola &#039;Załaduj jako&#039; aby zmienić nazwę pliku po uploadzie. Pozostaw puste aby zachować oryginalną nazwę';
$lang['error_cantcreatedirectory'] = 'Nie można stworzyć katalogu';
$lang['error_nomailermodule'] = 'Nie można znaleźć modułu CMSMailer';
$lang['upload_notification'] = 'Nowy plik został załadowany';
$lang['title_email_on_upload'] = 'Wyślij informację o załadowaniu nowego pliku do';
$lang['email_template'] = 'Szablon e-maila';
$lang['title_dummy_index_html'] = 'Stw&oacute;rz pusty plik index.html w każdym katalogu.<br />Istniejące pliki index.html zostaną zachowane';
$lang['about'] = 'Informacja';
$lang['error_permissiondenied'] = 'Dostęp zabroniony. Sprawdź swoje uprawnienia.';
$lang['error_couldnotwrite'] = 'Nie można zapisać';
$lang['addcategory'] = 'Dodaj kategorię';
$lang['all'] = 'Wszystkie';
$lang['areyousure'] = 'Jesteś pewny?';
$lang['author'] = 'Autor';
$lang['cancel'] = 'Anuluj';
$lang['cannotmodifypath'] = 'Ścieżka nie może być zmieniona';
$lang['categories'] = 'Kategorie';
$lang['category'] = 'Kategoria';
$lang['message_categoryadded'] = 'Kategoria została dodana';
$lang['changelog'] = '<ul>
<li>
<p>Version 1.0. - September 2005.</p>
<p> Initial Release.</p>
</li>
<li>
<p>Version 1.01. - September 2005</p>
<p>Minor fixes.</p></li>
<li>
<p>Version 1.02. - September 2005</p>
<p>Added ability to specify sort order</p>
</li>
<li>
<p>Version 1.03. - September 2005</p>
<p>Fix regarding conflict in template names</p>
</li>
<li>
<p>Version 1.04. - September 2005</p>
<p>Added ability to re-scan a directory, and to upload files from the admin page</p>
</li>
<li>
<p>Version 1.05. - September 2005</p>
<p>Fixed some PHP variable issues</p>
</li>
<li>
<p>Version 1.06. - September 2005</p>
<p>Added author field to the admin panel upload form, added a summary field, and made description a text area, and allow the user to specify a destination file name</p>
</li>
<li>
<p>Version 1.07. - September 2005</p>
<p>Added the ability to rename files and fixed a scan error</p>
</li>
<li>
<p>Version 1.08. - September 2005</p>
<p>Better handling of names with spaces, and a few minor errors fixed.  Added swedish translation (thanks westis)</p></li>
<li>
<p>Version 1.1.0. - October 2005</p>
 <ul>
   <li>Modified AttemptUpload function so it could be called externally</li>
   <li>Added GetUploadDetails function that returns all of the details about a module, including a link</li>
   <li>Added Redirects so that working with the module is alot nicer, it returns to the right tab</li>
   <li>Changed the front template to look a little better and make more sense</li>
   <li>Fixes to the uploads stuff so that the description is set, and name and summary are put in the right place</li>
   <li>Fixes to even better handle spaces in names</li>
   <li>Optionaly place dummy index.html files in each upload directory</li>
   <li>If specifying a destination name, and no extension is given, the extension of the originating file (if any exists is used</li>
 </ul>
 <p><em><b>Important!</b></em><br/>It is not possible to upgrade from any other version of the Uploads module to 1.1.0.  This is due to some errors that were made in the database routines, and even in the upgrade routine in 1.0.6.  You must de-install the old version, and then re-install the new veresion. This will cause significant difficulty if you have dscriptions, etc, in your tables</p>
</li>
<li>
<p>Version 1.1.1. - October, 2005</p>
<p>Fixed a couple of minor bugs in the GetUploadDetails and added another link (or a url) to the uploaded file.</p>
</li>
<li>
<p>Version 1.1.2. - October, 2005</p>
<p>Fixed the URL field in GetUploadDetails to return a download link and added an absurl field which returns the absolute path to the file on the webserver.  Clicks on this link will not be counted</p>
</li>
<li>
<p>Version 1.1.3. - October, 2005</p>
<p>Fixed the upgrade problem from the 1.0.x series.  Users of the 1.0.x series should be able to upgrade to 1.1.3 now with no difficulty. <b>Those are famous last words, please backup first</b>. Fixed the content redirect things that were irritating me.  Also added category=all to list all of the uploads in all listable categories <em>(lets all hope I got the sql figured out properly)</em>.</p>
</li>
<li>
<p>Version 1.1.4. - October, 2005</p>
<p>Added the count parameter to list only the first N records, and added &quot;summarylink&quot;, and &quot;category&quot; to the templates for westis.  For examples on how to use them reset your templates back to default.</p></li>
<li>
<p>Version 1.1.5. - November, 2005</p>
<p>Added email notification and some bug fixes</p>
</li>
<li>
<p>Version 1.1.6. - November, 2005</p>
<p>Added an api function and fixed some redirection stuff</p>
</li>
<li>
<p>Version 1.1.7. - November, 2005</p>
<p>More API functions, and now ignore dot files when scanning.  Email notification is now in.</p>
</li>
<li>
<p>Version 1.1.8. - January, 2006</p>
<p>* Improved docs wrt apache and php configs.</p>
<p>* Fixed problem where filesize was showing up as 0.</p>
<p>* Modified permissions to be more granular</p>
<p>* Added some comments and verbosity to the category and uploads forms in the admin section</p>
<p>* Added &quot;random&quot; sort order</p>
<p>* Some PHP5 fixes</p>
</li>
<li>
<p>Version 1.1.9. - January, 2006</p>
<p>* Added the ability to upload a thumbnail image</p>
<p>* Some improved auditing</p>
<p>* xml now added to the default file types (new installs only)</p>
<p>* Added a confirmation message to the reset to defaults buttons of the template pages.</p>
<p>* Added the file_extensions parameter for the upload form</p>
<p>* The current category selected in the files filter is sticky.
<p>* Added a preference to enforice filename extensions (defaults to on)</p>
<p>* Added a link to the edit page, in the name column of the files list.</p>
<p>* Minor changes to the layout and text to add clarity.</p>
<p>* Added download_url as an available smarty tag in the templates</p>
<li>
<p>Version 1.1.10. - February, 2006</p>
<p>* Summary now defaults to the filename (without the extension) if none is specified</p>
<p>* Now correctly handle if the thumbnail extension is not in the accepted extension list</p>
<p>* No longer display any content in the files tab if there are no categories defined</p>
<p>* Display a link in the error page that takes you back to the main admin panel</p>
<p>* Allow for replacing of uploaded files</p>
</li>
<li>
<p>Version 1.1.11. - March, 2006</p>
<p>Added the ability for a link to a detailed page when in summary mode.</p>
<p>Split the default action and defaultadmin actions into separate files, for a bit of memory improvement, hopefully</p>
<p>Add the ability to redirect to another page after a frontend user uploaded a file</p>
</li>
<li>
<p>Version 1.1.12. - March, 2006</p>
<p>Added the singlesummary mode to display a single upload in summary mode</P>
</li>
<li>
<p>Version 1.1.13. - April, 2006</p>
<p>Added optional filtering on the frontend, and a couple of extra parameters to go with it</p>
<p>Fixed a problem where it would allow you to enter a blank path when creating a category</p>
<p>Split stuff into (some) separate action files for some hopeful performance increases</p>
<p>Added copyright notices</p>
<p>Changed (optional) dependency from UserID to FrontEndUsers Module.</p>
</li>
<li>
<p>Version 1.2.1 - April, 2006</p>
<p>Changed _scanDirectory to an API function ScanDirectory and then added SmartScanDirectory to scan the directory before displaying the summary or detail listing to handle the
case where somebody uploaded files via FTP or something and did not go into the admin section to update the categories.</p>
<p>Correction to all db access stuff. Hopefully provides a performance increase.</p>
<p>Fixes to the about stuff, now use CreateParameter</p>
<p>Added the upload_template, summary_template, and detail_template (optional) parameter</p>
<p>Added the noauthor parameter, and the key parameter.  The key parameter allows the uploads module to be embedded into other modules</p>
<p>Moved to under the content menu, and entitled &#039;Files (Upload Module)&#039;</p>;
</li>
<li>
<p>Version 1.2.2 - June, 2006
<p>Added the ability to have multiple database templates, and to select one on the tag with the template parameter.</p>
<p>Fixed an issue where files were getting corrupted on download</p>
</li>
<li>
<p>Version 1.2.3 - June, 2006
<p>Fixes to use adodb-lite proper, rather than teds hack</p>
<p>Detail link now displays inline</p>
<p>Other minor tweaks that I cant remember</p>
</li>
<li>Version 1.3.0 - September, 2007
<p>Fixes to the DT field type</p>
<p>Use the FEU username (optionally) so that we can track when a logged in user uploads a file</p>
<p>Add filetype capabilities to associate an icon with a particular upload.  Also support an unknown file type for anything that does not match.</p>
<p>Completely re-worked the multiple database template stuff.</p>
<p>Adjustments to the default templates</p>
<p>Fixes to using category=&quot;all&quot;</p>
<p>Generate thumbnails automatically (optionally) for certain file types, on upload, and on scan.</p>
<p>Add captcha support to the upload form</p>
<p>Add a safe mode warning in the admin panel</p>
<p>Uses chunked downloads.</p>
<p>Adds prefix and prefix_feu capability to uploaded files.</p>
<p>Added the detailpage param.</p>
<p>Added the ability to display an image in full size (or whatever size we want), so that the uploads module can be used as a gallery.</p>
<p>Added security (via the FrontEndUsers module) to categories</p>
<p>Added a select mode to generate a pulldown of files in a category, for use when attaching uploads module to some other module.</p>
</li>
<li>
<p>Adds a category browser, fixes a rew minor issues, and tweaks the available file type icons</p>
</li>
</ul>';
$lang['date'] = 'Data';
$lang['dateuploaded'] = 'Data załadowania';
$lang['default'] = 'Domyślne';
$lang['delete'] = 'Skasuj';
$lang['description'] = 'Opis';
$lang['destname'] = 'Załaduj jako';
$lang['detail_template'] = 'Szablony szczeg&oacute;łowe';
$lang['downloaded'] = 'Plik %s został ściągnięty.';
$lang['downloads'] = 'Ściągnięć';
$lang['edit'] = 'Edytuj';
$lang['editcategory'] = 'Edytuj kategorię';
$lang['editupload'] = 'Edytuj upload';
$lang['error'] = 'Błąd!';
$lang['error_pathinuse'] = 'Kategoria używająca tego katalogu już istnieje';
$lang['error_categoryexists'] = 'Błąd: Kategoria już istnieje';
$lang['error_categorynotempty'] = 'Błąd: Nie można skasować niepustej kategorii';
$lang['error_categorynotfound'] = 'Błąd: Nie znalezion kategorii';
$lang['error_dberror'] = 'Błąd bazy danych!';
$lang['error_emptycategory'] = 'Błąd: Kategoria jest pusta!';
$lang['error_emptypath'] = 'Błąd: Ścieżka jest pusta!';
$lang['error_fileexists'] = 'Błąd: Plik %s już istnieje.';
$lang['error_filenotfound'] = 'Błąd: Plik % nie został odnaleziony.';
$lang['error_insufficientparams'] = 'Błąd: Niewystarczająca liczba parametr&oacute;w!';
$lang['error_invalidauthor'] = 'Błąd: Nieprawidłowy lub pusty autor.';
$lang['error_invalidcategory'] = 'Błąd: Nieprawidłowa lub pusta kategoria.';
$lang['error_invaliddescription'] = 'Błąd: Nieprawidłowy lub pusty opis.';
$lang['error_invalidfile'] = 'Błąd: Nieprawidłowa lub pusta nazwa pliku.';
$lang['error_invaliduploadfilename'] = 'Błąd: Pliki z tym rozszerzeniem są niedozwolone (%s).';
$lang['error_invaliduploadid'] = 'Błąd: Nieprawidłowe ID uploadu';
$lang['error_nofiles'] = 'Błąd: nie znaleziono pasujących plik&oacute;w';
$lang['files'] = 'Pliki';
$lang['fixme'] = 'Napraw spacje';
$lang['friendlyname'] = 'Zarządzenia załadowanymi plikami FEU';
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
<p>Note:  the upload_max_filesize parameter can be specified in bytes, kilobytes, or megabytes, however the LimitRequetBody parameter is only specified in bytes</p>
';
$lang['id'] = 'ID';
$lang['installed'] = 'Moduł w wersji %s został zainstalowany.';
$lang['ip_address'] = 'Adres IP';
$lang['moddescription'] = 'Moduł pozwalający na ładowanie plik&oacute;w przez użytkownik&oacute;w i zarządzanie nimi.';
$lang['name'] = 'Nazwa';
$lang['renamemessage'] = 'Wpisz nową nazwę pliku';
$lang['path'] = 'Ścieżka';
$lang['pathmessage'] = 'Wybierz inną kategorię, aby przenieść plik';
$lang['pathinuploads'] = '(w środku do katalogu /uploads)';
$lang['postinstall'] = '<p>The uploads module has been successfully installed. Be sure to set &quot;Manage Uploads&quot; permissions to use this module!</p>
<p><strong>Warning</strong> - The proper behaviour of this module depends on numerous php configuration variables.  These include <em>(but are not limited to)</em>, php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize, and max_execution_time.  These variables may need adjustment for this module to work properly on your site.  It is advised that you work with your system administrator or host provider to tune these settings for your requirements.</p>';
$lang['postuninstall'] = 'Moduł Uploads został odinstalowany. Żadne pliki nie zostały skasowane z serwera.';
$lang['preferences'] = 'Ustawienia';
$lang['prefsupdated'] = 'Ustawienia newslettera zostały uaktualnione.';
$lang['prompt_categorydesc'] = 'Opis';
$lang['prompt_categorylistable'] = 'Pliki w tym katalogu mogą być wylistowane';
$lang['prompt_categoryname'] = 'Nazwa kategorii';
$lang['prompt_categorypath'] = 'Ścieżka na serwerze';
$lang['prompt_deletedirectory'] = 'Skasować katalog kategorii?';
$lang['prompt_max_uploadsize'] = 'Maksymalna wielkość pliku (Kb)';
$lang['prompt_valid_uploadextensions'] = 'Dopuszczalne rozszerzenia';
$lang['scan'] = 'Skanuj';
$lang['selectcategory'] = 'Wybierz kategorię';
$lang['size'] = 'Rozmiar';
$lang['sizekb'] = 'Rozmiar (kb)';
$lang['submit'] = 'Zatwierdź';
$lang['summary_template'] = 'Szablony podsumowania';
$lang['summary'] = 'Podsumowanie';
$lang['title_admin_panel'] = 'Moduł Uploads';
$lang['title_mod_admin'] = 'Panel administracyjny modułu';
$lang['title_mod_prefs'] = 'Ustawienia modułu';
$lang['title_sing_loudly'] = 'Sing Loudly?';
$lang['title_subnet_exclusions'] = 'Wyklucz te podsieci ze statystyk';
$lang['title_valid_uploadextensions'] = 'Dopuszczalne rozszerzenia';
$lang['uninstalled'] = 'Moduł został odinstalowany.';
$lang['upgraded'] = 'Moduł został zaktualizowany do wersji %s.';
$lang['upload'] = 'Wybierz plik';
$lang['uploaded'] = 'Plik %s został załadowany przez %s.';
$lang['replaced'] = 'Plik %s został zastąpiony przez %s.';
$lang['deleted'] = 'Plik %s został skasowany.';
$lang['uploadform_template'] = 'Szablony uploadu';
$lang['username'] = 'Nazwa użytkownika';
$lang['warning_deletecategory'] = 'Uwaga: kasuj kategorię z ostrożnością. Pliki mogą zostać skasowane!';
$lang['welcome_text'] = '<p>Welcome to the Uploads Module admin section. Something else would probably go here if the module actually did something.</p>';
$lang['utma'] = '156861353.2359145497878676500.1213200278.1219175742.1219177789.92';
$lang['utmz'] = '156861353.1219141400.89.17.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/frs/|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>