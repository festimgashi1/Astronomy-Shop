<?php
require_once("../db/db.php");
$title = $_GET['title'] ?? '';

if ($title) {
    $stmt = $con->prepare("SELECT comment, created_at FROM event_comments WHERE event_title = ? ORDER BY created_at DESC");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = [];

    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    echo json_encode(['success' => true, 'comments' => $comments]);
} else {
    echo json_encode(['success' => false, 'message' => 'No event title provided']);
}
?>
