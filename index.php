<?php
session_start();

//Auto Class load
require_once 'include/classes/class_autoload.php';


Core::init();

Core::loadConfig(Core::$mainConfigPath);

Core::setCssCaching(Core::$mainConfig['tpl']['cssCaching']);

$page = $_GET['page'];
if($page == null){
	$page = "index";
}



$PB = new PageBuilder($page);
?>
		
		<html>
		<head>
		
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
		<link href='http://fonts.googleapis.com/css?family=Orbitron:500' rel='stylesheet' type='text/css'>
		<link href='/include/javascript/jQuery/jquery-ui.css' rel='stylesheet' type='text/css'>
		<link href='/required/anibutton.css' rel='stylesheet' type='text/css'>
		
		<?php
			//CSS HEAD WIRD IMMER GELADEN
			$PB->requiredHead();
			PageBuilder::loadHeadByPath("navigation", "template/module/navigation");
			$PB->CSShead();
		?>
		
		<script type="text/javascript"  src="/include/javascript/jQuery/jquery.js"></script>
		<script type="text/javascript"  src="/include/javascript/jQuery/jquery-ui.js"></script>
		<script type="text/javascript"  src="/include/javascript/parallax/parallax-plugin.js"></script>

		<?php
			$PB->JSIncludes();
		?>
		
		<script>
		<?php
			//JS HEAD DES TEMPLATES
			$PB->JShead();
		?>
		</script>
		

		
		<script>
	
		
		var times = new Array(10);	
		var scrollTop = 0;

		
		jQuery( document ).ready(function(){
		
		
		jQuery( ".tcon" ).click(function() {
			jQuery( this ).toggleClass("tcon-transform");
		});
		
		
		
	var headerTop = 70;
		
	 jQuery(function(){
	 //if((jQuery(window).width()+1) > 1000){
		 var lastScrollTop = 0, delta = 0;
		 jQuery(window).scroll(function(){
		 var nowScrollTop = jQuery(this).scrollTop();
		 var deltaA = Math.abs(lastScrollTop - nowScrollTop);
			 if(deltaA >= delta){
				
				if(nowScrollTop > 50 ){
				
				jQuery( "#header" ).css( "position", "fixed" );
				jQuery( "#header" ).css( "top", "0" );
				
				}else if(nowScrollTop <= 50){
				jQuery( "#header" ).css( "position", "absolute" );
				jQuery( "#header" ).css( "top",  headerTop- nowScrollTop/2);
				
				}
				jQuery(".parallax").each(function(index){
				
				
				var p = jQuery(this);
				if(nowScrollTop >=  p.offset().top -  $( window ).height()/1.5){
				
				 p.toggleClass("shown",true);
				 p.toggleClass("hidden",false);
				
				}else{
				
					p.toggleClass("shown",false);
					p.toggleClass("hidden",true);
				
				}
				});
				
				
				 if (nowScrollTop > lastScrollTop){
					scrollTop -= deltaA*0.4;
					jQuery( "#background_wrap" ).css( "backgroundPosition", "50% " + scrollTop + "px, 50% " + scrollTop + "px" );
						jQuery( ".news" ).css( "top",  scrollTop*5 + "px" );
				 } else {
					scrollTop += deltaA*0.4;
					jQuery( "#background_wrap" ).css( "backgroundPosition", "50% " + scrollTop + "px, 50% " + scrollTop + "px" );
					
						jQuery( ".news" ).css( "top", scrollTop*5 + "px" );
				 }	
			 lastScrollTop = nowScrollTop;
			 }
		 });
		// }
	 });
		
		
					jQuery('.parallax-window').css("width", jQuery(window).width());
					jQuery('.parallax-window').parallax({
						speed : 0.15
					});
					
					
					jQuery(window).resize(function(){
						jQuery('.parallax-window').css("width", jQuery(window).width());
					});			
		});			
		</script>
				

		
		<title><?php echo Core::$mainConfig['language']['de']['title'] . "-" . Core::$mainConfig['language']['suffix']; ?></title>
		
		
		</head>
		
		<body id="main">
		
		<!-- BACKGROUND DIV -->
		<div id="background_wrap"></div>
		
		<!-- LOGO DIV -->
		<div id="logo"></div>
				<?php 

					//NAVIGATION
					
					$Navi = new TemplateCore("navigation", false);
					//echo TemplateModul::loadModulByPath("navigation", "", true); 
					
				?>
				
				<div id="bfContent">
					<?php
						//ELEMENTE DIE VOR DEM CONTENT DIV GELADEN WERDEN
						$PB->beforeContent();
					?>
				</div>
				
				
				<div id="content">
					<?php
						//CONTENT - CORE TEMPLATE
						$TC = new TemplateCore($page, true);


						
					if(Core::inAdmin()){
					?> 
					<!--<div id="footer"></div>-->

					<div>
						<a href="/index.html"><small>Zurück zu Starseite</small></a>
					</div>
				
					<?php
					}elseif(Core::loggedIn()){
					?>
					<div>
						<a href="/admin.html&admin"><small>Administration</small></a>
					</div>
					<?php
					}
					?>
				</div>
		</body>
</html>