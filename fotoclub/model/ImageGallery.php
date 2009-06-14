<?php

/**
 * ToDo: Create a folder "Galleries" if not exist
 * ToDo: Create a folder for every new Gallery inside the "Galleries" folder
 * ToDo: move ervery Gallery image inside the Gallery-folder
 */

class ImageGallery extends DataObject
{
	private $images_cache = null;
	
	protected $ThumbnailWidth = 175;
	protected $ThumbnailHeight = 150;
	protected $ImageWidth = 640;
	protected $ImageHeight = 480;
		
	static $db = array(
		'Date' => 'Datetime',
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
	
	public function SortableThumbnails()
	{
		return $this->SortingImages();
	}
	
	public function Images($link = true)
	{
		$images = $this->fetchImages();
		$newSet = new DataObjectSet();
		foreach($images as $i => $image)
		{
			//Klassenzuweisung für die Bildkonvertierung
			$imgClass = $image->newClassInstance('ImageGallery_Image');
			$bigImage = $imgClass->getFormattedImage('ResizeRatio', $this->ImageWidth, $this->ImageHeight); //Bildkonvertierung für vergrößertes Bild ....
			$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = '';
			if($link) $thumb .= '<a href="galleries/show-image/' . $this->ID . '/' . $image->ID . '" class="thumbnail">';
			$thumb .= '<img src="' . Director::baseURL() . $smallImage->Filename . '" alt="' . $smallImage->Title . '" class="thumbnail" />';
			if($link) $thumb .= '</a>';
			
			//TemplateControl setzen
			$imgClass->Thumbnail = $thumb;
			$imgClass->IsModuloThree = $i > 0 && ($i+1)%3 == 0;
			$newSet->push($imgClass);
		}		
		return $newSet;
	}
	
	public function SortingImages()
	{
		$images = $this->fetchImages();
		$newSet = new DataObjectSet();
		foreach($images as $i => $image)
		{
			//Klassenzuweisung für die Bildkonvertierung
			$imgClass = $image->newClassInstance('ImageGallery_Image');
			$bigImage = $imgClass->getFormattedImage('ResizeRatio', $this->ImageWidth, $this->ImageHeight); //Bildkonvertierung für vergrößertes Bild ....
			$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = '';
			$thumb .= '<img src="' . Director::baseURL() . $smallImage->Filename . '" alt="' . $smallImage->Title . '" class="thumbnail" />';
			
			//TemplateControl setzen
			$imgClass->Thumbnail = $thumb;
			$imgClass->IsModuloThree = $i > 0 && ($i+1)%3 == 0;
			$newSet->push($imgClass);
		}		
		return $newSet;
	}
	
	public function ImagesCount()
	{
		return $this->fetchImages()->Count();
	}
	
	private function fetchImages()
	{
		if($this->images_cache == null) $this->images_cache = DataObject::get('File', 'ImageGalleryID = ' . $this->ID . ' AND OwnerID = ' . $this->MemberID, 'Sort ASC, ID ASC');
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
	protected $num_comments;
	
	public function generateResizeRatio($gd, $width, $height)
	{
		return $gd->resizeRatio($width, $height);
	}
	
	public function SetMaxWidth($width)
	{
		if($this->getWidth() <= $width) return $this;
		return $this->SetWidth($width);
	}
	
	public function CanEditImage()
	{
		return $this->OwnerID = Member::currentUserID();
	}
	
	public function NumComments()
	{
		if($this->num_comments == null) $this->num_comments = (int) DB::query('SELECT COUNT(*) FROM PageComment WHERE PageOtherID = ' . $this->ID)->value();
		return $this->num_comments;
	}
	
	public function recognizeClick()
	{
		if(Member::currentUser() && Member::currentUser()->ID == $this->OwnerID)
		{
			// don't count own image clicks!
			return;
		}
		
		// don't count bots
		global $fotoclub_config;
		$remoteHostName = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		foreach($fotoclub_config['bots'] as $key => $botHostName)
		{
			if(strpos($remoteHostName, $botHostName))
			{
				return;
			}
		}
		
		$this->update(array(
			'Clicks' => $this->Clicks + 1 // increment counter
		)); 
		$this->write();//write the changes
	}
	
	public function IsFirst()
	{
		return DB::query('SELECT COUNT(*) FROM File WHERE ImageGalleryID = ' . $this->ImageGalleryID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort < ' . $this->Sort . ' OR ( Sort = 0 AND ID < ' . $this->ID . '))')->value() == 0;
	}
	
	public function IsLast()
	{
		return DB::query('SELECT COUNT(*) FROM File WHERE ImageGalleryID = ' . $this->ImageGalleryID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort > ' . $this->Sort . ' OR ( Sort = 0 AND ID > ' . $this->ID . '))')->value() == 0;
	}
	
	public function PrevImage()
	{
		$images = DataObject::get('File', 'ImageGalleryID = ' . $this->ImageGalleryID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort < ' . $this->Sort . ' OR ( Sort = 0 AND ID < ' . $this->ID . '))', 'Sort ASC, ID DESC', '', '0,1');
		if($images->Count() == 0) return $this;
		return $images->First()->newClassInstance('ImageGallery_Image');
	}
	
	public function NextImage()
	{
		$images = DataObject::get('File', 'ImageGalleryID = ' . $this->ImageGalleryID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort > ' . $this->Sort . ' OR ( Sort = 0 AND ID > ' . $this->ID . '))', 'Sort ASC, ID ASC', '', '0,1');
		if($images->Count() == 0) return $this;
		return $images->First()->newClassInstance('ImageGallery_Image');
	}
}

?>
