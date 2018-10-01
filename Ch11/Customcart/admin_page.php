<?php                                                                                     
session_start();
// Data from valid source?
if (!isset($_SESSION['user_id']))
{ header("Location: index.php");
exit();
} else {
if (($_SESSION['user_level'] != 1))
{ header("Location: index.php");
exit();
}}
?>
<!doctype html>
<html lang="en">
<head>
<title>Admin and add artist page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#content h2 { margin-left:-220px; width:550px; }
#content h2.main_title { margin-left:-20px; width:250px; }
ul { margin-top:0; }
ul li { height:30px; }
p { margin-bottom:-5px; width:600px; }
form { 	margin-left:180px; }
#submit {margin-top:0; margin-left:215px; }
.cntr {	text-align:center;}
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
footer { margin-left:150px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_admin.inc'); ?>
</header>
<div id="content"><!-- Start of admin page content. -->
<?php
// Has the form has been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); // Set an error array.
// Has an artist's first name been entered?
    $first_name = trim($_POST['first_name']);
	if (empty($first_name)) {
		$errors[] = 'You forgot to enter the artist\'s first name';
	}
// Has an artist's middle name been entered?
    $middle_name = trim($_POST['middle_name']);
	if (empty($middle_name)) {
		$errors[] = 'You forgot to enter the artist\'s middle name';
	} 
// Has the artist's last name been entered?
    $last_name = trim($_POST['last_name']);
	if (empty($last_name)) {
		$errors[] = 'You forgot to enter the artist\'s last name';
	} 
if (empty($errors)) { // If the wuery ran OK
	// Register the artist in the database
	
	try {
		require ('mysqli_connect.php'); // Connect to the db.
		// Make the query:
		$query = "INSERT INTO artists (artist_id, first_name, middle_name, last_name) ";
        $query .= "VALUES ";
	    $query .= "(' ',?,?,?)"; 
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // use prepared statement to insure that only text is inserted
        // bind fields to SQL Statement
        mysqli_stmt_bind_param($q, 'sss', $first_name, $middle_name, $last_name);
        // execute query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {		
		echo '<h2>The artist was successfully added. Add another one?</h2><br>';
		} else { // If the query failed to run
		// Message:
			echo '<h2>System Error</h2>
			<p class="error">The artist could not be added due to a system error. We apologize for any inconvenience.</p>'; 
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection
	}
catch(Exception $e)
{
	print "The system is busy, please try later";
    //print "An Exception occurred. Message: " . $e->getMessage();
}
catch(Error $e)
{
	print "The system is busy, please come back later";
    //print "An Error occurred. Message: " . $e->getMessage();
}
	} else { // Display any errors
		echo '<h2>Error!</h2>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Dispaly any errors
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
		}// End of if error checks
} // End of the conditionals
?>
<div id="rightcol">
<nav>
<?php include('includes/menu.inc'); ?>
</nav>
</div>
<h2 class="main_title">Add an Artist</h2>
<h3 class="cntr">If the artist uses only one name (e.g., Picasso) enter it as the last name</h3> 
<form  action="admin_page.php" method="post">
<p><label class="label" for="first_name"><b>Artist's First Name:</b></label><input id="first_name" type="text" name="first_name" size="30" maxlength="30" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
<p><label class="label" for="middle_name"><b>Artist's Middle Name:</b></label><input id="middle_name" type="text" name="middle_name" size="30" maxlength="30" value="<?php if (isset($_POST['middle_name'])) echo $_POST['middle_name']; ?>">
<p><label class="label" for="last_name"><b>Artist's Last Name:</b></label><input id="last_name" type="text" name="last_name" size="30" maxlength="30"required value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
<br>
<p><input id="submit" type="submit" name="submit" value="Add"></p>
</form><!-- End of the admin page content -->
<footer>
<?php include ('includes/footer.inc'); ?>
</footer><br></div></div>
<div>
</div>
</body>
</html>