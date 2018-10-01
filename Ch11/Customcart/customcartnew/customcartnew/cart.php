<?php                                                                                     
session_start();
//Data from valid source?
if (!isset($_SESSION['user_id']))
{ header("Location: index.php");
exit();
}
$menu = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="transparent.css">
</head>
<body>
<div class="container" style="margin-top:10px">
<!-- Header Section -->
<header class="jumbotron text-center row mx-auto" id="includeheader"> 
<?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
  <div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-8 text-center" style="padding:0px; margin-top: 5px;">
	<!--Start of view cart content-->
<?php
// This code is a query that INSERTs a paintings in the art table
// Confirm that form has been submitted
//if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	require("process_cart.php");
//}
?>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
<footer class="jumbotron row" id="includefooter">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</div>
</div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-4" id="includemenu">
      <?php include('includes/menu.php'); ?> 
	</aside>
	</div>
</div>
</div>
</body>
</html>