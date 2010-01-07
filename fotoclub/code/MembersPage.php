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
		
		print_r($fotoclub_config);
		
		$group_ids = null;
		if(is_array($fotoclub_config['group'])){
			$group_ids = array();
			foreach($fotoclub_config['group'] as $group_name)
			{
				$do = DataObject::get_one('Group', 'Title = \'' . $group_name . '\'');
				if($do) $group_ids[] = 'GroupID = ' . $do->ID;
			}
		}else{
			$group_ids = DataObject::get_one('Group', 'Title = \'' . $group_name . '\'');
		}
		$where = is_array($group_ids) ? implode(' OR ', $group_ids) : $group_ids;
		$this->mem_cache = DataObject::get(
			'Member',
			$where,
			'FirstName, Surname, LastVisited, AvatarID',
			'LEFT JOIN Group_Members ON Member.ID = Group_Members.MemberID'
		);
	}
	
	public function Menu($level)
	{
		if($level == 2) return;
		return parent::Menu($level);
	}
}