<?php  session_start(); ?> 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true that header redirect it to the home page directly 
 {
    header("Location:chat.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

      if($user == "a" && $pass == "1234")  // username is  set to "Ank"  and Password   
         {                                   // is 1234 by default     

          $_SESSION['use']=$user;


         echo '<script type="text/javascript"> window.open("main.php","_self");</script>';            
         //  On Successfull Login redirects to home.php

        }

        else
        {
			echo '<script language="javascript"> alert("Login fail !!!"); </script>';     
			echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      
        }
}
 ?>
<head>
	<style>
		body {
			background-color: lightgray;
			font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
		}
		*,
		*:before,
		*:after {
			box-sizing: border-box;
		}
		form {
			border: 1px solid #c6c7cc;
			border-radius: 5px;
<!--			font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif; -->
			overflow: hidden;
			width: 300px;
		}	
		fieldset {
			border: 0;
			margin: 0;
			padding: 0;
		}
		input {
			border-radius: 5px;
			font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
			margin: 0;
		}
		.account-info {
			padding: 20px 20px 0 20px;
		}
		.account-info label {
			color: #395870;
			display: block;
			font-weight: bold;
			margin-bottom: 20px;
		}
		.account-info input {
			background: #fff; 
			border: 1px solid #c6c7cc;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
			color: #636466;
			padding: 6px;
			margin-top: 6px;
			width: 100%;
		}
		.account-action {
			background: lightgray; 
			border-top: 1px solid #c6c7cc;
			padding: 20px;
		}
		.account-action .btn {
			background: #4CAF50;
			border: 0;
			color: #fff;
			cursor: pointer;
			font-weight: bold;
			float: left;
			padding: 8px 16px;
		}
		.account-action label {
			color: #7c7c80;
			font-size: 12px;
			float: left;
			margin: 10px 0 0 20px;
		}
	</style>
</head>
<center><form action="" method="post">
  <fieldset class="account-info">
    <label>
      Username
      <input type="text" name="user">
    </label>
    <label>
      Password
      <input type="password" name="pass">
    </label>
  </fieldset>
  <fieldset class="account-action">
    <input class="btn" type="submit" name="login" value="LOGIN">
    <label>
      <input type="checkbox" name="remember"> Stay signed in
    </label>
  </fieldset>
</form></center>
<!--
<html>
<head>

<title> Login Page   </title>

</head>

<body>
<center>
	<form action="" method="post">
		<table width="200" border="0">
		<tr>
			<td>UserName</td>
			<td><input type="text" name="user" > </td>
		</tr>
		<tr>
			<td> PassWord  </td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td></td>
			<td align="right"> <input type="submit" name="login" value="LOGIN"></td>
		<td></td>
		</tr>
		</table>
	</form>
</center>
</body>
</html>
-->
