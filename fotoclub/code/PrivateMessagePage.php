<?php

class PrivateMessagePage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('PrivateMessagePage'))
		{
			$page = new PrivateMessagePage();
			$page->Title = 'Nachrichten';
			$page->write();
			$page->doPublish();
		}
	}	
}

class PrivateMessagePage_Controller extends Page_Controller
{
	function init()
	{
		Requirements::themedCSS('PrivateMessage');
		if(!Member::currentUserID()) Security::permissionFailure();
		parent::init();
	}
	
	function MyMessages()
	{
		return DataObject::get('PrivateMessage', 'ToID = ' . Member::currentUserID());
	}
	
	function PostMessageForm()
	{
		$me = Member::currentUser();
		
		$fields = new FieldSet(
			new HiddenField('From', '', "$me->FirstName $me->Surname")
		);
		
		if($this->urlParams['ID'] > 0)
		{
			$member = DataObject::get_by_id('Member', $this->urlParams['ID']);
			$fields->push(new ReadonlyField('ToName', 'An Empfänger', "$member->FirstName $member->Surname"));
			$fields->push(new HiddenField('ToID', '', $member->ID));
		}
		else
		{
			$members = DataObject::get('Member', '', 'Firstname, Surname');
			$allMembers = array();
			foreach($members as $member)
			{
				$allMembers[$member->ID] = "$member->FirstName $member->Surname"; 
			}
			$fields->push(new DropdownField('ToID', 'An Empfänger', $allMembers));
		}
		
		$fields->push(new TextField('Subject', 'Betreff'));
		$fields->push(new HtmlEditorField('Body', 'Nachricht'));
		
		return new Form($this, 'PostMessageForm', $fields, new FieldSet(
			new FormAction('doPostMessage', 'Abschicken')
		));
	}
	
	function doPostMessage($data, $form)
	{
		$message = new PrivateMessage();
		$form->saveInto($message);
		$message->FromID = Member::currentUserID();
		$message->Readed = false;
		$message->write();
		
		Director::redirect($this->Link());
	}
	
	function message()
	{
		$message = DataObject::get_by_id('PrivateMessage', $this->urlParams['ID']);
		if($message->ToID == Member::currentUserID())
		{
			$message->Readed = true;
			$message->write();
			
			return array(
				'CurrentMessage' => $message			
			);
		}
		else
		{
			return array();
		}
	}
	

}