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
	</style>
	</head>
	<body>
		
		<center><h1>Welcom to Store Management System</h1></center><br>
		
		<ul>
			<li><a href="main.php">Over View</a></li>
			<li><a href="order.php">Order product</a></li>
			<li><a href="add.php">Add product</a></li>
			<li><a href="search.php">Search and Delete Productt</a></li>
			<li><a href="about.php">About</a></li>			
		<ul style="float:right;list-style-type:none;">
			<li><a class="active" href="profile.php">Manage User</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>
		
		<center>Hello Username</center>


		
		<center><table style="width:80%">
			<tr>
				<th>No.</th>
				<th>Username</th>
				<th>Password</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>User Status</th>
				<th>National ID</th>
				<th>Phone</th>
				<th>Email</th>
			</tr>

			<?php
				$con = mysqli_connect("localhost","root","1","store");
				if(!$con){
					die("Connection failed: ".mysqli_connect_error());
				}	
				$sql = "SELECT * FROM user";
				$result = mysqli_query($con,$sql);

				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row["rec_num"]."</td>";
						echo "<td>".$row["username"]."</td>";
						echo "<td>".$row["password"]."</td>";
						echo "<td>".$row["firstname"]."</td>";
						echo "<td>".$row["lastname"]."</td>";
						echo "<td>".$row["status"]."</td>";
						echo "<td>".$row["nationnalID"]."</td>";
						echo "<td>".$row["phone"]."</td>";
						echo "<td>".$row["email"]."</td></tr>";
					}
				}
			?>

		</table>
		</center>
		
	</body>
</html>
