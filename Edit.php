<?php include 'classes/login_logout_header.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Editare Imagine
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
        <script src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js" type="text/javascript">
</script>
    </head>
    <body style="background-image:url('images/texture-edit.png');">
        <div id="wrapper">
            <div>
                <img id="cropbox">
                <div class="edit">
                    <div id="logo-small"><input type="hidden" id="x" name="x"> <input type="hidden" id="y" name="y"> <input type="hidden" id="w" name="w"> <input type="hidden" id="h" name="h"> <input type="hidden" id="x2" name="x2"> <input type="hidden" id="y2" name="y2"> <input type="hidden" value="" id="src">
                    <div style="display:inline; position:relative; padding:5px;left:100px;">
                        <ul class="editUL" style="top:5px; bottom:0px; padding:0; padding-left:3px; position:relative;">
                            <li style="list-style: none">
                                <span style="color:grey; top:-3px;position:relative">|</span>
                            </li>
                            <li>
                                <a href="/index.php"><img class="rotation" id="home" title="Acasa" src="/images/icons/home.png" style="width:28px;height:28px"></a>
                            </li>
                            <li>
                                <img  class="rotation" id="save" title="Salveaza Imaginea" src="/images/icons/save.png" style="width:28px;height:28px">
                            </li>
                            <li style="list-style: none">
                                <span style="color:grey; top:-3px;position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL" style="">
                            <li>
                                <img id="rotateleft" title="Rotire Stanga" src="/images/icons/rotateleft.png">
                            </li>
                            <li style="list-style: none; display: inline">
                                <div class="brightness">
                                    Rotire
                                </div>
                            </li>
                            <li>
                                <img  class="rotation" id="rotateright" title="Rotire Dreapta" src="/images/icons/rotateright.png">
                            </li>
                            <li style="list-style: none">
                                <input type="text" id="amount" style="color: black; font-weight: bold;position:relative;width:25px;">
                            </li>
                            <li>
                                <img  class="rotation" id="done" title="Salveaza Rotirea" src="/images/icons/checkmark.png">
                            </li>
                            <li style="list-style: none">
                                <span style="color:grey; position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL" style="">
                            <li>
                                <img  class="rotation" id="min" src="/images/icons/minus.png" title="Scade luminozitatea">
                            </li>
                            <li style="list-style: none; display: inline">
                                <div class="brightness">
                                    Luminozitate
                                </div>
                            </li>
                            <li>
                                <img  class="rotation" id="pls" src="/images/icons/plus.png" title="Creste luminozitatea">
                            </li>
                            <li style="list-style: none">
                                <span style="color:grey; position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL" style="">
                            <li>
                                <img  class="rotation" id="minContrast" src="/images/icons/minus.png" title="Scade luminozitatea">
                            </li>
                            <li style="list-style: none; display: inline">
                                <div class="brightness">
                                    Contrast
                                </div>
                            </li>
                            <li>
                                <img  class="rotation" id="plsContrast" src="/images/icons/plus.png" title="Creste luminozitatea">
                            </li>
                            <li style="list-style: none">
                                <span style="color:grey; position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL">
                            <li>
                                <img  class="rotation redim" id="4" src="/images/icons/photo.png" style="width:15px; height:15px" title="Icoana(25%)">
                            </li>
                            <li>
                                <img  class="rotation redim" id="3" src="/images/icons/photo.png" style="width:18px; height:18px" title="Mic(40%)">
                            </li>
                            <li style="list-style: none; display: inline">
                                <div class="brightness">
                                    Redimensionare
                                </div>
                            </li>
                            <li>
                                <img  class="rotation redim" id="2" src="/images/icons/photo.png" style="width:21px; height:21px" title="Mediu(50%)">
                            </li>
                            <li>
                                <img  class="rotation redim" id="1" src="/images/icons/photo.png" style="width:24px; height:24px" title="Mare(75%)">
                            </li>
                            <li style="list-style: none">
                                <span style="color:grey;position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL">
                            <li>
                                <img  class="rotation" id="submit" src="/images/icons/crop.png" title="Decupeaza din Imagine. Selecteaza o parte din imagine si apoi apasa pe 'Decupeaza'">
                            </li>
                            <li style="list-style: none; display: inline">
                                <div class="brightness">
                                    Crop
                                </div><span style="color:grey;position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL">
                            <li>
                                <img  class="rotation" id="censor" src="/images/icons/censor.png" title="Cenzureaza Imaginea. Selecteaza o parte din imagine si apoi apasa pe 'Cenzureaza'">
                            </li>
                            <li style="list-style: none; display: inline">
                                <div class="brightness">
                                    Cenzureaza
                                </div><span style="color:grey;position:relative">|</span>
                            </li>
                        </ul>
                        <ul class="editUL" id="effectHead">
                            <li>
                                <img src="/images/icons/effect.png" title="Effects">
                            </li>
                            <li style="list-style: none">
                                <span id="effectsHidden"></span>
                                <div class="brightness">
                                    <span id="effectsHidden2">-</span>
                                </div>
                            </li>
                            <li>
                                <span id="effectsHidden3"><img class="apply" id="1e" src="/images/icons/sepia.png" title="Sepia"></span>
                            </li>
                            <li>
                                <span id="effectsHidden4"><img class="apply" id="2e" src="/images/icons/negativ.png" title="Negativ"></span>
                            </li>
                            <li>
                                <span id="effectsHidden5"><img class="apply" id="3e" src="/images/icons/bnw.png" title="Alb/Negru"></span>
                            </li>
                            <li>
                                <span id="effectsHidden6"><img class="apply" id="4e" src="/images/icons/colorize.png" title="Colorize"></span>
                            </li>
                            <li>
                                <span id="effectsHidden7"><img class="apply" id="5e" src="/images/icons/edgedetect.png" title="Edge Detect"></span>
                            </li>
                            <li>
                                <span id="effectsHidden8"><img class="apply" id="6e" src="/images/icons/meanremoval.png" title="Mean Removal"></span>
                            </li>
                            <li style="list-style: none">
                                <span id="effectsHidden9"><span style="color:grey;position:relative">|</span></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="cropped">
                    <img id="myImg">
                </div>
                <script type="text/javascript">
        var user=<?php echo $_SESSION['user_id']?>;
        var pic=<?php echo $_GET["img"]?>;
        var url="images/"+user+"/img/"+pic+".jpg";
        var thumb="images/"+user+"/thumb/"+pic+".jpg";
        $("#cropbox").attr('src',url);
        </script><script src="/js/edit_ajax.js" type="text/javascript">
</script> <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript">
</script>

            </div>
        </div>
    </body>
</html>