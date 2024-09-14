<?php
session_start();

$host_name = 'localhost';
$db_name = 'shop';
$username = 'root';
$pass = '';

// Create a database connection
$database = mysqli_connect($host_name, $username, $pass, $db_name);

// Check if the connection was successful
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}


