<?php

/**
 * Slovak (Slovakia) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('sk_SK', $lang) && is_array($lang['sk_SK'])) {
	$lang['sk_SK'] = array_merge($lang['en_US'], $lang['sk_SK']);
} else {
	$lang['sk_SK'] = $lang['en_US'];
}

$lang['sk_SK']['AssetAdmin']['CHOOSEFILE'] = 'Vybrať súbor';
$lang['sk_SK']['AssetAdmin']['CONTENTMODBY'] = 'Obsah upraviteľný pre';
$lang['sk_SK']['AssetAdmin']['CONTENTUSABLEBY'] = 'Obsah použiteľný pre';
$lang['sk_SK']['AssetAdmin']['DELETEDX'] = 'Odstránených %s súborov.%s';
$lang['sk_SK']['AssetAdmin']['FILESREADY'] = 'Súbory pripravené na nahranie:';
$lang['sk_SK']['AssetAdmin']['MENUTITLE'] = 'Súbory a obrázky';
$lang['sk_SK']['AssetAdmin']['MOVEDX'] = 'Presunuté %s súbory';
$lang['sk_SK']['AssetAdmin']['NEWFOLDER'] = 'Nový Adresár';
$lang['sk_SK']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Žiadne súbory na nahranie';
$lang['sk_SK']['AssetAdmin']['NOWBROKEN'] = 'Tieto stránky majú momentálne nefunkčné odkazy:';
$lang['sk_SK']['AssetAdmin']['OWNER'] = 'Vlastník';
$lang['sk_SK']['AssetAdmin']['SAVEDFILE'] = 'Súbor uložený %s';
$lang['sk_SK']['AssetAdmin']['SAVEFOLDERNAME'] = 'Uložiť meno adresára';
$lang['sk_SK']['AssetAdmin']['UPLOAD'] = 'Nahrať nižšie vypísané súbory';
$lang['sk_SK']['AssetAdmin']['UPLOADEDX'] = 'Nahraných %s súborov';
$lang['sk_SK']['AssetAdmin_left.ss']['CREATE'] = 'Vytvoriť';
$lang['sk_SK']['AssetAdmin_left.ss']['DELETE'] = 'Vymazať';
$lang['sk_SK']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Vymazať vybrané adresáre';
$lang['sk_SK']['AssetAdmin_left.ss']['FOLDERS'] = 'Adresáre';
$lang['sk_SK']['AssetAdmin_left.ss']['GO'] = 'Vykonať';
$lang['sk_SK']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Vyberte adresáre, ktoré chcete vymazať a kliknite na tlačidlo nižšie';
$lang['sk_SK']['AssetAdmin_left.ss']['TOREORG'] = 'Pretiahnutím si adresáre zorganizujete podľa svojich prianí.';
$lang['sk_SK']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Prosím vyberte stránku zľava.';
$lang['sk_SK']['AssetAdmin_right.ss']['WELCOME'] = 'Vitajte v';
$lang['sk_SK']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'Nemáte oprávnenie nahrávať súbory do tohto adresára.';
$lang['sk_SK']['AssetTableField']['CREATED'] = 'Prvýkrát nahrané';
$lang['sk_SK']['AssetTableField']['DIM'] = 'Rozmery';
$lang['sk_SK']['AssetTableField']['FILENAME'] = 'Názov';
$lang['sk_SK']['AssetTableField']['LASTEDIT'] = 'Posledne zmenené';
$lang['sk_SK']['AssetTableField']['NOLINKS'] = 'Na tento súbor nevedie odkaz zo žiadnej stránky';
$lang['sk_SK']['AssetTableField']['OWNER'] = 'Vlastník';
$lang['sk_SK']['AssetTableField']['PAGESLINKING'] = 'Nasledujúce stránky odkazujú na tento súbor:';
$lang['sk_SK']['AssetTableField']['SIZE'] = 'Veľkosť';
$lang['sk_SK']['AssetTableField.ss']['DELFILE'] = 'Vymazať tento súbor';
$lang['sk_SK']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Súbor presuniete pretiahnutím do adresára vľavo';
$lang['sk_SK']['AssetTableField']['TITLE'] = 'Titulok';
$lang['sk_SK']['AssetTableField']['TYPE'] = 'Typ';
$lang['sk_SK']['CMSLeft.ss']['DELPAGE'] = 'Vymazať stránky...';
$lang['sk_SK']['CMSLeft.ss']['DELPAGES'] = 'Vymazať vybrané stránky';
$lang['sk_SK']['CMSLeft.ss']['GO'] = 'Vykonať';
$lang['sk_SK']['CMSLeft.ss']['NEWPAGE'] = 'Nová stránka';
$lang['sk_SK']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Vyberte stránky, ktoré chcete vymazať a kliknite na tlačidlo nižšie';
$lang['sk_SK']['CMSLeft.ss']['SITECONT'] = 'Obsah webu';
$lang['sk_SK']['CMSMain']['CANCEL'] = 'Zrušiť';
$lang['sk_SK']['CMSMain']['CHOOSEREPORT'] = '(Vyberte správu)';
$lang['sk_SK']['CMSMain']['COMPARINGV'] = 'Porovnávate verzie #%d a #%d';
$lang['sk_SK']['CMSMain']['COPYPUBTOSTAGE'] = 'Naozaj chcete skopírovať publikovaný obsah do úschovne?';
$lang['sk_SK']['CMSMain']['DELETEFP'] = 'Vymazať z publikovaných článkov';
$lang['sk_SK']['CMSMain']['EMAIL'] = 'Pošli e-mailom';
$lang['sk_SK']['CMSMain']['GO'] = 'Vykonať';
$lang['sk_SK']['CMSMain']['MENUTITLE'] = 'Obsah webu';
$lang['sk_SK']['CMSMain']['METADESCOPT'] = 'Popis';
$lang['sk_SK']['CMSMain']['METAKEYWORDSOPT'] = 'Kľúčové slová';
$lang['sk_SK']['CMSMain']['NEW'] = 'Nový';
$lang['sk_SK']['CMSMain']['NOCONTENT'] = 'bez obsahu';
$lang['sk_SK']['CMSMain']['NOTHINGASSIGNED'] = 'Nemáte nič pridelené.';
$lang['sk_SK']['CMSMain']['NOWAITINGON'] = 'Nečakáte na nikoho.';
$lang['sk_SK']['CMSMain']['NOWBROKEN'] = 'Nasledujúce stránky obsahujú chybné adresy(linky):';
$lang['sk_SK']['CMSMain']['NOWBROKEN2'] = 'Ich majitelia boli upozornení e-mailom a opravia dané stránky.';
$lang['sk_SK']['CMSMain']['OK'] = 'Ok';
$lang['sk_SK']['CMSMain']['PAGEDEL'] = '%d stránka vymazaná.';
$lang['sk_SK']['CMSMain']['PAGENOTEXISTS'] = 'Táto stránka neexistuje.';
$lang['sk_SK']['CMSMain']['PAGEPUB'] = '%d stránka publikovaná ';
$lang['sk_SK']['CMSMain']['PAGESDEL'] = '%d stránky vymazané.';
$lang['sk_SK']['CMSMain']['PAGESPUB'] = '%d stránok publikovaných ';
$lang['sk_SK']['CMSMain']['PAGETYPEOPT'] = 'Typ stránky';
$lang['sk_SK']['CMSMain']['PRINT'] = 'Vytlač';
$lang['sk_SK']['CMSMain']['PUBALLCONFIRM'] = 'Publikovať všetky stránky z úschovne';
$lang['sk_SK']['CMSMain']['PUBALLFUN'] = 'Funkcia "Publikovať všetko"';
$lang['sk_SK']['CMSMain']['PUBALLFUN2'] = 'Stlačením tohto tlačidla vykonáte to isté ako keby ste navštívili každú stránku a stlačili "publikuj". Je určené na použite po rozsiahlych zmenách obsahu, napríklad keď bol web prvýkrát vytvorený.';
$lang['sk_SK']['CMSMain']['PUBPAGES'] = 'Dokončené: Publikovaných %d stránok';
$lang['sk_SK']['CMSMain']['REMOVEDFD'] = 'Vymazané z rozpísaných článkov';
$lang['sk_SK']['CMSMain']['REMOVEDPAGE'] = 'Odstránené \'%s\' z publikovaného webu';
$lang['sk_SK']['CMSMain']['RESTORE'] = 'Obnoviť';
$lang['sk_SK']['CMSMain']['RESTORED'] = 'Obnovenie %s úspešné';
$lang['sk_SK']['CMSMain']['ROLLBACK'] = 'Návrat späť na túto verziu';
$lang['sk_SK']['CMSMain']['ROLLEDBACKPUB'] = 'Vrátené späť na publikovanú verziu. Číslo novej verzie je #%d';
$lang['sk_SK']['CMSMain']['ROLLEDBACKVERSION'] = 'Vrátené späť na verziu: #%d. Číslo novej verzie je #%d';
$lang['sk_SK']['CMSMain']['SAVE'] = 'Uložiť';
$lang['sk_SK']['CMSMain']['SENTTO'] = 'Odoslať osobe %s %s na schválenie';
$lang['sk_SK']['CMSMain']['STATUSOPT'] = 'Stav';
$lang['sk_SK']['CMSMain']['TOTALPAGES'] = 'Celkovo stránok:';
$lang['sk_SK']['CMSMain']['VERSIONSNOPAGE'] = 'Nemôžem nájsť stránku #%d';
$lang['sk_SK']['CMSMain']['VIEWING'] = 'Prezeráte si verziu #%d, vytvorenú %s
';
$lang['sk_SK']['CMSMain']['VISITRESTORE'] = 'navštíviť restorepage/(ID)';
$lang['sk_SK']['CMSMain']['WAITINGON'] = 'Čakáte za inými ľuďmi, aby ste mohli pracovať na týchto <b>%d</b> stránkach';
$lang['sk_SK']['CMSMain']['WORKTODO'] = 'Máte nedokončenú prácu na týchto <b>%d</b> stránkach.';
$lang['sk_SK']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Pridané na návrh webu, ešte nepublikované';
$lang['sk_SK']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Pridať kritérium...';
$lang['sk_SK']['CMSMain_left.ss']['BATCHACTIONS'] = 'Hromadné akcie';
$lang['sk_SK']['CMSMain_left.ss']['CHANGED'] = 'zmenené';
$lang['sk_SK']['CMSMain_left.ss']['CLOSEBOX'] = 'kliknite pre zatvorenie tohto poľa';
$lang['sk_SK']['CMSMain_left.ss']['COMMENTS'] = 'Komentáre';
$lang['sk_SK']['CMSMain_left.ss']['COMPAREMODE'] = 'Porovnávací mód (kliknite nižšie)';
$lang['sk_SK']['CMSMain_left.ss']['CREATE'] = 'Vytvoriť';
$lang['sk_SK']['CMSMain_left.ss']['DEL'] = 'odstránené';
$lang['sk_SK']['CMSMain_left.ss']['DELETECONFIRM'] = 'Vymazať vybrané stránky';
$lang['sk_SK']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Odstránené z návrhu webu ale stále na aktuálnom webe';
$lang['sk_SK']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Upravené na návrhovom webe, ešte nepublikované ';
$lang['sk_SK']['CMSMain_left.ss']['EDITEDSINCE'] = 'Upravené od';
$lang['sk_SK']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'Povoliť jednoduché organizovanie pretiahnutím';
$lang['sk_SK']['CMSMain_left.ss']['GO'] = 'Vykonať';
$lang['sk_SK']['CMSMain_left.ss']['KEY'] = 'Kľúč:';
$lang['sk_SK']['CMSMain_left.ss']['NEW'] = 'nový';
$lang['sk_SK']['CMSMain_left.ss']['OPENBOX'] = 'kliknite pre otvorenie tohto poľa';
$lang['sk_SK']['CMSMain_left.ss']['PAGEVERSIONH'] = 'História verzií stránok ';
$lang['sk_SK']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Publikovať vybrané stránky';
$lang['sk_SK']['CMSMain_left.ss']['SEARCH'] = 'Hľadať';
$lang['sk_SK']['CMSMain_left.ss']['SEARCHTITLE'] = 'Hľadať v URL, titulkoch, položkách menu, &amp; v obsahu';
$lang['sk_SK']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Vyberte stránky, ktoré chcete zmeniť a potom kliknite na akciu';
$lang['sk_SK']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Vyberte stránky, ktoré chcete duplikovať, či chcete duplikovať aj ich podstránky a kam chcete nové kópie umiestniť';
$lang['sk_SK']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Ukázať len zmenené stránky';
$lang['sk_SK']['CMSMain_left.ss']['SHOWUNPUB'] = 'Ukázať nepublikované verzie';
$lang['sk_SK']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Obsah a štruktúra webu';
$lang['sk_SK']['CMSMain_left.ss']['SITEREPORTS'] = 'Správy webu';
$lang['sk_SK']['CMSMain_left.ss']['TASKLIST'] = 'Zoznam úloh';
$lang['sk_SK']['CMSMain_left.ss']['WAITINGON'] = 'Čaká sa na ';
$lang['sk_SK']['CMSMain_right.ss']['ANYMESSAGE'] = 'Máte nejaké správy pre svojho editora?';
$lang['sk_SK']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Prosím vyberte si stránku zľava.';
$lang['sk_SK']['CMSMain_right.ss']['LOADING'] = 'nahrávam...';
$lang['sk_SK']['CMSMain_right.ss']['MESSAGE'] = 'Správa';
$lang['sk_SK']['CMSMain_right.ss']['SENDTO'] = 'Poslať';
$lang['sk_SK']['CMSMain_right.ss']['STATUS'] = 'Stav';
$lang['sk_SK']['CMSMain_right.ss']['SUBMIT'] = 'Odoslať na schválenie';
$lang['sk_SK']['CMSMain_right.ss']['WELCOMETO'] = 'Vitajte na';
$lang['sk_SK']['CMSMain_versions.ss']['AUTHOR'] = 'Autor';
$lang['sk_SK']['CMSMain_versions.ss']['NOTPUB'] = 'Nepublikované';
$lang['sk_SK']['CMSMain_versions.ss']['PUBR'] = 'Vydavateľ';
$lang['sk_SK']['CMSMain_versions.ss']['UNKNOWN'] = 'Neznámy';
$lang['sk_SK']['CMSMain_versions.ss']['WHEN'] = 'Kedy';
$lang['sk_SK']['CMSRight.ss']['CHOOSEPAGE'] = 'Prosím vyberte si stránku zľava.';
$lang['sk_SK']['CMSRight.ss']['ECONTENT'] = 'Upraviť obsah';
$lang['sk_SK']['CMSRight.ss']['WELCOMETO'] = 'Vitajte na';
$lang['sk_SK']['CommentAdmin']['MENUTITLE'] = 'Komentáre';
$lang['sk_SK']['CommentList.ss']['CREATEDW'] = 'Komentáre sa vytvárajú vždy keď vykonáte nejakú pracovnú akciu - Publikovanie, Odmietnutie, Odovzdanie.';
$lang['sk_SK']['CommentList.ss']['NOCOM'] = 'Na stránke sa nenachádzajú žiadne komentáre.';
$lang['sk_SK']['GenericDataAdmin_left.ss']['ADDLISTING'] = 'Pridať Zoznam';
$lang['sk_SK']['GenericDataAdmin_left.ss']['SEARCHLISTINGS'] = 'Hľadať v Zoznamoch';
$lang['sk_SK']['GenericDataAdmin_left.ss']['SEARCHRESULTS'] = 'Výsledky hľadania';
$lang['sk_SK']['ImageEditor.ss']['CANCEL'] = 'zrušiť';
$lang['sk_SK']['ImageEditor.ss']['CROP'] = 'orezať';
$lang['sk_SK']['ImageEditor.ss']['HEIGHT'] = 'výška';
$lang['sk_SK']['ImageEditor.ss']['REDO'] = 'znovu';
$lang['sk_SK']['ImageEditor.ss']['ROT'] = 'otáčať';
$lang['sk_SK']['ImageEditor.ss']['SAVE'] = 'ulož&nbsp;obrázok';
$lang['sk_SK']['ImageEditor.ss']['UNDO'] = 'späť';
$lang['sk_SK']['ImageEditor.ss']['UNTITLED'] = 'Nepomenovaný dokument';
$lang['sk_SK']['ImageEditor.ss']['WIDTH'] = 'šírka';
$lang['sk_SK']['LeftAndMain']['CHANGEDURL'] = 'URL adresa zmenená na \'%s\'';
$lang['sk_SK']['LeftAndMain']['HELP'] = 'Pomoc';
$lang['sk_SK']['LeftAndMain']['PAGETYPE'] = 'Typ stránky:';
$lang['sk_SK']['LeftAndMain']['PERMAGAIN'] = 'Boli ste odhlásený';
$lang['sk_SK']['LeftAndMain']['PERMALREADY'] = 'Je mi ľúto, ale nemáte prístup k tejto časti CMS. Ak sa chcete prihlásiť ako niekto iný, urobte tak nižšie';
$lang['sk_SK']['LeftAndMain']['PERMDEFAULT'] = 'Vyberte si prosím metódu autentifikácie a zadajte svoje prístupové údaje k CMS.';
$lang['sk_SK']['LeftAndMain']['PLEASESAVE'] = 'Prosím uložte stránku: Táto stránka nemôže byť aktualizovaná, lebo ešte nebola uložená.';
$lang['sk_SK']['LeftAndMain']['REQUESTERROR'] = 'Chyba v požiadavke';
$lang['sk_SK']['LeftAndMain']['SAVED'] = 'uložené';
$lang['sk_SK']['LeftAndMain']['SAVEDUP'] = 'Uložené';
$lang['sk_SK']['LeftAndMain']['SITECONTENTLEFT'] = 'Obsah webu';
$lang['sk_SK']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'Toto je';
$lang['sk_SK']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'verzia, ktorú teraz používate je technicky CVS vetva';
$lang['sk_SK']['LeftAndMain.ss']['ARCHS'] = 'Archivovaný web';
$lang['sk_SK']['LeftAndMain.ss']['DRAFTS'] = 'Návrhový web';
$lang['sk_SK']['LeftAndMain.ss']['EDIT'] = 'Upraviť';
$lang['sk_SK']['LeftAndMain.ss']['EDITPROFILE'] = 'Profil';
$lang['sk_SK']['LeftAndMain.ss']['LOADING'] = 'Nahrávam...';
$lang['sk_SK']['LeftAndMain.ss']['LOGGEDINAS'] = 'Prihlásený ako';
$lang['sk_SK']['LeftAndMain.ss']['LOGOUT'] = 'odhlásiť';
$lang['sk_SK']['LeftAndMain.ss']['PUBLIS'] = 'Publikovaný web';
$lang['sk_SK']['LeftAndMain.ss']['SSWEB'] = 'Silverstripe Website';
$lang['sk_SK']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Zobrazenie stránky:';
$lang['sk_SK']['LeftAndMain']['STATUSTO'] = 'Stav zmenený na \'%s\'';
$lang['sk_SK']['LeftAndMain']['TREESITECONTENT'] = 'Obsah webu';
$lang['sk_SK']['MemberList']['ADD'] = 'Pridať';
$lang['sk_SK']['MemberList']['EMAIL'] = 'E-mailová adresa';
$lang['sk_SK']['MemberList']['FILTERBYG'] = 'Filtrovať podľa skupiny';
$lang['sk_SK']['MemberList']['FN'] = 'Krstné meno';
$lang['sk_SK']['MemberList']['PASSWD'] = 'Heslo';
$lang['sk_SK']['MemberList']['SEARCH'] = 'Hľadať';
$lang['sk_SK']['MemberList']['SN'] = 'Priezvisko';
$lang['sk_SK']['MemberList.ss']['FILTER'] = 'Filtrovanie';
$lang['sk_SK']['MemberList_Table.ss']['EMAIL'] = 'E-mailová adresa';
$lang['sk_SK']['MemberList_Table.ss']['FN'] = 'Krstné meno';
$lang['sk_SK']['MemberList_Table.ss']['PASSWD'] = 'Heslo';
$lang['sk_SK']['MemberList_Table.ss']['SN'] = 'Priezvisko';
$lang['sk_SK']['MemberTableField']['ADD'] = 'Pridať';
$lang['sk_SK']['MemberTableField']['ADDEDTOGROUP'] = 'Člen pridaný do skupiny';
$lang['sk_SK']['MemberTableField.ss']['ADDNEW'] = 'Pridať nový';
$lang['sk_SK']['MemberTableField.ss']['DELETEMEMBER'] = 'Vymazať tohto člena';
$lang['sk_SK']['MemberTableField.ss']['EDITMEMBER'] = 'Upraviť tohto člena';
$lang['sk_SK']['MemberTableField.ss']['SHOWMEMBER'] = 'Zobraziť tohto člena';
$lang['sk_SK']['PageComment']['COMMENTBY'] = 'Komentáre od \'%s\' na %s';
$lang['sk_SK']['PageCommentInterface.ss']['COMMENTS'] = 'Komentáre';
$lang['sk_SK']['PageCommentInterface.ss']['NEXT'] = 'ďalší';
$lang['sk_SK']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Nikto na tejto stránke ešte nepridal komentár.';
$lang['sk_SK']['PageCommentInterface.ss']['POSTCOM'] = 'Pridajte svoj komentár';
$lang['sk_SK']['PageCommentInterface.ss']['PREV'] = 'predchádzajúci';
$lang['sk_SK']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'tento komentár nie je spam';
$lang['sk_SK']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'tento komentár je spam';
$lang['sk_SK']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Zaslal';
$lang['sk_SK']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'odstrániť tento komentár';
$lang['sk_SK']['ReportAdmin_left.ss']['REPORTS'] = 'Správy';
$lang['sk_SK']['ReportAdmin_right.ss']['WELCOME1'] = 'Vitajte v';
$lang['sk_SK']['ReportAdmin_right.ss']['WELCOME2'] = 'správach. Prosím vyberte si správu zľava.';
$lang['sk_SK']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Správy';
$lang['sk_SK']['SecurityAdmin']['ADDMEMBER'] = 'Pridať člena';
$lang['sk_SK']['SecurityAdmin']['MENUTITLE'] = 'Bezpečnosť';
$lang['sk_SK']['SecurityAdmin']['NEWGROUP'] = 'Nová skupina';
$lang['sk_SK']['SecurityAdmin']['SAVE'] = 'Uložiť';
$lang['sk_SK']['SecurityAdmin']['SGROUPS'] = 'Bezpečnostné skupiny';
$lang['sk_SK']['SecurityAdmin_left.ss']['CREATE'] = 'Vytvoriť';
$lang['sk_SK']['SecurityAdmin_left.ss']['DEL'] = 'Vymazať';
$lang['sk_SK']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Vymazať vybrané skupiny';
$lang['sk_SK']['SecurityAdmin_left.ss']['GO'] = 'Vykonať';
$lang['sk_SK']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Bezpečnostné skupiny';
$lang['sk_SK']['SecurityAdmin_left.ss']['SELECT'] = 'Vyberte stránky, ktoré chcete vymazať a potom kliknite na tlačidlo nižšie';
$lang['sk_SK']['SecurityAdmin_left.ss']['TOREORG'] = 'Pre reorganizáciu Vašich stránok, premiestňujte stránky kam potrebujete.';
$lang['sk_SK']['SecurityAdmin_right.ss']['WELCOME1'] = 'Vitajte v';
$lang['sk_SK']['SecurityAdmin_right.ss']['WELCOME2'] = 'administrácii bezpečnosti. Prosím vyberte si skupinu zľava.';
$lang['sk_SK']['SideReport']['EMPTYPAGES'] = 'Prázdne stránky';
$lang['sk_SK']['SideReport']['LAST2WEEKS'] = 'Stránky upravené počaas posledných 2 týždňov';
$lang['sk_SK']['SideReport']['REPEMPTY'] = '%s správa je prázdna.';
$lang['sk_SK']['StaticExporter']['BASEURL'] = 'Základná URL adresa';
$lang['sk_SK']['StaticExporter']['EXPORTTO'] = 'Exportovať do tohto adresára';
$lang['sk_SK']['StaticExporter']['FOLDEREXPORT'] = 'Adresár, kam sa má exportovať';
$lang['sk_SK']['StaticExporter']['NAME'] = 'Statický export';
$lang['sk_SK']['StaticExporter']['ONETHATEXISTS'] = 'Prosím uveďte adresár, ktorý existuje';
$lang['sk_SK']['TaskList.ss']['BY'] = '-';
$lang['sk_SK']['ThumbnailStripField']['NOTAFOLDER'] = 'Toto nie je adresár';
$lang['sk_SK']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(Vyberte adresár vyššie)';
$lang['sk_SK']['ViewArchivedEmail.ss']['CANACCESS'] = 'Archivovaný web môžete navštíviť týmto odkazom:';
$lang['sk_SK']['ViewArchivedEmail.ss']['HAVEASKED'] = 'Požiadali ste o zobrazenie obsahu webu z';
$lang['sk_SK']['WaitingOn.ss']['ATO'] = 'pridelené k';

?>