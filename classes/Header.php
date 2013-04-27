<?php

$img = imagecreatefromjpeg('logos.jpg'); 
$w = imagesx($img); 
$h = imagesy($img); 

$trans = imagecolortransparent($img); 
//if($trans >= 0) { 

$rgb = imagecolorsforindex($img, $trans); 

$oldimg = $img; 
$img = imagecreatetruecolor($w,$h); 
$color = imagecolorallocate($img,$rgb['red'],$rgb['green'],$rgb['blue']); 
imagefilledrectangle($img,0,0,$w,$h,$color); 
imagecopy($img,$oldimg,0,0,0,0,$w,$h); 
 
 header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
exit();