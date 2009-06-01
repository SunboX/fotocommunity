<?php

class ImageGallery extends DataObject
{
	static $db = array(
		'Title' => 'Text',
		'Description' => 'HTMLText',
		'Location' => 'Boolean'		
	);
	static $has_one = array(
		'Member' => 'Member'
	);
	static $has_many = array(
		'Images' => 'Image'
	);
}

?>
