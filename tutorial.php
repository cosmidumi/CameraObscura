<?php include 'classes/login_logout_header.php' ?>
<?php if (!isset($_SESSION['user_id']))
header("location: tutorials.php?response=Trebuie+sa+te+loghezi#loginModal");
?>
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
					<?php include 'classes/tutoriale.php' ?>
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
$('.tutsWork').click(function(){
var img=<?php echo $membership->get_Work($_GET['tut'],$_SESSION['user_id'])?>;
var user=<?php echo $_SESSION['user_id'];?>;
var source="images/"+user+"/img/"+img+".jpg";
                  $('body').append('<div id="viewImage" class="modalDialog" ><div id="viewImageDiv"><a title="Close" class="close">X</a><div id="imageWrapper" ><img id="modalImage"/></div><div id="commentWrapper" ><span id="smallAvatarWrapper" ><img id="smallav"/></span><span id="descriptionWrapper"></span><span id="frameSpan"><img id="frameWrap"src="/images/icons/framed.png" /><span id="frameNo"></span></span><div id="commentContent"></div></div></div></div>');
                  $(".close").click(function(){
                        mySite.closePressed();
                  });
                 
                  $("#modalImage").attr('src',source);
                  windowsHeight=$(window).height();
                  windowWidth=$(window).width();
                  $("#viewImageDiv").width(0.9*windowWidth);
                  $("#viewImageDiv").height(0.9*windowsHeight);
                  $("#viewImageDiv").css("margin","30px");
                  $("#viewImageDiv").css("left","20px");
                  $("#imageWrapper").width(0.66*windowWidth);
                  $("#imageWrapper").height(0.9*windowsHeight);
                  $("#commentWrapper").width(0.23*windowWidth);
                  $("#commentWrapper").height(0.9*windowsHeight);
                  $("#descriptionWrapper").height(62);
                  $("#descriptionWrapper").width(0.21*windowWidth-75);
                  $("#smallAvatarWrapper").height(75);
                  $("#smallAvatarWrapper").width(75);
                  $("#smallav").attr("src","images/"+user+"/avatarsmall.jpg");
                  $("#commentContent").width(0.23*windowWidth);
                  $("#commentContent").height(0.76*windowsHeight-70);
                  $("<span id='textareaform' style='float:left;'><form><textarea rows='4' cols='27' id='comentariu' name='comentariu' style='float:left;position: relative;top: 30px;left: 10px; font-size:11px'>Adauga Comentariu</textarea><input style='float: left;width: 70px;padding: 8px 10px 8px 10px;position: relative;top: 40px;font-size:13px;left: 20px;' class='btn' id='comment' type='button' value='Adauga' name='submit' /></form></span>").insertBefore("#commentContent");
              $("#comment").click(function(){
                $.post('addComment.php',{
                  'type':'add',
                  'image':img,
                  'text':$("#comentariu").val()
                }, function(data)
                {
                  if (data=='1')
                  {
                    var currentdate = new Date();
                    var datetime = currentdate.getFullYear()+"-0"+(currentdate.getMonth()+1)  + "-" + currentdate.getDate() + " "+ currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
                    ($("#commentContent")).append ('<div class="comment" style="width:auto; margin:0; margin-bottom:2px;left:-1px;background:-webkit-gradient(linear, left top, left 80, from(black), color-stop(0%, #3c3c3c), to(#292929));padding-bottom:25px;"><a class="userprofile" href="profile.php?user='+user+'"><span style="position:relative; width:40px;height:40px; display:inline-block;background-image:url(\'/images/'+<?php echo $_SESSION['user_id']?>+'/avatarcom.jpg\');float:left;"></span></a><span style="position:relative;left:10px">'+$('#comentariu').val()+'<br/><span style="font-size:13px">'+datetime+'</span> '+'</span></div>');
                  }
                });
                });
getComments(img);

                   $.post('getphotodetails.php',{
                        'type':'photo',
                        'user':user,
                        'img':img
                      }, function(data)
                      {
                       data=JSON.parse(data);
                       $("#descriptionWrapper").empty();
                       $("#descriptionWrapper").append(data.description);
                       $("#descriptionWrapper").append("<br/> <a class='userprofile' href='profile.php?user="+user + "'>"+ data.firstname + " " + data.lastname + "</a>");
                       $("#descriptionWrapper").append("<br/> "+data.date);
                       $("#frameNo").append(data.frames);
                      });

                  $("#imageWrapper").css("line-height",0.9*windowsHeight+"px");
                  setTimeout(function() {
                  imgHeight=$("#modalImage").height();
                  imgWidth=$("#modalImage").width();
                  wrapHeight=$("#imageWrapper").height();
                  wrapWidth=$("#imageWrapper").width();
                  imgH=imgHeight;
                  imgW=imgWidth;
                  percent=1;
                  while ((imgW>wrapWidth) || (imgH>wrapHeight))
                    {
                      percent=percent-0.001;
                      imgH=imgHeight*percent;
                      imgW=imgWidth*percent;
                    }
                  imgHeight=imgHeight*percent;
                  imgWidth=imgWidth*percent;
                  $("#modalImage").height(imgHeight);
                  $("#modalImage").width(imgWidth);
                          

                    },300);
                  window.location.href = "#viewImage";
                                    });

function getComments(photo_id)
{

        $.post('getComments.php',{
                        'type':'number',
                        'photo':photo_id
                      }, function(data)
                      {
                       data=JSON.parse(data);
                       comments=data.comments;
                      var url="getComments.php?ph="+photo_id+"&n="+comments;
                      xmlhttp.open("GET",url,true);
                      xmlhttp.send();
                      xmlhttp.onreadystatechange=putComments;       
            
                      });


}
function putComments()
{
    if (xmlhttp.readyState==4) 
      {
          if(xmlhttp.responseText){
             var resp = xmlhttp.responseText.replace(/(\r\n|\n|\r)/gm, ""); 

             var files = resp.split(";");
              for(i=0; i<files.length-1; i++){
                if (i%3==0)
                ($("#commentContent")).append ('<div class="comment"><a class="userprofile" href="profile.php?user='+files[i+1]+'"><span class="commentSpan" style="background-image:url(\'/images/'+files[i+1]+'/avatarcom.jpg\');"></span></a><span style="position:relative;left:10px">'+files[i]+'<br/><span style="font-size:13px"> '+files[i+2]+'</span> '+'</span></div>');
              }
            }
      }
}
</script>
	</body>
</html>