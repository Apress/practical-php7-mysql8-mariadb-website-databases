<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
//require("cap.php");
}
$menu = 3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
  <script src='https://www.google.com/recaptcha/api.js'></script>   
  <link rel="stylesheet" type="text/css" href="msgboard.css">
</head>
<body>
<div class="container" style="margin-top:30px;border: 2px black solid;">
<!-- Header Section -->
<header class="jumbotron text-center row" id="includeheader"
style="margin-bottom:2px; background:linear-gradient(#0073e6, white); padding:10px;"> 
  <?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                              
 require('process-login.php');
} 
?>
<!-- Display the login form fields -->
<div class="col-sm-10">
<h3 class="h3 text-center">
<?php if(empty($errorstring)) { echo "Login"; }
else { echo $errorstring; }
?>
</h3>
<form action="login.php" method="post" name="loginform" id="loginform">
<div class="form-group row">
    <label for="user_name" class="col-sm-4 col-form-label text-right">User ID:</label>
    <div class="col-sm-6">
      <input type="user_name" class="form-control" id="user_name" name="user_name" 
	  placeholder="User ID" maxlength="30" size="30" required
	   value=
		"<?php if (isset($_POST['user_name'])) 
		echo htmlspecialchars($_POST['user_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="passcode" class="col-sm-4 col-form-label text-right">Password:</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="passcode" name="passcode" 
	  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
	  title="One number, one upper, one lower, one special, with 8 to 12 characters"
	  placeholder="Password" minlength="8" maxlength="12" required
	  value=
		"<?php if (isset($_POST['passcode'])) 
		echo htmlspecialchars($_POST['passcode'], ENT_QUOTES); ?>" >
	  <span id='message'>Between 8 and 12 characters.</span>
    </div>
  </div>
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8" style="padding-left: 80px;">
  <div class="float-left g-recaptcha" data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>  
<div class="form-group row">
	<label for="" class="col-sm-3 col-form-label"></label>
    <div class="col-sm-8 text-center">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Login">
    </div>
	</div>
	</form>
</div>
</div>
</div>
<footer class="jumbotron row mx-auto" id="includefooter"
style="padding-bottom:1px; margin: 0px; padding-left: 0px; padding-top:8px; background-color:white;">
<div class="col-sm-12 text-center">
  <?php include('includes/footer.php'); ?>
  </div>
</footer>
</div>
</div>
</body>
</html>