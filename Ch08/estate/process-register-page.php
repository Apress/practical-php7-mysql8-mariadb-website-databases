<?php
define('ERROR_LOG','errors.log');
// Has the form been submitted?
try {
require ('mysqli_connect.php'); // Connect to the database
$errors = array(); // Initialize an error array.
// --------------------check the entries-------------
// Trim the first name
   $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);	
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 30)) {				
	//Sanitize the trimmed first name
    $first_nametrim = $first_name;		
	}else{	
	$errors[] = 'First name missing or not alphabetic and space characters. Max 30';
	}
	//Is the last name present? If it is, sanitize it
	$last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);			
if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) &&
		(strlen($last_name) <= 40)) {					
	//Sanitize the trimmed last name
    $last_nametrim = $last_name;				
	}else{	
	$errors[] = 'Last name missing or not alphabetic, dash, quote or space. Max 30.';
	}							
// Check that an email address has been entered				
  $emailtrim = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
			|| (strlen($emailtrim > 60))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}
// Check for a password and match against the confirmed password:
$password1trim = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
$string_length = strlen($password1trim);		
if (empty($password1trim)){   //                                             #7
$errors[] ='Please enter a valid password';
}
else {
if(!preg_match( '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/', 
$password1trim)) {  //                        #8
$errors[] = 'Invalid password, 8 to 12 chars, one upper, one lower, one number, one special.';
} else
{
$password2trim = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);	
if($password1trim === $password2trim) { //                                 #9
$password = $password1trim;
}else{
$errors[] = 'Your two password do not match.';
$errors[] = 'Please try again';
}
}
}
if (empty($errors)) { // If everything's OK.
// If no problems encountered, register user in the database
//Determine whether the email address has already been registered                         
$query = "SELECT userid FROM users WHERE email = ? ";
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
mysqli_stmt_bind_param($q,'s', $emailtrim);
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 0){//The email address has not been registered
//already therefore register the user in the users table
	//-------------Valid Entries - Save to database -----
	//Start of the SUCCESSFUL SECTION. i.e all the required fields were filled out
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);			
	// Register the user in the database...

	$query = "INSERT INTO users (userid, first_name, last_name, email, password) "; 
    $query .= "VALUES ";
	$query .= "(' ',?,?,?,?)"; 	
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'ssss', $first_nametrim, $last_nametrim, $emailtrim, $hashed_password);
// execute query
mysqli_stmt_execute($q);
if (mysqli_stmt_affected_rows($q) == 1) {			
    $complete = "Userid Created!";					
	} else {
	// echo 'Invalid query:' . $dbcon->error; 
    $errorstring = "System is busy, please try later";
	echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
	}
	}else{//The email address is already registered                         
    $errorstring = 'The email address is already registered.';
}
	} else {//End of SUCCESSFUL SECTION 
// ---------------Process User Errors---------------
// Display the users entry errors
$errorstring = 'Error! The following error(s) occurred: ';
foreach ($errors as $msg) { // Print each error.				
$errorstring .= " - $msg<br>\n";
    }
$errorstring .= 'Please try again.';
echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
    }// End of if (empty($errors)) IF.
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