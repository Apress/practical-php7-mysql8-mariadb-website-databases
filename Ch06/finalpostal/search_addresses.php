<?php                                                                                     
//session_start();
//if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
//{ header("Location: login.php");
//exit();
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Address Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
   <script src="verify.js"></script> 
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row col-sm-14"
style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
  <?php include('includes/login-header.php'); ?>
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('includes/nav.php'); ?> 
      </ul>
  </nav>
  <!-- Validate Input -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                //#1
 require('process-view_found_addresses.php');
} // End of the main Submit conditional.
?>
<div class="col-sm-8">
<div class="h2 text-center">
<h5>Search for an Address or Phone Number</h5>
<h5 style="color: red;">Both Names are required items</h5>
</div>
<form action="view_found_addresses.php" method="post" name="searchform" id="searchform">
  <div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  placeholder="First Name" maxlength="30" required
	   value=
		"<?php if (isset($_POST['first_name'])) 
		echo htmlspecialchars($_POST['first_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  placeholder="Last Name" maxlength="40" required
	  value=
		"<?php if (isset($_POST['last_name'])) 
		echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="l" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Search">
    </div>
	</div>
	</form>
</div>
<!-- Right-side Column Content Section -->
<?php
 if(!isset($errorstring)) {
	echo '<aside class="col-sm-2">';
	include('includes/info-col.php');
	echo '</aside>';
	echo '</div>';
	echo '<footer class="jumbotron text-center row col-sm-14"
		style="padding-bottom:1px; padding-top:8px;">';
 }
 else
 {
	echo '<footer class="jumbotron text-center col-sm-12"
	style="padding-bottom:1px; padding-top:8px;">';
 }
  include('includes/footer.php'); 
 ?>
</footer>
</div>
</body>
</html>
