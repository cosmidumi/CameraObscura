<?php include 'classes/login_logout_header.php' ?>
<?php
if ($_SESSION["user_id"] != $_GET["user"])
header("location: gallery.php?user=" . $_GET["user"]);
if(isset($_GET['del_album']))
{
   $membership->delete_Album($_GET['del_album'],$_SESSION['user_id']);
    header("location: maingallery.php?user=" . $_SESSION['user_id'] );
}
if(isset($_GET['ren_album'])&& !empty($_POST["renameAlb"]))
{
   $membership->rename_Album($_GET['ren_album'], $_POST['renameAlb'], $_SESSION['user_id']);
    header("location: maingallery.php?user=" . $_SESSION['user_id'] . "#" );
}?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galeria mea</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="setInterval('scroll();', 250);">
<div id="wrapper">
<a href="#" class="scrollup">Scroll</a>
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
                    <div class="header-divs">
                        </div>
                    <?php include 'classes/top-bar-menu.php' ?>
                </div>
                <div id="content">

                    <?php include 'classes/frames.php' ?>
                    <br/>
                     <h2 style="position:relative; text-align:left; left:40px; font-size:18px; bottom:10px">  <?php echo ' Galeria mea  '; ?><img id="options" src="images/icons/gallery.png" title="Optiuni" style="width:30px; height:30px; top:10px; position:relative; border-radius:30px;"><div id="delbtn" style="display:inline;left:-10px;opacity:0.3;position:relative;font-size:14px;">Stergere<img src="images/icons/minusbig.png" style="width:20px; height:20px; top:5px; position:relative; border-radius:30px;left:5px"></div><div id="renamebtn" style="display:inline;position:relative;left:-10px;opacity:0.3;font-size:14px;">Redenumire<img src="images/icons/rename.png" style="width:20px; height:20px; top:5px; position:relative; border-radius:30px;left:5px"></div></h2>
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
</body>
</html>
<script>
var contentHeight = 800;
var pageHeight = document.documentElement.clientHeight;
var scrollPosition;
var n = 0;
var xmlhttp;
var photosGallery=<?php echo $membership->get_Member_Number_Folders($_SESSION['user_id'])?>;
var photos=photosGallery;
var galleryID=<?php echo $_SESSION["user_id"]?>;
var dif=600;
var ok=true;

$(document).ready(function(){
$("#renamebtn").hide();
$("#delbtn").hide();
});

function putImages(){
    if (xmlhttp.readyState==4) 
      {
          if(xmlhttp.responseText){
             var resp = xmlhttp.responseText.replace("\r\n", ""); 
             var files = resp.split(";");
             var source='images/'+galleryID+'/img/';
              for(i=0; i<files.length; i++){
                  var resp = xmlhttp.responseText.replace("\r\n", ""); 
             var files = resp.split(";");
            // var source='images/'+galleryID+'/img/';
              for(i=0; i<files.length; i++){
              //   alert(files[i]);
                  if((files[i] != "")&&(photosGallery>0) && (i%2==0)){
                     dummyImg=Math.floor(Math.random()*1000);
                     files[i]=files[i].replace(/(\r\n|\n|\r)/gm,'');
                     photosGallery--;
                     ($("#gallery")).append ('<div class=" view imgAnch"  id="'+files[i]+'" style="border:none; box-shadow:0px 0px 0px;"><img id="i'+files[i]+'"name="'+files[i+1]+'" style="width:200px; height:200px" src="images/icons/folder.png"/>');
                     $("#"+files[i]).append('<div class=""  id="imask'+files[i]+'"style="width:201px; height:50px;top:100px;position:absolute"><span style="color:white; text-align:center; vertical-align:middle; line-height:50px">'+files[i+1]+'</span></div><a href="?user=<?php echo $_SESSION["user_id"];?>&del_album='+files[i]+'"><img class="delete" id="frameit'+files[i]+'"src="images/icons/minus.png" title="Stergere (dupa golire)" style="height:32px; width:32px; position:relative;display:inline;padding-right:20px;float:right;top:-153px;; "></a><a href="?user=<?php echo $_SESSION["user_id"]?>&ren_album='+files[i]+'#renameFolder"><img class="rename" id="rename'+files[i]+'"src="images/icons/rename.png" title="Redenumire Album" style="height:32px; width:32px; position:relative;top:-153px;; float:right; padding-right:20px; display:inline; "></a>');
                  }
                  else
                    if ((photosGallery==0) && (files[i] ==""))
                    {
                            if (ok) {
                                ($("#gallery")).append ('<a href="#addFolder"><div class="header-divs-anim view imgAnch"  id="null" style="border:none; box-shadow:0px 0px 0px; opacity:0.4;"><img  id="null" name="null" style="width:200px; height:200px" src="images/icons/newfolder.png"/>');
                                ok=false;
                            }
                    }

                  $("#i"+files[i]).click(function() {
                  album=this.id.split("i").pop();
                  user=<?php echo $_SESSION['user_id'];?>;
                  if (album=='0')
                  window.location.href = "gallery.php?user="+user;
                  else
                  window.location.href = "privategallery.php?user="+user+"&album="+album;
                                    });

                  }
                  $(".delete").hide(); 
                  $(".rename").hide();
                                }
          }
      }
}



        
function scroll(){
    if(navigator.appName == "Microsoft Internet Explorer")
        scrollPosition = document.documentElement.scrollTop;
    else
        scrollPosition = window.pageYOffset;        
    if((contentHeight - pageHeight - scrollPosition) < dif){
        if(window.XMLHttpRequest)
            xmlhttp = new XMLHttpRequest();
        else
            if(window.ActiveXObject)
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            else
                alert ("Bummer! Your browser does not support XMLHTTP!");         
        if (n/2<=photos)
        {
        var url="getFolders.php?user="+galleryID+"&n="+n;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        
        n += 24;
        xmlhttp.onreadystatechange=putImages;       
        contentHeight += 800;  
        }     
    }
    else
    if($(window).scrollTop() + $(window).height() == $(document).height())
    {
      dif=dif+100;scroll();
      $("#frame5").show();
      $("#frame7").show();
    }
}


</script>
