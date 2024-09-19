<?php
session_start();
include("includes/OpenDbConn.php");  // Make sure this includes your database connection setup


$billingID = $_GET['id'] ?? '';

if (!empty($billingID)) {
    $stmt = $mysqli->prepare("SELECT * FROM P2Billing WHERE BillingID = ?");
    $stmt->bind_param("s", $billingID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $_SESSION['error_message'] = "No billing data found.";
        header("Location: insertBilling.php");
        exit;
    }

    $item = $result->fetch_assoc();
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Invalid Billing ID.";
    header("Location: insertBilling.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Billing Information</title>
    <link rel="stylesheet" href="styles.css">  <!-- Ensure this path is correct for your CSS -->
</head>
<body>
    <div id="content-box">
        <h1>Update Billing Information</h1>
        <form action="doUpdateBilling.php" method="post">
            <input type="hidden" name="BillingID" value="<?= htmlspecialchars($item['BillingID']) ?>">

            <label for="billName">Bill Name:</label>
            <input type="text" id="billName" name="billName" value="<?= htmlspecialchars($item['BillName']) ?>" required><br>

            <label for="billAddress">Bill Address:</label>
            <input type="text" id="billAddress" name="billAddress" value="<?= htmlspecialchars($item['BillAddress']) ?>" required><br>

            <label for="billCity">Bill City:</label>
            <input type="text" id="billCity" name="billCity" value="<?= htmlspecialchars($item['BillCity']) ?>" required><br>

            <label for="billState">Bill State:</label>
            <input type="text" id="billState" name="billState" value="<?= htmlspecialchars($item['BillState']) ?>" required><br>

            <label for="billZip">Bill Zip:</label>
            <input type="text" id="billZip" name="billZip" value="<?= htmlspecialchars($item['BillZip']) ?>" required><br>

            <input type="submit" value="Update Billing Info">
        </form>
    </div>
</body>
</html>
