<?php
    header("Content-type: text/html; charset=utf-8");

    ## Establish database connection
	$db = new mysqli("hostname", "username", "password");  // Change according to your own settings
	$db->set_charset("utf8");
		if ($db->connect_errno) {
	    	echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error; }

	## Create database
	$sql = "CREATE DATABASE Feedbin";
		if ($db->query($sql) === TRUE) {
			echo "Database created successfully <br />"; }

	## Create table
	mysqli_select_db($db,"Feedbin");
	$table = "CREATE TABLE `starred` (
		`date` int(11) DEFAULT NULL,
		`status` int(2) NOT NULL DEFAULT '1',
		`title` varchar(255) DEFAULT NULL,
		`url` varchar(255) DEFAULT NULL,
		UNIQUE KEY `date` (`date`)
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	if ($db->query($table) === TRUE) {
	    echo "Table created successfully"; }

	$db->close();
?>

