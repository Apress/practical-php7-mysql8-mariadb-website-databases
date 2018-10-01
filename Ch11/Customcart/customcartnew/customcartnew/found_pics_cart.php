<?php
session_start();
if (!isset($_SESSION['user_id'])){
header('location:login.php');
exit();
}
$menu = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Paintings Found</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
   <script src="verify.js"></script> 
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
  <div class="col-sm-12 text-center mx-auto" 
  style="color: black; padding:10px; margin-top: 5px;">
	<!--Start of found paintings content-->
<h3 style="color: white;">To buy a painting please click its Add to Cart link</h3>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$_SESSION['type'] = $_POST['type'];
$_SESSION['price'] = $_POST['price'];
require("process_found_pics.php");
}
?>
<p style="color:white">No paintings displayed? Either we have nothing that matches 
your requirements at the moment OR you may have forgotten to select 
BOTH the search fields. Please click the Find Pictures button and try again.</p>
</div>
	</div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
<footer class="jumbotron row" id="includefooter">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</div>
</div><!--End of content-->
</div>
</body>
</html>