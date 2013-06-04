<?php
session_start();
require_once 'classes/Membership.php';
if ($_POST["type"]=="add")
	{	
	$membership = new Membership();
	$membership->insert_Comment($_POST["text"], $_POST["image"], $_SESSION["user_id"] );
	echo '1';
	}
?>