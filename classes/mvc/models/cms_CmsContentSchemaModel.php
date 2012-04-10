<?php
/* START AUTO */
class cms_CmsContentSchemaModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL PRIMARY KEY
	private $title; // CHARACTER VARYING NOT NULL 
	private $token; // CHARACTER VARYING NOT NULL 
	private $description; // TEXT NULL 

	
	public static function write($db, cms_CmsContentSchemaModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_schema',
				'id = %i', $this->getId(),
				'id = %i', $this->getId(), 
				'title = %s', $this->getTitle(), 
				'token = %s', $this->getToken(), 
				'description = %S', $this->getDescription()
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
		$object->setToken($this->s_token);
		$object->setDescription($this->s_description);

		return $object;
	}
	
/* FINISH AUTO */

}
?>