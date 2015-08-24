<?php


$mod = $_GET['content'];


$mod_tiles = explode(";", $mod);

$tm = new TemplateModul('content');

$db = new db;




foreach($mod_tiles as $t){
	$t = explode(".", $t);
	$type = $t[0];
	$content = $t[1];
	
	
	$id = hex2bin($content)/0xFA;
	
	db::setAutoMergeFollow();
	$content = $db->select("content", "*", "id = '". $id ."'");
	
	switch ($type){
		case 'text':
			return $tm->loadModul('textContent', $content);
		break;
		default: echo '<div style="border: 1 solid black; width: 500px; background: rgb(150,70,70); text-align: center; padding: 20px; margin: 15px auto;"><b> Es konnte kein Content zu dieser Seite gefunden werden!</b></div>';
	}
}





?>

