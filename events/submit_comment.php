<?php
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$userId = $_SESSION['user_id'];
$eventTitle = $data['title'] ?? '';
$comment = $data['comment'] ?? '';

if ($eventTitle && $comment) {
    $stmt = $con->prepare("INSERT INTO event_comments (user_id, event_title, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $eventTitle, $comment);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
