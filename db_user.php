<?php
$db_user='root';
$db_pwd='1';
$db_name='Store';
`mysql --user=$db_user --password=$db_pwd -e "CREATE DATABASE IF NOT EXISTS $db_name"`;

if(!isset($handle)){
	$handle = mysql_connect("localhost",$db_user,$db_pwd,$db_name);	
	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		include('../core/core_tail.php');
		exit();	
	}
	if(!mysqli_set_charset($handle, "utf8")){
		printf("Error loading character set utf8 : %s\n", mysqli_error($handle));
	}
}
$all_db_table = ' ';
$sql = "SHOW TABLES FROM $dbname";
$result = mysqli_query($handle,$sql);
while($row = mysqli_fetch_row($result)){
	$all_db_table .= "{$row[0]}";
}
$pos = strpos($all_db_table,"project");
if($pos === false){
	$query="create table user(
			username varchar(10),
			password varchar(30),
			firstName varchar(50),
			lastName varchar(50),
			born DATE,
			age INT,
			sex varchar(10),
			nationalID varchar(14),
			phone varchar(11),
			email varchar(30), 
			class varchar(6)
		)ENGINE=MyISAM DEFAULT CHARSET='utf8'";
	mysqli_query($handle,$query);
/*	
$link = mysql_connect("localhost",$db_user,$db_pwd,$db_name);
$result = mysql_query("SELECT * FROM user", $handle);
$num_rows = mysql_num_rows($result);

if($num_rows <= 0){
	$query="insert user (username,password,firstName,lastName,born,age,sex
		nationalID,phone,email) values ('admin','password','Aphisit','Namracha'
		,'2008-7-04',22,'Male','1671000034511','0911450179'
		,'aphisiit086757@hotmail'.com,'admin')";
	mysqli_query($handle,$query);
}
	*/
}

?>
