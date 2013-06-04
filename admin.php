<?php include 'classes/login_logout_header.php' ?>
<?php if ($_POST && !empty($_POST["contest"]))
$membership->insert_Contest($_POST["contest"]);
?>
<?php if ($membership->get_Type($_SESSION['user_id'])=='admin'):?>
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
					<?php include 'classes/admin_panel.php' ?>
				</div>
				<div id="content">
					<?php include 'classes/frames.php' ?>
					<table id="table">
					<tr>
					<th>Email</th>
					<th>Prenume</th>
					<th>Nume</th>
					<th>Tip</th>
					<th>Rang</th>
					<th>ID</th>
					<th></th>
					</tr>
					<?php
					$n=sizeof($membership->get_Users());
					$users=$membership->get_Users();
					for ($i=0;$i<$n;$i++)
					{	echo '<tr class='.$users[$i]['user_id'] .'>';
						echo '<td>'.$users[$i]['email'].'</td>';
						echo '<td>'.$users[$i]['first_name'].'</td>';
						echo '<td>'.$users[$i]['last_name'].'</td>';
						$j=0;
						echo '<td class="'.$users[$i]['type_id'].'" id="'.$i.$j.'"><img class="typeMin" src="images/icons/minus.png"><span class="'.$i.$j.'">'.$users[$i]['type_id'].'</span><img class="typeAdd" src="images/icons/plus.png"></td>';
						$j=1;
						echo '<td class="'.$users[$i]['rank_id'].'" id="'.$i.$j.'"><img class="rankMin" src="images/icons/minus.png"><span class="'.$i.$j.'">'.$users[$i]['rank_id'].'</span><img class="rankAdd" src="images/icons/plus.png"></td>';
						echo '<td>'.$users[$i]['user_id'].'</td>';
						echo '<td><img class="delete" src="images/icons/delete.png"/></td>';
						echo '</tr>';
						echo '<tr class='.$users[$i]['user_id'] .'><td colspan="7">
						<span class="tutSpan"><img title="Tutorial 1" src="images/icons/book.png"> - '.count($membership->get_Work(1,$users[$i]['user_id'])).'</span>
						<span class="tutSpan"><img title="Tutorial 2" src="images/icons/book.png"> - '.count($membership->get_Work(2,$users[$i]['user_id'])).'</span>
						<span class="tutSpan"><img title="Tutorial 3" src="images/icons/book.png"> - '.count($membership->get_Work(3,$users[$i]['user_id'])).'</span>
						<span class="tutSpan"><img title="Tutorial 4" src="images/icons/book.png"> - '.count($membership->get_Work(4,$users[$i]['user_id'])).'</span>
						</td></tr>';
					}
					?>
					</table>
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
$("#content").height($(window).height()-200);
$("#header").height(100);
$(".rankMin").click(function(){
var user = $(this).parent().parent().attr('class');
var rank = $(this).parent().attr('class');
var myId = $(this).parent().attr('id');
$.post('editUsers.php',{
	'type':'rm',
	'user':$(this).parent().parent().attr('class'),
	'rank':$(this).parent().attr('class')
}, function(data)
{
	if (data==1)
	{
	$("."+myId).empty();
	$("."+myId).append((parseInt(rank)-1));
	$("#"+myId).removeClass(rank);
	rank2=parseInt(rank)-1;
	$("#"+myId).addClass(""+rank2+"");
	}
});
});
$(".rankAdd").click(function(){
var user = $(this).parent().parent().attr('class');
var rank = $(this).parent().attr('class');
var myId = $(this).parent().attr('id');
$.post('editUsers.php',{
	'type':'am',
	'user':$(this).parent().parent().attr('class'),
	'rank':$(this).parent().attr('class')
}, function(data)
{
	if (data==1)
	{
	$("."+myId).empty();
	$("."+myId).append((parseInt(rank)+1));
	$("#"+myId).removeClass(rank);
	rank2=parseInt(rank)+1;
	$("#"+myId).addClass(""+rank2+"");
	}
});
});
$(".typeMin").click(function(){
var user = $(this).parent().parent().attr('class');
var tip = $(this).parent().attr('class');
var myId = $(this).parent().attr('id');
$.post('editUsers.php',{
	'type':'tm',
	'user':$(this).parent().parent().attr('class'),
	'tip':$(this).parent().attr('class')
}, function(data)
{
	if (data==1)
	{
	$("."+myId).empty();
	$("."+myId).append((parseInt(tip)-1));
	$("#"+myId).removeClass(tip);
	tip2=parseInt(tip)-1;
	$("#"+myId).addClass(""+tip2+"");
	}
});
});
$(".typeAdd").click(function(){
var user = $(this).parent().parent().attr('class');
var tip = $(this).parent().attr('class');
var myId = $(this).parent().attr('id');
$.post('editUsers.php',{
	'type':'ta',
	'user':$(this).parent().parent().attr('class'),
	'tip':$(this).parent().attr('class')
}, function(data)
{
	if (data==1)
	{
	$("."+myId).empty();
	$("."+myId).append((parseInt(tip)+1));
	$("#"+myId).removeClass(tip);
	tip2=parseInt(tip)+1;
	$("#"+myId).addClass(""+tip2+"");
	}
});
});
$(".delete").click(function(){
var user = $(this).parent().parent().attr('class');
$.post('editUsers.php',{
	'type':'deleteUser',
	'user':$(this).parent().parent().attr('class')
}, function(data)
{
	if (data==1)
	{
	$("."+user).remove();
	}
});
});
</script>
	</body>
</html>
<?php 
else :
header("location: 505.php");
endif;?>