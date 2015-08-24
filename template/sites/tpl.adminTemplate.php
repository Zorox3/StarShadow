<?php


TemplateCore::noTplCacheing();

if(Core::LoggedIn()){

$tm = new TemplateModul('adminTemplate');

	
return $tm->loadModul('template', array("test" => 4, "test2" => "Hallo wie geht es dir den so Heute", "test3" => "dir"), false);
}else{
	Core::adminPageError();
}
?>