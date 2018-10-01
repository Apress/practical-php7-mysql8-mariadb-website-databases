<?php
try { 
require ('mysqli_connect.php'); 
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); 
//Is the title present? If it is, sanitize it 
    $title = filter_var( $_POST['title'], FILTER_SANITIZE_STRING);			                                
	if ((!empty($title)) && (preg_match('/[a-z\.\s]/i',$title)) &&
		(strlen($title) <= 12)) {
	//Sanitize the trimmed title		
	$titletrim = $title;							
	}else{	
	$titletrim = NULL; // Title is optional
	}
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

//Is the 1st address present? If it is, sanitize it
$address1 = filter_var( $_POST['address1'], FILTER_SANITIZE_STRING);			
if ((!empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) &&
  (strlen($address1) <= 30)) {					
	//Sanitize the trimmed 1st address
    $address1trim = $address1;						
	}else{	
	$errors[] = 'Missing address. Only numeric, alphabetic, period, comma, dash and space. Max 30.';
	}

//If the 2nd address is present? If it is, sanitize it          #10
$address2 = filter_var( $_POST['address2'], FILTER_SANITIZE_STRING);	
if ((!empty($address2)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) &&
  (strlen($address2) <= 30)) {				
	//Sanitize the trimmed 2nd address
	$address2trim = $address2;	
	}else{	
	$address2trim = NULL;
	}
//Is the city present? If it is, sanitize it
$city = filter_var( $_POST['city'], FILTER_SANITIZE_STRING);			
if ((!empty($city)) && (preg_match('/[a-z\.\s]/i', $city)) &&
  (strlen($city) <= 30)) {					
	//Sanitize the trimmed city						
	$citytrim = $city;							
	}else{	
	$errors[] = 'Missing city. Only alphabetic, period and space. Max 30.';
	}
//Is the state or country present? If it is, sanitize it
$state_country = filter_var( $_POST['state_country'], FILTER_SANITIZE_STRING);		
if ((!empty($state_country)) && (preg_match('/[a-z\.\s]/i', $state_country)) &&
    (strlen($state_country) <= 30))	 {				
	//Sanitize the trimmed state or country	
    $state_countrytrim = $state_country;						
	}else{	
	$errors[] = 'Missing state/country. Only alphabetic, period and space. Max 30.';
	}
//Is the zip code or post code present? If it is, sanitize it
$zcode_pcode = filter_var( $_POST['zcode_pcode'], FILTER_SANITIZE_STRING);	
$string_length = strlen($zcode_pcode);
if ((!empty($zcode_pcode)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode))  &&
   ($string_length <= 30) && ($string_length >= 5)) {						
	//Sanitize the trimmed zcode_pcode
    $zcode_pcodetrim = $zcode_pcode;							
	}else{	
	$errors[] = 'Missing zip code or post code. Alphabetic, numeric, space only max 30 characters';
	}
//Is the phone number present? If it is, sanitize it 
$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_STRING);	    		
if ((!empty($phone)) && (strlen($phone) <= 30)) {					
	//Sanitize the trimmed phone number	
	$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
    $phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);		
	}else{	
	$phonetrim = NULL;
	}
	if (empty($errors)) { // If everything's OK.
		//  make the query
		$q = mysqli_stmt_init($dbcon);
		$query = 'SELECT userid FROM users WHERE email=? AND userid !=?';
         mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
		mysqli_stmt_bind_param($q, 'si', $emailtrim, $id);
		
       // execute query
	   
       mysqli_stmt_execute($q);
	   $result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 0) { // e-mail does not exist in another record
		// Make the update query:                                     #5
		
		 $query = 'UPDATE users SET title=?, first_name=?, last_name=?, email=?, ';
		 $query .='address1=?, address2=?, city=?, state_country=?, zcode_pcode=?, ';
		 $query .='phone=?';
         $query .= ' WHERE userid=?';
		 $q = mysqli_stmt_init($dbcon);
         mysqli_stmt_prepare($q, $query);

        // bind values to SQL Statement
	
		mysqli_stmt_bind_param($q, 'ssssssssssi', $titletrim, $first_nametrim, $last_nametrim, 
			$emailtrim, $address1trim, $address2trim, $citytrim, $state_countrytrim, 
			$zcode_pcodetrim, $phonetrim, $id);
       // execute query
	   
       mysqli_stmt_execute($q);   
			if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
	
			// Echo a message if the edit was satisfactory:
				echo '<h3 class="text-center">The user has been edited!!</h3>';	
						} else { // Echo a message if the query failed.
				echo '<p class="text-center">The user could not be edited. Did you change anything?';
                echo ' We apologize for any inconvenience.</p>'; // Public message.
				//echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				// Message above is only for debug and should not display sql in live mode
			}
		}
		} else { // Display the errors.
		// ---------------Process User Errors---------------
		// Display the users entry errors
		$errorstring = 'Error! The following error(s) occurred: ';
		foreach ($errors as $msg) { // Print each error.				
		$errorstring .= " - $msg<br>\n";
		}
		$errorstring .= 'Please try again.';
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (empty($errors)) IF.
} // End of the conditionals
// Select the user's information:                                                       #6

$query = "SELECT title, first_name, last_name, email, address1, 
address2, city, state_country, zcode_pcode, phone ";
$query .=" FROM users WHERE userid=?";	
// id was retrieved from database prepared not needed	
   $q = mysqli_stmt_init($dbcon);
   mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
		mysqli_stmt_bind_param($q, 'i', $id);
		
       // execute query
	   
       mysqli_stmt_execute($q);
	   $result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
	// Get the user's information:
	$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
	// Create the form: 	#7
?>