<?php 
	session_start();

	if(!isset($_SESSION[ses_username]))
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
?>
<html>
	<title>Add</title>
	<head>
	<style>
		body {
			background-color: lightgray;
			font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
		}		
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}

		li {
			float: left;
			border-right:1px solid #bbb;
		}

		li:last-child {
			border-right: none;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover:not(.active) {
			background-color: #111;
		}

		.active {
			background-color: #4CAF50;
		}
		
		th {
			background-color: #4CAF50;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		tr:hover {
			background-color: #82FA58;
		}
		form {
			border: 0px solid #c6c7cc;
			border-radius: 5px;
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
		.addfield{
			padding: 20px 20px 0 20px;
		}
		.addfield label{			
			display: block;
			font-weight: bold;
			margin-bottom: 20px;
		}
		.addfield input{
			background: #fff; 
			border: 1px solid #c6c7cc;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
			color: #636466;
			padding: 6px;
			margin-top: 6px;
			margin-bottom: 6px;
			width: 100%;			
		}
		.canclebtn {
			background: #FF0000;
			border: 0;
			color: #fff;
			cursor: pointer;
			font-weight: bold;
			padding: 8px 16px;
		}
		.savebtn {
			background: #4CAF50;
			border: 0;
			color: #fff;
			cursor: pointer;
			font-weight: bold;
			padding: 8px 16px;
		}
	</style>
	<script>
		function resetAddForm() {
		document.getElementById("addForm").reset();
	}
	</script>
	</head>
	<body>
		<center>
		<?php			
			echo "<h2>Hello : ".$_SESSION[ses_username]."</h2>";			
		?>
		</center>
		
		<center><h1>Welcom to Store Management System</h1></center><br>
		
		<ul>
			<li><a href="main.php">All product</a></li>
			<li><a class="active" href="add.php">Add product</a></li>
			<li><a href="release.php">Sell product</a></li>									
		<ul style="float:right;list-style-type:none;">
			<?php
				if($_SESSION[ses_status] == "admin")
					echo "<li><a href=\"profile.php\">Manage User</a></li>";
			?>	
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>

		<center>
		<form action="addProduct.php" method="POST" id="addForm">
			<fieldset class="addfield">
			<label>
				Enter Product ID
				<input type="text" name="productID">				
			</label>
			<label>
				Enter Product Name
				<input type="text" name="productName">
			</label>
			<label>
				Brand
				<input type="text" name="brand">
			</label>
			<label>
				Amount of item
				<input type="text" name="amount">
			</label>
			<label>
				Price per item
				<input type="text" name="price">
			</label>
			<label>
				Company
				<input type="text" name="company">
			</label>
			<label>
				Phone
				<input type="text" name="phone">
			</label>
			<label>
				Email
				<input type="text" name="email">
			</label>
			</fieldset>
			<label>
				<input class="canclebtn" type="button" onclick="resetAddForm()" value="Clear form">
				<input class="savebtn" type="submit" value="Add product">
			</label>			
			
		</form></center>
		
	</body>
</html>
