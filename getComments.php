
<?php
session_start();
require_once 'classes/Membership.php';
if ($_POST["type"]=="number")
{
	$membership = new Membership();
	$comments = $membership->get_Number_Comments($_POST["photo"]);
	$response = json_encode(array('comments'=>$comments));
	echo $response;
}

	$photo=$_GET["ph"];	
	$membership=new Membership();
	$fils=$membership->get_Comments($photo);
	$comments=$membership->get_Number_Comments($photo);
	$n = $_GET["n"];

	foreach ($fils as $key) {
		$files[]=$key;
	}
	$response = "";
		for($i = 0; $i<3*$n; $i++){
			$response = $response.$files[$i%count($files)].';';
		}
		echo $response;
	
	
?>