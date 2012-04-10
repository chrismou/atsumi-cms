<?php
/* START AUTO */
class cms_CmsContentTypeListModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL PRIMARY KEY
	private $token; // CHARACTER VARYING NOT NULL UNIQUE
	private $description; // TEXT NULL 

	
	public static function write($db, cms_CmsContentTypeListModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_type_list',
				'id = %i AND token = %s', $this->getId(), $this->getToken(),
				'id = %i', $this->getId(), 
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
		$object->setToken($this->s_token);
		$object->setDescription($this->s_description);

		return $object;
	}
	
/* FINISH AUTO */

}
?>