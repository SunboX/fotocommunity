<?php

class ClubTopic extends DataObject
{
	static $db = array(
		'ReleaseDate' => 'Date',
		'Title' => 'Varchar(200)',
	);
	
	static $has_one = array(
		'ImageGallery' => 'ImageGallery'
	);
	
	public function validate()
	{
		return parent::validate();
	}
}

?>