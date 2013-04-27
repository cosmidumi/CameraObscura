<?php
if (($_SESSION['username']!='') && ($_GET['status']!='loggedout')):
?>
<ul class="nav">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Tutoriale</a>
				<ul>
					<li>
						<a href="#">Tutoriale Gratuite</a>
					</li>
					<li>
						<a href="#">Tutoriale PRO</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Poze</a>
				<ul>
					<li>
						<a href="#">Top</a>
					</li>
					<li>
						<a href="#">Pozele Mele</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Editare Poze</a>
				<ul>
					<li>
						<a href="#">a</a>
					</li>
					<li>
						<a href="#">Neons</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Ana</a>
				<ul>
					<li>
						<a href="#">Draguta</a>
					</li>
					<li>
						<a href="#">Sigur</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Despre</a>
			</li>
			<li>
				<a href="#">Log Out</a>
			</li>
</ul>
<?php
else :
	?>
<ul class="nav">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Tutoriale</a>
				<ul>
					<li>
						<a href="#">Tutoriale Gratuite</a>
					</li>
					<li>
						<a href="#">Tutoriale PRO</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Poze</a>
				<ul>
					<li>
						<a href="#">Top</a>
					</li>
					<li>
						<a href="#">Pozele Mele</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Editare Poze</a>
				<ul>
					<li>
						<a href="#">a</a>
					</li>
					<li>
						<a href="#">Neons</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Ana</a>
				<ul>
					<li>
						<a href="#">Draguta</a>
					</li>
					<li>
						<a href="#">Sigur</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">Despre</a>
			</li>
			<li>
				<a href="login.php">Log in</a>
			</li>
</ul>
<?php endif; ?>
