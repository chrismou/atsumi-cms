<?php
/* START AUTO */
class cms_CmsContentSchemaFieldModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL PRIMARY KEY
	private $schemaFieldTypeId; // INTEGER NOT NULL 
	private $title; // CHARACTER VARYING NOT NULL 
	private $description; // TEXT NULL 
	private $defaultValue; // TEXT NULL 

	
	public static function write($db, cms_CmsContentSchemaFieldModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_schema_field',
				'id = %i', $this->getId(),
				'id = %i', $this->getId(), 
				'schema_field_type_id = %i', $this->getSchemaFieldTypeId(), 
				'title = %s', $this->getTitle(), 
				'description = %S', $this->getDescription(), 
				'default_value = %S', $this->getDefaultValue()
			);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	private static function loadFromSqlRow($row) {
		$object = new self;
		$object->setId($this->i_id);
		$object->setSchemaFieldTypeId($this->i_schema_field_type_id);
		$object->setTitle($this->s_title);
		$object->setDescription($this->s_description);
		$object->setDefaultValue($this->s_default_value);

		return $object;
	}
	
/* FINISH AUTO */

}
?>