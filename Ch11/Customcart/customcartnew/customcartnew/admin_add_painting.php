<?php                                                                                     
session_start();
 //Data from valid source?
if (!isset($_SESSION['user_id']))
{ header("Location: index.php");
exit();
} else {
if (($_SESSION['user_level'] != 1))
{ header("Location: index.php");
exit();
}}
$menu = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add a Painting</title>
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
// This code is a query that INSERTs a paintings in the art table
// Confirm that form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require('process_add_painting.php'); }
?>
<form  action="admin_add_painting.php" method="post">
<div class="form-group row">
    <label class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
<h2 style="margin-top: 10px;">Add a Painting</h2>
</div>
</div>
<div class="form-group row">
    <label for="thumb" class="col-sm-4 col-form-label text-right">Thumbnail:</label>
    <div class="col-sm-8">
      <input type="url" class="form-control" id="thumb" name="thumb" 
	  placeholder="Thumbnail Address" maxlength="50" required
	  value="<?php if (isset($_POST['thumb'])) echo $_POST['thumb']; ?>" >
    </div>
  </div>
     <div class="form-group row">
      <label for="type" class="col-sm-4 col-form-label text-right">Type:</label>
	  <div class="col-sm-8">
      <select id="type" name="type" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Still-life">Still Life</option>
	<option value="Nature">Nature</option>
	<option value="Abstract">Abstract</option>
	</select>
	</div>
	</div>
	  <div class="form-group row">
      <label for="medium" class="col-sm-4 col-form-label text-right">Medium:</label>
	  <div class="col-sm-8">
      <select id="medium" name="medium" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Oil-painting">Oil Painting</option>
	<option value="Colored-etching">Colored Etching</option>
</select>
</div>
</div>
 <div class="form-group row">
      <label for="artist" class="col-sm-4 col-form-label text-right">Artist:</label>
	  <div class="col-sm-8">
      <select id="artist" name="artist" class="form-control">
        <option selected value="">- Select -</option>
		<?php
require ('mysqli_connect.php'); // Connect to the database
		$q = "SELECT first_name, middle_name, last_name FROM artists";		
		$result = mysqli_query ($dbcon, $q); // Run the query.
        while ($row = mysqli_fetch_assoc($result)) {
			$value = $row['first_name'] . "-" . $row['middle_name'] . "-" . $row['last_name'];
		    $display = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
            echo "<option value='$value'>$display</option>";
        }	
		?>
</select></div></div>
<div class="form-group row">
    <label for="mini_descr" class="col-sm-4 col-form-label text-right">Brief Description:</label>
	<div class="col-sm-8">
    <textarea class="form-control" id="mini_descr" name="mini_descr" rows="3" 
	maxlength="150" required></textarea>
  </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-4 col-form-label text-right">Price:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="price" name="price" 
	  placeholder="Price" maxlength="10" required
	  value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" >
	  Figures only, no &pound;s, $s or commas
    </div>
  </div>
  <div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-8">
  <div class="g-recaptcha" style="padding-left: 50px;" 
  data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
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
	<aside class="col-sm-4" 
	id="includemenu">
      <?php include('includes/menu.php'); ?> 
	</aside>
	</div>
</div>
</div>
</body>
</html>