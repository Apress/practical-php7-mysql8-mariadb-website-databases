<?php
$menu = 2; 
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
     <script src="verify.js"></script>
     <script src='https://www.google.com/recaptcha/api.js'></script>   
</head>
<body>
<div class="container" style="margin-top:30px;border: 2px black solid;">
<!-- Header Section -->
<header class="jumbotron text-center row" id="includeheader"
style="margin-bottom:2px; background:linear-gradient(#0073e6, white); padding:10px;"
padding-right: 5px;"> 
  <?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12">
<h4 class="text-center">Registration</h4>
<h4 class="text-center">Items marked with an asterisk * are required</h4>
<h6 class="text-center"><strong>IMPORTANT:</strong> Do NOT use your real name for the username.</h6>
<h6 class="text-center"><strong>Terms and conditions:</strong> Your registration and all your messages
will be immediately deleted </h6>
<h6 class="text-center">if you post unpleasant, obscene or defamatory messages to the message board.</h6>

<?php
try {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                
 require('process-register-page.php');
} // End of the main Submit conditional.
?>
<div class="col-sm-10">
<form action="safer-register-page.php" method="post" onsubmit="return checked();"
name="regform" id="regform">
<div class="form-group row">
    <label for="user_name" class="col-sm-4 col-form-label text-right">User Name*:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="user_name" name="user_name" 
	  pattern="[a-zA-Z0-9][a-zA-Z\s]*" title="Alphabetic, numeric and space only max of 30 characters"
	  placeholder="User Name" maxlength="30" required
	   value=
		"<?php if (isset($_POST['user_name'])) 
		echo htmlspecialchars($_POST['user_name'], ENT_QUOTES); ?>" >
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
      <label for="question" class="col-sm-4 col-form-label text-right">
	  Secret Question*:</label>
	  <div class="col-sm-8">
      <select id="question" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Maiden">Mother's Maiden Name</option>
	<option value="Pet">Pet's Name</option>
	<option value="School">High School</option>
	<option value="Vacation">Favorite Vacation Spot</option>
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
	   value=
		"<?php if (isset($_POST['secret'])) 
		echo htmlspecialchars($_POST['secret'], ENT_QUOTES); ?>" >
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
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
    </div>
	</div>
	</form>
</div>
</div>
</div>
<!-- Footer Section -->
<footer class="jumbotron row mx-auto" id="includefooter"
style="padding-bottom:1px; margin: 0px; padding-top:8px; padding-left: 0px; background-color:white;">
<div class="col-sm-12 text-center">
  <?php include('includes/footer.php'); ?>
  </div>
</footer>
</div>
</div>
<?php
  }
catch(Exception $e) // We finally handle any problems here                
   {
// print "An Exception occurred. Message: " . $e->getMessage();
   	print "The system is busy please try later";
   	//  $date = date('m.d.y h:i:s');
   	//  $errormessage = $e->getMessage();
   	//  $eMessage = $date . " | Exception Error | " , $errormessage . |\n";
  	//   error_log($eMessage,3,ERROR_LOG);
// e-mail support person to alert there is a problem
   	//  error_log("Date/Time: $date – Exception Error, Check error log for
//details", 1, noone@helpme.com, "Subject: Exception Error \nFrom:
// Error Log <errorlog@helpme.com>" . "\r\n");
   }
   catch(Error $e)
   {
    	// print "An Error occurred. Message: " . $e->getMessage();
     	print "The system is busy please try later";
    	// $date = date('m.d.y h:i:s');
    	// $errormessage = $e->getMessage();
    	// $eMessage = $date . " | Error | " , $errormessage . |\n";
    	// error_log($eMessage,3,ERROR_LOG);
    	// e-mail support person to alert there is a problem
   	//  error_log("Date/Time: $date – Error, Check error log for
//details", 1, noone@helpme.com, "Subject: Error \nFrom: Error Log
// <errorlog@helpme.com>" . "\r\n");
   }
 ?>
</body>
</html>