<?php
// Was the form submitted?
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
// Connect to the database .
  require ( 'mysqli_connect.php' ) ;
// Load the validation functions.
  require ( 'login_functions.php' ) ;
// Check the login data
  list ( $check, $data ) = validate ( $dbcon, $_POST[ 'user_name' ], $_POST[ 'passcode' ] ) ;
// If successful, set session data and display the forum.php page
  if ( $check )  
  {
// Access the session details
    session_start();
    $_SESSION[ 'member_id' ] = $data[ 'member_id' ] ;
    $_SESSION[ 'user_name' ] = $data[ 'user_name' ] ;
    load ( 'forum.php' ) ;
  }
// If it fails, set the error messages
  else { $errors = $data; } 
// Close the database connection.
  mysqli_close( $dbcon ) ; 
}
// If it unsuccessful continue to display the login page
include ( 'login.php' ) ;
?>