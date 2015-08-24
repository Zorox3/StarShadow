

/* TEASER */

#teaser_div{
    position: relative;
	text-align: center;
	
}

.scrollTeaser{

position: relative;
top: 0;
transition: 0.3s;
background-color: rgba(0,0,0,0.3);
}


.scrollTeaser:hover{

top: -190px;
background-color: rgba(10,20,50, 0.9);
}

/*
.scrollTeaser:hover > .teaserImg{

box-shadow: 0 0 15px black;

}
*/




/*


.teaser{

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
    display: inline-block;
    min-height: 150px;
	margin-top: 100px;
	padding: 70px; 
	padding-left: 90px;
}
*/


.teaser{
	box-shadow: 5px 5px 10px rgba(0,0,0,0.8);
	overflow:hidden;
	height: 300px;

}



.teaserText{

  text-align: left; 
 padding: 0 20px 20px  20px;

}

.teaserImg{
  position: relative;

  height: 225px;
  /*box-shadow: 0 0 5px black;*/
}

.blurImg{
    width: 100%;
    position: absolute;
    left: 0;
    -webkit-filter: blur(20px);
	-moz-filter: blur(20px);
	filter: blur(20px);
}

.wideImg{
	 width: 1280px;
}
/*
.smallImg{
	 width: 580px;
}
*/


@media (min-width: 1530px) { 

#teaser_div{

margin-top: 50%;

}

	.teaser{
	  display: inline-block;
	  background-color: rgba(0,0,0,0.4);
	  margin: 20px;
	}
	.small{
	  min-width: 350px;
	  max-width: 43%;
	}
	.wide{
	  width: 90%;
	}
}

@media (max-width: 1531px) { 
#teaser_div{

margin-top: 70%;

}

	.teaser{
	  display: inline-block;
	  background-color: rgba(0,0,0,0.4);
	  margin: 20px;
	}
	
	.small{
		width: 580px;
	}
	.wide{
		width: 90%;
	}
}


.teaser_titel{
	position: relative;
	top: -25px;
	width: 100%;
	font-size: 30px;
	color: <?php echo Core::$mainConfig['css']['headlines']['color']; ?>;
	font-weight: normal;
	text-transform: uppercase;
	text-align: left; 
	padding-left: 20px;
	margin-bottom: 40px;
}






@media (min-width: 1100px) { 
	.teaser{
			margin-bottom: 100px;
		
	}
}



@media (max-width: 1111px) { 
	.teaser{
			margin-bottom: 50px;
				  width: 580px;
	}



}






.parallax-window {
    background-attachment: fixed;
    background-position: center top;
    background-repeat: no-repeat;
    box-shadow: 0 0 15px black inset;
    height: 800px;
    left: -21.4%;
    position: absolute;
}

.parallax-window img{
	width: 100%;
	height: 800px;
	position: relative;
	z-index: -1;
	margin: 0 !important;
	border-radius: 0 !important;
	box-shadow: 0 0 0 transparent !important;
	border: 0 !important;
 
 }










/* TEASER  ENDE*/



/*############################################*/


/* NEWS */


.news{
	width: 100%;
	height: 900px;
	position: fixed;
	top: 0;
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/gridbg_glow.png');
	background-position: 0;
	background-size: auto, auto 1080px;
	transition: opacity 1s;
	border-bottom: solid #1094e4 2px;
	box-shadow: 0 0 40px black;
} 

.news:after{
content: '';
  position: absolute;
  bottom: 0;
  right: 0px;
  width: 0120px;
  height: 0px;
  border-style: solid;
  border-width: 0px 0px 25px 35px;
  border-color: transparent transparent #1094e4 transparent;
}


.news .text{
z-index: 10;
	position: absolute;
	left: 20%;
	top: 300px;
	margin: auto 0;
	min-width: 40%;
	max-width: 60%;
	border-radius: 10px;
	background: linear-gradient(to left, rgba(12, 24, 47, 0) 0%, rgba(2, 14, 37, 0.2) 15%, rgba(2, 14, 37, 0.5) 45%, rgba(22, 34, 57, 0.7) 100%);
	padding: 20px;
}

.text h1{

font-size: 40px;
color: #b1d8f1;
text-shadow: -2px 3px 3px #000;


}

#alink1 {
	
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>backgrounds/link_img.png') no-repeat;
	margin-top: 40px;
	margin-left: 60px;
	padding-left: 50px;
	height: 50px;
	display:block;
	line-height: 50px;
	background-position: 0 0;
	transition: 0;
	color: #1094e4;
}


#vid1_div{

box-shadow: 0 0 30px black;

}

video{

box-shadow: 0 0 30px black inset;

}

/* NEWS ENDE*/

 

/*############################################*/
