<?php
require_once 'includes/constants.php';

class Mysql {
	private $conn;

	function __construct(){
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die ('Eroare la conectarea bazei de date.');
	}

	function verifyUsernameAndPassword($user, $pwd)
	{
		$query = "SELECT * FROM `Users` WHERE `email` = '$user' AND `password` = '$pwd' LIMIT 1";
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
			
		}
	}
}
