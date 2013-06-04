
<?php
session_start();
require_once 'classes/Membership.php';
	if (isset($_GET["contest"]))
	{
		$membership=new Membership();
		$nr=sizeof($membership->get_Contest_Images($_GET["contest"]));
		$fils=$membership->get_Contest_Images($_GET["contest"]);
		if ($_GET["n"]==0)
			$x=$nr;
		 else
			if ($_GET["n"]%20==0)
			$x=20;	
	}
	else if (isset($_GET["top"]))
	{
		$membership=new Membership();
		$nr=sizeof($membership->get_Top_Images());
		$fils=$membership->get_Top_Images();
		if ($_GET["n"]==0)
			$x=$nr;
		 else if ($_GET["n"]%20==0)
		$x=20;	
	}
	else if (isset($_GET["work"]))
	{
		$membership=new Membership();
		$nr=sizeof($membership->get_Work_Images());
		$fils=$membership->get_Work_Images();
		if ($_GET["n"]==0)
			$x=$nr;
		 else if ($_GET["n"]%20==0)
		$x=20;	
	}
	else if ((isset($_GET["user"])&&(!isset($_GET["album"]))))
	{
		$var= $_GET["user"];
		$membership=new Membership();
		$nr=$membership->get_Member_Number_Photos($_GET["user"], 0);
		$fils=$membership->get_Member_Photos($var, 0);
		if ($_GET["n"]==0)
		if ($nr<12) $x=$nr;else;
		else if ($_GET["n"]%12==0) $x=12;
		else $x=$_GET["n"]%12;
	}
	else if ((isset($_GET["user"])&&(isset($_GET["album"]))))
	{
		$var= $_GET["user"];
		$album= $_GET["album"];
		$membership=new Membership();
		$fils=$membership->get_Member_Photos($var,$album);
		$nr= $membership->get_Member_Number_Photos($_GET["user"], $_GET["album"]);
		if ($_GET["n"]==0)
		if ($nr<12) $x=$nr;else;
		else if ($_GET["n"]%12==0) $x=12;
		else $x=$_GET["n"]%12;
	}
	else if (!(isset($_GET['s'])))
	{
		$membership=new Membership();
		if (isset($_SESSION['user_id']))
			$usr=$_SESSION['user_id'];
		else $usr=0;
		$fils=$membership->get_Images($usr);
		if ($_GET["n"]==0)
		if ($membership->get_Member_Number_All_Photos($_SESSION['user_id'])<20)
			$x=3*$membership->get_Member_Number_All_Photos($_SESSION['user_id']);
		else;
		else if ($_GET["n"]%20==0) $x=20;
		else $x=$_GET["n"]%20;
	}
	else
	{
		$membership=new Membership();
		if (isset($_SESSION['user_id']))
			$usr=$_SESSION['user_id'];
		else $usr=0;
		$search=$_GET['s'];
		$fils=$membership->get_Images_Search($usr,$search);
		if ($_GET["n"]==0)
		$x=sizeof($fils);
		else if ($_GET["n"]%20==0) $x=20;
		else $x=$_GET["n"]%20;
	}
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