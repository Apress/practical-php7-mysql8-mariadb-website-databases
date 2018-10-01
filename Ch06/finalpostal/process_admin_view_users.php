<?php
try {
// This script retrieves all the records from the users table.
require('mysqli_connect.php'); // Connect to the database.
//set the number of rows per display page
$pagerows = 4; //                                                                       
// Has the total number of pagess already been calculated?
if ((isset($_GET['p']) && is_numeric($_GET['p']))) { //already been calculated
$pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
// make sure it is not executable XSS
}else{//use the next block of code to calculate the number of pages                     
//First, check for the total number of records
$q = "SELECT COUNT(userid) FROM users";
$result = mysqli_query ($dbcon, $q);
$row = mysqli_fetch_array ($result, MYSQLI_NUM);
$records = htmlspecialchars($row[0], ENT_QUOTES);
// make sure it is not executable XSS
//Now calculate the number of pages
if ($records > $pagerows){ //if the number of records will fill more than one page
//Calculate the number of pages and round the result up to the nearest integer
$pages = ceil ($records/$pagerows); //                                                   
}else{
$pages = 1;
}
}//page check finished
//Declare which record to start with                                                     
if ((isset($_GET['s'])) &&( is_numeric($_GET['s'])))
{
$start = htmlspecialchars($_GET['s'], ENT_QUOTES);
// make sure it is not executable XSS
}else{
$start = 0;
}
$query = "SELECT last_name, first_name, email, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
$query .=" AS regdat, userid FROM users ORDER BY registration_date ASC";
$query .=" LIMIT ?, ?";

$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);

// bind $id to SQL Statement
mysqli_stmt_bind_param($q, "ii", $start, $pagerows); 

// execute query

mysqli_stmt_execute($q);

$result = mysqli_stmt_get_result($q);

if ($result) { // If it ran OK (records were returned), display the records.
// Table header. 									#2
echo '<table class="table table-striped">
<tr>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
<th scope="col">Last Name</th>
<th scope="col">First Name</th>
<th scope="col">Email</th>
<th scope="col">Date Registered</th>
</tr>';				
// Fetch and print all the records:							
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
}
else { // If it did not run OK.
// Error message:
echo '<p class="text-center">The current users could not be retrieved. We apologize';
echo ' for any inconvenience.</p>';
// Debug message:
// echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
exit;
} // End of else ($result) 
// Now display the total number of records/members.           
$q = "SELECT COUNT(userid) FROM users";
$result = mysqli_query ($dbcon, $q);
$row = mysqli_fetch_array ($result, MYSQLI_NUM);
$members = htmlspecialchars($row[0], ENT_QUOTES);
mysqli_close($dbcon); // Close the database connection.     
$echostring = "<p class='text-center'>Total membership: $members </p>";
$echostring .= "<p class='text-center'>";
if ($pages > 1) {//                                             
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
$echostring .= '<a href="admin_view_users.php?s=' . ($start - $pagerows) . 
'&p=' . $pages . '">Previous</a> ';
}
//Create a Next link                                                  
if ($current_page != $pages) {
$echostring .= ' <a href="admin_view_users.php?s=' . ($start + $pagerows) . 
'&p=' . $pages . '">Next</a> ';
}
$echostring .= '</p>';
echo $echostring;
}
//}
//mysqli_close($dbcon); // Close the database connection.
} //end of try
catch(Exception $e) // We finally handle any problems here                
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
   }
?>