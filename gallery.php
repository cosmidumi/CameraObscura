<?php include 'classes/login_logout_header.php' ?>
<?php
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
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
                     <h2 style="position:relative; text-align:left; left:40px; font-size:18px; bottom:10px"> <?php if ($_GET['user']!=$_SESSION['user_id']): echo $membership->get_Member_First_Name($_GET["user"]) . " "; echo $membership->get_Member_Last_Name($_GET["user"]); else: echo "My Gallery";endif;?> <img src="images/icons/gallery.png" style="width:40px; height:30px; top:10px; position:relative; border-radius:30px;"> <?php if ($_GET['user']!=$_SESSION['user_id']): echo 'Gallery'; endif;?></h2>
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
var photosGallery=<?php echo $membership->get_Member_Number_Photos($_GET["user"])?>;
var photos=photosGallery;
var galleryID=<?php echo $_GET["user"]?>;
var dif=600;

$(document).ready(function(){
$("#frame5").hide();
$("#frame7").hide();
});



function putImages(){
    if (xmlhttp.readyState==4) 
      {
          if(xmlhttp.responseText){
             var resp = xmlhttp.responseText.replace("\r\n", ""); 
             var files = resp.split(";");
             var source='images/'+galleryID+'/img/';
              var j = 0;
              for(i=0; i<files.length; i++){
                  if((files[i] != "")&&(photosGallery>0)){
                     random=Math.floor(Math.random()*1000);
                     photosGallery--;
                     ($("#gallery")).append ('<div class="header-divs-anim view imgAnch" id='+files[i]+' ><img src="images/'+galleryID+'/thumb/'+files[i]+'.jpg?dummy='+random+'"/>');
                     <?php if ($_GET['user']==$_SESSION['user_id']):?>
                     $("#"+files[i]).append('<div class="mask"  id="imask'+files[i]+'"style="width:201px; height:50px;top:150px;"><a href="Edit.php?img='+files[i]+'"><img src="images/icons/edit.png" title="Editare" style="height:32px; width:32px; position:relative;top:10px;float:right; right:10px;"></a></div>');
                    $("#imask"+files[i]).append('<a href="?user='+<?php echo $_GET['user']?>+'&img='+files[i]+'#viewImage"><img src="images/icons/frame.png" title="Inramare" style="height:32px; width:32px; position:relative;top:10px;float:right; right:30px;"></a>');
                     $("#imask"+files[i]).append('<a href="?del_photo='+files[i]+'"><img src="images/icons/minus_big.png" title="Sterge" style="height:32px; width:32px; position:relative;top:10px;float:right; right:50px;"></a>');
                     <?php
                     else:?>
                      $("#"+files[i]).append('<div class="mask"  id="imask'+files[i]+'"style="width:201px; height:50px;top:150px;"><a href="?user='+<?php echo $_GET['user']?>+'&img='+files[i]+'#viewImage"><img src="images/icons/frame.png" title="Inramare" style="height:32px; width:32px; position:relative;top:10px;float:right; right:10px;"></a></div>');
                    <?php endif; ?>
                     j++;
                  
//<a href="images/'+galleryID+'/img/'+files[i]+'"></a>
                  }
                  $("#"+files[i]).click(function() {
                  currentUser=this.id;
                  dummy=Math.floor(Math.random()*1000);
                  var source="images/"+<?php echo $_GET['user']?>+"/img/"+currentUser+".jpg?dummy="+dummy;
                      $("#modalImage").attr('src',source);
                  windowsHeight=$(window).height();
                  windowWidth=$(window).width();
                  $("#viewImageDiv").width(0.9*windowWidth);
                  $("#viewImageDiv").height(0.9*windowsHeight);
                  $("#viewImageDiv").css("margin","30px");
                  $("#viewImageDiv").css("left","20px");
                  $("#imageWrapper").width(0.66*windowWidth);
                  $("#imageWrapper").height(0.9*windowsHeight);
                  $("#commentWrapper").width(0.235*windowWidth);
                  $("#commentWrapper").height(0.9*windowsHeight);
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
                          

                    },200);
                                    window.location.href = "#viewImage";
                                    });
                                }
          //    alert(photosGallery);
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
        if (n<=photos)
        {

  //  alert(photosGallery);
        var url="getImages.php?user="+galleryID+"&n="+n;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        
        n += 12;
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