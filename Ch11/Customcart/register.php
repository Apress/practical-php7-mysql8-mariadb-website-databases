<!doctype html>
<html lang="en">
<head>
<title>Registration page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="transparent.css">
<link rel="stylesheet" type="text/css" href="register.css">

</head>
<body>
<div id="container">
<header>
<?php include('includes/header_reg.inc'); ?>
</header>
<div id="content"><!--Start of the registration page content-->
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<?php
require ('mysqli_connect.php'); // Connect to the database
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
try {
$errors = array(); // Initialize an error array.
// --------------------check the entries-------------
//Is the title present? If it is, trim it                                    
	if (isset($_POST['title'])) {
	$titletrim = trim($_POST['title']);						
	//Sanitize the trimmed title						
	$titletrim = (filter_var($titletrim, FILTER_SANITIZE_STRING));			
	$titletrim = mysqli_real_escape_string($dbcon, $titletrim);				
	}else{	
	$titletrim = NULL; // Title is optional
	}
// Trim the first name
    $first_name = trim($_POST['first_name']);
// Strip HTML and apply escaping//	Is the first name present? If it is, trim it
if (!empty($first_name)) {				
	//Sanitize the trimmed first name						
	$first_nametrim = (filter_var($first_name, FILTER_SANITIZE_STRING));
    $first_nametrim = (filter_var($first_nametrim, FILTER_SANITIZE_STRIPPED));	
	}else{	
	$errors[] = 'You forgot to enter your first name.';
	}
	//Is the last name present? If it is, trim it and sanitize it
	$last_name = trim($_POST['last_name']);		
if (!empty($last_name)) {					
	//Sanitize the trimmed last name						
	$last_nametrim = (filter_var($last_name, FILTER_SANITIZE_STRING));	
	$last_nametrim = (filter_var($last_nametrim, FILTER_SANITIZE_STRIPPED));				
	}else{	
	$errors[] = 'You forgot to enter your last name.';
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
if(!preg_match('/^\w{8,12}$/', $password1trim)) {  //                        #8
$errors[] = 'Invalid password, use 8 to 12 characters and no spaces.';
} else{
$password1 = $password1trim;
}
$password2trim = trim($_POST['password2']);	
if($password1 ==+ $password2trim) { //                                 #9
$password = $password1;
}else{
$errors[] = 'Your two password do not match.';
$errors[] = 'Please try again';
}
}
//Is the 1st address present? If it is, trim it and sanitize it
$address1trim = trim($_POST['address1']);		
if (!empty($address1trim)) {					
	//Sanitize the trimmed 1st address						
	$address1trim = (filter_var($address1trim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'You forgot to enter your first address.';
	}
//If the 2nd address is present? If it is, trim it and sanitize it          #10
$address2trim = trim($_POST['address2']);		
if (!empty($address2trim)) {					
	//Sanitize the trimmed 2nd address						
	$address2trim = (filter_var($address2trim, FILTER_SANITIZE_STRING));						
	}else{	
	$address2trim = NULL;
	}
//Is the city present? If it is, trim it and sanitize it
$citytrim = trim($_POST['city']);		
if (!empty($citytrim)) {					
	//Sanitize the trimmed city						
	$citytrim = (filter_var($citytrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'You forgot to enter your city.';
	}
//Is the state or country present? If it is, trim it and sanitize it
$state_countrytrim = trim($_POST['state_country']);		
if (!empty($state_countrytrim)) {				
	//Sanitize the trimmed state or country						
	$state_countrytrim = (filter_var($state_countrytrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'You forgot to enter your state or country.';
	}
//Is the zip code or post code present? If it is, trim it and sanitize it
$zcode_pcodetrim = trim($_POST['zcode_pcode']);		
if (!empty($zcode_pcodetrim)) {					
	//Sanitize the trimmed zcode_pcode						
	$zcode_pcodetrim = (filter_var($zcode_pcodetrim, FILTER_SANITIZE_STRING));						
	}else{	
	$errors[] = 'You forgot to enter your zip code or post code.';
	}
//Is the phone number present? If it is, trim it and sanitize it     
$phonetrim = trim($_POST['phone']);		
if (!empty($phonetrim)) {					
	//Sanitize the trimmed phone number						
	$phonetrim = (filter_var($phonetrim, FILTER_SANITIZE_NUMBER_INT));						
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
    $query .= "address1, address2, city, state_country, zcode_pcode, phone, registration_date) ";
    $query .= "VALUES ";
	$query .= "(' ',?,?,?,?,?,?,?,?,?,?,?,NOW())"; 
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'sssssssssss', $titletrim, $first_nametrim, $last_nametrim, $emailtrim, $hashed_password, $address1trim, $address2trim, $citytrim, $state_countrytrim, $zcode_pcodetrim, $phonetrim);
// execute query
mysqli_stmt_execute($q);
if (mysqli_stmt_affected_rows($q) == 1) {			
	header ("location: register-thanks.php"); 					
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
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
    //print "An Error occurred. Message: " . $e->getMessage();
}
} 
?>
<div id="midcol">
<h2>Account Registration</h2>
		<h3 class="content">Items marked with an asterisk * are essential</h3>
<form action="register.php" method="post">
	<label class="label" for="title">Title*</label>
	<input id="title" type="text" name="title" size="15" maxlength="12" required value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
	
	<br><label class="label" for="first_name">First Name*</label>
	<input id="first_name" type="text" name="first_name" size="30" maxlength="30" required value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
	
	<br><label class="label" for="last_name">Last Name*</label>
	<input id="last_name" type="text" name="last_name" size="30" maxlength="40" required value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
	
	<br><label class="label" for="email">Email Address*</label>
	<input id="email" type="text" name="email" size="30" maxlength="60" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
	
	<br><label class="label" for="psword1">Password*</label>
	<input id="password1" type="password" name="password1" size="12" minlength="8" maxlength="12" required value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" >8 
	to 12 characters
	
	<br><label class="label" for="password2">Confirm Password*</label>
	<input id="password2" type="password" name="password2" size="12" minlength="8" maxlength="12" required value="<?php if (isset($_POST['psword2'])) echo $_POST['password2']; ?>" >
	
	<br><label class="label" for="address1">Address*</label>
	<input id="address1" type="text" name="address1" size="30" maxlength="30" required value="<?php if (isset($_POST['address1'])) echo $_POST['address1']; ?>">
	
	<br><label class="label" for="addr2">Address</label>
	<input id="address2" type="text" name="address2" size="30" maxlength="30" value="<?php if (isset($_POST['address2'])) echo $_POST['address2']; ?>">
	
	<br><label class="label" for="city">City*</label>
	
	<input id="city" type="text" name="city" size="30" maxlength="30" required value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>">
	
	<br><label class="label" for="state_country">Country/state*</label>
	<input id="state_country" type="text" name="state_country" size="30" maxlength="30" required value="<?php if (isset($_POST['state_country'])) echo $_POST['state_country']; ?>">
	
	<br><label class="label" for="zcode_pcode">zcode/pcode*</label>
	<input id="pcode" type="text" name="zcode_pcode" size="15" maxlength="15" required value="<?php if (isset($_POST['zcode_pcode'])) echo $_POST['zcode_pcode']; ?>">
	
	<br><label class="label" for="phone">Telephone</label>
	<input id="phone" type="tel" name="phone" size="30" maxlength="30" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">

	<p><input id="submit" type="submit" name="submit" value="Register"></p>
</form>
</div>
<footer>
<?php include ('includes/footer.inc'); ?>
</footer>
</div>
</div>
<div>
</div>
</body>
</html>