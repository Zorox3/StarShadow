<?php
class db{
	
	private static $debug = 0;
	private $mysqli;
	private static $merge = false;
	private $database;
	private $lastID;
	
	public function __construct($database=""){
	
		if($database == ""){
		
			$database = "d01a9717";
		
		}
	
		$this->database = $database;
	
		switch($database){
		case 'forum':
			$this->mysqli = new mysqli("localhost",
												"d01e6dbc","Suchoy123!","d01e6dbc");
			break;
		default:
			$this->mysqli = new mysqli("localhost","d01a9717","pSWtu2eqh6w9G9wn","d01a9717");
			break;
		}									
												
												
												
		mysqli_set_charset($this->mysqli, 'utf8');
	}
	
	
	/**
		$sql = Vollständige SQL Abfrage
	**/
	public function execute($sql,$option=""){
			
		if($query = mysqli_query($this->mysqli ,$sql)){
		$this->lastID = $this->mysqli->insert_id;
			if($option == "") {
				while($res = mysqli_fetch_array($query)){
				
					$result[] = $res;
				
				}
				if(count($result) > 1 || !self::$merge)
					return $result;
				else{
					  self::$merge = false;
            return $result[0];
          }
			}
			elseif($query){
			
				return true;
			
			}
		}
	}
	
	public static function setAutoMergeFollow(){
	
		self::$merge = true; 
		
	}
	
	/**
		Setzt das DebugLevel - Anzeige von Abfragen / (Ergebnissen)
	**/
	public static function SetDebug($level){
	
		self::$debug = $level; 
		
	}
	
	
	/**
		$tbl = tabelle;
		$sel = Rückgabe;
		$where = Bedingung; // id = 3
		$order = Sortierung; // id
		$group = Gruppierung; // id
		$limit = Limit; // 1,3
	**/
	public function select($tbl, $sel = "*", $where ="", $order="", $group="", $limit=""){
		if($sel == "")
			$sel = "*";
			
			
		$sql = 'SELECT '. $sel;
		$sql .=  ' FROM ' .$tbl;
		
		if($where != "")
			$sql .=' WHERE ' .$where;
			
		if($order != "")
			$sql .= ' ORDER BY ' .$order;
			
		if($group != "")
			$sql .=' GROUP BY '. $group;
		
		if($limit != "")
			$sql .= ' LIMIT '. $limit;
		
		
		$result = self::execute($sql);
		
		
		if(self::$debug > 0)
			$this->errorMessage($sql);
		
		
		
		return $result;
	}
	
	public function update($tbl, $update, $where){
	
		$upt = 'UPDATE '. $tbl;
		
		if($update != "")
			$upt .=' SET ' .$update;
		
		if($where != "")
			$upt .=' WHERE ' .$where;
		
		$result = $this->execute($upt,"u");
		
		if(self::$debug > 0)
			$this->errorMessage($upt);

		return $result;
	
	}

	
	public function insert($tbl, $col, $var){		
		$out_var = "";
		$out_col = "";
	
		if(is_array($var))
			foreach($var as $v){
				if($out_var) $out_var .= ', ';
				$out_var .= "'".$v."'";
			}
			
			
		if(is_array($col))
			foreach($col as $c){
				if($out_col) $out_col .= ', ';
				$out_col .= $c;
			}
	
	
		$in = 'INSERT INTO '. $tbl .' ('. $out_col .' ) VALUES (' . $out_var . ')';
		
		$result = $this->execute($in,"i");
		
		if(self::$debug > 0)
			$this->errorMessage($in);

		return $result;
	}
	
	public function delete($tbl,$where){
	
		$del = "DELETE FROM ".$tbl." WHERE ".$where;
		
		$sel = $this->select($tbl, "", $where);
		
		$result = $this->execute($del, "del");
		
		if(self::$debug > 0)
			$this->errorMessage($del);
	   
		return $sel; 
	}
	
	public function getLastId(){
	
		return $this->lastID;
		
	}
	
	
	private function errorMessage($msg){
	
		echo '<div style="border: 1 solid black; width: 500px; background: rgb(150,70,70); text-align: center; padding: 20px; margin: 15px auto;"><i>'.$this->database.'</i><br /><b>'. $msg .'</b></div>';
	
	}
	
}


?>