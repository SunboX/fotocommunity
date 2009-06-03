<?php


class MemberProfilePage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('MemberProfilePage'))
		{
			$page = new MemberProfilePage();
			$page->Title = 'Profil';
			$page->URLSegment = 'profil';
			$page->write();
			$page->doPublish();
		}
	}
	
	public function Link($action = null)
	{
		$id = Director::urlParam('ID');
		if($action == null) $action = 'show';
		if(!is_numeric($id) || $id == 0)
		{
			return Director::baseURL();
		}
		return Director::baseURL() . $this->URLSegment . "/$action/$id";
	}
	
	public function RelativeLink($action = null)
	{
		if($this->URLSegment)
		{
			$id = Director::urlParam('ID');
			if($action == null) $action = 'show';
			if(!is_numeric($id) || $id == 0)
			{
				return Director::baseURL();
			}
			return $this->URLSegment . "/$action/$id";
		}
		else
		{
			user_error("ContentController::RelativeLink() No URLSegment given on a '$this->class' object.  Perhaps you should overload it?", E_USER_WARNING);
		}
	}
}

class MemberProfilePage_Controller extends Page_Controller
{
	function init()
	{
		Requirements::themedCSS('Profile');
		$member = $this->Member() ? $this->Member() : null;
		$nicknameText = ($member) ? ($member->Nickname . '\'s ') : '';
		
		$this->Title = $nicknameText . ' Profil';
		
		parent::init();
 	}
	
	public function edit()
	{
		if($this->IsEditable())
		{
			return array('CurrentProfile' => $this->Member(), 'EditProfileForm' => $this->EditProfileForm());
		}
		Director::redirect('show');
	}
	
	public function show()
	{
		return array('CurrentProfile' => $this->Member(), 'IsEditable' => $this->IsEditable());
	}
	
	function IsEditable()
	{
		return Permission::check('ADMIN') || (is_numeric($this->urlParams['ID']) && Member::currentMember() != null && $this->urlParams['ID'] == Member::currentMember()->ID);
	}
	
	function EditProfileForm()
	{
		$member = $this->Member();

		$fields = singleton('Member')->getEditProfileFields();
		
		$col1 = new CompositeField();
		$col2 = new CompositeField();
		$i = 0;
		foreach($fields->dataFields() as $field)
		{
			if($i++ < 4) $col1->push($field);
			else $col2->push($field);
		}
		
		$multiColumnField = new CompositeField($col1, $col2);
		$multiColumnField->setColumnCount(2);
		
		$fields = new FieldSet();
		$fields->push(new HeaderField('PersonalDetails', 'Profil bearbeiten'));
		$fields->push(new LabelField('', 'Hier kannst Du Dein Öffentliches Profil einrichten'));
		$fields->push($multiColumnField);
		$fields->push(new HtmlEditorField('Signature', 'Profiltext'));	
		$fields->push(new HiddenField('ID'));

		$form = new Form($this, 'EditProfileForm', $fields,
			new FieldSet(new FormAction('dosave', 'Änderungen Speichern')),
			new RequiredFields('Nickname')
		);

		if($member && $member->hasMethod('canEdit') && $member->canEdit())
		{
			$member->Password = '';
			$form->loadDataFrom($member);
			return $form;
		}
		else
		{
			return null;
		}
	}
	
	function dosave($data, $form)
	{
		$member = DataObject::get_by_id('Member', $data['ID']);
		$SQL_email = Convert::raw2sql($data['Email']);
		
		// An existing member may have the requested email that doesn't belong to the
		// person who is editing their profile - if so, throw an error
		$existingMember = DataObject::get_one('Member', "Email = '$SQL_email'");
		if($existingMember)
		{
			if($existingMember->ID != $member->ID)
			{
  				$form->addErrorMessage('Blurb', 'Sorry, that email address already exists. Please choose another.', 'bad');
				
  				Director::redirectBack();
  				return;
			}
		}
		
		if($member->canEdit())
		{
			if(!empty($data['Password']) && !empty($data['ConfirmPassword']))
			{
				if($data['Password'] == $data['ConfirmPassword'])
				{
					$member->Password = $data['Password'];
				}
				else
				{
					$form->addErrorMessage('Blurb', 'PASSNOTMATCH', 'bad');
					Director::redirectBack();
				}
			}
			else
			{
				$form->dataFieldByName('Password')->setValue($member->Password);
			}
		}


		$nicknameCheck = DataObject::get_one('Member',
			"`Nickname` = '{$data['Nickname']}' AND `Member`.`ID` != '{$member->ID}'");

		if($nicknameCheck)
		{
			$form->addErrorMessage('Blurb', 'NICKNAMEEXISTS', "bad");
			Director::redirectBack();
			return;
		}

		$form->saveInto($member);
		$member->write();
		
		Director::redirect('profil/show/' . $data['ID']);
	}
	
 	function Member()
	{
 		$member = null;
 		
		if(is_numeric($this->urlParams['ID']))
		{
			$member = DataObject::get_by_id('Member', $this->urlParams['ID']);
		}
		else
		{
			$member = Member::currentUser();
		}
		
		return $member;
	}
	
	public function Menu($level)
	{
		$menu = parent::Menu($level);
		if($level == 2)
		{
			foreach($menu as $item)
			{
				FB::log($item->Link());
			}
		}
		return $menu;
	}
	
	function MetaTags($includeTitle = true)
	{
		$tags = '';
		$Title = 'Profil bearbeiten';
		if(Director::urlParam('Action') == 'register')
		{ 
			$Title = 'Registration';
		}
		if($includeTitle == true)
		{
			$tags .= '<title>' . $Title . '</title>' ."\n";
		}

		return $tags;
	}
}

?>