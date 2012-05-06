<?php
/* START AUTO */
abstract class cms_BaseModel {
	protected $table;
	public function __call($name, $args) {
		$action = substr($name, 0, 3);
		// Assume camel case
		$var = lcfirst(substr($name, 3));
		switch($action) {
			case 'get':
				if(!isset($this->$var)) {
					return false;
				} else {
					return $this->$var;
				}
				break;
			case 'set':
				if(!isset($this->$var)) {
					return false;
				} else {
					$this->$var = $args[0];
					return true;
				}
				break;
			default:
				throw new Exception('Missing call actions');
		}
	}

	public static function loadAll($db, $order = null, $limit = null, $offset = null) {
		$data = $db->fetch('*', self::$table, null, $order, $offset, $limit);

		if(!$data) { return false; }

		$returnArray = array();
		foreach($data as $item) {
			$returnData[] = self::loadFromSqlRow($item);
		}
		return $returnData;
	}

	abstract public static function write($db, $object);
	abstract protected static function loadFromSqlRow($row);
	

/* FINISH AUTO */

}
?>
