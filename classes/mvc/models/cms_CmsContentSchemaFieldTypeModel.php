<?php
/* START AUTO */
class cms_CmsContentSchemaFieldTypeModel extends cms_BaseModel {
	private $id; // INTEGER NOT NULL PRIMARY KEY
	private $title; // CHARACTER VARYING NOT NULL 
	private $widgetToken; // CHARACTER VARYING NOT NULL 
	private $options; // TEXT NULL 

	
	public static function write($db, cms_CmsContentSchemaFieldTypeModel $object) {
		try {
			$db->insert_or_update_1(
				'cms_content_schema_field_type',
				'id = %i', $this->getId(),
				'id = %i', $this->getId(), 
				'title = %s', $this->getTitle(), 
				'widget_token = %s', $this->getWidgetToken(), 
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
		$object->setWidgetToken($this->s_widget_token);
		$object->setOptions($this->s_options);

		return $object;
	}
	
/* FINISH AUTO */

}
?>