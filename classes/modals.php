	<?php
if (!isset($_SESSION['username'])):
	?>
	<div id="loginModal" class="modalDialog">
		<div style="width:350px; height:130px;top:100px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>" . $response . "</h4>"; ?>
			<?php if(isset($_GET["response"])) echo "<h4 class='alert' style='color:red;'>" . $_GET["response"] . "</h4>"; ?>
			<?php if((!isset($response) && (!isset($_GET["response"])))) echo "<p><br/></p>"?>
		<span style="position: relative; float:left; left:10px;top:10px">
			<form id="login" method="post" action="">
						<p class="modalP">
							<label for="username" style="text-align:right; float:left;width:100px">Email:&nbsp;&nbsp;&nbsp;</label> <input type="text" name="username" style="background-color:#fffff;border:1px solid #dbdbdb; border-radius:5px; float:left; width:200px">
							
	
						</p>
						<p style="position:relative; font-size:19px">
							<label for="pwd" style="text-align:right; float:left; width: 100px">Parola: &nbsp;</label> <input type="password" name="pwd"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px;">
						</p>
							<span style="position: relative;float: left;left: 30px; padding-top:10px;">
						<input type="checkbox" name="vehicle" value="Bike" style="position:relative; top:2px;" >&nbsp; Tine-ma minte<br>
						</span>
						<ul id="loginUL">
							<li><input class="btn" type="submit" value="Login" name="submit">
							</li>
						</ul>
						
							
						</span>
						</form>
				</div>
	</div>

	<div id="signupModal" class="modalDialog">
		<div style="width:500px; height:420px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>" . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>
		<span style="position: relative; float:left; left:50px;top:10px">
			<form id="signup" method="post" action="">
						<h3 style="font-size:20px">Inregistrare</h3><br/>
						<p class="modalP" id="usernameValid" style="width:422px">
							<label for="usernamereg" style="text-align:left; float:left;width:200px;">Email:</label> <input type="text" name="usernamereg" class="signupInput">
						</p>
						<p class="modalP pass" style="width:422px">
							<label for="pwdreg" style="text-align:left; float:left; width: 200px;">Parola:</label> <input type="password" name="pwdreg" class="signupInput">
						</p>
						<p class="pass"style="position:relative; font-size:19px;padding-bottom:30px;width:422px ">
							<label for="cnf" style="text-align:left; float:left; width: 200px">Confirmarea Parolei: </label> <input type="password" name="cnf" class="signupInput">
						</p>
						<p class="modalP">
							<label for="firstname" class="editLabel">Nume: </label> <input type="text" name="firstname" class="signupInput">
						</p>						<p class="modalP">
							<label for="lastname" class="editLabel">Prenume: </label> <input type="text" name="lastname" class="signupInput">
						</p>
						<p class="modalP">
							<label for="adresa" class="editLabel">Adresa: </label> <input type="text" name="adresa" class="signupInput">
						</p>
						<p class="modalP">
							<label for="descriere" style="text-align:left; float:left; width: 200px;">Descriere: </label> <input type="text" name="descriere" class="signupInput">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:5px;">
							<label for="camera" style="text-align:left; float:left; width: 200px;">Camera: </label> 
		<select name="cam" style="width:202px;left: -10px; position: relative;">
      	  <?php 

		  $camera=$membership->get_Cameras();
//		  echo '<option value="1">' . $camera[1] .'</option>';
		  $i=0;
		  $val="";
		  foreach ($camera as $cam) {
		  	if (($cam!=$membership->get_Camera($_SESSION['user_id'])[2]) && ($cam!=$membership->get_Camera($_SESSION['user_id'])[1]))
		  	if ($i%2==0)
		  	{
		  		$val=$cam;
		  	}
		  	else
		  	{
		  	echo '<option value=' . $val . '>'. $cam .'</option>';
		  	}
		  	$i++;
		  }
		  ?>
		</select>

							
						</p>
		<p style="position:relative; font-size:19px;padding-bottom:5px;">
		<label for="obiectiv" style="text-align:left; float:left; width: 202px;">Obiectiv: </label>
		<select name="obiectiv" style="width:200px;left: -10px;
position: relative;">
      	  <?php 

		  $lens=$membership->get_Lenses();
//		  echo '<option value="1">' . $lens[1] .'</option>';
		  $i=0;
		  $val="";
		  foreach ($lens as $lenses) {
		  	if (($lenses!=$membership->get_Lens($_SESSION['user_id'])[2]) && ($lenses!=$membership->get_Lens($_SESSION['user_id'])[1]))
		  	if ($i%2==0)
		  	{
		  		$val=$lenses;
		  	}
		  	else
		  	{
		  	echo '<option value=' . $val . '>'. $lenses .'</option>';
		  	}
		  	$i++;
		  }
		  ?>
		</select></p><br/><br/>
						<input class="btn" type="submit" value="Inregistrare" name="submit" style="position:relative; top:-30px">
							
						</span>
						</form>
				</div>
	</div>

<?php
	endif; 
		if(!isset($_FILES['fupload'])||((isset($response))&&(isset($_FILES['fupload'])))):
?>
<div id="upload" class="modalDialog">
		<div style="width:500px; height:280px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>"  . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>

		<span style="position: relative; float:left; left:10px;top:10px">
	<form id="uploadPhoto" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <p><input type="file" name="fupload" style="position:absolute; float:right;"/></p>
      
      	<p style="padding-bottom:5px;"><label for="description"  style="position:relative; left:40px; float:left;">Introduceti o descriere: </label>
      	<textarea rows="6" cols="47" id="description" name="description" style="position:relative; left:-15px;"></textarea></p>
      	<p style="position:relative; float:left;left:40px;"><label for="description" >Selecteaza o categorie: </label></p>
      	<p style="float:right;">
      	<select name="selectCateg" style="position:relative; float:right; right:70px;width:140px">
      	  <?php 
		  $categ=$membership->get_Categories();
//		  echo '<option value="1">' . $categ[1] .'</option>';
		  $i=1;
		  foreach ($categ as $categOption) {
		  	echo '<option value=' . $i . '>'. $categOption .'</option>';
		  	$i++;
		  }
		  ?>
		</p>
		</select>
		<p style=" position:relative; float:left;clear:both;left:40px;"><label for="album"  style="position:relative; float:left;">Selecteaza un album: </label></p>
		<p style="float:right">
		<select name="selectFolder" style="position:relative; float:right; width:140px; right:70px;">
      	  <?php 
		  $folder=$membership->get_Folders($_SESSION['user_id']);
//		  echo '<option value="1">' . $folder[1] .'</option>';
		  $i=0;
		  $val="";
		  foreach ($folder as $folderOption) {
		  	if ($i%2==0)
		  	{
		  		$val=$folderOption;
		  	}
		  	else
		  	{
		  	echo '<option value=' . $val . '>'. $folderOption .'</option>';
		  	}
		  	$i++;
		  }
		  ?>
		</select></p>
      	<p style="position:relative; top:40px;float:right;right:20px;"><input class="btn" type="submit" value="Uploadeaza Poza" name="submit" /></p>
    </form>
				</div>
</div>
	<?php
	endif; 
	if(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)=="/maingallery.php"):
?>
<div id="addFolder" class="modalDialog" >
	<div style="width:300px; height:100px; top:100px;">
	<a title="Close" class="close">X</a>
	<form id="addalbum" method="post" action="">
	<p class="modalP">
							<label for="album" style="text-align:left; float:left; width: 300px; ">Introduceti numele noului album: </label> <input type="text" name="album"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:300px; border-radius:5px; top:10px; position:relative " />
	</p>
	<p style="position:relative; text-align:center; top:20px;"><input class="btn" type="submit" value="Adaugati" name="submit" /></p>
	</form>
	</div>

</div>
<?php
	endif; 
		if((!isset($_FILES['avupload'])||((isset($response))&&(isset($_FILES['fupload']))))&&(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == '/profile.php')):
?>
<div id="changeAvatar" class="modalDialog">
		<div style="width:500px; height:100px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>"  . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>

		<span style="position: relative; float:left; left:10px;top:10px">
	<form id="uploadAvatar" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <p  style="position:relative; float:left;"><input type="file" name="avupload"/></p>
      	<p style="position:relative;float:left"><input class="btn" type="submit" value="Schimba Avatar" name="submit" /></p>
    </form>
				</div>
</div>
<?php endif; if(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)=== '/profile.php'): ?>

	<div id="editModal" class="modalDialog">
		<div style="width:500px; height:440px;">
		<a href="<?php header('location:#');?>" title="Close" class="close">X</a>
					<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>" . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>
		<span style="position: relative; float:left; left:25px;top:10px">
			<form id="signup" method="post" action="">
						<h3 style="font-size:20px">Editare Date</h3><br/>
						<p class="modalP">
							<label for="firstname" class="editLabel">Nume: </label> <input type="text" value="<?php echo $membership->get_Member_First_Name($_GET["user"])?>"name="firstname" class="editInputLabel" style="width:244px; ">
						</p>						
						<p class="modalP">
							<label for="lastname" class="editLabel">Prenume: </label> <input type="text" value="<?php echo $membership->get_Member_Last_Name($_GET["user"]);?>" name="lastname" class="editInputLabel" style="width:244px; ">
						</p>
						<p class="modalP">
							<label for="adresa" class="editLabel">Adresa: </label> <input type="text" value="<?php echo $membership->get_Member_Address($_GET["user"]);?>" name="adresa" class="editInputLabel" style="width:244px; ">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;height:80px;">
							<label for="descriere" class="editLabel">Descriere: </label>
							<textarea rows="6" cols="16" id="description" name="descriere"  class="editInputLabel" style="width:240px; "> <?php echo $membership->get_Member_Description($_GET["user"]);?></textarea>
							 
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:5px;">
							<label for="camera" class="editLabel">Camera: </label> 
		<select name="cam" style="width:245px">
      	  <?php 

      	  echo '<option value=' . $membership->get_Camera($_SESSION['user_id'])[2].'>'. $membership->get_Camera($_SESSION['user_id'])[1] .'</option>';
		  $camera=$membership->get_Cameras();
//		  echo '<option value="1">' . $camera[1] .'</option>';
		  $i=0;
		  $val="";
		  foreach ($camera as $cam) {
		  	if (($cam!=$membership->get_Camera($_SESSION['user_id'])[2]) && ($cam!=$membership->get_Camera($_SESSION['user_id'])[1]))
		  	if ($i%2==0)
		  	{
		  		$val=$cam;
		  	}
		  	else
		  	{
		  	echo '<option value=' . $val . '>'. $cam .'</option>';
		  	}
		  	$i++;
		  }
		  ?>
		</select>

							
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:5px;">
							<label for="obiectiv" style="text-align:left; float:left; width: 200px;">Obiectiv: </label>
		<select name="obiectiv" style="width:245px">
      	  <?php 

      	  echo '<option value=' . $membership->get_Lens($_SESSION['user_id'])[2].'>'. $membership->get_Lens($_SESSION['user_id'])[1] .'</option>';
		  $lens=$membership->get_Lenses();
//		  echo '<option value="1">' . $lens[1] .'</option>';
		  $i=0;
		  $val="";
		  foreach ($lens as $lenses) {
		  	if (($lenses!=$membership->get_Lens($_SESSION['user_id'])[2]) && ($lenses!=$membership->get_Lens($_SESSION['user_id'])[1]))
		  	if ($i%2==0)
		  	{
		  		$val=$lenses;
		  	}
		  	else
		  	{
		  	echo '<option value=' . $val . '>'. $lenses .'</option>';
		  	}
		  	$i++;
		  }
		  ?>
		</select>
						</p>
						<p class="modalP">
							<label for="pwdedit" style="text-align:left; float:left; width: 200px;">Parola(pentru confirmare):</label> <input type="password" name="pwdedit" class="editInputLabel" style="width:244px; ">
						</p>
						<br/>
						<input class="btn" type="submit" value="Editare" name="submit">
						</form>	
						</span>
						
				</div>
	</div>
<?php
	endif; 
	if(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)=="/maingallery.php"):
?>
<div id="renameFolder" class="modalDialog" >
	<div style="width:300px; height:100px; top:100px;">
	<a title="Close" class="close">X</a>
	<form id="renameAlbum" method="post" action="">
	<p class="modalP">
							<label for="renameAlb"  style="text-align:left; float:left; width: 300px; ">Introduceti numele albumului: </label> <input type="text" name="renameAlb" style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:300px; border-radius:5px; top:10px; position:relative " />
	</p>
	<p style="position:relative; text-align:center; top:20px;"><input class="btn" type="submit" value="Redenumiti" name="submit" /></p>
	</form>
	</div>

</div>
<?php
	endif; 
	if((!isset($_FILES['uptema'])||((isset($response))))&&(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == '/tutorial.php')):
?>
<div id="tema" class="modalDialog">
		<div style="width:500px; height:250px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>"  . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>

		<span style="position: relative; float:left; left:10px;top:10px">
	<form id="uploadPhoto" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <p><input type="file" name="uptema" style="position:absolute; float:right;"/></p>
      
      	<p style="padding-bottom:5px;"><label for="description"  style="position:relative; left:40px; float:left;">Introduceti o descriere: </label>
      	<textarea rows="6" cols="47" id="description" name="description" style="position:relative; left:-15px;"></textarea></p>
      	<p style="position:relative; float:left;left:40px;"><label for="description" >Selecteaza o categorie: </label></p>
      	<p style="float:right;">
      	<select name="selectCateg" style="position:relative; float:right; right:70px;width:140px">
      	  <?php 
		  $categ=$membership->get_Categories();
//		  echo '<option value="1">' . $categ[1] .'</option>';
		  $i=1;
		  foreach ($categ as $categOption) {
		  	echo '<option value=' . $i . '>'. $categOption .'</option>';
		  	$i++;
		  }
		  ?>
		</p>
		</select>
      	<p style="position:relative; top:40px;float:right;right:20px;"><input class="btn" type="submit" value="Uploadeaza Poza" name="submit" /></p>
    </form>
				</div>
</div>
<?php
	endif; 
	if((!isset($_FILES['uptema'])||((isset($response))))&&(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == '/contests.php') && (isset($_SESSION["user_id"]))):
?>
<div id="contest" class="modalDialog">
		<div style="width:500px; height:250px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>"  . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>

		<span style="position: relative; float:left; left:10px;top:10px">
	<form id="uploadPhoto" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <p><input type="file" name="contestUp" style="position:absolute; float:right;"/></p>
      
      	<p style="padding-bottom:5px;"><label for="description"  style="position:relative; left:40px; float:left;">Introduceti o descriere: </label>
      	<textarea rows="6" cols="47" id="description" name="description" style="position:relative; left:-15px;"></textarea></p>
      	<p style="position:relative; float:left;left:40px;"><label for="description" >Selecteaza o categorie: </label></p>
      	<p style="float:right;">
      	<select name="selectCateg" style="position:relative; float:right; right:70px;width:140px">
      	  <?php 
		  $categ=$membership->get_Categories();
//		  echo '<option value="1">' . $categ[1] .'</option>';
		  $i=1;
		  foreach ($categ as $categOption) {
		  	echo '<option value=' . $i . '>'. $categOption .'</option>';
		  	$i++;
		  }
		  ?>
		</p>
		</select>
      	<p style="position:relative; top:40px;float:right;right:20px;"><input class="btn" type="submit" value="Uploadeaza Poza" name="submit" /></p>
    </form>
				</div>
</div>
<?php endif; ?>
<?php if((!isset($_FILES['uptema'])||((isset($response))))&&(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == '/admin.php') && (isset($_SESSION["user_id"]))):?>
<div id="contest" class="modalDialog" >
	<div style="width:370px; height:200px; top:100px;">
	<a title="Close" class="close">X</a>
	<form id="addContest" method="post" action="">
	<p class="modalP">
	<label for="addContest"  style="text-align:left; float:left; width: 300px; ">Introduceti datele concursului: </label> <textarea rows="8" cols="47" id="contest" name="contest" style="position:relative; left:-15px;border-radius:10px"></textarea>
	</p>
	<p style="position:relative; text-align:center; top:-20px;"><input class="btn" type="submit" value="Adauga" name="submit" /></p>
	</form>
	</div>

</div>
<?php endif;?>