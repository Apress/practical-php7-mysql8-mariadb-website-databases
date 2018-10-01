<?php                                                                      
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{
 header("Location: login.php");
  exit();
}
define('ERROR_LOG', 'errors.log');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin View All Houses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="transparent.css">
<script src='https://www.google.com/recaptcha/api.js'></script>   
</head>
<body>
<div class="container" style="margin-top:10px">
<!-- Header Section -->
<header>
  <?php include('includes/header_3btn.php'); ?>
</header>
<div class="content mx-auto" id="contents" style="padding-top:10px">
<!-- Body Section -->
  <div class="row" style="padding: 10px;">

<div class="col-sm-12">
<h4 class="text-center">Houses displayed four at-a-time</h4>
<h5>
	<?php
	If (!empty($errorstring)) {
		echo $errorstring;
	}
	?>
</h5>
<?php 
try {
// This script retrieves all the records from the users table.
require ('mysqli_connect.php'); // Connect to the database.
//set the number of rows per display page
$pagerows = 4;
// Has the total number of pages already been calculated?
if (isset($_GET['pages'])) {
$pages = (filter_var($_GET['pages'], FILTER_SANITIZE_NUMBER_INT));
} else {
//use the next block of code to calculate the number of pages
//First, check for the total number of records
$query = "SELECT COUNT(ref_number) FROM houses";
$result = mysqli_query ($dbcon, $query);
$row = mysqli_fetch_array ($result, MYSQLI_NUM);
$records = $row[0];
//Now calculate the number of pages
if ($records > $pagerows){ //if the number of records will fill more than one page
//Calculatethe number of pages and round the result up to the nearest integer
$pages = ceil ($records/$pagerows);
}else{
$pages = 1;
}
}//page check finished. Declare which record to start with
If (isset($_GET['start'])) {
$start = (filter_var($_GET['start'], FILTER_SANITIZE_NUMBER_INT));
} else {
$start = 0;
}
// Make the query:
$query = "SELECT ref_number, location, thumb, price, mini_description, bedrooms, status ";
$query .= "FROM houses ORDER BY ref_number DESC LIMIT ?, ?";
		
    $q = mysqli_stmt_init($dbcon);
    mysqli_stmt_prepare($q, $query);
    // use prepared statement to insure that only text is inserted
    // bind fields to SQL Statement
    mysqli_stmt_bind_param($q, 'ii', $start, $pagerows );
    // execute query
    mysqli_stmt_execute($q);

$result = mysqli_stmt_get_result($q);
//$houses = mysqli_num_rows($result);
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table class="table table-striped table-sm" style="color: black; background-color:white;">
<tr>
<th scope="col">Ref-Num</th>
<th scope="col">Location</th>
<th scope="col">Thumb</th>
<th scope="col">Price</th>
<th scope="col">Features</th>
<th scope="col">Bedrooms</th>
<th scope="col">Status</th>
</tr>';	
// Fetch and print all the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// Remove special characters that might already be in table to 
	// reduce the chance of XSS exploits
	$ref_number = htmlspecialchars($row['ref_number'], ENT_QUOTES);
	$location = htmlspecialchars($row['location'], ENT_QUOTES);
	$thumb = htmlspecialchars($row['thumb'], FILTER_FLAG_NO_ENCODE_QUOTES);
	$price = htmlspecialchars($row['price'], ENT_QUOTES);
	$mini_description = htmlspecialchars($row['mini_description'], ENT_QUOTES);
	$bedrooms = htmlspecialchars($row['bedrooms'], ENT_QUOTES);
	$status = htmlspecialchars($row['status'], ENT_QUOTES);
	echo '<tr>
	<td scope="row">' . $ref_number . '</td>
	<td scope="row">' . $location . '</td>
	<td scope="row"><img src='. $thumb . '></td>
	<td scope="row">' . $price . '</td>
	<td scope="row">' . $mini_description . '</td>
	<td scope="row">' . $bedrooms . '</td>
	<td scope="row">' . $status . '</td>
	</tr>';	
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Message:	
	$errorstring = '<p class="text-center">The record could not be retrieved. ';
	$errorstring .= 'We apologize for any inconvenience.</p>';
	// Debugging message:
	//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/houses
$q = "SELECT COUNT(ref_number) FROM houses";
$result = mysqli_query ($dbcon, $q);
$row = mysqli_fetch_array ($result, MYSQLI_NUM);
$houses = (filter_var($row[0], FILTER_SANITIZE_NUMBER_INT));
mysqli_close($dbcon); // Close the database connection.
echo "<p class='text-center' style='color:black'>Total found: $houses</p>";
if ($pages > 1) {
echo '<h5 class="text-center">';
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
echo '<a href="advert_houses.php?start=' . ($start - $pagerows) . '&pages=' . $pages . '">Previous</a> ';
}
//Create a Next link
if ($current_page != $pages) {
echo '<a href="advert_houses.php?start=' . ($start + $pagerows) . '&pages=' . $pages . '">Next</a> ';
}
echo '</h5>';
}
}
catch(Exception $e) // We finally handle any problems here                
   {
	      // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   //  $date = date(‘m.d.y h:i:s’);
   //  $errormessage = $e->getMessage();
   //  $eMessage = $date . “ | Exception Error | “ , $errormessage . |\n”;
  //   error_log($eMessage,3,ERROR_LOG);
     // e-mail support person to alert there is a problem
   //  error_log(“Date/Time: $date – Exception Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Exception Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

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
?>
</div><!-- End of table display content -->
</div>
</div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php include ('includes/footer.php'); ?>
</footer>
</div>
</div>
</div>
</body>
</html>