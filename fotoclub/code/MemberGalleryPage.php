<?php

class MemberGalleryPage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('MemberGalleryPage'))
		{
			$page = new MemberGalleryPage();
			$page->Title = 'Galerie';
			$page->URLSegment = 'galleries';
			$page->write();
			$page->doPublish();
		}
	}
	
	public function Member()
	{
 		$member = null;
		$id = 0;
		switch(Director::urlParam('Action'))
		{
			case 'my':
			case 'new-gallery':
				$id = Director::urlParam('ID');
				break;
				
			default:
				if($this->Gallery() != null) $id = $this->Gallery()->MemberID;
				else $id = Director::urlParam('ID');
		}
		
		$member = ($id) ? DataObject::get_by_id('Member', $id) : Member::currentUser(); 
		return $member;
	}
	
	public function Gallery()
	{
 		$gallery = null;
 		
		if(is_numeric(Director::urlParam('ID')))
		{
			$gallery = DataObject::get_by_id('ImageGallery', Director::urlParam('ID'));
		}
		else if(isset($_POST['CurrentGalleryID']))
		{
			$gallery = DataObject::get_by_id('ImageGallery', $_POST['CurrentGalleryID']);
		}
		else if(isset($_POST['ID']))
		{
			$gallery = DataObject::get_by_id('ImageGallery', $_POST['ID']);
		}
		return $gallery;
	}
	
	public function Image()
	{
		$image = null;
		if(is_numeric(Director::urlParam('OtherID')))
		{
			$image = DataObject::get_by_id('ImageGallery_Image', Director::urlParam('OtherID'));
		}
		return $image->ImageGalleryID == Director::urlParam('ID') ? $image : null;
	}
	
	public function getUploadFolder(){
		//get member ID, but if current user is admin, get the memberid from gallery object to load images to the right directory 
		$MemberID = Member::currentUser()->isAdmin() ? $this->Gallery()->MemberID : Member::currentUserID();
		//build directory
		$Foldername = FCDirector::fix_path_name(ImageGallery::getBaseDirectoryName() . "/" . $MemberID . "/"  . $this->Gallery()->ID);
		//create folder, if does't exists!
		Folder::findOrMake(FCDirector::fix_path_name(ImageGallery::getBaseDirectoryName() . "/" . $MemberID . "/"  . $this->Gallery()->ID));
		//return directory
		return $Foldername;
	}
}

class MemberGalleryPage_Controller extends Page_Controller
{
	protected $my_galleries_cache;
	
	function init()
	{
		Requirements::themedCSS('Gallery');
		
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		switch(Director::urlParam('Action'))
		{
			case 'modify-images':
			case 'doModifyImages':
				Requirements::customScript("
					var url_segment = '" . Controller::curr()->URLSegment . "';
				");
				Requirements::javascript(THIRDPARTY_DIR . '/jquery/ui/ui.core.js');
				Requirements::javascript(THIRDPARTY_DIR . '/jquery/ui/ui.sortable.js');
				Requirements::javascript('fotoclub/js/modify_images.js');
				break;
				
			case 'show-image':
				Requirements::javascript('fotoclub/js/show_image.js');
				break;
		}
		Requirements::javascript('fotoclub/js/jquery.tools.min.js');
		Requirements::javascript('fotoclub/js/Gallery.js');
		
		$member = $this->Member() ? $this->Member() : null;
		$nicknameText = ($member) ? ($member->Nickname . '\'s ') : '';
		
		$this->Title = $nicknameText . ' Fotoalben';
		
		parent::init();
 	}
	
	public function my()
	{
		return array('CurrentProfile' => $this->Member(), 'Galleries' => $this->MyGalleries(), 'CanAddGallery' => $this->CanAddGallery());
	}
	
	public function new_gallery()
	{
		return array('CurrentProfile' => $this->Member(), 'NewGalleryForm' => $this->NewGalleryForm());
	}
	
	public function upload()
	{
		return array('CurrentProfile' => $this->Member(), 'CurrentGallery' => $this->Gallery(), 'ImageUploadForm' => $this->ImageUploadForm());
	}
	
	public function edit()
	{
		return array('CurrentProfile' => $this->Member(), 'CurrentGallery' => $this->Gallery(), 'EditGalleryForm' => $this->EditGalleryForm());
	}
	
	public function show()
	{
		return array('CurrentProfile' => $this->Member(), 'CurrentGallery' => $this->Gallery());
	}
	
	public function show_image()
	{
		$this->Image()->recognizeClick();
		return array('CurrentProfile' => $this->Member(), 'CurrentGallery' => $this->Gallery(), 'CurrentImage' => $this->Image());
	}
	
	function modify_images()
	{
		$images = DataObject::get('Image', 'ImageGalleryID = ' . Director::urlParam('ID'));
		foreach($images as $image)
		{
			
		}
		return array('CurrentProfile' => $this->Member(), 'CurrentGallery' => $this->Gallery());;
	}
	
	public function delete_image()
	{
		$imageID = Director::urlParam('OtherID');
		if(DataObject::get_by_id('Image', $imageID)->newClassInstance('ImageGallery_Image')->CanEditImage())
		{
			DataObject::delete_by_id('Image', $imageID);
		}
		Director::redirect(Director::baseURL() . 'galleries/show/' . Director::urlParam('ID'));
	}
	
	public function doModifyImages()
	{
  		if(is_array($_POST['item']))
		{
			foreach($_POST['item'] as $sort => $id)
			{
				if($img = DataObject::get_by_id('Image', $id))
				{
					$img->Sort = $sort;
					if(isset($_POST['item_title_' . $id]))
					{
						$img->Title = $_POST['item_title_' . $id];
					}
					$img->write();
				}
			}
  		}
		print_r($_POST);
  		die(''); // Send something back
	}
	
	public function EditGalleryForm()
	{
		$fields = new FieldSet(
			new TextField('Title', 'Name (max. 80 Zeichen)'),
			new TextField('Location', 'Ort (max. 80 Zeichen)'),
			new HtmlEditorField('Description', 'Beschreibung'),
			new HiddenField('ID')
		);
		
		$actions = new FieldSet(
			new FormAction('doEditGallery', 'Album bearbeiten')
		);
		
		$validator = new RequiredFields('Title');
		
		$form = new Form($this, 'EditGalleryForm', $fields, $actions, $validator);
		
		if($this->CanEditGallery())
		{
			$form->loadDataFrom($this->Gallery());
			return $form;
		}
		return null;
	}
	
	public function doEditGallery($data, $form)
	{
		if(!$this->CanEditGallery()) Director::redirect(Director::baseURL());
		
		$gallery = DataObject::get_by_id('ImageGallery', $data['ID']);
		$form->saveInto($gallery);
		$gallery->write();
		
		//Director::redirect('galleries/show/' . $gallery->ID);
		Director::redirect('galleries/my/' . $gallery->MemberID);
	}
	
	public function NewGalleryForm()
	{
		$fields = new FieldSet(
			new TextField('Title', 'Name (max. 80 Zeichen)'),
			new TextField('Location', 'Ort (max. 80 Zeichen)'),
			new HtmlEditorField('Description', 'Beschreibung'),
			new HiddenField('MemberID', 'ID', $this->Member()->ID)
		);
		
		$actions = new FieldSet(
			new FormAction('doNewGallery', 'Album erstellen')
		);
		
		$validator = new RequiredFields('Title');
		
		return new Form($this, 'NewGalleryForm', $fields, $actions, $validator);
	}
	
	public function doNewGallery($data, $form)
	{
		$gallery = new ImageGallery();
		$form->saveInto($gallery);
		$gallery->Date = date('Y-m-d H:i:s');
		$gallery->write();
		
		Director::redirect('galleries/upload/' . $gallery->ID);
	}
	
	public function ImageUploadForm($data = null, $form = null)
	{
		// swfupload BugFix (Form-Action)
		if($data != null)
		{
			$this->doImageUpload($data, $form);
			return;
		}
		
		$fields = new FieldSet(
			new HeaderField('add images', 'Fotos zum Album »' . $this->Gallery()->Title . '« hinzufügen'),
			new SWFUploadField(
				'ImageUploadForm',
				'Upload',
				'Fotoupload (max. 10 Bilder)',
				array(
					'post_params' => '\'' . session_name() . '\': \'' . session_id() . '\', \'CurrentGalleryID\': \'' . $this->Gallery()->ID . '\'',
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
			),
			new HiddenField('ID', 'ID', $this->Gallery()->ID)
		);
		
		$actions = new FieldSet(
			new FormAction('doImageUpload', 'Hochladen')
		);
		
		return new Form($this, 'ImageUploadForm', $fields, $actions);
	}
	
	public function doImageUpload($data, $form)
	{
		$this->urlParams['ID'] = $data['ID'];
		Director::redirect('galleries/my/' . $this->Member()->ID);
	}
	
	/* Function handleswfupload
	 * load the submited files to server and
	 * returns an array to $form object with an list of the uploaded FileID's
	 * array( id => fileid) 
	 */	
	public function handleSwfImageUpload()
	{
		$MemberID = Member::currentUser()->isAdmin() ? $this->Gallery()->MemberID : Member::currentUserID();
		if(isset($_FILES['swfupload_file']))
		{
			$img = new ImageGallery_Image();
		
			$upload = new Upload();
			$upload->loadIntoFile($_FILES['swfupload_file'], $img, $this->getUploadFolder());
			$img->OwnerID = $this->Member()->ID;
			$img->ImageGalleryID = $this->Gallery()->ID;
			$img->write();
			
		   	echo $img->ID;
		}
		else
		{
        	echo ' '; // return something or SWFUpload won't fire uploadSuccess
		}  
	}
	
	public function CanAddGallery()
	{
		return $this->isGalleryAdmin();
	}
	
	public function CanEditGallery()
	{
		return $this->isGalleryAdmin();
	}
	
	private function isGalleryAdmin()
	{
		return Permission::check('ADMIN') || (is_numeric($this->urlParams['ID']) && Member::currentMember() != null && $this->Member()->ID == Member::currentMember()->ID);
	}
	
 	public function Member()
	{
		return $this->data()->Member();
	}
	
	public function Gallery()
	{
 		return $this->data()->Gallery();
	}
	
	public function Image()
	{
		return $this->data()->Image();
	}
	
	public function MyGalleriesCount()
	{
		if($this->my_galleries_cache == null) $this->fetchMyGalleries();
		
		return $this->my_galleries_cache->Count();
	}
	
	public function MyGalleries()
	{
		if($this->my_galleries_cache == null) $this->fetchMyGalleries();
		
		return $this->my_galleries_cache;
	}
	
	private function fetchMyGalleries()
	{
		$this->my_galleries_cache = DataObject::get(
			'ImageGallery',
			'MemberID = ' . $this->Member()->ID
		);
	}
	
	/**
	 * Returns a image comment system
	 */
	function ImageComments()
	{
		if($this->data() && $this->data()->ProvideComments)
		{
			return new ImageCommentInterface($this, 'ImageComments', $this->data());
		}
		else
		{
			if(isset($_REQUEST['executeForm']) && $_REQUEST['executeForm'] == 'PageComments.PostCommentForm')
			{
				echo 'Comments have been disabled for this page';
				die();
			}
		}
	}
}