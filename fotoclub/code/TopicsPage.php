<?php

class MembersPage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('TopicsPage'))
		{
			$page = new MembersPage();
			$page->Title = 'Clubthemen';
			$page->write();
			$page->doPublish();
		}
	}
}

class MembersPage_Controller extends Page_Controller
{
	protected $topics_cache;
	
	public function init()
	{
		Requirements::themedCSS('Topics');		
		parent::init();
	}
	
	public function TopicsCount()
	{
		if($this->topics_cache == null) $this->fetchClubTopics();
		
		return $this->topics_cache->Count();
	}
	
	public function Topics()
	{
		if($this->topics_cache == null) $this->fetchClubTopics();
		
		return $this->topics_cache;
	}
	
	private function fetchClubTopics()
	{
		$this->topics_cache = DataObject::get(
			'ClubTopics',
			'',
			'Title'
		);
	}
	
	public function Menu($level)
	{
		if($level == 2) return;
		return parent::Menu($level);
	}
}