<?php include 'classes/login_logout_header.php' ?>
<?php
if (!isset($_SESSION['user_id']))
header("location: /index.php?response=Trebuie+sa+te+loghezi#loginModal");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prieteni</title>
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
                     <h2 style="position:relative; text-align:left; left:40px; font-size:18px; bottom:10px"> Prieteni <img src="images/icons/gallery.png" style="width:40px; height:30px; top:10px; position:relative; border-radius:30px;"></h2>
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
var friends=<?php echo sizeof($membership->get_Following($_SESSION['user_id']))?>/3;
var friendsno=friends;
var dif=600;


function putImages(){
    if (xmlhttp.readyState==4) 
      {
          if(xmlhttp.responseText){
             var resp = xmlhttp.responseText.replace("\r\n", ""); 
             var files = resp.split(";");
              for(i=0; i<files.length; i++){
                  if((files[i] != "")&&(friends>0)){
                    if (i%3==0)
                    {
                     random=Math.floor(Math.random()*1000);
                     friends--;
                     ($("#gallery")).append ('<div class="header-divs-anim view imgAnch" id='+files[i]+' style="padding-bottom:25px;"><a href="/profile.php?user='+files[i]+'"><img id="i'+files[i]+'" src="images/'+files[i]+'/avatar.jpg?dummy='+random+'"/></a></div>');
                     $("#"+files[i]).append('<div "style="width:201px; background-color:height:50px;top:150px;">'+ files[i+1] +' '+ files[i+2]+'</div>');
                   }
                  }
                 
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
        if (n<=friendsno)
        {

  //  alert(photosGallery);
        var url="getFollowing.php?&n="+n;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        
        n += 36;
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
