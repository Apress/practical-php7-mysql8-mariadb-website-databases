<?php 
// Create a connection to the migrate database and to MySQL
// Set the encoding to utf-8
// Set the database access details as constants
DEFINE ('DB_USER', 'smeeton');
DEFINE ('DB_PASSWORD', 'L1ghth0us3');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'estatedb');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8');