<?php
/* START AUTO */
class cms_CmsContentSchemaFieldToValidatorModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL 
	private $fieldId; // INTEGER NOT NULL UNIQUE
	private $validatorId; // INTEGER NOT NULL UNIQUE

	
	public static function write($db, cms_CmsContentSchemaFieldToValidatorModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_schema_field_to_validator',
				'field_id = %i AND validator_id = %i', $this->getFieldId(), $this->getValidatorId(),
				'id = %i', $this->getId(), 
				'field_id = %i', $this->getFieldId(), 
				'validator_id = %i', $this->getValidatorId()
			);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	private static function loadFromSqlRow($row) {
		$object = new self;
		$object->setId($this->i_id);
		$object->setFieldId($this->i_field_id);
		$object->setValidatorId($this->i_validator_id);

		return $object;
	}
	
/* FINISH AUTO */

}
?>