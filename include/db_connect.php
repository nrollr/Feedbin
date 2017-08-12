<?php
	$db = new mysqli("hostname", "username", "password", "Feedbin");   // Change according to your own settings
	$db->set_charset("utf8");
		if ($db->connect_errno) {
	    	echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error; }
?>