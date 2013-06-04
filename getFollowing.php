<?php
session_start();
require_once 'classes/Membership.php';
$user= $_SESSION["user_id"];
$membership=new Membership();
$fils=$membership->get_Following($user);
$x=36;
foreach ($fils as $key) {
$files[]=$key;
}
$n = $_GET["n"];
$response = "";
for($i = $n; $i<$n+$x; $i++){
	$response = $response.$files[$i%count($files)].';';
}
echo $response;


?>
	