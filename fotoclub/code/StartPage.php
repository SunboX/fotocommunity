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
	protected $ThumbnailWidth = 170;
	protected $ThumbnailHeight = 140;
	
	function init()
	{
		Requirements::themedCSS('Start');
		
		parent::init();
 	}
	
	public function LatestImages()
	{
		$images = DataObject::get('File', 'ImageGalleryID > 0', 'Created DESC', '', 5);
		foreach($images as $image)
		{
			//Klassenzuweisung für die Bildkonvertierung
			$imgClass = $image->newClassInstance('ImageGallery_Image');
			$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = '<img src="' . Director::baseURL() . $smallImage->Filename . '" alt="' . $smallImage->Title . '" class="thumbnail" />';
			
			//TemplateControl setzen
			$image->Thumbnail = $thumb;
		}
		return $images;
	}
}