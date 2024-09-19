<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
    exit();
}

include("includes/OpenDbConn.php");

// Fetch billing data to display
function getBillingData($mysqli) {
    $sql = "SELECT BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM P2Billing";
    $result = $mysqli->query($sql);
    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

$billingData = getBillingData($mysqli); // Fetch billing data

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Billing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="login-register">
        <a href="logout.php">Logout</a>
    </div>
    <h1>Project 2 - BILLING</h1>
    <?php include("includes/menu.php"); ?>

    <?php if (!empty($billingData)): ?>
    <div id="billing-data">
        <h2>Current Billing Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Billing ID</th>
                    <th>Login</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Card Type</th>
                    <th>Card Number</th>
                    <th>Exp Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billingData as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['BillingID']) ?></td>
                    <td><?= htmlspecialchars($row['Login']) ?></td>
                    <td><?= htmlspecialchars($row['BillName']) ?></td>
                    <td><?= htmlspecialchars($row['BillAddress']) ?></td>
                    <td><?= htmlspecialchars($row['BillCity']) ?></td>
                    <td><?= htmlspecialchars($row['BillState']) ?></td>
                    <td><?= htmlspecialchars($row['BillZip']) ?></td>
                    <td><?= htmlspecialchars($row['CardType']) ?></td>
                    <td><?= htmlspecialchars($row['CardNumber']) ?></td>
                    <td><?= htmlspecialchars($row['ExpDate']) ?></td>
                    <td>
                        <a href="updateBilling.php?id=<?= urlencode($row['BillingID']) ?>">Update</a>
                        |
                        <a href="doDeleteBilling.php?id=<?= urlencode($row['BillingID']) ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

    <div id="content-box">
        <form action="doInsertBilling.php" method="post">
            <label for="billingID">Billing ID (e.g., Work MasterCard):</label>
            <input type="text" id="billingID" name="billingID" maxlength="30" required><br><br>

            <label for="login">Login:</label>
            <input type="text" id="login" name="login" value="<?php echo $_SESSION['user_login']; ?>" disabled><br><br>

            <label for="billName">Bill Name:</label>
            <input type="text" id="billName" name="billName" maxlength="50" required><br><br>

            <label for="billAddress">Bill Address:</label>
            <input type="text" id="billAddress" name="billAddress" maxlength="30" required><br><br>

            <label for="billCity">Bill City:</label>
            <input type="text" id="billCity" name="billCity" maxlength="30" required><br><br>

            <label for="billState">Bill State:</label>
            <input type="text" id="billState" name="billState" maxlength="20" required><br><br>

            <label for="billZip">Bill Zip:</label>
            <input type="text" id="billZip" name="billZip" maxlength="5" required><br><br>

            <label for="cardType">Card Type:</label>
            <select id="cardType" name="cardType">
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="Discover">Discover</option>
                <option value="American Express">American Express</option>
            </select><br><br>

            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required><br><br>

            <label class="exp-date-label" for="expDate">Exp. Date:</label>
            <div class="exp-date">
                <select id="expMonth" name="expMonth" required>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?></option>
                    <?php endfor; ?>
                </select>
                /
                <select id="expYear" name="expYear" required>
                    <?php for ($i = date('Y'); $i <= date('Y') + 15; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
