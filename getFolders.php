
<?php
session_start();
require_once 'classes/Membership.php';
		$var= $_GET['user'];
		$membership=new Membership();
		$fils=$membership->get_Folders($var);
	foreach ($fils as $key) {
		$files[]=$key;
		//echo '<script type="text/javascript">alert(' . $key . ');</script>';
	}
	$n = $_GET["n"];
	$response = "";
		for($i = $n; $i<$n+24; $i++){
			$response = $response.$files[$i%count($files)].';';
		}
		echo $response;
	
	
?>