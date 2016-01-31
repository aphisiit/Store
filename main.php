<?php 
	session_start();

	if(!isset($_SESSION[ses_username]))
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
?>
<html>
	<title>Main</title>
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
		tr:hover {?
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
	</head>
	<body>
		
		<center>
		<?php			
			echo "<h2>Hello : ".$_SESSION[ses_nameuser]."</h2>";			
		?>
		</center>
		<center><h1>Welcom to Store Management System</h1></center><br>
		
		<ul>
			<li><a class="active" href="main.php">All product</a></li>
			<li><a href="add.php">Add product</a></li>
			<li><a href="release.php">Sell product</a></li>					
			<li><a href="about.php">About</a></li>		
		<ul style="float:right;list-style-type:none;">
			<?php				
				if($_SESSION[ses_status] == "admin")
					echo "<li><a href=\"profile.php\">Manage User</a></li>";
			?>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>
		
		<center><table style="width:95%">
			<caption>Table below is data about stock in store</caption>
			<tr>
				<th>No.</th>
				<th>ProductID</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Amount of Product</th>
				<th>Price/item(THB)</th>
				<th>Company</th>
				<th>Phone</th>
				<th>Email</th>
			</tr>
			<?php
				$con = mysqli_connect("localhost","root","1","store");
				if(!$con){
					die("Connection failed: ".mysqli_connect_error());
				}	
				$data = "SELECT * FROM product";
				$result = mysqli_query($con,$data);

				$count = 1;
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$id = $row['rec_num'];
						echo "<tr><td>".$count."</td>";
						echo "<form action=\"updateProduct.php?id=$id\" method=\"POST\">";
						echo "<td><input name=\"productID\" type=\"text\" size=\"10\" value=\"".$row["productID"]."\"</td>";
						echo "<td><input name=\"productName\" type=\"text\" size=\"15\" value=\"".$row["productName"]."\"></td>";
						echo "<td><input name=\"brand\" type=\"text\" size=\"15\" value=\"".$row["brand"]."\"></td>";
						echo "<td><input name=\"amount\" type=\"text\" size=\"10\" value=\"".$row["amount"]."\"></td>";
						echo "<td><input name=\"price\" type=\"text\" size=\"10\" value=\"".$row["price"]."\"></td>";
						echo "<td><input name=\"company\" type=\"text\" value=\"".$row["company"]."\"></td>";
						echo "<td><input name=\"phone\" type=\"text\" size=\"10\" value=\"".$row["phone"]."\"></td>";
						echo "<td><input name=\"email\" type=\"text\" value=\"".$row["email"]."\"></td>";
						echo "<td><input name=\"submit\" class=\"savebtn\" type=\"submit\" value=\"Update\"></td></form>";
						echo "<td><a href=\"deleteProduct.php?id=$id\"><input name=\"delete\" class=\"canclebtn\" type=\"button\" value=\"Delete\"></a></td></tr>";
						$count++;
					}
				}
			?>
		</table>
		</center>
	</body>
</html>
