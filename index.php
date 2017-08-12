<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/default.css" rel="stylesheet" >

  </head>
<body>
	<div class="container">
		<div class="row">
  			<div class="col-md-2"></div>
  			<div class="col-md-8">
				<?php
				header("Content-type: text/html; charset=utf-8");
				include "include/db_connect.php";

				$count = $db->query("SELECT COUNT(1) FROM starred");  
				$row = mysqli_fetch_array($count);
				$total = $row[0];  // Count numbers of rows 

				$results = $db->query("SELECT * FROM starred WHERE status=1 ORDER BY date DESC");
				if ($results->num_rows != 0){
					echo "<div class='page-header'><h2>Feedbin  <small>starred items</small>";
					echo " <span class='badge'>". $total ."</span></h2></div>";
					
					while ($rows = $results->fetch_assoc()) {
						$title = $rows['title'];
						$date = $rows['date'];
						$url = $rows['url'];

						echo "<strong>$title</strong> <i class='fa fa-star'></i></br>";
						echo "<a href='" . $url . "'>$url</a><br>";
						echo "Date: " . gmdate("d M y", $date) . "<br><br>";
					}
				}
				?>
			</div>	
  			<div class="col-md-2"></div>
  		</div>					
	</div>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.14.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>