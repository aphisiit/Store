<?php  
	session_start(); 
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	if($_POST['user'] == ''){
		echo '<script language="javascript">alert("Please enter username");</script>';
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      				
	}
	else if($_POST['pass'] == ''){
		echo '<script language="javascript">alert("Please enter passwords");</script>';
		echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      				
	}
	else{
		include('connectdb.php');			
		
		$con = mysqli_connect("localhost","root","1","store");

		if(!$con){
			die("Connection failed: ".mysqli_connect_error());
		}

		$check = "SELECT * FROM user WHERE username='admin'";
		$result = mysqli_query($con,$check);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if(!$row){
			$admin = "INSERT INTO user(username,password,firstname,lastname,status,nationnalID,phone,email)
			VALUES('admin',MD5('password'),'Aphisit','Namracha','admin','1671074536277','0911450179','aphisiit086757@hotmail.com')";

			if(mysqli_query($con,$admin)){
	
			}
			else{
				echo "Error:".$sql."<br>".mysqli_error($con);
			}			
		}
		$check_log = "SELECT * FROM user where username = '".$user."' and password = '".MD5($pass)."'";
		$temp = mysqli_query($con,$check_log);
		$num = mysqli_fetch_array($temp);
		if(!$num){			
			echo '<script language="javascript">alert("username or password may be wrong,please try again");</script>';
			echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      							
		}
		else{
			if($num['status'] == 'admin'){
				$temp = $num['firstname']." ".$num['lastname'];
				echo "<script language=\"javascript\">alert('Hello Administrator : $temp');</script>";
				echo '<script type="text/javascript"> window.open("main.php","_self");</script>'; 
				$_SESSION[ses_username] = $num['username'];
				$_SESSION[ses_password] = $num['password'];
				$_SESSION[ses_status] = "admin";     								
			}
			else{
				$temp = $num['firstname']." ".$num['lastname'];
				echo "<script language=\"javascript\">alert('Welcome User : $temp');</script>";
				echo '<script type="text/javascript"> window.open("main.php","_self");</script>';      	
				$_SESSION[ses_username] = $num['username'];
				$_SESSION[ses_password] = $num['password'];
				$_SESSION[ses_status] = "user";							
			}
		}
	}
?>
