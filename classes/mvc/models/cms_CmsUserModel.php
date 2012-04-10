<?php
/* START AUTO */
class cms_CmsUserModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL 
	private $username; // CHARACTER VARYING NOT NULL 
	private $userPass; // CHARACTER VARYING NOT NULL 
	private $fullname; // CHARACTER VARYING NOT NULL 
	private $created; // TIMESTAMP WITH TIME ZONE NULL 

	
	public static function write($db, cms_CmsUserModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_user',
				
				'id = %i', $this->getId(), 
				'username = %s', $this->getUsername(), 
				'user_pass = %s', $this->getUserPass(), 
				'fullname = %s', $this->getFullname(), 
				'created = %T', $this->getCreated()
			);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	private static function loadFromSqlRow($row) {
		$object = new self;
		$object->setId($this->i_id);
		$object->setUsername($this->s_username);
		$object->setUserPass($this->s_user_pass);
		$object->setFullname($this->s_fullname);
		$object->setCreated($this->t_created);

		return $object;
	}
	
/* FINISH AUTO */

}
?>