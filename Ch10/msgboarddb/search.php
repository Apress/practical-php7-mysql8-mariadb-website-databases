<?php
// Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) )
{ header("Location: login.php");
exit(); }
$menu = 6;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
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
<h3 class="text-center">Search for a word or phrase in the quotes</h3>
<form id="search" action="quotes_found.php" method="post">
<div class="form-group row">
    <label for="target" class="col-sm-4 col-form-label text-right">Enter a word or phrase:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="target" name="target" 
	  placeholder="Word or Phrase" maxlength="60" size="40" required
	   value=
		"<?php if (isset($_POST['target'])) 
		echo htmlspecialchars($_POST['target'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
	<label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8 text-center">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Search">
    </div>
	</div>
</form>
</div>
</div>
<footer class="jumbotron row mx-auto" id="includefooter"
style="padding-bottom:1px; margin: 0px; padding-top:8px; background-color:white;">
<div class="col-sm-12 text-center">
  <?php include('includes/footer.php'); ?>
  </div>
</footer>
</div>
</div>
</body>
</html>