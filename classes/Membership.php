<?php

require 'Mysql.php';

class Membership {
	
	function validate_user($un, $pwd) {
		$mysql = New Mysql();
		$check = $mysql->verifyUsernameAndPassword($un, md5($pwd));
		$id = $mysql->getUserId($un);
		if($check) {
			$_SESSION['status'] = 'authorized';
			$_SESSION['username']=$un;
			$_SESSION['user_id']=$id;
		
			//header("location: index.php");
			if (($_SERVER["REQUEST_URI"] == '/gallery.php') || ($_SERVER["REQUEST_URI"] == '/gallery.php?user='))
			{
			header("location: /gallery.php?user=" . $_SESSION['user_id'] );
			return true;
			}
		} else return "Parola/Email incorect";
		
	} 
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
		$loc = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
		header("location: " . $loc);
	}
	
	function confirm_Member() {
		session_start();
		return true;
	//	if($_SESSION['status'] !='authorized') header("location: login.php");
	}

	function check_Unique($user)
	{
		$mysql = new Mysql();
		$check = $mysql->checkUnique($user);
		return $check;
	}

	function insert_Member($user, $password, $passwordcnf, $nume, $prenume, $adresa, $descriere, $camera, $obiectiv) {
		$mysql = new Mysql();
		$check = $mysql->checkUnique($user);
		if (($check))
			if ($password==$passwordcnf) {}
			else return "Verifica confirmarea parolei.";
		else return "Alege alt e-mail.";
		if (($check) && ($password==$passwordcnf))
		{
		$response=$mysql->insertIntoDatabase($user, $password, $nume, $prenume, $adresa, $descriere, $camera, $obiectiv);
		return $response;
		}
	}

	function delete_Member($user)
	{
		$mysql = new Mysql();
		$response = $mysql->deleteUser($user);
		return $response;
	}
	function get_Member_Number_Folders($user_id)
	{
		$mysql = new Mysql();
		$nr = $mysql->getNumberOfFolders($user_id);
		return $nr;
	}
	function get_Member_Photos($user_id, $folder)
	{
		$mysql=new Mysql();
		$photos=$mysql->getPhotos($user_id, $folder);
		return $photos;
	}
	function get_Member_Number_Photos($user_id, $folder)
	{
		$mysql=new Mysql();
		$nr=$mysql->getNumberOfPhotos($user_id, $folder);
		return $nr;
	}
	function get_Member_Number_All_Photos($user_id)
	{
		$mysql=new Mysql();
		$nr=$mysql->getNumberOfAllPhotos($user_id);
		return $nr;
	}
	function get_Member_First_Name($user_id)
	{
		$mysql=new Mysql();
		$firstname=$mysql->getFirstName($user_id);
		return $firstname;
	}
	function get_Member_Description($user_id)
	{
		$mysql = new Mysql();
		$description = $mysql->getMemberDescription($user_id);
		return $description;
	}
	function get_Member_Address($user_id)
	{
		$mysql = new Mysql();
		$address = $mysql->getAddress($user_id);
		return $address;
	}
	function get_Member_Last_Name($user_id)
	{
		$mysql=new Mysql();
		$lastname=$mysql->getLastName($user_id);
		return $lastname;
	}
	function get_Camera($user_id)
	{
		$mysql=new Mysql();
		$camera=$mysql->getCamera($user_id);
		return $camera;
	}
	function get_Lens($user_id)
	{
		$mysql=new Mysql();
		$lens=$mysql->getLens($user_id);
		return $lens;
	}
	function get_Rank($user_id)
	{
		$mysql=new Mysql();
		$rank=$mysql->getRank($user_id);
		return $rank;
	}
	function get_Rank_Id($user_id)
	{
		$mysql=new Mysql();
		$rank=$mysql->getRankId($user_id);
		return $rank;
	}
	function get_Type($user_id)
	{
		$mysql=new Mysql();
		$type=$mysql->getType($user_id);
		return $type;
	}
	function get_Description($photo_id)
	{
		$mysql = new Mysql();
		$description = $mysql->getDescription($photo_id);
		return $description;
	}

	function get_Date($photo_id)
	{
		$mysql = new Mysql();
		$date = $mysql->getDate($photo_id);
		return $date;
	}

	function insert_Photo($work=0,$description, $user_id, $category_id, $folder_id, $contest=0) {
		$mysql = new Mysql();
		$response=$mysql->insertPhoto($work,$description, $user_id, $category_id, $folder_id, $contest);
		if (!$response)  $response="Adauga o descriere pozei.";
		return $response;
	}
	function get_Id_Insert_Photo()
	{
		$mysql = new Mysql();
		$response=$mysql->getIdNextPhoto();
		return $response;
	}

	function delete_Photo($photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response=$mysql->deletePhoto($photo_id, $user_id);
		header("location: gallery.php?user=" . $_SESSION['user_id'] );
	}

	function get_Categories()
	{
		$mysql = new Mysql();
		$response=$mysql->getCategories();
		return $response;
	}

	function get_Cameras()
	{
		$mysql = new Mysql();
		$response = $mysql->getCameras();
		return $response;
	}


	function get_Lenses()
	{
		$mysql = new Mysql();
		$response = $mysql->getLenses();
		return $response;
	}

	function get_Folders($user_id)
	{
		$mysql = new Mysql();
		$response=$mysql->getFolders($user_id);
		return $response;
	}
	function get_Folders_Upload($user_id)
	{
		$mysql = new Mysql();
		$response=$mysql->getFoldersUpload($user_id);
		return $response;
	}
	function get_Images($user)
	{
		$mysql = new Mysql();
		$response=$mysql->getImages($user);
		return $response;
	}
	function get_Contest_Images($contest)
	{
		$mysql = new Mysql();
		$response=$mysql->getContestImages($contest);
		return $response;
	}
	function get_Top_Images()
	{
		$mysql = new Mysql();
		$response=$mysql->getTopImages();
		return $response;
	}
	function get_Work_Images()
	{
		$mysql = new Mysql();
		$response=$mysql->getWork();
		return $response;
	}
	function get_Images_Search($user,$description)
	{
		$mysql = new Mysql();
		$response=$mysql->getImagesSearch($user,$description);
		return $response;
	}
	function get_User_By_Photo($photo_id)
	{
		$mysql = new Mysql();
		$response=$mysql->getUserByPhoto($photo_id);
		return $response;
	}

	function check_Frame($photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response = $mysql->checkFrame($photo_id, $user_id);
		return $response;
	}

	function frame_Framed($photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response = $mysql->frameFramed($photo_id);
		return $response;
	}

	function frame_It($photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response = $mysql->checkFrame($photo_id, $user_id);
//		echo 'da';
		if (!$response)
		{
			$addResponse = $mysql->frameIt($photo_id,$user_id);
			if ($addResponse)
				return true;
			else return false;
		}
		return false;
	}

	function delete_Frame($photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response=$mysql->deleteFrame($photo_id, $user_id);
		return $response;
	}

	function get_Album($folder)
	{
		$mysql = new Mysql();
		$response = $mysql->getAlbum($folder);
		return $response;
	}

	function insert_Album($folder, $user) {
		if ($folder=="") return "Adauga o descriere pozei.";
		else
		{
		$mysql = new Mysql();
		$response=$mysql->insertAlbum($folder, $user);
		return $response;
		}
	}

	function delete_Album($folder, $user) {
		$mysql = new Mysql();
		if ($mysql->getNumberOfPhotos($user,$folder)==0)
		{
		$response=$mysql->deleteAlbum($folder, $user);
		}
		else return false;
	}

	function rename_Album($folder, $name, $user) {
		$mysql = new Mysql();
		$response=$mysql->renameAlbum($name, $folder, $user);
		return $response;
	}

	function update_Member($user, $pwd, $user_id, $firstname, $lastname, $address, $description, $lens, $camera)
	{
		$mysql = new Mysql();
		$check = $mysql->verifyUsernameAndPassword($user, md5($pwd));
		if ($check)
		{
			$response = $mysql -> updateMember($user_id, $firstname, $lastname, $address, $description, $lens, $camera);
			return $response;
		}
		else return "Parola incorecta";
	}
	
	function generateDummy()
	{
		return rand(1,100);
	}
	
	function get_Comments($photo_id)
	{
		$mysql = new Mysql();
		$response = $mysql->getComments($photo_id);
		return $response;
	}

	function get_Number_Comments($photo_id)
	{
		$mysql = new Mysql();
		$response = $mysql->getNumberOfComments($photo_id);
		return $response;
	}

	function insert_Comment($text, $photo_id, $user_id)
	{
		$mysql = new Mysql();
		$response = $mysql->insertComment($text, $photo_id, $user_id);
		return $response;
	}

	function get_Following($user_id)
	{
		$mysql = new Mysql();
		$response = $mysql->getFollowing($user_id);
		return $response;
	}

	function get_Work($work, $user)
	{
		$mysql = new Mysql();
		$date = $mysql->getHomework($work, $user);
		return $date;
	}

	function get_Users()
	{
		$mysql = new Mysql();
		$response = $mysql->getUsers();
		return $response;
	}

	function update_Rank($user,$rank)
	{
		$mysql = new Mysql();
		$response = $mysql->updateRank($user,$rank);
		return $response;
	}

	function update_Type($user,$type)
	{
		$mysql = new Mysql();
		$response = $mysql->updateType($user,$type);
		return $response;
	}

	function get_Contest($contest)
	{
		$mysql = new Mysql();
		$response = $mysql->getContest($contest);
		return $response;
	}

	function get_Latest_Contest()
	{
		$mysql = new Mysql();
		$response = $mysql->getLatestContest();
		return $response;
	}

	function insert_Contest($data)
	{
		$mysql = new Mysql();
		$response = $mysql->insertContest($data);
		return $response;
	}
}