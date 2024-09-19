<?php
session_start();
require_once 'includes/OpenDbConn.php';

// Function to fetch user data for the currently logged in user
function fetchUserData($mysqli, $username) {
    $sql = "SELECT Login, FirstName, LastName, Email, Passwd, NewsLetter FROM P2User WHERE Login = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Fetch user data for the currently logged in user
$userData = null;
if (isset($_SESSION['user_login'])) {
    $loggedInUsername = $_SESSION['user_login'];
    $userData = fetchUserData($mysqli, $loggedInUsername);
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login/Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Project 2 - LOGIN AND REGISTER</h1>
    <?php include("includes/menu.php"); ?>
<div id="login-register">
    <a href="logout.php">Logout</a>
</div>
<?php if ($userData): ?>
    <div id="user-list">
        <h2>User Profile</h2>
        <table>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Newsletter</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($userData['Login']) ?></td>
                    <td><?= htmlspecialchars($userData['FirstName']) ?></td>
                    <td><?= htmlspecialchars($userData['LastName']) ?></td>
                    <td><?= htmlspecialchars($userData['Email']) ?></td>
                    <td><?= htmlspecialchars($userData['Passwd']) ?></td>
                    <td><?= htmlspecialchars($userData['NewsLetter']) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<div id="content-box">
    
    <?php endif; ?>
    <div class="form-section">
        <h2>Register for a New Account</h2>
        <form action="doLogin.php" method="post">
            Username: <input type="text" name="new_username" required><br>
            First Name: <input type="text" name="first_name" required><br>
            Last Name: <input type="text" name="last_name" required><br>
            Password: <input type="password" name="new_password" required><br>
            Email: <input type="email" name="email" required><br>
            Newsletter: <input type="checkbox" name="newsletter" value="Yes"> Subscribe?<br>
            <input type="submit" name="action" value="Register">
        </form>
    </div>
    <div class="form-section">
        <h2>Login to Your Account</h2>
        <form action="doLogin.php" method="post">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" name="action" value="Login">
        </form>
    </div>
</div>
</body>
</html>
