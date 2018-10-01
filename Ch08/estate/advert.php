<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{
 header("Location: login.php");
  exit();
}
define('ERROR_LOG','errors.log');
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
//require("cap.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Home Page</title>
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
  <?php include('includes/header_advert.php'); ?>
</header>

<?php
// This script is a query that INSERTs a record in the houses table.
// Check that form has been submitted:
if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['submit'] == 'Add')) {
	
	// only accept values from same site via post
try {
	$errors = array(); // Initialize an error array.
	require('mysqli_connect.php'); // Connect to the db.
// Check for a location


$location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
	if ((empty($location)) || ($location == '- Select -')) {
		$errors[] = 'You forgot to enter the location.';
	} else {
		if (($location == "South_Devon") ||
			($location == "Mid_Devon") ||
			($location == "North_Devon"))
		{
			// OK
		} else {
			$errors[] = "Invalid location";
		}
	}
// Has a price been entered?	


$price = filter_var( $_POST['price'], FILTER_SANITIZE_NUMBER_INT);	    		
if ((empty($price)) || (strlen($price) > 15)) {					
$errors[] ='You forgot to enter the price.' ;
}
// check type
$type = (filter_var($_POST['type'], FILTER_SANITIZE_STRING));
	if ((empty($_POST['type'])) || ($_POST['type'] == '- Select -')) {
		// user could choose - Select - by mistake
		$errors[] = 'You forgot to enter the type of house.';
	} else {
		if (($type == "Det-bung") ||
			($type == "Sem-det-bung") ||
			($type == "Det-house") || 
			($type == "Semi-det-house"))
		{
			//OK
		} else {
			$errors[] = "Invalid type";
		}
	}
// Check for brief description
$mini_descriptiontrim = filter_var( $_POST['mini_description'], FILTER_SANITIZE_STRING);			
if ((!empty($mini_descriptiontrim)) && (preg_match('/[a-z0-9\.\!\?\s\,\-]/i', $mini_descriptiontrim)) &&
  (strlen($mini_descriptiontrim) <= 120)) {					
    $mini_description = $mini_descriptiontrim;						
	}else{	
	$errors[] = 'Missing description. Only numeric, alphabetic, period, comma, dash and space. Max 120.';
	}	
	// Check for number of bedrooms
$bedrooms = filter_var( $_POST['bedrooms'], FILTER_SANITIZE_NUMBER_INT);	
	if ((empty($bedrooms)) || ($bedrooms == '- Select -')) {
		$errors[] = 'You forgot to enter the number of bedrooms';
	} else {
		if (($bedrooms == "1") ||
			($bedrooms == "2") ||
			($bedrooms == "3") || 
			($bedrooms == "4"))
		{
			// OK
		} else {
			$errors[] = "Invalid number of bedrooms";
		}
	}
	// Check if a thumbnail url has been entered
	$thumb = filter_var( $_POST['thumb'], FILTER_SANITIZE_URL);
	if ((empty($thumb)) || (strlen($thumb > 45))) {
		// thumbnail link is optional
		$thumb = NULL;
	}
	// Check if full description has been entered
	$full_descriptiontrim = 
		filter_var( $_POST['full_description'], FILTER_SANITIZE_STRING);
	if ((!empty($full_descriptiontrim)) && 
		(preg_match('/[a-z0-9\.\!\?\s\,\-]/i', $full_descriptiontrim)) &&
  (strlen($full_descriptiontrim) <= 400)) {					
    $full_description = $full_descriptiontrim;						
	}else{	
	$errors[] = 
	'Missing description. Only numeric, alphabetic, period, comma, dash and space. Max 30.';
	}	
    // full picture
	$full_picture = filter_var( $_POST['full_picture'], FILTER_SANITIZE_URL);
	if ((empty($full_picture)) || (strlen($full_picture) > 45)){
	// optional
		$full_picture = NULL;
	}
	// Check for status of the house
$status = filter_var( $_POST['status'], FILTER_SANITIZE_STRING);	
	if ((empty($status)) || ($status == '- Select -')) {
		$errors[] = 'You forgot to select a status';
	} else {
		if (($status == "Available") ||
			($status == "Under offer") ||
			($status == "Withdrawn") || 
			($status == "Sold"))
		{
			// OK
		} else {
			$errors[] = "Invalid status";
		}
	}
if (empty($errors)) { // If everything's OK.
	// Register the house in the database
	// Make the query:
	$query = "INSERT INTO houses (ref_number, location, price, type, mini_description, bedrooms, "; 
    $query .= "thumb, status, full_description, full_picture) ";
    $query .= " VALUES ";
	$query .= "(' ', ?, ?,?,?,?,?,?,?,? )"; 
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'sssssssss', $location, $price, $type, $mini_description, $bedrooms, 
	$thumb, $status, $full_description, $full_picture);
// execute query
mysqli_stmt_execute($q);
if (mysqli_stmt_affected_rows($q) == 1) {			
// Good
	header ("location: another.php"); 
} else { // If it did not run OK.
// Message:
 $errorstring = 'System Error ';
 $errorstring .= 'The house could not be added due to a system error. ';
 $errorstring .= 'We apologize for any inconvenience.'; 
// Debugging message:
// echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($r) IF.
mysqli_close($dbcon); // Close the database connection.
exit();
} else { // Report the errors.
 $errorstring = 'Error!';
 $errorstring .= ' The following error(s) occurred:<br>';
foreach ($errors as $msg) { // Print each error.
	$errorstring .= " - $msg<br>\n";
}
	$errorstring .= 'Please try again.';
	
}// End of if (empty($errors)) IF.
} // try
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
} // End of the main Submit conditional.
?>
<div class="content mx-auto" id="contents" style="padding-top:10px">
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">

<div class="col-sm-8">
<form action="advert.php" method="post" name="advert" id="advert">
<!--START OF TEXT FIELDS-->
<div class='form-group row'>
    <label for="" class="col-sm-4 col-form-label text-right">
	</label>
<div class="col-sm-8 text-center">
    <h3>Add a House</h3>
	<h5>
	<?php
	If (!empty($errorstring)) {
		echo $errorstring;
	}
	?></h5>
</div>
</div>
<div class="form-group row">
      <label for="location" class="col-sm-4 col-form-label text-right">
	  Location:</label>
	  <div class="col-sm-8">
      <select id="location" name="location" class="form-control" required>
	<option value="">- Select -</option>
	<option value="South_Devon">South Devon</option>
	<option value="Mid_Devon">Mid Devon</option>
	<option value="North_Devon">North Devon</option>
</select>
</div>
</div>
<div class="form-group row">
    <label for="price" class="col-sm-4 col-form-label text-right">Price:</label>
    <div class="col-sm-8">
      <input type="num" class="form-control" id="price" name="price" 
	  placeholder="Price" maxlength="15"
	  pattern="[0-9\.]*" 
	  title="Numbers only max of 120 characters" 
	   value=
		"<?php if (isset($_POST['price'])) 
		echo htmlspecialchars($_POST['price'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
      <label for="type" class="col-sm-4 col-form-label text-right">
	  Type:</label>
	  <div class="col-sm-8">
      <select id="type" name="type" class="form-control" required>
	<option value="">- Select -</option>
	<option value="Det-bung">Detached Bungalow</option>
	<option value="Sem-det-bung">Semi-detached Bungalow</option>
	<option value="Det-house">Detached House</option>
	<option value="Semi-det-house">Semi-detached House</option>
	</select>
</div>
</div>
<div class="form-group row">
    <label for="thumb" class="col-sm-4 col-form-label text-right">Thumbnail URL</label>
    <div class="col-sm-8">
      <input type="url" class="form-control" id="thumb" name="thumb" 
	  placeholder="Thumbnail URL" maxlength="45"
	   value=
		"<?php if (isset($_POST['thumb'])) 
		echo htmlspecialchars($_POST['thumb'], ENT_QUOTES); ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>
<div class="col-sm-8 text-center">
    <label for="comment">Please enter your Brief Description below</label>
    <textarea class="form-control" id="mini_description" 
		name="mini_description" rows="3" cols="40"
		pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-\?\!]*" 
	  title="Alphabetic, numbers, comma, ., -, ?, !, space only max of 120 characters" 
	value=
		"<?php if (isset($_POST['mini_description'])) 
		echo htmlspecialchars($_POST['mini_description'], ENT_QUOTES); ?>" >
	</textarea>
  </div>
 </div> 
<div class="form-group row">
      <label for="bedrooms" class="col-sm-4 col-form-label text-right">
	  Bedrooms:</label>
	  <div class="col-sm-8">
      <select id="bedrooms" name="bedrooms" class="form-control" required>
	<option value="">- Select -</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	</select>
</div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>
<div class="col-sm-8 text-center">
    <label for="comment">Please enter your Full Description below</label>
    <textarea class="form-control" id="full_description" name="full_description" 
		rows="10" cols="40"
		pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-\?\!]*" 
	  title="Alphabetic, numbers, comma, ., -, ?, !, space only max of 400 characters" 
	value=
		"<?php if (isset($_POST['full_description'])) 
		echo htmlspecialchars($_POST['full_description'], ENT_QUOTES); ?>" >
	</textarea>
  </div>
 </div>
 <div class="form-group row">
    <label for="full_picture" class="col-sm-4 col-form-label text-right">Full Picture URL</label>
    <div class="col-sm-8">
      <input type="url" class="form-control" id="full_picture" name="full_picture" 
	  placeholder="Full Picture URL" maxlength="45"
	   value=
		"<?php if (isset($_POST['full_picture'])) 
		echo htmlspecialchars($_POST['full_picture'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
      <label for="status" class="col-sm-4 col-form-label text-right">
	  Status:</label>
	  <div class="col-sm-8">
      <select id="status" name="status" class="form-control" required>
	<option value="">- Select -</option>
	<option value="Available">Available</option>
	<option value="Under offer">Under offer</option>
	<option value="Withdrawn">Withdrawn</option>
	<option value="Sold">Sold</option>
	</select>
</div>
</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="float-left g-recaptcha" style="padding-left: 50px;" 
  data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>
<div class="form-group row">
	<label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8 text-center">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Add">
    </div>
	</div>
</form><!-- End of the add house content. -->
</div>
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-4">
		<?php include('includes/menu.php'); ?> 
  </nav>
</div>
</div>
<div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php include ('includes/footer.php'); ?>
</footer>
</div>
</div>
</div>
</div>
</body>
</html>