<?php

class FCPageComment extends DataObjectDecorator
{
	/**
	 * Define extra database fields
	 *
	 * Return an map where the keys are db, has_one, etc, and the values are
	 * additional fields/relations to be defined
	 */
	function extraDBFields()
	{
		$fields = array(
			'db' => array(
				'PageAction' => 'Varchar',
				'PageID' => 'Varchar',
				'PageOtherID' => 'Varchar'
			)
		);
		
		$this->extend('extraDBFields', $fields);
		
		return $fields;
	}
}

class FCPageComment_Controller extends PageComment_Controller
{
	public function rss()
	{
		$parentcheck = isset($_REQUEST['pageid']) ? 'ParentID = ' . (int) $_REQUEST['pageid'] : 'ParentID > 0';
		$page_action = isset($_REQUEST['page_action']) ? " AND PageAction = '" . Convert::raw2sql($_REQUEST['page_action']) . "'" : '';
		$page_id = isset($_REQUEST['page_id']) ? " AND PageID = '" . Convert::raw2sql($_REQUEST['page_id']) . "'" : '';
		$page_otherid = isset($_REQUEST['page_otherid']) ? " AND PageOtherID = '" . Convert::raw2sql($_REQUEST['page_otherid']) . "'" : '';
		$comments = DataObject::get('PageComment', "$parentcheck $page_action $page_id $page_otherid AND IsSpam=0", 'Created DESC', '', 10);
		if(!isset($comments))
		{
			$comments = new DataObjectSet();
		}
		
		$rss = new RSSFeed($comments, 'home/', 'Page comments', '', 'RSSTitle', 'Comment', 'Name');
		$rss->outputToBrowser();
	}
}

?>