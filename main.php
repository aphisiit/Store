<?php ?>
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
		tr:hover {
			background-color: #82FA58;
		}
	</style>
	</head>
	<body>
		
		<center><h1>Welcom to Store Management System</h1></center><br>
		
		<ul>
			<li><a class="active" href="main.php">All product</a></li>
			<li><a href="add.php">Update store</a></li>
			<li><a href="order.php">Release commodity</a></li>
			<li><a href="order.php">Order product</a></li>5		
			<li><a href="search.php">Search and Delete Product</a></li>
			<li><a href="about.php">About</a></li>		
		<ul style="float:right;list-style-type:none;">
			<li><a href="profile.html">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</ul><br>
		
		<center><table style="width:80%">
			<caption>Table below is data about stock in store</caption>
			<tr>
				<th>ProductID</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Amount of Product</th>
				<th>Price per item (THB)</th>
			</tr>
			<tr>
				<td>A1234</td>
				<td>Fan</td>
				<td>Hatari</td>
				<td>123</td>
				<td>1</td>
			</tr>
			<tr>
				<td>A1234</td>
				<td>Fan</td>
				<td>Hitachi</td>
				<td>123</td>
				<td>1</td>
			</tr>
		</table>
		</center>
	</body>
</html>
