<?php											
session_start();
if (!isset($_SESSION['user_level']) or 
($_SESSION['user_level'] != 1))
{
header("Location: login.php");
exit();
}
define(ERROR_LOG,"errors.log");
?>

<!doctype html>
<html lang="en">
<head>
<title>Delete a record</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css">
p { text-align:center; }
form { text-align:center;}
}
input.fl-left { float:left; 
}
#submit-yes { float:left; margin-left:220px;
}
#submit-no { float:left; margin-left:20px;
}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header-admin.php'); ?>
</header>
<nav>
<?php include('includes/nav.php'); ?>
</nav>
<aside>
<?php include('includes/info-col.php'); ?>
</aside>
<div id="content"><!-- Start of the page-specific content. -->
<h2>Delete a Record</h2>
<?php
try { 
// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
// From view_users.php
$id = $_GET['id'];
} else
if ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
	// Form submission.     
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
//	return to login page
header("Location: login.php");
exit();
}
require ('./mysqli_connect.php');
// Check if the form has been submitted:                                              
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST['sure'] == 'Yes') { // Delete the record.
	// Make the query:
	
	// Use prepare statement to remove security problems
	$q = mysqli_stmt_init($dbcon);
    mysqli_stmt_prepare($q, 'DELETE FROM users WHERE user_id=? LIMIT 1');

    // bind $id to SQL Statement
    mysqli_stmt_bind_param($q, "s", $id);

    // execute query
    mysqli_stmt_execute($q);
	
	if (mysqli_stmt_affected_rows($q) == 1) { // It ran OK
// Print a message:
		echo '<h3>The record has been deleted.</h3>';	
		} else { // If the query did not run OK display public message
		echo '<p class="error">The record could not be deleted.';
		echo '<br>Either it does not exist or due to a system error.</p>';
	//	echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>'; 
	// Debugging message. When live comment out because this displays sql
		}
	} else { // User did not confirm deletion.
		echo '<h3>The user has NOT been deleted as you requested</h3>';	
	}
} else { // Show the form.                                                               
	
	$q = mysqli_stmt_init($dbcon);
	$query = "SELECT CONCAT(fname, ' ', lname) FROM users WHERE user_id=?";
    mysqli_stmt_prepare($q, $query);

    // bind $id to SQL Statement
    mysqli_stmt_bind_param($q, "s", $id);

    // execute query
    mysqli_stmt_execute($q);
	
	 $result = mysqli_stmt_get_result($q);

$row = mysqli_fetch_array($result, MYSQLI_NUM); // get user info

if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
		
		// Display the record being deleted:
		echo "<h3>Are you sure you want to permanently delete $row[0]?</h3>"; 
		// Create the form:
		echo '<form action="delete_record.php" method="post">
	<input id="submit-yes" type="submit" name="sure" value="Yes"> 
	<input id="submit-no" type="submit" name="sure" value="No">
	
	<input type="hidden" name="id" value="' . $id . '">
	</form>';

	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
		echo '<p>&nbsp;</p>';
	}
} // End of the main submission conditional.
mysqli_stmt_close($q);
mysqli_close($dbcon );
		echo '<p>&nbsp;</p>';
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
<footer>
<?php include('includes/footer.php'); ?>
</footer>
</div>
</div>
</body>
</html>