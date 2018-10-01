<?php
	$errors = array(); // Set an error array.
// Has an artist's first name been entered?
// Trim the first name
    $first_name = trim($_POST['first_name']);
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 30)) {				
	//Sanitize the trimmed first name						
	$first_nametrim = (filter_var($first_name, FILTER_SANITIZE_STRING));
    $first_nametrim = (filter_var($first_nametrim, FILTER_SANITIZE_STRIPPED));	
	}else{	
	$first_nametrim = NULL;
	}
// Has an artist's middle name been entered?
    $middle_name = trim($_POST['middle_name']);
// Strip HTML and apply escaping Is the middle name present? If it is, trim it
if ((!empty($middle_name)) && (preg_match('/[a-z\s\.]/i',$middle_name)) &&
		(strlen($middle_name) <= 30)) {				
	//Sanitize the trimmed first name						
	$middle_nametrim = (filter_var($middle_name, FILTER_SANITIZE_STRING));
    $middle_nametrim = (filter_var($middle_nametrim, FILTER_SANITIZE_STRIPPED));	
	}else{	
	$middle_nametrim = NULL;
	}
// Has the artist's last name been entered?
    $last_name = trim($_POST['last_name']);
// Strip HTML and apply escaping Is the last name present? If it is, trim it
if ((!empty($last_name)) && (preg_match('/[a-z\s]/i',$last_name)) &&
		(strlen($first_name) <= 30)) {				
	//Sanitize the trimmed first name						
	$last_nametrim = (filter_var($last_name, FILTER_SANITIZE_STRING));
    $last_nametrim = (filter_var($last_nametrim, FILTER_SANITIZE_STRIPPED));	
	}else{	
	$errors[] = 'Last name missing or not alphabetic and space characters. Max 30';
	} 
if (empty($errors)) { // If the wuery ran OK
	// Register the artist in the database
	
	try {
		require ('mysqli_connect.php'); // Connect to the db.
		// Make the query:
		$query = "INSERT INTO artists (artist_id, first_name, middle_name, last_name) ";
        $query .= "VALUES ";
	    $query .= "(' ',?,?,?)"; 
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // use prepared statement to insure that only text is inserted
        // bind fields to SQL Statement
        mysqli_stmt_bind_param($q, 'sss', $first_nametrim, $middle_nametrim, $last_nametrim);
        // execute query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {		
		echo '<h2 class="col-sm-12 text-right">The artist was successfully added.</h2>';
		} else { // If the query failed to run
		// Message:
			echo '<h2 class="col-sm-12 text-right" style="color: red;">System Error</h2>
			<p class="error">The artist could not be added due to a system error. ';
			echo 'We apologize for any inconvenience.</p>'; 
			// Debugging message:
			//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
	}
catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Admin Page | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Admin Page Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Admin Page Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Admin Page | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Admin Page Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Admin Page Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
} 
	} else { // Display any errors
		echo '<h2 class="col-sm-12 text-right" style="color: red;">Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Display any errors
			echo " - $msg<br>\n";
		}
		echo '</p><h6>Please try again.</h6><p><br></p>';
		}// End of if error checks
?>