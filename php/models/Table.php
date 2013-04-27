<?php

abstract class Table {
	static $connection;
	static $table_name;
	private $data;

	public function __construct__($table_name, $data = array()) {
		$this->$table_name = $table_name;
		if ($data == (array)$data) {
			$this->instantiate($data);
		}
	}

	public function instantiate($data = array()) {
		if ($data == (array)$data) {
			$this->data = $data;
		} else {
			$this->data = array();
		}
	}

	public static function loadById($id) {
		$id = (int)$id;
		if ($id <= 0) {
			return Null;
		} else {
			/* To be defined */
			$result = $this->connection->select();
			if ($result != null) {
				$data = $this->connection->array_from($result);
				$obj = new self(self::$table_name, $data);
				return $obj;
			} else {
				return Null;
			}
		}
	}

	public fuction save() {
		$this->connection->update($this->data['id'], $this->data);
	}
}

?>