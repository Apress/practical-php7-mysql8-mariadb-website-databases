<?php 
// This creates a connection to the birdsdb database, it also sets the encoding to utf-8.
// Set the access details as constants:
DEFINE ('DB_USER', 'faraday');
DEFINE ('DB_PASSWORD', 'Dynam01831');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'birdsdb');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8');