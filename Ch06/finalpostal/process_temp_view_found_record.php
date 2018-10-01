<?php
try
{

// This script retrieves records from the users table.                         
require ('mysqli_connect.php'); // Connect to the db.
echo '<p class="text-center">If no record is shown, ';
echo 'this is because you had an incorrect ';
echo ' or missing entry in the search form.';
echo '<br>Click the back button on the browser and try again</p>';

$query = "SELECT last_name, first_name, email, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
$query .=" AS regdat, userid FROM users WHERE ";
$query .= "last_name='Smith' AND first_name='James' ";
$query .="ORDER BY registration_date ASC ";		
// Perpared statement not needed because string is hard coded
$result = mysqli_query ($dbcon, $query); // Run the query.
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
	echo '<tr>
	<td><a href="edit_user.php?id=' . $user_id . '">Edit</a></td>
	<td><a href="delete_user.php?id=' . $user_id . '">Delete</a></td>
	<td>' . $last_name . '</td>
	<td>' . $first_name . '</td>
	<td>' . $email . '</td>
	<td>' . $registration_date . '</td>
	</tr>';
	}
	echo '</table>'; // Close the table.
	//                                                            
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Public message:
	echo '<p class="text-center">The current users could not be retrieved.';
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