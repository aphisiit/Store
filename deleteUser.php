<?php
	include("connectdb.php");

	$rec_num = $_GET["rec_num"];

	$sql="delete from user where rec_num='".$rec_num."'";
	mysqli_query($con,$sql) or die($sql);
	header("location:profile.php");
?>