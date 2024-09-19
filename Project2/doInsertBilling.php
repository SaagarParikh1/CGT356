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
    $billingID = sanitizeInput($_POST['billingID']);
    $billName = sanitizeInput($_POST['billName']);
    $billAddress = sanitizeInput($_POST['billAddress']);
    $billCity = sanitizeInput($_POST['billCity']);
    $billState = sanitizeInput($_POST['billState']);
    $billZip = sanitizeInput($_POST['billZip']);
    $cardType = sanitizeInput($_POST['cardType']);
    $cardNumber = sanitizeInput($_POST['cardNumber']);
    $expDate = sanitizeInput($_POST['expDate']);  // Assuming this is the name attribute of your expiration date field

    // Prepare SQL statement to insert billing data using $mysqli
    $sql = "INSERT INTO P2Billing (BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $mysqli->prepare($sql)) {  // Check for successful preparation
        $stmt->bind_param("ssssssssss", $billingID, $login, $billName, $billAddress, $billCity, $billState, $billZip, $cardType, $cardNumber, $expDate);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Billing information added successfully.";
            $stmt->close();
            header("Location: insertBilling.php"); // Redirect back to billing page
            exit;
        } else {
            $_SESSION['error_message'] = "Failed to add billing information: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Failed to prepare the database query.";
    }
}

include("includes/CloseDbConn.php");  // Ensure to close the database connection
?>
