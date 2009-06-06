<?php

class ImageCommentInterface extends PageCommentInterface
{
	function __construct($controller, $methodName, $page)
	{
		parent::__construct($controller, $methodName, $page);
		self::set_comments_require_login(true);
	}
	
	function forTemplate()
	{
		return $this->renderWith('ImageCommentInterface');
	}

	function PostCommentForm()
	{
		$form = parent::PostCommentForm();
		$form->Fields()->removeByName('NameView');
		$form->Fields()->removeByName('CommenterURL');
		$form->Fields()->push(new HiddenField('CommenterURL', '', ''));
		$form->Fields()->push(new HiddenField('PageAction', '', Director::urlParam('Action')));
		$form->Fields()->push(new HiddenField('PageID', '', Director::urlParam('ID')));
		$form->Fields()->push(new HiddenField('PageOtherID', '', Director::urlParam('OtherID')));
		return $form;
	}
	
	function Comments()
	{
		// Comment limits
		if(isset($_GET['commentStart']))
		{
			$limit = (int)$_GET['commentStart'] . ',' . PageComment::$comments_per_page;
		}
		else
		{
			$limit = '0,' . PageComment::$comments_per_page;
		}
		
		$spamfilter = isset($_GET['showspam']) ? '' : 'AND IsSpam=0';
		$unmoderatedfilter = Permission::check('ADMIN') ? '' : 'AND NeedsModeration = 0';
		$comments =  DataObject::get('PageComment', "ParentID = '" . Convert::raw2sql($this->page->ID) . "' AND PageAction = '" . Convert::raw2sql(Director::urlParam('Action')) . "' AND PageID = '" . Convert::raw2sql(Director::urlParam('ID')) . "' AND PageOtherID = '" . Convert::raw2sql(Director::urlParam('OtherID')) . "' $spamfilter $unmoderatedfilter", "Created DESC", "", $limit);
		
		if(is_null($comments))
		{
			return;
		}
		
		// This allows us to use the normal 'start' GET variables as well (In the weird circumstance where you have paginated comments AND something else paginated)
		$comments->setPaginationGetVar('commentStart');
		
		return $comments;
	}
	
	function CommentRssLink()
	{
		return Director::absoluteBaseURL() . 'PageComment/rss?pageid=' . $this->page->ID . '&page_action=' . Director::urlParam('Action') . '&page_id=' . Director::urlParam('ID') . '&page_other_id=' . Director::urlParam('OtherID') ;
	}
}

?>