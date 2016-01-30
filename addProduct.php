<?php  
	session_start(); 
	
	$productID = $_POST['productID'];
	$productName = $_POST['productName'];
	$brand = $_POST['brand'];
	$amount = $_POST['amount'];
	$price = $_POST['price'];
	
	if($_POST['productID'] == '' || $_POST['productName'] == '' || $_POST['brand'] == '' || $_POST['amount'] == '' || $_POST['price'] == ''){
		echo '<script language="javascript">alert("Please enter data to all field !!!");</script>';
		echo '<script type="text/javascript"> window.open("add.php","_self");</script>';      				
	}
	else{
		include('connectdb.php');			
		
		$con = mysqli_connect("localhost","root","1","store");
		//check connection
		if(!$con){
			die("Connection failed: ".mysqli_connect_error());
		}


		$data = "INSERT INTO product(productID,productName,brand,amount,price)
		VALUES('".$productID."','".$productName."','".$brand."','".$amount."','".$price."')";

		if(mysqli_query($con,$data)){
				echo '<script language="javascript">alert("New data created sucessfully");</script>';				
				echo '<script type="text/javascript"> window.open("add.php","_self");</script>';      				
		}
		else{
			echo "Error:".$sql."<br>".mysqli_error($con);
		}			
	}
?>
