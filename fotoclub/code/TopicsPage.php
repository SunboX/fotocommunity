<?php

class TopicsPage extends Page
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
	
	public function ClubTopic()
	{
 		$gallery = null;
 		
		if(is_numeric(Director::urlParam('ID')))
		{
			$gallery = DataObject::get_by_id('ClubTopic', Director::urlParam('ID'));
		}
		else if(isset($_POST['CurrentClubTopicID']))
		{
			$gallery = DataObject::get_by_id('ClubTopic', $_POST['ClubTopicID']);
		}
		else if(isset($_POST['ID']))
		{
			$gallery = DataObject::get_by_id('ClubTopic', $_POST['ID']);
		}
		return $gallery;
	}
	
	public function Image()
	{
		$image = null;
		if(is_numeric(Director::urlParam('OtherID')))
		{
			$image = DataObject::get_by_id('ClubTopic_Image', Director::urlParam('OtherID'));
		}
		return $image->ClubTopicID == Director::urlParam('ID') ? $image : null;
	}
}

class TopicsPage_Controller extends Page_Controller
{
	protected $mem_cache;
	protected $topics_cache;
	
	public function init()
	{
		Requirements::themedCSS('Topics');		
		parent::init();
	}
	
	public function upload()
	{
		if(!Permission::check('ADMIN') && Member::currentUser()->IsClubMember())
		{
			return 'Du musst eingeloggt sein, um Fotos hochladen zu können.';
		}
		Folder::findOrMake(FCDirector::fix_path_name(ClubTopic::getBaseDirectoryName() . '/' . $this->ClubTopic()->Title));
		return array('CurrentClubTopic' => $this->ClubTopic(), 'ImageUploadForm' => $this->ImageUploadForm());
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
			'ClubTopic',
			'',
			'ReleaseDate DESC'
		);
	}
	
	public function ImageUploadForm($data = null, $form = null)
	{
		// swfupload BugFix (Form-Action)
		if($data != null)
		{
			$this->doImageUpload($data, $form);
			return;
		}
		
		$topics = array();
		foreach($this->Topics() as $topic)
		{
			$topics[$topic->ID] = $topic->Title;
		}
		
		$fields = new FieldSet(
			new HeaderField('add images', 'Fotos zu einem Clubthema hinzufügen'),
			new DropdownField(
				'ID',
				'Clubthema',
				$topics
			)
		);
		
		if(Permission::check('ADMIN'))
		{
			$fields->push(new FieldSet(
				new DropdownField(
					'OwnerID',
					'Mitglied',
					$this->Members()
				)
			));
		}
		
		$fields->push(new SWFUploadField(
				'ImageUploadForm',
				'Upload',
				'Fotoupload (max. 10 Bilder)',
				array(
					'post_params' => '\'' . session_name() . '\': \'' . session_id() . '\'',
					'file_types_list' => '*.jpg',
					'file_queue_limit' => '10',
					'browse_button_text' => 'Fotos auswählen ...',
					'file_button_text' => 'Fotos auswählen ...',
					'button_image_url' => Director::absoluteURL('swfupload/images/XPButtonNoText_160x22.png'),
					'button_width' => '160',
					'button_height' => '22',
					'button_text_top_padding' => '2',
					'upload_url' => $this->Link('handleSwfImageUpload'),
					'required' => true,
					'debug' => isset($_REQUEST['debug']) ? 'true' : 'false'
				)
		));
		
		$actions = new FieldSet(
			new FormAction('doImageUpload', 'Hochladen')
		);
		
		return new Form($this, 'ImageUploadForm', $fields, $actions);
	}
	
	public function doImageUpload($data, $form)
	{
		$this->urlParams['ID'] = $data['ID'];
		Director::redirect('clubtopics/show/' . $this->Member()->ID);
	}
	
	/* Function handleswfupload
	 * load the submited files to server and
	 * returns an array to $form object with an list of the uploaded FileID's
	 * array( id => fileid) 
	 */	
	public function handleSwfImageUpload()
	{
		if(isset($_FILES['swfupload_file']))
		{
			$img = new ImageGallery_Image();
		
			$upload = new Upload();
			$upload->loadIntoFile($_FILES['swfupload_file'], $img, FCDirector::fix_path_name(ClubTopic::getBaseDirectoryName() . '/' . $this->ClubTopic()->Title));
			
			$img->OwnerID = $this->Member()->ID;
			$img->ClubTopicID = $this->ClubTopic()->ID;
			$img->write();
			
		   	echo $img->ID;
		}
		else
		{
        	echo ' '; // return something or SWFUpload won't fire uploadSuccess
		}  
	}
	
	public function ClubTopic()
	{
 		return $this->data()->ClubTopic();
	}
	
	public function Image()
	{
		return $this->data()->Image();
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
		
		$group_ids = array();
		foreach($fotoclub_config['group'] as $group_name)
		{
			$do = DataObject::get_one('Group', 'Title = \'' . $group_name . '\'');
			if($do) $group_ids[] = 'GroupID = ' . $do->ID;
		}
		
		
		$members = DataObject::get(
			'Member',
			implode(' OR ', $group_ids),
			'FirstName, Surname, LastVisited, AvatarID',
			'LEFT JOIN Group_Members ON Member.ID = Group_Members.MemberID'
		);
		
		$this->mem_cache = array();
		
		foreach($members as $member)
		{
			$this->mem_cache[$member->ID] = $member->Realname();
		}
	}
}

?>