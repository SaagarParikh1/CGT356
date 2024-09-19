<?php
session_start();
require_once 'includes/OpenDbConn.php';  // Ensure this file sets up the connection properly

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_login'])) {
        // Redirect to login page if not logged in
        $_SESSION['error_message'] = "You must log in to access this page.";
        header("Location: login.php");
        exit;
    }

    $login = $_SESSION['user_login'];  // Use the logged in user's session login

    // Sanitize and assign input data
    $shippingID = sanitizeInput($_POST['shippingID']);
    $name = sanitizeInput($_POST['name']);
    $address = sanitizeInput($_POST['address']);
    $city = sanitizeInput($_POST['city']);
    $state = sanitizeInput($_POST['state']);
    $zip = sanitizeInput($_POST['zip']);

    // Prepare SQL statement to insert shipping data using $mysqli
    $sql = "INSERT INTO P2Shipping (ShippingID, Login, Name, Address, City, State, Zip) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $mysqli->prepare($sql)) {  // Check for successful preparation
        $stmt->bind_param("sssssss", $shippingID, $login, $name, $address, $city, $state, $zip);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Shipping address added successfully.";
            $stmt->close();
            header("Location: insertShipping.php"); // Redirect back to shipping page
            exit;
        } else {
            $_SESSION['error_message'] = "Failed to add shipping address: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Failed to prepare the database query.";
    }
}

include("includes/CloseDbConn.php");  // Ensure to close the database connection
?>
