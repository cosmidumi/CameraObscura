<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Crop
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" type="text/css">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">
        </script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" type="text/javascript">
        </script>
        <script src="/js/jquery.Jcrop.js" type="text/javascript">
        </script>
        <script src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>


    </head>
    <body style="background-image:url('images/texture-edit.png');">
        <div id="wrapper"  >
          
                <div>
                <img id="cropbox">
                    <div class="edit" >
                        <img id="logo-small" style="height:42px; width:100px"/>

                        <input type="hidden" id="x" name="x"> <input type="hidden" id="y" name="y"> <input type="hidden" id="w" name="w"> <input type="hidden" id="h" name="h"> <input type="hidden" id="x2" name="x2"> <input type="hidden" id="y2" name="y2"> <input type="hidden" value="" id="src">
                        

                        <div style="display:inline; position:relative; padding:5px;">
                            <ul class="editUL"style="top:5px; bottom:0px; padding:0; padding-left:3px; position:relative;">
                            <li><a href="/index.php"><img id="home" title="Acasa" src="/images/icons/home.png"  style="width:28px;height:28px"></a></li>
                            <li><img id="save" title="Salveaza Imaginea" src="/images/icons/save.png" style="width:28px;height:28px"></li>
                            <span style="color:grey; top:-3px;position:relative"> | </span>
                        </ul>
                            <ul class="editUL" style="">
                            <li><img id="rotateleft" title="Rotire Stanga" src="/images/icons/rotateleft.png" ></li>
                            <div class="brightness">Rotire</div>
                            <li><img id="rotateright" title="Rotire Dreapta" src="/images/icons/rotateright.png"></li>
                            <input type="text" id="amount" style="color: black; font-weight: bold;position:relative;width:25px;">
                            <li><img id="done" title="Salveaza Rotirea" src="/images/icons/checkmark.png" ></li>
  <span style="color:grey; position:relative">| </span>                        </ul>
                         <ul class="editUL" style="">
                            <li><img id="min" src="/images/icons/minus.png" title="Scade luminozitatea"></li>
                         <div class="brightness">Luminozitate</div>
                         <li><img id="pls" src="/images/icons/plus.png" title="Creste luminozitatea"></li>
                          <span style="color:grey; position:relative"> | </span>
                        </ul>
                         <ul class="editUL" style="">
                            <li><img id="minContrast" src="/images/icons/minus.png" title="Scade luminozitatea"></li>
                         <div class="brightness">Contrast</div>
                         <li><img id="plsContrast" src="/images/icons/plus.png" title="Creste luminozitatea"></li>
                          <span style="color:grey; position:relative"> | </span>
                        </ul>
                         <ul class="editUL" >
                            <li><img id="4" src="/images/icons/photo.png" style="width:15px; height:15px" title="Icoana(25%)"></li>
                            <li><img id="3" src="/images/icons/photo.png" style="width:18px; height:18px" title="Mic(40%)";></li>
                         <div class="brightness">Redimensionare</div>
                            <li><img id="2" src="/images/icons/photo.png" style="width:21px; height:21px" title="Mediu(50%)"></li>
                            <li><img id="1" src="/images/icons/photo.png" style="width:24px; height:24px" title="Mare(75%)"></li>
                          <span style="color:grey;position:relative"> | </span>
                        </ul>
                        <ul class="editUL">
                        
                            <li><img id="submit" src="/images/icons/crop.png" title="Decupeaza din Imagine. Selecteaza o parte din imagine si apoi apasa pe 'Decupeaza'"></li>
                         <div class="brightness">Crop</div>

                    
                          <span style="color:grey;position:relative"> | </span>
                        </ul>
                        <ul class="editUL">
                            <li><img id="censor" src="/images/icons/censor.png" title="Cenzureaza Imaginea. Selecteaza o parte din imagine si apoi apasa pe 'Cenzureaza'"></li>
                    <div class="brightness">Cenzureaza</div>
                          <span style="color:grey;position:relative"> | </span>
                        </ul>
                        <ul class="editUL" id="effectHead">
                             <li><img  src="/images/icons/effect.png" title="Effects"></li>
                             <span id="effectsHidden">
                             <div class="brightness">-</div>
                             <li><img class="apply" id="1e" src="/images/icons/sepia.png" title="Sepia"></li>
                             <li><img class="apply" id="2e" src="/images/icons/negativ.png" title="Negativ"></li>
                             <li><img class="apply" id="3e" src="/images/icons/bnw.png" title="Alb/Negru"></li>
                             <li><img class="apply" id="4e" src="/images/icons/colorize.png" title="Colorize"></li>
                             <li><img class="apply" id="5e" src="/images/icons/edgedetect.png" title="Edge Detect"></li>
                             <li><img class="apply" id="6e" src="/images/icons/meanremoval.png" title="Mean Removal"></li>
                          <span style="color:grey;position:relative"> | </span>
                         </span>
                        </ul>
                        </div>
                        
                    </div>
                    <div id="cropped">
                        <img id="myImg">
                    </div>
                    <script src="/js/edit_ajax.js" type="text/javascript">
</script>       
                    <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script>
</script> 
                </div>
        </div>
    </body>
</html>