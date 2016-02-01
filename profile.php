<?php 
	session_start();

	if(!isset($_SESSION[ses_username]))
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
?>
<html>
	<title>Manage User</title>
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
		<center><h1>Wayne Enterprise Inc.</h1></center>
		<div align="right">
		<?php			
			echo "<h2>user : ".$_SESSION[ses_username]."</h2>";			
		?>
		</div>
		<ul>
			<li><a href="main.php">All product</a></li>
			<li><a href="add.php">Add product</a></li>
			<li><a href="release.php">Sell product</a></li>						
		<ul style="float:right;list-style-type:none;">			
			<?php
				if($_SESSION[ses_status] == "admin")
					echo "<li><a class=\"active\" href=\"profile.php\">Manage User</a></li>";
			?>		
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>
				
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
			<center><h2>Add user</h2><br>
				<form action="addUser.php" method="POST" id="addForm">									
						Username : 
						<input name="username" type="text" size="10">					
						Password : 
						<input name="password" type="text" size="10">									
						Firstname : 
						<input name="firstname" type="text" size="10">						
						Lastname : 
						<input name="lastname" type="text" size="10"><br><br>
						Status : 
						<input name="status" type="text" size="10">
						NationnalID : 
						<input name="nationnalID" type="text" size="14">
						Phone : 
						<input name="phone" type="text" size="12">
						Email : 
						<input name="email" type="text" size="15"><br><br>					
					<label>
						<input class="canclebtn" type="button" value="Clear Form" onclick="resetAddForm()">
						<input class="savebtn" type="submit" value="Add user">
					</label>						
				</form>
			</center><br>
			<?php
				$con = mysqli_connect("localhost","root","1","store");
				if(!$con){
					die("Connection failed: ".mysqli_connect_error());
				}	
				$sql = "SELECT * FROM user";
				$result = mysqli_query($con,$sql);

				$count = 1;
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['rec_num'];
						echo "<tr><td>".$count."</td>";
						echo "<form action=\"updateUser.php?id=$id\" method=\"POST\">";
						echo "<td><input name=\"username\" type=\"text\" size=\"10\" value=\"".$row["username"]."\"</td>";
						echo "<td><input name=\"password\" type=\"text\" size=\"10\" value=\"".$row["password"]."\"</td>";
						echo "<td><input name=\"firstname\" type=\"text\" size=\"10\" value=\"".$row["firstname"]."\"</td>";
						echo "<td><input name=\"lastname\" type=\"text\" size=\"10\" value=\"".$row["lastname"]."\"</td>";
						echo "<td><input name=\"status\" type=\"text\" size=\"8\" value=\"".$row["status"]."\"</td>";
						echo "<td><input name=\"nationnalID\" type=\"text\" size=\"15\" value=\"".$row["nationnalID"]."\"</td>";
						echo "<td><input name=\"phone\" type=\"text\" size=\"12\" value=\"".$row["phone"]."\"</td>";
						echo "<td><input name=\"email\" type=\"text\" size=\"30\" value=\"".$row["email"]."\"</td>";
						echo "<td><input name=\"submit\" class=\"savebtn\" type=\"submit\" value=\"Update\"></td></form>";
						echo "<td><a href=\"deleteUser.php?id=$id\"><input name=\"delete\" class=\"canclebtn\" type=\"button\" value=\"Delete\"></a></td></tr>";
						$count++;
					}
				}
			?>

		</table>
		</center>
		
	</body>
</html>
