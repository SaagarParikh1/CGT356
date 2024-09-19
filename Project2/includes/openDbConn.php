<?php
$host = "goss.tech.purdue.edu";
$username = "cgt356web1p";
$password = "Colleague1p4680";
$database = "cgt356web1p";

// Create a new mysqli connection object
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Optionally, set the charset to utf8mb4 for full Unicode support
$mysqli->set_charset("utf8mb4");
?>
