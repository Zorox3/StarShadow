<div class="content">
	<div class="content_titel">Server Status</div>
	
	<div class="text_block">
		<?php
		$s2 = Status::isOnlineIP("37.120.175.153","80", "Host Server I"); 
		echo '<div class="loader_div">' .$s2['loader'].'</div><div class="servername">'.$s2['name'].'</div><br />';
		
		$s2 = Status::isOnlineIP("176.9.7.241","10011", "Host Server II"); 
		echo '<div class="loader_div">' .$s2['loader'].'</div><div class="servername">'.$s2['name'].'</div><br />';
		?>
	</div>
	
	<div class="text_block">
		<?php
		$s2 = Status::isOnlineIP("37.120.175.153","10011", "Teamspeak Server"); 
		echo '<div class="loader_div">' .$s2['loader'].'</div><div class="servername">'.$s2['name'].'</div>';
		?>
	</div>

	<!--<div class="text_block">
		<?php
		//$s5 = Status::isOnlineIP("steamcommunity.com","80", "Steam Community"); 
		//echo '<div class="loader_div">' .$s5['loader'].'</div><div class="servername">'.$s5['name'].'</div><br />';
			
		//$s5 = Status::isOnlineIP("store.steampowered.com","80", "Steam Store"); 
		//echo '<div class="loader_div">' .$s5['loader'].'</div><div class="servername">'.$s5['name'].'</div>';
		
		
		Status::writeJson();
		
		?>
	</div>
	-->

</div>