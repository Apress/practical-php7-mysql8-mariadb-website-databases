<?php                                                                                     
//session_start();
// Data from valid source?
//if (!isset($_SESSION['user_id']))
//{ header("Location: index.php");
//exit();
//} else {
//if (($_SESSION['user_level'] != 1))
//{ header("Location: index.php");
//exit();
//}}
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
<header class="jumbotron text-center row mx-auto"
style="width:90%; height:auto; background:#95b522; margin-bottom: 0px; padding:0px;"> 
<?php include('includes/header_add_painting1.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" style="background-color:transparent; border:10px white solid; color: white; width: 90%; ">
  <div class="row mx-auto" style="padding-left: 0px; width: 90%; height: auto;">
<!-- Center Column Content Section -->
  <div class="col-sm-10 text-center" style="padding:0px; margin-top: 5px;">
	<!--Start of admin add paintings content-->
<?php
// This code is a query that INSERTs a paintings in the art table
// Confirm that form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require('process_add_painting.php'); }
?>
<h2>Add a Painting</h2>
<form  action="admin_add_painting1.php" method="post">
<div class="form-group row">
    <label for="thumb" class="col-sm-4 col-form-label">Thumbnail:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="thumb" name="thumb" 
	  placeholder="Thumbnail Address" maxlength="45" required
	  value="<?php if (isset($_POST['thumb'])) echo $_POST['thumb']; ?>" >
    </div>
  </div>
     <div class="form-group row">
      <label for="type" class="col-sm-4 col-form-label">Type:</label>
	  <div class="col-sm-6">
      <select id="type" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Still-life">Still Life</option>
	<option value="Nature">Nature</option>
	<option value="Abstract">Abstract</option>
	</select>
	</div>
	</div>
	  <div class="form-group row">
      <label for="medium" class="col-sm-4 col-form-label">Medium:</label>
	  <div class="col-sm-6">
      <select id="medium" class="form-control">
        <option selected value="">- Select -</option>
	<option value="Oil-painting">Oil Painting</option>
	<option value="Colored-etching">Colored Etching</option>
</select>
</div>
</div>
 <div class="form-group row">
      <label for="artist" class="col-sm-4 col-form-label">Artist:</label>
	  <div class="col-sm-6">
      <select id="srtist" class="form-control">
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
    <label for="mini_descr" class="col-sm-4 col-form-label">Brief Description:</label>
	<div class="col-sm-6">
    <textarea class="form-control" id="mini_descr" rows="3"></textarea>
  </div>
  </div>
<div class="form-group row">
    <label for="ppcode" class="col-sm-4 col-form-label">PayPal Code:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="ppcode" name="ppcode" 
	  placeholder="PayPal Code" maxlength="45"
	  value="<?php if (isset($_POST['ppcode'])) echo $_POST['ppcode']; ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-4 col-form-label">Price:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="price" name="price" 
	  placeholder="Price" maxlength="15" required
	  value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" >
	  Figures only, no &pound;s, $s or commas
    </div>
  </div>
<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Submit">
</form><!--End of the add a painting content-->
</div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2">
      <?php include('includes/menu1.php'); ?> 
	</aside>
	</div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="background:#68CE53; padding: 0px; margin: 0px;">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</div>
</body>
</html>