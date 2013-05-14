<?php
require_once 'includes/constants.php';

class Mysql {
	private $conn;
	private $con;
	function __construct(){
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die ('Eroare la conectarea bazei de date.');
		$this->con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
	}

	function insertIntoDatabase($email, $password, $nume, $prenume, $adresa, $descriere, $camera, $obiectiv)
	{
		$query = "INSERT INTO `cameraobscura`.`Users`(`email`, `password`, `first_name`, `last_name`, `address`, `description`, `lens_id`, `camera_id`, `type_id`, `rank_id`) VALUES ('$email', '" . md5($password) ."','$prenume','$nume','$adresa','$descriere','$camera','$obiectiv',1,1)";
		//echo $query;
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		else return true;
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
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $id= $row['user_id'];
		}
		mysql_free_result($result);
		return $id;
	}

		function getFirstName($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $firstname= $row['first_name'];
		}
		mysql_free_result($result);
		return $firstname;
	}

		function getLastName($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $lastname= $row['last_name'];
		}
		mysql_free_result($result);
		return $lastname;
	}

	function getPhotos($user)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE  `user_id` ='$user'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
		while($row = mysql_fetch_assoc($result)) {
		  array_push($solutions, $row['photo_id']);
		}
//		mysql_free_result($result);
		return $solutions;
		
	}

	function getNumberOfPhotos($user)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE  `user_id` ='$user'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $n=0;
		while($row = mysql_fetch_assoc($result)) {
			$n++;
		}
		return $n;
	}

	function getCategories()
	{
		$query = "SELECT * FROM  `cameraobscura`.`Categories`";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
		while($row = mysql_fetch_assoc($result)) {
			$solutions[$row['category_id']]=$row['category_name'];
		}
//		mysql_free_result($result);
		return $solutions;
	}
	
	function checkUnique($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `email` = '$user' ";

		$result = mysql_query($query);
		if (mysql_num_rows($result)==0) 
		{
	    $message  =  mysql_error();
	    return true;
		}
	    while ($row = mysql_fetch_assoc($result)) 
		{
		mysql_free_result($result);
	    return false;
		}
	}

	function insertPhoto($description, $user_id, $category_id)
	{
	$idnext=$this->getIdNextPhoto();
	if (strlen($description)>4)
	{
		$query="INSERT INTO `cameraobscura`.`Photos`(`photo_id`, `description`, `user_id`, `category_id`) VALUES ('$idnext','$description', '$user_id', '$category_id')";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}
	}

	function deletePhoto($photo_id, $user_id)
	{
		$query="DELETE FROM `cameraobscura`.`Photos` WHERE `Photos`.`photo_id` = '$photo_id' AND `Photos`.`user_id` = '$user_id'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function getIdNextPhoto()
	{
		$query = "SELECT MAX(photo_id) as max FROM `cameraobscura`.`Photos`";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $id= $row['max'];
		}
		mysql_free_result($result);
		return ++$id;
	}

	function getImages()
	{
		$query = "SELECT * FROM `cameraobscura`.`Photos` order by photo_id DESC";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['photo_id'];
		}
//		mysql_free_result($result);
		return $solutions;
	}
	
	function getUserByPhoto($photo_id)
	{
		$query = "SELECT * FROM `cameraobscura`.`Photos` WHERE `photo_id` = '$photo_id' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $response= $row['user_id'];
		}
		mysql_free_result($result);
		return $response;
	}
}
