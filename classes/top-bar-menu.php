<?php
if ( ( $_SESSION['username']!='' ) && ( $_GET['status']!='loggedout' ) ):
?>
<ul class="top-bar-menu" style="width:900px;">
	<li title="Acasa">
		<a href="index.php">
			<p> Acasa </p>
			<img class="rotation" src="/images/icons/homebig.png">
		</a>
		<span class="topBarSpan">|</span>
	</li>
	<li title="Setari">
		<a href="/profile.php?user=<?php echo $_SESSION['user_id']?>" />
			<p> Setari </p>
			<img class="rotation" src="/images/icons/settingsbig.png">
		</a>
		<span class="topBarSpan">|</span>
	</li>
		<li id="uploadTop" title="Upload">
		<a id="uploadBtn" href="#upload">
			<p> Upload </p>
			<img class="rotation" src="/images/icons/upload.png">
			</a>
		<span class="topBarSpan">|</span>
		</li>
	<li title="Delogare">
		<a href="?status=loggedout">
			<p> Delogare </p>
			<img class="rotation" src="/images/icons/signoutbig.png">
			</a>
		<span class="topBarSpan">|</span>
		</li>
	<li title="Cautare">
		<a>
			<input  type="text" name="search" value="cauta" id="searchInput"/>
			<img id="searchClick" class="rotation" src="/images/icons/search.png">
			</a>
		</span>
	</li>
	<?php if ($membership->get_Type($_SESSION['user_id'])=='admin'):?>
	<li title="Delogare">
		<a href="admin.php">
			<img class="rotation" src="/images/icons/briefcase.png">
			</a>
	</li>
	<?php endif;?>
</ul>
<?php
	else :
?>
<ul class="top-bar-menu">
	<li title="Acasa">
		<a href="index.php">
			<p> Acasa </p>
			<img class="rotation" src="/images/icons/homebig.png">
		</a>
		<span class="topBarSpan">|</span>
		</li>
	<li title="Logare">
		<a href="#loginModal">
			<p> Logare </p>
			<img class="rotation" src="/images/icons/signinbig.png">
		</a>
		<span class="topBarSpan">|</span>
	</li>
	<li title="Inregistrare">
		<a href="#signupModal">
			<p> Inregistrare </p>
			<img class="rotation" src="/images/icons/signupbig.png">
		</a>
		<span class="topBarSpan">|</span>
	</li>
</ul>
<?php endif; ?>
