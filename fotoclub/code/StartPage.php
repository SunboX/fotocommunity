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
	protected $ThumbnailHeight = 120;
	
	function init()
	{
		Requirements::themedCSS('vertical_image_scroller');
		
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript('fotoclub/js/jquery.tools.min.js');
		Requirements::javascript('fotoclub/js/vertical_image_scroller.js');
		
		parent::init();
 	}
	
	public function LatestImages()
	{
		$images = DataObject::get('File', 'ImageGalleryID > 0', 'Created DESC', '', 50);
		foreach($images as $i => $image)
		{
			//Klassenzuweisung für die Bildkonvertierung
			$imgClass = $image->newClassInstance('ImageGallery_Image');
			$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = Director::baseURL() . $smallImage->Filename;
			
			//TemplateControl setzen
			$image->Thumbnail = $thumb;
			$image->Number = $i + 1;
		}
		return $images;
	}
}