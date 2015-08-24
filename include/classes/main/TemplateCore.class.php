<?php
class TemplateCore {
	private $_page;
	private $c = "";
	private $_playerID;
	private $_cache = false;
    private $_data = "";
    private static $_cacheableData = true;
	/**
	* @param page, cache
	* @return String
	**/
	public function __construct($page, $cache = false, $data_t = "") {
		$this->_cache = $cache;
		
		if(isset($_GET['content']) && $_GET['content'] != "")
			$this->c = ".".$_GET['content'];
	
	$this->_data = $data_t;
		
		/**
			Loads the Cache or go to loadTemplate()
		**/
		if ($page !== null) {
			$this->_page = $page;
			
			
			//TEMP -- Caching muss für jede Navigation (Admin, Mod, Normal) getrennt werden
			//Aktuell wird sie einfach gelöscht sollte Caching ansein für die Navigation
			if($page == "navigation"){
				$this->c = "";
			}
			
			
                if($this->_cache){
					if(file_exists('template_cache/temp.tpl.' . $this->_page.$this->c . '.temp')){
						if(strtotime("-1 minutes") > filemtime('template_cache/temp.tpl.' . $this->_page.$this->c . '.temp')){
							
							unlink('template_cache/temp.tpl.' . $this->_page.$this->c . '.temp');
							$this->loadTemplate ();
							
						}else{
							echo gzuncompress(file_get_contents('template_cache/temp.tpl.' . $this->_page.$this->c . '.temp'));
							
							return true;
						}
					}else{
                    $this->loadTemplate ();
                }
			}else{
				$this->loadTemplate ();
			}                  
		} else
			return false;
	}
    
    /**
     * TURNS OFF CACHING FOR TEMPLATE
     * @set boolean
     */
    public static function noTplCacheing(){
    
        self::$_cacheableData = false;
        
    }
    
	
	/**
		Saves the Compiled Template into Cache File
	**/
	
    private function saveTemplate($tpl){
        if($tpl != "1"){
			$data = gzcompress($tpl, 1);
			$f = fopen('template_cache/temp.tpl.'.$this->_page.$this->c.'.temp', 'wb');
			fwrite($f, $data);
			fclose($f);
        }
    }
    
	
	/**
		Loads the Template File and Compiles the Template if needed
	**/
    
	private function loadTemplate() {
		try {
				if (file_exists ( 'template/sites/tpl.' . $this->_page . '.php' )) {
					$content = $_GET ['content'];
                    if($this->_data != ""){
                        $tpl = include('template/sites/tpl.' . $this->_page. '.php?data='.$this->_data);
                    }else{
                        $tpl = include('template/sites/tpl.' . $this->_page. '.php');
                    }
					if($tpl != "1")
						echo $tpl;
                    
                    if($this->_cache && self::$_cacheableData){
                        $this->saveTemplate($tpl);
                    }
					self::$_cacheableData = true;
                    
				} else {
					throw new Exception ( Core::error('<b> Seite konnte nicht gefunden werden. Name wahrscheinlich falsch.</b><br />template/sites/tpl.' . $this->_page.$this->c . '.php<br /><br /><a href="index.html" style="color: black">Zurück zur Startseite</a>'));
				}
			
			
		} catch ( Exception $e ) {
			echo $e->getMessage ();
			//echo '<div style="border: 1 solid black; width: 500px; background: rgb(150,70,70); text-align: center; padding: 20px; margin: 15px auto;"><b> Fehler in Datei: tpl.' . $this->_page . '.php</b></div>';
		}
	}
    
    
    
}
?>