<?php

// Start Session
session_start();

// $db_hostname = "localhost";
// $db_username = "root";
// $db_password = "";
// $db_name = "food-order";

// $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); // Database Connection
// $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); // Selecting Database

// Create constants for non Repeating Values

# SITEURL or HOME_URL Constant
define('SITE_URL_OR_HOME_URL', 'http://localhost/food-order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); // Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); // Selecting Database


function redirect($location){

    return header("Location: " . $location); // same as above
    // return $location; // same as above
    
}

?>