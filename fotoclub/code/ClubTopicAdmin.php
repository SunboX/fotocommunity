<?php

class ClubTopicAdmin extends LeftAndMain
{
	static $url_segment = 'clubtopics';

	static $url_rule = '/$Action';

	static $menu_title = 'Club Themen';
	
	static $allowed_actions = array(
		'deleteall',
		'deletemarked',
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
			'Gallery.Images' => 'Anzahl eingestellter Fotos'
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

		$actions = new FieldSet();
		
		$actions->push(new FormAction('deletemarked', 'Löschen'));

		$form = new Form($this, 'EditForm', $fields, $actions);

		return $form;
	}

	function deletemarked()
	{
			$numComments = 0;
			$folderID = 0;
			$deleteList = '';

			if($_REQUEST['Comments']) {
				foreach($_REQUEST['Comments'] as $commentid) {
					$comment = DataObject::get_by_id('PageComment', $commentid);
					if($comment) {
						$comment->delete();
						$numComments++;
					}
				}
			} else {
				user_error("No comments in $commentList could be found!", E_USER_ERROR);
			}

			echo <<<JS
				$deleteList
				$('Form_EditForm').getPageFromServer($('Form_EditForm_ID').value);
				statusMessage("Deleted $numComments comments.");
JS;
	}

	function deleteall()
	{
		$numComments = 0;
		$spam = DataObject::get('PageComment', 'PageComment.IsSpam=1');

		if($spam) {
			$numComments = $spam->Count();

			foreach($spam as $comment) {
				$comment->delete();
			}
		}

		$msg = sprintf(_t('CommentAdmin.DELETED', 'Deleted %s comments.'), $numComments);
		echo <<<JS
				$('Form_EditForm').getPageFromServer($('Form_EditForm_ID').value);
				statusMessage("$msg");
JS;

	}
}

?>