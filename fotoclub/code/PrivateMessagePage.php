<?php

class PrivateMessagePage extends Page
{
	function requireDefaultRecords()
	{
		if(!DataObject::get('PrivateMessagePage'))
		{
			$page = new PrivateMessagePage();
			$page->Title = 'Private Messages';
			$page->write();
			$page->doPublish();
		}
	}	
}

class PrivateMessagePage_Controller extends Page_Controller
{
	function init()
	{
		if(!Member::currentUserID()) Security::permissionFailure();
		parent::init();
	}
	
	function MyMessages()
	{
		return DataObject::get('PrivateMessage', 'ToID = ' . Member::currentUserID());
	}
	
	function PostMessageForm()
	{
		$members = DataObject::get('Member', '', 'Firstname, Surname');
		$allMembers = array();
		foreach($members as $member)
		{
			$allMembers[$member->ID] = "$member->FirstName $member->Surname"; 
		}
		$me = Member::currentUser();
		return new Form($this, 'PostMessageForm', new FieldSet(
			new ReadonlyField('From', 'From', "$me->FirstName $me->Surname"),
			new DropdownField('ToID', 'Send message to', $allMembers),
			new TextField('Subject'),
			new HtmlEditorField('Body')
		), new FieldSet(
			new FormAction('doPostMessage', 'Send')
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