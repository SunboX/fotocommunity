<?php

class ClubTopicAdmin extends LeftAndMain
{
	static $url_segment = 'clubtopics';

	static $url_rule = '/$Action';

	static $menu_title = 'Club Themen';
	
	static $allowed_actions = array(
		'deleteall',
		'showtable',
		'EditForm'
	);

	public function showtable($params)
	{
	    return $this->getLastFormIn($this->renderWith('ClubTopicAdminAdmin_right'));
	}

	public function EditForm()
	{
		$tableFields = array(
			'Title' => 'Thema',
			'ReleaseDate' => 'Abgabetermin',
			'ImageGallery.Images' => 'Anzahl eingestellter Fotos'
		);

		$popupFields = new FieldSet(
			new DateField('ReleaseDate', 'Abgabetermin'),
			new TextField('Title', 'Thema')
		);
		
		$table = new ClubTopicTableField($this, 'ClubTopics', 'ClubTopic', $tableFields, $popupFields, array());

		$fields = new FieldSet(
			new TabSet('Root',
				new Tab('ClubThemen',
					new LiteralField('Title', ''),
					$table
				)
			)
		);

		$form = new Form($this, 'EditForm', $fields, new FieldSet());

		return $form;
	}

	public function AddRecordForm()
	{
		$m = Object::create('ClubTopicTableField',
			$this,
			'Topics',
			$this->currentPageID()
		);
		return $m->AddRecordForm();
	}
	
	/**
	 * Creating a new topic
	 */
	function addtopic()
	{
		$data = $_REQUEST;
		unset($data['ID']);
		
		$record = new ClubTopic();
		$record->update($data);
		
		$valid = $record->validate();

		if($valid->valid())
		{
			$record->write();
			
			FormResponse::status_message('Thema wurde hinzugefügt.', 'good');
		
		}
		else
		{
			FormResponse::status_message(Convert::raw2xml('Thema konnte nicht angelegt werden: ' . $valid->starredlist()), 'bad');
		}

		return FormResponse::respond();
	}
}

?>