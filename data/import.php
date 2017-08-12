<?php
    header("Content-type: text/html; charset=utf-8");
    require "../include/db_connect.php";	
    
    $jsondata = file_get_contents('starred.json');   // Read json file contents
    $data = json_decode($jsondata, true);    		// Convert to associative array
	foreach($data as $row)
	 {
	    $entry = $row['title'];
        $title = mysql_real_escape_string($entry); // Convert characters to escaped data
	    $url = $row['url'];
	    $published = $row['published'];
        $date = strtotime($published); // Convert to Unix timestamp
      
    ##Insert into MySQL table
    $sql = "INSERT INTO `starred` ( `date`, `title`, `url`) VALUES('$date', '$title', '$url')";  
    mysqli_query($db,$sql);
      }    

    $count = $db->query("SELECT COUNT(1) FROM starred");  
    $row = mysqli_fetch_array($count);
    $total = $row[0];  // Count the number of rows
        echo "Total number of starred articles imported: " . $total . "<br>View imported data: <a href='http://localhost'>link</a>";

    mysqli_close($db); // Close the database connection
?> 
