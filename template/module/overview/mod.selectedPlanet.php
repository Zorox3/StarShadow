<?php


$db = new db();

$planet = $db->select("planets", "*", "player_id = '1'");



?>


<div id="overview">

	<div id="selectedPlanetName">
		<h1><?php echo $planet['name']; ?></h1>
	</div>
	
	<div id="selectedPlanet">
		<img src="images/planets/<?php echo $planet['image']; ?>.png">
	</div>
	
</div>