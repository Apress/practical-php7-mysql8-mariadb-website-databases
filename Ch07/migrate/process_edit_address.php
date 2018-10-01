<?php
define(ERROR_LOG,"errors.log");
try
{ 
// After clicking the Edit link in the found_record.php page. This code is executed 
// The code looks for a valid user ID, either through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = htmlspecialchars($_POST['id'], ENT_QUOTES);
} else { // No valid ID, kill the script.
	echo '<p class="text-center">This page has been accessed in error.</p>';
	include ('footer.php'); 
	exit();
}
require ('mysqli_connect.php'); 
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	// Look for the first name:
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
	if (empty($errors)) { // If everything's OK.                                         #2	
		 $query = 'UPDATE users SET title=?, first_name=?, last_name=?, address1=?,';
		 $query .= ' address2=?, city=?, state_country=?, zcode_pcode=?,';
		 $query .= ' phone=?';
         $query .= ' WHERE userid=? LIMIT 1';
		 $q = mysqli_stmt_init($dbcon);
         mysqli_stmt_prepare($q, $query);

        // bind values to SQL Statement
	
		mysqli_stmt_bind_param($q, 'ssssssssss', $titletrim, $first_nametrim, $last_nametrim, 
				$address1trim, $address2trim, $citytrim, $state_countrytrim, 
				$zcode_pcodetrim, $phonetrim, $id);
       // execute query
	   
       mysqli_stmt_execute($q);   
			
			if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
			
			// Echo a message if the edit was satisfactory:
				echo '<h3 class="text-center">The user has been edited.</h3>';	
						} else { // Echo a message if the query failed.
				echo '<p class="text-center">The user could not be edited due to a system error.';
                echo ' We apologize for any inconvenience.</p>'; // Public message.
				//echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				// Message above is only for debug and should not display sql in live mode
			}
		} else { // Display the errors.
		echo '<p class="text-center">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Echo each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
		} // End of if (empty($errors))section.
} // End of the conditionals
// Select the user's information to display in textboxes:                                    #3

	$q = mysqli_stmt_init($dbcon);
	$query = "SELECT * FROM users WHERE userid=?";
    mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
	mysqli_stmt_bind_param($q, 'i', $id); 
      
       // execute query
	   
    mysqli_stmt_execute($q);  
	   
	$result = mysqli_stmt_get_result($q);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
	// Get the user's information:
	
	// Create the form:
?>
<h2 class="h2 text-center">Edit User</h2>
<h3 class="text-center">Items marked with an asterisk * are required</h3>
<form action="edit_address.php" method="post"
name="editform" id="editform">
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label text-right">Title:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="title" name="title" 
	  placeholder="Title" maxlength="12"
	  pattern='[a-zA-Z][a-zA-Z\s\.]*' 
	  title="Alphabetic, period and space max 12 characters"
	   value=
		"<?php if (isset($row['title'])) 
		echo htmlspecialchars($row['title'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="First Name" maxlength="30" required
	   value=
		"<?php if (isset($row['first_name'])) 
		echo htmlspecialchars($row['first_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  pattern="[a-zA-Z][a-zA-Z\s\-\']*" 
	  title="Alphabetic, dash, quote and space only max of 40 characters"
	  placeholder="Last Name" maxlength="40" required
	  value=
		"<?php if (isset($row['last_name'])) 
		echo htmlspecialchars($row['last_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="address1" class="col-sm-4 col-form-label text-right">Address*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address1" name="address1" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" 
	  title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30" required
	   value=
		"<?php if (isset($row['address1'])) 
		echo htmlspecialchars($row['address1'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="address2" class="col-sm-4 col-form-label text-right">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address2" name="address2" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" 
	  title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30"
	   value=
		"<?php if (isset($row['address2'])) 
		echo htmlspecialchars($row['address2'], ENT_QUOTES); ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="city" class="col-sm-4 col-form-label text-right">City*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="city" name="city" 
	  pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="City" maxlength="30" required
	   value=
		"<?php if (isset($row['city'])) 
		echo htmlspecialchars($row['city'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="state_country" class="col-sm-4 col-form-label text-right">
	Country/state*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="state_country" name="state_country"
      pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="State or Country" maxlength="30" required
	   value=
		"<?php if (isset($row['state_country'])) 
		echo htmlspecialchars($row['state_country'], ENT_QUOTES); ?>" >
    </div>
  </div>	
<div class="form-group row">
    <label for="zcode_pcode" class="col-sm-4 col-form-label text-right">
	Zip/Postal Code*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="zcode_pcode" name="zcode_pcode" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="Zip or Postal Code" minlength="5" maxlength="30" required
	   value=
		"<?php if (isset($row['zcode_pcode'])) 
		echo htmlspecialchars($row['zcode_pcode'], ENT_QUOTES); ?>" >
    </div>
  </div>		
<div class="form-group row">
    <label for="phone" class="col-sm-4 col-form-label text-right">Telephone:</label>
    <div class="col-sm-8">
      <input type="tel" class="form-control" id="phone" name="phone" 
	  placeholder="Phone Number" maxlength="30"
	   value=
		"<?php if (isset($row['phone'])) 
		echo htmlspecialchars($row['phone'], ENT_QUOTES); ?>" >
    </div>
  </div>  
<input type="hidden" name="id" value="<?php echo $id ?>" />
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="float-left g-recaptcha" data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Edit User">
</div>
</div>
</form>
<?php
} else { // The user could not be validated
	echo '<p class="text-center">This page has been accessed in error.</p>';
}
mysqli_stmt_free_result($q);
mysqli_close($dbcon);
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