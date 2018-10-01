<?php
$menu = 8;
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
  <div class="col-sm-8 text-center" style="padding:0px; margin-top: 5px;">
	<!--Start of admin add paintings content-->
<?php
// This code is a query that INSERTs a paintings in the art table
// Confirm that form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require("process_register.php"); }
?>
<form  action="register.php" method="post" onsubmit="return checked();">
<div class="form-group row">
    <label class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
<h2>Account Registration</h2>
<h6>Items marked with an asterisk * are essential</h6>
</div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label text-right">Title:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="title" name="title" 
	  placeholder="Title" maxlength="12"
	  pattern='[a-zA-Z][a-zA-Z\s\.]*' 
	  title="Alphabetic, period and space max 12 characters"
	  value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="First Name" maxlength="30" required
	  value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  pattern="[a-zA-Z][a-zA-Z\s\-\']*" 
	  title="Alphabetic, dash, quote and space only max of 40 characters"
	  placeholder="Last Name" maxlength="40" required
	  value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">E-mail*:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email" 
	  placeholder="E-mail" maxlength="60" required
	  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="password1" class="col-sm-4 col-form-label text-right">Password*:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password1" name="password1" 
	  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
	  title="One number, one upper, one lower, one special, with 8 to 12 characters"
	  placeholder="Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
	  <span id='message'>Between 8 and 12 characters.</span>
    </div>
  </div>
<div class="form-group row">
    <label for="password2" class="col-sm-4 col-form-label text-right">Confirm Password*:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password2" name="password2"
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
	  title="One number, one uppercase, one lowercase letter, with 8 to 12 characters"
	  placeholder="Confirm Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="address1" class="col-sm-4 col-form-label text-right">Address*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address1" name="address1" 
	  pattern="[a-zA-Z][a-zA-Z\s\.\,\-]*" 
	  title="Alphabetic, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30" required
	  value="<?php if (isset($_POST['address1'])) echo $_POST['address1']; ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="address2" class="col-sm-4 col-form-label text-right">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address2" name="address2" 
	  pattern="[a-zA-Z][a-zA-Z\s\.\,\-]*" 
	  title="Alphabetic, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30"
	  value="<?php if (isset($_POST['address2'])) echo $_POST['address2']; ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="city" class="col-sm-4 col-form-label text-right">City*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="city" name="city" 
	  pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="City" maxlength="30" required
	  value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>">
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
	  value="<?php if (isset($_POST['state_country'])) echo $_POST['state_country']; ?>">
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
	  value="<?php if (isset($_POST['zcode_pcode'])) echo $_POST['zcode_pcode']; ?>">
    </div>
  </div>		
<div class="form-group row">
    <label for="phone" class="col-sm-4 col-form-label text-right">Telephone:</label>
    <div class="col-sm-8">
      <input type="tel" class="form-control" id="phone" name="phone" 
	  placeholder="Phone Number" maxlength="30"
	  value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
    </div>
  </div>
  <div class="form-group row">
      <label for="question" class="col-sm-4 col-form-label text-right">
	  Secret Question*:</label>
	  <div class="col-sm-8">
      <select id="question" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Still-life">Mother's Madien Name</option>
	<option value="Nature">Pet's Name</option>
	<option value="Abstract">High School</option>
	<option value="Abstract">Favorite Vacation Spot</option>
	</select>
	</div>
	</div>  
	<div class="form-group row">
    <label for="secret" class="col-sm-4 col-form-label text-right">Answer*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="secret" name="secret" 
	  pattern="[a-zA-Z][a-zA-Z\s\.\,\-]*" 
	  title="Alphabetic, period, comma, dash and space only max of 30 characters" 
	  placeholder="Secret Answer" maxlength="30" required
	  value="<?php if (isset($_POST['secret'])) echo $_POST['secret']; ?>">
    </div>
  </div>
 <div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
<input id="submit" class="btn btn-primary" 
type="submit" name="submit" value="Submit">
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
</form><!--End of the add a painting content-->
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