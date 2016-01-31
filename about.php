<?php 
	session_start();

	if(!isset($_SESSION[ses_username]))
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
?>
<html>
	<title>About</title>
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
	</style>
	</head>
	<body>
		
		<center><h1>Welcom to Store Management System</h1></center><br>
		
		<ul>
			<li><a href="main.php">All product</a></li>
			<li><a href="add.php">Add product</a></li>
			<li><a href="release.php">Release commodity</a></li>				
			<li><a class="active" href="about.php">About</a></li>		
		<ul style="float:right;list-style-type:none;">
			<?php
				if($_SESSION[ses_status] == "admin")
					echo "<li><a href=\"profile.php\">Manage User</a></li>";
			?>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>
				
		<center>This is Project Open Source Development at Suranaree University of Technology</center><br>
		
		<center>B5601745 Krissanawat Unruean</center>
		<center>B5604937 Aphisit Namracha</center>
		<center>B5607020 Adisak Dangbut</center>
		<center>B5621781 Witchkorn Kitwanitkhachon</center>
		
		
	</body>
</html>
