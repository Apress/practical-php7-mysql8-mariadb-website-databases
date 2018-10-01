<?php                                                                                     
session_start();
// Data from valid source?
if (!isset($_SESSION['user_id']))
{ header("Location: index.php");
exit();
} else {
if (($_SESSION['user_level'] != 1))
{ header("Location: index.php");
exit();
}}
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
<link rel="stylesheet" type="text/css" href="transparent.css">
</head>
<body>
<div class="container" style="margin-top:10px">
<!-- Header Section -->
<header class="jumbotron text-center row mx-auto"
style="width:90%; height:auto; background:#95b522; margin-bottom: 0px; padding:0px;"> 
<?php include('includes/header_add_painting.inc'); ?>
</header>
<!-- Body Section -->
  <div class="row mx-auto" style="padding-left: 0px;margin-top: -17px; width: 90%; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
	<div id="content"><!--Start of admin add paintings content-->
<?php
// This code is a query that INSERTs a paintings in the art table
// Confirm that form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Start an array to contain the error messages 
// Check if a thumbnail url has been entered
	if (empty($_POST['thumb'])) {
				$errors[] = 'You forgot to enter the thumbnail url';
	} else {
		$thumb = ($_POST['thumb']);
	}
// Check for a type
	if (empty($_POST['type'])) {
		$errors[] = 'You forgot to enter the type of painting';
	} else {
		$type = trim($_POST['type']);
	}
// Has a price been entered?	
if (empty($_POST['price'])){
$errors[] ='You forgot to enter the price.' ;
}
elseif (!empty($_POST['price'])) {			
//Remove unwanted characters and use regex to ensure that the remaining characters are digits
$price = preg_replace('/\D+/', '', ($_POST['price']));
}
// Has the medium been entered?
	if (empty($_POST['medium'])) {
				$errors[] = 'You forgot to enter the medium';
	} else {
		$medium = ($_POST['medium']);
	}

	// Has the artist been entered?
	if (empty($_POST['artist'])) {
				$errors[] = 'You forgot to enter the artist';
	} else {
		$artist = ($_POST['artist']);
	}
// Has a brief description been entered?
	if (empty($_POST['mini_descr'])) {
			 $errors[] = 'You forgot to enter the brief description';
	} else{
	 $mini_descr = strip_tags($_POST['mini_descr']);
	 }
	 // Has the PPcode been entered?
	if (empty($_POST['ppcode'])) {
			 $errors[] = 'You forgot to enter the PayPal code';
	} else{
	 $ppcode = ($_POST['ppcode']);
	 }
if (empty($errors)) { // If no errors were encountered
	// Register the painting in the database
try {
		require ('mysqli_connect.php'); // Connect to the database
		// Make the query:'
		
	$query = "INSERT INTO art (art_id, thumb, type, medium, artist, mini_descr, price)"; 
    $query .= "VALUES ";
	$query .= "(' ', ?,?,?,?,?,?)"; 
    $q = mysqli_stmt_init($dbcon);
    mysqli_stmt_prepare($q, $query);
    // use prepared statement to insure that only text is inserted
    // bind fields to SQL Statement
    mysqli_stmt_bind_param($q, 'sssssss', $thumb, $type, $medium, $artist, $mini_descr, $price );
    // execute query
    mysqli_stmt_execute($q);
    if (mysqli_stmt_affected_rows($q) == 1) {		
		echo '<h2>The painting was successfully registered</h2><br>';
		} else { // If it was not registered
		// Error message:
			echo '<h2>System Error</h2>
			<p class="error">The painting could not be added due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e)
{
	print "The system is busy, please try later";
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
    //print "An Error occurred. Message: " . $e->getMessage();
}
	} else { // Display the errors.
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if (empty($errors))
} // End of the main Submit conditionals
?>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<h2>Add a Painting</h2>
<form  action="admin_add_painting.php" method="post">
<p><label class="label" for="thumb"><b>Thumbnail:</b></label>
<input id="thumb" type="text" name="thumb" size="45" maxlength="45" 
value="<?php if (isset($_POST['thumb'])) echo $_POST['thumb']; ?>">
</p>
<p><label class="label"><b>Type:</b></label>	
<select name="type" >
	<option value="">- Select -</option>
	<option value="Still-life">Still Life</option>
	<option value="Nature">Nature</option>
	<option value="Abstract">Abstract</option>
	</select><br>
<p><label class="label"><b>Medium:</b></label>
<select name="medium" >
	<option value="">- Select -</option>
	<option value="Oil-painting">Oil Painting</option>
	<option value="Colored-etching">Colored Etching</option>
</select><br>
		<p><label class="label"><b>Artist:</b></label>
        <select name="artist" >
	    <option value="">- Select -</option>
		<?php
require ('mysqli_connect.php'); // Connect to the database
		$q = "SELECT first_name, middle_name, last_name FROM artists";		
		$result = mysqli_query ($dbcon, $q); // Run the query.
        while ($row = mysqli_fetch_assoc($result)) {
			$value = $row['first_name'] . "-" . $row['middle_name'] . "-" . $row['last_name'];
		    $display = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
            echo "<option value='$value'>$display</option>";
        }	
		?>
</select><br>
<p><label class="label"><b>Brief Description:</b></label>
<textarea name="mini_descr" rows="3" cols="40"></textarea></p>
<p><label class="label" for="ppcode"><b>PayPal Code:</b></label>
<input id="ppcode" type="text" name="ppcode" size="45" maxlength="45" 
value="<?php if (isset($_POST['ppcode'])) echo $_POST['ppcode']; ?>">
</p>
<p><label class="label" for="price"><b>Price:</b></label>
<input id="price" type="text" name="price" size="15" maxlength="15" 
value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">Figures only, no &pound;s, $s or commas
	<p><input id="submit" type="submit" name="submit" value="Add"></p>
</form><!--End of the add a painting content-->
<div>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer>
</div>
</div>
</div>
</div>
</div>
</body>
</html>