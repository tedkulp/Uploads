<ul>
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
<p>Added the count parameter to list only the first N records, and added "summarylink", and "category" to the templates for westis.  For examples on how to use them reset your templates back to default.</p></li>
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
<p>* Added "random" sort order</p>
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
<p>Moved to under the content menu, and entitled \'Files (Upload Module)\'</p>;
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
<ul>
<li>Fixes to the DT field type</li>
<li>Use the FEU username (optionally) so that we can track when a logged in user uploads a file</li>
<li>Add filetype capabilities to associate an icon with a particular upload.  Also support an unknown file type for anything that does not match.</li>
<li>Completely re-worked the multiple database template stuff.</li>
<li>Adjustments to the default templates</li>
<li>Fixes to using category="all"</li>
<li>Generate thumbnails automatically (optionally) for certain file types, on upload, and on scan.</li>
<li>Add captcha support to the upload form</li>
<li>Add a safe mode warning in the admin panel</li>
<li>Uses chunked downloads.</li>
<li>Adds prefix and prefix_feu capability to uploaded files.</li>
<li>Added the detailpage param.</li>
<li>Added the ability to display an image in full size (or whatever size we want), so that the uploads module can be used as a gallery.</li>
<li>Added security (via the FrontEndUsers module) to categories</li>
<li>Added a select mode to generate a pulldown of files in a category, for use when attaching uploads module to some other module.</li>
<li>Adds a category browser, fixes a rew minor issues, and tweaks the available file type icons</li>
</ul>
</li>

<li>Version 1.4 - November 2008
<ul>
<li>Major cleanup of the default action</li>
<li>Adds pagination to summary view</li>
<li>Adds pretty urls for file links</li>
<li>Adds the ability to replace thumbnails after the file is uploaed.</li>
<li>Change thumbnails from using a .thumbs directory to using a standard thumb_ prefix.</li>
<li>Numerous Bugfixes</li>
</ul>
</li>

<li>Version 1.4 - February 2009
  <ul>
     <li>Fix problem with scanning directories, and creating thumbnails.</li>
  </ul>
</li>

<li>Version 1.5.1 - May 2009
  <ul>
     <li>Adds the ability to delete files from the frontend.</li>
     <li>Fixes problem with scan directory when not also logged in to the admin panel in the same browser session.</li>
  </ul>
</li>

<li>Version 1.6 - February 2009
  <ul>
     <li>Adds the ability to display a form to send an email to selected people with details about a file.</li>
     <li>Adds the yousendit capability to upload a file and simultanoeously send details to selected people.</li>
  </ul>
</li>

<li>Version 1.7 - July 2009
  <ul>
     <li>Now depends on CGExtensions for templating</li>
     <li>Adds time limited URLS</li>
  </ul>
</li>

<li>Version 1.7.1 - July 2009
  <ul>
     <li>Minor bug fixes.</li>
  </ul>
</li>

<li>Version 1.8 - July 2009
  <ul>
    <li>Minor bug fixes.</li>
    <li>Add a category select content block for CMS 1.7.</li>
  </ul>
</li>

<li>Version 1.9 - July 2009
  <ul>
    <li>Updates for CMS 1.7</li>
  </ul>
</li>

<li>Version 1.9.1 - September 2009
  <ul>
    <li>Minor bug fixes.</li>
  </ul>
</li>

<li>Version 1.9.2 - September 2009
  <ul>
    <li>Minor bug fixes.</li>
  </ul>
</li>

<li>Version 1.9.3 - October 2009
  <ul>
    <li>One minor bug fix.</li>
  </ul>
</li>

<li>Version 1.9.4 - October 2009
  <ul>
    <li>minor bug fixes</li>
  </ul>
</li>

<li>Version 1.10 - October 2009
  <ul>
    <li>Adds the ability to auto delete files besed on a max age specified in the category</li>
    <li>Adds the ability to add a time limited key, and send an email automatically on upload in the admin.</li>
  </ul>
</li>

<li>Version 1.10.1 - October 2009
  <ul>
   <li>Fixes bug with deleteing files. - the delete url is still not in the default summary template (intentonally)</li>
  </ul>
</li>

<li>Version 1.10.2 - October 2009
  <ul>
   <li>Adds a new permission that allows only access to the functionality on the files tab.</li>
  </ul>
</li>

<li>Version 1.10.3 - October 2009
  <ul>
   <li>Minor Bug Fixes</li>
  </ul>
</li>

<li>Version 1.10.4 - October 2009
  <ul>
   <li>Minor Bug Fixes</li>
  </ul>
</li>

<li>Version 1.11 - March, 2010
  <ul>
   <li>Adds the ability to optionally disable scanning of categories.</li>
  </ul>
</li>

<li>Version 1.11.1 - March, 2010
  <ul>
   <li>Fix minor issues.</li>
  </ul>
</li>

<li>Version 1.11.2 - March, 2010
  <ul>
   <li>Fix minor issues.</li>
  </ul>
</li>
<li>Version 1.11.3 - April, 2010
  <ul>
   <li>Fix minor issues.</li>
   <li>Improvements to Copy Product (Ted)</li>
   <li>Adds the ability to filter summary list by additional fields. (Ted)</li>   
  </ul>
</li>
<li>Version 1.11.4 - July, 2010
  <ul>
   <li>Fix minor issues with category=all</li>
   <li>Fixes problem with search indexing.</li>
  </ul>
</li>
<li>Version 1.11.5 - Sept, 2010
  <ul>
   <li>Fix minor compatibility issue.</li>
  </ul>
</li>
<li>Version 1.11.6 - Jan, 2011
 <ul>
  <li>Fixes slow queries in default mode when there are many downloads to gather statistics for.</li>
  <li>Minor fixes related to E_STRICT.</li>
  <li>Minor updates to help.</li>
 </ul>
</li>
</ul>
