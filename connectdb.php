<?php
/// example2_connect_db.php
## flush all mysql tables
$db_user='root';
$db_pwd='1';
// `mysqladmin flush-tables -u$db_user -p$db_pwd`;

$dbname='store';
`mysql --user=$db_user --password=$db_pwd -e "CREATE DATABASE IF NOT EXISTS $dbname"`;

if (!isset($handle)){ 
		$handle=mysqli_connect("localhost", $db_user, $db_pwd,$dbname);
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
            include('../core/core_tail.php');
			exit();
		}
		/* change character set to utf8 */
		if (!mysqli_set_charset($handle, "utf8")) {
			printf("Error loading character set utf8: %s\n", mysqli_error($handle));
		}
}


$all_db_table='  ';
$sql = "SHOW TABLES FROM $dbname";
$result = mysqli_query($handle,$sql);
while ($row = mysqli_fetch_row($result)) {
    $all_db_table .= "{$row[0]} ";
}

$pos = strpos($all_db_table, "user ");
if ($pos === false) {    
     //create_table
	$query="create table user (
				rec_num      INT UNSIGNED NOT NULL AUTO_INCREMENT,
				username     varchar(80) NOT NULL,
				password     varchar(80) NOT NULL,
				firstname	 varchar(30) NOT NULL,
				lastname	 varchar(30) NOT NULL,				
				status       varchar(10) NOT NULL,
				nationnalID	 varchar(15) NOT NULL,
				phone		 varchar(11) NOT NULL,
				email 		 varchar(30) NOT NULL,
				PRIMARY KEY (rec_num)
				) ENGINE=MyISAM DEFAULT CHARSET='utf8' ";
	mysqli_query($handle,$query);
}
?>
