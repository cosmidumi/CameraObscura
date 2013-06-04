<?php include 'classes/login_logout_header.php' ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<title>
			Camera Obscura
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<a href="" class="scrollup">Scroll</a>
			<div id="head"></div>
			<div id="container">
				<div id="header">
					<div id="header-cont">
						<div id="logo"></div>
                        <?php include 'classes/fixedBar-menu.php' ?>
					</div>
					<div id="menu">
						<?php include 'classes/menu-cont.php' ?>
					</div>
					<div class="header-divs"></div>
					<?php include 'classes/top-bar-menu.php' ?>
				</div>
				<div id="content">
					<?php include 'classes/frames.php' ?>
          <div id="gallery"></div>
				</div>
			</div>
			<div id="footer"></div>
		</div>
		
<?php include 'classes/modals.php' ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
</script><script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script><script type="text/javascript" src="js/scripts.js">
</script>
<script type="text/javascript">
$("#gallery").append ('<div class="header-divs-anim view imgAnch" id="t1" style="padding-bottom:30px;"><a href="/tutorial.php?tut=1"><img src="images/1.jpg"/></a></div>');
$("#t1").append('<div style="width:201px;height:50px;top:-340px;position:relative;color:black;font-size:25px">Tutorial Texturi</div>');
$("#gallery").append ('<div class="header-divs-anim view imgAnch" id="t2" style="padding-bottom:30px;"><a href="/tutorial.php?tut=2"><img src="images/5.jpg"/></a></div>');
$("#t2").append('<div style="width:201px;height:50px;top:-200px;position:relative;color:black;font-size:25px">Tutorial Portrete</div>');
$("#gallery").append ('<div class="header-divs-anim view imgAnch" id="t3" style="padding-bottom:30px;"><a href="/tutorial.php?tut=3"><img src="images/peisaje.jpg"/></a></div>');
$("#t3").append('<div style="width:201px;height:50px;top:-400px;position:relative;color:black;font-size:25px">Tutorial Peisaje</div>');
$("#gallery").append ('<div class="header-divs-anim view imgAnch" id="t4" style="padding-bottom:30px;"><a href="/tutorial.php?tut=4"><img src="images/macro.jpg" style="width:300px;height:300px;"/></a></div>');
$("#t4").append('<div style="width:201px;height:50px;top:-200px;position:relative;color:black;font-size:25px">Tutorial Macro</div>');

</script>
	</body>
</html>