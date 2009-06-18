<?php

class ClubTopic extends DataObject
{
	static $db = array(
		'ReleaseDate' => 'Date',
		'Title' => 'Varchar(200)',
		'Description' => 'Text'
	);
	
	static $has_many = array(
		'Images' => 'Image'
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
}

?>