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
		
    }	
?>