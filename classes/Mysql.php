<?php
require_once 'includes/constants.php';

class Mysql {
	private $conn;
	private $con;
	function __construct(){
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die ('Eroare la conectarea bazei de date.');
		$this->con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
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

	function getUserId($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `email` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
	    $message .= 'Whole query: ' . $query;
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $id= $row['user_id'];
		}
		mysql_free_result($result);
		return $id;
	}
}
