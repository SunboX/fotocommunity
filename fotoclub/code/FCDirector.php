<?php

class FCDirector extends Director
{
	public static function MakeLink($page, $action)
	{
		$params = self::urlParams();
		
		if(!isset($params['URLSegment'])) return;
		
		$id = $params['ID'];
		$otherid = $params['OtherID'];
		
		switch($page->URLSegment)
		{
			case 'profile':
				if($action == null)
				{
					$action = 'show';
					$p = new MemberGalleryPage();
					$id = ($p->Member()) ? $p->Member()->ID : $id;  // to check if logged in
				}
				if(!is_numeric($id) || $id == 0) return;
				return FCDirector::baseURL() . $page->URLSegment . "/$action/$id";
				break;
				
			case 'galleries':

				if($params['Action'] == 'ImageComments' && $params['ID'] == 'PostCommentForm')
				{
					$action = 'show-image';
					$id = (int)$_REQUEST['PageID'];
					$otherid = (int)$_REQUEST['PageOtherID'];
				}

				if($action == null)
				{
					$action = 'my';
					$id = ($page->Member()) ? $page->Member()->ID : $id;  // to check if logged in
				}
				if(!is_numeric($id) || $id == 0) return;
				return Director::baseURL() . $page->URLSegment . "/$action/$id/$otherid";
		}
	}
	
	public static function fix_path_name($path = '')
	{
		$path = preg_replace('/\/\//', '/', $path);
   		$path = preg_replace('/ /', '_', $path);
    	$path = preg_replace('/[^0-9A-Za-z_\/\.-]/', '', $path);
		return $path;
	}
}

?>