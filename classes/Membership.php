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
			header("location: index.php");
			

		} else return "Please enter a correct username and password";
		
	} 
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
	}
	
	function confirm_Member() {
		session_start();
	//	if($_SESSION['status'] !='authorized') header("location: login.php");
	}
	
}