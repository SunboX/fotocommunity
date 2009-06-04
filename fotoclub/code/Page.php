<?php

class Page extends SiteTree
{	
	public static $db = array();
	
	public static $has_one = array();
	
	public function Link($action = null)
	{
		$link = FCDirector::MakeLink($this, $action);
		return $link == null ? parent::Link($action) : $link;
	}
}

class Page_Controller extends ContentController
{
	
	public function init()
	{
		parent::init();

		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work
		Requirements::themedCSS("layout"); 
		Requirements::themedCSS("typography"); 
		Requirements::themedCSS("form"); 
	}
	
	function NumNewMessages()
	{
		return (int)DB::query('SELECT COUNT(*) FROM PrivateMessage WHERE ToID = ' . Member::currentUserID() . ' AND Readed = 0')->value();
	}
	
	/**
	 * Site search form 
	 */ 
	function SearchForm()
	{
		$searchText = isset($_REQUEST['Search']) ? $_REQUEST['Search'] : 'Search';
		$fields = new FieldSet(
	      	new TextField("Search", "", $searchText)
	  	);
		$actions = new FieldSet(
	      	new FormAction('results', 'Search')
	  	);

	  	return new SearchForm($this, "SearchForm", $fields, $actions);
	}
	
	/**
	 * Process and render search results
	 */
	function results($data, $form)
	{
	  	$data = array(
	     	'Results' => $form->getResults(),
	     	'Query' => $form->getSearchQuery(),
	      	'Title' => 'Search Results'
	  	);

	  	return $this->customise($data)->renderWith(array('Page_results', 'Page'));
	}
	
}

?>