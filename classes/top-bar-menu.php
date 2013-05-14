<?php
if ( ( $_SESSION['username']!='' ) && ( $_GET['status']!='loggedout' ) ):
?>
		<ul class="top-bar-menu">
			<li>
				<a id ="home" href="index.php" title="Home"> <img src="/images/icons/home.png" /></a>
			</li>
			<li>
				<a id="settings" href="#" title="Settings"> <img src="/images/icons/settings.png" /></a>
			</li>
			<li>
				<a href="#upload" tile="Upload"><img src="/images/icons/plus.png"></a>
			</li>
			<li>
				<a id="signout" href="?status=loggedout" title="Sign Out"> <img src="/images/icons/signout.png" /></a>
			</li>
		</ul>
		<?php
	else :
?>
		<ul class="top-bar-menu">
			<li>
				<a id="home" href="index.php" title="Home"> <img src="/images/icons/home.png" /></a>
			</li>
			<li>
				<a id="signin" href="#loginModal" title="Sign In"> <img src="/images/icons/signin.png" /></a>
			</li>
			<li>
				<a id="signup" href="#signupModal" title="Sign up"> <img src="/images/icons/signup.png" /></a>
			</li>
		</ul><?php endif; ?>
