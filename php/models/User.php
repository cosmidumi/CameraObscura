<?php

class User extends Table {
	const TABLE_NAME = "users";

	public function __construct__() {
		parent::__construct__(self::TABLE_NAME);
	}
}


?>