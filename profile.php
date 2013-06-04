<?php include 'classes/login_logout_header.php' ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<title>
			<?php echo 'Editare Profil - ' . $membership->get_Member_First_Name($_SESSION["user_id"]); ?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<a href="" class="scrollup">Scroll</a>
			<div id="head"></div>
			<div id="container">
				<div id="header">
					<?php include 'classes/top-bar-menu.php' ?>
				</div>
				<div id="content">
					<?php include 'classes/frames.php' ?>
					<div id="profile">
						<div id="avatar">
						<img id="avatarPic" src="/images/<?php echo $_GET["user"]?>/avatar.jpg?dummy=<?php echo $membership->generateDummy()?>" alt="/images/avatar.jpg/">
						<a id="vezi" href="maingallery.php?user=<?php echo $_GET["user"]?>"> Vezi Galerie</a>
						<?php if ($_GET["user"]==$_SESSION['user_id']): ?><a href="#changeAvatar"><img id="avatarEdit" src="images/icons/edit.png" title="Schimba avatarul"/></a><?php endif;?>
						
						</div>

						<?php if ($_GET["user"]==$_SESSION['user_id']): ?><a href="#editModal"><img class="editProfile" src="images/icons/edit.png" title="Editare Profil"/></a><?php endif;?>
						<ul id="user">
						<li><p>Nume:</p> <p class="plong"><?php echo $membership->get_Member_First_Name($_GET["user"]). " "; echo $membership->get_Member_Last_Name($_GET["user"]);?></p> </li>
						<li><p>Adresa:</p> <p class="plong"><?php echo $membership->get_Member_Address($_GET["user"]);?></p></li>
						<li><p>Descriere:</p> <p class="plong"><?php echo $membership->get_Member_Description($_GET["user"]);?></p></li>
						<li><p>Camera:</p> <p class="plong"><?php echo $membership->get_Camera($_GET["user"])[1];?></p></li>
						<li><p>Obiectiv:</p> <p class="plong"><?php echo $membership->get_Lens($_GET["user"])[1];?></p></li>
						<li><p>Status:</p class="plong"><?php echo $membership->get_Rank($_GET["user"]); ?></li>
						<li><p>Tip:</p class="plong"><?php echo $membership->get_Type($_GET["user"]); ?></li>
						</ul>
						
						
					</div>
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
$("#head").height(40);
$("#header").height(100);
$("#footer").css('top', 158);
var userHeight=$("#user").height()-300;
if (userHeight>0)
//alert($("#content").height()-userHeight);
$("#content").height($("#content").height()+userHeight);
</script>
	</body>
</html>