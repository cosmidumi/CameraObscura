<?php
session_start();
require_once 'classes/Membership.php';
require_once "classes/resize-class.php";
require_once 'classes/configUpload.php';
require_once 'classes/Mysql.php';
$membership = new Membership();
if (isset($_GET["response"]))
{
  echo '<script type="text/javascript">setTimeout( function() {$("body").addClass("stop-scrolling")},200);</script>';
}
if ($_POST && !empty($_POST["comentariu"]))
{
    $membership->insert_Comment($_POST["comentariu"],$_POST["photo"], $_SESSION["user_id"]);
    header("location: #");
}

if (!empty($_GET["search"]))
{
    header("location: search.php?s=" . $_GET["search"]);
}

if($_POST && !empty($_POST["album"]))
{
 $membership->insert_Album($_POST["album"],$_SESSION["user_id"]);
 header("location: #");     
}
if ((($_SERVER["REQUEST_URI"] == '/maingallery.php') || ($_SERVER["REQUEST_URI"] == '/maingallery.php?user=') || ($_SERVER["REQUEST_URI"] == '/gallery.php') || ($_SERVER["REQUEST_URI"] == '/gallery.php?user=')) && !isset($_SESSION['user_id']))
{
    header("location: index.php?response=Trebuie+sa+te+loghezi#loginModal");
}

if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}


if(isset($_GET['del_photo']))
{
   $membership->delete_Photo($_GET['del_photo'],$_SESSION['user_id']);
   $path='images/' . $_SESSION['user_id'].'/img/'.$_GET['del_photo'].'.jpg';
   $path2='images/'.$_SESSION['user_id'].'/thumb/'.$_GET['del_photo'].'.jpg';
   unlink($path);
    unlink($path2);
    header("");
}
if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
	$response = $membership->validate_User($_POST['username'], $_POST['pwd']);

//

$membership->confirm_Member();
}

if($_POST && !empty($_POST['pwdedit']))
{
    $response = $membership-> update_Member($_SESSION['username'], $_POST['pwdedit'], $_SESSION['user_id'],$_POST['firstname'],$_POST['lastname'],$_POST['adresa'],$_POST['descriere'],$_POST['obiectiv'],$_POST['cam']);
    if ($response)
        header("location: #");
}

if($_POST && !empty($_POST['usernamereg']) && !empty($_POST['pwdreg']))
{
	$response=$membership->insert_Member($_POST['usernamereg'], $_POST['pwdreg'], $_POST['cnf'], $_POST['lastname'], $_POST['firstname'], $_POST['adresa'], $_POST['descriere'], $_POST['camera'], $_POST['obiectiv']);
	if ($response)
	{
		$response2 = $membership->validate_User($_POST['usernamereg'], $_POST['pwdreg']);
        echo $response2;
	}
	if ($response)
    {
    $membership->confirm_Member();
    $first='images/'.$_SESSION['user_id'].'/';
    $current='images/'.$_SESSION['user_id'].'/img/';
    $thumb='images/'.$_SESSION['user_id'].'/thumb/';
    mkdir($first, 0777);
    mkdir($current, 0777);
    mkdir($thumb, 0777);
    echo $first;
    $resizeObj = new resize('images/avatar.jpg');
    $resizeObj -> resizeImage( '5','resize' );
    $target=$first . "avatar.jpg";
    $resizeObj -> saveImage( $target, 100 );
    header("location: index.php");
    }
}




if(isset($_FILES['fupload'])) {
    $filename = $membership->get_Id_Insert_Photo() . '.jpg';
    $source = $_FILES['fupload']['tmp_name'];    
    $target = $path_to_image_directory . $filename;
    $description = addslashes($_POST['description']);    
    $src = $path_to_image_directory . $filename;
    $tn_src = $path_to_thumbs_directory  . $filename;
    $categ = $_POST['selectCateg'];
    $folder = $_POST['selectFolder'];
    if($source == '' || !preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) 
    $error['no_file'] = '<p class="alert"> Adauga o imagine. </p>';

    if(!$error) {

        if (move_uploaded_file($source, $target))
        $response = $membership->insert_Photo(0,$description, $_SESSION['user_id'], $categ, $folder);
    	if ($response=='1')
    		{
           $response=NULL;
           // unset($GLOBALS[fupload]);
            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '5','resize' );
            $resizeObj -> saveImage( $tn_src, 100 );
    		header("location:maingallery.php?user=" . $_SESSION['user_id']. "#");
            }
    }
    else
    	$response="Alege un fisier";
} 

if(isset($_FILES['uptema'])) {
    $filename = $membership->get_Id_Insert_Photo() . '.jpg';
    $source = $_FILES['uptema']['tmp_name'];    
    $target = $path_to_image_directory . $filename;
    $description = addslashes($_POST['description']);    
    $src = $path_to_image_directory . $filename;
    $tn_src = $path_to_thumbs_directory  . $filename;
    $categ = $_POST['selectCateg'];
   // $folder = $_POST['selectFolder'];
    if($source == '' || !preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) 
    $error['no_file'] = '<p class="alert"> Adauga o imagine. </p>';
  //  echo $source; echo $target;
    if(!$error) {

        if (move_uploaded_file($source, $target))
        $response = $membership->insert_Photo($_GET['tut'],$description, $_SESSION['user_id'], $categ, 0);
        if ($response=='1')
            {
           $response=NULL;
           // unset($GLOBALS[fupload]);
            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '5','resize' );
            $resizeObj -> saveImage( $tn_src, 100 );
            header("location: tutorial.php?tut=" . $_GET['tut'] . "#");
            }
    }
    else
        $response="Alege un fisier";
} 

if(isset($_FILES['contestUp'])) {
    $filename = $membership->get_Id_Insert_Photo() . '.jpg';
    $source = $_FILES['contestUp']['tmp_name'];    
    $target = $path_to_image_directory . $filename;
    $description = addslashes($_POST['description']);    
    $src = $path_to_image_directory . $filename;
    $tn_src = $path_to_thumbs_directory  . $filename;
    $categ = $_POST['selectCateg'];
   // $folder = $_POST['selectFolder'];
    if($source == '' || !preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) 
    $error['no_file'] = '<p class="alert"> Adauga o imagine. </p>';
  //  echo $source; echo $target;
    if(!$error) {

        if (move_uploaded_file($source, $target))
        $response = $membership->insert_Photo(0,$description, $_SESSION['user_id'], $categ, 0,1);
        if ($response=='1')
            {
           $response=NULL;
           // unset($GLOBALS[fupload]);
            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '5','resize' );
            $resizeObj -> saveImage( $tn_src, 100 );
            header("location: tutorial.php?tut=" . $_GET['tut'] . "#");
            }
    }
    else
        $response="Alege un fisier";
} 
if(isset($_FILES['avupload'])) {
    $filename = 'avatar.jpg';
    $filename2 = 'avatarsmall.jpg';
    $filename3 = 'avatarcom.jpg';
    $source = $_FILES['avupload']['tmp_name'];    
    $target = $path_to_avatar_directory . 'avatar.jpg';
    $target2 = $path_to_avatar_directory . 'avatarsmall.jpg';
    $target3 = $path_to_avatar_directory . 'avatarcom.jpg';
  //  $description = addslashes($_POST['description']);    
    $src = $path_to_avatar_directory . $filename;
    $src2 = $path_to_avatar_directory . $filename2;
    $src3 = $path_to_avatar_directory . $filename3;
   // $tn_src = $path_to_thumbs_directory  . $filename;
  ///  $categ = $_POST['selectCateg'];
   // $folder = $_POST['selectFolder'];
   // echo $source . $target .$src;
    if($source == '' || !preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) 
    $error['no_file'] = '<p class="alert"> Adauga o imagine. </p>';

    if(!$error) {

        if (move_uploaded_file($source, $target))
        $response = '1';

           $response=NULL;
           // unset($GLOBALS[fupload]);
            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '5','resize' );
            $resizeObj -> saveImage( $src, 100 );
        

            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '6','resize' );
            $resizeObj -> saveImage( $src2, 100 );
            

            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '7','resize' );
            $resizeObj -> saveImage( $src3, 100 );
        
            header("location: #");
        
    }
    else
        $response="Alege un fisier";
}
?>


