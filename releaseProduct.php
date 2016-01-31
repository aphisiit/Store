<?php  
	session_start(); 
	
	$productID = $_POST['productID'];
	$amount = $_POST['amount'];
	
	if($_POST['productID'] == '' || $_POST['amount'] == ''){
		echo '<script language="javascript">alert("Please enter data to all field !!!");</script>';
		echo '<script type="text/javascript"> window.open("release.php","_self");</script>';      				
	}
	else{
		include('connectdb.php');			
		
		$con = mysqli_connect("localhost","root","1","store");
		//check connection
		if(!$con){
			die("Connection failed: ".mysqli_connect_error());
		}

		$check = "SELECT * FROM product WHERE productID='$productID'";
		$result = mysqli_query($con,$check);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$amount = $row['amount'] - $amount;		


		$data = "UPDATE product SET amount='$amount' WHERE productID='$productID'";

		if(mysqli_query($con,$data)){
			echo '<script language="javascript">alert("Product is selled sucessfully");</script>';				
			echo '<script type="text/javascript"> window.open("release.php","_self");</script>';      				
			$_SESSION[ses_sell] = "selled";
			$_SESSION[ses_productID] = $productID;
		}
		else{
			echo "Error:".$sql."<br>".mysqli_error($con);
		}			
	}
?>
