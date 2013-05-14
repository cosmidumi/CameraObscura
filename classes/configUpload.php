<?php
session_start();
require_once 'classes/Membership.php';

$final_width_of_image = 200;
$user=$_SESSION['user_id'];
$path_to_image_directory = 'images/'.$user.'/img/';
$path_to_thumbs_directory = 'images/'.$user.'/thumb/';



?>