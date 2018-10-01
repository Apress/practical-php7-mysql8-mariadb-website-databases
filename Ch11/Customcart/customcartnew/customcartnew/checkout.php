<?php
session_start();
if (!isset($_SESSION['user_id'])){
header('location:login.php');
exit();
}
$menu=10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Template for an interactive web page</title>
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
<?php
require("process_checkout.php");
?>
<div class="container" style="margin-top:10px">
<!-- Header Section -->
<header class="jumbotron text-center row mx-auto" id="includeheader"> 
<?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
  <div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
	<!--Start of admin add paintings content-->

	<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
<h2>Thank you for your order. Your order number is 
<?php echo date('YmdHis') . $_SESSION['user_id']; ?>.</h2>
<h6>The shopping cart has been emptied ready for your next 
transaction.</h6>
</div>
<div class="col-sm-4">
	<nav>
	<?php include('includes/menu.php'); ?>
	</nav>
</div>
</div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php include ('includes/footer.php'); ?>
</footer>
</div>
</div>
</div>
</div>
</div>
</body>
</html>