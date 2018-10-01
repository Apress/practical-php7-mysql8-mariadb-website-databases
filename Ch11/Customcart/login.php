<!doctype html>
<html lang="en">
<head>
<title>Login page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="transparent.css">
<style type="text/css">
#content h2 { width:60px; margin-left:-40px; }
p.error { color:red; font-size:105%; font-weight:bold; text-align:center;}
form { 	margin-left:130px; }
.submit { margin-left:215px; }
.cntr { text-align:center; margin-left:20px; }
</style>
</head>
<body>
<div id="container">
<header>
<?php include('includes/header_login.inc'); ?>
</header>
<div id="content"><!--Start of the login page content-->
<div id="rightcol">
	<nav>
	<?php include('includes/menu.inc'); ?>
	</nav>
</div>
<?php
// Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">A problem occurred:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register-page.php">Register</a></p>' ;
}
?>
<!-- Display the login form fields -->
<h2>Login</h2>
<form id="login" action="process_login.php" method="post">
<p><label class="label" for="email">E-mail:</label>
<input id="email" type="text" name="email" size="12"
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" 
required> </p>
<!--<br>-->
<p><label class="label" for="passcode">Password:</label>
<input id="passcode" type="password" name="passcode" size="12" minlength="8" maxlength="12"
value="<?php if (isset($_POST['passcode'])) echo $_POST['passcode']; ?>" 
required>
<span>&nbsp;Between 8 and 12 characters.</span></p>
<!--<p>&nbsp;</p>--><p><input id="submit_login" type="submit" name="submit_login" value="Login"></p>
</form>
<footer>
<?php
include ( 'includes/footer.inc' ) ; 
?>
</footer>
</div>
</body>
</html>