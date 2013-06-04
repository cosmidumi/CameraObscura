<?php
require_once 'includes/constants.php';

class Mysql {
	private $conn;
	private $con;
	function __construct(){
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die ('Eroare la conectarea bazei de date.');
		$this->con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
	}

	function insertIntoDatabase($email, $password, $nume, $prenume, $adresa, $descriere, $camera, $obiectiv)
	{
		$query = "INSERT INTO `cameraobscura`.`Users`(`email`, `password`, `first_name`, `last_name`, `address`, `description`, `lens_id`, `camera_id`, `type_id`, `rank_id`) VALUES ('$email', '" . md5($password) ."','$prenume','$nume','$adresa','$descriere','$obiectiv', '$camera',1,1)";
		//echo $query;
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return false;
		}
		else return true;
	}

	function verifyUsernameAndPassword($user, $pwd)
	{
		$query = "SELECT * FROM `Users` WHERE `email` = '$user' AND `password` = '$pwd' LIMIT 1";
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
			
		}
	}

	function getUserId($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `email` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $id= $row['user_id'];
		}
		mysql_free_result($result);
		return $id;
	}

		function getFirstName($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $firstname= $row['first_name'];
		}
		mysql_free_result($result);
		return $firstname;
	}

		function getLastName($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $lastname= $row['last_name'];
		}
		mysql_free_result($result);
		return $lastname;
	}

	function getMemberDescription($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $description= $row['description'];
		}
		mysql_free_result($result);
		return $description;
	}
	function getAddress($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $address= $row['address'];
		}
		mysql_free_result($result);
		return $address;
	}

	function getCamera($user)
	{
		$query = "SELECT  `Cameras`.`camera_name` as camera_name, `Cameras`.`camera_id` as camera_id FROM `cameraobscura`.`Users`, `cameraobscura`.`Cameras` WHERE `user_id` = '$user' && `Cameras`.`camera_id` = `Users`.`camera_id`";
		$result = mysql_query($query);
		$solutions = array();
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $solutions[1] = $row['camera_name'];
	    $solutions[2] = $row['camera_id'];
		}
		mysql_free_result($result);
		return $solutions;
	}

	function getLens($user)
	{
		$query = "SELECT `Lenses`.`lens_name` as lens_name, `Lenses`.`lens_id` as lens_id FROM `cameraobscura`.`Users`, `cameraobscura`.`Lenses` WHERE `user_id` = '$user' && `Lenses`.`lens_id` = `Users`.`lens_id`";
		$result = mysql_query($query);
		$solutions = array();
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $solutions[1] = $row['lens_name'];
	    $solutions[2] = $row['lens_id'];
		}
		mysql_free_result($result);
		return $solutions;
	}

	function getRankId($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `user_id` = '$user'";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $rank= $row['rank_id'];
		}
		mysql_free_result($result);
		return $rank;
	}

	function getRank($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users`, `cameraobscura`.`Ranks` WHERE `user_id` = '$user' && `Ranks`.`rank_id` = `Users`.`rank_id`";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $rank= $row['rank_name'];
		}
		mysql_free_result($result);
		return $rank;
	}

	function getType($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users`, `cameraobscura`.`Types` WHERE `user_id` = '$user' && `Types`.`type_id` = `Users`.`type_id`";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $type= $row['type_name'];
		}
		mysql_free_result($result);
		return $type;
	}

	function getDescription($photo_id)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE  `photo_id` ='$photo_id'";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $description= $row['description'];
		}
		mysql_free_result($result);
		return $description;
	}

	function getDate($photo_id)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE  `photo_id` ='$photo_id'";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $date= $row['date'];
		}
		mysql_free_result($result);
		$date=new DateTime($date);
		$date=$date->format('d.m.Y');
		return $date;
	}
		function getAlbum($folder)
	{
		$query = "SELECT * FROM `cameraobscura`.`Folders` WHERE `folder_id` = '$folder' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $folder= $row['folder_name'];
		}
		mysql_free_result($result);
		return $folder;
	}

	function getPhotos($user, $folder)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE  `user_id` ='$user' AND `Type`='$folder'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
		while($row = mysql_fetch_assoc($result)) {
		  array_push($solutions, $row['photo_id']);
		}
//		mysql_free_result($result);
		return $solutions;
		
	}

	function getNumberOfFolders($user)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Folders` WHERE  `user_id` ='$user' OR `user_id` ='0'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $n=0;
		while($row = mysql_fetch_assoc($result)) {
			$n++;
		}
		return $n;
	}
	function getNumberOfPhotos($user, $folder)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE  `user_id` ='$user' AND `Type`='$folder'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $n=0;
		while($row = mysql_fetch_assoc($result)) {
			$n++;
		}
		return $n;
	}


	function getNumberOfAllPhotos($user_id)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Photos` WHERE `Type`=0  AND `user_id`!='$user_id'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $n=0;
		while($row = mysql_fetch_assoc($result)) {
			$n++;
		}
		return $n;
	}
	function getCategories()
	{
		$query = "SELECT * FROM  `cameraobscura`.`Categories`";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
		while($row = mysql_fetch_assoc($result)) {
			$solutions[$row['category_id']]=$row['category_name'];
		}
//		mysql_free_result($result);
		return $solutions;
	}

	function getCameras()
	{
		$query = "SELECT * FROM  `cameraobscura`.`Cameras`";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=-1;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['camera_id'];
			$i++;
			$solutions[$i]=$row['camera_name'];
		}
		return $solutions;
	}

	function getLenses()
	{
		$query = "SELECT * FROM  `cameraobscura`.`Lenses`";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=-1;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['lens_id'];
			$i++;
			$solutions[$i]=$row['lens_name'];
		}
		return $solutions;
	}

	
		function getFolders($user_id)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Folders` WHERE `user_id`='$user_id' OR `user_id`='0'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=-1;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['folder_id'];
			$i++;
			$solutions[$i]=$row['folder_name'];
		}
		return $solutions;
	}

	function getFoldersUpload($user_id)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Folders` WHERE `user_id`='$user_id' OR `user_id`='0'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
		while($row = mysql_fetch_assoc($result)) {
			$solutions[$row['folder_id']]=$row['folder_name'];
		}
		return $solutions;
	}

	function checkUnique($user)
	{
		$query = "SELECT * FROM `cameraobscura`.`Users` WHERE `email` = '$user' ";

		$result = mysql_query($query);
		if (mysql_num_rows($result)==0) 
		{
	    $message  =  mysql_error();
	    return true;
		}
	    while ($row = mysql_fetch_assoc($result)) 
		{
		mysql_free_result($result);
	    return false;
		}
	}

	function insertPhoto($work,$description, $user_id, $category_id, $folder_id,$contest)
	{
	$idnext=$this->getIdNextPhoto();
	if (strlen($description)>4)
	{
		$query="INSERT INTO `cameraobscura`.`Photos`(`work`,`photo_id`, `description`, `user_id`, `category_id`,`type`,`contest`) VALUES ('$work','$idnext','$description', '$user_id', '$category_id', '$folder_id','$contest')";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}
	}

	function deletePhoto($photo_id, $user_id)
	{
		$query="DELETE FROM `cameraobscura`.`Photos` WHERE `Photos`.`photo_id` = '$photo_id' AND `Photos`.`user_id` = '$user_id'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function getIdNextPhoto()
	{
		$query = "SELECT MAX(photo_id) as max FROM `cameraobscura`.`Photos`";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $id= $row['max'];
		}
		mysql_free_result($result);
		return ++$id;
	}

	function getImages($user_id)
	{
		$query = "SELECT * FROM `cameraobscura`.`Photos` WHERE `Type`=0 and `user_id`!= '$user_id' order by photo_id DESC";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['photo_id'];
			$i++;
			$solutions[$i]=$row['user_id'];
		}
//		mysql_free_result($result);
		return $solutions;
	}

	function getTopImages()
	{
		$query = "SELECT  `Frames`.`photo_id` ,  `Photos`.`user_id` , COUNT(  `Photos`.`user_id` ) AS nr FROM  `cameraobscura`.`Photos` ,  `cameraobscura`.`Frames` WHERE  `Frames`.`photo_id` =  `Photos`.`photo_id` GROUP BY  `Frames`.`photo_id` ORDER BY nr DESC LIMIT 10";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		$i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['photo_id'];
			$i++;
			$solutions[$i]=$row['user_id'];
		}
	    return $solutions;
	}

	function getWork()
	{
		$query = "SELECT MAX(`Photos`.`photo_id`) as photo, `Photos`.`user_id` as user from `cameraobscura`.`Photos` where work!=0 group by user";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		$i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['photo'];
			$i++;
			$solutions[$i]=$row['user'];
		}
	    return $solutions;
	}

		function getImagesSearch($user_id,$description)
	{
		$query = "SELECT * FROM `cameraobscura`.`Photos` WHERE `Type`=0 and `user_id`!= '$user_id' and `description`LIKE '%$description%' order by photo_id DESC";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['photo_id'];
			$i++;
			$solutions[$i]=$row['user_id'];
		}
//		mysql_free_result($result);
		return $solutions;
	}

	function getContestImages($contest)
	{
		$query = "SELECT * FROM `cameraobscura`.`Photos` WHERE `contest`='$contest'";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['photo_id'];
			$i++;
			$solutions[$i]=$row['user_id'];
		}
//		mysql_free_result($result);
		return $solutions;
	}
	
	function getUserByPhoto($photo_id)
	{
		$query = "SELECT * FROM `cameraobscura`.`Photos` WHERE `photo_id` = '$photo_id' ";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $response= $row['user_id'];
		}
		mysql_free_result($result);
		return $response;
	}

	function checkFrame($photo_id,$user_id)
	{
		$query = "SELECT * FROM `cameraobscura`.`Frames` WHERE `photo_id` = '$photo_id' AND `user_id`='$user_id'";
		$result = mysql_query($query);
		if (mysql_num_rows($result)==0) 
		{
	    $message  =  mysql_error();
	    return false;
		}
	    while ($row = mysql_fetch_assoc($result)) 
		{
		mysql_free_result($result);
	    return true;
		}
	}

	function frameFramed($photo_id)
	{
		$query = "SELECT * FROM `cameraobscura`.`Frames` WHERE `photo_id` = '$photo_id'";
		$result = mysql_query($query);
		if (mysql_num_rows($result)==0) 
		{
	    $message  =  mysql_error();
	    return false;
		}
		$solutions = array();
	    $i=0;
	    while ($row = mysql_fetch_assoc($result)) 
		{
		$i++;
		$solutions[$i]=$row['user_id'];
		}
		return $solutions;
	}

	function frameIt($photo_id, $user_id)
	{
		$query ="INSERT INTO `cameraobscura`.`Frames` (`frame_id`, `photo_id`, `user_id`) VALUES (NULL, '$photo_id', '$user_id')";
	$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			echo $message;
			return $message;
		}
		else return true;
	}

	function deleteFrame($photo_id, $user_id)
	{
		$query="DELETE FROM `cameraobscura`.`Frames` WHERE `Frames`.`photo_id` = '$photo_id' AND `Frames`.`user_id` = '$user_id'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function insertAlbum($foldername, $user)
	{
		$query="INSERT INTO `cameraobscura`.`Folders`(`folder_name`, `user_id`) VALUES ('$foldername','$user')";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}
	function deleteAlbum($folder_id, $user_id)
	{
		$query="DELETE FROM `cameraobscura`.`Folders` WHERE `folder_id` = '$folder_id' AND `user_id` = '$user_id'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function renameAlbum($name, $folder_id, $user_id)
	{
		$query="UPDATE `cameraobscura`.`Folders` SET  `folder_name`='$name' WHERE `folder_id` = '$folder_id' AND `user_id` = '$user_id'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function updateMember($user_id, $firstname, $lastname, $address, $description, $lens, $camera)
	{
		$query="UPDATE  `cameraobscura`.`Users` SET  `first_name` =  '$firstname',`last_name` =  '$lastname',`address` =  '$address',`description` =  '$description',`lens_id` =  '$lens',`camera_id` =  '$camera' WHERE  `Users`.`user_id` ='$user_id'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}
	function getComments($photo_id)
	{
		$query = "SELECT * FROM `cameraobscura`.`Comments` WHERE `photo_id`= '$photo_id' order by date ASC";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=0;
		while($row = mysql_fetch_assoc($result)) {
			$i++;
			$solutions[$i]=$row['text'];
			$i++;
			$solutions[$i]=$row['user_id'];
			$i++;
			$solutions[$i]=$row['date'];
		}
//		mysql_free_result($result);
		return $solutions;
	}
	function getNumberOfComments($photo_id)
	{
		$query = "SELECT * FROM  `cameraobscura`.`Comments` WHERE `photo_id`= '$photo_id'";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $n=0;
		while($row = mysql_fetch_assoc($result)) {
			$n++;
		}
		return $n;
	}
	function insertComment($text, $photo_id, $user_id)
	{
		$query = "INSERT INTO `cameraobscura`.`Comments`(`text`,`photo_id`, `user_id`) VALUES ('$text', '$photo_id', '$user_id')";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		else return true;
	}
	function getFollowing($user_id)
	{
		$query = "SELECT DISTINCT(`Photos`.`user_id`),`Users`.`first_name`, `Users`.`last_name` from `cameraobscura`.`Photos`, `cameraobscura`.`Frames`, `cameraobscura`.`Users` where `Photos`.`photo_id`=`Frames`.`photo_id` and `Frames`.`user_id`='$user_id' and `Photos`.`user_id`!='$user_id' and `Users`.`user_id`=`Photos`.`user_id`";
		$result = mysql_query($query);
		$solutions = array();
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		$i=-1;
		while ($row = mysql_fetch_assoc($result)) 
		{
		$i++;
	    $solutions[$i] = $row['user_id'];
		$i++;
		$solutions[$i] = $row['first_name'];
		$i++;
		$solutions[$i] = $row['last_name'];
		}
		return $solutions;
	}
	function getHomework($work,$user)
	{
		$query = "SELECT MAX(`Photos`.`photo_id`) as photo_id from `cameraobscura`.`Photos` where `work`='$work' and `user_id`='$user'";
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $false;
		}
		$row = mysql_fetch_assoc($result);
		return $row['photo_id'];
	}

	function getUsers()
	{
		$query = "SELECT * FROM `cameraobscura`.`Users`";
		$solutions = array();
		$result = mysql_query($query);
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
	    }
	    $i=0;
		while($row = mysql_fetch_assoc($result)) {
		$solutions[]=$row;
		}
//		mysql_free_result($result);
		return $solutions;
	}

	function updateRank($user, $rank)
	{
		$query="UPDATE `cameraobscura`.`Users` SET  `rank_id`='$rank' WHERE `user_id` = '$user'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function updateType($user, $type)
	{
		$query="UPDATE `cameraobscura`.`Users` SET  `type_id`='$type' WHERE `user_id` = '$user'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}

	function getLatestContest()
	{
		$query="SELECT max(contest_id) as contest FROM `cameraobscura`.`Contests`";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		while ($row = mysql_fetch_assoc($result)) 
		{
	    $contest= $row['contest'];
		}
		mysql_free_result($result);
		return $contest;
	}

	function getContest($contest)
	{
		$query="SELECT contest_id as contest, content FROM `cameraobscura`.`Contests` WHERE contest_id = $contest";
		$result=mysql_query($query);
		$solutions = array();
		if (!$result) {
	    $message  =  mysql_error();
	    return $message;
		}
		$i=0;
		while ($row = mysql_fetch_assoc($result)) 
		{
		$i++;
	    $solutions[$i] = $row['contest'];
		$i++;
		$solutions[$i] = $row['content'];
		}
		return $solutions;
	}

	function insertContest($data)
	{
		$query="INSERT INTO `cameraobscura`.`Contests`(`content`) VALUES ('$data')";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}
	function deleteUser($user)
	{
		$query="DELETE FROM `cameraobscura`.`Users` where `user_id`='$user'";
		$result=mysql_query($query);
		if (!$result)
		{
			$message=mysql_error();
			return $message;
		}
		return true;
	}
}
