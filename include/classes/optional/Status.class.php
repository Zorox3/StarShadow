<?php

class Status{

	public static $jsonData = array();

	private static $serverString;
	private static $serverArray;
	private static $url;
	
	//OnlineStatus nach IP und Post
	public static function isOnlineIP($host,$port ="", $servername) {
	
		$a = 0;
		$b = 0;
	
		//print_r(self::loadJson($host.":".$port));
		$data = self::loadJson($host.":".$port);
		if($data !== false){
			
			self::$jsonData[$host.":".$port] = array('name' => $servername, 'port' => $port, 'status' => $data['status'], 'time' => $data['time'].'s'); 
			if($data['time'] > 120)
				return array('loader' => Loader::createLoader($data['status'] == 1 ? "Slow" : "Offline", $data['status'] == 1 ? "yellow" : "red", $data['time']), 'name' => $data['name']);
			else
				return array('loader' => Loader::createLoader($data['status'] == 1 ? "Online" : "Offline", $data['status'] == 1 ? "green" : "red"), 'name' => $data['name']);
		}else{
				$a = microtime (true);
				$socket = @fsockopen($host, $port, $errorNo, $errorStr, 3);
				$b = microtime (true);
				$time = round((($b-$a)*1000));
				self::$jsonData[$host.":".$port] = array('name' => $servername, 'port' => $port, 'status' => $errorStr ? 0 : 1, 'time' => $time); 
				
				
				
				
				if($socket){
					return array('loader' => Loader::createLoader("Online", "green"), 'name' => $servername);
				}
				else {
					return array('loader' => Loader::createLoader("Offline", "red"), 'name' => $servername);
				}
				
				
			}	
	} 
	
	private static $decode = false;
	public static function getContent(){
	
		if(!self::$decode)
			if(file_exists("extern/status.json"))
				self::$decode = json_decode(file_get_contents("extern/status.json"), true);
	
	}
	
	public static function loadJson($host){
			self::getContent();
			return is_array(self::$decode[$host]) ? self::$decode[$host] : false;

	}
		
	public static function writeJson(){	
		$json = json_encode(self::$jsonData);
		self::$decode = false;
		self::$jsonData = false;
		if(file_exists('extern/status.json')){
			if(strtotime("-1 minutes") > filemtime('extern/status.json')){
				unlink('extern/status.json');
			}
		}else{
		
			$f = fopen('extern/status.json', 'wb');
			fwrite($f, $json);
			fclose($f);
		
		}
			
	
		

		
		
	}	
}

?>