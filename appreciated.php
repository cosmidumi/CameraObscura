<?php include 'classes/login_logout_header.php' ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie Publica - Top 10 Poze</title>
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
                    <h2 style="position:relative; text-align:left; left:40px; font-size:18px; bottom:10px"> Galerie Publica <img src="images/icons/gallery.png" style="width:40px; height:30px; top:10px; position:relative; border-radius:30px;"> Top 10 Poze</h2>
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
var comm=0;
var xmlhttp;
var photosGallery=<?php echo sizeof($membership->get_Top_Images())/2;?>;
//alert(photosGallery);
var photos=photosGallery;
var dif=600;

$(document).ready(function(){
$("#frame5").hide();
$("#frame7").hide();
$("#head").css('width',($("#wrapper").width()-2) +"px");
$("#footer").css('width',($("#wrapper").width()-2) +"px");
//alert(photosGallery);
});

function putImages(){
    if (xmlhttp.readyState==4) 
      {
          if(xmlhttp.responseText){
             var resp = xmlhttp.responseText.replace("\r\n", ""); 
             var files = resp.split(";");
            // var source='images/'+galleryID+'/img/';
              for(i=0; i<files.length; i++){
                  if((files[i] != "")&&(photosGallery>0) && (i%2==0)){
                     dummyImg=Math.floor(Math.random()*1000);
                     photosGallery--;
                     ($("#gallery")).append ('<div class="header-divs-anim view imgAnch"  id="'+files[i]+'" ><img  id="i'+files[i]+'"name="'+files[i+1]+'" src="images/'+ files[i+1] +'/thumb/'+files[i]+'?dummy="'+dummyImg+' />');
                <?php if (isset($_SESSION["user_id"])) :?>
                      $("#"+files[i]).append('<div class="mask"  id="imask'+files[i]+'"style="width:201px; height:50px;top:150px;"><img id="frameit'+files[i]+'"src="images/icons/frame.png" title="Inramare" name="unframed" style="height:32px; width:32px; position:relative;top:10px;float:right; right:10px;"></div>');
                      <?php endif;?>
                  }
                  if (i%2==0)
                  {
                    $("#frameit"+files[i]).bind("load", function()
                    {
                      frameID=this.id.split("frameit").pop();
                      IDs=this.id;
                      $.post('frameit.php',{
                        'type':'load',
                        'img':this.id.split("frameit").pop()
                      }, function(data)
                      {
                       data=JSON.parse(data || "null");
                        //data=JSON.parse(data);
                      if (data!=null)               
                       if (data.imgval==0)
                       {
                        $("#frameit"+data.img).attr('src','images/icons/framed.png');
                        $("#frameit"+data.img).attr('name','framed');
                       }
                      });
                    });
     
                    $("#frameit"+files[i]).click(function(){
                      //window.location.href="?img="+this.id.split("frameit").pop();
                      frameID=this.id.split("frameit").pop();
                      IDs=this.id;
                      $.post('frameit.php',{
                        'type':'insertdelete',
                        'state':$(this).attr('name'),
                        'img':this.id.split("frameit").pop()
                      }, function(data)
                      {
                       data=$.parseJSON(data);
                       if (data.imgval==1)
                       {
                        $("#frameit"+data.img).attr('src','images/icons/framed.png');
                        $("#frameit"+data.img).attr('name','framed');
                       }
                       else if(data.imgval==2)
                       {
                        $("#frameit"+data.img).attr('name','unframed');
                        $("#frameit"+data.img).attr('src','images/icons/frame.png');
                       }
                      });
                    });
                   
         $("#i"+files[i]).click(function() {
                  currentUser=this.id.split("i").pop();
                  dummy=Math.floor(Math.random()*1000);
                  user=(this).attributes["name"].value;
                  var source="images/"+user+"/img/"+currentUser+".jpg?dummy="+dummy;
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
                <?php if (isset($_SESSION["user_id"])) :?>
                $.post('addComment.php',{
                  'type':'add',
                  'image':currentUser,
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
                   <?php else :?>
                    window.location="?response=Trebuie+sa+te+loghezi#loginModal";
                    <?php endif;?>
                });
          
                  getComments(currentUser);

                   $.post('getphotodetails.php',{
                        'type':'photo',
                        'user':(this).attributes["name"].value,
                        'img':this.id.split("i").pop()
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
                                }
                              }

          }
    }
}   

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
                ($("#commentContent")).append ('<div class="comment" style="width:auto; margin:0; margin-bottom:2px;left:-1px;background:-webkit-gradient(linear, left top, left 80, from(black), color-stop(0%, #3c3c3c), to(#292929));padding-bottom:25px;"><a class="userprofile" href="profile.php?user='+files[i+1]+'"><span style="position:relative; width:40px;height:40px; display:inline-block;background-image:url(\'/images/'+files[i+1]+'/avatarcom.jpg\');float:left;"></span></a><span style="position:relative;left:10px">'+files[i]+'<br/><span style="font-size:13px"> '+files[i+2]+'</span> '+'</span></div>');
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
                alert ("Browserul nu suporta!");         
        if (n/2<photos)
        {
        var url="getImages.php?top=1&n="+n;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        
        n += 20;
        //while (n/2>photos) n--;
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

