<?php
// Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) )
{ header("Location: login.php");
exit(); }
$menu = 8;
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
//require("cap.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Post A Quote Page</title>
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
<div class="col-sm-10" style="padding-top: 20px;">
<h4 class="text-center">Post a Quotation</h4>
<!-- Display the form fields-->
<form id="post_form" action="process_post.php" method="post" accept-charset="utf-8"  >
<div class="form-group row">
      <label for="question" class="col-sm-4 col-form-label text-right">
	  Choose the Subject*:</label>
	  <div class="col-sm-8">
      <select id="subject" name="subject" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Comic Quotes">Comic Quotes</option>
	<option value="Wise Quotes">Wise Quotes</option>
	</select>
	</div>
	</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label text-right"></label>
<div class="col-sm-8 text-center">
    <label for="message">Please enter your quote below</label>
    <textarea class="form-control" id="message" name="message" rows="5" cols="50"
	value=
		"<?php if (isset($_POST['message'])) 
		echo htmlspecialchars($_POST['message'], ENT_QUOTES); ?>" >
	</textarea>
  </div>
 </div>	
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="g-recaptcha" style="margin-left: 90px;" data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>
<div class="form-group row">
	<label for="" class="col-sm-3 col-form-label"></label>
    <div class="col-sm-8 text-center" style="padding-left: 40px;">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Submit">
    </div>
	</div>
</form>
</div>
<!--posting an entry into the database table automaticlally sends a message to the forum moderator 
// Assign the subject-->
<!--<?php
$subject = "Posting added to message board";
$member = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "";
$body = "Posting added by " . $member;
mail("admin@myisp.co.uk", $subject, $body, "From:admin@myisp.co.uk\r\n");
?>-->
</div>
</div>
<footer class="jumbotron row mx-auto" id="includefooter"
style="padding-bottom:1px; margin: 0px; padding-top:8px; background-color:white;">
<div class="col-sm-12 text-center">
  <?php include('includes/footer.php'); ?>
  </div>
</footer>
</div>
</body>
</html>