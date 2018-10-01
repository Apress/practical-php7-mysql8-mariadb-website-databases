<?php
// Create a connection to the msgboarddb database and to MySQL
// Set the encoding to utf-8
// Set the database access details as constants
DEFINE ('DB_USER', 'horatio'); // or whatever userid you created
DEFINE ('DB_PASSWORD', 'Hmsv1ct0ry'); // or whatever password you created
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'simpledb');

// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8');