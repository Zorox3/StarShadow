<?php
$cache = "../../template_cache";
$cache2 = "../../template_cache/css";

$handle=opendir ($cache);
while ($datei = readdir ($handle)) {
	if($datei != "." && $datei != "..")
		unlink($cache."/".$datei);
}
closedir($handle);



$handle=opendir ($cache2);
while ($datei = readdir ($handle)) {
	if($datei != "." && $datei != "..")
		unlink($cache."/".$datei);
}
closedir($handle);





?>