<?php

class StartPage extends Page
{
	static $db = array(
		'TopText' => 'HTMLText',
		'BottomText' => 'HTMLText'
	);
	
	function getCMSFields()
	{
		$fields = parent::getCMSFields();
		
		$fields->removeFieldFromTab('Root.Content.Main', 'Content');
		
		$fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('TopText', 'Top Text'));
		$fields->addFieldToTab('Root.Content.Main', new HtmlEditorField('BottomText', 'Bottom Text'));
		
		return $fields;
	}	
}

class StartPage_Controller extends Page_Controller
{
	
}