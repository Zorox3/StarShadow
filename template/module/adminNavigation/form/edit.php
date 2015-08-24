<?php
define('ROOT_PATH', str_repeat("../",count(explode("/",$_SERVER["PHP_SELF"]))-2));

include(ROOT_PATH."include/classes/main/db.class.php");

$id = $_GET['id'];

$db = new db;

db::setAutoMergeFollow();
$n = $db->select("navigation","*","id = '".$id."'");

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

echo '<div style="width: 800px; padding: 10px;">';

echo '<input type="hidden" value="'.$id.'" id="id" name="id" />';

echo '<h1>'.$n['name'].'</h1>';

echo '<fieldset>';

echo '<legend>Allgemein</legend>';
echo 'Name&nbsp;<input type="text" value="'.$n['name'].'" id="name" name="name" /><br /><br />';


echo 'Verlinkung&nbsp;<select name="link" id="link">';

	if($n['link_id'] == 0)
	$selected = 'selected';

	echo '<option value="0" '.$selected.'>--Keinen Link--</option>';

    echo '<optgroup label="Public">';
	$allLink = $db->select("navigation_links", "*", "extern = 0 AND level = 0");
	foreach($allLink as $al){
		$template = "";
		if($al['id'] == $n['link_id'])
			$selected = 'selected';
		else
			$selected = '';
	
		if($al['tpl'] == '1')
			$template = " (Contentseite)";
	
		echo '<option value="'.$al['id'].'" '.$selected.'>'.$al['titel'].$template.'</option>';
	}
	
	echo '</optgroup>';
	
	
	 echo '<optgroup label="Moderator">';
	$allLink = $db->select("navigation_links", "*", "extern = 0 AND level = 1");
	foreach($allLink as $al){
		$template = "";
		if($al['id'] == $n['link_id'])
			$selected = 'selected';
		else
			$selected = '';
	
		if($al['tpl'] == '1')
			$template = " (Contentseite)";
	
		echo '<option value="'.$al['id'].'" '.$selected.'>'.$al['titel'].$template.'</option>';
	}
	
	echo '</optgroup>';
	
	
	
	    echo '<optgroup label="Administrator">';
	$allLink = $db->select("navigation_links", "*", "extern = 0 AND level = 2");
	foreach($allLink as $al){
		$template = "";
		if($al['id'] == $n['link_id'])
			$selected = 'selected';
		else
			$selected = '';
	
		if($al['tpl'] == '1')
			$template = " (Contentseite)";
	
		echo '<option value="'.$al['id'].'" '.$selected.'>'.$al['titel'].$template.'</option>';
	}
	
	echo '</optgroup>';
	
echo '</select><br /><br />';


echo 'Unterordnung&nbsp;<select name="parent" id="parent">';

	if($n['parent'] == 0)
	$selected = 'selected';

	echo '<option value="0" '.$selected.'>--Hauptpunkt--</option>';

	$allNaviPoints = $db->select("navigation", "" , "id != '".$n['id']."'");
	foreach($allNaviPoints as $anp){
		
		if($anp['admin'] == 1){
			$admin = "(Admin)";
		}
		
		if($anp['id'] == $n['parent'])
			$selected = 'selected'; 
		else
			$selected = '';
	
		echo '<option value="'.$anp['id'].'" '.$selected.'>'.$anp['name'].' '.$admin.'</option>';
	}
echo '</select><br /><br />';

echo 'Position&nbsp;<input type="number" value="'.$n['position'].'" id="position" name="position" />';

echo '</fieldset>';

echo '<fieldset>';
echo '<legend>Administration</legend>';
if($n['admin'] == 1)
	$checkedA = 'checked="checked"';
	
if($n['visible'] == 1)
	$checkedV = 'checked="checked"';

echo 'Adminrechte &nbsp;<input type="checkbox" name="admin" id="admin" '.$checkedA.' value="1" /> <br /><br />';
echo 'Sichbarkeit &nbsp;<input type="checkbox"' .$checkedV.' value="1" id="visible" name="visible" />';
echo '</fieldset>';

if(isset($_GET['id'])){
	echo '<button onclick="NaviPoints.save()">Speichern</button>';
	echo '<button style="float:right;" onclick="NaviPoints.delete('.$_GET['id'].')">Löschen</button>';
}else{
	echo '<button onclick="NaviPoints.newPoint()">Erstellen</button>';
}
echo '</div>';

?>