<?php
session_start();
include("includes/OpenDbConn.php");


function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billingID = sanitizeInput($_POST['BillingID']);
    $billName = sanitizeInput($_POST['billName']);
    $billAddress = sanitizeInput($_POST['billAddress']);
    $billCity = sanitizeInput($_POST['billCity']);
    $billState = sanitizeInput($_POST['billState']);
    $billZip = sanitizeInput($_POST['billZip']);

    $sql = "UPDATE P2Billing SET BillName = ?, BillAddress = ?, BillCity = ?, BillState = ?, BillZip = ? WHERE BillingID = ?";
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssss", $billName, $billAddress, $billCity, $billState, $billZip, $billingID);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Billing information updated successfully.";
        } else {
            $_SESSION['error_message'] = "No changes made or update failed.";
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Error preparing the statement: " . $mysqli->error;
    }
    $mysqli->close();
    header("Location: insertBilling.php");
    exit;
}
