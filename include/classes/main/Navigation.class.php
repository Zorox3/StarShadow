<?php
class Navigation {
	private $css;
	private $db;
	public function __construct() {
		$this->db = new db ();
	}
	public function createNavi() {
		
	
		$firstRow = $this->getNaviPointsByParent ( 0 );
		
		$width = 100 / count($firstRow);
		
		foreach ( $firstRow as $fr ) {
			$has_children="";
			$secondRow = $this->getNaviPointsByParent ( $fr ['id'] );
			
			if (is_array ( $secondRow ))
				$has_children = "has_children";
			
			echo '<li class="level1 '.$has_children.'">';

			
			
			$href = $this->getNaviPointLink ( $fr ['link_id'] );
			echo '<a href="' . $href . '">' . $fr ['name'] . '</a>';
			
			
			if (is_array ( $secondRow )) {
				
				echo '<ul class="nav">';
				
				foreach ( $secondRow as $sr ) {
					
					echo '<li class="level2">';
					
					echo '<a href="' . $this->getNaviPointLink ( $sr ['link_id'] ) . '">';
						echo $sr ['name'];
					echo '</a>';
					
					echo '</li>';
				}
				echo '</ul>';
			}
			
			echo '</li>';
		}

	}
	private function getNaviPointsByParent($parent) {
		
		
		if(Core::inAdmin() )
		$point = $this->db->select ( "navigation", "*", "parent = '" . $parent . "' AND admin = '1' AND visible = '1'", "position" );
		  else
		 $point = $this->db->select ( "navigation", "*", "parent = '" . $parent . "' AND admin = '0' AND visible = '1'", "position" );
		 
		return $point;
	}
	private function getNaviPointLink($link_id) {
	
	
		db::setAutoMergeFollow();
		$link = $this->db->select ( "navigation_links", "*", "id = '" . $link_id . "'" );

		if($_GET['data'] != ""){
		
			$data = "&".$_GET['data'];
		
		}
		
		if ($link ['tpl']) {
			db::setAutoMergeFollow();
			$content = $this->db->select("content", "*", "id = '".$link['content_id']."'");
			db::setAutoMergeFollow();
			$type = $this->db->select("content_type", "*", "id = '".$link['type']."'");
			
			$hash = bin2hex($content['id'] * 0xFA);
			
			return $admin."/".$link['link']."/".$type['type'].".".$hash.".html";
			
		} else {
			if ($link ['extern'])
				return $link ['link'];
			elseif ($link ['link'] == "")
				return '';
			else
				return "/".$link ['link'].".html".$data;
		}
	}
	
	public static function getLink($link_id){
	
	
		$n = new Navigation;
	
		return $n->getNaviPointLink($link_id);
	}
}

?>