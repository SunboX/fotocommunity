<?php

/**
 * Page containing an edit details form
 * Uses Member::getMemberFormFields() to know what to make available for editing
 */
class EditDetailsPage extends Page {
}

class EditDetailsPage_Controller extends Page_Controller {
	/**
	 * Return the edit form for the current user
	 */
	function Form() {
		// Get the fields from the current member
		$member = Member::currentUser();
		$fields = $member->getMemberFormFields();
		
		$actions = new FieldSet(
			new FormAction('savedetails', 'Save')
		);

		$form = new Form($this, 'Form', $fields, $actions);
		$form->loadDataFrom($member);
		
		return $form;
	}

	/**
	 * Save the profile details
	 */
	function savedetails($data, $form) {
		// Get the current member and save the form into it
		$member = Member::currentUser();
		$form->saveInto($member);
		
		// Write to the databsae
		$member->write();
		
		// To do: add a status message on the form, using the standard form message system
		
		// Return to the original form
		Director::redirectBack();
	}
}