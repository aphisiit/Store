<?php ?>
<html>
	<title>Search</title>
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
		label{			
			display: block;
			font-weight: bold;
			margin-bottom: 20px;
		}
		input {
			border-radius: 5px;
			font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
			margin: 0;
		}
		.search-field {
			border-radius: 5px;
			display: block;
			background: #fff; 
			border: 0px solid #c6c7cc; 
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
			color: #636466;
			padding: 6px;
			margin-top: 6px;
			width: 20%;
		}
		.btn{
			margin-top: 10px;
			background: #4CAF50;
			border: 0;
			color: #fff;
			cursor: pointer;
			font-weight: bold;
			float: center;
			padding: 8px 16px;		
			border-radius: 5px;	
			font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
		}
	</style>
	</head>
	<body>
		
		<center><h1>Welcom to Store Management System</h1></center><br>
		
		<ul>
			<li><a href="main.php">Over View</a></li>
			<li><a href="order.php">Order product</a></li>
			<li><a href="add.php">Add product</a></li>
			<li><a class="active" href="search.php">Search and Delete Productt</a></li>
			<li><a href="about.php">About</a></li>			
		<ul style="float:right;list-style-type:none;">
			<li><a href="profile.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>
		
		<center>
			<form action="" method="post">				
				<label>
					Search
					<input class="search-field" type="text" name="searchfield">
					<input class="btn" type="submit" name="search" value="Search">				
				</label>
			</form>
		</center>
		
		
	</body>
</html>
