<?php                                                                                     
session_start();
// Data from valid source?
if (!isset($_SESSION['user_id']))
{ header("Location: index.php");
exit();
}
?>
<!doctype html>
<html lang="en">
<head>
<title>The view cart page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
body { 	margin:auto; }
p{ text-align:center; }
table { width:700px; border-collapse:collapse; border:1px black solid; background:white; margin-left:135px;}
td, th { padding-left:5px; padding-right:5px; text-align:center; }
#content h3 { text-align:center; font-size:130%; font-weight:bold;}
#header-button { margin-top:-5px;}
#submit { margin-left: 425px;
}
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_found_pics_cart.inc'); ?>
</header>
<div id="content"><!--Start of table of cart contents page-->
<h3>Items currently in your cart</h3>
<p>
<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
// If the user changes the quantity then Update the cart
  foreach ( $_POST['qty'] as $art_id => $item_qty )
  {
// Ensure that the id and the quantity are integers
    $id = (int) $art_id;
    $qty = (int) $item_qty;
// If the quantity is set to zero clear the session or else store the changed quantity
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}
// Set an initial variable for the total cost
$total = 0; 
// Display the cart contents
if (!empty($_SESSION['cart']))
{
	try {
// Connect to the database.
  require ('mysqli_connect.php');
// Get the items from the art table and insert them into the cart
  $q = "SELECT * FROM art WHERE art_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY art_id ASC';
  $result = mysqli_query ($dbcon, $q);
// Create a form and a table
  echo '<form action="cart.php" method="post">
  <table><tr>';
  while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC))
  {
// Calculate the subtotals and the grand total
    $subtotal = $_SESSION['cart'][$row['art_id']]['quantity'] * $_SESSION['cart'][$row['art_id']]['price'];
    $total += $subtotal;
// Display the table
    echo "<tr> <td>{$row['type']}</td><td>Painting(s)</td> 
    <td><input type=\"text\" size=\"3\" name=\"qty[{$row['art_id']}]\" value=\"{$_SESSION['cart'][$row['art_id']]['quantity']}\"></td>
    <td>at {$row['price']} each </td> <td style=\"text-align:right\">".number_format ($subtotal, 2)."</td></tr>";
  }
// Close the database connection
  mysqli_close($dbcon); 
// Display the total
  echo ' <tr><td colspan="5" style="text-align:right">Total = '.number_format($total,2).'</td></tr>
  </table>
  <input id="submit" type="submit" name="submit" value="Update My Cart"></form>';
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
}
else
// Or display a message
{ echo '<p>Your cart is currently empty.</p>' ; }
// Create some links
echo '<p><a href="found_pics_cart.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a>' ;
?>
<footer>
<?php include("includes/footer.inc"); ?>
</footer>
</div><!--End of the view cart content-->
</div>
</body>
</html>