<?php

class ImageGallery extends DataObject
{
	private $images_cache = null;
	
	protected $ThumbnailWidth = 180;
	protected $ThumbnailHeight = 150;
	protected $ImageWidth = 640;
	protected $ImageHeight = 480;
		
	static $db = array(
		'Date' => 'Date',
		'Title' => 'Varchar(80)',
		'Description' => 'HTMLText',
		'Location' => 'Varchar(80)'	
	);
	static $has_one = array(
		'Member' => 'Member'
	);
	static $has_many = array(
		'Images' => 'Image'
	);
	
	public function Thumbnails()
	{
		return $this->Images(false);
	}
	
	public function EnlargableThumbnails()
	{
		return $this->Images();
	}
	
	public function Images($link = true)
	{
		$images = $this->fetchImages();
		foreach($images as $image)
		{
			//Klassenzuweisung für die Bildkonvertierung
			$imgClass = $image->newClassInstance('ImageGallery_Image');
			$bigImage = $imgClass->getFormattedImage('ResizeRatio', $this->ImageWidth, $this->ImageHeight); //Bildkonvertierung für vergrößertes Bild ....
			$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = '';
			if($link) $thumb .= '<a href="' . Director::baseURL() . $bigImage->Filename . '">';
			$thumb .= '<img src="' . Director::baseURL() . $smallImage->Filename . '" alt="' . $smallImage->Title . '" class="thumbnail" />';
			if($link) $thumb .= '</a>';
			
			//TemplateControl setzen
			$image->Thumbnail = $thumb;
		}
		return $images;
	}
	
	public function ImagesCount()
	{
		return $this->fetchImages()->Count();
	}
	
	private function fetchImages()
	{
		if($this->images_cache == null) $this->images_cache = DataObject::get('File', 'ImageGalleryID = ' . $this->ID . ' AND OwnerID = ' . $this->MemberID);
		return $this->images_cache ? $this->images_cache : new DataObjectSet();
	}
	
	public function CanEdit()
	{
		return Permission::check('ADMIN') || (is_numeric($this->urlParams['ID']) && Member::currentMember() != null && $this->urlParams['ID'] == Member::currentMember()->ID);
	}
}

//Erweiterteklasse zur Erzeugung von Bildern
class ImageGallery_Image extends Image
{
	function generateResizeRatio($gd, $width, $height)
	{
		return $gd->resizeRatio($width, $height);
	}
}

?>
