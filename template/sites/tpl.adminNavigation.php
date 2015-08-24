<?php


TemplateCore::noTplCacheing();

if(Core::LoggedIn()){

$tm = new TemplateModul('adminNavigation');

	
return $tm->loadModul('navigation', "", true);
}else{
	Core::adminPageError();
}
?>