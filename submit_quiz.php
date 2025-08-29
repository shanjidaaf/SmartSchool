<?php
session_start();

header('Content-Type: application/json');

// Enable full error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = isset($_POST['score']) ? intval($_POST['score']) : 0;
    $total = isset($_POST['total']) ? intval($_POST['total']) : 0;

    // Handle division by zero
    $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
    $quizTitle = "Science Quiz - Chapter 1";
    $userId = $_SESSION['user_id'];

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "hey");
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'DB Connection Error: ' . $conn->connect_error]);
        exit();
    }

    // Prepare and execute query
    $stmt = $conn->prepare("INSERT INTO quiz_results (user_id, quiz_title, score, total_questions, percentage) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        $conn->close();
        exit();
    }

    $stmt->bind_param("isiii", $userId, $quizTitle, $score, $total, $percentage);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Execution failed: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
