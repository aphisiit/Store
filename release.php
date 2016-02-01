<?php 
	session_start();

	if(!isset($_SESSION[ses_username]))
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
?>
<html>
	<title>Release</title>
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
			<li><a href="add.php">Add product</a></li>
			<li><a class="active" href="release.php">Sell product</a></li>				
			<li><a href="about.php">About</a></li>		
		<ul style="float:right;list-style-type:none;">
			<?php
				if($_SESSION[ses_status] == "admin")
					echo "<li><a href=\"profile.php\">Manage User</a></li>";
			?>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>

		<center><form action="releaseProduct.php" method="POST" id="addForm">
			ProductID :&nbsp; 
			<input name="productID" type="text" size="10">&nbsp; 
			Number :&nbsp; 
			<input name="amount" type="text" size="10">&nbsp;&nbsp; 
			<input class="savebtn" name="submit" type="submit" value="Submit">&nbsp;
			<input class="canclebtn" name="clear" type="button" value="Clear" onclick="resetAddForm()">
		</form></center> 
		
		<?php
			if($_SESSION[ses_sell] == "selled"){
				echo "<center><table style=\"width:80%\">";				
					echo "<tr>";
						echo "<th>No.</th>";
						echo "<th>ProductID</th>";
						echo "<th>Product Name</th>";
						echo "<th>Brand</th>";
						echo "<th>Amount of Product</th>";
						echo "<th>Price per item (THB)</th>";
					echo "</tr>";				
						$con = mysqli_connect("localhost","root","1","store");
						if(!$con){
							die("Connection failed: ".mysqli_connect_error());
						}	
						$data = "SELECT * FROM product WHERE ProductID='$_SESSION[ses_productID]'";
						$result = mysqli_query($con,$data);

						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr><td>".$row["rec_num"]."</td>";
								echo "<td>".$row["productID"]."</td>";
								echo "<td>".$row["productName"]."</td>";
								echo "<td>".$row["brand"]."</td>";
								echo "<td>".$row["amount"]."</td>";						
								echo "<td>".$row["price"]."</td></tr>";
							}
						}				
					echo "</table>";
				echo "</center>";
				unset($_SESSION[ses_sell]);
				unset($_SESSION[ses_productID]);
			}
			else{
				echo "<center><table style=\"width:80%\">";				
					echo "<tr>";
						echo "<th>No.</th>";
						echo "<th>ProductID</th>";
						echo "<th>Product Name</th>";
						echo "<th>Brand</th>";
						echo "<th>Amount of Product</th>";
						echo "<th>Price per item (THB)</th>";
					echo "</tr>";				
						$con = mysqli_connect("localhost","root","1","store");
						if(!$con){
							die("Connection failed: ".mysqli_connect_error());
						}	
						$data = "SELECT * FROM product";
						$result = mysqli_query($con,$data);

						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr><td>".$row["rec_num"]."</td>";
								echo "<td>".$row["productID"]."</td>";
								echo "<td>".$row["productName"]."</td>";
								echo "<td>".$row["brand"]."</td>";
								echo "<td>".$row["amount"]."</td>";						
								echo "<td>".$row["price"]."</td></tr>";
							}
						}				
					echo "</table>";
				echo "</center>";
			}
		?>
	</body>
</html>
