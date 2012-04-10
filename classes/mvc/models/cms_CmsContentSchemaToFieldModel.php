<?php
/* START AUTO */
class cms_CmsContentSchemaToFieldModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL PRIMARY KEY
	private $schemaId; // INTEGER NOT NULL UNIQUE
	private $fieldId; // INTEGER NOT NULL UNIQUE

	
	public static function write($db, cms_CmsContentSchemaToFieldModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_schema_to_field',
				'id = %i AND schema_id = %i AND field_id = %i', $this->getId(), $this->getSchemaId(), $this->getFieldId(),
				'id = %i', $this->getId(), 
				'schema_id = %i', $this->getSchemaId(), 
				'field_id = %i', $this->getFieldId()
			);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	private static function loadFromSqlRow($row) {
		$object = new self;
		$object->setId($this->i_id);
		$object->setSchemaId($this->i_schema_id);
		$object->setFieldId($this->i_field_id);

		return $object;
	}
	
/* FINISH AUTO */

}
?>