<?php
/* START AUTO */
class cms_CmsContentSchemaFieldValidatorModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL PRIMARY KEY
	private $title; // CHARACTER VARYING NOT NULL 
	private $description; // TEXT NULL 
	private $validatorToken; // CHARACTER VARYING NOT NULL 
	private $options; // TEXT NULL 

	
	public static function write($db, cms_CmsContentSchemaFieldValidatorModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_schema_field_validator',
				'id = %i', $this->getId(),
				'id = %i', $this->getId(), 
				'title = %s', $this->getTitle(), 
				'description = %S', $this->getDescription(), 
				'validator_token = %s', $this->getValidatorToken(), 
				'options = %S', $this->getOptions()
			);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	private static function loadFromSqlRow($row) {
		$object = new self;
		$object->setId($this->i_id);
		$object->setTitle($this->s_title);
		$object->setDescription($this->s_description);
		$object->setValidatorToken($this->s_validator_token);
		$object->setOptions($this->s_options);

		return $object;
	}
	
/* FINISH AUTO */

}
?>