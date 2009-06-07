<?

class ImageGalleryFile extends DataObjectDecorator
{
	/**
	 * Edit the given query object to support queries for this extension
	 */
	function augmentSQL(SQLQuery &$query) {}


	/**
	 * Update the database schema as required by this extension
	 */
	function augmentDatabase()
	{
		$exist =  DB::query( "SHOW TABLES LIKE 'ImageGalleryFile'" )->numRecords();
		if($exist > 0)
		{
			DB::query( "UPDATE `File`, `ImageGalleryFile` " .
				"SET `File`.`ClassName` = 'File'," .
				"`File`.`Created` = `ImageGalleryFile`.`Created`," .
				"`File`.`LastEdited` = `ImageGalleryFile`.`LastEdited`," .
				"`File`.`Name` = `ImageGalleryFile`.`Name`," .
				"`File`.`Title` = `ImageGalleryFile`.`Title`" .
				"`File`.`Filename` = `ImageGalleryFile`.`Filename`" .
				"`File`.`Content` = `ImageGalleryFile`.`Content`" .
				"`File`.`Sort` = `ImageGalleryFile`.`Sort`" .
				"`File`.`ParentID` = `ImageGalleryFile`.`ParentID`" .
				"`File`.`OwnerID` = `ImageGalleryFile`.`OwnerID`" .
				"`File`.`ImageGalleryID` = `ImageGalleryFile`.`ImageGalleryID`" .
				"`File`.`Clicks` = `ImageGalleryFile`.`Clicks`" .
				"WHERE `File`.`ID` = `ImageGalleryFile`.`ID`"
			);
			echo("<div style=\"padding:5px; color:white; background-color:blue;\">" . 'The data transfer has succeeded. However, to complete it, you must delete the ImageGalleryFile table. To do this, execute the query \"DROP TABLE \'ImageGalleryFile\'\".' . "</div>" );
		}
	}

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
				'ImageGalleryID' => 'Int',
				'Clicks' => 'Int'
			),
			'has_one' => array(
				'ImageGallery' => 'ImageGallery'
			)
		);
		
		$this->extend('extraDBFields', $fields);
		
		return $fields;
	}
}

?>