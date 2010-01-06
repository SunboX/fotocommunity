<?php
    class GuestbookEntry extends DataObject {
    	static $db = array(
			'Name' => 'Varchar(255)',
			'Message' => 'Text',
			'IP' => 'Varchar(15)',
			'Active' => 'Boolean',
			);
		static $has_one = array();
		static $has_many = array();
		static $many_many = array();
		static $belongs_many_many = array();
		
		function deleteLink() {
			$member = Member::currentUser();
			if(!$member || !$member->isAdmin()) return null;
			$link = Controller::curr()->URLSegment . "/deleteEntry/" . $this->ID;
			return " <a href=\"{$link}\">l&ouml;schen</a>";
		}
		
    }	
?>