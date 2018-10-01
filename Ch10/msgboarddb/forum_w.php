<?php // Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) )
{ header("Location: login.php");
exit(); }
$menu = 10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Message Board Home Page</title>
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
<h4 class="text-center">Wise Quotes</h4>
<?php
// Connect to the database
require ( 'mysqli_connect.php' ) ;
// Make the query
$query = "SELECT user_name,post_date,subject,message FROM forum WHERE subject = 'Wise Quotes' ORDER BY 'post_date' ASC";
$result = mysqli_query( $dbcon, $query ) ;
if ( mysqli_num_rows( $result ) > 0 )
{
?>
<table class="table table-responsive table-striped col-sm-12" 
style="background: white;color:black; padding-left: 50px;">
<tr>
<th scope="col">Posted By</th>
<th scope="col">Forum</th>
<th scope="col">Quotation</th>
</tr>	
<?php
  while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ))
  {
	$user_name = htmlspecialchars($row['user_name'], ENT_QUOTES);
	$post_date = htmlspecialchars($row['post_date'], ENT_QUOTES);
	$message = htmlspecialchars($row['message'], ENT_QUOTES);
	echo '<tr>
	<td scope="row">' . $user_name . '</td>
	<td scope="row">' . $post_date . '</td>
	<td scope="row">' . $message . '</td>
	</tr>';  
  }
  echo '</table>' ;
}
else { echo 'There are currently no messages.' ; }
mysqli_close( $dbcon ) ;
?>
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