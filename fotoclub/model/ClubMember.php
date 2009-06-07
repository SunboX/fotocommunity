<?

class ClubMember extends DataObjectDecorator
{
	protected $ThumbnailWidth = 170;
	protected $ThumbnailHeight = 140;
	
	/**
	 * Edit the given query object to support queries for this extension
	 */
	function augmentSQL(SQLQuery &$query) {}

	/**
	 * Update the database schema as required by this extension
	 */
	function augmentDatabase()
	{
		$exist =  DB::query("SHOW TABLES LIKE 'ClubMember'")->numRecords();
		if($exist > 0)
		{
			DB::query( "UPDATE `Member`, `ClubMember` " .
				"SET `Member`.`ClassName` = 'Member'," .
				"`Member`.`Country` = `ClubMember`.`Country`," .
				"`Member`.`Nickname` = `ClubMember`.`Nickname`," .
				"`Member`.`AvatarID` = `ClubMember`.`AvatarID`," .
				"`Member`.`LastViewed` = `ClubMember`.`LastViewed`" .
				"WHERE `Member`.`ID` = `ClubMember`.`ID`"
			);
			echo("<div style=\"padding:5px; color:white; background-color:blue;\">" . 'The data transfer has succeeded. However, to complete it, you must delete the ClubMember table. To do this, execute the query \"DROP TABLE \'ClubMember\'\".' . "</div>" );
		}
	}

	/**
	 * Define extra database fields
	 *
	 * Return an map where the keys are db, has_one, etc, and the values are
	 * additional fields/relations to be defined
	 */
	function extraDBFields()
	{
		$fields = array(
			'db' => array(
				'City' => 'Varchar',
				'Country' => 'Varchar',
				'Nickname' => 'Varchar',
				'LastViewed' => 'SSDatetime',
				'Signature' => 'HTMLText'
			),
			'has_one' => array(
				'Avatar' => 'Image'
			),
			'searchable_fields' => array(
				'Nickname' => true
			),
			'indexes' => array(
				'Nickname' => true,
			),
		);
		
		$this->extend('extraDBFields', $fields);
		
		return $fields;
	}
	
	/**
	 * Run the Country code through a converter to get the proper Country Name
	 */
	function FullCountry()
	{
		return (isset($this->owner->Country) && !is_null($this->owner->Country)) ? Geoip::countryCode2name($this->owner->Country) : "";
	}
	
	function NumImages()
	{
		if(is_numeric($this->owner->ID))
		{
			return (int) DB::query('SELECT COUNT(*) FROM File WHERE OwnerID = ' . $this->owner->ID . ' AND ImageGalleryID > 0')->value();
		}
		else
		{
			return 0;
		}
	}
	
	function NumImageGalleries()
	{
		if(is_numeric($this->owner->ID))
		{
			return (int) DB::query('SELECT COUNT(*) FROM ImageGallery WHERE MemberID = ' . $this->owner->ID)->value();
		}
		else
		{
			return 0;
		}
	}
	
	public function LatestImages()
	{
		$images = DataObject::get('File', 'ImageGalleryID > 0 AND OwnerID = ' . $this->owner->ID, 'Created DESC', '', 5);
		if($images)
		{
			foreach($images as $image)
			{
				//Klassenzuweisung für die Bildkonvertierung
				$imgClass = $image->newClassInstance('ImageGallery_Image');
				$smallImage = $imgClass->getFormattedImage('ResizeRatio', $this->ThumbnailWidth, $this->ThumbnailHeight); // und für verkleinertes Bild.
				
				//Bildstring zusammenbauen
				$thumb = '<img src="' . Director::baseURL() . $smallImage->Filename . '" alt="' . $smallImage->Title . '" class="thumbnail" />';
				
				//TemplateControl setzen
				$image->Thumbnail = $thumb;
			}
		}
		else
		{
			$images = null;
		}
		return $images;
	}
	
	function Link()
	{
		return 'MemberProfile/show/' . $this->owner->ID;
	}


	/**
	 * Get the fields needed by the forum module
	 *
	 * @param bool $showIdentityURL Should a field for an OpenID or an i-name
	 *                              be shown (always read-only)?
	 * @return FieldSet Returns a FieldSet containing all needed fields for
	 *                  the registration of new users
	 */
	function getEditProfileFields($addmode = false)
	{
		$gravatarText = '<small>' . 'If you use Gravatars then leave this blank' . '</small>';

		$personalDetailsFields = new CompositeField(	
			//new TextField('Nickname', 'Spitzname'),
			new TextField('FirstName', 'Vorname'),
			new TextField('Surname', 'Nachname'),
			new TextField('City', 'Stadt'),
			new CountryDropdownField("Country", 'Land'),
			new EmailField('E-Mail', 'E-Mail'),
			new PasswordField('Password', 'Passwort'),
			new PasswordField('ConfirmPassword', 'Passwort wiederholen'),
			new SimpleImageField('Avatar', 'Profilfoto hochladen ' . $gravatarText)
		);
		$personalDetailsFields->setID('PersonalDetailsFields');
		
		$fieldset = new FieldSet($personalDetailsFields);

		return $fieldset;
	}

	function updateCMSFields(FieldSet &$fields)
	{
		if(Permission::checkMember($this->owner->ID, 'ACCESS_FOTOCLUB'))
		{
			$fields->addFieldToTab('Root.Fotoclub',new TextField('Nickname', 'Nickname'), 'FirstName');
			$fields->addFieldToTab('Root.Fotoclub',new TextField('Occupation', 'Occupation'), 'Surname');
			$fields->addFieldToTab('Root.Fotoclub',new CountryDropdownField('Country', 'Country'), 'Occupation');
			$fields->addFieldToTab('Root.Fotoclub',new ImageField('Avatar', 'Upload avatar.'));
		}
	}


	/**
	 * Can the current user edit the given member?
	 *
	 * @return true if this member can be edited, false otherwise
	 */
	public function canEdit()
	{
		if($this->owner->ID == Member::currentUserID()) return true;

		if($member = Member::currentUser()) return $member->can('AdminCMS');

		return false;
	}
	
	public function IsOnline()
	{
		return strtotime($this->owner->LastVisited) > strtotime('-15 minutes');
	}


	/**
	 * Used in preference to the Nickname field on templates
	 *
	 * Provides a default for the nickname field (first name, or "Anonymous
	 * User" if that's not set)
	 */
	public function Nickname()
	{
		//if($this->owner->Nickname) return $this->owner->Nickname;
		//elseif($this->owner->FirstName) return $this->owner->FirstName;
		if($this->owner->FirstName) return $this->owner->FirstName;
		else return 'Anonymous user';
	}
	
	/** 
	 * Return the url of the avatar or gravatar of the selected user.
	 * Checks to see if the current user has an avatar, if they do use it
	 * otherwise query gravatar.com
	 * 
	 * @return String
	 */
	public function GetAvatar()
	{
		$default = 'images/ClubMember_holder.gif';
		if(file_exists('themes/' . SSViewer::current_theme() . '/images/ClubMember_holder.gif'))
		{
			$default = 'themes/' . SSViewer::current_theme() . '/images/ClubMember_holder.gif';
		}
		// if they have uploaded an image
		if($this->owner->AvatarID)
		{
			$avatar = DataObject::get_by_id("Image", $this->owner->AvatarID);
			if(!$avatar) return $default;
			
			$resizedAvatar = $avatar->SetWidth(80);
			if(!$resizedAvatar) return false;
			
			return $resizedAvatar->URL;
		}
		
		// ok. no image but can we find a gravatar. Will return the default image as defined above if not.
		$grav_url = 'http://www.gravatar.com/avatar.php?gravatar_id=' . md5($this->owner->Email) . '&default=' . urlencode($default) . '&size=80';
		return $grav_url;

		return $default;
	}
	
	public function GetPMLink()
	{
		// ToDo: generate a link to send a private message to this member
		return '#';
	}
	
	public function GetImageGalleriesLink()
	{
		return 'galleries/my/' . $this->owner->ID;
	}
}



/**
 * ClubMember_Validator
 *
 * This class is used to validate the new fields added by the
 * {@link ClubMember} decorator in the CMS backend.
 */
class ClubMember_Validator extends Extension
{
	/**
	 * Client-side validation code
	 *
	 * @param string $js The javascript validation code
	 * @return string Returns the needed javascript code for client-side
	 *                validation.
	 */
	function updateJavascript(&$js, &$form)
	{
		$formID = $form->FormName();
		$passwordFieldName = $form->dataFieldByName('Password')->id();

		$passwordConfirmField = $form->dataFieldByName('ConfirmPassword');
		if(!$passwordConfirmField) return;

		$passwordConfirmFieldName = $passwordConfirmField->id();

		$passwordcheck = <<<JS
Behaviour.register({
	"#$formID":
	{
		validatePasswordConfirmation: function()
		{
			var passEl = _CURRENT_FORM.elements['Password'];
			var confEl = _CURRENT_FORM.elements['ConfirmPassword'];

			if(passEl.value == confEl.value)
			{
			  clearErrorMessage(confEl.parentNode);
				return true;
			}
			else
			{
				validationError(confEl, "Passwords don't match.", "error");
				return false;
			}
		},
		initialize: function()
		{
			var passEl = $('$passwordFieldName');
			var confEl = $('$passwordConfirmFieldName');

			confEl.value = passEl.value;
		}
	}
});
JS;
		Requirements::customScript($passwordcheck, 'func_validatePasswordConfirmation');

		$js .= "\$('$formID').validatePasswordConfirmation();";
		return $js;
	}
}