<?php

	TemplateCore::noTplCacheing();

	$tm = new TemplateModul('login');
	
	
	
	return $tm->loadModul('login', "", true);

?>