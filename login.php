<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connect
$servername = "localhost";
$username = "root";
$password = "";
$database = "hey";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User input
$email = trim($_POST['email'] ?? '');
$passwordInput = trim($_POST['password'] ?? '');

// DB theke password read
$sql = "SELECT id, first_name, last_name, password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Main condition
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    $storedHash = $row['password'];
    
    // Optional fix for old hash versions
    if (strpos($storedHash, '$2y$') === 0) {
        $storedHash = str_replace('$2y$', '$2a$', $storedHash);
    }

    if (password_verify($passwordInput, $storedHash)) {
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];        

        header("Location: index.php");
        exit();
    } else {
        echo "❌ Password hash mismatch!";
        exit();
    }

} else {
    echo "❌ Email not found!";
    exit();
}
