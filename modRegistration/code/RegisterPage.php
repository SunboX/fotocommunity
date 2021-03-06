<?php

/**
 * Page containing a registration form.
 * Uses Member::getMemberFormFields() to know what to ask of a user.
 */
class RegisterPage extends Page {
	static $db = array(
		"ThanksTitle" => "HTMLVarchar",
		"ThanksContent" => "HTMLText",
	);
	
	function getCMSFields($cms) {
		$fields = parent::getCMSFields($cms);
		
		$fields->addFieldsToTab("Root.Content.Thanks", array(
			new TextField("ThanksTitle", "Title"),
			new HTMLEditorField("ThanksContent", "Content"),		
		));
		
		return $fields;
	}
	
	public function registration_group(){
		global $reg_config;
		$title = $reg_config['newREGtitle'];
		$code = $reg_config['newREGcode'];
		$group = Group::get_one('Group', "Title = '{$title}' and Code = '{$code}'");
		if(!$group){
			$group = new Group();
			$group->Title = $reg_config['newREGtitle'];
			$group->Code = strtoupper($reg_config['newREGcode']);
			$group->write();
		}
		return $group;
	}
	
}

class RegisterPage_Controller extends Page_Controller {
	/**
	 * Return the edit form for the current user
	 */
	function Form() {
		// Get the fields from a new member - seems like a good default :-)
		$member = new Member();
		$fields = $member->getMemberFormFields();

		$actions = new FieldSet(
			new FormAction('register', 'Register')
		);

		$form = new Form($this, 'Form', $fields, $actions);

		return $form;
	}

	/**
	 * Save the profile details
	 */
	function register($data, $form) {
		// Create a new member and save the form into it
		$member = new Member();
		$form->saveInto($member);
		// Write to the databsae
		$member->write();
		// To do: add a status message on the form, using the standard form message system
		//set new member to right group
		$member->Groups()->add($this->registration_group());
		// Return to the original form
		Director::redirect($this->Link() . 'thanks');
	}
	
	function thanks() {
		return array(
			'Title' => $this->ThanksTitle,
			'Content' => $this->ThanksContent,
			'Form' => ' ',
		);
	}
}