<?php


$db = new db();

$planet = $db->select("planets", "*", "player_id = '1'");

$prod_level = ResourceManagement::getProdLevel(1);

$prod_formel = ResourceManagement::getProdFormel(1);
$storage_formel = ResourceManagement::getMaxStorage(1);
?>


<div id="overview">

	<div id="overviewPlanetName">
		<h2><?php echo $planet['name']; ?></h2>
	</div>
	
	<div id="selectedPlanet">
		<img src="images/planets/<?php echo $planet['image']; ?>.png" height="50px">
	</div>
	<br />
	<table id="resourceTable">
		
		<tr>
			<th style="border: 0; background: transparent;"></th>
			<th>Stufe</th>
			<th>Produktion<br /><small> pro Stunde</small></th>
			<th>Produktion <br /><small>pro Tag</small></th>
			<th>Gelagert</th>
			<th>Lager</th>
		</tr>	
	
		<tr>
			<td>Metall</td> 
			<td><?php echo $prod_level['m']; ?></td>
			<td><?php echo round($prod_formel['m'],0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo round(24*$prod_formel['m'],0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo  round($planet['metal'],0,PHP_ROUND_HALF_DOWN) ;?></td> 
			<td><?php echo round($storage_formel['m'],0,PHP_ROUND_HALF_DOWN); ?></td>
		</tr>
		
		<tr>
			<td>Kristal</td>
			<td><?php echo $prod_level['c']; ?></td>
			<td><?php echo round($prod_formel['c'],0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo round($prod_formel['c']*24,0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo  round($planet['crystal'],0,PHP_ROUND_HALF_DOWN) ;?></td>
			<td><?php echo round($storage_formel['c'],0,PHP_ROUND_HALF_DOWN); ?></td>
		</tr>
		
		<tr>
			<td>Deuterium</td>
			<td><?php echo $prod_level['d']; ?></td>
			<td><?php echo round($prod_formel['d'],0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo round($prod_formel['d']*24,0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo  round($planet['deuterium'],0,PHP_ROUND_HALF_DOWN) ;?></td>
			<td><?php echo round($storage_formel['d'],0,PHP_ROUND_HALF_DOWN); ?></td>
		</tr>
		
		<tr>
			<td>Geld</td>
			<td><?php echo $prod_level['mo']; ?></td>
			<td><?php echo round($prod_formel['mo'],0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo round($prod_formel['mo']*24,0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo  round($planet['money'],0,PHP_ROUND_HALF_DOWN) ;?></td>
			<td><?php echo round($storage_formel['mo'],0,PHP_ROUND_HALF_DOWN); ?></td>
		</tr>
		
		<tr>
			<td>Energie</td>
			<td><?php echo $prod_level['e']; ?></td>
			<td><?php echo round($prod_formel['e'],0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo round($prod_formel['e']*24,0,PHP_ROUND_HALF_DOWN); ?></td>
			<td><?php echo  round($planet['energy'],0,PHP_ROUND_HALF_DOWN) ;?></td>
			<td><?php echo round($storage_formel['e'],0,PHP_ROUND_HALF_DOWN); ?></td>
		</tr>
	
	</table>
	
	<br />
</div>