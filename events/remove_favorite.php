<?php
session_start();
header('Content-Type: application/json');
require_once("../db/db.php");

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'] ?? '';

if (!$title) {
    echo json_encode(['success' => false, 'message' => 'Missing event title']);
    exit;
}

$userId = $_SESSION['user_id'];

$stmt = $con->prepare("DELETE FROM user_favorites WHERE user_id = ? AND event_title = ?");
$stmt->bind_param("is", $userId, $title);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to remove']);
}
