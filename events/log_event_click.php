<?php
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['user_id'])) {
    http_response_code(401); // Unauthorized
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['title'])) {
    echo json_encode(['success' => false, 'message' => 'Missing title']);
    exit;
}

$userId = $_SESSION['user_id'];
$title = $data['title'];

$stmt = $con->prepare("INSERT INTO event_views (user_id, event_title) VALUES (?, ?)");
$stmt->bind_param("is", $userId, $title);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to log view']);
}
?>