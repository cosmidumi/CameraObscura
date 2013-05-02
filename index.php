<?php
require_once 'classes/Membership.php';
$membership = new Membership();

$membership->confirm_Member();
echo $_SESSION['user_id'];
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
					<div class="header-divs">
						</div>
					<?php include 'classes/top-bar-menu.php' ?>
				</div>
				<div id="content">
					<?php include 'classes/frames.php' ?>
					<?php include 'classes/loremipsum.php' ?>
				</div>
			</div>
			<div id="footer"></div>
		</div><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
</script><script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script><script type="text/javascript" src="js/scripts.js">
</script>
	</body>
</html>