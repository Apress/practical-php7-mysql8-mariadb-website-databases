<?php
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
?>