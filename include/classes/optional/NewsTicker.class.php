<?php

class NewsTicker{

	private $db;
	private $imgPath;

	public function __construct(){
		$this->db = new db;
		$this->imgPath = Core::$mainConfig['css']['defaultImagePath'];
	}

	public function getNews(){
		
		return $this->db->select("news", "*","","TIMESTAMP DESC");
	
	}
	
	
	//OUTDATED -- Navigation::getLink($id)
	public function getLink($id){
	
		if($id != 0){
			$result = $this->db->select("navigation_links","*","id='".$id."'");
		
			$link = $result['link']; // Link In- oder Extern
			$ext = $result['ext']; // externer link
			$tpl = $result['tpl']; // link zu einem Template
			
			if($link == "")
				return -1;	// Kein Link unter dieser ID oder $link leer
			
			if($ext){
			
				return $link;
			
			}
			elseif($tpl){
			
			}
			else{
			
				return "/".$link.".html";
			
			}
		}
		else return -1; //keine News id übergeben
	}
	
	public function getTeaser(){
	
		$result = $this->db->select("news_teaser");
		
		foreach($result as $key => $r){
			
			$return['teaser'.$key.'_title'] = $r['titel'];
			$return['teaser'.$key.'_text'] = $r['html'];
			$return['teaser'.$key.'_img'] = $this->imgPath."teaser/".$r['img'];
			$return['teaser'.$key.'_link'] = Navigation::getLink($r['link_id']);
			$return['teaser'.$key.'_type'] = $r['type'] == 0 ? "small" : "wide";
		
		}
		
		
		return $return;
	
	}
}

?>