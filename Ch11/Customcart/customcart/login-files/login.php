<!doctype html>
<html lang="en">
<head>
<title>Login page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="msgboard.css">
<style type="text/css">
h2 { color:navy; }
/*#tab-navigation ul { margin-left:140px; }*/
form { padding-left:260px; width:200px;}
.label { width:120px; float:left; text-align:right;}
form p { width:280px; }
p.submit {margin-left:125px; }
</style>
</head>
<body>
<br>
<div id='container'>
<header>
<?php include ( 'includes/header_login.php' ) ;?>
</header>
<?php
// Display any error messages if present.
if ( isset( $errors ) AND !empty( $errors ) )
{
 echo '<p id="err_msg">A problem occurred:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register-page.php">Register</a></p>' ;
}
?>
<!-- Display the login form fields -->
<h2>Login</h2>
<form action="process_login.php" method="post">
<p><label class="label" for="user_name">User Name:</label><input id="user_name" type="text" 
name="user_name" size="16" maxlength="16" value="<?php if (isset($_POST['user_name']))
echo $_POST['user_name']; ?>"></p>
<p><label class="label" for="passcode">Password:</label><input id="passcode" 
type="password" name="passcode" size="16" maxlength="16" value="<?php if
(isset($_POST['passcode'])) echo $_POST['passcode']; ?>" ></p>
<p class="submit"><input type="submit" value="Login" ></p>
</form>
<footer>
<?php include ( 'includes/footer.php' ) ; ?>
</footer>
</div>
</body>
</html>