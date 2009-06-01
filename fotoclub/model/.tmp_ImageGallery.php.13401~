<?php

/**
 * Represents a single private message, send from one user to another
 */
class PrivateMessage extends DataObject
{
	static $db = array(
		'Subject' => 'Text',
		'Body' => 'HTMLText',
		'Readed' => 'Boolean'		
	);
	static $has_one = array(
		'From' => 'Member',
		'To' => 'Member'
	);
}
