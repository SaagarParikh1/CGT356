<?php
session_start();
include("includes/OpenDbConn.php");


$billingID = $_GET['id'] ?? '';

if (!empty($billingID)) {
    $stmt = $mysqli->prepare("DELETE FROM P2Billing WHERE BillingID = ?");
    $stmt->bind_param("s", $billingID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Billing info deleted successfully.";
    } else {
        $_SESSION['error_message'] = "Failed to delete billing info.";
    }
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Invalid Billing ID.";
}

header("Location: insertBilling.php");
exit;
