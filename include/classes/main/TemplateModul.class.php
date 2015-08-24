<?php
class TemplateModul {
	private static $toClose = array (
			"if" 
	);
	private static $functions;
	private static $delete = false;
	private static $repeat = false;
	private static $specialVars = null;
	
	private $_page;
	public function __construct($page) {
		self::$functions ["if"] = 0;
		if ($page !== null) {
			$this->_page = $page;
		} else {
			$this->_page = "index";
		}
	}
	
	/*
	 * LOADS A MODULE AND PLACES THE DATA
	 */
	public function loadModul($modul, $data_m = null, $functions = false) {
		return self::loadModulByPath ( $modul, './template/module/' . $this->_page, $data_m, $functions );
	}
	
	/*
	 * LOADS A MODULE AND PLACES THE DATA BY A GIVEN PATH
	 */
	public static function loadModulByPath($modul, $path, $data_m = null, $functions = false) {
		if (file_exists ( $path . '/mod.' . $modul . '.php' )) {
			if ($functions) {
				ob_start(); 
				include ($path . '/mod.' . $modul . '.php'); 
				$content = ob_get_contents(); 
				ob_end_clean(); 
				//require_once ($path . '/mod.' . $modul . '.php');
			} else {
				$content = file_get_contents ( $path . '/mod.' . $modul . '.php' );
				if (is_array ( $data_m )) {
				
				//Entfernt alle Kommentare
					$content = preg_replace( "/{\*(.*)\*}/isUe",
                                        "", $content );
										
					$content_lines = explode ( "\n", $content );
					$content_output = array ();
					
					foreach ( $content_lines as $count => $line ) {
						
						if ($line == " " || $line == "")
							continue;
						
						$f_start = strpos ( $line, "{!" );
						$f_end = strpos ( $line, "{/" );
						
						if ($f_start) {
							$func = substr ( $line, $f_start + 2, (strpos ( $line, " ", strpos ( $line, "{!" ) ) - $f_start) - 2 );
							
							if (! isset ( self::$functions [$func] ) && in_array ( $func, self::$toClose ))
								self::$functions [$func] = 0;
							
							$line_n = str_replace ( "{!" . $func, "", $line );
							//echo $func."<br />";
							switch ($func) {
								
								case "if" :
									$line = "";
									self::$delete = self::f_if ( $line_n, $data_m );
									break;
								
								case "out" :
									$line = self::f_out ( $line_n, $data_m );
									break;
									
								case "date" :
									$line = self::f_date ( $line_n );
									break;
									
								case "for" :
									$line = self::f_for ( $line_n, $data_m );
									self::$repeat = true;
									break;
							}
							
							if (in_array ( $func, self::$toClose )) {
								self::$functions [$func] ++;
							}
							
							$f_start = false;
						}
						
						if ($f_end) {
							$line = str_replace ( " ", "", $line );
							$nFunc = substr ( $line, $f_end + 2, - 2 );
							if (self::$functions [$nFunc] > 0) {
								$line = self::cleanFunctionEnd ( $line, $nFunc );
							}
						}
						
						if (! self::$delete)
							$content_output [] = $line;
					}
					
					$content = implode ( "\n", $content_output );
				}
			}
			
			return $content;
		} else {
			return Core::error ( $path . '/mod.' . $modul . '.php not found!' );
		}
	}
	
	/**
	 * **********************************************************
	 * *************************FUNCTIONS************************
	 * **********************************************************
	 */
	private static function cleanFunctionEnd($line, $func) {
		if (strpos ( $line, "{/" . $func . "}" )) {
			if ($func == "if") {
				self::$delete = false;
			}
			if ($func == "for") {
				self::$repeat = false;
			}
			self::$functions [$func] --;
			return str_replace ( "{/" . $func . "}", "", $line );
		} else {
			return $line;
		}
	}
	private static function prepareStatement($line, $data = null) {
		$line = substr ( $line, 2 );
		$line = substr ( $line, 0, - 2 );
		$para = explode ( " ", $line );
		
		$parameter = array ();
		
		foreach ( $para as $p ) {
			
			$t = explode ( "=", $p );
			
			//SAFETY RESONSES
			if($t[0] == "")
				continue;
			
			$var = isset ( $t [1] ) ? str_replace ( '"', "", $t [1] ) : true;	
			
			if($data !== null && $var !== true)
				if(strpos($var, "$") !== false){
				
					$var = str_replace("$", "", $var);
					$var = $data[$var];
					
				}
			
			$parameter [] = array (
					"name" => $t [0],
					"var" =>$var
			); 
			
		
		}
		return $parameter;
	}
	
	/**
	 * ---OUT--- *
	 */
	private static function f_out($line = "", $data) {
	
		if(self::$specialVars != null && is_array(self::$specialVars))
			$data = array_merge($data, self::$specialVars);
		
		
	
		foreach ( $data as $index => $d ) {
			if (strpos ( $index, "compress_" ) !== false) {
				$type = pathinfo ( $path, PATHINFO_EXTENSION );
				$img_data = file_get_contents ( $d );
				$base64Img = 'data:image/' . $type . ';base64,' . base64_encode ( $img_data );
				
				$line = str_replace ( 'name="' . $index . '"}', $base64Img, $line );
			} else {
				$line = str_replace ( 'name="' . $index . '"}', $d, $line );
			}
		}
		return $line;
	}
	
	/**
	 * ---DATE-----*
	 */
	 
	 
	 private static function f_date($line){
	 
		$para = self::prepareStatement ( $line );
		
		foreach($para as $p){
		
			switch($p['name']){
			
				case"format":
					$line =  date($p['var']);
				break;
			}
		
		}
	 
		return $line;
	 
	 }
	
	
	
	/**
	 * ---IF--- *
	 */
	private static function f_if($line, $data) {
		$para = self::prepareStatement ( $line , $data);
		
		$statement = false;
		
		$var = $para [0] ["var"];

		foreach ( $para as $p ) {

		
			switch ($p ['name']) {
				case 'isset' :
					$statement = isset ( $data [$var] );
					break;
					
				case 'contains': 
					$statement = strpos($data[$var],$p['var']) !== false ? true : false;
					self::$specialVars['c'] = $p['var'];
					break;
					
				case 'eq': 
					$statement = ($data[$var] == $p['var']);
					break;
					
				case 'neq': 
					$statement = ($data[$var] != $p['var']);
					break;
					
				case 'gt': 
					$statement = ($data[$var] > $p['var']);
					break;
					
				case 'gte': 
					$statement = ($data[$var] >= $p['var']);
					break;
					
				case 'lt': 
					$statement = ($data[$var] < $p['var']);
					break;
					
				case 'lte': 
					$statement = ($data[$var] <= $p['var']);
					break;
			}
		}
		if ($statement) {
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * ---FOR--- *
	 */
	private static function f_for($line, $data) {
		$para = self::prepareStatement ( $line );
		
		//print_r($para);
	}
}

?>