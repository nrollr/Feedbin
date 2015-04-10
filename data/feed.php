<?php
    header("Content-type: text/html; charset=utf-8");
	$url ="https://feedbin.com/starred/THSYv5sdrKKOP92eQluQAQ.xml";  // Link to your own XML feed

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);

	$xmlString = curl_exec ($ch);
	curl_close($ch);

	// Load items from XML using the simplexml_load_string() method
	$xml=simplexml_load_string($xmlString);
	// print_r($xml);

	## Write items from XML to database 
	$db = mysql_connect("localhost", "username", "password");  
	mysql_select_db("Feedbin", $db) or die(mysql_error()); // Establish database connection

	foreach($xml->channel->item as $row) {
		$article = $row -> title;
		$title = mysql_real_escape_string($article); // Convert characters to escaped data
		$pubDate = $row -> pubDate;  // Date in RFC822 format
		$date = strtotime($pubDate); // Convert to Unix timestamp
		$link = $row -> link;	

	$sql = "INSERT IGNORE INTO `starred` (`date`, `title`, `url`) VALUES ('$date', '$title', '$link')";
	$results = mysql_query($sql);
		if(!$results) {
    	die("Database query failed: " . mysql_error());
		}

	}	
?>