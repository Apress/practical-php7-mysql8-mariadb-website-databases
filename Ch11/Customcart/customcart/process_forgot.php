<?php
	try {
	require ('mysqli_connect.php');
	// Assign the value FALSe to the variable $buyid 
	$buyid = FALSE;
// Validate the email address...
if (!empty($_POST['email'])) {
// Does that email address exist in the database?
		$query = 'SELECT user_id, user_level, secret FROM users WHERE email=?';	
		$q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // bind $id to SQL Statement
	    mysqli_stmt_bind_param($q, "s", $_POST['email']); 
       // execute query 
        mysqli_stmt_execute($q);
       $result = mysqli_stmt_get_result($q);
       $row = mysqli_fetch_array($result, MYSQLI_NUM);
       if ((mysqli_num_rows($result) == 1) && ($row[1] == 0) &&
	       ($row[2] == $_POST['secret']))
	   {
		$buyid = $row[0];
		} else { // If the buyid for the email address was not retrieved
			echo '<h6 style="padding-left:80px; padding-top: 20px;">If your e-mail and secret are correct, you will recieve an e-mail</h6>';
		}
		} 
	if ($buyid) { // If buyid for the email address was retrieved, create a random password
		$password = substr ( md5(uniqid(rand(), true)), 5, 10);
// Update the database table
        $hassed_password = password_hash($password, PASSWORD_DEFAULT);			
        $query = "UPDATE users SET password=? WHERE user_id=?";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // bind $id to SQL Statement
	    mysqli_stmt_bind_param($q, "si", $hassed_password, $buyid); 
       // execute query 
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {		   
// Send an email to the buyer
		$body = "Your password has been changed to '" . $password;
		$body .= "'. Please login as soon as possible using the new password. ";
		$body .= "Then change it immediately. otherwise, if a hacker has intercepted ";
		$body .= "this email they will know your login details.";
		mail ($_POST['email'], 'Your new password.', $body, 'From: admin@thedovegallery.co.uk');
// Echo a message and exit the code
		echo '<h6 style="padding-left:80px; padding-top: 20px;">Your password has been changed. ';
		echo 'You will shortly receive the new temporary password by email.</h6>';
		mysqli_close($dbcon);
		include ('includes/footer.php');
		exit(); // Stop the script.
		} else { // If the query failed to run
			echo '<p class="error">Due to a system error, your password could not be changed. We apologize for any inconvenience.</p>'; 
		}
		} 
	mysqli_close($dbcon);
	}
	catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Forgot Password | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Forgot Password Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Forgot Password Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Forgot Password | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Forgot Password Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Forgot Password Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
} 
?>