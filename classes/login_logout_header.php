<?php
session_start();
require_once 'classes/Membership.php';
require_once "classes/resize-class.php";
require_once 'classes/configUpload.php';
require_once 'classes/Mysql.php';
$membership = new Membership();

if (($_SERVER["REQUEST_URI"] == '/gallery.php') || ($_SERVER["REQUEST_URI"] == '/gallery.php?user=') && !isset($_SESSION['user_id']))
{
    header("location: index.php#loginModal");
}

if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

if(isset($_GET['del_photo']))
{
    $membership->delete_Photo($_GET['del_photo'],$_SESSION['user_id']);
  /*)  $path='images/'+$_SESSION['user_id']+'/img/'+$_GET['del_photo']+'.jpg';
    unlink($path);
    echo $path;*/
}

if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
	$response = $membership->validate_User($_POST['username'], $_POST['pwd']);

//

$membership->confirm_Member();
}

if($_POST && !empty($_POST['usernamereg']) && !empty($_POST['pwdreg']))
{
	$response=$membership->insert_Member($_POST['usernamereg'], $_POST['pwdreg'], $_POST['cnf'], $_POST['lastname'], $_POST['firstname'], $_POST['adresa'], $_POST['descriere'], $_POST['camera'], $_POST['obiectiv']);
	if ($response)
	{
		$response = $membership->validate_User($_POST['usernamereg'], $_POST['pwdreg']);
	}
	if ($membership->confirm_Member())
    {
    $first='images/'.$_SESSION['user_id'].'/';
    $current='images/'.$_SESSION['user_id'].'/img/';
    $thumb='images/'.$_SESSION['user_id'].'/thumb/';
    mkdir($first, 0777);
    mkdir($current, 0777);
    mkdir($thumb, 0777);
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
    if($source == '' || !preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $filename)) 
    $error['no_file'] = '<p class="alert"> Adauga o imagine. </p>';

    if(!$error) {

        if (move_uploaded_file($source, $target))
        $response = $membership->insert_Photo($description, $_SESSION['user_id'], $categ);
    	if ($response=='1')
    		{
           $response=NULL;
            unset($GLOBALS[fupload]);
            $resizeObj = new resize( $target );
            $resizeObj -> resizeImage( '5','resize' );
            $resizeObj -> saveImage( $tn_src, 100 );
    		header("location:gallery.php?user=" . $_SESSION['user_id']. "#");
            }
    }
    else
    	$response="Alege un fisier";
}     
?>