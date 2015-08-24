<div class="content">
<div class="content_titel">Moderation: Navigation</div>

<div class="manuelSubNavi">
	<span>
		<a href="template/module/adminContent/form/edit.php" class="fancybox fancybox.ajax">
			<h2>Hinzufügen</h2>
		</a>
	</span>
</div>

<?php

$db = new db;

$content = $db->select("content");

echo "<ul class='allNavi'>";

foreach($content as $c){

echo "<li class='naviMainElement'>";
echo '<a href="template/module/adminContent/form/edit.php?id='.$c['id'].'" class="fancybox fancybox.ajax">'.$c['title']. '</a>';
echo "</li>";
}
echo "</ul>";


?>

</div>
