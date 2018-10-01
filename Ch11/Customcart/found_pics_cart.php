<?php
session_start();
if (!isset($_SESSION['user_id'])){
header('location:login.php');
exit();
}
?>
<!doctype html>
<html lang="en">
<head>
<title>The page for displaying the found paintings</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="transparent.css">
<link rel="stylesheet" type="text/css" href="found_paintings.css">
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_found_pics_cart.inc'); ?>
<div id="content"><!--Start of table displaying selected paintings-->
<h3>To buy a painting please click its Add to Cart link</h3>
<p>
<?php
//Connect to the database
try {
require ( 'mysqli_connect.php' ) ;
// Select the first thre items items from the art table
$q = "SELECT * FROM art LIMIT 3";
$result = mysqli_query( $dbcon, $q ) ;
if ( mysqli_num_rows( $result ) > 0 )
{
// Table header
echo '<table>
<tr>
<th class="thumb"><b>Thumb</b></th>
<th class="narrow"><b>Type</b></th>
<th class="medium"><b>Medium</b></th>
<th class="artist"><b>Artist</b></th>
<th class="descr"><b>Details</b></th>
<th class="narrow"><b>Price &pound;</b></th>
</tr>';
// Fetch the matching records and populate the table display
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr>
	<td class="thumb"><img src='.$row['thumb'] . '></td>
	<td class="narrow">' . $row['type'] . '</td>
	<td class="medium">' . $row['medium'] . '</td>
	<td class="artist">' . $row['artist'] . '</td>
	<td class="descr">' . $row['mini_descr'] . '</td>
	<td class="artist">' . $row['price'] . 
	'<br><a href="added.php?id=' . $row['art_id'] . '">Add to Cart</a></td>
	</tr>';
	}
	echo '</table>'; // End of table
// Close the database connection.
  mysqli_close( $dbcon ) ; 
}
// Or notify the user that no matching paintings were found
else { echo '<p>There are currently no items matching your search criteria.</p>' ; }
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
?>
<p>No paintings displayed? Either we have nothing that matches your requirements at the moment OR<br>you may have forgotten to select 
BOTH the search fields. Please click the Home Page button and try again.</p>
<footer>
<?php include("includes/footer.inc"); ?>
</footer>
</div><!--End of content-->
<br>
</div>
</body>
</html>