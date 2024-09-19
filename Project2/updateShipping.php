<?php
session_start();
include("includes/OpenDbConn.php");  // Make sure this includes your database connection script

$shippingID = $_GET['id'] ?? '';

// Fetch the specific shipping information from the database
if (!empty($shippingID)) {
    $stmt = $mysqli->prepare("SELECT * FROM P2Shipping WHERE ShippingID = ?");
    $stmt->bind_param("s", $shippingID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {  // Check if the data exists
        $_SESSION['error_message'] = "No shipping data found.";
        header("Location: insertShipping.php");
        exit;
    }

    $item = $result->fetch_assoc();
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Invalid Shipping ID.";
    header("Location: insertShipping.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Shipping Information</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div id="content-box">
        <h1>Update Shipping Information</h1>
        <form action="doUpdateShipping.php" method="post">
            <input type="hidden" name="ShippingID" value="<?= htmlspecialchars($item['ShippingID']) ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($item['Name']) ?>" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($item['Address']) ?>" required><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?= htmlspecialchars($item['City']) ?>" required><br>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="<?= htmlspecialchars($item['State']) ?>" required><br>

            <label for="zip">Zip Code:</label>
            <input type="text" id="zip" name="zip" value="<?= htmlspecialchars($item['Zip']) ?>" required><br>

            <input type="submit" value="Update Shipping Info">
        </form>
    </div>
</body>
</html>
