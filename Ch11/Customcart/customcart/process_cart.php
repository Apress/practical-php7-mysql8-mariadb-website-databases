<?php
// If the user changes the quantity then Update the cart
  if(isset($_POST['qty'])) {
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
?>
  <div class="row mx-auto" style="padding-left: 0px; height: auto;">
  <!-- Center Column Content Section -->
  <div class="col-sm-4 text-center mx-auto" style="padding-left: 40px;"></div>
  <div class="col-sm-10 text-center mx-auto" 
  style="color: black; padding:20px; margin-top: 5px;">
  <?php
	try {
// Connect to the database.
  require ('mysqli_connect.php');
// Get the items from the art table and insert them into the cart
  $q = "SELECT * FROM art WHERE art_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY art_id ASC';
  $result = mysqli_query ($dbcon, $q);
// Create a form and a table
  echo '<form action="cart.php" method="post">';
  echo '<table class="table table-responsive table-striped" style=" color:black;">';
  echo '<tr><th scope="col">Medium</th><th scope="col">Type</th>';
  echo '<th scope="col">Quantity</th><th scope="col"></th>';
  echo '<th scope="col">Price</th></tr>';
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
  </table>';
  echo '<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Update Order"></form>';
	}
catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Cart | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Cart Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Cart Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Cart | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Cart Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Cart Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
} 
echo "</div>";
echo "</div>";
}
else
// Or display a message
{ echo '<p style="padding: 60px;">Your cart is currently empty.</p>' ; 
}
// Create some links
echo '<p><a href="users_search_page.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a>' ;
?>