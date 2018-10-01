<?php                                                                                     
session_start();
// Data from valid source?
if ((!empty($SESSION['user_level'])) && (!isset($_SESSION['previous_url'])
	or ($_SESSION['previous_url'] != "index")))
{ header("Location: index.php");
exit();
}
define('ERROR_LOG','errors.log');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>House Details Page</title>
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
<?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
  <div class="row mx-auto" style="padding-left: 10px; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-12 text-center" style="padding:20px; margin-top: 5px;">
	<!--Start of admin add paintings content-->
<div class="row">
    <div class="col-sm-5" style="background-color: white; padding-top: 10px;">
 <?php
try {
$ref_number = htmlspecialchars($_GET['ref_number'], ENT_QUOTES);
require ('mysqli_connect.php'); // Connect to the database.
// Make the query:					#3
$query = "SELECT price, full_description, full_picture ";
$query .= "FROM houses WHERE ref_number=?";	
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);

// bind values to SQL Statement
mysqli_stmt_bind_param($q, 's', $ref_number);

// execute query	 
mysqli_stmt_execute($q); 

$result = mysqli_stmt_get_result($q);

// SELECT is safe execution - read only
if ($result) { // If it ran OK, display the records.

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
<h5 style="color:green"><strong>Details for House Reference No
<?php echo $ref_number; ?>
</strong></h5>
<?php echo '<img class="img-fluid float-left" alt="house reference ' . $ref_number; 
echo '" src="';
if ($row['full_picture']=="") 
{echo 'images/pictures/default.jpg"/>';}
else { echo $row['full_picture'];
echo '">';
}
?>
</div>
<div class="col-sm-4" style=" background-color: white; color:black; padding-top: 10px;">	
<h4 style="color:green;">To arrange a viewing please click the Contact Us button 
	and quote the reference number
<?php echo $ref_number . '</h4>';
echo '<p>&pound;';
echo $row['price'] . '</p>';
echo $row['full_description'];
?>
</div>
<?php
mysqli_free_result ($result); // Free up the resources.	
}
else { // If it did not run OK.
// Message:
	echo '<p class="error">The record could not be retrieved. ';
	echo 'We apologize for any inconvenience.</p>';
	// Debugging error message:
//	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
}
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
<div class="col-sm-3">
<?php include ('includes/menu.php'); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>