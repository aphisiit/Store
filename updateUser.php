<?php  
	session_start(); 

	$id = $_GET['id'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$status = $_POST['status'];
	$nationnalID = $_POST['nationnalID'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	if($_POST['username'] == '' || $_POST['password'] == '' || $_POST['firstname'] == '' 
		|| $_POST['lastname'] == '' || $_POST['status'] == '' || $_POST['nationnalID'] == ''
		|| $_POST['phone'] == '' || $_POST['email'] == ''){
		echo '<script language="javascript">alert("Please enter data to all field !!!");</script>';
		echo '<script type="text/javascript"> window.open("main.php","_self");</script>';      				
	}
	else{
		include('connectdb.php');			

		$con = mysqli_connect("localhost","root","1","store");		
		
		//check connection
		if(!$con){
			die("Connection failed: ".mysqli_connect_error());
		}
		
		$password = MD5($password);
		$data = "UPDATE user SET username='$username',password='$password',firstname='$firstname',lastname='$lastname',
			status='$status',nationnalID='$nationnalID',phone='$phone',email='$email' WHERE rec_num='".$id."'";

		if(mysqli_query($con,$data)){	
			echo '<script language="javascript">alert("Data updated sucessfully");</script>';				
			echo '<script type="text/javascript"> window.open("profile.php","_self");</script>';      				
		}
		else{
			echo "Error:".$sql."<br>".mysqli_error($con);
		}			
	}
?>
