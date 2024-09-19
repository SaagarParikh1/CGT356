<?php
session_start();
include("includes/OpenDbConn.php");

$shippingID = $_GET['id'] ?? '';

if (!$shippingID) {
    header("Location: insertShipping.php");
    exit;
}

$stmt = $mysqli->prepare("DELETE FROM P2Shipping WHERE ShippingID = ?");
$stmt->bind_param("s", $shippingID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['message'] = "Shipping info deleted successfully.";
} else {
    $_SESSION['error_message'] = "Failed to delete shipping info.";
}

$stmt->close();
header("Location: insertShipping.php");
exit;
