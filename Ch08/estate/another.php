<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{
 header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Another Home Page</title>
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
<header>
  <?php include('includes/header_advert.php'); ?>
</header>
<div class="content mx-auto" id="contents" style="padding-top:10px">
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">

<div class="col-sm-12">
<h5 class="text-center">The house was successfully added!!</h5>
<h5 class="text-center">Add Another?</h5>
</div>
</div>
 <div class="row" style="padding-left: 95px;">
 <div class="col-sm-4"></div>
 <div class="col-sm-6">
<nav>
<?php include('includes/another-button.php'); ?>
</nav>
</div>
</div>
</div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php include ('includes/footer.php'); ?>
</footer>
</div>
</div>
</div>
</body>
</html>