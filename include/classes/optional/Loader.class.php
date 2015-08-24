<?php

class Loader{

	private static $staticDelay= 240;
	private static $delay = 0;

	public static function createLoader($content="", $color="", $time=""){
		
		if($content == ""){
			switch($color){
				case 'blue': 
					$content= "";
				break;
				
				case 'red':
					$content="Bad";
				break;
				
				case 'green':
					$content="Good";
				break;
			}
		}
		
		$loader = '<div class="loader '.$color.'" data-content="'.$content.'" data-time="'.$time.'">';
		
		for($i = 1; $i <=5; $i++){
		
			$loader.= '<div class="circle '.$color.'" style="animation-delay: '.(self::$delay + ($i * self::$staticDelay)).'ms;
																			-webkit-animation-delay: '.(self::$delay + ($i * self::$staticDelay)).'ms;"></div>';
		
		}
		
		$loader .= '</div>';
	
		self::$delay += 500;
	
		return $loader;
	
	}

}

?>