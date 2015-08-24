<?php

include("../../../../include/classes/main/db.class.php");


$op = $_POST['operation'];

$db = new db;

if($op == "edit"){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	

	
	if($db->update("content", "title='".$title."', content='".$text."'"," id = '".$id."'")){
		echo '0';
	}else{
		echo '1';
	}



}elseif($op == "add"){

	$title = $_POST['title'];
	$text = $_POST['text'];
	
	$col[] = "title";
	$col[] = "content";

	$var[] = $title;
	$var[] = $text;
	
	//db::setDebug(2);
	
	if($db->insert("content", $col, $var)){
		if($db->insert("navigation_links", array("link", "type", "content_id", "titel", "tpl"), array("content", "1", $db->getLastId(), $title, "1"))){
			echo '0';
		}
	}else{
		echo '1';
	}
	
	
	
}elseif($op == "delete"){

	$id = $_POST['id'];

	$db->delete("content", "id = '".$id."'");
	$db->delete("navigation_links", "content_id = '".$id."'");


}


?>