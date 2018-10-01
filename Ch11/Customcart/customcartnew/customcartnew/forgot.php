<?php
$menu = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot Password</title>
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
// This code is a query for forgot password
// Confirm that form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require("process_forgot.php");
}
?>
<form  action="forgot.php" method="post">
<div class="form-group row">
    <label class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
<h2 style="margin-top: 10px;">Forgot Your Password?</h2>
<h6>When you apply, you will receive your new password in an email. Read that 
email as soon as possible. Don't delay! For 
maximum security, immediately login with your new password. Then change the 
password as quickly as possible.</h6>  
</div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">Your email address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email" name="email" 
	  placeholder="Email" maxlength="30" required
	  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="secret" class="col-sm-4 col-form-label text-right">Secret Answer:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="secret" name="secret" 
	  placeholder="Secret Question Answer" maxlength="30" required
	  value="<?php if (isset($_POST['secret'])) echo $_POST['secret']; ?>" >
	  If you don't know your secret answer, contact our service department.
    </div>
  </div>
 <div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="g-recaptcha" style="padding-left: 50px;" 
  data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
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