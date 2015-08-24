<?php

if(Core::inAdmin()){
	$background = Core::$mainConfig['css']['defaultImagePath'].Core::$mainConfig['css']['adminBackground'];
}else{
	$background = Core::$mainConfig['css']['defaultImagePath'].Core::$mainConfig['css']['background'];
}

?>


	

*{
	padding: 0;
	margin: 0;
	font-family: 'Orbitron';
}

body{
	height: 100%;
	margin: 0 auto;
    overflow-y: auto;
    width: 100%;
}

#background_wrap{
    z-index: -1;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
	
	
	
	
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/gridbg_glow.png'), 
					  url('<?php echo Core::$mainConfig['css']['defaultImagePath'].$background; ?>'), 
					  <?php echo Core::$mainConfig['css']['bgcolor']; ?>;
	background-repeat: repeat, no-repeat;
	background-position: 50% 0, 50% 0px;
	background-attachment: scroll;
	
}


#logo{

	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>logos/main_logo.png') no-repeat;
	background-position: center;
	background-size: 130px;
	top: 10px;
	left: 43px;
	position: absolute;
	width: 130px;
	height: 130px;
	
	z-index: 21;

}


@media (min-width: 1100px) { 
	#main #content{
		padding: 20px;
		padding-top: 200px;
		padding-left: 5%;
		padding-right: 5%;
		width:70%; 
		left: 50%; 
		margin-left: -40%;
	}
}



@media (max-width: 1111px) { 

	#main #content{
		padding: 0;
		padding-top: 0;
		padding-left: 0;
		padding-right: 0;
		width: 100%; 
		left: 0; 
		margin-left: 0;
	}

}

input[type=password], input[type=text], input[type=button], input[type=submit], input[type=number], textarea {
	border: none;
	background: rgba(30,50,150,0.6);
	box-shadow: 0 0 5px #111 inset;
	cursor: pointer;
	transition: 0.5s box-shadow;
	border-radius: 5px;
	font-size: 19px;
	height: 40px;
	line-height: 20px;
	min-width: 250px;
	padding: 5px;
	color: white;
  }
  input[type=number]{
	min-width: 100px !important;
	width: 100px;
  }
 



#main #content{
	position: absolute;
	color: white ;
}	

p{
	  margin: 10px 0;
}

a{
	transition: 0.3s;
	color: white;
	text-decoration: none;
}

.h1_div{
	margin-top: 300px;
	margin-bottom: 500px;	
}

h1{
color: <?php echo Core::$mainConfig['css']['h1']['color']; ?>;
font-weight: normal;
font-family: 'Orbitron';
text-transform: uppercase;
}


h2{
text-align: center;
width: 100%;
color: <?php echo Core::$mainConfig['css']['h2']['color']; ?>;
font-weight: normal;
font-family: 'Orbitron';
text-transform: uppercase;
font-size: 20px;
}
h3{
color: <?php echo Core::$mainConfig['css']['h3']['color']; ?>;
}

h4{
	margin-top: 10px;
	margin-bottom: 10px;
	border-bottom: 1px solid <?php echo Core::$mainConfig['css']['themeColor']; ?>;
	box-shadow: 0px 3px 5px <?php echo Core::$mainConfig['css']['themeColor']; ?>;
	border-radius: 10px;
	height: 15px;
	line-height: 15px;
	padding-left: 30px;
	color: <?php echo Core::$mainConfig['css']['h4']['color']; ?>;
}

p{
	line-height: 20px;
}
.content img{

margin: 10px;
border-radius: 8px;
box-shadow: 0 0 10px black;
border: solid 1px <?php echo Core::$mainConfig['css']['themeColor']; ?>;

}

hr{
border: none;
height: 80px;
background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/hr_image.png') no-repeat;
background-size: 100% 40px;
background-position: center;

}

#footer {
	height: 26px;
	position: absolute; 
	font-size: 15px;
	width: 100%;
	left: 0;
	font-weight: normal;
	font-family: 'Orbitron';
	text-transform: uppercase;
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/navi_middle.png') repeat-x;
	}

	#footer:before{
	position: absolute;
	top: -39px;
	left: -210px;
	content: ' ';
	width: 210px;
	height: 65px;
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/navi_left.png') no-repeat ;

	}
	
	#footer:after{
		position: absolute;
		top: -39px;
		right: -210px;
		content: ' ';
		width: 210px;
		height: 65px;
		background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/navi_right.png') no-repeat;
	}
	

	
	
.content{
    background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>logos/main_logo.png') no-repeat 10%,
						url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/teaser_head_right.png') no-repeat, 
						url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/teaser_head_left.png') no-repeat, 
						url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/teaser_bottom_right.png') no-repeat,
						url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/teaser_bottom_left.png') no-repeat, 
						rgba(0,0,0,0.5);
	background-position: 32px 20px,
										right 20px,
										left top, 
										98% bottom,
										left bottom;
	background-size: 40px, auto, auto, auto, auto;
    border-radius: 10px;
    min-height: 250px;
	margin-top: 90px;
	padding: 70px; 
	padding-left: 90px;
	box-shadow: 0 0 8px #000;
	
}

.content_titel{
	position: relative;
	top: -25px;
	border-top-left-radius: 10px;
	
	padding: 5px;
	width: 90%;
	
	font-size: 30px;
	color: <?php echo Core::$mainConfig['css']['headlines']['color']; ?>;
	font-weight: normal;
	text-transform: uppercase;

}





/*****************LOADER*********************/

.loader {
  position: relative;
  width: 60px;
  font-weight: bold;
  padding: 25px;
  padding-bottom: 60px;

}
.loader:before{
	content: attr(data-content) " ";
	position: relative;
	top: 40px;
	margin: auto;
	text-align: center;
	width: 100%;
	display: block;

}

.loader:after{
	content: attr(data-time) " ";
	position: relative;
	top: 40px;
	margin: auto;
	text-align: center;
	width: 100%;
	display: block;
	font-size: 10px;
}


.loader .circle {
  position: absolute;
  width: 60px;
  height: 60px;
  opacity: 0;
  -webkit-transform: rotate(225deg);
  transform: rotate(225deg);
  
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-name: orbit;
  -webkit-animation-duration: 4.5s;
  
  animation-iteration-count: infinite;
  animation-name: orbit;
  animation-duration: 4.5s;
}
.loader .circle:after {
  content: '';
  position: absolute;
  width: 5px;
  height: 5px;
  border-radius: 5px;
}

.red{
	color: red;
}
.blue{
	color: #1094e4;
}
.green{
	color: green;
}
.yellow{
	color: rgb(255,190,0);
}

.loader .red:after{
  background: red;
  box-shadow:  0 0 2px red;
}
.loader .yellow:after{
  background: rgb(255,190,0);
  box-shadow:  0 0 2px rgb(255,190,0);
}
.loader .blue:after{
  background: #1094e4;
  box-shadow:  0 0 2px #1094e4;
}
.loader .green:after{
  background: green;
  box-shadow:  0 0 2px green;
}

.loader .circle:nth-child(2) {
  -webkit-animation-delay: 240ms;
  animation-delay: 240ms;
}
.loader .circle:nth-child(3) {
  -webkit-animation-delay: 480ms;
   animation-delay: 480ms;
}
.loader .circle:nth-child(4) {
  -webkit-animation-delay: 720ms;
  animation-delay: 720ms;
}
.loader .circle:nth-child(5) {
  -webkit-animation-delay: 960ms;
  animation-delay: 960ms;
}


@keyframes orbit {
  0% {
    transform: rotate(225deg);
    opacity: 1;
    animation-timing-function: ease-out;
  }
  7% {
    transform: rotate(345deg);
    animation-timing-function: linear;
  }
  30% {
    transform: rotate(455deg);
    animation-timing-function: ease-in-out;
  }
  39% {
    transform: rotate(690deg);
    animation-timing-function: linear;
  }
  70% {
    transform: rotate(815deg);
    opacity: 1;
    animation-timing-function: ease-out;
  }
  75% {
    transform: rotate(945deg);
    animation-timing-function: ease-out;
  }
  76% {
    transform: rotate(945deg);
    opacity: 0;
  }
  100% {
    transform: rotate(945deg);
    opacity: 0;
  }
}

@-webkit-keyframes orbit {
  0% {
    -webkit-transform: rotate(225deg);
    opacity: 1;
    -webkit-animation-timing-function: ease-out;
  }
  7% {
    -webkit-transform: rotate(345deg);
    -webkit-animation-timing-function: linear;
  }
  30% {
    -webkit-transform: rotate(455deg);
    -webkit-animation-timing-function: ease-in-out;
  }
  39% {
    -webkit-transform: rotate(690deg);
    -webkit-animation-timing-function: linear;
  }
  70% {
    -webkit-transform: rotate(815deg);
    opacity: 1;
    -webkit-animation-timing-function: ease-out;
  }
  75% {
    -webkit-transform: rotate(945deg);
    -webkit-animation-timing-function: ease-out;
  }
  76% {
    -webkit-transform: rotate(945deg);
    opacity: 0;
  }
  100% {
    -webkit-transform: rotate(945deg);
    opacity: 0;
  }
}





.fancybox-skin{

	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/box_bg.png') rgba(30,50,60,0.9) !important;

}


.text_block{

	background: rgba(0,0,0, 0.3);
	width: 100%;
	padding-top: 10px;
	padding-bottom: 10px;
	margin-top: 10px;
	margin-bottom: 10px;

}


legend{

	color: #1084e0;
	font-size: 20px;

}
fieldset{
	color: white;
	margin-top: 20px;
	margin-bottom: 20px;
	border: 2px white solid;
	padding: 10px;

}


.manuelSubNavi{
	width: 100%;
	margin-bottom: 25px;
	margin-top: 25px;
	background-color: rgba(0,0,0,0.5);
	border-top-left-radius: 35px;
	border-bottom-right-radius: 35px;
}

.manuelSubNavi span{

padding-left: 20px;
  padding-right: 20px;
  line-height: 45px;
  display: inline-block;
	border-right: <?php echo Core::$mainConfig['css']['h2']['color']; ?> solid 2px;


}

.manuelSubNavi span:last-child{

	border: 0px;
  
}

.parallax{

	display: inline-block;
    background: rgba(180,180,180,0.4);
    border-radius: 20px;
    height: 40px;
    width: 40%;
    color: rgb(230, 90, 90);
    padding-left: 100px;
    padding-right: 100px;
    margin-bottom: 100px;
    position: relative;
    font-size: 30px;
    transition: 0.5s ease-in-out;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
	
}

.hidden{
	opacity: 0;
	top: 120px;
}

.shown{
	opacity: 1;
	top: 0;
}



