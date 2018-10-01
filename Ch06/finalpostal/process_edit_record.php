<?php
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

require ('./mysqli_connect.php'); 
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
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
//Is the class present? If it is, sanitize it
$class = filter_var( $_POST['level'], FILTER_SANITIZE_STRING);	    		
if ((!empty($class)) && (strlen($class) <= 3)) {					
	//Sanitize the trimmed phone number	
	$classtrim = (filter_var($class, FILTER_SANITIZE_NUMBER_INT));	
	}else{	
	$errors[] = 'Missing Level Selection.';
	}
	// Look for the Paid Status:
	$paid = filter_var( $_POST['paid'], FILTER_SANITIZE_STRING);	
	if (empty($paid)) {
		$errors[] = 'You forgot to enter the paid status.';
	}
	if (!(($paid == "No") || ($paid == "Yes"))) {
		$errors[] = "Paid must be No or Yes.";
	}	
	if (empty($errors)) { // If everything's OK.                                     
		$q = mysqli_stmt_init($dbcon);
		$query = 'SELECT userid FROM users WHERE email=? AND userid !=?';
        mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
		mysqli_stmt_bind_param($q, 'si', $email, $id);
		
       // execute query
	   
       mysqli_stmt_execute($q);
	   $result = mysqli_stmt_get_result($q);

	if (mysqli_num_rows($result) == 0) { // e-mail does not exist in another record
		 $query = 'UPDATE users SET first_name=?, last_name=?, email=?,';
		 $query .= ' class=?, paid=?';
         $query .= ' WHERE userid=? LIMIT 1';
		 $q = mysqli_stmt_init($dbcon);
         mysqli_stmt_prepare($q, $query);

        // bind values to SQL Statement
	
		mysqli_stmt_bind_param($q, 'sssssi', $first_name, $last_name, $email, $class, $paid, $id);
       // execute query
	   
       mysqli_stmt_execute($q);   
			
			if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
			
			// Echo a message if the edit was satisfactory:
				echo '<h3 class="text-center">The user has been edited.</h3>';	
						} else { // Echo a message if the query failed.
				echo '<p class="text-center">The user could not be edited. Did you change anything?';
                echo ' We apologize for any inconvenience.</p>'; // Public message.
				//echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				// Message above is only for debug and should not display sql in live mode
			}
		} else { // Already registered.
			echo '<p class="text-center">The email address has already been registered.</p>';
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
	$query = 
	"SELECT first_name, last_name, email, class, paid FROM users WHERE userid=?";
    mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
	mysqli_stmt_bind_param($q, 'i', $id); 
      
       // execute query
	   
    mysqli_stmt_execute($q);  
	   
	$result = mysqli_stmt_get_result($q);

	$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
	// Get the user's information:
	
	// Create the form:
?>
<h2 class="h2 text-center">Edit a Record</h2>
<form action="edit_user.php" method="post"	
	name="editform" id="editform">
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="First Name" maxlength="30" required
	   value=
		"<?php if (isset($row1['first_name'])) 
		echo htmlspecialchars($row1['first_name'], ENT_QUOTES); ?>" >
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
		"<?php if (isset($row1['last_name'])) 
		echo htmlspecialchars($row1['last_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">E-mail*:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email" 
	  placeholder="E-mail" maxlength="60" required
	   value=
		"<?php if (isset($row1['email'])) 
		echo htmlspecialchars($row1['email'], ENT_QUOTES); ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="level" class="col-sm-4 col-form-label text-right">Membership Class*</label>
    <div class="col-sm-8">
		<select id="level" name="level" class="form-control" required>
		<option value="0" >-Select-</option>
<?php
 require_once("mysqli_connect.php");
$query = "SELECT * FROM prices";		
$result = mysqli_query ($dbcon, $query); // Run the query.
if ($result) { // If it ran OK, display the records.
$row = mysqli_fetch_array($result, MYSQLI_NUM);
$yearsarray = array(
"Standard one year:", "Standard five year:", "Military one year:", "Under 21 one year:",
 "Other - Give what you can. Maybe:" );
for ($j = 0, $i = 0; $j < 5; $j++, $i = $i + 2) {

	echo '<option value="' .
		 htmlspecialchars($row[$i], ENT_QUOTES) . '" ';	
	if ((isset($row1['level'])) && ( $row1['level'] == $row[$i])) 
		{ 
	?>
			selected
	<?php } 
	echo ">" . $yearsarray[$j] . " " .
	    htmlspecialchars($row[$i], ENT_QUOTES) .
		" &pound; GB, " .
		 htmlspecialchars($row[$i + 1], ENT_QUOTES) .
		 "&dollar; US</option>";
}
}
echo "here";
?>
</select>
</div>
</div>
 <div class="form-group row">
    <label for="paid" class="col-sm-4 col-form-label text-right">Paid:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="paid" name="paid" 
	  placeholder="Paid" maxlength="60" required
	  value="<?php echo htmlspecialchars($row1['paid'], ENT_QUOTES); ?>">
    </div>
  </div> 
<input type="hidden" name="id" value="<?php echo $id ?>" />
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
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
catch(Exception $e)
{
	print "The system is busy. Please try later";
	//print "An Exception occurred.Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is currently busy. Please try again later";
	//print "An Error occured. Message: " . $e->getMessage();
}
?>