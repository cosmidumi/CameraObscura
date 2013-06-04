<?php
session_start();
require_once 'classes/Membership.php';
if ($_POST["type"]=="contest")
{
	$membership = new Membership();
	$response=$membership->get_Latest_Contest();
	echo $response;
}
?>