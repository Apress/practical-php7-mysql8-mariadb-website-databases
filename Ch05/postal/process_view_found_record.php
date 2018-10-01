<?php
try
{
// This script retrieves records from the users table.                         
require ('./mysqli_connect.php'); // Connect to the db.
echo '<p class="text-center">If no record is shown, ';
echo 'this is because you had an incorrect ';
echo ' or missing entry in the search form.';
echo '<br>Click the back button on the browser and try again</p>';
$first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
$last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
// Since it's a prepared statement below this sanitizing is not needed
// However, to consistantly retrieve than sanitize is a good habit

$query = "SELECT last_name, first_name, email, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
$query .=" AS regdat, class, paid, userid FROM users WHERE ";
$query .= "last_name=? AND first_name=? ";
$query .="ORDER BY registration_date ASC ";		

$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);

// bind values to SQL Statement
mysqli_stmt_bind_param($q, 'ss', $last_name, $first_name);

// execute query	 
mysqli_stmt_execute($q); 

$result = mysqli_stmt_get_result($q);

if ($result) { // If it ran, display the records.
// Table header.
echo '<table class="table table-striped">
<tr>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
<th scope="col">Last Name</th>
<th scope="col">First Name</th>
<th scope="col">Email</th>
<th scope="col">Date Registered</th>
<th scope="col">Class</th>
<th scope="col">Paid</th>
</tr>';	
// Fetch and display the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// Remove special characters that might already be in table to 
	// reduce the chance of XSS exploits
	$user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
	$last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
	$first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
	$email = htmlspecialchars($row['email'], ENT_QUOTES);
	$registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
	$class = htmlspecialchars($row['class'], ENT_QUOTES);
	$paid = htmlspecialchars($row['paid'], ENT_QUOTES);
	echo '<tr>
	<td><a href="edit_user.php?id=' . $user_id . '">Edit</a></td>
	<td><a href="delete_user.php?id=' . $user_id . '">Delete</a></td>
	<td>' . $last_name . '</td>
	<td>' . $first_name . '</td>
	<td>' . $email . '</td>
	<td>' . $registration_date . '</td>
	<td>' . $class . '</td>
	<td>' . $paid . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	//                                                            
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Public message:
	echo '<p class="center-text">The current users could not be retrieved.';
	echo 'We apologize for any inconvenience.</p>';
	// Debugging message:
	//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>'; 
	//Show $q is debug mode only
} // End of if ($result). Now display the total number of records/members.
mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e)
{
print "The system is currently busy. Please try later.";
//print "An Exception occurred.Message: " . $e->getMessage();
}catch(Error $e)
{
print "The system us busy. Please try later.";
//print "An Error occured. Message: " . $e->getMessage();
}
?>