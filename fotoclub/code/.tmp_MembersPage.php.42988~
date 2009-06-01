<?php

class MembersPage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('MembersPage'))
		{
			$page = new MembersPage();
			$page->Title = 'Mitglieder';
			$page->write();
			$page->doPublish();
		}
	}	
}

class MembersPage_Controller extends Page_Controller
{
	protected $mem_cache;
	
	public function init()
	{
		Requirements::themedCSS('Members');
		
		if(!Member::currentUserID()) Security::permissionFailure();
		
		parent::init();
	}
	
	public function MembersCount()
	{
		if($this->mem_cache == null) $this->fetchClubMembers();
		
		return $this->mem_cache->Count();
	}
	
	public function Members()
	{
		if($this->mem_cache == null) $this->fetchClubMembers();
		
		return $this->mem_cache;
	}
	
	private function fetchClubMembers()
	{
		global $fotoclub_config;
		
		if(!isset($fotoclub_config['group'])) return;
		
		$group_ids = array();
		foreach($fotoclub_config['group'] as $group_name)
		{
			$do = DataObject::get_one('Group', 'Title = \'' . $group_name . '\'');
			if($do) $group_ids[] = 'GroupID = ' . $do->ID;
		}
		
		$this->mem_cache = DataObject::get(
			'Member',
			implode(' OR ', $group_ids),
			'FirstName, Surname, LastVisited, AvatarID',
			'LEFT JOIN Group_Members ON Member.ID = Group_Members.MemberID'
		);
	}
}