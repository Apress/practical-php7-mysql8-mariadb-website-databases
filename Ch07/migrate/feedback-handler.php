<?php
// Feedback form handler
// set the error and thank you pages
$formurl = "feedback/feedback_form.html" ;
$errorurl = "feedback/error.html" ; 
$thankyouurl = "feedback/thankyou.html" ; 
$emailerrurl = "feedback/emailerr.html" ; 
$errorcommenturl =  "feedback/commenterror.html" ;
// set to the email address of the recipient
$mailto = "none@noone.com" ;             
// Is first name present? If it is, sanitize it
   $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);	
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 30)) {			
	//Save first name
    $first_nametrim = $first_name;		
	}else{	
	$errors = 'yes';
	}
	//Is the last name present? If it is, sanitize it
	$last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);			
if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) &&
		(strlen($last_name) <= 40)) {					
	//Save last name
    $last_nametrim = $last_name;				
	}else{	
	$errors = 'yes';
	}
// Check that an email address has been entered	correctly			
  $emailtrim = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
			|| (strlen($emailtrim > 60))) {
		// if email is bad display error page
		header( "Location: $emailerrurl" ); 
        exit ;
	}
// Is the phone number present? if so, sanitize it
$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_STRING);	    		
if ((!empty($phone)) && (strlen($phone) <= 30)) {					
	//Sanitize and validate phone number	
	$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
    $phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);		
	}else{	
	$phonetrim = NULL; // if not valid or missing do not save
	}
	//Is the 1st address present? If it is, sanitize it
$address1 = filter_var( $_POST['address1'], FILTER_SANITIZE_STRING);			
if ((!empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) &&
  (strlen($address1) <= 30)) {					
	//Save the 1st address
    $address1trim = $address1;						
	}else{	
	$errors = 'yes';
	}
//If the 2nd address is present? If it is, sanitize it          
$address2 = filter_var( $_POST['address2'], FILTER_SANITIZE_STRING);	
if ((!empty($address2)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) &&
  (strlen($address2) <= 30)) {				
	//Save the 2nd address
	$address2trim = $address2;	
	}else{	
	$address2trim = NULL; // If missing or not valid do not save
	}
//Is the city present? If it is, sanitize it
$city = filter_var( $_POST['city'], FILTER_SANITIZE_STRING);			
if ((!empty($city)) && (preg_match('/[a-z\.\s]/i', $city)) &&
  (strlen($city) <= 30)) {					
	//Save the city						
	$citytrim = $city;							
	}else{	
	$errors = 'yes';
	}
//Is the state or country present? If it is, sanitize it
$state_country = filter_var( $_POST['state_country'], FILTER_SANITIZE_STRING);		
if ((!empty($state_country)) && (preg_match('/[a-z\.\s]/i', $state_country)) &&
    (strlen($state_country) <= 30))	 {				
	//Save the state or country	
    $state_countrytrim = $state_country;						
	}else{	
	$errors = 'yes';
	}
//Is the zip code or post code present? If it is, sanitize it
$zcode_pcode = filter_var( $_POST['zcode_pcode'], FILTER_SANITIZE_STRING);	
$string_length = strlen($zcode_pcode);
if ((!empty($zcode_pcode)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode))  &&
   ($string_length <= 30) && ($string_length >= 5)) {						
	//Save the zcode_pcode
    $zcode_pcodetrim = $zcode_pcode;							
	}else{	
	$errors = 'yes';
	}
	
$brochure = filter_var( $_POST['brochure'], FILTER_SANITIZE_STRING);
if($brochure != "yes") {$brochure = "no";} // if not yes, then no

$letter = filter_var( $_POST['letter'], FILTER_SANITIZE_STRING);
if($letter != "yes") {$letter = "no"; } // if not yes, then no

$comment = filter_var( $_POST['comment'], FILTER_SANITIZE_STRING);
if ((!empty($comment)) && (strlen($comment) <= 480)) {
	// remove ability to create link in email
	$patterns = array("/http/", "/https/", "/\:/","/\/\//","/www./");
	$commenttrim = preg_replace($patterns," ", $comment);	
	}else{	// if comment not valid display error page
	header( "Location: $errorcommenturl" );
	exit;
}

if (!empty($errors)) { // if errors display error page
header( "Location: $errorurl" );
exit ; }
// everything OK send e-mail
$subject = "Message from customer " . $first_nametrim . " " . $last_nametrim;
$messageproper =                                                                        
"------------------------------------------------------------\n" .
"Name of sender: $first_nametrim $last_nametrim\n" . 
"Email of sender: $emailtrim\n" . 
"Telephone: $phonetrim\n" . 
"brochure?: $brochure\n" . 
"Address: $address1trim\n" . 
"Address: $address2trim\n" .
"City: $citytrim\n" .
"Postcode: $zcode_pcodetrim\n" .
"Newsletter?:$letter\n" .
"------------------------- MESSAGE -------------------------\n\n" . 
$commenttrim . 
"\n\n------------------------------------------------------------\n" ; 
mail($mailto, $subject, $messageproper, "From: \"$first_nametrim $last_nametrim\" <$emailtrim>" ); 
header( "Location: $thankyouurl" ); 
exit ;
?>
