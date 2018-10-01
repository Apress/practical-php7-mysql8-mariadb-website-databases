<?php                                                                                     
session_start();
// Data from valid source?
if (!isset($_SESSION['user_id']))
{ header("Location: index.php");
exit();
} else {
if (($_SESSION['user_level'] != 1))
{ header("Location: index.php");
exit();
}}
$menu = 3;
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
// Confirm that form has been submitted
// Has the form has been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require("process_admin_artist.php");
}
?>
<form  action="admin_page.php" method="post">
<div class="form-group row">
    <label class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
<h2 style="margin-top: 10px;">Add an Artist</h2>
<h5>If the artist uses only one name (e.g., Picasso) enter it as the last name</h5> 
</div>
</div>
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">Artist's First Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  placeholder="Artist's First Name" maxlength="30"
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	   value=
		"<?php if (isset($_POST['first_name'])) 
		echo htmlspecialchars($_POST['first_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="middle_name" class="col-sm-4 col-form-label text-right">Artist's Middle Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="middle_name" name="middle_name" 
	  placeholder="Artist's Middle Name" maxlength="30"
	  pattern="[a-zA-Z][a-zA-Z\s\.]*" title="Alphabetic, period and space only max of 30 characters"
	   value=
		"<?php if (isset($_POST['middle_name'])) 
		echo htmlspecialchars($_POST['middle_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="last_name" class="col-sm-4 col-form-label text-right">Artist's Last Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  placeholder="Artist's Last Name" maxlength="30" required
	   pattern="[a-zA-Z][a-zA-Z\s\']*" title="Alphabetic, quote and space only max of 30 characters"
	    value=
		"<?php if (isset($_POST['last_name'])) 
		echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>" >
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