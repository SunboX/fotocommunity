<?php

class ClubTopic extends DataObject
{
	static $db = array(
		'ReleaseDate' => 'Datetime',
		'Title' => 'Varchar(200)',
	);
	
	static $has_one = array(
		'ImageGallery' => 'ImageGallery'
	);
}

?>