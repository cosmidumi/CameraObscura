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
	$src3 = $_POST['src3'];
	$obj = new resize( $src );
	$obj -> saveImage( $src3 , 100 );
	$resizeObj = new resize( $src );
    $resizeObj -> resizeImage( '5','resize' );
    $resizeObj -> saveImage( $src2, 100 );
}
else
if($_POST['type']=="effect")
{
	$resizeObj = new resize( $src );
$resizeObj -> applyEffect( $_POST['effectType'] );
$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
else
if (($_POST['type']=="minbright") or ($_POST['type']=="maxbright")) {
	$resizeObj = new resize ($src);
	$resizeObj -> brightness($_POST['type']);
	$resizeObj -> saveImage ('temp/poza.jpg', 100);
}
else
if (($_POST['type']=="mincontrast") or ($_POST['type']=="maxcontrast")) {
	$resizeObj = new resize ($src);
	$resizeObj -> contrast($_POST['type']);
	$resizeObj -> saveImage ('temp/poza.jpg', 100);
}
else
if($_POST['type']=="rotate")
{	$resizeObj = new resize( $src );
	$resizeObj -> rotateImage($_POST['deg']);
	$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
if($_POST['type']=="censor")
{
	$resizeObj = new resize( $src );
$resizeObj -> censorImage( $_POST['w'], $_POST['h'], $_POST['x'], $_POST['y'], 'censor' );
$resizeObj -> saveImage( 'temp/poza.jpg', 100 );
}
exit;
