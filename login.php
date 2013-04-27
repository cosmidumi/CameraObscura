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
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<a href="#" class="scrollup">Scroll</a>
			<div id="head"></div>
			<div id="container">
				<div id="header">
					<div id="header-cont">
						<div id="logo"></div>
					</div>
					<div class="header-divs"></div>
					<?php include 'classes/top-bar-menu.php' ?>
				</div>
				<div id="content">
					<?php include 'classes/frames.php' ?>
					<form id="login" method="post" action="">
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
				</div>
			</div>
			<div id="footer"></div>
		</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
</script><script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script><script type="text/javascript" src="js/scripts.js">
</script>
	</body>
</html>