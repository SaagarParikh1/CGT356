<?php
session_start();
include("includes/OpenDbConn.php");  // Ensure this file has your database connection setup

// Sanitize and validate input before using it in your SQL
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $shippingID = sanitizeInput($_POST['ShippingID']);
    $name = sanitizeInput($_POST['name']);
    $address = sanitizeInput($_POST['address']);
    $city = sanitizeInput($_POST['city']);
    $state = sanitizeInput($_POST['state']);
    $zip = sanitizeInput($_POST['zip']);

    // Prepare an update statement
    $sql = "UPDATE P2Shipping SET Name = ?, Address = ?, City = ?, State = ?, Zip = ? WHERE ShippingID = ?";
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ssssss", $name, $address, $city, $state, $zip, $shippingID);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Shipping information updated successfully.";
        } else {
            $_SESSION['error_message'] = "No changes made or update failed.";
        }

        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Error preparing the statement: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    $_SESSION['error_message'] = "Invalid request.";
}

// Redirect back to the shipping page or an appropriate page
header("Location: insertShipping.php");
exit;
?>
