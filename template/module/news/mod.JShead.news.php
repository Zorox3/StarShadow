var ImageCount = 0;

var Images = new Array();


			<?php 
			
				$db = new db;
				
				$images = $db->select("news", "*","1");
				$c = 0;
				foreach($images as $i){
					
					$echo = "Images[$i] = new Array();";
					$echo .= "Images[$i]['type'] = '".$i['type']."';";
					$echo .= "Images[$i]['data'] = '".$i['image']."';";
					$echo .= "Images[$i]['duration'] = '".$i['duration']."';";
					
					echo $echo;
					$c++;
				}
			
			?>


			
		
			function $(id){
			
				return document.getElementById(id);
			
			}
			
			window.onload = init;
			
			
			function init(){
			
				ImageCount++;
				if(ImageCount > Images.length - 1){
					ImageCount = 0;
				}
			
				if(Images[ImageCount]["type"] == "img"){
				
				$("img2").innerHTML = "";
				
				$("img2").style.background = "url('images/backgrounds/gridbg_glow.png'),url('images/logos/main_logo.png') no-repeat, url('images/backgrounds/head_logo_glow_effect.png') no-repeat, url('images/top_images/"+Images[ImageCount]["data"]+"') no-repeat";
				$("img2").style.backgroundSize = "auto, 120px,auto, auto 1080px";
				$("img2").style.backgroundPosition = "0, center bottom , center 97.6%, 50% -238px";	
				}
				else if(Images[ImageCount]["type"] == "vid"){
				
					$("img2").innerHTML = '<video style="width: 100%;" id="vid2"><source src="images/top_images/'+Images[ImageCount]["data"]+'" type="video/mp4"></video>'
					
				}
				image();
			} 
			
			
			function image(){
			
				setTimeout("switchImage()", Images[ImageCount]["duration"]);

				if($("vid1") != null && $("img1").style.opacity == "1")
					$("vid1").play();
				if($("vid2") != null && $("img2").style.opacity == "1")
					$("vid2").play();
				
				ImageCount++;
				if(ImageCount > Images.length - 1){
					ImageCount = 0;
				}
				

				
			}
			
			function switchImage(){
				
				if($("img1").style.opacity == "0"){
				
				
					$("img1").style.opacity = "1";
					$("img2").style.opacity = "0";
				
				
				
				
				
				setTimeout(function(){
				if(Images[ImageCount]["type"] == "img"){
				
				$("img2").innerHTML = "";
				
				$("img2").style.background = "url('images/backgrounds/gridbg_glow.png'),url('images/logos/main_logo.png') no-repeat, url('images/backgrounds/head_logo_glow_effect.png') no-repeat, url('images/top_images/"+Images[ImageCount]["data"]+"') no-repeat";
				$("img2").style.backgroundSize = "auto, 120px,auto, auto 1080px";
				$("img2").style.backgroundPosition = "0,center bottom , center 97.6%, 50% -238px";	
				}
				else if(Images[ImageCount]["type"] == "vid"){
				
					$("img2").innerHTML = '<videostyle="width: 100%;" id="vid2"><source src="images/top_images/'+Images[ImageCount]["data"]+'" type="video/mp4"></video>'
					
				}	
					}, 1000);
					
					
					
				}
				else{
				
					$("img1").style.opacity = "0";
					$("img2").style.opacity = "1";
											
						
					setTimeout(function(){
					
				if(Images[ImageCount]["type"] == "img"){
				
				$("img1").innerHTML = "";
				
				$("img1").style.background = "url('images/backgrounds/gridbg_glow.png'),url('images/logos/main_logo.png') no-repeat, url('images/backgrounds/head_logo_glow_effect.png') no-repeat, url('images/top_images/"+Images[ImageCount]["data"]+"') no-repeat";
				$("img1").style.backgroundSize = "auto,120px,auto, auto 1080px";
				$("img1").style.backgroundPosition = "0, center bottom , center 97.6%, 50% -238px";	
				}
				else if(Images[ImageCount]["type"] == "vid"){
				
					$("img1").innerHTML = '<video style="width: 100%;" id="vid1"><source src="images/top_images/'+Images[ImageCount]["data"]+'" type="video/mp4"></video>'
					
				}
					}, 1000);

				}
				image();
			}