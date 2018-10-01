<?php 
// Create a connection to the shopperdb database and define the constantst
DEFINE ('DB_USER', 'colossus');
DEFINE ('DB_PASSWORD', 'Fstc0mput3r');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'paypaldb');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8');
?>