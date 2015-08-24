<?php

	print_r($_SESSION);

?>


<div id="dialog-message" title="Fehler" style="display: none">
  <p>
    <span class="ui-icon ui-icon-closethick" style="float:left; margin:0 7px 50px 0;"></span>
    Es müssen alle Felder richtig ausgefüllt werden
  </p>
</div>




<div class="content">
	<div class="content_titel">
		Login
	</div>
	
	<input type="email" name="email" id="email">
	<input type="password" name="password" id="password" />
	
	<button onclick="Login.sendLogin()"> Login </button>
	
	<br />
	
	<?php

	
	if($_SESSION['loggedIn'] == true){
	?>
	
		<button onclick="Login.logout()"> Logout </button>
	
	<?php
	
	}

	?>
	
</div>