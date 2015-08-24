<div class="content">
<div class="content_titel">Moderation: Navigation</div>

<div class="manuelSubNavi">
	<span>
		<a href="template/module/adminNavigation/form/edit.php" class="fancybox fancybox.ajax">
			<h2>Hinzufügen</h2>
		</a>
	</span>
</div>

<?php

$db = new db;

$navi = $db->select("navigation","*", "parent = 0 AND admin = '0'", "position");

echo "<ul class='allNavi'>";

foreach($navi as $nm){

echo "<li class='naviMainElement'>";
echo '<a href="template/module/adminNavigation/form/edit.php?id='.$nm['id'].'" class="fancybox fancybox.ajax">'.$nm['name']. '</a>';

$children = $db->select("navigation", "*", "parent = " . $nm['id'], "position");

	if(is_array($children)){
		echo "<ul>";
		foreach($children as $nc){
			echo "<li class='naviSubElement'>";
			echo '&#x21B3; <a href="template/module/adminNavigation/form/edit.php?id='.$nc['id'].'" class="fancybox fancybox.ajax">'.$nc['name']. '</a>';
			echo "</li>";
		}	
		echo "</ul>";		
	}
echo "</li>";
}
echo "</ul>";


?>

<br /><br />


<?php

$navi = $db->select("navigation","*", "parent = 0 AND admin = '1'", "position");

echo "<ul class='allNavi'>";

foreach($navi as $nm){

$sichtbar = $nm['visible'] == 0 ? " (Unsichtbar)" : "";

echo "<li class='naviMainElement'>";
echo '<a href="template/module/adminNavigation/form/edit.php?id='.$nm['id'].'" class="fancybox fancybox.ajax">'.$nm['name'].$sichtbar. '</a>';

$children = $db->select("navigation", "*", "parent = " . $nm['id'], "position");

	if(is_array($children)){
		echo "<ul>";
		foreach($children as $nc){
		
			if($nm['visible'] != 0)
				$sichtbar = $nc['visible'] == 0 ? " (Unsichtbar)" : "";
			
			echo "<li class='naviSubElement'>";
			echo '&#x21B3; <a href="template/module/adminNavigation/form/edit.php?id='.$nc['id'].'" class="fancybox fancybox.ajax">'.$nc['name'].$sichtbar. '</a>';
			echo "</li>";
		}	
		echo "</ul>";		
	}
echo "</li>";
}
echo "</ul>";








?>
</div>
