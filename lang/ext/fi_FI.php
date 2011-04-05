<?php
$lang['prompt_grouplist'] = 'Autorisoidut FEU-ryhm&auml;t';
$lang['info_grouplist'] = 'Valitse FEU-ryhm&auml;t, joilla on oikeus t&auml;m&auml;n kategorian tiedostoihin. J&auml;t&auml; valinta tyhj&auml;ksi antaaksesi oikeudet kaikille.';
$lang['title_scan'] = 'Etsi uusia tiedostoja t&auml;st&auml; kategoriasta';
$lang['title_create_thumbnails'] = 'Luo puuttuvat pienoiskuvat t&auml;m&auml;n kategorian tiedostoille';
$lang['create_thumbnails'] = 'Luo pienoiskuvat';
$lang['title_create_thumbnail'] = '(uudelleen)Luo pienoiskuva t&auml;lle tiedostolle';
$lang['create_thumbnail'] = 'Luo pienoiskuva';
$lang['error_patherror'] = 'Hakemistoa ei voida lukea (tiedosto-oikeusongelma?)';
$lang['title_download_chunksize'] = 'Ladattavan palan koko';
$lang['info_download_chunksize'] = 'T&auml;m&auml; asetus vaikuttaa latauksen kokoon ja saattaa auttaa muistink&auml;yt&ouml;ss&auml;';
$lang['warning_safe_mode'] = 'PHPn Safe Mode on k&auml;yt&ouml;ss&auml;, t&auml;m&auml; saattaa aiheuttaa ongelmia uploadeissa (tiedosto oikeudet) ja saattaa aiheuttaa ongelmia latauksissa. Suosittelemme ottamaan yhteytt&auml; serverin yll&auml;pit&auml;j&auml;&auml;n jos ongelmia esiintyy.';
$lang['param_detailpage'] = 'Useful for displaying a detail report using a different page template, this parameter takes the page id or page alias of a page that should be used to display the detail report';
$lang['param_prefix'] = 'A boolean that indicates wether file names should be prefixed';
$lang['param_prefix_feu'] = 'A boolean parameter that indicates that the prefix should be taken from the current author, if not specified, the prefix is the current time (in dechex format)';
$lang['param_nocaptcha'] = 'Poista Capcha k&auml;yt&ouml;st&auml; (oletuksena p&auml;&auml;ll&auml;) upload formissa';
$lang['title_uploadform_template'] = 'Muokkaa upload-lomaketta';
$lang['captcha_title'] = 'Sy&ouml;t&auml; tarkistekuvan teksti';
$lang['error_captchamismatch'] = 'Tarkistekuvan teksti ei t&auml;sm&auml;&auml;';
$lang['title_autothumbnail_extensions'] = 'Luo pikkukuvat tiedostoille, joilla on n&auml;m&auml; p&auml;&auml;tteet';
$lang['title_autothumbnail_size'] = 'Maksimi pienoiskuvan koko (pikselein&auml;)';
$lang['prompt_upload_icon'] = 'Siirr&auml; ikoni palvelimelle';
$lang['info_sysdefault'] = 'T&auml;t&auml; teksti&auml; k&auml;ytet&auml;&auml;n uuden templaten luonnissa';
$lang['title_detailrpt_sysdefault'] = 'Oletus yksityiskohtaisen raportin pohja';
$lang['title_summaryrpt_sysdefault'] = 'Oletus yhteenvetoraportin pohja';
$lang['title_uploadform_sysdefault'] = 'Oletus upload-lomakepohja';
$lang['template'] = 'Pohja';
$lang['resettodefault'] = 'Palauta oletukset';
$lang['title_summaryrpt_template'] = 'Yhteenvetoraportin pohja';
$lang['title_detailrpt_template'] = 'Yksityiskohtaisen raportin pohja';
$lang['prompt_name'] = 'Nimi';
$lang['prompt_default'] = 'Oletus';
$lang['legend_uploadform'] = 'Lataa tiedosto';
$lang['error_missingparam'] = 'Vaadittu parametri puuttuu';
$lang['error_missingname'] = 'Tiedoston nimi tulee antaa';
$lang['error_missingextensions'] = 'Tarvitaan v&auml;hint&auml;&auml;n yksi tiedostop&auml;&auml;te';
$lang['error_missingicon'] = 'Ikoni tulee m&auml;&auml;ritt&auml;&auml;';
$lang['error_nosuchrow'] = 'M&auml;&auml;ritetty&auml; rivi&auml; ei l&ouml;ytynyt';
$lang['name_unknown'] = 'Tuntematon';
$lang['description_unknown'] = 'Tiedoston tyyppi kuvaus tuntemattomille tiedostoille';
$lang['image'] = 'Kuva';
$lang['icon'] = 'Ikoni';
$lang['extensions'] = 'Tiedostop&auml;&auml;tteet';
$lang['addfiletype'] = 'Lis&auml;&auml; uusi tiedostotyyppi';
$lang['file_types'] = 'Tiedostotyypit';
$lang['error_nocategoryid'] = 'Kategorian IDt&auml; ei annettu';
$lang['error_nocategory'] = 'Kategorian IDt&auml; ei annettu';
$lang['error_templatenameexists'] = 'Samalla nimell&auml; on jo olemassa pohja';
$lang['prompt_templatename'] = 'Pohjan nimi';
$lang['prompt_template'] = 'Pohja';
$lang['prompt_newtemplate'] = 'Luo uusi pohja';
$lang['help_OnDownload'] = '<h3>OnDownload</h3>
<p>An event generated when a user finishes downloading a file</p>
<ul>
<li><em>id</em> - Upload ID</li>
<li><em>name</em> - File name</li>
<li><em>ip</em> - The IP Address of the downloader</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '<h3>OnDeleteCategory</h3>
<p>An event generated when a category is Deleted</p>
<ul>
<li><em>name</em> - Category name</li>
<li><em>path</em> - Category path</li>
</ul>
';
$lang['help_OnCreateCategory'] = '<h3>OnCreateCategory</h3>
<p>An event generated when a category is Created</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - The name of the category</li>
<li><em>description</em> - The category description</li>
<li><em>path</em> - The category path</li>
<li><em>path</em> - A flag indicating if the category is listable</li>
</ul>
';
$lang['help_OnRemove'] = '<h3>OnRemove</h3>
<p>An event generated when a file is removed via the admin or frontend interfaces</p>
<h4>Parameters</h4>
<ul>
<li><em>name</em> - The name of the removed file</li>
<li><em>id</em> - The id of the removed file</li>
<li><em>category_id</em> - The id of the category</li>
</ul>
';
$lang['help_OnUpload'] = '<h3>OnUpload</h3>
<p>An event generated when a new file is uploaded via the admin or frontend interfaces</p>
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
$lang['title_usertag_onupload'] = 'K&auml;ytt&auml;j&auml;n luoma tagi, jota kutsutaan kun siirto on valmis';
$lang['none'] = 'Ei mit&auml;&auml;n';
$lang['matchesfound'] = 'Osumaa l&ouml;ydetty';
$lang['filter'] = 'Suodata';
$lang['title_redirectonupload'] = 'Ohjaa sivulle (id / alias) latauksen j&auml;lkeen';
$lang['details'] = 'Lis&auml;tiedot';
$lang['confirm_preferences'] = 'Haluatko varmasti muuttaa asetuksia?';
$lang['error_nofilesuploaded'] = 'Tiedostoa ei ladattu';
$lang['prompt_replace'] = 'Salli ylikirjoitus';
$lang['info_replace'] = 'Korvaa tiedosto samannimisella (ei vaihda ID:ta)';
$lang['param_no_initial'] = '&Auml;l&auml; n&auml;yt&auml; alussa tuloksia, jos suodatus on p&auml;&auml;ll&auml;';
$lang['param_key'] = 'Provide an additional key to the module for further organizing uploads.  This key could be an encoded string like: &#039;feusers:uid&#039;, etc.  This parameter is usually only needed when embedding the uploads module into another module';
$lang['param_noauthor'] = 'Hide the author field from the upload form.  This parameter is only valid when mode=&#039;upload&#039;.  If The FrontendUsers module is present, and a user is currently logged in, a hidden field will hold the currently logged in username';
$lang['param_upload_id'] = 'upload_id=&quot;id&quot; - specify a single file for the url/link or single modes (above)';
$lang['param_use_strict_regexp'] = 'Suodatus k&auml;ytt&auml;&auml; tiukkaa s&auml;&auml;nn&ouml;llist&auml; lauseketta';
$lang['param_detailtemplate'] = 'K&auml;yt&auml; t&auml;m&auml;n nimist&auml; pohjaa yksityiskohtaiseen raporttiin';
$lang['param_template'] = 'Use a template with this name for this report or form.  The mode is used to determine what type of template is requirerd, and then a name match is performed within that type.';
$lang['param_filter'] = 'N&auml;yt&auml; suodatuskaavake';
$lang['param_no_intitial'] = 'K&auml;yt&auml;nn&ouml;llinen vain jos suodatusparametri on annettu, Vaikuttaa tuloksiin ilman suodatusta
';
$lang['param_filetypes'] = 'N&auml;yt&auml; vain tiedostot, joiden tyyppi vastaa t&auml;t&auml; pilkulla erotettua listaa';
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
<p>Mit&auml; tiedosto p&auml;&auml;tteit&auml; voidaan ladata, vaatii mode=&quot;upload&quot; parametrin. Ylikirjoittaa modulin perusasetukset</p>';
$lang['param_count'] = 'count=&quot;N&quot;
<p>N&auml;ytt&auml;&auml; N kappaletta tuloksia</p>';
$lang['param_category'] = 'category=&quot;name&quot;
<p><b>Huomaa:</b> Voi olla my&ouml;s &quot;all&quot;, joka n&auml;ytt&auml;&auml; kaikki <em>listattavissa olevat</em> kategoriat</p>';
$lang['param_mode'] = '  <ul>
  <li><em>detailed</em> - Display a detailed list of all files in the category</li>
  <li><em>upload</em> - Display a form to allow a frontend user to upload a file</li>
  <li><em>url <i>or</i> link</em> - Display a link to a file</li>
  <li><em>summary</em> - Display a summarized list of all files in the category</li>
  <li><em>single</em> - Display a detailed report about a single upload</li>
  <li><em>singlesummary</em> - Display a summarized report about a single upload/li>
  </ul>';
$lang['param_selectform'] = 'When using the &#039;select&#039; mode, this parameter is the formid of the parent form.  Used to handle parameter passing';
$lang['param_selectname'] = 'when using the &#039;select&#039; mode, this parameter specifies the name of the field';
$lang['param_selectvalue'] = 'When using the &#039;select&#039; mode, this parameter specifies the default field value';
$lang['param_selectnone'] = 'When using the &#039;select&#039; mode, this parameter specifies wether &#039;none&#039; is a valid choice.';
$lang['returntomodule'] = 'Palaa moduuliin';
$lang['error_nocategories'] = 'Ei yht&auml;&auml;n m&auml;&auml;ritelty&auml; kategoriaa';
$lang['title_enforceextensions'] = 'Vaadi p&auml;&auml;te kaikille ladatuille tiedostoille';
$lang['restoredefaultsconfirm'] = 'Oletko varma ett&auml; haluat palauttaa kaikki pohjat oletus pohjiksi. Kaikki muutokset joita olet tehnyt h&auml;vi&auml;v&auml;t!';
$lang['info_thumbnail'] = 'Valinnainen pienoskuvatiedosto';
$lang['thumbnail'] = 'Pienoiskuva';
$lang['newthumbnail'] = 'Siirr&auml; uusi pienoiskuva';
$lang['info_summary'] = 'Lyhyt kuvaus tiedostosta';
$lang['info_categoryname'] = 'Lyhyt kuvaus kategoriasta';
$lang['info_categorydesc'] = 'Kuvaus kategoriasta';
$lang['info_categorypath'] = 'The directory name inside the uploads directory that will be used to store files in this category.  If the directory of this name does not already exist, it may be created';
$lang['info_destname'] = 'Use the &#039;Upload As&#039; field to change the name of the file on upload.  Leave blank to preserve the filename as-is.';
$lang['error_cantcreatedirectory'] = 'Ei voida luoda hakemistoa';
$lang['error_nomailermodule'] = 'CMSMailer modulia ei voitu alustaa';
$lang['upload_notification'] = 'Uusi tiedosto on uploadattu';
$lang['title_email_on_upload'] = 'L&auml;het&auml; upload ilmoitus osoitteeseen:';
$lang['email_template'] = 'Email pohja';
$lang['title_dummy_index_html'] = 'Create dummy index.html files in each directory?<br/><em>Any existing index.html files will remain</em>';
$lang['about'] = 'Tietoja';
$lang['error_permissiondenied'] = 'P&auml;&auml;sy ev&auml;tty, tarkista oikeutesi.';
$lang['error_couldnotwrite'] = 'Ei voitu kirjoittaa';
$lang['addcategory'] = 'Lis&auml;&auml; kategoria';
$lang['all'] = 'Kaikki';
$lang['areyousure'] = 'Oletko varma?';
$lang['author'] = 'Tekij&auml;';
$lang['cancel'] = 'Peruuta';
$lang['cannotmodifypath'] = '(Polkua ei voida muuttaa)';
$lang['categories'] = 'Kategoriat';
$lang['category'] = 'Kategoria';
$lang['message_categoryadded'] = 'Kategoria lis&auml;tty';
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
<p>Changed _scanDirectory to an API function ScanDirectory and then added SmartScanDirectory to scan the directory before displaying the summary or detail listing to handle the
case where somebody uploaded files via FTP or something and did not go into the admin section to update the categories.</p>
<p>Correction to all db access stuff. Hopefully provides a performance increase.</p>
<p>Fixes to the about stuff, now use CreateParameter</p>
</li>
</ul>';
$lang['date'] = 'P&auml;iv&auml;m&auml;&auml;r&auml;';
$lang['dateuploaded'] = 'Lis&auml;ys p&auml;iv&auml;m&auml;&auml;r&auml;';
$lang['default'] = 'Oletukset';
$lang['delete'] = 'Poista';
$lang['description'] = 'Kuvaus';
$lang['destname'] = 'Upload As';
$lang['detail_template'] = 'Detail Template';
$lang['downloaded'] = 'Tiedost %s on ladattu.';
$lang['downloads'] = 'Lataukset';
$lang['edit'] = 'Muokkaa';
$lang['editcategory'] = 'Mukkaa kategoriaa';
$lang['editupload'] = 'Muokkaa uploadia';
$lang['error'] = 'Virhe!';
$lang['error_pathinuse'] = 'Kategoria samalla polulla on jo olemassa.';
$lang['error_categoryexists'] = 'Virhe: Kategoria on jo olemassa!';
$lang['error_categorynotempty'] = 'Virhe: Ei voida tuhota kategoriaa joka ei ole tyhj&auml;!';
$lang['error_categorynotfound'] = 'Virhe: Kategoriaa ei l&ouml;ydy!';
$lang['error_dberror'] = 'Virhe: Tietokanta virhe!';
$lang['error_emptycategory'] = 'Virhe: Tyhj&auml; kategoria!';
$lang['error_emptypath'] = 'Virhe: Tyhj&auml; polku!';
$lang['error_fileexists'] = 'Virhe: Tiedosto %s on jo olemassa!';
$lang['error_filenotfound'] = 'Virhe: Tiedostoa %s ei l&ouml;ydy!';
$lang['error_insufficientparams'] = 'Virhe: Kaikkia parametreja ei ole m&auml;&auml;ritelty moduli kutsussa!';
$lang['error_invalidauthor'] = 'Virhe: virheellinen (tai tyhj&auml;) tekij&auml;';
$lang['error_invalidcategory'] = 'Virhe: virheellinen (tai tyhj&auml;) kategoria';
$lang['error_invaliddescription'] = 'Virhe: virheellinen (tai tyhj&auml;) kuvaus';
$lang['error_invalidfile'] = 'Virhe: virheellinen (tai tyhj&auml;) tiedostonimi';
$lang['error_invaliduploadfilename'] = 'Virhe: virheellinen tiedostonimi (tai p&auml;&auml;te) (%s)';
$lang['error_invaliduploadid'] = 'Virhe: virheellinen lataus id';
$lang['error_nofiles'] = 'Virhe: ei vastaavia tiedostoja!';
$lang['files'] = 'Tiedostot';
$lang['fixme'] = 'Korjaa v&auml;lily&ouml;nnit';
$lang['friendlyname'] = 'Tiedostot (Uploads Module)';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>It is a module for allowing people to upload and download files to and from your site.  It keeps track of who uploaded a file, and who has downloaded it.  As well, you can sort files into categories, and manage the files that were uploaded like every administrator would do</p> 
<h3>How Do I Use It</h3>
<p>To use this module, to allow users to upload files to your site, you should install the module, and then create one or more categories (a.k.a) directories for the uploaded files to go into. Then add a tag into a page or template somewhere like {cms_module module=&quot;Uploads&quot; category=&quot;somecategory&quot; mode=&quot;somemode&quot;}.  Where mode matches one of the modes listed below.  The output will differ depending upon which mode you select.</p>
<p>This module can use the FrontendUsers module (optional) to get information about any currently logged in users to partly fill in the form when uploading files;</p>
<h3>Permissions</h3>
<ul>
<li><em>Manage Uploads</em> permission is needed to manage categories, and the files within them.</li>
<li><em>Modify Templates</em> permission is needed edit any of the templates.</li>
<li><em>Modify Site Preferences/em> permission is needed any of the file settings.</li>
</ul>
<h3>Emailing</h3>
<p>This module is capable of sending an email whenever a file is uploaded, see the preferences tab.  However, to do this the <b>CMSMailer</b> package must be installed and configured.  This is an <em>optional</em> step, and if the CMSMailer module is not installed, nothing will be displayed to the user, only a log message will be placed into the admin log</p>
<h3>System Settings</h3>
<p><b>Note:</b> This module does not bypass or get past any file size limitations in php.  It works in conjunction with them.  Therefore you may need to modify your php.ini file and/or your httpd.conf file(s) to allow you to upload files as large as what you have set in the uploads module preferences.</p>
<h3>Apache Notes</h3>
<p>In order to allow large file uploads, you may need to modify the upload_max_filesize parameter in your php.ini  In addition, the LimitRequestBody parameter in your apache configuration, may need to be adjusted to match the upload_max_filesize parameter</p>
<p>Note:  the upload_max_filesize parameter can be specified in bytes, kilobytes, or megabytes, however the LimitRequetBody parameter is only specified in bytes</p>';
$lang['id'] = 'Id';
$lang['installed'] = 'Moduulin versio %s asennettu.';
$lang['ip_address'] = 'IP osoite';
$lang['moddescription'] = 'Moduuli, joka sallii k&auml;ytt&auml;jien ladata tiedostoja sivustolle ja yll&auml;pit&auml;j&auml;n hallita n&auml;it&auml; tiedostoja ';
$lang['name'] = 'Nimi';
$lang['renamemessage'] = 'Vaihda nimi tai tee uudelleennime&auml;minen';
$lang['path'] = 'Polku';
$lang['pathmessage'] = 'Vaihda kategorian nimi tai siirr&auml; tiedosto toiseen hakemistoon';
$lang['pathinuploads'] = '(Suhteellinen polku uploads-hakemistoon n&auml;hden)';
$lang['postinstall'] = 'Post Install Message, e.g., Be sure to set &quot;Manage Uploads&quot; permissions to use this module!';
$lang['postuninstall'] = 'The Uploads module has been successfully removed.  No files have been removed from your uploads directory, and file integrity is intact';
$lang['preferences'] = 'Asetukset';
$lang['prefsupdated'] = 'Modulin asetukset p&auml;ivitetty';
$lang['prompt_categorydesc'] = 'Kuvaus';
$lang['prompt_categorylistable'] = 'Tiedostot t&auml;ss&auml; hakemistossa voidaan listata';
$lang['prompt_categoryname'] = 'Kategorian nimi';
$lang['prompt_categorypath'] = 'Palvelimen polku';
$lang['prompt_deletedirectory'] = 'Tuhoa kategorian hakemisto?';
$lang['prompt_max_uploadsize'] = 'Maksimi tiedostokoko (Kb)';
$lang['prompt_valid_uploadextensions'] = 'Hyv&auml;ksytyt tiedostop&auml;&auml;tteet';
$lang['scan'] = 'Skannaa';
$lang['selectcategory'] = 'Valitse kategoria';
$lang['size'] = 'Koko';
$lang['sizekb'] = 'Koko (Kb)';
$lang['submit'] = 'L&auml;het&auml;';
$lang['summary_template'] = 'Kooste pohja';
$lang['summary'] = 'Kooste';
$lang['title_admin_panel'] = 'Uploads Module';
$lang['title_mod_admin'] = 'Modulin hallintapaneeli';
$lang['title_mod_prefs'] = 'Modulin asetukset';
$lang['title_sing_loudly'] = 'Sing Loudly?';
$lang['title_subnet_exclusions'] = '&Auml;l&auml; ker&auml;&auml; statistiikka aliverkoista';
$lang['title_valid_uploadextensions'] = 'Hyv&auml;ksytyt tiedostop&auml;&auml;tteet';
$lang['uninstalled'] = 'Moduli poistettu';
$lang['upgraded'] = 'Moduli p&auml;ivitetty versioon %s.';
$lang['upload'] = 'Lataa';
$lang['uploaded'] = 'Tiedosto %s on uploadattu k&auml;ytt&auml;j&auml;n %s toimesta.';
$lang['replaced'] = 'Tiedosto %s on korvattu tiedostolla %s.';
$lang['deleted'] = 'Tiedosto %s on poistettu.';
$lang['uploadform_template'] = 'Upload Template';
$lang['username'] = 'K&auml;ytt&auml;j&auml;nimi';
$lang['warning_deletecategory'] = 'VAROITUS: Kategorioiden tuhoaminen saattaa kadottaa tiedostoja';
$lang['welcome_text'] = '<p>Welcome to the Uploads Module admin section. Something else would probably go here if the module actually did something.</p>';
$lang['utma'] = '156861353.1959547193.1213865783.1213877647.1213881357.5';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1213881357.5.3.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/forum/forum.php|utmcmd=referral';
$lang['utmb'] = '156861353';
?>