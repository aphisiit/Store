<?php  
	session_start(); 

	$id = $_GET['id'];

	include('connectdb.php');			

	$con = mysqli_connect("localhost","root","1","store");		
		
		//check connection
	if(!$con){
		die("Connection failed: ".mysqli_connect_error());
	}
	$data = "DELETE FROM user WHERE rec_num='".$id."'";

	if(mysqli_query($con,$data)){	
		echo '<script language="javascript">alert("Data deleted sucessfully");</script>';				
		echo '<script type="text/javascript"> window.open("profile.php","_self");</script>';      				
	}
	else{
		echo "Error:".$sql."<br>".mysqli_error($con);
	}			
	
?>