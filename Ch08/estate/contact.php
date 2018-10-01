<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
<script src='https://www.google.com/recaptcha/api.js'></script> 
<link rel="stylesheet" type="text/css" href="transparent.css">  
</head>
<body>
<div class="container" style="margin-top:30px">
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
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
<div class="col-sm-8">
<form action="contact-handler.php" method="post" name="feedbackform" id="feedbackform">
  <!-- Validate Input -->
  <div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-sm-8">
<h4 class="text-center">Contact us to Arrange a Viewing</h4>
<h5 class="text-center"><strong>Address:</strong> 1 The Street, Townsville, AA6 8PF, <strong>Tel:</strong> 01111 800777</h5>
<h5 class="text-center"><strong>To contact us:</strong> Please use this form and click the Send button at the bottom.</h5>
<h5 class="text-center">Essential items are marked with an asterisk</h5>
</div>
</div>
<!--START OF TEXT FIELDS-->
<div class="form-group row">
    <label for="username" class="col-sm-4 col-form-label text-right">Your Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username" name="username" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="Your Name" maxlength="30" required
	   value=
		"<?php if (isset($_POST['username'])) 
		echo htmlspecialchars($_POST['username'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="useremail" class="col-sm-4 col-form-label text-right">E-mail*:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="useremail" name="useremail" 
	  placeholder="Your E-mail" maxlength="60" required
	   value=
		"<?php if (isset($_POST['useremail'])) 
		echo htmlspecialchars($_POST['useremail'], ENT_QUOTES); ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="phone" class="col-sm-4 col-form-label text-right">Telephone*:</label>
    <div class="col-sm-8">
      <input type="tel" class="form-control" id="phone" name="phone" 
	  placeholder="Phone Number" maxlength="30"
	   value=
		"<?php if (isset($_POST['phone'])) 
		echo htmlspecialchars($_POST['phone'], ENT_QUOTES); ?>" >
    </div>
	</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>	
<h5 class="col-sm-8 text-center">To request a viewing please enter the reference number of the house below</h5>
</div>
<div class="form-group row">
    <label for="address1" class="col-sm-4 col-form-label text-right">House Reference Number*:</label>
    <div class="col-sm-8">
      <input type="num" class="form-control" id="ref_number" name="ref_number" 
	  pattern="[0-9]*" 
	  title="Numbers only max of 30 characters" 
	  placeholder="Reference Number" maxlength="30" required
	   value=
		"<?php if (isset($_POST['ref_number'])) 
		echo htmlspecialchars($_POST['ref_number'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>
<div class="col-sm-8 text-center">
    <label for="comment" style="color:white;">Please enter your message below</label>
    <textarea class="form-control" id="comment" name="comment" rows="8" cols="40"
	value=
		"<?php if (isset($_POST['comment'])) 
		echo htmlspecialchars($_POST['comment'], ENT_QUOTES); ?>" >
	</textarea>
  </div>
 </div>
 <div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="g-recaptcha" style="margin-left: 80px;" data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>
<div class="form-group row">
	<label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8 text-center">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Send">
    </div>
	</div>
	</form>
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