<?php                                                                                     
session_start();
// Data from valid source?
if ((empty($_SESSION['user_level'])) && (!isset($_SESSION['previous_url']) or ($_SESSION['previous_url'] != "index")))
{ header("Location: index.php");
exit();
}
else 
{
if (!empty($_SESSION['user_level'])) {
	$user_level = $_SESSION['user_level'];

if(($user_level == 1) && (!empty($_POST['ref_number'])))
{
	$ref_number = htmlspecialchars($_POST['ref_number'], ENT_QUOTES);
} 
} else { $user_level = 0; }
}
define('ERROR_LOG',"errors.log");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Found Houses Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="transparent.css">
</head>
<body>
<div class="container" style="margin-top:10px">
<!-- Header Section -->
<header>
<?php
if ($user_level == 0)
{
include("includes/header_found_houses.php");
}
else if($user_level==1)
{
include('includes/header_4btn.php');
}
?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
  <div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-12 text-center" style="padding:20px; margin-top: 5px;">
	<!--Start of admin add paintings content-->
<div class="row">
    
<h3>To arrange a viewing please use the the Contact Us button on the menu and 
quote the reference number.</h3>
<?php 

// This script retrieves all the records from the houses table
try {
require ('mysqli_connect.php'); // Connect to the database.
// Make the query:					#3
$query = "SELECT ref_number, location, thumb, price, mini_description, type, bedrooms, ";
$query .= "status FROM houses ";
//if(($user_level == 1) && (!empty($_POST['ref_number']))) {
	 if((!empty($_POST['ref_number']))) {
$query .= "WHERE ref_number=? "; 
} else {
$query .= "WHERE location= ? AND ";
$query .= "(price <= ?) AND (price >= (? - 100000)) AND ";
$query .= "type= ? AND bedrooms= ?  ORDER BY ref_number ASC ";	
}
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);

// bind values to SQL Statement
//if(($user_level == 1) && (!empty($_POST['ref_number']))) {
	if((!empty($_POST['ref_number']))) {
	mysqli_stmt_bind_param($q, 's', $ref_number);
} else {
$location = htmlspecialchars($_POST['location'], ENT_QUOTES);
$price = htmlspecialchars($_POST['price'], ENT_QUOTES);
$type = htmlspecialchars($_POST['type'], ENT_QUOTES);
$bedrooms = htmlspecialchars($_POST['bedrooms'], ENT_QUOTES);
mysqli_stmt_bind_param($q, 'sssss', $location, $price, $price, $type, $bedrooms);
}
// execute query	 
mysqli_stmt_execute($q); 

$result = mysqli_stmt_get_result($q);

// SELECT is safe execution - read only
if ($result) { // If it ran OK, display the records.
// Table header.
?>
<table class="table table-responsive table-striped" style="background: white;color:black;">
<tr>
<th scope="col">Ref.</th>
<th scope="col">Location</th>
<th scope="col">Thumb</th>
<th scope="col">Price</th>
<th scope="col">Features</th>
<th scope="col">Bedrooms</th>
<th scope="col">Details</th>
<th scope="col">Status</th>
</tr>	
<?php
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// Remove special characters that might already be in table to 
	// reduce the chance of XSS exploits
	$ref_number = htmlspecialchars($row['ref_number'], ENT_QUOTES);
	$thumb = htmlspecialchars($row['thumb'], ENT_QUOTES);
	$price = htmlspecialchars($row['price'], ENT_QUOTES);
	$mini_description = htmlspecialchars($row['mini_description'], ENT_QUOTES);
	$bedrooms = htmlspecialchars($row['bedrooms'], ENT_QUOTES);
	$status = htmlspecialchars($row['status'], ENT_QUOTES);
	
	echo '<tr>
	<td scope="row">' . $row['ref_number'] . '</td>
	<td scope="row">' . $row['location'] . '</td>';
	if ($row['thumb'] == "")
	{echo '<td scope="row"><img src="images/thumbs/default.jpg">';}
    else { echo'<td scope="row">  <img src='.$row['thumb'] . '></td>';}
	echo'<td scope="row">' . $row['price'] . '</td>
	<td scope="row">' . $row['mini_description'] . '</td>
	<td scope="row">' . $row['bedrooms'] . '</td>
	<td scope="row"><a href="house_details.php?ref_number=' . $row['ref_number'] . 
	'">Details</a></td>
	<td scope="row">' . $row['status'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
	} else { // If it did not run OK.
// Public message:
	echo '<p class="center-text">The current users could not be retrieved.';
	echo 'We apologize for any inconvenience.</p>';
	// Debugging message:
	//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>'; 
	//Show $q is debug mode only
} // End of if ($result). Now display the total number of records/members.
mysqli_close($dbcon); // Close the database connection.
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
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<h5 class="text-center">No houses displayed? Sorry we have nothing that matches 
your requirements at the moment</h5>
</div>
</div>
</div><!-- End of table display content -->
</div>
</div>
</div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php include ('includes/footer.php'); ?>
</footer>
</div>
</div>
</body>
</html>