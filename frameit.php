<?php
session_start();
require_once 'classes/Membership.php';
if (isset($_POST["img"]))
{
	$membership=new Membership();
	if (($_POST["type"]=='insertdelete') && ($_POST["state"]=='unframed'))
	{
		$check=$membership->check_Frame($_POST["img"],$_SESSION['user_id']);
		if (!$check)
		{
		 	$ok=$membership->frame_It($_POST["img"],$_SESSION['user_id']);
		 	if($ok)
		 	{
			 	$response=json_encode(array('img'=>$_POST["img"], 'imgval'=>'1'));
			 	echo $response;
		 	}
	 	}
 	}
 	else if (($_POST["type"]=='insertdelete') && ($_POST["state"]=='framed'))
 	{
	 	$ok=$membership->delete_Frame($_POST["img"],$_SESSION['user_id']);
	 	if($ok)
	 	{
		 	$response=json_encode(array('img'=>$_POST["img"], 'imgval'=>'2'));
		 	echo $response;
		}
	}
	else if ($_POST["type"]=='load')
	{
	$check=$membership->check_Frame($_POST["img"],$_SESSION['user_id']);
	if ($check)
		$response=json_encode(array('img'=>$_POST["img"], 'imgval'=>'0'));
	echo $response;
	}
}
?>