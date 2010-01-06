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
		
		// Override HtmlEditorField's config with our own	
		HtmlEditorConfig::get('fotoclub')->setOptions(array(
			'content_css' => SSViewer::current_theme() ? THEMES_DIR . '/' . SSViewer::current_theme() : project() . '/css/editor.css',
			'use_native_selects' => true, // fancy selects are bug as of SS 2.3.0
		));
		HtmlEditorConfig::get('fotoclub')->setButtonsForLine(1, array('bold', 'italic', 'underline', 'strikethrough', 'separator', 'undo', 'redo', 'separator', 'cut', 'copy', 'paste', 'separator', 'link', 'unlink', 'charmap'));
		HtmlEditorConfig::get('fotoclub')->setButtonsForLine(2, array());
		
		HtmlEditorconfig::set_active('fotoclub');
		
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript('fotoclub/js/common.js');
		
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
		$searchText = isset($_REQUEST['Search']) ? $_REQUEST['Search'] : 'Suche';
		$fields = new FieldSet(
	      	new TextField("Search", "", $searchText)
	  	);
		$actions = new FieldSet(
	      	new FormAction('results', 'Suche')
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
	
	public function BaseURL()
	{
		return Director::baseURL();
	}
}

?>