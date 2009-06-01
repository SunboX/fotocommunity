<?php

class MemberGalleryPage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('MemberGalleryPage'))
		{
			$page = new MemberProfilePage();
			$page->Title = 'Galerie';
			$page->URLSegment = 'mygallery';
			$page->write();
			$page->doPublish();
		}
	}	
}

class MemberGalleryPage_Controller extends Page_Controller
{
	
}