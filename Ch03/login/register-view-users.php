 <?php                                                                       
session_start();
if (!isset($_SESSION['user_level']))
{ header("Location: login.php");
  exit();
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Template for an interactive web page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row"
style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
  <?php include('header.php'); ?>
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('nav.php'); ?> 
      </ul>
  </nav>
<!-- Center Column Content Section -->
  <div class="col-sm-8">
  <h2 class="text-center">These are the registered users</h2>
<p>
<?php 
try {
// This script retrieves all the records from the users table.
require('mysqli_connect.php'); // Connect to the database.
// Make the query:
// Nothing passed from user safe query									#1
$query = "SELECT CONCAT(last_name, ', ', first_name) AS name, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y') AS ";
$query .= "regdat FROM users ORDER BY registration_date ASC";		
$result = mysqli_query ($dbcon, $query); // Run the query.
if ($result) { // If it ran OK, display the records.
// Table header. 									#2
echo '<table class="table table-striped">
<tr><th scope="col">Name</th><th scope="col">Date Registered</th></tr>';				
// Fetch and print all the records:							#3
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo '<tr><td>' . $row['name'] . '</td><td>' . $row['regdat'] . '</td></tr>'; }
    echo '</table>'; // Close the table so that it is ready for displaying.
    mysqli_free_result ($result); // Free up the resources.
} else { // If it did not run OK.
// Error message:
echo '<p class="error">The current users could not be retrieved. We apologize';
echo ' for any inconvenience.</p>';
// Debug message:
// echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
exit;
} // End of if ($result) 
mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e) // We finally handle any problems here                
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
   }
?>

  </div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2">
      <?php include('info-col.php'); ?> 
	</aside>
  </div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;">
  <?php include('footer.php'); ?>
</footer>
</div>
</body>
</html>
