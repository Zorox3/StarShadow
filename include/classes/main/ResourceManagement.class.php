<?php
class ResourceManagement{

	//Umwandeln einer DateTime() in Stunden
	public static function time_diff($dt1,$dt2){

	
		$y1 = (substr($dt1,0,4));
		$m1 = (substr($dt1,5,2));
		$d1 = (substr($dt1,8,2));
		$h1 = (substr($dt1,11,2));
		$i1 = (substr($dt1,14,2));
		$s1 = (substr($dt1,17,2));   

		$y2 =( substr($dt2,0,4));
		$m2 =( substr($dt2,5,2));
		$d2 =( substr($dt2,8,2));
		$h2 =( substr($dt2,11,2));
		$i2 = (substr($dt2,14,2));
		$s2 =( substr($dt2,17,2));   

		
		$r1=date('U',mktime($h1,$i1,$s1,$m1,$d1,$y1));
		$r2=date('U',mktime($h2,$i2,$s2,$m2,$d2,$y2));

		return round((($r1-$r2) / 3600), 10);

	}
	//----------------------------------------------------
	public static function getStorageLevel($player_id){
	
	
	
		$db = new db;
	
		$planet = $db->select("planets", "*", "player_id = '".$player_id."'");
	
		$level['m']= $planet['metal_storage'];
		$level['c'] = $planet['crystal_storage'];
		$level['d'] = $planet['deuterium_storage'];
		$level['mo'] = $planet['money_storage'];
		$level['e'] = $planet['energy_storage'];
	
		return $level;
	}
	public static function getMaxStorage($player_id){
	
	
		$storage_level = self::getStorageLevel($player_id);
		$StorageFactor = 1.0484394;

		 
		$formel['m'] = (($storage_level['m']*8000)*pow($StorageFactor,$storage_level['m']))+8000;
		$formel['c']  =  (($storage_level['c']*8000)*pow($StorageFactor,$storage_level['c']))+8000;
		$formel['d']  = (($storage_level['d']*8000)*pow($StorageFactor,$storage_level['d']))+8000;
		$formel['mo']  = (($storage_level['mo']*8000)*pow($StorageFactor,$storage_level['mo']))+8000;
		$formel['e']  =  (($storage_level['e']*8000)*pow($StorageFactor,$storage_level['e']))+8000;
	 
		return $formel;
		
	}

	public static function getProdLevel($player_id){
		
		$db = new db;
	
		$planet = $db->select("planets", "*", "player_id = '".$player_id."'");
	
		$level['m']= $planet['metal_level'];
		$level['c'] = $planet['crystal_level'];
		$level['d'] = $planet['deuterium_level'];
		$level['mo'] = $planet['money_level'];
		$level['e'] = $planet['energy_level'];
	
		return $level;
	
	}
	
	public static function getProdFormel($player_id){
		
	
		$prod_level = self::getProdLevel($player_id);
		$BuildLevelFactor = 1.5;
		$BuildLevelFactorMultiplicator = 0.36;
		$BuildLevelRaiseFactor = 1.05;
		 
		$formel['m'] = (30 * $prod_level['m'] * pow(($BuildLevelRaiseFactor), $prod_level['m'])) * ($BuildLevelFactorMultiplicator * $BuildLevelFactor)+10;
		$formel['c']  =  (19 * $prod_level['c'] * pow(($BuildLevelRaiseFactor), $prod_level['c'])) * ($BuildLevelFactorMultiplicator * $BuildLevelFactor)+5;
		$formel['d']  = (11 * $prod_level['d'] * pow(($BuildLevelRaiseFactor), $prod_level['d'])) * ($BuildLevelFactorMultiplicator * $BuildLevelFactor);
		$formel['mo']  = (40 * $prod_level['mo'] * pow(($BuildLevelRaiseFactor), $prod_level['mo'])) * ($BuildLevelFactorMultiplicator * $BuildLevelFactor)+20;
		$formel['e']  =  (55 * $prod_level['e'] * pow(($BuildLevelRaiseFactor), $prod_level['e'])) * ($BuildLevelFactorMultiplicator * $BuildLevelFactor)+30;
	 

	
		return $formel;
	
	}
	
	
	public static function realProduced($newStorage, $storage){
	
		
	
		if($newStorage > $storage){
			$prod = $storage - $newStorage;
			return true;
		}
		return false;
	}
	

	public static function generatateResources($player_id){
		
		$db = new db;
		
		$player = $db->select("player", "*", "player_id = '".$player_id."'");

	
		$planet = $db->select("planets", "*", "player_id = '".$player_id."'");	
		
		//Zeitdifferenz der letzten aktivität in Stunden
		$lastActive = new DateTime($player['lastActive']);
		$now = new DateTime("now");
		
		$now_f = $now->format("Y-m-d H:i:s");
		$lastActive_f = $lastActive->format("Y-m-d H:i:s");

		$timeDiff = self::time_diff($now_f, $lastActive_f); 
		//----------------------------------------------

		$production = self::getProdFormel($player_id);
				
		$storage = self::getMaxStorage($player_id);
			
		
		//Produktion pro Stunde
		$production['m'] *= $timeDiff;
		$production['c']  *=  $timeDiff;
		$production['d']  *=  $timeDiff;
		$production['mo']  *= $timeDiff;
		$production['e']  *= $timeDiff;
		//---------------------------------
		$gelagert['m'] = $planet['metal'];
		$gelagert['c'] = $planet['crystal'];
		$gelagert['d'] = $planet['deuterium'];
		$gelagert['mo'] = $planet['money'];
		$gelagert['e'] = $planet['energy'];

		foreach($production as $key => $p){
			$newStorage = $gelagert[$key] + $p;

			$temp = self::realProduced($newStorage,$storage[$key]);
			

			
			if($temp === true){
			
				$prod[$key] = $storage[$key] - $gelagert[$key];
			
			}		
			else
				$prod[$key] = $p;
		}

	
		 
		
		
		
		$db->update("planets", "metal = metal + ".round($prod['m'],6).", 
											crystal = crystal + ".round($prod['c'],6).", 
											deuterium = deuterium + ".round($prod['d'],6).",
											energy = energy + ".round($prod['e'],6).",
											money = money + ".round($prod['mo'],6), "player_id = '".$player_id."'");
		
		$db->update("player", "lastActive = '".$now_f."'", "player_id = '".$player_id."'");
		 
		
	}
}	

?>