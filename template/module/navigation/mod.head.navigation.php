#header {
	right: 0;
	background: #363636;
	float: left;
	position: absolute;
	z-index: 20;
	height: 64px;
	margin-bottom: 40px;
	font-weight: normal;
	font-family: 'Orbitron';
	text-transform: uppercase;
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>navigation/navi_repeat.png') repeat-x;

}

	#header:before{
	position: absolute;
	top: -35px;
	left: -388px;
	content: '';
	width: 388px;
	height: 255px;
	background: url('<?php echo Core::$mainConfig['css']['defaultImagePath']; ?>navigation/navi_before.png') no-repeat ;
	}
		

#header .nav {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: center;
}

@media (min-width: 1100px) { 
	#header{
	
		top: 50px;
		left: 388px;
	}
}



@media (max-width: 1111px) { 

	#header{
	
		top: 0;
		left: 0;
		
	
	}
	#header:before{
		display: none;
	}
	
	#header:after{
		display: none;
	}

}


@media (min-width: 1400px) { 
	#header .nav {
		  font-size: 1.4rem;
		  letter-spacing: 1px;
	}
	
	#header li a {
		padding: 18px;
		text-decoration: none;
		text-shadow: 0 0 2px #fff;
	}
	
	#header .level2 a {
	
		padding: 12px;
	
	}
}

@media (max-width: 1401px) { 
	#header .nav {
		  font-size: 1.0rem;
	} 
	
	#header li a {
		  padding: 24px 11px 24px 11px;
		   text-decoration: none;
		  text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
	}
	
		#header .level2 a {
	
		padding: 14px;
	
	}
}




 #header li:hover, li:focus {
	background-color: rgb(50,150,220);
	opacity: 0.9;	
	-webkit-box-shadow: 0px 0px 10px #111 inset,0 17px 17px -17px #555 inset, 1px 0 1px -1px #000 inset, -1px 0 1px -1px #000 inset; 
	-moz-box-shadow: 0px 0px 10px #111 inset,0 17px 17px -17px #555 inset, 1px 0 1px -1px #000 inset, -1px 0 1px -1px #000 inset; 
	box-shadow: 0px 0px 10px #111 inset,0 17px 17px -17px #555 inset, 1px 0 1px -1px #000 inset, -1px 0 1px -1px #000 inset; 
}


#header li a {
  text-decoration: none;
  display: block;
  color: black;

}

#header li a:hover, #header li a:focus{

	 color: white;
	 text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;

}



#header .level2 a {
font-size: 0.9em;
}



#header .level1 {
  display: inline-block;
  text-transform: uppercase;
	  transition: 0.3s;
  }



#header .level2 {
  text-transform: none;
  height: 46px;
}



#header .has_children {
  position: relative;
}


#header .has_children ul {
  visibility: hidden;
  max-height: 0;
  height: auto;
  position: absolute;
  left: 0;
  opacity: 0;
  width: 100%;
  background: inherit;
  list-style: none;
  background:  rgb(50,150,220);
}


#header .has_children a {
  display: block;
}


#header .has_children a:hover, .has_children a:focus{
	background-color: rgb(50,150,220);
	opacity: 0.9;	
	 color: white;
	 text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;
	-webkit-box-shadow: 0px 0px 10px #111 inset,0 17px 17px -17px #555 inset, 1px 0 1px -1px #000 inset, -1px 0 1px -1px #000 inset; 
	-moz-box-shadow: 0px 0px 10px #111 inset,0 17px 17px -17px #555 inset, 1px 0 1px -1px #000 inset, -1px 0 1px -1px #000 inset; 
	box-shadow: 0px 0px 10px #111 inset,0 17px 17px -17px #555 inset, 1px 0 1px -1px #000 inset, -1px 0 1px -1px #000 inset; 
}


#header .has_children > a:after {
  display: inline-block;
  left: 50%;
  left: calc(50% - 0.25em);
  top: 50px;
  position: absolute;
  content: "";
  vertical-align: middle;
  border-top: 0.5rem solid #FF3F5E;
  border-left: 0.5rem solid transparent;
  border-right: 0.5rem solid transparent;
}


#header .has_children:hover ul, .has_children:focus ul {
  visibility: visible;
  opacity: 1;
  max-height: 500px;
  transition: .4s ease .25s;
}


#header .has_children:hover ul li, .has_children:focus ul li {
  visibility: visible;
}
