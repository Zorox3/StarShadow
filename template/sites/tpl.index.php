<?php

//TemplateCore::noTplCacheing();

$tm = new TemplateModul($_GET['page']);


$news = new NewsTicker;



$teaser = $news->getTeaser();
$teaser['img'] = Core::$mainConfig['css']['defaultImagePath']."top_images/top_image02.jpg";
	
	$return .=  $tm->loadModul("teaser", $teaser); 

return $return; 
?>