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
			<div id="container">
				<div id="header">
				</div>
				<div id="content" style="background:#F5F6F5">
					<?php include 'classes/frames.php' ?>
					<div class="logo" id="errorImg">
					</div>
					<p id="errorText">Oooops! Ne cerem scuze, dar nu puteti accesa aceasta pagina.
						<br/>
						Fie nu aveti drepturi de accesare fie s-a ivit o problema.
					</p>
				</div>	
			</div>
		</div>
		
<?php include 'classes/modals.php' ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
</script><script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script>
	</body>
</html>
<script type="text/javascript">
$("#content").height(500);
$("#content").css('top',-20);
$("#header").height(100);
       contentTop=$("#content").height();
        $("#frame5").css('top',contentTop+"px");
        $("#frame6").css('top',(contentTop+15)+"px");
        $("#frame7").css('top',(contentTop)+"px");
        $("#frame8").css('top',(contentTop+15)+"px");
        $(".frames").show();
        $("#errorText").width($("#content").width()-600);
</script>