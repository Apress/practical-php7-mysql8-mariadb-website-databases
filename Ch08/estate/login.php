<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login page</title>
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
<div class="row">
  <!-- Validate Input -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                
 require('process-login.php');
} // End of the main Submit conditional.
?>
<div class="col-sm-10">
<h2 class="h2 text-center">Login</h2>
<form action="login.php" method="post" name="loginform" id="loginform">
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">E-mail Address:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" name="email" 
	  placeholder="E-mail" maxlength="60" required
	   value=
		"<?php if (isset($_POST['email'])) 
		echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="password" class="col-sm-4 col-form-label text-right">Password:</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="password" name="password" 
	  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" 
	  title="One number, one upper, one lower, one special, with 8 to 12 characters"
	  placeholder="Password" minlength="8" maxlength="12" required
	  value=
		"<?php if (isset($_POST['password'])) 
		echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" >
	  <span id='message'>Between 8 and 12 characters.</span>
    </div>
  </div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>
    <div class="col-sm-6">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Login">
    </div>
	</div>
	</form>
</div>

<!-- Right-side Column Content Section -->
<?php
 if(!isset($errorstring)) {
	echo '<aside class="col-sm-2">';
	include('includes/menu.php');
    echo '</aside>'; }
?>
</div></div></div></div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php  include('includes/footer.php'); ?>
</footer>
</div>
</div>
</div>
</body>
</html>
