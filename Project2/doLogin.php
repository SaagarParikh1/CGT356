<?php
session_start();
require_once 'includes/OpenDbConn.php'; // Ensure the database connection file is included.

function sanitizeInput($data) {
    return trim(stripslashes(htmlspecialchars($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = sanitizeInput($_POST['action']);

    if ($action == 'Login') {
        $username = sanitizeInput($_POST['username']);
        $password = sanitizeInput($_POST['password']);
    
        if (empty($username) || empty($password)) {
            $_SESSION['error_message'] = "Username and password cannot be empty.";
            header("Location: login.php");
            exit();
        }
    
        $sql = "SELECT Login, Passwd FROM P2User WHERE Login = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($fetched_username, $hashed_password);
                $stmt->fetch();
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_login'] = $fetched_username;
                    $_SESSION['message'] = "Logged in successfully.";
                    header("Location: login.php");
                    exit;
                } else {
                    $_SESSION['error_message'] = "Invalid password.";
                }
            } else {
                $_SESSION['error_message'] = "No account found with that username.";
            }
            $stmt->close();
        } else {
            $_SESSION['error_message'] = "Error preparing login statement: " . $mysqli->error;
        }
    
        // Redirect back to login page with error message
        header("Location: login.php");
        exit;
    } elseif ($action == 'Register') {
        $new_username = sanitizeInput($_POST['new_username']);
        $first_name = sanitizeInput($_POST['first_name']);
        $last_name = sanitizeInput($_POST['last_name']);
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $email = sanitizeInput($_POST['email']);
        $newsletter = isset($_POST['newsletter']) ? 'Yes' : 'No';

        $sql = "SELECT Login FROM P2User WHERE Login = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $new_username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                $stmt->close();

                $sql = "INSERT INTO P2User (Login, FirstName, LastName, Passwd, Email, NewsLetter) VALUES (?, ?, ?, ?, ?, ?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("ssssss", $new_username, $first_name, $last_name, $new_password, $email, $newsletter);
                    if ($stmt->execute()) {
                        $_SESSION['user_login'] = $new_username;
                        $_SESSION['message'] = "User registered successfully.";
                        header("Location: login.php"); // Redirect to login page
                        exit;
                    } else {
                        $_SESSION['error_message'] = "Error during registration: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $_SESSION['error_message'] = "Error preparing registration statement: " . $mysqli->error;
                }
            } else {
                $_SESSION['error_message'] = "Username already taken.";
            }
        } else {
            $_SESSION['error_message'] = "Error preparing check username statement: " . $mysqli->error;
        }

        // Redirect back to login page with error message
        header("Location: login.php");
        exit;
    }
}

$mysqli->close();
?>
