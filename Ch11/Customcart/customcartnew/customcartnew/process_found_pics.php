<?php
//Connect to the database
try {
require ( 'mysqli_connect.php' ) ;
// Select the first thre items items from the art table
//$q = "SELECT * FROM art LIMIT 3";
$type=$_SESSION['type'];
$price=$_SESSION['price'];
$query = 
"SELECT art_id, thumb, type, price, medium, artist, mini_descr, ppcode ";
$query .= "FROM art WHERE type= ? AND price <= ? ORDER BY price DESC LIMIT 3";		
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// bind $id to SQL Statement
mysqli_stmt_bind_param($q, "si", $type, $price); 
// execute query 
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);
//  $row = mysqli_fetch_array($result, MYSQLI_NUM);
if (mysqli_num_rows($result) > 0) {

//$result = mysqli_query( $dbcon, $q ) ;
//if ( mysqli_num_rows( $result ) > 0 )
//{
// Table header
?>
<table class="table table-responsive table-striped" style="background: white;">
<tr><th scope="col">Thumb</th><th scope="col">Type</th>
<th scope="col">Medium</th><th scope="col">Artist</th>
<th scope="col">Details</th><th scope="col">Price &pound;</th>
</tr>
<?php	
// Fetch the matching records and populate the table display
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td><img src='.$row['thumb'] . '></td>
	<td>' . $row['type'] . '</td>
	<td>' . $row['medium'] . '</td>
	<td>' . $row['artist'] . '</td>
	<td>' . $row['mini_descr'] . '</td>
	<td>' . $row['price'] . 
	'<br><a href="added.php?id=' . $row['art_id'] . '">Add to Cart</a></td>
	</tr>';
	}
?>
</table>
<?php
// Close the database connection.
  mysqli_close( $dbcon ) ; 
}
// Or notify the user that no matching paintings were found
else { echo '<p>There are currently no items matching your search criteria.</p>' ; }
}
catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Found Pics | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Found Pics Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Found Pics Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Found Pics | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Found Pics Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Found Pics Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
} 
?>