<?php
session_start();
include("includes/OpenDbConn.php");  // Ensure this file sets up the connection with $mysqli

// Check if the user is not logged in, then redirect to login page
if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
    exit();
}

// Function to fetch shipping data
function getShippingData($mysqli) {
    $sql = "SELECT ShippingID, Login, Name, Address, City, State, Zip FROM P2Shipping";
    $result = $mysqli->query($sql);
    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

$shippingData = getShippingData($mysqli); // Fetch shipping data

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shipping</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="login-register">
        <a href="logout.php">Logout</a> <!-- Link to a logout script -->
    </div>
    <h1>Project 2 - SHIPPING</h1>
    <?php include("includes/menu.php"); ?>

    <?php if (!empty($shippingData)): ?>
    <div id="shipping-data">
        <h2>Current Shipping Addresses</h2>
        <table>
            <tr>
                <th>ShippingID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($shippingData as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['ShippingID']) ?></td>
                <td><?= htmlspecialchars($row['Name']) ?></td>
                <td><?= htmlspecialchars($row['Address']) ?></td>
                <td><?= htmlspecialchars($row['City']) ?></td>
                <td><?= htmlspecialchars($row['State']) ?></td>
                <td><?= htmlspecialchars($row['Zip']) ?></td>
                <td>
                    <a href="updateShipping.php?id=<?= urlencode($row['ShippingID']) ?>">Update</a> |
                    <a href="doDeleteShipping.php?id=<?= urlencode($row['ShippingID']) ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>

    <div id="content-box">
        <h2>Add New Shipping Address</h2>
        <form action="doInsertShipping.php" method="post">
            Shipping ID: <input type="text" id="shippingID" name="shippingID" maxlength="30" required><br>
            Name: <input type="text" id="name" name="name" maxlength="50" required><br>
            Address: <input type="text" id="address" name="address" maxlength="30" required><br>
            City: <input type="text" id="city" name="city" maxlength="30" required><br>
            State: <input type="text" id="state" name="state" maxlength="20" required><br>
            Zip: <input type="text" id="zip" name="zip" maxlength="5" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
