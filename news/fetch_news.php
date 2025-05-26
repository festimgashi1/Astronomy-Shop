<?php
require_once("../db/db.php");

$sql = "SELECT * FROM space_news ORDER BY date DESC";
$result = mysqli_query($con, $sql);

$news = [];

while ($row = mysqli_fetch_assoc($result)) {
    $news[] = $row;
}

header('Content-Type: application/json');
echo json_encode($news);
?>
