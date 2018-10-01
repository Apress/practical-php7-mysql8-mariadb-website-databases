<!DOCTYPE html>
<?php
session_start();
$_SESSION['previous_url'] = 'index';
?>
<html lang="en">
<head>
  <title>Estate Home Page</title>
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
<header> 
<?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
  <div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
	<!--Start of admin add paintings content-->
<div class="row">
    <div class="col-sm-4">
    <h4>Search for your dream house</h4>
	<h6>IMPORTANT: Select an item in
	ALL fields otherwise the search will not succeed</h6>
<form action="found_houses.php" method="post"
name="searchform" id="searchform">

<div class="form-group row form-control-sm no-gutters" style="padding: 0px;">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding: 0px;">
      <label for="location" class="col-form-label text-right">
	  Location:</label>  
      <select id="location" name="location" class="form-control" required>
        <option selected value="">- Select -</option>
	<option value="South_Devon">South Devon</option>
	<option value="Mid_Devon">Mid Devon</option>
	<option value="North_Devon">North Devon</option>
	</select>
	</div>
	</div>  
<div class="form-group row form-control-sm no-gutters" style="padding: 0px;" >
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding: 0px;">
      <label for="price" class=" col-form-label text-right">
	  Maximum Price:</label>
      <select id="price" name="price" class="form-control" required>
        <option selected value="">- Select -</option>
	<option value="200000">&pound;200,000</option>
	<option value="300000">&pound;300,000</option>
	<option value="400000">&pound;400,000</option>
	</select>
	</div>
	</div>  
<div class="form-group row form-control-sm no-gutters" style="padding: 0px;" >
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding: 0px;" >
      <label for="type" class="col-form-label text-right">
	  Type:</label>
      <select id="type" name="type" class="form-control" required>
        <option selected value="">- Select -</option>
	<option value="Det-bung">Detached Bungalow</option>
	<option value="Semi-det-bung">Semi-detached Bungalow</option>
	<option value="Det-house">Detached House</option>
	<option value="Semi-det-house">Semi-detached House</option>
	</select>
	</div>
	</div> 	
<div class="form-group row form-control-sm no-gutters" style="padding: 0px;">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="padding: 0px;">
      <label for="bedrooms" class="col-form-label text-right">
	  No. of Bedrooms:</label>
      <select id="bedrooms" name="bedrooms" class="form-control" style="margin: 0px;" required>
        <option selected value="">- Select -</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	</select>
	</div>
	</div>  		
<div class="form-group row form-control-sm ">
	<label for="" class="col-sm-3 col-form-label"></label>
    <div class="col-sm-6 text-center style="padding: 0px;" >
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Search">
    </div>
	</div>
</form>
</div>
<div class="col-sm-4">
<h6>All houses are situated in the beautiful green rolling countryside of Devon, England, UK</h6>
	<img alt="SW England" class="img-fluid"  src="images/devon-map-crop.jpg" >
</div>
<div class="col-sm-4">
<?php include ('includes/menu.php'); ?>
</div>
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
</body>
</html>