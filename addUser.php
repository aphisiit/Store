<?php  
	session_start(); 
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$status = $_POST['status'];
	$nationnalID = $_POST['nationnalID'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	if($_POST['username'] == '' || $_POST['password'] == '' || $_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['status'] == ''
		|| $_POST['nationnalID'] == '' || $_POST['phone'] == '' || $_POST['email'] == ''){
		echo '<script language="javascript">alert("Please enter data to all field !!!");</script>';
		echo '<script type="text/javascript"> window.open("profile.php","_self");</script>';      				
	}
	else{
		include('connectdb.php');			
		
		$con = mysqli_connect("localhost","root","1","store");
		//check connection
		if(!$con){
			die("Connection failed: ".mysqli_connect_error());
		}


		$data = "INSERT INTO user(username,password,firstname,lastname,status,nationnalID,phone,email)
		VALUES('".$username."','".MD5($password)."','".$firstname."','".$lastname."','".$status."','".$nationnalID."','".$phone."','".$email."')";

		if(mysqli_query($con,$data)){
				echo '<script language="javascript">alert("New data created sucessfully");</script>';				
				echo '<script type="text/javascript"> window.open("profile.php","_self");</script>';      				
		}
		else{
			echo "Error:".$sql."<br>".mysqli_error($con);
		}			
	}
?>
