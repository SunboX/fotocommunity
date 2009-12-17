<?php

class ClubTopic extends DataObject
{
	private $images_cache = null;
	
	protected $ThumbnailWidth = 175;
	protected $ThumbnailHeight = 150;
	protected $ImageWidth = 640;
	protected $ImageHeight = 480;
	
	static $db = array(
		'ReleaseDate' => 'Date',
		'Title' => 'Varchar(200)',
		'Description' => 'Text'
	);
	
	static $has_many = array(
		'Images' => 'ClubTopic_Image'
	);
	
	public function State()
	{
		if(strtotime($this->ReleaseDate) < time()) return 'past';
		
		$older_new = (int) DB::query("SELECT COUNT(*) FROM ClubTopic WHERE ReleaseDate < '" . $this->ReleaseDate . "' AND ReleaseDate > NOW()")->value();
		
		if($older_new == 0) return 'active';
		
		return 'planned';
	}
	
	public function validate()
	{
		return parent::validate();
	}
	
	public static function getBaseDirectoryName()
	{
		return 'Clubthemen';
	}
	
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
	
	/*
	 * This overwrites parent::Images() !
	 */
	public function Images($link = true)
	{
		$images = $this->fetchImages();
		$newSet = new DataObjectSet();
		foreach($images as $i => $image)
		{
			//Klassenzuweisung für die Bildkonvertierung
			$bigImage = $imgClass->getFormattedImage('ResizeRatio', $this->ImageWidth, $this->ImageHeight); //Bildkonvertierung für vergrößertes Bild ....
			$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = '';
			if($link) $thumb .= '<a href="galleries/show-image/' . $this->ID . '/' . $image->ID . '" class="thumbnail">';
			if($smallImage != null)
			{
				$thumb .= '<div style="background-image:url(' . Director::baseURL() . $smallImage->Filename . ')" alt="' . $smallImage->Title . '" class="thumbnail"></div>';
			}
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
			$bigImage = $image->getFormattedImage('ResizeRatio', $this->ImageWidth, $this->ImageHeight); //Bildkonvertierung für vergrößertes Bild ....
			$smallImage = $image->getFormattedImage('ResizeRatio', 190, 125); // und für verkleinertes Bild.
			
			//Bildstring zusammenbauen
			$thumb = '';
			if($smallImage != null)
			{
				$thumb .= '<img src="' . Director::baseURL() . $smallImage->Filename . '" alt="' . $smallImage->Title . '" class="thumbnail" />';
			}
			
			//TemplateControl setzen
			$image->Thumbnail = $thumb;
			$image->IsModuloThree = $i > 0 && ($i+1)%3 == 0;
			$newSet->push($image);
		}		
		return $newSet;
	}
	
	public function ImagesCount()
	{
		return $this->fetchImages()->Count();
	}
	
	private function fetchImages()
	{
		if($this->images_cache == null && $this->MemberID) $this->images_cache = DataObject::get('ClubTopic_Image', 'ClubTopicID = ' . $this->ID . ' AND OwnerID = ' . $this->MemberID, 'Sort ASC, ClubTopic_Image.ID ASC');
		return $this->images_cache ? $this->images_cache : new DataObjectSet();
	}
	
	public function CanEdit()
	{
		return Permission::check('ADMIN') || (is_numeric($this->urlParams['ID']) && Member::currentMember() != null && $this->urlParams['ID'] == Member::currentMember()->ID);
	}
}
/*
 * Erweiterteklasse zur Erzeugung und Bearbeitung von Bildern
 */
class ClubTopic_Image extends Image
{	
	static $db = array(
		'Clicks' => 'Int'
	);
	
	static $has_one = array(
		'ClubTopic' => 'ClubTopic',
		'Member' => 'Member'
	);
	
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
		return DB::query('SELECT COUNT(*) FROM File LEFT JOIN ClubTopic_Image ON File.ID = ClubTopic_Image.ID WHERE ImageGalleryID = ' . $this->ImageGalleryID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort < ' . $this->Sort . ' OR ( Sort = 0 AND File.ID < ' . $this->ID . '))')->value() == 0;
	}
	
	public function IsLast()
	{
		return DB::query('SELECT COUNT(*) FROM File LEFT JOIN ClubTopic_Image ON File.ID = ClubTopic_Image.ID WHERE ImageGalleryID = ' . $this->ImageGalleryID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort > ' . $this->Sort . ' OR ( Sort = 0 AND File.ID > ' . $this->ID . '))')->value() == 0;
	}
	
	public function PrevImage()
	{
		$images = DataObject::get('ClubTopic_Image', 'ClubTopicID = ' . $this->ClubTopicID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort < ' . $this->Sort . ' OR ( Sort = 0 AND File.ID < ' . $this->ID . '))', 'Sort ASC, File.ID DESC', '', '0,1');
		if($images->Count() == 0) return $this;
		return $images->First();
	}
	
	public function NextImage()
	{
		$images = DataObject::get('ClubTopic_Image', 'ClubTopicID = ' . $this->ClubTopicID . ' AND OwnerID = ' . $this->OwnerID . ' AND ( Sort > ' . $this->Sort . ' OR ( Sort = 0 AND File.ID > ' . $this->ID . '))', 'Sort ASC, File.ID ASC', '', '0,1');
		if($images->Count() == 0) return $this;
		return $images->First();
	}
	
	public function Exif()
	{
		$exif = exif_read_data($this->getFullPath(), 0, true);
 		$ret = new DataObjectSet();
		foreach($exif as $key => $section)
		{
			foreach($section as $name => $val)
			{
				if(trim($val) != '')
				{
					switch("$key.$name")
					{
						case 'IFD0.Model':
							$data = new ViewableData();
							$data->Key = 'Kamera';
							$data->Value = $val;
							$ret->push($data);
							break;
							
						case 'EXIF.FocalLength':
							$data = new ViewableData();
							$data->Key = 'Brennweite';
							$data->Value = $val;
							$ret->push($data);
							break;
							
						case 'COMPUTED.ApertureFNumber':
							$data = new ViewableData();
							$data->Key = 'Blende';
							$data->Value = $val;
							$ret->push($data);
							break;
							
						case 'EXIF.ExposureTime':
							$data = new ViewableData();
							$data->Key = 'Belichtung';
							$data->Value = $val;
							$ret->push($data);
							break;
							
						case 'EXIF.ISOSpeedRatings':
							$data = new ViewableData();
							$data->Key = 'ISO';
							$data->Value = $val;
							$ret->push($data);
							break;
					}
				}
			}
		}
		return $ret;
	}
}

?>