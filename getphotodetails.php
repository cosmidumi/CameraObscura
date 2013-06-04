<?php
session_start();
require_once 'classes/Membership.php';
if ($_POST["type"]=="photo")
{
	$membership = new Membership();
	$description = $membership->get_Description($_POST["img"]);
	$lastname = $membership->get_Member_Last_Name($_POST["user"]);
	$firstname = $membership->get_Member_First_Name($_POST["user"]);
	$date = $membership->get_Date($_POST["img"]);
	$frames="";
	if (!$membership->frame_Framed($_POST["img"])) $frames=0;
	else $frames=sizeof($membership->frame_Framed($_POST["img"]));
	$response = json_encode(array('description'=>$description, 'lastname'=>$lastname, 'firstname'=>$firstname,'date'=>$date, 'frames'=>$frames));
	echo $response;
}
?>