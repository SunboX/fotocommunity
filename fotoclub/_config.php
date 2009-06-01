<?php

require_once('lib/FirePHP/FirePHP.class.php');
require_once('lib/FirePHP/fb.php');
$firephp = FirePHP::getInstance(true);
$firephp->setEnabled(true);

global $fotoclub_config;
$fotoclub_config = array(
	'group' => array('Administrators', 'Clubmitglieder')
);

global $project;
$project = 'fotoclub';

global $databaseConfig;
$databaseConfig = array(
	"type" => "MySQLDatabase",
	"server" => "localhost", 
	"username" => "root", 
	"password" => "", 
	"database" => "fotoclub",
);

// Sites running on the following servers will be
// run in development mode. See
// http://doc.silverstripe.com/doku.php?id=devmode
// for a description of what dev mode does.
Director::set_dev_servers(array(
	'localhost',
	'127.0.0.1',
));


i18n::enable();
i18n::set_locale('de_DE');
//i18n::set_default_lang('de_DE');
setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge'); 

// This line set's the current theme. More themes can be
// downloaded from http://www.silverstripe.com/themes/
SSViewer::set_theme('fotoclub');

DataObject::add_extension('Member', 'ClubMember');
Object::add_extension('Member_Validator', 'ClubMember_Validator');
DataObject::add_extension('File', 'ImageGalleryFile');

Object::useCustomClass('HtmlEditorField_Toolbar', 'FotoclubHtmlEditorField_Toolbar');

MemberTableField::addMembershipFields(array(
	'Nickname' => 'Nickname',
	'Occupation' => 'Occupation',
	'Country' => 'Country'
));


?>