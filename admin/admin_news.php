<?php
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}


$email = $_SESSION['admin_email'];
$stmt = $con->prepare("SELECT fullname, email FROM admin WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $image = $_POST['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $sourceUrl = $_POST['sourceUrl'];

    $stmt = $con->prepare("INSERT INTO space_news (date, image, title, description, category, sourceUrl) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $date, $image, $title, $description, $category, $sourceUrl);

    if ($stmt->execute()) {
        $message = "News inserted successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert News</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #0c1725;
            color: white;
        }
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            height: 100vh;
            color: white;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .signout {
            background-color: #e74c3c;
        }
        .main {
            flex-grow: 1;
            padding: 40px;
        }
        form input[type="text"], form input[type="date"], form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: none;
        }
        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .success {
            color: lightgreen;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="/WEB2_2025_GR12/admin/admin.php">Profile</a>
        <a href="/WEB2_2025_GR12/admin/admin_news.php">News</a>
        <a href="/WEB2_2025_GR12/admin/admin_events.php">Events</a>
        <a href="/WEB2_2025_GR12/admin/products.php">Products</a>
        <a href="/WEB2_2025_GR12/admin/admin_team.php">Team</a>
        <a href="../logout.php" class="signout">Sign Out</a>
    </div>

    <div class="main">
        <h1>Insert New Space News</h1>
        <?php if (isset($message)) echo "<p class='success'>{$message}</p>"; ?>
        <form method="POST" action="">
            <label>Date:</label><br>
            <input type="date" name="date" required><br>

            <label>Image URL:</label><br>
            <input type="text" name="image" required><br>

            <label>Title:</label><br>
            <input type="text" name="title" required><br>

            <label>Description:</label><br>
            <textarea name="description" rows="4" required></textarea><br>

            <label>Category:</label><br>
            <input type="text" name="category" required><br>

            <label>Source URL:</label><br>
            <input type="text" name="sourceUrl" required><br>

            <input type="submit" value="Insert News">
        </form>
    </div>
</body>
</html>
