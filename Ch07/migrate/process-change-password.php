
<?php
define(ERROR_LOG,"errors.log");
// This script is a query that UPDATES the password in the users table.
// Check that form has been submitted:       
    require ('mysqli_connect.php'); // Connect to the db. 
	$errors = array(); // Initialize an error array. 
	// Set hidden variable to format any of the echos below
// Check that an email address has been entered				
  $email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))
			|| (strlen($email > 60))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}
// Check for a password and match against the confirmed password:
$password = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
$string_length = strlen($password);		
if (empty($password)){   //                                             
$errors[] ='Please enter a valid old password';
}
else {
if(!preg_match( '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/', 
$password)) {  //                        
$errors[] = 'Invalid password, 8 to 12 chars, one upper, one lower, one number, one special.';
} else
{
    // Prepare and check new password
	$new_password = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
	$verify_password = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);
	if (!empty($new_password)) {
		if(preg_match( '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/', 
$new_password)) {  
        if (($new_password != $verify_password) ||
			( $password == $new_password ))
		{
            $errors[] = 'Your new password did not match the confirmed password and/or ';
			$errors[] = 'Your old password is the same as your new password.';
		}
} else {
			$errors[] = 'Your new password is not in correct format.';
}
	} else {
			$errors[] = 'You did not enter a new password.';
    }
}
}
	if (empty($errors)) { // If everything's OK.              
try {
	 // Check that the user has entered the right email address/password combination:
    $query = "SELECT userid, password FROM users WHERE ( email=? )";
	$q = mysqli_stmt_init($dbcon);                                 
    mysqli_stmt_prepare($q, $query);
    // use prepared statement to insure that only text is inserted
    // bind fields to SQL Statement
    mysqli_stmt_bind_param($q, 's', $email);
     // execute query
    mysqli_stmt_execute($q);

	$result = mysqli_stmt_get_result($q);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ((mysqli_num_rows($result) == 1)
          && (password_verify($password, $row['password'])))
		{	// Found one record		
	    // Change the password in the database...
	    // Hash password current 60 characters but can increase
	    $hashed_passcode = password_hash($new_password, PASSWORD_DEFAULT);            
		// Make the query:                                               
       $query = "UPDATE users SET password=? WHERE email=?";
	   $q = mysqli_stmt_init($dbcon);                                 
       mysqli_stmt_prepare($q, $query);
       // use prepared statement to insure that only text is inserted
       // bind fields to SQL Statement
       mysqli_stmt_bind_param($q, 'ss', $hashed_passcode, $email);
       // execute query
       mysqli_stmt_execute($q);
       if (mysqli_stmt_affected_rows($q) == 1) {	// one row updated
           // Echo a message
          header ("location: password-thanks.php"); 
		  exit();   
		} else { // If it did not run OK.
		// Public message:
			$errorstring = "System Error! <br /> You could not change password due ";
			$errorstring .= "to a system error. We apologize for any inconvenience.</p>"; 
			echo "<p class='text-center col-sm-2' style='color:red'>$errorstring</p>";	
			// Debugging message below do not use in production
			//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
			// include footer then close program to stop execution
			echo '<footer class="jumbotron text-center col-sm-12"
	        style="padding-bottom:1px; padding-top:8px;">
            include("footer.php"); 
            </footer>';
		    exit();
		 }
    } else { // Invalid email address/password combination.
		$errorstring = 'Error! <br /> ';
        $errorstring .= 'The email address and/or password do not match those on file.';
	    $errorstring .= " Please try again.";
		echo "<p class='text-center col-sm-2' style='color:red'>$errorstring</p>";
} }	
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
	} else { // Report the errors.                                            
		//header ("location: register-page.php"); 
		$errorstring = "Error! The following error(s) occurred:<br>";
		foreach ($errors as $msg) { // Print each error.
			$errorstring .= " - $msg<br>\n";
		}
		$errorstring .= "Please try again.<br>";
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (empty($errors)) IF.
?>







