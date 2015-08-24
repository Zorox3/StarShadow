<?php


TemplateCore::noTplCacheing();

if(Core::LoggedIn()){

$tm = new TemplateModul('adminTeaser');

	
return $tm->loadModul('teaser', "", true);
}else{
	Core::adminPageError();
}
?>