<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hey";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect input fields
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$mobile_raw = trim($_POST['mobile'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$address = trim($_POST['address'] ?? '');
$mobile = '+880' . $mobile_raw;

// Check for missing fields
$missing = [];
foreach (['first_name','last_name','mobile','email','password','confirm_password','address'] as $f) {
    if (empty($$f)) $missing[] = $f;
}
if ($missing) {
    echo "Missing fields: " . implode(', ', $missing);
    exit;
}

// Check password match
if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

// Check for duplicate email
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) {
    echo "❌ This email is already registered.";
    exit;
}
$check->close();

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user
$sql = "INSERT INTO users (first_name, last_name, mobile, email, password, address)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $first_name, $last_name, $mobile, $email, $hashedPassword, $address);

if ($stmt->execute()) {
    // Success: Redirect to login page
    header("Location: login.html");
    exit();
} else {
    echo "❌ Error: " . $stmt->error;
}



