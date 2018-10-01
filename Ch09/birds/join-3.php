<?php
define('ERROR_LOG','errorlog.log');
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Three Tables Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="birds.css">
</head>
<body>
<div class="container" style="margin-top:30px;border: 3px black solid;">
<!-- Header Section -->
<header class="jumbotron text-center row" id="includeheader"
style="margin-bottom:2px; padding:20px;background-color:#CCFF99;"> 
  <?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('includes/nav.php'); ?> 
      </ul>
  </nav>
<!-- Center Column Content Section -->
<div class="col-sm-8 row" style="padding-left: 30px;">
<h2>The location and habitat of the Devon Bird Reserves</h2>
<p>
<?php 
try {
require ('mysqli_connect.php'); // Connect to the database
// Make the query:
$q = "SELECT bird_name, best_time, location, bird_hides, entrance_member, 
entr_non_member FROM birds 
INNER JOIN location USING (bird_id) 
INNER JOIN reserves_info USING (location_id)";		
$result = mysqli_query ($dbcon, $q); // Run the query
if ($result) { // If it ran OK, display the records
// Table header
?>
<table class="table table-responsive table-striped" style="background: white;color:black;">
<tr>
<th scope="col">Birds Name</th>
<th scope="col">Best Time</th>
<th scope="col">Location</th>
<th scope="col">Bird Hides</th>
<th scope="col">Entrance Member</th>
<th scope="col">Entrance Non-Member</th>
</tr>
<?php
// Fetch and print all the records
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$bird_name = htmlspecialchars($row['bird_name'], ENT_QUOTES);
	$best_time = htmlspecialchars($row['best_time'], ENT_QUOTES);
	$location = htmlspecialchars($row['location'], ENT_QUOTES);
	$bird_hides = htmlspecialchars($row['bird_hides'], ENT_QUOTES);
	$entrance_member = htmlspecialchars($row['entrance_member'], ENT_QUOTES);
	$entrance_non_member = htmlspecialchars($row['entr_non_member'], ENT_QUOTES);
	echo '<tr>
	<td scope="row">' . $bird_name . '</td>
	<td scope="row">' . $best_time . '</td>
	<td scope="row">' . $location . '</td>
	<td scope="row">' . $bird_hides . '</td>
	<td scope="row">' . $entrance_member . '</td>
	<td scope="row">' . $entrance_non_member . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table
	mysqli_free_result ($result); // Free up the resources	
} else { // If it did not run OK
// Message
	echo '<p class="error">The current data could not be retrieved. ';
	echo 'We apologize for any inconvenience.</p>';
	// Debugging message
	echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection
}
   catch(Error $e)
   {
           // print "An Error occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
    // $date = date(‘m.d.y h:i:s’);
    // $errormessage = $e->getMessage();
    // $eMessage = $date . “ | Error | “ , $errormessage . |\n”;
    // error_log($eMessage,3,ERROR_LOG);
    // // e-mail support person to alert there is a problem
   //  error_log(“Date/Time: $date – Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

   }
?></p>
</div><!-- End of the view birds page content. -->
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2" style="padding-top: 20px; padding-right: 0px;">
      <?php include('includes/info-col.php'); ?> 
	</aside>
  </div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;background-color:#CCFF99;">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</div>
</body>
</html>
