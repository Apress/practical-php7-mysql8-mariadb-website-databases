<?php
// Create a connection to the msgboarddb database and to MySQL
// Set the encoding to utf-8
// Set the database access details as constants
DEFINE ('DB_USER', 'brunel');
DEFINE ('DB_PASSWORD', 'tra1lblaz3r');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'msgboarddb');
// Make the connection:
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Set the encoding...optional but recommended
mysqli_set_charset($dbcon, 'utf8');