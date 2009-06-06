<?php

class FCPageComment extends DataObjectDecorator
{
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
				'PageAction' => 'Varchar',
				'PageID' => 'Varchar',
				'PageOtherID' => 'Varchar'
			)
		);
		
		$this->extend('extraDBFields', $fields);
		
		return $fields;
	}
}

?>