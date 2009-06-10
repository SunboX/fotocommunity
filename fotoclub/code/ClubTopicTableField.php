<?php

class ClubTopicTableField extends ComplexTableField
{
	protected $template = 'ClubTopicTableField';
	
	function __construct($controller, $name, $sourceClass, $fieldList, $detailFormFields = null, $sourceFilter = '', $sourceSort = 'ReleaseDate', $sourceJoin = '')
	{
		parent::__construct($controller, $name, $sourceClass, $fieldList, $detailFormFields, $sourceFilter, $sourceSort, $sourceJoin);
		
		$this->Markable = true;
		$this->setPageSize(15);
		
		// search
		$search = isset($_REQUEST['ClubTopicSearch']) ? Convert::raw2sql($_REQUEST['ClubTopicSearch']) : null;
		if(!empty($_REQUEST['ClubTopicSearch']))
		{
			$this->sourceFilter[] = "`Title` LIKE '%$search%'";
		}
	}
	
	function Items()
	{
		$this->sourceItems = $this->sourceItems();
		
		if(!$this->sourceItems)
		{
			return null;
		}
		
		$pageStart = (isset($_REQUEST['ctf'][$this->Name()]['start']) && is_numeric($_REQUEST['ctf'][$this->Name()]['start'])) ? $_REQUEST['ctf'][$this->Name()]['start'] : 0;
		$this->sourceItems->setPageLimits($pageStart, $this->pageSize, $this->totalCount);
		
		$output = new DataObjectSet();
		foreach($this->sourceItems as $pageIndex => $item)
		{
			$output->push(Object::create('ClubTopicTableField_Item', $item, $this, $pageStart + $pageIndex));
		}
		return $output;
	}

	function SearchForm()
	{
		$query = isset($_GET['ClubTopicSearch']) ? $_GET['ClubTopicSearch'] : null;
		
		$searchFields = new FieldGroup(
			new TextField('ClubTopicSearch', 'Suche', $query),
			new HiddenField('ctf[ID]', '', $this->mode),
			new HiddenField('ClubTopicFieldName', '', $this->name)
		);
		
		$actionFields = new LiteralField('ClubTopicFilterButton', '<input type="submit" name="ClubTopicFilterButton" value="Suchen" id="ClubTopicFilterButton"/>');
		
		$fieldContainer = new FieldGroup(
			$searchFields,
			$actionFields
		);
		
		return $fieldContainer->FieldHolder();
	}
	
	/**
	 * Add new topic
	 */
	function AddRecordForm()
	{
		$fields = new FieldSet();
		foreach($this->FieldList() as $fieldName => $fieldTitle)
		{
			FB::log($fieldName);
			if($fieldName == 'ReleaseDate')
			{
				$fields->push(new DateField($fieldName));	
			}
			else
			{
				$fields->push(new TextField($fieldName));	
			}
		}
		
		$actions = new FieldSet(
			new FormAction('addtopic', 'Hinzufügen')
		);
		
		return new TabularStyle(
			new NestedForm(
				new Form(
					$this,
					'AddRecordForm',
					$fields,
					$actions
				)
			)
		);
	}
	
	/**
	 * Creating a new topic
	 */
	function addtopic()
	{
		$data = $_REQUEST;
		unset($data['ID']);

		$className = Object::getCustomClass($this->stat('data_class'));
		$record = new $className();

		$record->update($data);
		
		$valid = $record->validate();

		if($valid->valid())
		{
			$record->write();

			$this->sourceItems();

			// TODO add javascript to highlight added row (problem: might not show up due to sorting/filtering)
			FormResponse::update_dom_id($this->id(), $this->renderWith($this->template), true);
			FormResponse::status_message('Thema wurde hinzugefügt.', 'good');
		
		}
		else
		{
			FormResponse::status_message(Convert::raw2xml('Thema konnte nicht angelegt werden: ' . $valid->starredlist()), 'bad');
		}

		return FormResponse::respond();
	}
}

/**
 * Single row of a {@link ClubTopicTableField}
 */
class ClubTopicTableField_Item extends ComplexTableField_Item {}

?>