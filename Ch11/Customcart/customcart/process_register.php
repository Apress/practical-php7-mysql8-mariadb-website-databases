<?php
// Has the form been submitted?
try {
require ('mysqli_connect.php'); // Connect to the database
$errors = array(); // Initialize an error array.
// --------------------check the entries-------------
//Is the title present? If it is, trim it 
    $title = trim($_POST['title']);			                                
	if ((!empty($title)) && (preg_match('/[a-z\.\s]/i',$title)) &&
		(strlen($title) <= 12)) {
	//Sanitize the trimmed title						
	$titletrim = (filter_var($title, FILTER_SANITIZE_STRING));							
	}else{	
	$titletrim = NULL; // Title is optional
	}
// Trim the first name
    $first_name = trim($_POST['first_name']);
// Strip HTML and apply escaping//	Is the first name present? If it is, trim it
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 30)) {				
	//Sanitize the trimmed first name						
	$first_nametrim = (filter_var($first_name, FILTER_SANITIZE_STRING));
    $first_nametrim = (filter_var($first_nametrim, FILTER_SANITIZE_STRIPPED));	
	}else{	
	$errors[] = 'First name missing or not alphabetic and space characters. Max 30';
	}
	//Is the last name present? If it is, trim it and sanitize it
	$last_name = trim($_POST['last_name']);		
if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) &&
		(strlen($last_name) <= 30)) {					
	//Sanitize the trimmed last name						
	$last_nametrim = (filter_var($last_name, FILTER_SANITIZE_STRING));	
	$last_nametrim = (filter_var($last_nametrim, FILTER_SANITIZE_STRIPPED));				
	}else{	
	$errors[] = 'Last name missing or not alphabetic, dash, quote or space. Max 30.';
	}
// Set the email alias as false and check for an email address:
//$e = FALSE;	                                                                #1								
// Check that an email address has been entered				
  $emailtrim = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}
// Check for a password and match against the confirmed password:
$password1trim = trim($_POST['password1']);	
if (empty($password1trim)){   //                                             #7
$errors[] ='Please enter a valid password';
}
else {
if(!preg_match( '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/', 
$password1trim)) {  //                        #8
$errors[] = 'Invalid password,8 to 12 chars, one upper, one lower, one number, one special.';
} else
{
$password2trim = trim($_POST['password2']);	
if($password1trim === $password2trim) { //                                 #9
$password = $password1trim;
}else{
$errors[] = 'Your two password do not match.';
$errors[] = 'Please try again';
}
}
}
//Is the 1st address present? If it is, trim it and sanitize it
$address1trim = trim($_POST['address1']);		
if ((!empty($address1trim)) && (preg_match('/[a-z\.\s\,\-]/i', $address1trim)) &&
  (strlen($address1trim) <= 30)) {					
	//Sanitize the trimmed 1st address						
	$address1trim = (filter_var($address1trim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'Missing address. Only alphabetic, period, comma, dash and space. Max 30.';
	}
//If the 2nd address is present? If it is, trim it and sanitize it          #10
$address2trim = trim($_POST['address2']);		
if ((!empty($address2trim)) && (preg_match('/[a-z\.\s\,\-]/i', $address2trim)) &&
  (strlen($address2trim) <= 30)) {				
	//Sanitize the trimmed 2nd address						
	$address2trim = (filter_var($address2trim, FILTER_SANITIZE_STRING));						
	}else{	
	$address2trim = NULL;
	}
//Is the city present? If it is, trim it and sanitize it
$citytrim = trim($_POST['city']);		
if ((!empty($citytrim)) && (preg_match('/[a-z\.\s]/i', $citytrim)) &&
  (strlen($citytrim) <= 30)) {					
	//Sanitize the trimmed city						
	$citytrim = (filter_var($citytrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'Missing city. Only alphabetic, period and space. Max 30.';
	}
//Is the state or country present? If it is, trim it and sanitize it
$state_countrytrim = trim($_POST['state_country']);		
if ((!empty($state_countrytrim)) && (preg_match('/[a-z\.\s]/i', $state_countrytrim)) &&
    (strlen($state_countrytrim) <= 30))	 {				
	//Sanitize the trimmed state or country						
	$state_countrytrim = (filter_var($state_countrytrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'Missing state/country. Only alphabetic, period and space. Max 30.';
	}
//Is the zip code or post code present? If it is, trim it and sanitize it
$zcode_pcodetrim = trim($_POST['zcode_pcode']);		
if ((!empty($zcode_pcodetrim)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcodetrim)) &&
    (strlen($citytrim) <= 30)) {						
	//Sanitize the trimmed zcode_pcode						
	$zcode_pcodetrim = (filter_var($zcode_pcodetrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'Missing zip code or post code. Alphabetic, numeric, space only max 30 characters';
	}
//Is the secret present? If it is, trim it and sanitize it
$secrettrim = trim($_POST['secret']);		
if ((!empty($secrettrim)) && (preg_match('/[a-z\.\s\,\-]/i', $secrettrim)) &&
  (strlen($secrettrim) <= 30)) {					
	//Sanitize the trimmed city						
	$secrettrim = (filter_var($secrettrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'Missing city. Only alphabetic, period, comma, dash and space. Max 30.';
	}
//Is the phone number present? If it is, trim it and sanitize it     
$phonetrim = trim($_POST['phone']);		
if ((!empty($phonetrim)) && (strlen($phonetrim) <= 30)) {					
	//Sanitize the trimmed phone number	
	$phonetrim = (filter_var($phonetrim, FILTER_SANITIZE_NUMBER_INT));
    $phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);		
	}else{	
	$phonetrim = NULL;
	}
if (empty($errors)) { // If everything's OK.
// If no problems encountered, register user in the database
//Determine whether the email address has already been registered                         
$query = "SELECT user_id FROM users WHERE email = ? ";
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
mysqli_stmt_bind_param($q,'s', $e);
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 0){//The email address has not been registered
//already therefore register the user in the users table
	//-------------Valid Entries - Save to database -----
	//Start of the SUCCESSFUL SECTION. i.e all the required fields were filled out
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);			
	// Register the user in the database...
	$query = "INSERT INTO users (user_id, title, first_name, last_name, email, password,"; 
    $query .= "address1, address2, city, state_country, zcode_pcode, phone, secret, registration_date) ";
    $query .= "VALUES ";
	$query .= "(' ',?,?,?,?,?,?,?,?,?,?,?,?,NOW())"; 
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'ssssssssssss', 
	$titletrim, $first_nametrim, $last_nametrim, $emailtrim, $hashed_password, $address1trim, $address2trim, 
	$citytrim, $state_countrytrim, $zcode_pcodetrim, $phonetrim, $secrettrim);
// execute query
mysqli_stmt_execute($q);
if (mysqli_stmt_affected_rows($q) == 1) {			
	header ("location: register_thanks.php"); 					
	} else {
	echo 'Invalid query:' . $dbcon->error; 
// change to generic message in production
	}
	}else{//The email address is already registered                         
echo '<p class="error">The email address is already registered</p>';
}
	} else {//End of SUCCESSFUL SECTION 
// ---------------Process User Errors---------------
// Display the users entry errors
echo '<h2>Error!</h2>
<p class="error">The following error(s) occurred:<br>';
foreach ($errors as $msg) { // Print each error.				
echo " - $msg<br>\n";
    }
echo '</p><h3>Please try again.</h3><p><br></p>';
    }// End of if (empty($errors)) IF.
mysqli_close($dbcon);
}
catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Registration | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Register Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Register Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Registration | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Register Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Register Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
} 
?>