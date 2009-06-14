<?php
    class GuestbookPage extends Page {
    	static $db = array(
			'saveIP' => 'Boolean',
			'activate_entry' => 'Boolean',
		);
		static $has_one = array();
		static $has_many = array();
		static $many_many = array();
		static $belongs_many_many = array();
		
		function getCMSFields() {
			$f = parent::getCMSFields();
			$f->addFieldToTab('Root.Content.Guestbook', new CheckboxField('saveID', 'IP-Adresse speichern'));
			$f->addFieldToTab('Root.Content.Guestbook', new CheckboxField('activate_entry', 'neuer Eintrag muss aktiviert werden'));			
			return $f;
		}
		
		static $defaults = array(
			'saveIP' => 'true',
			'activate_entry' => 'false'
		);
    }
	
	class GuestbookPage_Controller extends Page_Controller {
    	function show_list() {
			$filter = ($this->activate_entry) ? 'Active = 1' : null;
    		$list = DataObject::get('GuestbookEntry', $filter);
			return $list;
		}
		
		function add_entry() {
			//Fields
			$fields = new FieldSet(
				new TextField('Name', 'Ihr Name:'),
				new TextareaField('Message', 'Ihre Nachricht:'));
			//Actions
			$actions = new FieldSet(
				new FormAction('doSubmit', 'Eintragen'));
			//required fields
			$validates = new RequiredFields();
			$validates->addRequiredField('Name');
			$validates->addRequiredField('Message');
			//return the entry form
			return new Form($this, 'add_entry', $fields, $actions, $validates);
		}
		
		function doSubmit($data, $form) {
			$entry = new GuestbookEntry();
			$entry->IP = ($this->saveIP) ? $_SERVER["REMOTE_ADDR"] : null;
			$entry->Active = ($this->activate_entry) ? false : true;
			$entry->Name = $data['Name'];
			$entry->Message = $data['Message'];
			$entry->write();
			Director::redirectBack();	
		}
		
		function mySettings() {
			$activate_link = "<a href=\"" .Director::baseURL(). $this->Link() . "delete_entry/" . $this->ID . "\" >Eintrag aktiviren</a>";
			$activate_link = 'hurz';
			$spacer = "&nbsp;|&nbsp;";
			$delete_link = "<a href=\"\" >Eintrag l&ouml;schen</a>";
			return array( 'activate' => $activate_link, 'delete' => $delete_link );
		}
		
		function delete_entry() {
			if(Member::currentUser()){
				DataObject::delete_by_id('GuestbookEntry', Director::urlParam('ID'));
			}
			Director::redirectBack();
		}
		
    }
	
	
?>