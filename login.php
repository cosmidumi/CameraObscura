<?php include 'classes/login_logout_header.php' ?>
<?php 
echo $_SESSION['user_id'];?>
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
					<div id="menu">
						<ul class="menu-cont" id="opt12">
							<a href="/gallery.php?user=<?php echo $_SESSION['user_id'] ?>"><li id="opt1"></li></a>
							<li id="opt2"></li>
						</ul>
						<ul class="menu-cont" id="opt34">
							<li id="opt3"></li>
							<li id="opt4"></li>
						</ul>
					</div>
					<div class="header-divs"></div>
					<?php include 'classes/top-bar-menu.php' ?>
				</div>
				<div id="content">
					<?php include 'classes/frames.php' ?>
				</div>
			</div>
			<div id="footer"></div>
		</div>
		<?php include 'classes/modals.php' ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
</script><script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script><script type="text/javascript" src="js/scripts.js">
</script>
	</body>
</html>