<?php


require_once "classes/resize-class.php";
$src = $_POST['src'];
if ($_POST['type']=="crop")
{
$resizeObj = new resize( $src );
$resizeObj -> cropImage( $_POST['w'], $_POST['h'], $_POST['x'], $_POST['y'], 'crop' );
$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
else
if($_POST['type']=="resize")
{
	$resizeObj = new resize( $src );
$resizeObj -> resizeImage( $_POST['size'],'resize' );
$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
else
if($_POST['type']=="save")
{
	$src2 = $_POST['src2'];
	$obj = new resize( $src2 );
	$obj -> saveImage( $src , 100 );
}
else
if($_POST['type']=="effect")
{
	$resizeObj = new resize( $src );
$resizeObj -> applyEffect( $_POST['effectType'] );
$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
else
if($_POST['type']=="rotate")
{	$resizeObj = new resize( $src );
	$resizeObj -> rotateImage($_POST['deg']);
	$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
exit;
