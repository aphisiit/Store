<?php

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
<!--		font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif; -->
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
<center><form action="check_login.php" method="post">
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

<br><br><br><br><br><br><br><br><br><br><br>
<center><h3>523456 Open Source Development at Suranaree University of Technology<br>Project : Store Management</h3></center>
<center>
<table>		
	<tr><td>B5601745</td><td>Krissanawat Unruean</td></tr>
	<tr><td>B5604937</td><td>Aphisit Namracha</td></tr>
	<tr><td>B5607020</td><td>Adisak Dangbut</td></tr>
	<tr><td>B5621781</td><td>Witchkorn Kitwanitkhachon</td></tr>
</table>
</center>


