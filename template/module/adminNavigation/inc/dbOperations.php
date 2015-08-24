<?php

include("../../../../include/classes/main/db.class.php");


$op = $_POST['operation'];

$db = new db;

if($op == "add"){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$position = $_POST['position'];
	$parent = $_POST['parent'];
	$admin = $_POST['admin'];
	$visible = $_POST['visible'];

	$col[] = "id";
	$col[] = "name";
	$col[] = "link_id";
	$col[] = "position";
	$col[] = "parent";
	$col[] = "admin";
	$col[] = "visible";

	$var[] = $id;
	$var[] = $name;
	$var[] = $link;
	$var[] = $position;
	$var[] = $parent;
	$var[] = $admin;
	$var[] = $visible;

	//db::setDebug(2);

	if($db->insert("navigation", $col, $var)){
		echo '0';
	}else{
		echo '1';
	}

}elseif($op == "edit"){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$position = $_POST['position'];
	$parent = $_POST['parent'];
	$admin = $_POST['admin'];
	$visible = $_POST['visible'];


		if($admin == "")
			$admin = 0;
		
	if($db->update("navigation", "name='".$name."', link_id='".$link."', position='".$position ."', parent='".$parent ."',admin='".$admin."',visible='".$visible."'"," id = '".$id."'")){
		echo '0';
	}else{
		echo '1';
	}

}elseif($op == "delete"){

	$id = $_POST['id'];

	$db->delete("navigation", "id = '".$id."'");


}

?>