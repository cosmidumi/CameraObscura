<?php
session_start();
require_once 'classes/Membership.php';
$membership = new Membership();

// If the user clicks the "Log Out" link on the index page.
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

// Did the user enter a password/username and click submit?
if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
	$response = $membership->validate_User($_POST['username'], $_POST['pwd']);
}
														

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<title>
			PhotoShoot
		</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="container">
				<div id="header">
					<div id="header-cont">
						<div id="logo"></div><!--==<div id="canvas">
							<canvas id="myCanvas" width="200" height="100">Your browser does not support the HTML5 canvas tag.</canvas> <canvas id="myCanvas2" width="200" height="100">Your browser does not support the HTML5 canvas tag.</canvas> <canvas id="myCanvas3" width="500" height="128">Your browser does not support the HTML5 canvas tag.</canvas> <canvas id="myCanvas4" width="500" height="128">Your browser does not support the HTML5 canvas tag.</canvas>
						</div>
						<div id="lens-img"></div>cacat fraged
					</div>==-->
					</div>
					<ul class="top-bar-menu">
						<li>
							<a href="#">ceva</a>
						</li>
						<li>
							<a href="#">ceva</a>
						</li>
						<li>
							<a href="#">ceva</a>
						</li>
					</ul>
				</div>
				<div id="content">
					<div class="frames">
						<div class="frames" id="frame1"></div>
						<div class="frames" id="frame2"></div>
						<div class="frames" id="frame3"></div>
						<div class="frames" id="frame4"></div>
					</div>
					<p>
						a
					</p>
					<form method="post" action="">
						<h2>
							Login<small>enter your name</small>
						</h2>
						<p>
							<label for="username">Username:</label> <input type="text" name="username">
						</p>
						<p>
							<label for="pwd">Parola:</label> <input type="password" name="pwd">
						</p>
						<p>
							<input type="submit" value="Login" name="submit">
						</p>
					</form><?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>
					<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>	<p>
						Cacat
					</p>
				</div>
				<div id="footer"></div>
			</div>
		</div><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
</script><script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script><script type="text/javascript" src="js/scripts.js">
</script>
	</body>
</html>