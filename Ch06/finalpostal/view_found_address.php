<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1)) {
header("Location: login.php");
exit();
}
?>
<!doctype html>
<html lang="en">
<head>
<title>View found address page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css"><!--                              #1 -->
p { text-align:center; }
table, tr { width:850px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include("includes/header-admin.php"); ?>
</header>
<nav>
<?php include("includes/nav.php"); ?>
</nav>
<aside>
<?php include("includes/info-col.php"); ?>
</aside>
<div id="content"><!-- Start of the page-specific content. -->
<h2>Search Address Result</h2>
<?php 

// This script fetches records from the users table.
require ('mysqli_connect.php'); // Connect to the database.
$fname = $_POST['fname'];
$fname = mysqli_real_escape_string($dbcon, $fname);
$lname=$_POST['lname'];
$lname = mysqli_real_escape_string($dbcon, $lname);
echo '<p>If no record is shown, this is because you had an incorrect ';
echo 'or missing entry in the search form.<br>';
echo 'Or the person is not registered with us.';
echo '<br>Please click the Addresses button and try again</p>';
try {
$query = "SELECT user_id, title, lname, fname, addr1, addr2, ";
$query .= "city, state_country, zcode_pcode, phone FROM users ";
$query .= "WHERE fname=? AND lname=?";	
// prepared statement to protect $lname $fname values
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);

// bind values to SQL Statement
mysqli_stmt_bind_param($q, 'ss', $fname, $lname);

// execute query
	   
mysqli_stmt_execute($q);  

$result = mysqli_stmt_get_result($q);

if ($result) { // If it ran, display the records.
// Table header.                                     #2

echo '<table>
<tr><th><b>Edit</b></th>
<th><b>Title</b></th>
<th><b>Last Name</b></th>
<th><b>First Name</b></th>
<th><b>Addrs1</b></th>
<th><b>Addrs2</b></th>
<th><b>City</b></th>
<th><b>State_Country</b></th>
<th><b>zcode_pcode</b></th>
<th><b>Phone</b></th>
</tr>';
// Fetch and display the records:                     #3
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td><a href="edit_address.php?id=' . 
	$row['user_id'] . '">Edit</a></td>
	<td>' . $row['title'] . '</td>
	<td>' . $row['fname'] . '</td>
	<td>' . $row['lname'] . '</td>
	<td>' . $row['addr1'] . '</td>
	<td>' . $row['addr2'] . '</td>
	<td>' . $row['city'] . '</td>
	<td>' . $row['state_country'] . '</td>
	<td>' . $row['zcode_pcode'] . '</td>
	<td>' . $row['phone'] . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it failed to run
// Public message:
	echo '<p class="error">The current users could not be retrieved. ';
	echo 'We apologize for any inconvenience.</p>';
	// Debugging message:
	echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result). Now display the total number of records/members.
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$members = $row[0];
mysqli_close($dbcon); //Close the database connection.
echo "<p>Total membership: $members</p>";
}
catch(Exception $e)
{
print "an Exception occurred. Message:" . $e->getMessage();
}
catch(Error $e)
{
print "an Error occurred. Message:" . $e->getMessage();
}
?>
</div><!-- End of address found content. -->
<footer>
<?php include("includes/footer.php"); ?>
</footer>
</div>
</body>
</html>