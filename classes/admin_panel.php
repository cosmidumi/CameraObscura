<ul class="top-bar-menu" style="width:900px; left:200px">
	<li title="Acasa">
		<a href="index.php">
			<p> Acasa </p>
			<img class="rotation" src="/images/icons/homebig.png">
		</a>
		<span class="topBarSpan">|</span>
	</li>
	<li title="Utilizatori">
		<a href="/profile.php?user=<?php echo $_SESSION['user_id']?>" />
			<p> Utilizatori </p>
			<img class="rotation" src="/images/icons/settingsbig.png">
		</a>
		<span class="topBarSpan">|</span>
	</li>
		<li title="Concursuri">
		<a href="#contest">
			<p> Concursuri </p>
			<img class="rotation" src="/images/icons/upload.png">
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
</ul>