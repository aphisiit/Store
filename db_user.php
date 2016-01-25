<?php
$db_user='root';
$db_pwd='1';
$db_name='project';
`mysql --user=$db_user --password=$db_pwd -e "CREATE DATABASE IF NOT EXISTS $db_name";

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
			sex CHAR,
			nationalID varchar(14),
			phone varchar(11),
			email varchar(30) 
		)ENGINE=MyISAM DEFAULT CHARSET='utf8'";
	mysqli_query($handle,$query);
}
?>
