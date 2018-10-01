<?php 
// Function for loading the URL of pages
function load( $page = 'login.php' )
{
  // The code for setting the page URL
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
  // Trim the URL
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page ;
 //Redirect to the page and exit the script. 
  header( "Location: $url" ) ; 
  exit() ;
}
// Create a function to check user name and password 
function validate( $dbcon, $user_name = '', $passcode = '')
{
  // Initiate the array to hold the error messages 
  $errors = array() ; 
  // Has the user name been entered?
  if ( empty( $user_name ) ) 
  { $errors[] = 'You forgot to enter your user name' ; 
  } 
  else  { $user_name = mysqli_real_escape_string( $dbcon, trim( $user_name ) ) ; 
  }
  // Has the password been entered
  if ( empty( $passcode ) ) 
  { $errors[] = 'Enter your password.' ; 
  } 
  else { $passcode = mysqli_real_escape_string( $dbcon, trim( $passcode ) ) ; 
  }
  $hp=password_hash($p, PASSWORD_BCRYPT);
  // If everything is OK select the member_id and the user name from the members' table
  if ( empty( $errors ) ) 
  {
    $q = "SELECT member_id, user_name FROM members WHERE user_name='$user_name' AND passcode='$hp')" ;  
    $result = mysqli_query ( $dbcon, $q ) ;
    if ( mysqli_num_rows( $result ) == 1 ) 
    {
      $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ;
      return array( true, $row ) ; 
    }
    // If the user name and password do not match the database record, create an error message
    else { $errors[] = 'The user name and password do not match our records.' ; 
    }
  }
  // Retrieve the error messages
  return array( false, $errors ) ; 
}