<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
//require("cap.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="transparent.css">
<script src='https://www.google.com/recaptcha/api.js'></script>   
</head>
<body>
<div class="container" style="margin-top:10px">
<!-- Header Section -->
<header>
  <?php include('includes/header_advert.php'); ?>
</header>

<!-- Body Section -->
  <!-- Validate Input -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                             
 require('process-register-page.php');
} // End of the main Submit conditional.
?>
<div class="content mx-auto" id="contents" style="padding-top:10px">
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<div class="col-sm-8">
<h2 class="h2 text-center">Register</h2>
<h3 class="h3 text-center">
<?php
if (isset($complete)) 
{ echo $complete; }
else if (isset($errorstring))
	{
		echo $errorstring;
	} else {
echo "Items marked with an asterisk * are required";
}
?>
</h3>
<form action="safer-register-page.php" method="post" onsubmit="return checked();"
name="regform" id="regform">
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="First Name" maxlength="30" required
	   value=
		"<?php if (isset($_POST['first_name'])) 
		echo htmlspecialchars($_POST['first_name'], ENT_QUOTES); ?>" >
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
		"<?php if (isset($_POST['last_name'])) 
		echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">E-mail*:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email" 
	  placeholder="E-mail" maxlength="60" required
	   value=
		"<?php if (isset($_POST['email'])) 
		echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="password1" class="col-sm-4 col-form-label text-right">Password*:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password1" name="password1" 
	  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
	  title="One number, one upper, one lower, one special, with 8 to 12 characters"
	  placeholder="Password" minlength="8" maxlength="12" required
	  value=
		"<?php if (isset($_POST['password1'])) 
		echo htmlspecialchars($_POST['password1'], ENT_QUOTES); ?>" >
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
	   value=
		"<?php if (isset($_POST['password2'])) 
		echo htmlspecialchars($_POST['password2'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="float-left g-recaptcha" style="margin-left: 60px;" data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>
<div class="form-group row">
	<label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8 text-center">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
    </div>
	</div>
	</form>
</div>
<!-- Right-side Column Content Section -->
<aside class="col-sm-4">
<?php	include('includes/menu.php'); ?>
</aside>
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
