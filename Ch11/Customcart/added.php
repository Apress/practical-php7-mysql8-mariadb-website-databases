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
<title>The confirmation page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
p, h3 { text-align:center;}
</style> 
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_found_pics_cart.inc'); ?>
</header>
<div id="content"><!--Start of confirmation page-->
<p>
<?php
if ( isset( $_GET['id'] ) ) { $id = $_GET['id'] ; }
// Connect to the database
try {
require ( 'mysqli_connect.php' ) ;
// Get selected painting data from the  'art' table 
        $query = "SELECT * FROM art ";
		$query .= "WHERE art_id = ? ";		
		$q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // bind $id to SQL Statement
	    mysqli_stmt_bind_param($q, "s", $id); 
       // execute query 
        mysqli_stmt_execute($q);
       $result = mysqli_stmt_get_result($q);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       if (mysqli_num_rows($result) == 1) {
 // If the cart already contains one of those products
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
    // Add another one of those paintings
    $_SESSION['cart'][$id]['quantity']++; 
    echo '<h3>Another one of those paintings has been added to your cart</h3>';
  } 
  else
  {
    // Add a different painting
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['price'] ) ;
    echo '<h3>A painting has been added to your cart</h3>' ;
  }
}
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
// Close the database connection
mysqli_close($dbcon);
// Insert three lnks
echo '<p><a href="found_pics_cart.php">Continue Shopping</a> | <a href="checkout.php">Checkout</a></p>' ;
?>
<footer>
<?php include("includes/footer.inc"); ?>
</footer>
</div><!--End of confirmation page content-->
</div>
</body>
</html>