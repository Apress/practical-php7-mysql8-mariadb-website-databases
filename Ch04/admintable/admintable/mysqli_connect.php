<?php
// Create a connection to the logindb database. 
// Set the encoding and the access details as constants:
DEFINE ('DB_USER', 'webmaster');
DEFINE ('DB_PASSWORD', 'C0ffeep0t');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'admintable');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8'); 
