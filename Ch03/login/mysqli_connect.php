<?php
// Create a connection to the logindb database. 
// Set the encoding and the access details as constants:
DEFINE ('DB_USER', 'william');
DEFINE ('DB_PASSWORD', 'Cat0nlap');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'logindb');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8'); 
