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
		//check connection
		if(!$con){
			die("Connection failed: ".mysqli_connect_error());
		}
		//mysqli_select_db("user", $con);
		$check = "SELECT * FROM user WHERE username='admin'";
		$result = mysqli_query($con,$check);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//		$num_rows = mysqli_num_rows($result);
//		echo mysqli_num_rows($result)."rows\n";
//		
		if(!$row){
			$admin = "INSERT INTO user(username,password,firstname,lastname,status,nationnalID,phone,email)
			VALUES('admin', 'password','Aphisit','Namracha','admin','1671074536277','0911450179','aphisiit086757@hotmail.com')";

			if(mysqli_query($con,$admin)){
//				echo '<script language="javascript">alert("New record created sucessfully");</script>';				
//				echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      				
			}
			else{
				echo "Error:".$sql."<br>".mysqli_error($con);
			}			
//			echo '<script language="javascript">alert("This username already exists");</script>';
		}
		else{
//				echo '<script language="javascript">alert("This username already exists");</script>';
//				echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      				
		}
		$check_log = "SELECT * FROM user where username = '".$user."' and password = '".$pass."'";
		$temp = mysqli_query($con,$check_log);
		$num = mysqli_fetch_array($temp);
		if(!$num){			
			echo '<script language="javascript">alert("username or password may be wrong,please try again");</script>';
			echo '<script type="text/javascript"> window.open("index.php","_self");</script>';      							
		}
		else{
			if($num['status'] == 'admin'){
				echo '<script language="javascript">alert("Welcome admin");</script>';
				echo '<script type="text/javascript"> window.open("main.php","_self");</script>'; 
				$_SESSION[ses_username] = $num['username'];
				$_SESSION[ses_password] = $num['password'];
				$_SESSION[ses_status] = "admin";     								
			}
			else{
				echo '<script language="javascript">alert("Welcome user");</script>';
				echo '<script type="text/javascript"> window.open("main.php","_self");</script>';      	
				$_SESSION[ses_username] = $num['username'];
				$_SESSION[ses_password] = $num['password'];
				$_SESSION[ses_status] = "user";							
			}
		}
	}
?>
