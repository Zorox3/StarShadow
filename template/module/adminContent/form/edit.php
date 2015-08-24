<script>
$( document ).ready(function(){
	 tinymce.init({
				selector: "#text"
	 });
 });
 </script>


<?php
define('ROOT_PATH', str_repeat("../",count(explode("/",$_SERVER["PHP_SELF"]))-2));
include(ROOT_PATH."include/classes/main/db.class.php");




$id = $_GET['id'];

$db = new db;

db::setAutoMergeFollow();
$c = $db->select("content","*","id = '".$id."'");

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

echo '<div style="width: 800px; padding: 10px;">';

echo '<input type="hidden" value="'.$id.'" id="id" name="id" />';

echo '<h1>'.$c['title'].'</h1>';

echo '<fieldset>';

echo '<legend>Allgemein</legend>';
echo 'Name&nbsp;<input type="text" value="'.$c['title'].'" id="title" name="title" /><br /><br />';

echo '</fieldset>';

echo '<fieldset>';
echo '<legend>Text</legend>';
echo '<textarea style="height: 300px" id="text">';
echo $c['content'];
echo '</textarea>';
echo '</fieldset>';

if(isset($_GET['id'])){
	echo '<button onclick="Content.save()">Speichern</button>';
	echo '<button style="float:right;" onclick="Content.delete('.$_GET['id'].')">Löschen</button>';
}else{
	echo '<button onclick="Content.newPoint()">Erstellen</button>';
}
echo '</div>';

?>