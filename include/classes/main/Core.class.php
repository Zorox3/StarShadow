<?php

class Core{

	//MAIN CONFIG PATH
	public static $mainConfigPath = "include/config/mainConfig.php";

	public static $mainConfig = null;
	
	//private static $db_f;
	private static $adminLogin;
	
	private static $data;
	
	
	/**
	* DEFAULT CONFIG SETTINGS IF NOT SET IN MAIN CONFIG OR CHANGED VIA FUNCTION
	*/
	public static $cssCaching = true;
	
	
	
	/**
	* INIT
	*/
	
	//LOADS DEFINES AND OTHER FUNCTIONS WITH PREPERATIONS
	public static function init(){
		
		//self::$db_f = new db("forum");
		//self::$adminLogin = self::$db_f->select("mybb_sessions", "*", "uid = 6");
		define('ROOT_PATH', str_repeat("../",count(explode("/",$_SERVER["PHP_SELF"]))-2));
		
		self::prepareData();

		/*
		if(self::$data['l'] = 1){
			$_SESSION['username'] = 'admin';
			$_SESSION['loggedIn'] = 1;
		}
		*/
		
	}
	

	/**
	* PREPERATIONS
	*/
	
	//LOAD THE CONFIG DATA (Only mainConfig; extend to array)
	public static function loadConfig($path){
	
		$jsonContent = file_get_contents($path);
		
		$json = json_decode($jsonContent, true);
	
		self::$mainConfig = $json;
	
	}	
	
	
	
	//SPLITS THE $_GET['data'] 
	private static function prepareData(){
	
		$data = explode(";",$_GET['data']);
		foreach($data as $d){
		$t = explode("=", $d);
		
			if(isset($t[1])){
			
				self::$data[$t[0]] = $t[1];
			
			}else{
			
				self::$data[] = $t[0];
				
			}
		}
	}

	
	
	
	/**
	* CONFIGS
	*/
	
	//SET THE CSS CACHING FEATURE
	public static function setCssCaching($set){
		self::$cssCaching = ($set == "true" ? true : false);
	}


	
	/**
	* LOGIN
	*/
	
	//IS THE ACTUAL PAGE IN THE ADMIN AREA
	public static function inAdmin(){
	
		if(isset(self::$data[0]) && self::$data[0] == "admin"){
			return true;
		}
		return false;
	}
	
	
	// CHECKS IF SOMEONE IS LOGGED IN ( NEEDS MORE WORK )
	public static function loggedIn(){

		if($_SESSION['username'] == "admin" && $_SESSION['loggedIn'] && isset($_SESSION['username'], $_SESSION['loggedIn'])){
			return true;
		}
		else{
			return false;
		}
	}
	
	
	

	
	/**
	* ERROR MESSAGES
	*/
	
	//ERROR FOR NOT BEING LOGGED IN ON AN ADMIN PAGE
	public static function adminPageError(){
		echo '<div style="border: 1 solid black; width: 500px; background: rgb(150,70,70); text-align: center; padding: 20px; margin: 15px auto;">Keine Berechtigung für diese Seite<br /><a href="index.html" style="color: black">Zurück zur Startseite</a></div>';
	}
	
	//CUSTOM ERROR MESSAGE
	public static function error($msg){
		return  '<div style="border: 1 solid black; width: 500px; background: rgb(150,70,70); text-align: center; padding: 20px; margin: 15px auto;">'.$msg.'</div>';
	}
	
	
	//CLASS END
}


?>