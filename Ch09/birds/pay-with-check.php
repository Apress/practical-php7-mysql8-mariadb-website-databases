<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pay With Check Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
   <script src="verify.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>   
  <link rel="stylesheet" type="text/css" href="birds.css" media="screen">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style type="text/css">
label { margin-bottom:5px; }
label { width:570px; float:left; text-align:right; }
.sign { font-weight:bold;}
</style>
</head>
<body>
<div class="container" style="margin-top:30px;border: 3px black solid;">
<!-- Header Section -->
<header class="jumbotron text-center row" id="includeheader"
style="margin-bottom:2px; padding:20px;background-color:#CCFF99;"> 
  <?php include('includes/header.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('includes/nav.php'); ?> 
      </ul>
  </nav>
<!-- Center Column Content Section -->
<div class="col-sm-8">
<h4>Complete your Registration by Paying with a Check</h4>
<p>Thank you for registering online, now please fill out this 
form. Asterisks indicate essential fields. When you 
have filled out the form please print two copies by clicking the "Print This 
Form" button. Sign one copy and keep one for reference, sign a check payable 
to &quot;The Devon Bird 
Reserves&quot;. </p><p>Mail the signed form and check to: <br>The Treasurer, 
The Devon Bird Reserves, 
99 The Street, The Village, EX99 99ZZ </p>
<form>
<div id="fields"> 
<label class="label" for="title">Title<span class="large-red">*</span>
<input id="title" name="title" size="35" type="text" required></label>
<br><br><label class="label" for="firstname">First Name<span class="large-red">*</span>
<input id="firstname" name="firstname" size="35" type="text" required></label><br>
<br><label class="label" for="lastname">Last Name<span class="large-red">*</span>
<input id="lastname" name="lastname" size="35" type="text" required></label><br>
<br><label class="label" for="useremail">Your Email Address<span class="large-red">*</span>
<input id="useremail" name="useremail" type="email" size="35" required></label><br>
</div>
</form><br><br>
<p class="sign">
 Signed___________________________________________&nbsp;Date_________________</p>
 <br>
<div id="button">
	<input type="button" value="Click to automatically print the form in black and white"
	onclick="window.print()" title="Print this Form"><br>
</div>
<!--End of content.-->
</div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2">
      <?php include('includes/info-col-cards.php'); ?> 
	</aside>
</div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;background-color:#CCFF99;">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</div>
</body>
</html>
