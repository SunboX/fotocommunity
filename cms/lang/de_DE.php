<?php

/**
 * German (Germany) language pack
 * @package cms
 * @subpackage i18n
 */

i18n::include_locale_file('cms', 'en_US');

global $lang;

if(array_key_exists('de_DE', $lang) && is_array($lang['de_DE'])) {
	$lang['de_DE'] = array_merge($lang['en_US'], $lang['de_DE']);
} else {
	$lang['de_DE'] = $lang['en_US'];
}

$lang['de_DE']['AssetAdmin']['CHOOSEFILE'] = 'Datei auswählen';
$lang['de_DE']['AssetAdmin']['CONTENTMODBY'] = 'Inhalt veränderbar durch';
$lang['de_DE']['AssetAdmin']['CONTENTUSABLEBY'] = 'Inhalt einsetzbar von';
$lang['de_DE']['AssetAdmin']['DELETEDX'] = '%s Dateien gelöscht';
$lang['de_DE']['AssetAdmin']['FILESREADY'] = 'Dateien bereit zum hochladen:';
$lang['de_DE']['AssetAdmin']['FOLDERDELETED'] = 'Ordner entfernt.';
$lang['de_DE']['AssetAdmin']['FOLDERSDELETED'] = 'Ordner entfernt.';
$lang['de_DE']['AssetAdmin']['MENUTITLE'] = 'Dateien & Bilder';
$lang['de_DE']['AssetAdmin']['MENUTITLE'] = 'Dateien & Bilder';
$lang['de_DE']['AssetAdmin']['MOVEDX'] = '%s Dateien verschoben';
$lang['de_DE']['AssetAdmin']['NEWFOLDER'] = 'Neuer Ordner';
$lang['de_DE']['AssetAdmin']['NOTEMP'] = 'Es existiert kein temporäres Verzeichnis für Datei-Uploads. Bitte setzen Sie die Variable upload_tmp_dir in der php.ini';
$lang['de_DE']['AssetAdmin']['NOTHINGTOUPLOAD'] = 'Keine Dateien zum hochladen vorhanden';
$lang['de_DE']['AssetAdmin']['NOWBROKEN'] = 'Folgende Seiten besitzen fehlerhafte Verweise';
$lang['de_DE']['AssetAdmin']['NOWBROKEN2'] = 'Die Eigentümer wurden per E-Mail benachrichtig und werden die Seite aktualisieren.';
$lang['de_DE']['AssetAdmin']['OWNER'] = 'Eigentümer';
$lang['de_DE']['AssetAdmin']['SAVEDFILE'] = 'Datei %s gespeichert';
$lang['de_DE']['AssetAdmin']['SAVEFOLDERNAME'] = 'Ordner speichern';
$lang['de_DE']['AssetAdmin']['THUMBSDELETED'] = 'Alle ungenutzten Vorschaubilder wurden gelöscht';
$lang['de_DE']['AssetAdmin']['UPLOAD'] = 'Ausgewählte Dateien hochladen';
$lang['de_DE']['AssetAdmin']['UPLOADEDX'] = '%s Dateien hochgeladen';
$lang['de_DE']['AssetAdmin_left.ss']['CREATE'] = 'Erstellen';
$lang['de_DE']['AssetAdmin_left.ss']['DELETE'] = 'Löschen...';
$lang['de_DE']['AssetAdmin_left.ss']['DELFOLDERS'] = 'Lösche die markierten Ordner';
$lang['de_DE']['AssetAdmin_left.ss']['ENABLEDRAGGING'] = 'Erlaube Neuordnen per Drag &amp; Drop';
$lang['de_DE']['AssetAdmin_left.ss']['FOLDERS'] = 'Ordner';
$lang['de_DE']['AssetAdmin_left.ss']['GO'] = 'Los';
$lang['de_DE']['AssetAdmin_left.ss']['SELECTTODEL'] = 'Markieren Sie die Ordner aus die Sie löschen möchten und drücken dann die nachstehende Schaltfläche ';
$lang['de_DE']['AssetAdmin_left.ss']['TOREORG'] = 'Um Ihre Ordner neu zu ordnen, ziehen Sie Sie mit der Maus an die gewünschte Stelle.';
$lang['de_DE']['AssetAdmin_right.ss']['CHOOSEPAGE'] = 'Bitte wählen Sie eine der Seiten links aus.';
$lang['de_DE']['AssetAdmin_right.ss']['WELCOME'] = 'Willkommen zu';
$lang['de_DE']['AssetAdmin_uploadiframe.ss']['PERMFAILED'] = 'Sie haben nicht die Berechtigung Dateien in diesen Ordner hochzuladen.';
$lang['de_DE']['AssetTableField']['CAPTION'] = 'Titel';
$lang['de_DE']['AssetTableField']['CREATED'] = 'Erstmalig hochgeladen';
$lang['de_DE']['AssetTableField']['DIM'] = 'Dimensionen';
$lang['de_DE']['AssetTableField']['DIMLIMT'] = 'Maße im Popup-Fenster einstellen';
$lang['de_DE']['AssetTableField']['EDITIMAGE'] = 'Bild bearbeiten';
$lang['de_DE']['AssetTableField']['FILENAME'] = 'Dateiname';
$lang['de_DE']['AssetTableField']['GALLERYOPTIONS'] = 'Galerie Optionen';
$lang['de_DE']['AssetTableField']['IMAGE'] = 'Bild';
$lang['de_DE']['AssetTableField']['ISFLASH'] = 'Ist eine Flash Datei';
$lang['de_DE']['AssetTableField']['LASTEDIT'] = 'Letztmals geändert';
$lang['de_DE']['AssetTableField']['MAIN'] = 'Allgemein';
$lang['de_DE']['AssetTableField']['NOLINKS'] = 'Es verweist keine Seite auf diese Datei';
$lang['de_DE']['AssetTableField']['OWNER'] = 'Eigentümer';
$lang['de_DE']['AssetTableField']['PAGESLINKING'] = 'Die folgenden Seiten verweisen auf diese Datei';
$lang['de_DE']['AssetTableField']['POPUPHEIGHT'] = 'Popup Höhe';
$lang['de_DE']['AssetTableField']['POPUPWIDTH'] = 'Popup Breite';
$lang['de_DE']['AssetTableField']['SIZE'] = 'Größe';
$lang['de_DE']['AssetTableField.ss']['DELFILE'] = 'Lösche diese Datei';
$lang['de_DE']['AssetTableField.ss']['DRAGTOFOLDER'] = 'Ziehen Sie die Datei auf einen Ordner links um sie zu verschieben';
$lang['de_DE']['AssetTableField.ss']['EDIT'] = 'Anlage editieren';
$lang['de_DE']['AssetTableField.ss']['SHOW'] = 'Anlage ansehen';
$lang['de_DE']['AssetTableField']['SWFFILEOPTIONS'] = 'SWF Datei Optionen';
$lang['de_DE']['AssetTableField']['TITLE'] = 'Titel';
$lang['de_DE']['AssetTableField']['TYPE'] = 'Typ';
$lang['de_DE']['AssetTableField']['URL'] = 'URL';
$lang['de_DE']['CMSLeft.ss']['DELPAGE'] = 'Lösche Seiten...';
$lang['de_DE']['CMSLeft.ss']['DELPAGES'] = 'Lösche die markierten Ordner';
$lang['de_DE']['CMSLeft.ss']['GO'] = 'Los';
$lang['de_DE']['CMSLeft.ss']['NEWPAGE'] = 'Neue Seite...';
$lang['de_DE']['CMSLeft.ss']['SELECTPAGESDEL'] = 'Markieren Sie die Ordner aus die Sie löschen möchten und drücken dann die nachstehende Schaltfläche ';
$lang['de_DE']['CMSLeft.ss']['SITECONT'] = 'Seiten Inhalt';
$lang['de_DE']['CMSMain']['ACCESS'] = 'Zugriff auf %s im CMS';
$lang['de_DE']['CMSMain']['ACCESSALLINTERFACES'] = 'Zugriff auf alle CMS Schnittstellen';
$lang['de_DE']['CMSMain']['CANCEL'] = 'Abbrechen';
$lang['de_DE']['CMSMain']['CHOOSEREPORT'] = '(Report wählen)';
$lang['de_DE']['CMSMain']['COMPARINGV'] = 'Sie vergleichen Versionen #%d und #%d';
$lang['de_DE']['CMSMain']['COPYPUBTOSTAGE'] = 'Wollen Sie den Inhalt wirklich von Live nach Entwurf kopieren?';
$lang['de_DE']['CMSMain']['DELETE'] = 'Von Entwurf-Seite löschen';
$lang['de_DE']['CMSMain']['DELETEFP'] = 'Von Live-Seite löschen';
$lang['de_DE']['CMSMain']['DESCREMOVED'] = 'und %s Unterseiten';
$lang['de_DE']['CMSMain']['EMAIL'] = 'E-Mail';
$lang['de_DE']['CMSMain']['GO'] = 'Los';
$lang['de_DE']['LeftAndMain']['SITECONTENT'] = 'Seitenbaum';
$lang['de_DE']['CMSMain']['MENUTITLE'] = 'Seiteninhalt';
$lang['de_DE']['CMSMain']['METADESCOPT'] = 'Beschreibung';
$lang['de_DE']['CMSMain']['METAKEYWORDSOPT'] = 'Schlüsselwörter';
$lang['de_DE']['CMSMain']['NEW'] = 'Neu';
$lang['de_DE']['CMSMain']['NOCONTENT'] = 'Kein Inhalt';
$lang['de_DE']['CMSMain']['NOTHINGASSIGNED'] = 'Sie haben keine Aufgaben.';
$lang['de_DE']['CMSMain']['NOWAITINGON'] = 'Sie warten auf keine anderen Autoren.';
$lang['de_DE']['CMSMain']['NOWBROKEN'] = 'Die folgenden Seiten haben falsche Verlinkungen:';
$lang['de_DE']['CMSMain']['NOWBROKEN2'] = 'Die zuständigen Benutzer haben eine Email erhalten und können diese Seiten reparieren.';
$lang['de_DE']['CMSMain']['OK'] = 'OK';
$lang['de_DE']['CMSMain']['PAGEDEL'] = '%d Seite gelöscht';
$lang['de_DE']['CMSMain']['PAGENOTEXISTS'] = 'Diese Seite wurde nicht gefunden';
$lang['de_DE']['CMSMain']['PAGEPUB'] = '%d Seite veröffentlicht';
$lang['de_DE']['CMSMain']['PAGESDEL'] = '%d Seiten gelöscht';
$lang['de_DE']['CMSMain']['PAGESPUB'] = '%d Seiten veröffentlicht';
$lang['de_DE']['CMSMain']['PAGETYPEOPT'] = 'Seitentyp';
$lang['de_DE']['CMSMain']['PRINT'] = 'Drucken';
$lang['de_DE']['CMSMain']['PUBALLCONFIRM'] = 'Veröffentlicht jede Seite des Seitenbaumes und kopiert den Inhalt von Entwurf zu Live.';
$lang['de_DE']['CMSMain']['PUBALLFUN'] = '"Alle veröffentlichen"-Funktion';
$lang['de_DE']['CMSMain']['PUBALLFUN2'] = 'Dieser Button bewirkt dasselbe wie auf jeder Seite "veröffentlichen" zu wählen. Sie sollten diese Funktion nutzen, wenn grössere Inhaltsänderungen stattgefunden haben, zum Beispiel wenn die Seite erstellt wurde.';
$lang['de_DE']['CMSMain']['PUBPAGES'] = 'Fertig: %d Seite(n) veröffentlicht';
$lang['de_DE']['CMSMain']['REMOVED'] = 'Lösche \'%s\'%s von der Live-Seite';
$lang['de_DE']['CMSMain']['REMOVEDFD'] = 'Von Entwurf-Seite gelöscht';
$lang['de_DE']['CMSMain']['REMOVEDPAGE'] = '\'%s\' von veröffentlichter Webseite gelöscht';
$lang['de_DE']['CMSMain']['REMOVEDPAGEFROMDRAFT'] = 'Lösche \'%s\' von der Entwurfs-Seite';
$lang['de_DE']['CMSMain']['REPORT'] = 'Bericht';
$lang['de_DE']['CMSMain']['RESTORE'] = 'Wiederherstellen';
$lang['de_DE']['CMSMain']['RESTORED'] = '\'%s\' erfolgreich wiederhergestellt';
$lang['de_DE']['CMSMain']['ROLLBACK'] = 'Diese Version wiederherstellen';
$lang['de_DE']['CMSMain']['ROLLEDBACKPUB'] = 'Zur veröffentlichten Version wiederhergestellt. Neue Versionsnummer ist #%d';
$lang['de_DE']['CMSMain']['ROLLEDBACKVERSION'] = 'Version #%d wiederhergestellt. Neue Versionsnummer ist #%d';
$lang['de_DE']['CMSMain']['SAVE'] = 'Speichern';
$lang['de_DE']['CMSMain']['SENTTO'] = 'Zur Freigabe an %s %s gesendet.';
$lang['de_DE']['CMSMain']['STATUSOPT'] = 'Status';
$lang['de_DE']['CMSMain']['TOTALPAGES'] = 'Seiten gesamt:';
$lang['de_DE']['CMSMain']['VERSIONSNOPAGE'] = 'Seite #%d nicht gefunden.';
$lang['de_DE']['CMSMain']['VIEWING'] = 'Sie sehen Version #%d, erstellt von %s';
$lang['de_DE']['CMSMain']['VISITRESTORE'] = 'Öffne restorepage/(ID)';
$lang['de_DE']['CMSMain']['WAITINGON'] = 'Sie warten auf andere Autoren bei diesen <b>%d</b> Seiten.';
$lang['de_DE']['CMSMain']['WORKTODO'] = 'Sie müssen an diesen <b>%d</b> Seiten arbeiten.';
$lang['de_DE']['CMSMain_dialog.ss']['BUTTONNOTFOUND'] = 'Konnte den Schaltflächennamen nicht finden';
$lang['de_DE']['CMSMain_dialog.ss']['NOLINKED'] = 'Finde  window.linkedObject nicht, klicken Sie auf die Schaltfläche um Zurück zum Hauptfenster zu kommen';
$lang['de_DE']['CMSMain_left.ss']['ADDEDNOTPUB'] = 'Als Entwurf gespeichert, noch nicht veröffentlicht.';
$lang['de_DE']['CMSMain_left.ss']['ADDSEARCHCRITERIA'] = 'Kriterien hinzufügen...';
$lang['de_DE']['CMSMain_left.ss']['BATCHACTIONS'] = 'Batch-Aktionen';
$lang['de_DE']['CMSMain_left.ss']['CHANGED'] = 'geändert';
$lang['de_DE']['CMSMain_left.ss']['CLOSEBOX'] = 'Hier klicken, um Box zu schließen';
$lang['de_DE']['CMSMain_left.ss']['COMMENTS'] = 'Kommentare';
$lang['de_DE']['CMSMain_left.ss']['COMPAREMODE'] = 'Vergleichsmodus (paarweise auswählen)';
$lang['de_DE']['CMSMain_left.ss']['CREATE'] = 'Seite erstellen';
$lang['de_DE']['CMSMain_left.ss']['DEL'] = 'gelöscht';
$lang['de_DE']['CMSMain_left.ss']['DELETECONFIRM'] = 'Lösche ausgewählte Seiten';
$lang['de_DE']['CMSMain_left.ss']['DELETEDSTILLLIVE'] = 'Vom Entwurf gelöscht, noch veröffentlicht';
$lang['de_DE']['CMSMain_left.ss']['EDITEDNOTPUB'] = 'Im Entwurf geändert und noch nicht veröffentlicht';
$lang['de_DE']['CMSMain_left.ss']['EDITEDSINCE'] = 'In der Zwischenzeit bearbeitet';
$lang['de_DE']['CMSMain_left.ss']['ENABLEDRAGGING'] = 'Erlaube Neuordnen per Drag &amp; Drop';
$lang['de_DE']['CMSMain_left.ss']['GO'] = 'Los';
$lang['de_DE']['CMSMain_left.ss']['KEY'] = 'Schlüssel:';
$lang['de_DE']['CMSMain_left.ss']['NEW'] = 'neu';
$lang['de_DE']['CMSMain_left.ss']['OPENBOX'] = 'Hier klicken, um diese Box zu öffnen';
$lang['de_DE']['CMSMain_left.ss']['PAGEVERSIONH'] = 'Versionsverlauf';
$lang['de_DE']['CMSMain_left.ss']['PUBLISHCONFIRM'] = 'Veröffentliche die markierten Seiten';
$lang['de_DE']['CMSMain_left.ss']['SEARCH'] = 'Suche';
$lang['de_DE']['CMSMain_left.ss']['SEARCHTITLE'] = 'Durchsuche URL, Titel, Menü Titel &amp; Inhalt';
$lang['de_DE']['CMSMain_left.ss']['SELECTPAGESACTIONS'] = 'Markieren Sie die Seiten die Sie ändern möchten und wählen dann eine der Aktionen:';
$lang['de_DE']['CMSMain_left.ss']['SELECTPAGESDUP'] = 'Wählen Sie die zu duplizierenden Seiten (und Kind-Elemente), und wo Sie die Kopien platzieren möchten.';
$lang['de_DE']['CMSMain_left.ss']['SHOWONLYCHANGED'] = 'Zeige nur veränderte Seiten';
$lang['de_DE']['CMSMain_left.ss']['SHOWUNPUB'] = 'Zeige unveröffentlichte Versionen';
$lang['de_DE']['CMSMain_left.ss']['SITECONTENT TITLE'] = 'Seitenbaum';
$lang['de_DE']['CMSMain_left.ss']['SITEREPORTS'] = 'Berichte';
$lang['de_DE']['CMSMain_left.ss']['TASKLIST'] = 'Aufgabenliste';
$lang['de_DE']['CMSMain_left.ss']['WAITINGON'] = 'Warte auf';
$lang['de_DE']['CMSMain_right.ss']['ANYMESSAGE'] = 'Haben Sie eine Nachricht an Ihren Redakteur?';
$lang['de_DE']['CMSMain_right.ss']['CHOOSEPAGE'] = 'Bitte eine Seite links auswählen.';
$lang['de_DE']['CMSMain_right.ss']['LOADING'] = 'lade...';
$lang['de_DE']['CMSMain_right.ss']['MESSAGE'] = 'Nachricht';
$lang['de_DE']['CMSMain_right.ss']['SENDTO'] = 'Senden an';
$lang['de_DE']['CMSMain_right.ss']['STATUS'] = 'Status';
$lang['de_DE']['CMSMain_right.ss']['SUBMIT'] = 'Zur Freigabe senden';
$lang['de_DE']['CMSMain_right.ss']['WELCOMETO'] = 'Willkommen auf';
$lang['de_DE']['CMSMain_versions.ss']['AUTHOR'] = 'Autor';
$lang['de_DE']['CMSMain_versions.ss']['NOTPUB'] = 'Nicht veröffentlicht';
$lang['de_DE']['CMSMain_versions.ss']['PUBR'] = 'Veröffentlicher';
$lang['de_DE']['CMSMain_versions.ss']['UNKNOWN'] = 'Unbekannt';
$lang['de_DE']['CMSMain_versions.ss']['WHEN'] = 'Wann';
$lang['de_DE']['CMSRight.ss']['CHOOSEPAGE'] = 'Bitte eine Seite links auswählen.';
$lang['de_DE']['CMSRight.ss']['ECONTENT'] = 'Inhalt bearbeiten';
$lang['de_DE']['CMSRight.ss']['WELCOMETO'] = 'Willkommen auf';
$lang['de_DE']['CommentAdmin']['ACCEPT'] = 'Akzeptiert';
$lang['de_DE']['CommentAdmin']['APPROVED'] = '%s Kommentare akzeptiert.';
$lang['de_DE']['CommentAdmin']['APPROVEDCOMMENTS'] = 'Überprüfte Kommentare';
$lang['de_DE']['CommentAdmin']['AUTHOR'] = 'Autor';
$lang['de_DE']['CommentAdmin']['COMMENT'] = 'Kommentar';
$lang['de_DE']['CommentAdmin']['COMMENTS'] = 'Kommentare';
$lang['de_DE']['CommentAdmin']['COMMENTSAWAITINGMODERATION'] = 'Auf Moderation wartende Kommentare';
$lang['de_DE']['CommentAdmin']['DATEPOSTED'] = 'Verfasst am';
$lang['de_DE']['CommentAdmin']['DELETE'] = 'Löschen';
$lang['de_DE']['CommentAdmin']['DELETEALL'] = 'Alle löschen';
$lang['de_DE']['CommentAdmin']['DELETED'] = 'Lösche %s Kommentare.';
$lang['de_DE']['CommentAdmin']['MARKASNOTSPAM'] = 'Als Spam markieren';
$lang['de_DE']['CommentAdmin']['MARKEDNOTSPAM'] = 'Markierung als Spam für %s Kommentare entfernt.';
$lang['de_DE']['CommentAdmin']['MARKEDSPAM'] = '%s Kommentare als Spam markiert.';
$lang['de_DE']['CommentAdmin']['MENUTITLE'] = 'Kommentare';
$lang['de_DE']['CommentAdmin']['MENUTITLE'] = 'Kommentare';
$lang['de_DE']['CommentAdmin']['NAME'] = 'Name';
$lang['de_DE']['CommentAdmin']['PAGE'] = 'Seite';
$lang['de_DE']['CommentAdmin']['SPAM'] = 'Spam';
$lang['de_DE']['CommentAdmin']['SPAMMARKED'] = 'markieren als SPAM';
$lang['de_DE']['CommentAdmin_left.ss']['COMMENTS'] = 'Kommentare';
$lang['de_DE']['CommentAdmin_right.ss']['WELCOME1'] = 'Willkommen zur';
$lang['de_DE']['CommentAdmin_right.ss']['WELCOME2'] = 'Kommentarverwaltung. Bitte wählen Sie einen Ordner im linken Baum.';
$lang['de_DE']['CommentAdmin_SiteTree.ss']['APPROVED'] = 'geprüft';
$lang['de_DE']['CommentAdmin_SiteTree.ss']['AWAITMODERATION'] = 'Auf Moderation wartend';
$lang['de_DE']['CommentAdmin_SiteTree.ss']['COMMENTS'] = 'Kommentare';
$lang['de_DE']['CommentAdmin_SiteTree.ss']['SPAM'] = 'Spam';
$lang['de_DE']['CommentList.ss']['CREATEDW'] = 'Kommentare werden immer dann erstellt wenn eine der "Arbeitsablauf Aktionen" übernommen werden - Veröffentlichen, Ablehnen, Vorlegen.';
$lang['de_DE']['CommentList.ss']['NOCOM'] = 'Zu dieser Seite liegen keine Kommentare vor';
$lang['de_DE']['CommentTableField']['FILTER'] = 'Filter';
$lang['de_DE']['CommentTableField']['SEARCH'] = 'Suchen';
$lang['de_DE']['CommentTableField.ss']['APPROVE'] = 'freischalten';
$lang['de_DE']['CommentTableField.ss']['APPROVECOMMENT'] = 'Diesen Kommentar freischalten';
$lang['de_DE']['CommentTableField.ss']['DELETE'] = 'löschen';
$lang['de_DE']['CommentTableField.ss']['DELETEROW'] = 'Diese Zeile löschen';
$lang['de_DE']['CommentTableField.ss']['EDIT'] = 'editieren';
$lang['de_DE']['CommentTableField.ss']['HAM'] = 'Nicht erkannt';
$lang['de_DE']['CommentTableField.ss']['MARKASSPAM'] = 'Die Kommentar als Spam markieren';
$lang['de_DE']['CommentTableField.ss']['MARKNOSPAM'] = 'Markierung als Spam für diesen Kommentar entfernen';
$lang['de_DE']['CommentTableField.ss']['NOITEMSFOUND'] = 'Keine Einträge gefunden';
$lang['de_DE']['CommentTableField.ss']['SPAM'] = 'Spam';
$lang['de_DE']['ComplexTableField']['CLOSEPOPUP'] = 'Popup schließen';
$lang['de_DE']['ComplexTableField']['SUCCESSADD'] = 'Hinzugefügt %s %s %s';
$lang['de_DE']['ImageEditor.ss']['ACTIONS'] = 'Aktionen';
$lang['de_DE']['ImageEditor.ss']['ADJUST'] = 'anpassen';
$lang['de_DE']['ImageEditor.ss']['APPLY'] = 'Übernehmen';
$lang['de_DE']['ImageEditor.ss']['BLUR'] = 'Unschärfe';
$lang['de_DE']['ImageEditor.ss']['BRIGHTNESS'] = 'Helligkeit';
$lang['de_DE']['ImageEditor.ss']['CANCEL'] = 'abbrechen';
$lang['de_DE']['ImageEditor.ss']['CONTRAST'] = 'Kontrast';
$lang['de_DE']['ImageEditor.ss']['CROP'] = 'zuschneiden';
$lang['de_DE']['ImageEditor.ss']['CURRENTACTION'] = 'Aktuelle&nbsp;Aktion';
$lang['de_DE']['ImageEditor.ss']['EDITFUNCTIONS'] = 'Bearbeitungsfunktionen';
$lang['de_DE']['ImageEditor.ss']['EFFECTS'] = 'Effekte';
$lang['de_DE']['ImageEditor.ss']['EXIT'] = 'Beenden';
$lang['de_DE']['ImageEditor.ss']['GAMMA'] = 'Gamma';
$lang['de_DE']['ImageEditor.ss']['GREYSCALE'] = 'Graustufen';
$lang['de_DE']['ImageEditor.ss']['HEIGHT'] = 'Höhe';
$lang['de_DE']['ImageEditor.ss']['REDO'] = 'nochmals machen';
$lang['de_DE']['ImageEditor.ss']['ROT'] = 'drehen';
$lang['de_DE']['ImageEditor.ss']['SAVE'] = 'speichere&nbsp;Bild';
$lang['de_DE']['ImageEditor.ss']['SEPIA'] = 'Sepia';
$lang['de_DE']['ImageEditor.ss']['UNDO'] = 'rückgängig machen';
$lang['de_DE']['ImageEditor.ss']['UNTITLED'] = 'Unbetiteltes Dokument';
$lang['de_DE']['ImageEditor.ss']['WIDTH'] = 'Breite';
$lang['de_DE']['LeftAndMain']['CHANGEDURL'] = 'URL geändert: \'%s\'';
$lang['de_DE']['LeftAndMain']['COMMENTS'] = 'Kommentare';
$lang['de_DE']['LeftAndMain']['FILESIMAGES'] = 'Dateien & Bilder';
$lang['de_DE']['LeftAndMain']['HELP'] = 'Hilfe';
$lang['de_DE']['LeftAndMain']['PAGETYPE'] = 'Seitentyp:';
$lang['de_DE']['LeftAndMain']['PERMAGAIN'] = 'Sie wurden aus dem System ausgeloggt. Falls Sie sich wieder einloggen möchten, geben Sie bitte Benutzernamen und Passwort im untenstehenden Formular an.';
$lang['de_DE']['LeftAndMain']['PERMALREADY'] = 'Leider dürfen Sie diesen Teil des CMS nicht aufrufen. Wenn Sie sich als jemand anderes einloggen wollen, benutzen Sie bitte das nachstehende Formular.';
$lang['de_DE']['LeftAndMain']['PERMDEFAULT'] = 'Geben Sie Ihre E-Mail-Adresse und das Passwort für den Zugang zum CMS ein.';
$lang['de_DE']['LeftAndMain']['PLEASESAVE'] = 'Diese Seite konnte nicht aktualisiert werden weil sie noch nicht gespeichert wurde - bitte speichern.';
$lang['de_DE']['LeftAndMain']['REPORTS'] = 'Berichte';
$lang['de_DE']['LeftAndMain']['REQUESTERROR'] = 'Systemfehler';
$lang['de_DE']['LeftAndMain']['SAVED'] = 'gespeichert';
$lang['de_DE']['LeftAndMain']['SAVEDUP'] = 'Gespeichert';
$lang['de_DE']['LeftAndMain']['SECURITY'] = 'Sicherheit';
$lang['de_DE']['LeftAndMain']['SITECONTENT'] = 'Seiteninhalt';
$lang['de_DE']['LeftAndMain']['SITECONTENTLEFT'] = 'Seiteninhalt';
$lang['de_DE']['LeftAndMain.ss']['APPVERSIONTEXT1'] = 'Dies ist der';
$lang['de_DE']['LeftAndMain.ss']['APPVERSIONTEXT2'] = 'Benutzte Version (Branch der SVN-Versionskontrolle)';
$lang['de_DE']['LeftAndMain.ss']['ARCHS'] = 'Archivierte Seite';
$lang['de_DE']['LeftAndMain.ss']['DRAFTS'] = 'Entwurf';
$lang['de_DE']['LeftAndMain.ss']['EDIT'] = 'Bearbeiten';
$lang['de_DE']['LeftAndMain.ss']['EDITINCMS'] = 'Diese Seite im CMS bearbeiten';
$lang['de_DE']['LeftAndMain.ss']['EDITPROFILE'] = 'Profil';
$lang['de_DE']['LeftAndMain.ss']['LOADING'] = 'Lade...';
$lang['de_DE']['LeftAndMain.ss']['LOGGEDINAS'] = 'Eingeloggt als';
$lang['de_DE']['LeftAndMain.ss']['LOGOUT'] = 'ausloggen';
$lang['de_DE']['LeftAndMain.ss']['PUBLIS'] = 'Veröffentlichte Seite';
$lang['de_DE']['LeftAndMain.ss']['REQUIREJS'] = 'Das CMS benötigt aktiviertes JavaScript.';
$lang['de_DE']['LeftAndMain.ss']['SSWEB'] = 'Silverstripe Website';
$lang['de_DE']['LeftAndMain.ss']['VIEWINDRAFT'] = 'Diese Seite in der Voransicht ansehen';
$lang['de_DE']['LeftAndMain.ss']['VIEWINPUBLISHED'] = 'Diese Seite in der veröffentlichten Seite ansehen';
$lang['de_DE']['LeftAndMain.ss']['VIEWPAGEIN'] = 'Seitenansicht:';
$lang['de_DE']['LeftAndMain']['STATUSPUBLISHEDSUCCESS'] = '\'%s\' erfolgreich veröffentlicht';
$lang['de_DE']['LeftAndMain']['STATUSTO'] = 'Status geändert: \'%s\'';
$lang['de_DE']['LeftAndMain']['TREESITECONTENT'] = 'Seiteninhalt';
$lang['de_DE']['MemberList']['ADD'] = 'hinzufügen';
$lang['de_DE']['MemberList']['ANYGROUP'] = 'Jede Gruppe';
$lang['de_DE']['MemberList']['ASC'] = 'Aufsteigend';
$lang['de_DE']['MemberList']['DESC'] = 'Absteigend';
$lang['de_DE']['MemberList']['EMAIL'] = 'Email';
$lang['de_DE']['MemberList']['FILTERBYG'] = 'Nach Gruppen sortieren';
$lang['de_DE']['MemberList']['FN'] = 'Vorname';
$lang['de_DE']['MemberList']['ORDERBY'] = 'Sortieren nach';
$lang['de_DE']['MemberList']['PASSWD'] = 'Passwort';
$lang['de_DE']['MemberList']['SEARCH'] = 'Suche';
$lang['de_DE']['MemberList']['SN'] = 'Nachname';
$lang['de_DE']['MemberList.ss']['FILTER'] = 'filtern';
$lang['de_DE']['MemberList_PageControls.ss']['DISPLAYING'] = 'Anzeigen';
$lang['de_DE']['MemberList_PageControls.ss']['FIRSTMEMBERS'] = 'Mitglieder';
$lang['de_DE']['MemberList_PageControls.ss']['LASTMEMBERS'] = 'Mitglieder';
$lang['de_DE']['MemberList_PageControls.ss']['NEXTMEMBERS'] = 'Mitglieder';
$lang['de_DE']['MemberList_PageControls.ss']['OF'] = 'von';
$lang['de_DE']['MemberList_PageControls.ss']['PREVIOUSMEMBERS'] = 'Mitglieder';
$lang['de_DE']['MemberList_PageControls.ss']['TO'] = 'zu';
$lang['de_DE']['MemberList_PageControls.ss']['VIEWFIRST'] = 'Erstes ansehen';
$lang['de_DE']['MemberList_PageControls.ss']['VIEWLAST'] = 'Letztes ansehen';
$lang['de_DE']['MemberList_PageControls.ss']['VIEWNEXT'] = 'Nächstes ansehen';
$lang['de_DE']['MemberList_PageControls.ss']['VIEWPREVIOUS'] = 'Vorheriges ansehen';
$lang['de_DE']['MemberList_Table.ss']['EMAIL'] = 'Email Adresse';
$lang['de_DE']['MemberList_Table.ss']['FN'] = 'Vorname';
$lang['de_DE']['MemberList_Table.ss']['PASSWD'] = 'Passwort';
$lang['de_DE']['MemberList_Table.ss']['SN'] = 'Nachname';
$lang['de_DE']['MemberTableField']['ADD'] = 'Hinzufügen';
$lang['de_DE']['MemberTableField']['ADDEDTOGROUP'] = 'Mitglied zu Gruppe hinzugefügt';
$lang['de_DE']['MemberTableField']['ADDINGFIELD'] = 'Hinzufügen fehlgeschlagen';
$lang['de_DE']['MemberTableField']['ANYGROUP'] = 'Jede Gruppe';
$lang['de_DE']['MemberTableField']['ASC'] = 'Aufsteigend';
$lang['de_DE']['MemberTableField']['DESC'] = 'Absteigend';
$lang['de_DE']['MemberTableField']['EMAIL'] = 'E-Mail';
$lang['de_DE']['MemberTableField']['FILTER'] = 'Filter';
$lang['de_DE']['MemberTableField']['FILTERBYGROUP'] = 'Nach Gruppen filtern';
$lang['de_DE']['MemberTableField']['FIRSTNAME'] = 'Vorname';
$lang['de_DE']['MemberTableField']['ORDERBY'] = 'Sortieren nach';
$lang['de_DE']['MemberTableField']['SEARCH'] = 'Suche';
$lang['de_DE']['MemberTableField.ss']['ADDNEW'] = 'Hinzufügen von';
$lang['de_DE']['MemberTableField.ss']['DELETEMEMBER'] = 'Lösche dieses Mitglied';
$lang['de_DE']['MemberTableField.ss']['EDITMEMBER'] = 'Bearbeite dieses Mitglied';
$lang['de_DE']['MemberTableField.ss']['SHOWMEMBER'] = 'Zeige dieses Mitglied an';
$lang['de_DE']['MemberTableField']['SURNAME'] = 'Nachname';
$lang['de_DE']['ModelAdmin']['ADDBUTTON'] = 'Hinzufügen';
$lang['de_DE']['ModelAdmin']['ADDFORM'] = 'Fügen Sie einen Datensatz vom Typ "%s" hinzu.';
$lang['de_DE']['ModelAdmin']['CHOOSE_COLUMNS'] = 'Spalten in Suchergebnissen';
$lang['de_DE']['ModelAdmin']['CLASSTYPE'] = 'Typ';
$lang['de_DE']['ModelAdmin']['CLEAR_SEARCH'] = 'Zurücksetzen';
$lang['de_DE']['ModelAdmin']['CREATEBUTTON'] = 'Erstelle \'%s\'';
$lang['de_DE']['ModelAdmin']['DELETE'] = 'Löschen';
$lang['de_DE']['ModelAdmin']['DELETEDRECORDS'] = '%s Datensätze gelöscht.';
$lang['de_DE']['ModelAdmin']['FOUNDRESULTS'] = '%s Suchergebnisse';
$lang['de_DE']['ModelAdmin']['GOBACK'] = 'Zurück';
$lang['de_DE']['ModelAdmin']['GOFORWARD'] = 'Weiter';
$lang['de_DE']['ModelAdmin']['IMPORT'] = 'CSV Import';
$lang['de_DE']['ModelAdmin']['IMPORTEDRECORDS'] = '%s Datensätze importiert.';
$lang['de_DE']['ModelAdmin']['ITEMNOTFOUND'] = 'Keine Datensätze gefunden';
$lang['de_DE']['ModelAdmin']['LOADEDFOREDITING'] = '\'%s\' geladen';
$lang['de_DE']['ModelAdmin']['NOCSVFILE'] = 'Wählen sie eine CSV-Datei zum Importieren';
$lang['de_DE']['ModelAdmin']['NOIMPORT'] = 'Kein Import notwendig.';
$lang['de_DE']['ModelAdmin']['NORESULTS'] = 'Keine Ergebnisse';
$lang['de_DE']['ModelAdmin']['SAVE'] = 'Speichern';
$lang['de_DE']['ModelAdmin']['SEARCHRESULTS'] = 'Suchergebnisse';
$lang['de_DE']['ModelAdmin']['SELECTALL'] = 'Alle Spalten';
$lang['de_DE']['ModelAdmin']['SELECTNONE'] = 'Keine Spalten';
$lang['de_DE']['ModelAdmin']['UPDATEDRECORDS'] = '%s Datensätze aktualisiert.';
$lang['de_DE']['ModelAdmin_ImportSpec.ss']['IMPORTSPECFIELDS'] = 'Datenbankspalten';
$lang['de_DE']['ModelAdmin_ImportSpec.ss']['IMPORTSPECLINK'] = 'Spezifikation für %s zeigen';
$lang['de_DE']['ModelAdmin_ImportSpec.ss']['IMPORTSPECRELATIONS'] = 'Verknüpfungen';
$lang['de_DE']['ModelAdmin_ImportSpec.ss']['IMPORTSPECTITLE'] = 'Spezifikation für %s';
$lang['de_DE']['ModelAdmin_left.ss']['ADDLISTING'] = 'Datensatz hinzufügen';
$lang['de_DE']['ModelAdmin_left.ss']['ADD_TAB_HEADER'] = 'Hinzufügen';
$lang['de_DE']['ModelAdmin_left.ss']['IMPORT_TAB_HEADER'] = 'Importieren';
$lang['de_DE']['ModelAdmin_left.ss']['SEARCHLISTINGS'] = 'Suche';
$lang['de_DE']['ModelAdmin_right.ss']['WELCOME1'] = 'Willkommen zu %s. Bitte wählen Sie einen Eintrag von der linken Seite.';
$lang['de_DE']['PageComment']['Comment'] = 'Kommentar';
$lang['de_DE']['PageComment']['COMMENTBY'] = 'Kommentar von \'%s\' am %s';
$lang['de_DE']['PageComment']['IsSpam'] = 'Spam?';
$lang['de_DE']['PageComment']['Name'] = 'Name';
$lang['de_DE']['PageComment']['NeedsModeration'] = 'Moderiert?';
$lang['de_DE']['PageComment']['PLURALNAME'] = 'Kommentare';
$lang['de_DE']['PageComment']['SINGULARNAME'] = 'Kommentar';
$lang['de_DE']['PageCommentInterface']['COMMENTERURL'] = 'Die URL Deiner Website';
$lang['de_DE']['PageCommentInterface']['POST'] = 'Abschicken';
$lang['de_DE']['PageCommentInterface']['SPAMQUESTION'] = 'Spamschutz Frage: %s';
$lang['de_DE']['PageCommentInterface.ss']['COMMENTS'] = 'Kommentare';
$lang['de_DE']['PageCommentInterface.ss']['NEXT'] = 'nächste';
$lang['de_DE']['PageCommentInterface.ss']['NOCOMMENTSYET'] = 'Bisher hat niemand diese Seite kommentiert.';
$lang['de_DE']['PageCommentInterface.ss']['POSTCOM'] = 'Geben Sie einen Kommentar ab';
$lang['de_DE']['PageCommentInterface.ss']['PREV'] = 'vorherige';
$lang['de_DE']['PageCommentInterface.ss']['RSSFEEDALLCOMMENTS'] = 'RSS feed für alle Kommentare';
$lang['de_DE']['PageCommentInterface.ss']['RSSFEEDCOMMENTS'] = 'RSS Feed für die Kommentare auf dieser Seite';
$lang['de_DE']['PageCommentInterface.ss']['RSSVIEWALLCOMMENTS'] = 'Alle Kommentare anzeigen';
$lang['de_DE']['PageCommentInterface']['YOURCOMMENT'] = 'Kommentare';
$lang['de_DE']['PageCommentInterface']['YOURNAME'] = 'Ihr Name';
$lang['de_DE']['PageCommentInterface_Controller']['SPAMQUESTION'] = 'Spamschutz Frage: %s';
$lang['de_DE']['PageCommentInterface_Form']['AWAITINGMODERATION'] = 'Ihr Kommentar wurde zur Moderation eingereicht.';
$lang['de_DE']['PageCommentInterface_Form']['MSGYOUPOSTED'] = 'Die Nachricht die Sie abgesendet haben:';
$lang['de_DE']['PageCommentInterface_Form']['SPAMDETECTED'] = 'Spam wurde entdeckt!!';
$lang['de_DE']['PageCommentInterface_singlecomment.ss']['APPROVE'] = 'Diesen Kommentar bestätigen';
$lang['de_DE']['PageCommentInterface_singlecomment.ss']['ISNTSPAM'] = 'dieser Kommentar ist kein Spam';
$lang['de_DE']['PageCommentInterface_singlecomment.ss']['ISSPAM'] = 'dieser Kommentar ist Spam';
$lang['de_DE']['PageCommentInterface_singlecomment.ss']['PBY'] = 'Erstellt von';
$lang['de_DE']['PageCommentInterface_singlecomment.ss']['REMCOM'] = 'entferne diesen Kommentar';
$lang['de_DE']['ReportAdmin']['MENUTITLE'] = 'Berichte';
$lang['de_DE']['ReportAdmin_left.ss']['REPORTS'] = 'Berichte';
$lang['de_DE']['ReportAdmin_right.ss']['WELCOME1'] = 'Willkommen bei der';
$lang['de_DE']['ReportAdmin_right.ss']['WELCOME2'] = 'Berichtebereich. Bitte wählen Sie einen Bericht auf der linken Seite.';
$lang['de_DE']['ReportAdmin_SiteTree.ss']['REPORTS'] = 'Berichte';
$lang['de_DE']['SecurityAdmin']['ADDMEMBER'] = 'Mitglied hinzufügen';
$lang['de_DE']['SecurityAdmin']['EDITPERMISSIONS'] = 'Bearbeiten der Rechte und IP Adressen für jede Gruppe';
$lang['de_DE']['SecurityAdmin']['MENUTITLE'] = 'Sicherheit';
$lang['de_DE']['SecurityAdmin']['MENUTITLE'] = 'Sicherheit';
$lang['de_DE']['SecurityAdmin']['NEWGROUP'] = 'Neue Gruppe';
$lang['de_DE']['SecurityAdmin']['SAVE'] = 'Speichern';
$lang['de_DE']['SecurityAdmin']['SGROUPS'] = 'Sicherheitsgruppen';
$lang['de_DE']['SecurityAdmin_left.ss']['CREATE'] = 'Erstellen';
$lang['de_DE']['SecurityAdmin_left.ss']['DEL'] = 'Löschen...';
$lang['de_DE']['SecurityAdmin_left.ss']['DELGROUPS'] = 'Lösche die markierten Gruppen';
$lang['de_DE']['SecurityAdmin_left.ss']['ENABLEDRAGGING'] = 'Erlaube Neuordnen per Drag &amp; Drop';
$lang['de_DE']['SecurityAdmin_left.ss']['GO'] = 'Los';
$lang['de_DE']['SecurityAdmin_left.ss']['SECGROUPS'] = 'Sicherheitsgruppen';
$lang['de_DE']['SecurityAdmin_left.ss']['SELECT'] = 'Markieren Sie die Seiten die Sie löschen wollen und drücken dann die nachfolgende Schaltfläche';
$lang['de_DE']['SecurityAdmin_left.ss']['TOREORG'] = 'Um Ihre Seiten neu zu ordnen, ziehen sie die Seiten an die gewünschte Stelle.';
$lang['de_DE']['SecurityAdmin_right.ss']['WELCOME1'] = 'Willkommen bei dem';
$lang['de_DE']['SecurityAdmin_right.ss']['WELCOME2'] = 'Sicherheitsadministrationsbereich. Bitte wählen Sie eine Gruppe auf der linken Seite.';
$lang['de_DE']['SideReport']['EMPTYPAGES'] = 'Leere Seiten';
$lang['de_DE']['SideReport']['LAST2WEEKS'] = 'Seiten die in den letzten zwei Wochen hinzugefügt wurden';
$lang['de_DE']['SideReport']['REPEMPTY'] = 'Der %s -Bericht ist leer';
$lang['de_DE']['SideReport']['TODO'] = 'zu tun';
$lang['de_DE']['StaticExporter']['BASEURL'] = 'Ausgangs URL';
$lang['de_DE']['StaticExporter']['EXPORTTO'] = 'Exportieren in diesen Ordner';
$lang['de_DE']['StaticExporter']['FOLDEREXPORT'] = 'Ordner zum exportieren';
$lang['de_DE']['StaticExporter']['NAME'] = 'statischer Exporter';
$lang['de_DE']['StaticExporter']['ONETHATEXISTS'] = 'Bitte geben Sie einen vorhandenen Ordner an';
$lang['de_DE']['TableListField_PageControls.ss']['DISPLAYING'] = 'Zeige';
$lang['de_DE']['TableListField_PageControls.ss']['OF'] = 'von';
$lang['de_DE']['TableListField_PageControls.ss']['TO'] = 'bis';
$lang['de_DE']['TableListField_PageControls.ss']['VIEWFIRST'] = 'Ersten anzeigen';
$lang['de_DE']['TableListField_PageControls.ss']['VIEWLAST'] = 'Letzten anzeigen';
$lang['de_DE']['TableListField_PageControls.ss']['VIEWNEXT'] = 'Nächsten anzeigen';
$lang['de_DE']['TableListField_PageControls.ss']['VIEWPREVIOUS'] = 'Vorigen anzeigen';
$lang['de_DE']['TaskList.ss']['BY'] = 'von';
$lang['de_DE']['ThumbnailStripField']['NOFLASHFOUND'] = 'Keine Flashdateien gefunden';
$lang['de_DE']['ThumbnailStripField']['NOFOLDERFLASHFOUND'] = 'Keine Flashdateien gefunden in';
$lang['de_DE']['ThumbnailStripField']['NOFOLDERIMAGESFOUND'] = 'Keine Bilder gefunden in';
$lang['de_DE']['ThumbnailStripField']['NOIMAGESFOUND'] = 'Keine Bilder gefunden';
$lang['de_DE']['ThumbnailStripField']['NOTAFOLDER'] = 'Dies ist  kein Ordner';
$lang['de_DE']['ThumbnailStripField.ss']['CHOOSEFOLDER'] = '(wählen Sie eine der obigen Ordner)';
$lang['de_DE']['ViewArchivedEmail.ss']['CANACCESS'] = 'Sie können unter folgendem Verweis auf die archivierte Seite zugreifen:';
$lang['de_DE']['ViewArchivedEmail.ss']['HAVEASKED'] = 'Sie haben darum gebeten, den Inhalt unserer Seite zu sehen, am';
$lang['de_DE']['WaitingOn.ss']['ATO'] = 'zugewiesen an';
$lang['de_DE']['WidgetAreaEditor.ss']['AVAILABLE'] = 'Verfügbare Widgets';
$lang['de_DE']['WidgetAreaEditor.ss']['INUSE'] = 'Zur Zeit genutzte Widgets';
$lang['de_DE']['WidgetAreaEditor.ss']['NOAVAIL'] = 'Zur Zeit sind keine Widgets verfügbar.';
$lang['de_DE']['WidgetAreaEditor.ss']['TOADD'] = 'Um ein Widget hinzuzufügen, klicken Sie es an und ziehen es hier her.';
$lang['de_DE']['WidgetEditor.ss']['DELETE'] = 'Gelöscht';

?>