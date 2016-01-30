<?php  
	session_start(); 

	$id = $_GET['id'];

	$productID = $_POST['productID'];
	$productName = $_POST['productName'];
	$brand = $_POST['brand'];
	$amount = $_POST['amount'];
	$price = $_POST['price'];
	$company = $_POST['company'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	if($_POST['productID'] == '' || $_POST['productName'] == '' || $_POST['brand'] == '' 
		|| $_POST['amount'] == '' || $_POST['price'] == '' || $_POST['company'] == ''
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

		$data = "UPDATE product SET productID='$productID',productName='$productName',brand='$brand',amount='$amount',
			price='$price',company='$company',phone='$phone',email='$email' WHERE rec_num='".$id."'";

		if(mysqli_query($con,$data)){	
			echo '<script language="javascript">alert("Data updated sucessfully");</script>';				
			echo '<script type="text/javascript"> window.open("main.php","_self");</script>';      				
		}
		else{
			echo "Error:".$sql."<br>".mysqli_error($con);
		}			
	}
?>
