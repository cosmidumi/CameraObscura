	<?php
if ($_SESSION['username']==''):
	?>
	<div id="loginModal" class="modalDialog">
		<div style="width:500px; height:130px">
		<a title="Close" class="close">X</a>
					<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>" . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>
		<span style="position: relative; float:left; left:10px;top:10px">
			<form id="login" method="post" action="">
						<p style="position:relative; font-size:19px; padding-bottom:30px;">
							<label for="username" style="text-align:right; float:left;width:100px">Email:&nbsp;&nbsp;&nbsp;</label> <input type="text" name="username" style="background-color:#fffff;border:1px solid #dbdbdb; border-radius:5px; float:left; width:200px">
							
	
						</p>
						<p style="position:relative; font-size:19px">
							<label for="pwd" style="text-align:right; float:left; width: 100px">Parola: &nbsp;</label> <input type="password" name="pwd"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px;">
						</p>
							<span style="position: relative;float: left;left: 30px; padding-top:10px;">
						<input type="checkbox" name="vehicle" value="Bike" style="position:relative; top:2px;" >&nbsp; Tine-ma minte<br>
						</span>
						<ul id="loginUL"style="display:inline; float:right; position:relative; left:170px;top:-73px;">
							<li><input class="btn" type="submit" value="Login" name="submit">
							</li>
							<li><input class="btn" type="submit" value="Login" name="submitfb">
							</li>
							<li><input class="btn" type="submit" value="Login" name="submitgp">
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
						<p style="position:relative; font-size:19px; padding-bottom:30px;">
							<label for="usernamereg" style="text-align:left; float:left;width:200px;">Email:</label> <input type="text" name="usernamereg" style="background-color:#fffff;border:1px solid #dbdbdb; border-radius:5px; float:left; width:200px;">
							
	
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="pwdreg" style="text-align:left; float:left; width: 200px;">Parola:</label> <input type="password" name="pwdreg"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px; ">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px; ">
							<label for="cnf" style="text-align:left; float:left; width: 200px">Confirmarea Parolei: </label> <input type="password" name="cnf"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px;">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="firstname" style="text-align:left; float:left; width: 200px; ">Nume: </label> <input type="text" name="firstname"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px; ">
						</p>						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="lastname" style="text-align:left; float:left; width: 200px; ">Prenume: </label> <input type="text" name="lastname"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px; ">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="adresa" style="text-align:left; float:left; width: 200px; ">Adresa: </label> <input type="text" name="adresa"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px; ">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="descriere" style="text-align:left; float:left; width: 200px;">Descriere: </label> <input type="text" name="descriere"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px; ">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="camera" style="text-align:left; float:left; width: 200px;">Camera: </label> <input type="text" name="camera"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px;">
						</p>
						<p style="position:relative; font-size:19px;padding-bottom:30px;">
							<label for="obiectiv" style="text-align:left; float:left; width: 200px;">Obiectiv: </label> <input type="text" name="obiectiv"style="float:left;background-color:#fffff;border:1px solid #dbdbdb;width:200px; border-radius:5px;">
						</p><br/>
						<input class="btn" type="submit" value="Inregistrare" name="submit">
							
						</span>
						</form>
				</div>
	</div>

<?php
	endif; 
		if(!isset($_FILES['fupload'])||((isset($response))&&(isset($_FILES['fupload'])))):
?>
<div id="upload" class="modalDialog">
		<div style="width:500px; height:250px">
		<a title="Close" class="close">X</a>
			<?php if(isset($response)) echo "<h4 class='alert' style='color:red; padding-bottom:10px;'>"  . $response . "</h4>"; ?>
			<?php if(!isset($response)) echo "<p style='padding-bottom:10px;'><br/></p>"?>

		<span style="position: relative; float:left; left:10px;top:10px">
	<form id="uploadPhoto" enctype="multipart/form-data" method="post" action="">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        <p><input type="file" name="fupload" style="position:absolute; float:right;"/></p>
      
      	<p style="padding-bottom:20px;"><label for="description"  style="position:relative; left:40px; float:left;">Introduceti o descriere: </label>
      	<textarea rows="6" cols="47" id="description" name="description" style="position:relative; left:-15px;"></textarea></p>
      	<p style="padding-bottom:20px; position:relative; top:-20px;"><label for="description"  style="position:relative; left:40px; float:left;">Selecteaza o categorie: </label>
      	<select name="selectCateg" style="position:relative; float:right; right:70px;">
      	  <?php 
		  $categ=$membership->get_Categories();
//		  echo '<option value="1">' . $categ[1] .'</option>';
		  $i=1;
		  foreach ($categ as $categOption) {
		  	echo '<option value=' . $i . '>'. $categOption .'</option>';
		  	$i++;
		  }
		  ?>
		</select>
      	<p style="position:relative; float:right; left:50px;"><input class="btn" type="submit" value="Uploadeaza Poza" name="submit" /></p>
    </form>
				</div>
</div>
	<?php
endif; 
?>
<div id="viewImage" class="modalDialog" >
	<div id="viewImageDiv" style="width:800px; height:800px">
		<a title="Close" class="close">X</a>
		<div id="imageWrapper"style="position: relative; border: 1px solid transparent; left:-10px; vertical-align:middle;padding:0; margin:0; text-align:center; position: relative; background:transparent; float:left" >
			<img id="modalImage" style="vertical-align:middle; border-radius:10px"/>
		</div>
		<div id="commentWrapper"style="position: relative; border: 1px solid transparent; vertical-align:middle;padding:0; margin:0; text-align:center; position: relative; background:grey; opacity:0.1;background-image:url('/images/pattern.png'); float:left" >
		</div>
	</div>
</div>

