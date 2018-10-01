<?php
$menu = 4;
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
    <h2>Welcome to the Dove Gallery</h2>
	<h5 style="color: black">To search the gallery, please register and log in</h5>
	<p class="col-sm-12">
<img alt="Brown Jug by Adrian West" class="img-fluid col-sm-3" src="images/aw-brown-vessel-200.jpg"> 
<img alt="L-Silver washed blue" class="img-fluid col-sm-3" src="images/L-silver-studded-blue.jpg"> 
<img alt="White Jug" class="img-fluid col-sm-3" src="images/aw-white-jug-home.jpg"> 
</p>
</div>
<aside class="col-sm-4" id="includemenu" style="padding-right: 16px;">
      <?php include('includes/menu.php'); ?> 
	</aside>
</div>
<div class="row mx-auto">
<div class="col-sm-2"></div>
<div class="col-sm-6">
<img alt="Copper kettle" class="img-fluid com-sm-3" src="images/k-copper-kettle-home.jpg"> 
<img alt="Looking Back at Beer" class="img-fluid col-sm-3" src="images/L-looking-back-a-beer.jpg"> 
</div>
</div>
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
</body>
</html>