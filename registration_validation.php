<?php
session_start();
require_once 'classes/Membership.php';
if ($_POST["type"]=="email")
{
	$membership = new Membership();
	$response=$membership->check_Unique($_POST["email"]);
	if ($response) echo '1';
		else echo '0';
}
else
if ($_POST["type"]=="pwd")
{
	if (($_POST["pwd"])==($_POST["cnf"]))
		echo '1';
	else echo '0';
}
?>