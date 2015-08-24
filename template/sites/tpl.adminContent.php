<?php


TemplateCore::noTplCacheing();

if(Core::LoggedIn()){

$tm = new TemplateModul('adminContent');

	
return $tm->loadModul('content', "", true);
}else{
	Core::adminPageError();
}
?>