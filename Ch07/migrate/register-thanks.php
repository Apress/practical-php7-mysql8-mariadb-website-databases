 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Thanks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row"
style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;"> 
  <?php include('includes/thanks-header.php'); ?>
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('includes/nav.php'); ?> 
      </ul>
  </nav>
<!-- Center Column Content Section -->
<div class="col-sm-8">
<h3 class="h2 text-center" >Thank you for registering</h2>
<h6 class="text-center">To confirm your registration please verify membership class and pay the membership fee now.</h6>
<h6 class="text-center">You can use PayPal or a credit/debit card.</h6>
<p class="text-center" >When you have completed your registration you will be able to login 
to the member's only pages.</p>
<?php
define(ERROR_LOG,"errors.log");
try {
require ("mysqli_connect.php");
$query = "SELECT * FROM prices";		
$result = mysqli_query ($dbcon, $query); // Run the query.
if ($result) { // If it ran OK, display the records.
$row = mysqli_fetch_array($result, MYSQLI_NUM);
$yearsarray = array(
"Standard one year:", "Standard five year:", "Military one year:", "Under 21 one year:",
 "Other - Give what you can. Maybe:" );
echo '<h6 class="text-center text-danger">Membership classes:</h6>' ;
echo '<h6 class="text-center text-danger small"> ';
for ($j = 0, $i = 0; $j < 5; $j++, $i = $i + 2) {

	echo $yearsarray[$j] . " &pound; " . 
		htmlspecialchars($row[$i], ENT_QUOTES)  . 
		" GB, &dollar; " . 
		htmlspecialchars($row[$i + 1], ENT_QUOTES) . 
		" US";
	
	if ($j != 4) {
	if ($j % 2 == 0) { echo "</h6><h6 class='text-center text-danger small'>"; }
	else { echo " , "; }
	}
}
echo "</h6>";
}
?>
<p></p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="XXXXXXXXXXXXX">
<div class="form-group row">
    <label for="level" class="col-sm-4 col-form-label text-right">*Membership Class</label>
    <div class="col-sm-8">
		<select id="level" name="level" class="form-control" required>
		<option value="0" >-Select-</option>
<?php 
$class = htmlspecialchars($_GET['class'], ENT_QUOTES);
for ($j = 0, $i = 0; $j < 5; $j++, $i = $i + 2) {

	echo '<option value="' .
		 htmlspecialchars($row[$i], ENT_QUOTES) . '" ';	
	if ((isset($class)) && ( $class == $row[$i])) 
		{ 
	
			echo ' selected ';
	 } 
	echo ">" . $yearsarray[$j] . " " .
	    htmlspecialchars($row[$i], ENT_QUOTES) .
		" &pound; GB, " .
		 htmlspecialchars($row[$i + 1], ENT_QUOTES) .
		 "&dollar; US</option>";
}
?>
</select>
</div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8">
<!-- Replace the code below with code provided by PayPal once you obtain a Merchant ID -->
<input type="hidden" name="currency_code" value="GBP">
<input style="margin:10px 0 0 40px" type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal  The safer, easier way to pay online.">
<img alt="" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<!-- Replace code above with PayPal provided code -->
</div>
</div>
</form>
</div>
<!-- Right-side Column Content Section -->
	<aside class="col-sm-2">
      <?php include('includes/info-col-cards.php'); ?> 
	</aside>
  </div>
<!-- Footer Content Section -->
<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;">
  <?php include('includes/footer.php'); ?>
</footer>
<?php 
} // end try
catch(Exception $e) // We finally handle any problems here                
   {
	      // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   //  $date = date(‘m.d.y h:i:s’);
   //  $errormessage = $e->getMessage();
   //  $eMessage = $date . “ | Exception Error | “ , $errormessage . |\n”;
  //   error_log($eMessage,3,ERROR_LOG);
     // e-mail support person to alert there is a problem
   //  error_log(“Date/Time: $date – Exception Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Exception Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

   }
   catch(Error $e)
   {
           // print "An Error occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
    // $date = date(‘m.d.y h:i:s’);
    // $errormessage = $e->getMessage();
    // $eMessage = $date . “ | Error | “ , $errormessage . |\n”;
    // error_log($eMessage,3,ERROR_LOG);
    // // e-mail support person to alert there is a problem
   //  error_log(“Date/Time: $date – Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

   }
?>
</body>
</html>
