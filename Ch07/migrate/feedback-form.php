<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
//require("cap.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Feedback Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
<script src='https://www.google.com/recaptcha/api.js'></script>   
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row col-sm-14"
style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
  <?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('includes/nav.php'); ?> 
      </ul>
  </nav>
  <!-- Validate Input -->
<div class="col-sm-8">
<h3 class="text-center">Edit Your Account Details</h3>
<h4 class="text-center">For your own security, please remember to log out!</h4>
<h5 class="text-center"><strong>Address:</strong> 1 The Street, Townsville, AA6 8PF, <strong>Tel:</strong> 01111 800777</h5>
<h5 class="text-center"><strong>To email us:</strong> Please use this form and click the Send button at the bottom.</h5>
<h4 class="text-center">Essential items are marked with an asterisk</h4>
<form action="feedback-handler.php" method="post" name="feedbackform" id="feedbackform">
<!--START OF TEXT FIELDS-->
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="First Name" maxlength="30" required
	   value=
		"<?php if (isset($row['first_name'])) 
		echo htmlspecialchars($row['first_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  pattern="[a-zA-Z][a-zA-Z\s\-\']*" 
	  title="Alphabetic, dash, quote and space only max of 40 characters"
	  placeholder="Last Name" maxlength="40" required
	  value=
		"<?php if (isset($row['last_name'])) 
		echo htmlspecialchars($row['last_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">E-mail*:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email" 
	  placeholder="E-mail" maxlength="60" required
	   value=
		"<?php if (isset($row['email'])) 
		echo htmlspecialchars($row['email'], ENT_QUOTES); ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="phone" class="col-sm-4 col-form-label text-right">Telephone:</label>
    <div class="col-sm-8">
      <input type="tel" class="form-control" id="phone" name="phone" 
	  placeholder="Phone Number" maxlength="30"
	   value=
		"<?php if (isset($row['phone'])) 
		echo htmlspecialchars($row['phone'], ENT_QUOTES); ?>" >
    </div>
	</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>	
<h5 class="col-sm-8 text-center">Would you like us to send a Brochure? (check box):</h5>
</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>	
<div class="checkbox col-sm-8 text-center">Yes
      <input class="" type="checkbox" name="brochure" id="brochure" value="yes">
</div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>	
<h6 class="col-sm-8 text-center">Please enter address if you checked the brochure box above</h6>
</div>
<div class="form-group row">
    <label for="address1" class="col-sm-4 col-form-label text-right">Address*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address1" name="address1" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" 
	  title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30" required
	   value=
		"<?php if (isset($row['address1'])) 
		echo htmlspecialchars($row['address1'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="address2" class="col-sm-4 col-form-label text-right">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address2" name="address2" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" 
	  title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30"
	   value=
		"<?php if (isset($row['address2'])) 
		echo htmlspecialchars($row['address2'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="city" class="col-sm-4 col-form-label text-right">City*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="city" name="city" 
	  pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="City" maxlength="30" required
	   value=
		"<?php if (isset($_POST['city'])) 
		echo htmlspecialchars($_POST['city'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="state_country" class="col-sm-4 col-form-label text-right">
	Country/state*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="state_country" name="state_country"
      pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="State or Country" maxlength="30" required
	   value=
		"<?php if (isset($_POST['state_country'])) 
		echo htmlspecialchars($_POST['state_country'], ENT_QUOTES); ?>" >
    </div>
  </div>	
 <div class="form-group row">
    <label for="zcode_pcode" class="col-sm-4 col-form-label text-right">
	Zip/Postal Code*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="zcode_pcode" name="zcode_pcode" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="Zip or Postal Code" minlength="5" maxlength="30" required
	   value=
		"<?php if (isset($_POST['zcode_pcode'])) 
		echo htmlspecialchars($_POST['zcode_pcode'], ENT_QUOTES); ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>	
<h5 class="col-sm-8 text-center">Would you like to receive emailed newletters?</h5>
</div>
<fieldset class="form-group row">
	  <label for="" class="col-sm-4 col-form-label text-right"></label>
      <div class="col-sm-8 text-center">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="letter" id="letter" value="yes" checked>
          <label class="form-check-label" for="letter">
            Yes
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="noletter" id="noletter" value="no">
          <label class="form-check-label" for="noletter">
            No
          </label>
        </div>
	</div>
</fieldset>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>
<div class="col-sm-8 text-center">
    <label for="comment">Please enter your message below</label>
    <textarea class="form-control" id="comment" name="comment" rows="12" cols="40"
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
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2">
      <?php include('includes/info-col.php'); ?> 
	</aside>
<!-- Footer Content Section -->
</div>
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;">
  <?php include('includes/footer.php'); ?>
</footer>
</body>
</html>