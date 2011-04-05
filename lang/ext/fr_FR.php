<?php
$lang['prompt_category_scannable'] = 'Scanner automatiquement la cat&eacute;gorie pour trouver les nouveaux fichiers ?';
$lang['info_category_scannable'] = 'Quand cette cat&eacute;gorie est vue depuis le FrontEnd, elle est automatiquement scann&eacute;e &agrave; la recherche de nouveaux fichiers';
$lang['prompt_tl_access'] = 'Acc&egrave;s temporaire';
$lang['prompt_allow_upload_sendfile'] = 'Autorise l&#039;envoi imm&eacute;diat de fichiers pour l&#039;upload d&#039;admin';
$lang['msg_auto_delete_file'] = 'Effacer automatiquement les fichiers expir&eacute;s : %s';
$lang['msg_auto_delete_file_failed'] = 'L&#039;auto-effacement de %s a &eacute;chou&eacute; (probl&egrave;me de permissions)';
$lang['info_category_expires_hrs'] = 'Indiquer un nombre d&#039;heures avant que les fichiers de cette cat&eacute;gorie ne puisse &ecirc;tre supprim&eacute;s. Utiliser la valeur 0 pour indiquer que les fichiers ne doivent pas &ecirc;tre supprim&eacute;s.';
$lang['prompt_category_expires_hrs'] = 'Nombre d&#039;heures avant que les fichiers de cette cat&eacute;gorie ne soient supprim&eacute;s automatiquement';
$lang['info_dflt_category_expiry'] = 'La valeur par d&eacute;faut pour les nouvelles cat&eacute;gories qui sp&eacute;cifie le nombre d&#039;heures avant que les fichiers de cette cat&eacute;gorie ne soient supprim&eacute;s automatiquement.  Utiliser la valeur 0 pour indiquer aucune suppression';
$lang['title_category_expiry'] = 'P&eacute;riode d&#039;expiration de la cat&eacute;gorie<em>(hrs)</em>';
$lang['info_categorydeletable'] = 'Les utilisateurs autoris&eacute;s auront la permission de supprimer ces fichiers. Cela signifie qu&#039;un url sera fourni dans les gabarits appropri&eacute;s pour permettre la suppression des fichiers. Un d&eacute;veloppeur de site web peut utiliser une logique Smarty appropri&eacute;e pour afficher un lien aux utilisateurs autoris&eacute;s.';
$lang['copy_files'] = 'Copier les fichiers';
$lang['error_filetoolarge'] = 'Le fichier que vous avez tent&eacute; d&#039;uploader est plus gros que la taille maximale autoris&eacute;e par CMSMS';
$lang['areyousure_deletecategory'] = 'Etes vous s&ucirc;r(e) de vouloir effacer cette cat&eacute;gorie ?';
$lang['error_delete'] = 'Un &eacute;l&eacute;ment ne peut pas &ecirc;tre effac&eacute; (%s)';
$lang['confirm_cat_multiaction'] = 'Etes vous s&ucirc;r(e) de vouloir ex&eacute;cuter cette action sur les cat&eacute;gories s&eacute;lectionn&eacute;es ?';
$lang['error_nothing_selected'] = 'Erreur : vous n&#039;avez rien s&eacute;lectionn&eacute;';
$lang['with_selected'] = 'Avec la s&eacute;lection';
$lang['error_replace_mismatched_fileext'] = 'Quand vous remplacez un fichier, ceux-ci doivent avoir la m&ecirc;me extension (par ex .pdf). La nouvelle version du fichier n&#039;a pas la m&ecirc;me extension que le fichier original.';
$lang['replace'] = 'Remplacer';
$lang['info_replacefile'] = 'You may upload a replacement file, if the file is an image type, and you have not specified a replacement thumbnail, a new thumbnail will be generated';
$lang['prompt_replacefile'] = 'Nouvelle version du fichier';
$lang['title_fixspaces'] = 'Enlevez les espaces dans le nom du fichier';
$lang['category_copied'] = 'Cat&eacute;gorie copi&eacute;e avec succ&egrave;s !';
$lang['error_duplicatepath'] = 'Veuillez sp&eacute;cifier un nom de r&eacute;pertoire diff&eacute;rent de la source et qui n&#039;est pas d&eacute;j&agrave; utilis&eacute;';
$lang['operation_cancelled'] = 'Op&eacute;ration annul&eacute;e';
$lang['source'] = 'Source ';
$lang['destination'] = 'Destination ';
$lang['prompt_copy_files'] = 'Copy category Files';
$lang['info_copy_files'] = 'Copy the files from the source category to the destination category';
$lang['extra'] = 'Extra ';
$lang['copy'] = 'Copier';
$lang['selectone'] = 'Choisissez un';
$lang['autowatermark'] = 'Mettre des vignettes sur les images automatiquement';
$lang['image_settings'] = 'R&eacute;glages des images';
$lang['prompt_getfile_resultpage'] = 'Page utilis&eacute;e pour les erreurs ou les messages en lien avec le t&eacute;l&eacute;chargement de fichiers';
$lang['error_invalid_key'] = 'La cl&eacute; temporaire de t&eacute;l&eacute;chargement est invalide (peut &ecirc;tre qu&#039;elle a atteint sa capacit&eacute; maximale de t&eacute;l&eacute;chargement ou qu&#039;elle a expir&eacute;)';
$lang['dflt_timelimited_subject'] = '{$sitename} - Vous avez un acc&egrave;s temporaire &agrave; {$entry->upload_name|strip_tags}';
$lang['prompt_timelimited_subject'] = 'Sujet pour l&#039;email cr&eacute;&eacute; quand on envoi une URL temporaire';
$lang['prompt_timelimited_autodelete'] = 'Effacer automatiquement les fichiers expir&eacute;s apr&egrave;s N heures <em>(mettre &agrave; 0 pour ne pas utiliser cette fonction)</em>:';
$lang['prompt_timelimited_sendit'] = 'Envoyer cette url &agrave; l&#039;adresse email d&eacute;sign&eacute;e ?';
$lang['url_key'] = 'Cl&eacute; URL';
$lang['created'] = 'Cr&eacute;&eacute;';
$lang['expires'] = 'Expire';
$lang['addedit_timelimited_key'] = 'Ajouter/modifier une cl&eacute; temporaire';
$lang['time_limited_key_added'] = 'Cl&eacute; limit&eacute;e dans le temps ajout&eacute;e';
$lang['num_hours'] = 'Nombre d&#039;heures';
$lang['num_downloads'] = 'Nombre de t&eacute;l&eacute;chargements';
$lang['email_address'] = 'Adresse email';
$lang['error_missing_invalid'] = 'Une valeur n&eacute;cessaire est manquante ou erron&eacute;e : %s';
$lang['add_timelimited_key'] = 'Ajouter une cl&eacute; limit&eacute;e dans le temps';
$lang['file_info2'] = 'Fichier %s (id=%d)';
$lang['info_timelimited_downloads'] = 'Sp&eacute;cifiez le nombre maximal de t&eacute;l&eacute;chargement pour un fichier identifi&eacute; par une cl&eacute; particuli&egrave;re';
$lang['prompt_timelimited_downloads'] = 'Nombre de t&eacute;l&eacute;chargements par d&eacute;faut';
$lang['info_timelimited_hours'] = 'Sp&eacute;cifier le nombre d&#039;heures pas d&eacute;faut pour la validit&eacute; d&#039;une cl&eacute; temporaire. Sp&eacute;cifier 0 pour une cl&eacute; permanente.';
$lang['prompt_timelimited_hours'] = 'Dur&eacute;e en heures pour une cl&eacute; temporaire';
$lang['timelimited_url_settings'] = 'R&eacute;glages pour la cl&eacute; temporaire';
$lang['manage_timelimited'] = 'G&eacute;rer l&#039;acc&egrave;s via la cl&eacute; temporaire';
$lang['uploading_settings'] = 'R&eacute;glages pour l&#039;upload de fichiers';
$lang['general_settings'] = 'R&eacute;glages G&eacute;n&eacute;raux';
$lang['thumbnail_settings'] = 'G&eacute;n&eacute;ration de vignettes';
$lang['title_redirect_on_sendfile'] = 'Page o&ugrave; rediriger apr&egrave;s avoir envoy&eacute; un fichier';
$lang['lbl_back'] = 'Retour';
$lang['lbl_templates'] = 'Modifier les gabarits';
$lang['prompt_public_field'] = 'Le champ est public <em>(visible pour les visiteurs)</em>';
$lang['upload_edited'] = 'D&eacute;tails du fichiers &eacute;dit&eacute;s le %s';
$lang['info_thumbnail'] = 'Un fichier vignette facultatif';
$lang['upload_file'] = 'Uploader un nouveau fichier';
$lang['msg_field_deleted'] = 'Champ effac&eacute;';
$lang['ask_delete_field'] = 'Etes vous s&ucirc;r(e) de vouloir effacer cette d&eacute;finition de champs et toutes les donn&eacute;es associ&eacute;es ?';
$lang['yes'] = 'Oui';
$lang['no'] = 'Non';
$lang['type'] = 'Type ';
$lang['fieldtype_multiselect'] = 'Liste avec choix multiples';
$lang['fieldtype_dropdown'] = 'Liste d&eacute;roulante';
$lang['fieldtype_checkbox'] = 'Bo&icirc;te &agrave; cocher';
$lang['fieldtype_textarea'] = 'Zone de texte';
$lang['fieldtype_textinput'] = 'Entr&eacute;e texte';
$lang['prompt_use_wysiwyg'] = 'Utiliser l&#039;&eacute;diteur WYSIWYG pour modifier les valeurs de ce champ';
$lang['prompt_default_content'] = 'Contenu par d&eacute;faut pour une zone de texte';
$lang['prompt_dropdown_options'] = 'Options (une par ligne)';
$lang['prompt_field_maxlength'] = 'Longueur maximale du champ';
$lang['prompt_field_length'] = 'Longueur du champ';
$lang['prompt_field_type'] = 'Type de champ';
$lang['prompt_field_name'] = 'Nom du champ';
$lang['title_add_field'] = 'Ajouter ou modifier une d&eacute;finition de champ';
$lang['field_definitions'] = 'D&eacute;finitions de champ';
$lang['prompt_add_field'] = 'Ajouter une d&eacute;finition de champ';
$lang['param_action'] = 'Specifies the behaviour of the module tag.  Possible values are: default - (the defafault behavior), detail - to display a detail view of a single file based on the upload_id, and yousendit - to display a form to allow uploading a file, and sending it to numerous addresses in one step';
$lang['param_sendfilepage'] = 'Specify the page id or alias of a page that should be used for the send a file form';
$lang['file_uploaded'] = 'Fichier upload&eacute; avec succ&egrave;s';
$lang['to'] = 'A';
$lang['title_yousenditform_template'] = 'Add or Edit a &quot;You Send It&quot; Form Template';
$lang['yousenditform_template'] = 'YouSendIt Form Templates';
$lang['title_yousenditform_sysdefault'] = 'System default &quot;you send it&quot; template';
$lang['msg_file_sent'] = 'A message has been sent to the selected addresses that contains information about the file and how to retrieve it.';
$lang['error_noaddresses'] = 'Vous devez rentrer au moins une adresse de destination';
$lang['error_nosubject'] = 'Vous devez entrer un sujet';
$lang['subject'] = 'Sujet';
$lang['title_sendfilepage'] = 'Page pour le formulaire &quot;Envoyer un fichier&quot;';
$lang['file_info'] = 'Infos fichier';
$lang['send'] = 'Envoy&eacute;';
$lang['notes'] = 'Notes ';
$lang['addressees'] = 'Envoyer les informations concernant ce fichier &agrave;';
$lang['prompt_sendfile_email_template'] = 'Gabarit d&#039;email pour &quot;Envoyer un fichier&quot;';
$lang['title_sendfileform_template'] = 'Ajouter ou modifier un gabarit pour le formulaire &quot;Envoyer un fichier&quot;';
$lang['sendfileform_template'] = 'Gabarit de formulaire &quot;Envoyer un fichier&quot;';
$lang['prompt_notify_email_template'] = 'Gabarit du courriel de notification lorsqu&#039;un fichier a &eacute;t&eacute; upload&eacute;';
$lang['title_sendfileform_sysdefault'] = 'Gabarit par d&eacute;faut pour le formulaire &quot;Envoyer un fichier&quot;';
$lang['prompt_categorydeletable'] = 'Les fichiers de cette cat&eacute;gorie peuvent &ecirc;tre supprim&eacute;s';
$lang['title_allow_delete'] = 'Autoriser la suppression de fichiers depuis le frontend';
$lang['default_templates'] = 'Mod&egrave;les par d&eacute;faut';
$lang['firstpage'] = 'Premi&egrave;re page';
$lang['prevpage'] = 'Page pr&eacute;c&eacute;dente';
$lang['nextpage'] = 'Page suivante';
$lang['lastpage'] = 'Derni&egrave;re page';
$lang['firstpage_arrow'] = '<<';
$lang['prevpage_arrow'] = '<';
$lang['nextpage_arrow'] = '>';
$lang['lastpage_arrow'] = '>>';
$lang['page'] = 'Page ';
$lang['of'] = 'De';
$lang['prompt_grouplist'] = 'Groupes FEU autoris&eacute;s';
$lang['info_grouplist'] = 'S&eacute;lectionnez les groupes FEU qui sont autoris&eacute;s &agrave; acc&eacute;der aux fichiers de cette cat&eacute;gorie. D&eacute;-s&eacute;lectionnez (Ctrl + clic) toutes les entr&eacute;es pour permettre l&#039;acc&egrave;s &agrave; tous.';
$lang['title_scan'] = 'Balayage pour les nouveaux fichiers dans cette cat&eacute;gorie';
$lang['title_create_thumbnails'] = 'Cr&eacute;er les vignettes manquantes des fichiers de cette cat&eacute;gorie';
$lang['create_thumbnails'] = 'Cr&eacute;er les vignettes';
$lang['title_create_thumbnail'] = '(Re)cr&eacute;er la vignette pour ce fichier';
$lang['create_thumbnail'] = 'Cr&eacute;er la vignette';
$lang['error_patherror'] = 'R&eacute;pertoire impossible &agrave; ouvrir (probl&egrave;me de droits ?)';
$lang['title_download_chunksize'] = 'Taille de chaque morceau t&eacute;l&eacute;charg&eacute;&nbsp;';
$lang['info_download_chunksize'] = 'Ajuster ce param&egrave;tre affectera la vitesse de t&eacute;l&eacute;chargement (download) et peut aider dans les environnements &agrave; faible capacit&eacute; m&eacute;moire';
$lang['warning_safe_mode'] = 'Le PHP &quot;safe mode&quot; est activ&eacute;. Cela peut poser un probl&egrave;me au t&eacute;l&eacute;chargement (permissions) et peut aussi interf&eacute;rer avec la capacit&eacute; de ce module &agrave; envoyer des fichiers pour cause d&#039;impossibilit&eacute; de modifier des configurations des fichiers ini. Vous &ecirc;tes invit&eacute; &agrave; contacter votre h&eacute;bergeur pour r&eacute;soudre ce probl&egrave;me.';
$lang['param_detailpage'] = 'Utile pour l&#039;affichage d&#039;un rapport d&eacute;taill&eacute; en utilisant un autre mod&egrave;le de page, ce param&egrave;tre prend l&#039;identifiant (id) de la page ou l&#039;alias de la page d&#039;une page qui doit &ecirc;tre utilis&eacute; pour afficher le d&eacute;tail de rapport';
$lang['param_prefix'] = 'Un bool&eacute;en qui indique si le nom du fichier doit &ecirc;tre pr&eacute;fix&eacute;';
$lang['param_prefix_feu'] = 'Un param&egrave;tre bool&eacute;en qui indique que le pr&eacute;fixe doivent &ecirc;tre pris &agrave; l&#039;auteur, s&#039;il n&#039;est pas sp&eacute;cifi&eacute;, le pr&eacute;fixe est l&#039;heure actuelle (dans le format dechex)';
$lang['param_nocaptcha'] = 'D&eacute;sactiver Captcha (par d&eacute;faut) dans le formulaire d&#039;envoi';
$lang['title_uploadform_template'] = 'Modifier le mod&egrave;le de formulaire d&#039;envoi';
$lang['captcha_title'] = 'Saisissez le texte a afficher dans cette image';
$lang['error_captchamismatch'] = 'Le texte entr&eacute; ne correspond &agrave; l&#039;image affich&eacute;e';
$lang['title_autothumbnail_extensions'] = 'Cr&eacute;er des vignettes pour les fichiers avec ces extensions&nbsp;';
$lang['title_autothumbnail_size'] = 'Taille maximum (pixels) de la vignette g&eacute;n&eacute;r&eacute;e&nbsp;';
$lang['prompt_upload_icon'] = 'Upload une ic&ocirc;ne';
$lang['info_sysdefault'] = 'Ce texte est utilis&eacute; lors de la cr&eacute;ation d&#039;un nouveau mod&egrave;le de ce type';
$lang['title_detailrpt_sysdefault'] = 'Mod&egrave;le par d&eacute;faut du rapport d&eacute;taill&eacute;';
$lang['title_summaryrpt_sysdefault'] = 'Mod&egrave;le sommaire par d&eacute;faut';
$lang['title_uploadform_sysdefault'] = 'Mod&egrave;le de chargement par d&eacute;faut';
$lang['template'] = 'Mod&egrave;le&nbsp;';
$lang['resettodefault'] = 'Restaurer les param&egrave;tres par d&eacute;faut';
$lang['title_summaryrpt_template'] = 'Mod&egrave;le de rapport r&eacute;sum&eacute;';
$lang['title_detailrpt_template'] = 'Mod&egrave;le du rapport detaill&eacute;';
$lang['prompt_name'] = 'Nom';
$lang['prompt_default'] = 'Par d&eacute;faut';
$lang['legend_uploadform'] = 'Uploader un fichier';
$lang['error_missingparam'] = 'Un param&egrave;tre requis est manquant';
$lang['error_missingname'] = 'Un nom pour le type de fichier doit &ecirc;tre sp&eacute;cifi&eacute;';
$lang['error_missingextensions'] = 'Au moins une extension de fichier doit &ecirc;tre sp&eacute;cifi&eacute;e';
$lang['error_missingicon'] = 'Une ic&ocirc;ne doit &ecirc;tre sp&eacute;cifi&eacute;e';
$lang['error_nosuchrow'] = 'La ligne sp&eacute;cifi&eacute;e n&#039;a pas pu &ecirc;tre trouv&eacute;e';
$lang['name_unknown'] = 'Inconnu';
$lang['description_unknown'] = 'Description du type de fichier pour les fichiers diff&eacute;rents';
$lang['image'] = 'Image ';
$lang['icon'] = 'Ic&ocirc;ne';
$lang['extensions'] = 'Extensions de fichier';
$lang['addfiletype'] = 'Ajouter un nouveau type de fichier';
$lang['file_types'] = 'Types de fichiers';
$lang['error_nocategoryid'] = 'Identifiant de cat&eacute;gorie non sp&eacute;cif&eacute;';
$lang['error_nocategory'] = 'Cat&eacute;gorie manquante';
$lang['error_templatenameexists'] = 'Un mod&egrave;le de ce nom existe d&eacute;j&agrave;';
$lang['prompt_templatename'] = 'Nom du mod&egrave;le&nbsp;';
$lang['prompt_template'] = 'Nom du mod&egrave;le&nbsp;';
$lang['prompt_newtemplate'] = 'Cr&eacute;er un nouveau mod&egrave;le';
$lang['help_OnDownload'] = '<p>Un &eacute;v&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un utilisateur termine le t&eacute;l&eacute;chargement d&#039;un fichier</p>
<h4>Param&egrave;tres</h4>
<ul>
<li><em>id</em> - Upload ID</li>
<li><em>name</em> - Nom du fichier</li>
<li><em>ip</em> - Adresse IP du t&eacute;l&eacute;chargeur</li>
</ul>
';
$lang['help_OnDeleteCategory'] = '<p>Un &eacute;v&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un utilisateur supprime une cat&eacute;gorie</p>
<h4>Param&egrave;tres</h4>
<ul>
<li><em>name</em> - Nom de la cat&eacute;gorie</li>
<li><em>path</em> - Chemin de la cat&eacute;gorie</li>
</ul>
';
$lang['help_OnCreateCategory'] = '<p>Un &eacute;v&eacute;nement g&eacute;n&eacute;r&eacute; &agrave; la cr&eacute;ation d&#039;une cat&eacute;gorie</p>
<h4>Param&egrave;tres</h4>
<ul>
<li><em>name</em> - Le nom de la cat&eacute;gorie</li>
<li><em>description</em> - La description de la cat&eacute;gorie</li>
<li><em>path</em> - Le chemin de la cat&eacute;gorie</li>
<li><em>path</em> - Un flag qui indique si la cat&eacute;gorie peut &ecirc;tre list&eacute;e</li>
</ul>
';
$lang['help_OnRemove'] = '<p>An &eacute;v&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un fichier est supprim&eacute; via l&#039;interface admin ou &quot;frontend&quot;</p>
<h4>Param&egrave;tres</h4>
<ul>
<li><em>name</em> - Nom du fichier supprim&eacute;</li>
<li><em>id</em> - Identifiant du fichier supprim&eacute;</li>
<li><em>category_id</em> - Identifiant de la cat&eacute;gorie</li>
</ul>
';
$lang['help_OnUpload'] = '<p>Un &eacute;v&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un fichier est t&eacute;l&eacute;charg&eacute; via l&#039;interface admin ou l&#039;interface &quot;frontend&quot;</p>
<h4>Param&egrave;tres</h4>
<ul>
<li><em>category</em> - Le nom de la cat&eacute;gorie</li>
<li><em>name</em> - Le nom du fichier t&eacute;l&eacute;charg&eacute; </li>
<li><em>size</em> - La taille du fichier t&eacute;l&eacute;charg&eacute; </li>
<li><em>summary</em> - La description courte du fichier t&eacute;l&eacute;charg&eacute; (peut &ecirc;tre vide)</em></li>
<li><em>description</em> - La description longue du fichier t&eacute;l&eacute;charg&eacute; (peut &ecirc;tre vide)</em></li>
<li><em>author</em> - L&#039;auteur du fichier t&eacute;l&eacute;charg&eacute; (si disponible)</em></li>
<li><em>ip_address</em> -  L&#039;adresse IP du client qui a t&eacute;l&eacute;charg&eacute; le fichier</li>
</ul>
';
$lang['info_event_ondeletecategory'] = 'Ev&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;une cat&eacute;gorie est supprim&eacute;e';
$lang['info_event_oncreatecategory'] = 'Ev&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;une cat&eacute;gorie est cr&eacute;e';
$lang['info_event_ondownload'] = 'Ev&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un fichier est t&eacute;l&eacute;charg&eacute;';
$lang['info_event_onupload'] = 'Ev&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un nouveau fichier est t&eacute;l&eacute;charg&eacute;';
$lang['info_event_onremove'] = 'Ev&eacute;nement g&eacute;n&eacute;r&eacute; lorsqu&#039;un fichier est supprim&eacute;';
$lang['title_usertag_onupload'] = 'Tag d&eacute;fini par l&#039;utilisateur a appeller apr&egrave;s un t&eacute;l&eacute;chargement termin&eacute;&nbsp;';
$lang['none'] = 'Aucun';
$lang['matchesfound'] = 'R&eacute;sultats trouv&eacute;s';
$lang['filter'] = 'Filtre';
$lang['title_redirectonupload'] = 'Rediriger vers la page id/alias au chargement par l&#039;utilisateur&nbsp;';
$lang['details'] = 'D&eacute;tails';
$lang['confirm_preferences'] = '&Ecirc;tes-vous sur de vouloir modifier les pr&eacute;f&eacute;rences ?';
$lang['error_nofilesuploaded'] = 'Pas de fichier t&eacute;l&eacute;charg&eacute;.';
$lang['prompt_replace'] = 'Autoriser l&#039;&eacute;crasement de fichier';
$lang['info_replace'] = 'Remplacer tout fichier portant le m&ecirc;me nom (l&#039;identifiant ne change pas)';
$lang['param_no_initial'] = 'Ne pas afficher les premiers r&eacute;sultats lorsque le filtre est actif';
$lang['param_key'] = 'Fourni une clef additionnelle au module pour organiser les uploads. Cette clef peut &ecirc;tre une cha&icirc;ne de caract&egrave;re du type : &#039;feusers:uid&#039; etc.<br/>
Ce param&egrave;tre est habituellement n&eacute;cessaire uniquement lorsque ce module est embarqu&eacute; dans un autre module.';
$lang['param_noauthor'] = 'Masque le champ auteur du formulaire de chargement. Ce param&egrave;tre est valable uniquement en mode=&#039;upload&#039;. Si le module FEU est install&eacute; et qu&#039;un utilisateur est connect&eacute;, un champ cach&eacute; va maintenir le nom d&#039;utilisateur actuellement connect&eacute;';
$lang['param_upload_id'] = 'Sp&eacute;cifie un fichier unique pour l&#039;URL ou le lien ou le mode (cf ci-dessus)';
$lang['param_detailtemplate'] = 'Utiliser un mod&egrave;le de ce nom pour le rapport d&eacute;taill&eacute;.';
$lang['param_template'] = 'Utiliser un mod&egrave;le de ce nom pour ce rapport ou formulaire. Le mode est utilis&eacute; pour d&eacute;terminer quel type de mod&egrave;le est requis, puis un nom correspondant est effectu&eacute; au sein de ce type.';
$lang['param_filter'] = 'Affiche le formulaire de filtrage';
$lang['param_no_intitial'] = 'Utile uniquement lorsque le param&egrave;tre filtre est fourni, ou on par d&eacute;faut, this parameter indicates wether initial results should be returned';
$lang['param_filetypes'] = 'Affiche uniquement les fichiers dont le type correspond &agrave; cette liste separ&eacute;e par des virgules';
$lang['param_sortorder'] = '  <p>Ordres de tri
  <ul>
  <li><em>date_asc</em> - Tri&eacute; par date croissante</li>
  <li><em>date_desc</em> - Tri&eacute; par date d&eacute;croissante</li>
  <li><em>name_asc</em> - Tri&eacute; alphab&eacute;tiquement par ordre croissant</li>
  <li><em>name_desc</em> -Tri&eacute; alphab&eacute;tiquement par ordre d&eacute;croissant</li>
  <li><em>size_asc</em> - Tri&eacute; par taille croissante</li>
  <li><em>size_desc</em> - Tri&eacute; par taille d&eacute;croissante</li>
  <li><em>desc_asc</em> - Tri&eacute; par description croissante/li>
  <li><em>desc_desc</em> - Tri&eacute; par description d&eacute;croissante</li>
  <li><em>author_asc</em> - Tri&eacute; par auteur croissant</li>
  <li><em>author_desc</em> - Tri&eacute; par auteur d&eacute;croissant</li>
  <li><em>ip_asc</em> - Tri&eacute; par adresse IP croissante</li>
  <li><em>ip_desc</em> - Tri&eacute; par adresse IP d&eacute;croissante</li>
  <li><em>random</em> - Tri al&eacute;atoire</li>
  </ul>
  </p>';
$lang['param_listingtemplate'] = 'Mod&egrave;le &agrave; utiliser pour lister les cat&eacute;gories apr&egrave;s un clique depuis la page de r&eacute;sum&eacute; des cat&eacute;gories';
$lang['param_listingsortorder'] = 'Ordre de tri (fa&ccedil;on param_sortorder) &agrave; utiliser pour la liste des cat&eacute;gories apr&egrave;s un clique depuis la page de r&eacute;sum&eacute; des cat&eacute;gories';
$lang['param_fileextensions'] = 'Valide uniquement lorsque mode=&quot;upload&quot;, ce param&egrave;tre limite le type de fichiers qui peuvent &ecirc;tre t&eacute;l&eacute;charg&eacute;s. Il surpasse tout r&eacute;glage des pr&eacute;f&eacute;rences du module.';
$lang['param_count'] = 'Permet de lister seulement les N premiers r&eacute;sultats de la recherche (count=&quot;N&quot;) et d&#039;am&eacute;liorer ainsi la mise en page.';
$lang['param_category'] = 'category=&quot;name&quot;
<p><b>Note:</b> Category peut &ecirc;tre &quot;all&quot;, pour afficher toutes les cat&eacute;gories <em>listables</em></p>';
$lang['param_mode'] = '  <ul>
  <li><em>detailed</em> - Affiche une liste d&eacute;taill&eacute; de tout les fichiers dans une cat&eacute;gorie</li>
  <li><em>upload</em> - Affiche un formulaire pour permettre aux FEU de charger des fichiers</li>
  <li><em>url <i>or</i> link</em> - Affiche un lien vers un fichier</li>
  <li><em>summary</em> - Affiche une liste r&eacute;sum&eacute;e de tous les fichiers dans une cat&eacute;gorie</li>
  <li><em>single</em> - Affiche un rapport d&eacute;taill&eacute; concernant un seul chargement</li>
  <li><em>singlesummary</em> - Affiche un rapport r&eacute;sum&eacute; concernant un seul chargement</li>
  </ul>';
$lang['param_selectform'] = 'Quand le mode &#039;select&#039; est utilis&eacute;, ce param&egrave;tre sp&eacute;cifie le l&#039;id (identifiant) de la feuille parent. Utiliser pour passer le param&egrave;tre.';
$lang['param_selectname'] = 'Quand le mode &#039;select&#039; est utilis&eacute;, ce param&egrave;tre sp&eacute;cifie le nom du champ';
$lang['param_selectvalue'] = 'Quand le mode &#039;select&#039; est utilis&eacute;, ce param&egrave;tre sp&eacute;cifie la valeur par d&eacute;faut du champ';
$lang['param_selectnone'] = 'Quand le mode &#039;select&#039; est utilis&eacute;, ce param&egrave;tre indique si &#039;none&#039; est un choix valide';
$lang['returntomodule'] = 'Retour au panneau d&#039;administration du module';
$lang['error_nocategories'] = 'Il n&#039;y a pas de cat&eacute;gories d&eacute;finies';
$lang['title_enforceextensions'] = 'Exiger des extensions sur tous les fichiers charg&eacute;s&nbsp;';
$lang['restoredefaultsconfirm'] = 'Cette op&eacute;ration va restaurer les gabarits par d&eacute;faut. Toutes les modifications de vos gabarits seront perdues. &Ecirc;tes-vous sur ?';
$lang['thumbnail'] = 'Vignette';
$lang['newthumbnail'] = 'Uploader une nouvelle vignette';
$lang['info_summary'] = 'Une description br&egrave;ve du fichier (si vide, le nom du fichier sans l&#039;extension est utilis&eacute;)';
$lang['info_categoryname'] = 'Un nom court de votre cat&eacute;gorie (humainement compr&eacute;hensible)';
$lang['info_categorydesc'] = 'Une description de votre cat&eacute;gorie';
$lang['info_categorypath'] = 'Le nom de r&eacute;pertoire &agrave; l&#039;int&eacute;rieur du r&eacute;pertoire de chargement qui sera utilis&eacute; pour stocker les fichiers dans cette cat&eacute;gorie. Si le r&eacute;pertoire n&#039;existe pas d&eacute;j&agrave;, il peut &ecirc;tre cr&eacute;&eacute;.';
$lang['info_destname'] = 'C&#039;est le nouveau nom du fichier apr&egrave;s t&eacute;l&eacute;chargement (permet de renommer le fichier au t&eacute;l&eacute;chargement). Laisser vide pour conserver le nom de fichier original.';
$lang['error_cantcreatedirectory'] = 'Impossible de cr&eacute;er ce r&eacute;pertoire';
$lang['error_nomailermodule'] = 'Le module CMSmailer ne peut &ecirc;tre contact&eacute;';
$lang['upload_notification'] = 'Un nouveau fichier a &eacute;t&eacute; charg&eacute; !';
$lang['title_email_on_upload'] = 'Envoyer les notifications de chargement &agrave;&nbsp;';
$lang['email_template'] = 'Gabarit de courriel';
$lang['title_dummy_index_html'] = 'Cr&eacute;er un fichier index.html dans chaque r&eacute;pertoire ?<br/><em>un index.html existant, restera</em>&nbsp;';
$lang['about'] = 'A propos de';
$lang['error_permissiondenied'] = 'Acc&eacute;s refus&eacute;. V&eacute;rifiez vos droits.';
$lang['error_couldnotwrite'] = 'Impossible d&#039;&eacute;crire';
$lang['addcategory'] = 'Ajouter une cat&eacute;gorie';
$lang['all'] = 'Tout(e)s';
$lang['areyousure'] = '&Ecirc;tes-vous sur(e) ?';
$lang['author'] = 'Auteur';
$lang['cancel'] = 'Annuler';
$lang['cannotmodifypath'] = '(le chemin ne peut &ecirc;tre modifi&eacute;)';
$lang['categories'] = 'Cat&eacute;gories';
$lang['category'] = 'Cat&eacute;gorie';
$lang['message_categoryadded'] = 'Cat&eacute;gorie ajout&eacute;e';
$lang['date'] = 'Date ';
$lang['dateuploaded'] = 'Date de chargement';
$lang['default'] = 'Par d&eacute;faut';
$lang['delete'] = 'Supprimer';
$lang['description'] = 'Description ';
$lang['destname'] = 'T&eacute;l&eacute;charger en tant que';
$lang['detail_template'] = 'Gabarit de d&eacute;tails';
$lang['downloaded'] = 'Le fichier %s a &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;.';
$lang['downloads'] = 'T&eacute;l&eacute;chargements';
$lang['edit'] = 'Modifier';
$lang['editcategory'] = 'Modifier la cat&eacute;gorie';
$lang['editupload'] = 'Modifier le fichier';
$lang['error'] = 'Erreur !';
$lang['error_pathinuse2'] = 'Une cat&eacute;gorie avec ce chemin (%s) existe d&eacute;j&agrave;';
$lang['error_pathinuse'] = 'Une cat&eacute;gorie utilisant ce chemin existe d&eacute;j&agrave;';
$lang['error_categoryexists2'] = 'Erreur : une cat&eacute;gorie &quot;%s&quot; existe d&eacute;j&agrave;';
$lang['error_categoryexists'] = 'Erreur : Cette cat&eacute;gorie existe d&eacute;j&agrave;';
$lang['error_categorynotempty'] = 'Erreur : Impossible de supprimer une cat&eacute;gorie qui n&#039;est pas vide';
$lang['error_categorynotfound'] = 'Erreur : Cat&eacute;gorie non trouv&eacute;e !';
$lang['error_dberror'] = 'Erreur : Erreur de base de donn&eacute;es !';
$lang['error_emptycategory'] = 'Erreur : Cat&eacute;gorie vide !';
$lang['error_emptypath'] = 'Erreur : Chemin vide !';
$lang['error_fileexists'] = 'Erreur : Le fichier %s &eacute;xiste d&eacute;j&agrave; !';
$lang['error_filenotfound'] = 'Erreur : Le fichier %s n&#039;a pas &eacute;t&eacute; trouv&eacute; !';
$lang['error_insufficientparams'] = 'Erreur : Insuffisance de param&egrave;tres fournis au module !';
$lang['error_invalidauthor'] = 'Erreur : Auteur non valide (ou vide).';
$lang['error_invalidcategory'] = 'Erreur : cat&eacute;gorie non valide (ou vide).';
$lang['error_invaliddescription'] = 'Erreur : Description invalide (ou vide).';
$lang['error_invalidfile'] = 'Erreur : Nom de fichier non valide (ou vide).';
$lang['error_invaliduploadfilename'] = 'Erreur : Les fichiers avec ce nom (probablement extension) ne sont pas autoris&eacute;es (%s).';
$lang['error_invaliduploadid'] = 'Erreur : Identifiant de chargement invalide';
$lang['error_nofiles'] = 'Erreur : Pas de fichiers correspondant !';
$lang['files'] = 'Fichiers';
$lang['fixme'] = 'Fixe les espaces';
$lang['friendlyname'] = 'Gestion de Fichiers (Uploads)';
$lang['help'] = '<h3>Que fait ce module ?</h3>
<p>Il s&#039;agit d&#039;un module pour permettre aux utilisateurs de transf&eacute;rer et de t&eacute;l&eacute;charger des fichiers vers et &agrave; partir de votre site. Il garde la trace de qui a transf&eacute;r&eacute; un fichier et qui a t&eacute;l&eacute;charg&eacute;. De plus, vous pouvez trier les dossiers en cat&eacute;gories et g&eacute;rer les fichiers qui ont &eacute;t&eacute; transf&eacute;r&eacute;s comme chaque administrateur aime le faire.</p> 
<h3>Comment l&#039;utiliser ?</h3>
<p><strong>Attention</strong> - La bonne marche de ce module d&eacute;pend de plusieurs variables php. Cela inclus <em>(mais pas seulement)</em> php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize et max_execution_time. Ces variables devront peut-&ecirc;tre &ecirc;tre ajust&eacute;es pour que le module fonctionne correctement sur votre site. Il vous est conseill&eacute; de travailler avec votre h&eacute;bergeur ou administrateur pour configurer ces param&egrave;tres.</p>
<p>Pour utiliser ce module et permettre aux utilisateurs de charger des fichiers sur votre site, vous devriez installer le module et, ensuite, cr&eacute;er une ou plusieurs cat&eacute;gories. N&#039;oubliez pas de cr&eacute;er d&#039;abord les r&eacute;pertoires. Ensuite ajouter sur vos page un tag (balise) du style {cms_module module=&quot;Uploads&quot; category=&quot;somecategory&quot; mode=&quot;somemode&quot;}. O&ugrave; mode correspond &agrave; un des modes list&eacute;s en bas. Le r&eacute;sultat sera diff&eacute;rent en fonction du mode choisi.</p>
<p>Ce module peut utiliser le module FrontEndUser (FEU) (optionel) pour r&eacute;cup&eacute;rer les informations concernant les utilisateurs actuellement connect&eacute;s.</p>
<h3>Permissions</h3>
<ul>
<li><em>Manage Uploads</em> : Permission requises pour g&eacute;rer les cat&eacute;gories et les fichiers.</li>
<li><em>Modify Templates</em> : Permission requise pour &eacute;diter les mod&egrave;les.</li>
<li><em>Modify Site Preferences</em> : Permission requise pour modifier la configuration.</li>
</ul>
<h3>Envoi d&#039;email</h3>
<p>Ce module est capable d&#039;envoyer un email quand un fichier est charg&eacute; (voyez l&#039;onglet pr&eacute;f&eacute;rences). Pour cela, le module <b>CMSMailer</b> doit &ecirc;tre install&eacute; et configur&eacute;. C&#039;est une &eacute;tape <em>optionnelle</em> et si le module CMSMailer n&#039;est pas install&eacute;, l&#039;utilisateur ne se rendra compte de rien, seul un message de log sera ajout&eacute; aux logs d&#039;administration.</p>
<h3>Content Blocks <em>(Seulement CMSMS 1.7 +)</em></h3>
<p>For CMSMS 1.7 this module is capable of interfacing with the content editor and exporting a content block that allows selecting an uploads category within the edit content page, for later use within the template.</p>
<p>i.e: placing the following tag within a page template <code>{content_module module=&amp;quot;Uploads&amp;quot; block=&amp;quot;uploads_category&amp;quot; type=&amp;quot;categoryselect&amp;quot;}</code>, will add a dropdown box in the edit content view of any page utilizing that page template.</p>
<p>This content block also accepts some optional parameters:</p>
<ul>
  <li><u>selectone</u>
    <p>This parameter inserts a &amp;quot;Select One&amp;quot; item into the list of categories, requiring the user to select a valid category when the content page is saved.</p>
  </li>
  <li><u>allowall</u>
    <p>This parameter allows the content editor to select &amp;quot;All&amp;quot; as a category for the uploads display.</p>
  </li>
</ul>
<h4>How would I use it?</h4>
<p>Here is some example code:</p>
<pre>
{content_module module=&amp;quot;Uploads&amp;quot; block=&amp;quot;categoryselect&amp;quot; label=&amp;quot;Select an uploads category&amp;quot; selectone=1 assign=&amp;quot;tmp&amp;quot;}
{Uploads category=$tmp}
</pre>

<h3>Configuration syst&egrave;me</h3>
<p><b>Note :</b> Ce module travaille en conjonction avec les r&eacute;glages de PHP et ne peut les outrepasser. Vous pourriez avoir besoins de modifier votre fichier &#039;php.ini&#039; et/ou votre fichier &#039;httpd.conf&#039; pour vous permettre de charger des fichiers de la taille d&eacute;finie dans les pr&eacute;f&eacute;rences du module.</p>
<h3>Notes Apache</h3>
<p>Pour permettre le t&eacute;l&eacute;chargement de fichier de grande taille, vous devrez modifier le param&egrave;tre &#039;upload_max_filesize&#039; de votre &#039;php.ini&#039;. De plus, le param&egrave;tre LimitRequestBody dans votre configuration Apache, doit &ecirc;tre ajust&eacute; pour correspondre au param&egrave;tre upload_max_filesize.</p>
<p>Note : la directive &#039;upload_max_filesize&#039; peut &ecirc;tre sp&eacute;cifi&eacute;e en octets, kilo-octets ou m&eacute;ga-octets, mais le param&egrave;tre &#039;LimitRequetBody&#039; est seulement sp&eacute;cifi&eacute; en octets.</p>
';
$lang['id'] = 'Identifiant';
$lang['installed'] = 'Version %s du module install&eacute;.';
$lang['ip_address'] = 'Adresse IP';
$lang['moddescription'] = 'Un module qui permet aux utilisateurs de transf&eacute;rer des fichiers, et vous permet de les g&eacute;rer.';
$lang['name'] = 'Nom';
$lang['renamemessage'] = 'Changer le nom ici renommer le fichier';
$lang['path'] = 'Chemin';
$lang['pathmessage'] = 'Changer la cat&eacute;gorie ici pour d&eacute;placer les fichiers dans un autre r&eacute;pertoire';
$lang['pathinuploads'] = '(Par rapport au r&eacute;pertoire &quot;uploads/&quot;)';
$lang['postinstall'] = '<p>Le module Uploads &agrave; &eacute;t&eacute; install&eacute; avec succ&egrave;s. Assurez-vous de r&eacute;gler les permissions &quot;Manage Uploads&quot; pour utiliser ce module !</p>
<p><strong>Attention</strong> - La bonne marche de ce module d&eacute;pend de plusieurs variables php. Cela inclus <em>(mais pas seulement)</em> php&#039;s memory_limit, safe_mode, file_uploads, uploads_max_filesize et max_execution_time. Ces variables devront peut-&ecirc;tre &ecirc;tre ajust&eacute;es pour que le module fonctionne correctement sur votre site. Il vous est conseill&eacute; de travailler avec votre h&eacute;bergeur ou administrateur pour configurer ces param&egrave;tres.</p>';
$lang['postuninstall'] = 'Le module Uploads a &eacute;t&eacute; supprim&eacute;. Aucun fichier n&#039;a &eacute;t&eacute; supprim&eacute; de votre r&eacute;pertoire de t&eacute;l&eacute;chargement et l&#039;int&eacute;grit&eacute; des fichiers est rest&eacute;e intacte.';
$lang['preferences'] = 'Pr&eacute;f&eacute;rences';
$lang['prefsupdated'] = 'Les pr&eacute;f&eacute;rences du module ont &eacute;t&eacute; mises &agrave; jour.';
$lang['prompt_categorydesc'] = 'Description ';
$lang['prompt_categorylistable'] = 'Les fichiers de ce r&eacute;pertoire peuvent &ecirc;tre list&eacute;s';
$lang['prompt_categoryname'] = 'Nom de la cat&eacute;gorie';
$lang['prompt_categorypath'] = 'Chemin du serveur';
$lang['prompt_deletedirectory'] = 'Supprimer le dossier de la cat&eacute;gorie ';
$lang['prompt_max_uploadsize'] = 'Taille de fichier maximale autoris&eacute;e (Ko)&nbsp;';
$lang['prompt_valid_uploadextensions'] = 'Extensions valide pour l&#039;upload';
$lang['scan'] = 'Parcourir';
$lang['selectcategory'] = 'Choisir une cat&eacute;gorie';
$lang['size'] = 'Taille';
$lang['sizekb'] = 'Taille (Kb)';
$lang['submit'] = 'Envoyer';
$lang['summary_template'] = 'Mod&egrave;le de r&eacute;sum&eacute;';
$lang['summary'] = 'Description';
$lang['title_admin_panel'] = 'Module de chargement';
$lang['title_mod_admin'] = 'Panneau Admin du module';
$lang['title_mod_prefs'] = 'Pr&eacute;f&eacute;rence du module';
$lang['title_subnet_exclusions'] = 'Exclure sous-r&eacute;seaux des statistiques&nbsp;';
$lang['title_valid_uploadextensions'] = 'Extensions valides&nbsp;';
$lang['uninstalled'] = 'Module d&eacute;sinstall&eacute;.';
$lang['upgraded'] = 'Module mise &agrave; jour vers la version %s.';
$lang['upload'] = 'T&eacute;l&eacute;chargement';
$lang['uploaded'] = 'Le fichier %s &agrave; &eacute;t&eacute; charg&eacute; par %s.';
$lang['replaced'] = 'Le fichier %s &agrave; &eacute;t&eacute; remplac&eacute; par %s.';
$lang['deleted'] = 'Le fichier %s &agrave; &eacute;t&eacute; supprim&eacute;.';
$lang['uploadform_template'] = 'Gabarit d&#039;upload';
$lang['username'] = 'Nom d&#039;utilisateur';
$lang['warning_deletecategory'] = 'AVERTISSEMENT : Soyez prudent lorsque vous supprimez des cat&eacute;gories : vous pouvez perdre des fichiers.';
$lang['qca'] = 'P0-1776187459-1287758187777';
$lang['utma'] = '156861353.1242723723.1297342949.1299510508.1299513387.10';
$lang['utmz'] = '156861353.1299513387.10.10.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>