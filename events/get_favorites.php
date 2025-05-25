<?php
session_start();
header('Content-Type: application/json');
require_once("../db/db.php");

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $con->prepare("SELECT event_title FROM user_favorites WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$favorites = [];
while ($row = $result->fetch_assoc()) {
    $favorites[] = $row['event_title'];
}

echo json_encode(['success' => true, 'favorites' => $favorites]);
?>
