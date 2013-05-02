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
                        
                    </div>
                    <div class="header-divs">
                        </div>
                    <?php include 'classes/top-bar-menu.php' ?>
                </div>
                <div id="content">
                    <?php include 'classes/frames.php' ?>
	 <a href="images/cosmidumi/img/Achievements.jpg"><img src="/images/cosmidumi/thumb/Achievements.jpg" /></a>
    <a href="images/cosmidumi/img/Bw.jpg"><img src="/images/cosmidumi/thumb/Bw.jpg" /></a>
    <a href="images/cosmidumi/img/Camera.jpg"><img src="/images/cosmidumi/thumb/Camera.jpg" /></a><br />
    <a href="images/cosmidumi/img/Cat-Dog.jpg"><img src="/images/cosmidumi/thumb/Cat-Dog.jpg" /></a>
    <a href="images/cosmidumi/img/CREATIV.jpg"><img src="/images/cosmidumi/thumb/CREATIV.jpg" /></a>
    <a href="images/cosmidumi/img/creativ2.jpg"><img src="/images/cosmidumi/thumb/creativ2.jpg" /></a><br />
    <a href="images/cosmidumi/img/Earth.jpg"><img src="/images/cosmidumi/thumb/Earth.jpg" /></a>
    <a href="images/cosmidumi/img/Endless.jpg"><img src="/images/cosmidumi/thumb/Endless.jpg" /></a>
    <a href="images/cosmidumi/img/EndlesSlights.jpg"><img src="/images/cosmidumi/thumb/EndlesSlights.jpg" /></a>
    <br/><br/>
    <p><strong>-1-</strong></p>
    <hr />
    </div>
    
</div>
<div id="footer"></div>
</div>
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
var n = 10;
var xmlhttp;

function putImages(){
    
    if (xmlhttp.readyState==4) 
      {
          if(xmlhttp.responseText){
             var resp = xmlhttp.responseText.replace("\r\n", ""); 
             var files = resp.split(";");
              var j = 0;
              for(i=0; i<files.length; i++){
                  if(files[i] != ""){
                     ($("#content")).append ('<a href="images/cosmidumi/img/'+files[i]+'"><img src="images/cosmidumi/thumb/'+files[i]+'" /></a>');
                     j++;
                  
                     if(j == 3 || j == 6)
                          ($("#content")).append('<br />');
                      else if(j == 9){                   
                          
                          ($("#content")).append('<br />');
                          ($("#content")).append('<br />');     
                          ($("#content")).append('<p> Imaginile '+(n-10)+'-'+(n-1)+' </p><hr /><br/><br/>');
                          j = 0;
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
    
    if((contentHeight - pageHeight - scrollPosition) < 500){
                
        if(window.XMLHttpRequest)
            xmlhttp = new XMLHttpRequest();
        else
            if(window.ActiveXObject)
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            else
                alert ("Bummer! Your browser does not support XMLHTTP!");         
          
        var url="getImages.php?n="+n;
        alert(n);
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        
        n += 9;
        xmlhttp.onreadystatechange=putImages;       
        contentHeight += 800;       
    }
}

</script>

