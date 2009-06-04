<?php

class FCDirector extends Director
{
	public static function MakeLink($page, $action)
	{
		$params = self::urlParams();
		
		if(!isset($params['URLSegment'])) return;
		
		$id = $params['ID'];
		
		switch($page->URLSegment)
		{
			case 'profile':
				if($action == null)
				{
					$action = 'show';
					$p = new MemberGalleryPage();
					$id = ($p->Member()) ? $p->Member()->ID : null;  // to check if logged in
				}
				if(!is_numeric($id) || $id == 0) return;
				return FCDirector::baseURL() . $page->URLSegment . "/$action/$id";
				break;
				
			case 'galleries':
				if($action == null)
				{
					$action = 'my';
					$id = ($page->Member()) ? $page->Member()->ID : null;  // to check if logged in
				}
				if(!is_numeric($id) || $id == 0) return;
				return Director::baseURL() . $page->URLSegment . "/$action/$id";
		}
	}
}

?>