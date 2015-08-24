<?php

class PageBuilder{

	private $_page;

	public function __construct($page = null){
	
		if($page !== null){
			$this->_page = $page;
			
			}
		else 
			return false;
		}
	
	private static function saveCss($path, $tempFile){
		
	$string= self::getPHPContent($path);
						
		$f= fopen($tempFile, "wb");
		fwrite($f, $string);
		fclose($f);

	}

	private static function getPHPContent($path)
	{

		ob_start(); 
		$i = include $path; 
		$string = ob_get_contents(); 
		ob_end_clean(); 
		
		return $string;

	}	
	private static function parseCssCache($path, $page){
	
		$tempFile = 'template_cache/css/cache.'.$page.'.css';
	
		if (file_exists ($path)) {
			if(Core::$cssCaching){
				if(file_exists($tempFile)){
					if(strtotime("-1 minutes") > filemtime($tempFile)){
						self::saveCss($path, $tempFile);
					}
				}else{
					self::saveCss($path, $tempFile);
				}
				
				return "<link href='".$tempFile."' rel='stylesheet' type='text/css'>";
				
			}else{
				return "<style>".self::getPHPContent($path)."</style>";
			}
			
		}
		return 0;
	}
		
		
	public function requiredHead(){
		echo self::parseCssCache("required/head.php", "head");
	}
	
	public function CSShead(){
			
		echo self::parseCssCache('template/module/'.$this->_page.'/mod.head.'.$this->_page.'.php', $this->_page);
			
	}
	
	public function JShead(){
	
			if (file_exists ('template/module/'.$this->_page.'/mod.JShead.'.$this->_page.'.php')) {
				require_once 'template/module/'.$this->_page.'/mod.JShead.'.$this->_page.'.php';
			}
	}
	
	public function JSIncludes(){
	
			if (file_exists ('template/module/'.$this->_page.'/mod.JSInclude.'.$this->_page.'.html')) {
				require_once 'template/module/'.$this->_page.'/mod.JSInclude.'.$this->_page.'.html';
			}
	}
	
	public function beforeContent(){
	
			if (file_exists ('template/module/'.$this->_page.'/mod.beforeContent.'.$this->_page.'.php')) {
				require_once 'template/module/'.$this->_page.'/mod.beforeContent.'.$this->_page.'.php';
			}
	}
	
	
	public static function loadHeadByPath($head, $path){
	
		echo self::parseCssCache($path.'/mod.head.'.$head.'.php', $head);
			
	}
	
	
		public static function loadJSHeadByPath($head, $path){
	
			if (file_exists ($path.'/mod.JShead.'.$head.'.php')) {
				require_once  $path.'/mod.JShead.'.$head.'.php';
			}
	}
	
}

?>