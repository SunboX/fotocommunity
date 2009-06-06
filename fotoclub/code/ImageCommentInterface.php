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
		return $form;
	}
}

?>