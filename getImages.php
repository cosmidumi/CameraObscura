
<?php
session_start();
require_once 'classes/Membership.php';
	if (isset($_GET["user"]))
	{
		$var= $_GET["user"];
		$membership=new Membership();
		$fils=$membership->get_Member_Photos($var);
	}
	else
	{
		$membership=new Membership();
		$fils=$membership->get_Images();
	}
	foreach ($fils as $key) {
		$files[]=$key;
	}
	$n = $_GET["n"];
	$response = "";
		for($i = $n; $i<$n+12; $i++){
			$response = $response.$files[$i%count($files)].';';
		}
		echo $response;
	
	
?>