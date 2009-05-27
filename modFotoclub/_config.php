<?php

global $fotoclub_config;
$fotoclub_config = array(
	'group' => array('Administrators', 'Clubmitglieder')
);

DataObject::add_extension('Member', 'ClubMember');
Object::add_extension('Member_Validator', 'ClubMember_Validator');

Object::useCustomClass('HtmlEditorField_Toolbar', 'FotoclubHtmlEditorField_Toolbar');

MemberTableField::addMembershipFields(array(
	'Nickname' => 'Nickname',
	'Occupation' => 'Occupation',
	'Country' => 'Country'
));


?>