<?php
	$errors = array(); // Start an array to contain the error messages 
// Check if a thumbnail url has been entered
    $thumbtrim = trim($_POST['thumb']);
	if ((!empty($thumbtrim)) && (filter_var($thumbtrim, FILTER_VALIDATE_URL))
		&& (strlen($thumbtrim) <= 50)) {
		// $thumb = $thumbtrim;
	}
	  else
	  {
        $errors[] = 'Missing thumbnail url or wrong format. Max 50.';
	} 
// Check for a type
   $typetrim = trim($_POST['type']);
   if ((!empty($typetrim)) && (preg_match('/[a-z\-\s\.]/i',$typetrim)) &&
		(strlen($typetrim) <= 50)) {					
	//Sanitize the trimmed type						
	$typetrim = (filter_var($typetrim, FILTER_SANITIZE_STRING));	
	$typetrim = (filter_var($typetrim, FILTER_SANITIZE_STRIPPED));				
	}else{	
	$errors[] = 'Type missing or not alphabetic, dash, period or space. Max 50.';
	}
// Has a price been entered?
$pricetrim = trim($_POST['price']);		
if ((!empty($pricetrim)) && (strlen($pricetrim) <= 10)) {					
	//Sanitize the trimmed price					
	$pricetrim = (filter_var($pricetrim, FILTER_SANITIZE_NUMBER_INT));
    $pricetrim = preg_replace('/\D+/', '', ($pricetrim));	
	}else{	
	$errors[] = 'Price missing. Must be Numberic. Max ######.##.';
	}
// Has the medium been entered?
 $mediumtrim = trim($_POST['medium']);
   if ((!empty($mediumtrim)) && (preg_match('/[a-z\-\s\.]/i',$mediumtrim)) &&
		(strlen($mediumtrim) <= 50)) {					
	//Sanitize the trimmed medium						
	$mediumtrim = (filter_var($mediumtrim, FILTER_SANITIZE_STRING));	
	$mediumtrim = (filter_var($mediumtrim, FILTER_SANITIZE_STRIPPED));				
	}else{	
	$errors[] = 'Medium missing or not alphabetic, dash, period or space. Max 50.';
	}
	// Has the artist been entered?
	$artisttrim = trim($_POST['artist']);
   if ((!empty($artisttrim)) && (preg_match('/[a-z\-\s\.]/i',$artisttrim)) &&
		(strlen($artisttrim) <= 50)) {					
	//Sanitize the trimmed artist						
	$artisttrim = (filter_var($artisttrim, FILTER_SANITIZE_STRING));	
	$artisttrim = (filter_var($artisttrim, FILTER_SANITIZE_STRIPPED));				
	}else{	
	$errors[] = 'Artist missing or not alphabetic, dash, period or space. Max 50.';
	}
// Has a brief description been entered?
   	$minitrim = trim($_POST['mini_descr']);
    if ((!empty($minitrim)) && (preg_match('/[a-z\-\s\.]/i',$minitrim)) &&
		(strlen($minitrim) <= 150)) {					
	//Sanitize the trimmed artist						
	$artisttrim = (filter_var($minitrim, FILTER_SANITIZE_STRING));	
	$artisttrim = (filter_var($minitrim, FILTER_SANITIZE_STRIPPED));				
	}else{	
	$errors[] = 'Description missing or not alphabetic, dash, period or space. Max 50.';
	}
	 // Has the PPcode been entered?
	// $ppcodetrim = trim($_POST['ppcode']);
    // if ((!empty($ppcodetrim)) && (strlen($ppcodetrim) <= 45)) {					
	//Sanitize the trimmed artist						
	//$ppcodetrim = (filter_var($minitrim, FILTER_SANITIZE_STRING));			
	//}else{	
	//$errors[] = 'PayPal Code missing or not alphabetic, dash, period or space. Max 50.';
	//}
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
    mysqli_stmt_bind_param($q, 'ssssss', $thumbtrim, $typetrim, $mediumtrim, $artisttrim, $minitrim, $pricetrim );
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
	$error_string = date('mdYhis') . " | Add Painting | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Add Painting Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Add Painting Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Add Painting | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Add Painting Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Add Painting Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
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