<?php
function __autoload ($class) {
	
	

	
	//Unterordner
	$subClass = preg_replace('/_/', '/', $class);

	try{	
	   //Sonderzeichen
		if (strpos ($class, '.') !== false || strpos ($class, '/') !== false || strpos ($class, '\\') !== false || strpos ($class, ':') !== false) {
			throw new Exception('<br /> Klasse nicht richtig benannt. Keine Sonderzeichen!<br /> '); 
		}
	
		if (file_exists ('include/classes/main/'.$class.'.class.php')) {
			include_once 'include/classes/main/'.$class.'.class.php';
		}
		elseif (file_exists ('include/classes/main/'.$subClass.'.class.php')) {
			include_once 'include/classes/main/'.$subClass.'.class.php';
		}
		elseif (file_exists ('include/classes/optional/'.$class.'.class.php')) {
			include_once 'include/classes/optional/'.$class.'.class.php';
		}
		elseif (file_exists ('include/classes/optional/'.$subClass.'.class.php')) {
			include_once 'include/classes/optional/'.$subClass.'.class.php';
		}
		else{
			throw new Exception('<br /> Klasse wahrscheinlich nicht richtig benannt. Klasse nicht gefunden<br /> '); 
		}
	}
	catch(Exception $e){
		echo $e->getMessage();
		echo "<br /> Fehler in Datei: ".$class.".class.php oder ".$subClass.".class.php<br />" ;	 
	}
}
?>