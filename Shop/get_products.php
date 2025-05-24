<?php
header("Content-Type: application/json");
include '../db/db.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($con, $sql);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = [
        "id" => (int)$row["id"],
        "name" => $row["name"],
        "price" => (float)$row["price"],
        "category" => $row["category"],
        "image" => $row["image"]
    ];
}

echo json_encode($products);
mysqli_close($con);
?>
