<?php
 session_start();

  	echo '<script type="text/javascript"> alert("Logout successfully, Good bye !!!"); </script>';
  	echo '<script type="text/javascript"> window.open("index.php","_self");</script>';  	

  	unset($_SESSION[ses_username]);
	unset($_SESSION[ses_password]);
	unset($_SESSION[ses_status]);
  	session_destroy();   // function that Destroys Session 

?>
