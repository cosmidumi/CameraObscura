<?php

require 'Mysql.php';

class Membership {
	
	function validate_user($un, $pwd) {
		$mysql = New Mysql();
		$check = $mysql->verifyUsernameAndPassword($un, md5($pwd));
		$id = $mysql->getUserId($un);
		if($check) {
			$_SESSION['status'] = 'authorized';
			$_SESSION['username']=$un;
			$_SESSION['user_id']=$id;
		
			//header("location: index.php");
			if (($_SERVER["REQUEST_URI"] == '/gallery.php') || ($_SERVER["REQUEST_URI"] == '/gallery.php?user='))
			{
			header("location: /gallery.php?user=" . $_SESSION['user_id'] );
			}
		} else return "Parola/Email incorect";
		
	} 
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
		$loc = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
		header("location: " . $loc);
	}
	
	function confirm_Member() {
		session_start();
		return true;
	//	if($_SESSION['status'] !='authorized') header("location: login.php");
	}

	function insert_Member($user, $password, $passwordcnf, $nume, $prenume, $adresa, $descriere, $camera, $obiectiv) {
		$mysql = new Mysql();
		$check = $mysql->checkUnique($user);
		if (($check))
			if ($password==$passwordcnf) {}
			else return "Verifica confirmarea parolei.";
		else return "Alege alt e-mail.";
		if ($check)
		$response=$mysql->insertIntoDatabase($user, $password, $nume, $prenume, $adresa, $descriere, $camera, $obiectiv);
		return $response;
	}
	function get_Member_Photos($user_id)
	{
		$mysql=new Mysql();
		$photos=$mysql->getPhotos($user_id);
		return $photos;
	}
	function get_Member_Number_Photos($user_id)
	{
		$mysql=new Mysql();
		$nr=$mysql->getNumberOfPhotos($user_id);
		return $nr;
	}
	function get_Member_First_Name($user_id)
	{
		$mysql=new Mysql();
		$firstname=$mysql->getFirstName($user_id);
		return $firstname;
	}
	function get_Member_Last_Name($user_id)
	{
		$mysql=new Mysql();
		$lastname=$mysql->getLastName($user_id);
		return $lastname;
	}
	function insert_Photo($description, $user_id, $category_id) {
		$mysql = new Mysql();
		$response=$mysql->insertPhoto($description, $user_id, $category_id);
		if (!$response)  $response="Adauga o descriere pozei.";
		return $response;
	}
	function get_Id_Insert_Photo()
	{
		$mysql = new Mysql();
		$response=$mysql->getIdNextPhoto();
		return $response;
	}

	function delete_Photo($photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response=$mysql->deletePhoto($photo_id, $user_id);
		header("location: gallery.php?user=" . $_SESSION['user_id'] );
	}

	function get_Categories()
	{
		$mysql = new Mysql();
		$response=$mysql->getCategories();
		return $response;
	}
	function get_Images()
	{
		$mysql = new Mysql();
		$response=$mysql->getImages();
		return $response;
	}
	function get_User_By_Photo($photo_id)
	{
		$mysql = new Mysql();
		$response=$mysql->getUserByPhoto($photo_id);
		return $response;
	}
}