 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank you for your inquiry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row"
style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
  <?php include('../includes/thankyou-header.php'); ?>
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('../includes/nav.php'); ?> 
      </ul>
  </nav>
<!-- Center Column Content Section -->
<div class="col-sm-8">
<h3 class="text-center" >Thank you for your inquiry.</h3>
<h3 class="text-center" >We will email an answer to you shortly.</h3>
</div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2">
      <?php include('../includes/info-col.php'); ?> 
	</aside>
  </div>
 <div class="row col-sm-12" style="padding-left: 0px;  padding-bottom: 20px;"> 
<div class="col-sm-5"></div>
<nav class="col-sm-4 text-center">
<ul class="nav nav-pills">
<li class="nav-item">
          <a class="nav-link active" href="index.php">Return to Home Page</a>
</li>
</ul>
</nav>
</div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;">
  <?php include('../includes/footer.php'); ?>
</footer>
</div>
</body>
</html>
