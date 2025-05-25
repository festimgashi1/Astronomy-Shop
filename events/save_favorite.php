<?php
session_start();
header('Content-Type: application/json');
require_once("../db/db.php"); // lidhja me DB

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['title'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
    exit;
}

$userId = $_SESSION['user_id'];
$title = $data['title'];
$date = $data['date'] ?? null;
$time = $data['time'] ?? null;
$region = $data['region'] ?? null;
$description = $data['description'] ?? null;
$imageUrl = $data['image_url'] ?? null;

$stmt = $con->prepare("INSERT INTO user_favorites (user_id, event_title, event_date, event_time, event_region, event_description, event_image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $userId, $title, $date, $time, $region, $description, $imageUrl);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}
?>