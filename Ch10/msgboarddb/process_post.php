<?php 
// Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) )
{ header("Location: login.php");
exit(); }
//Connect to the database
require ( 'mysqli_connect.php' ) ;
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
// Check that the user has entered a subject and a message
$subject = filter_var( $_POST['subject'], FILTER_SANITIZE_STRING);
  if ( empty($subject ) ) { echo 'You forgot to select a subject.'; }
  
$comment = filter_var( $_POST['message'], FILTER_SANITIZE_STRING);
if ((!empty($comment)) && (strlen($comment) <= 480)) {
	// remove ability to create link in email
	$patterns = array("/http/", "/https/", "/\:/","/\/\//","/www./");
	$commenttrim = preg_replace($patterns," ", $comment);	
	}else{	// if comment not valid display error page
		echo "You forgot to enter a message";
}
// If successful insert the post into the database table
  if( !empty($commenttrim) && !empty($subject) )
  {
 //Make the insert query
 
$query = "INSERT INTO forum (post_id, user_name, subject, message, post_date) "; 
$query .= "VALUES( ' ', ?, ?, ?, NOW() )"; 
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
$user_name = filter_var( $_SESSION['user_name'], FILTER_SANITIZE_STRING);
mysqli_stmt_bind_param($q, 'sss', $user_name, $subject, $commenttrim);
// execute query
mysqli_stmt_execute($q);
if (mysqli_stmt_affected_rows($q) == 1) {	
  header ("Location: post_thanks.php");		
}
else
{
	echo "An Error has occured in loading your posting";
}
// Close the database connection
mysqli_close( $dbcon ) ; 
    }
 } 
?>