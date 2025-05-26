<?php 
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['admin_email'])) {
    header("Location: ../login/login.php");
    exit();
}

$successMessage = "";
$errorMessage = "";



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_id'])) {
    $deleteId = (int)$_POST['delete_id'];
    $stmt = $con->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $deleteId);
    $stmt->execute();
    $stmt->close();
   
    header("Location: admin_events.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['title'])) {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $date = trim($_POST["date"]);
    $region = trim($_POST["region"]);
    $time = trim($_POST["time"]);
    $image = trim($_POST["image"]);
    $latitude = trim($_POST["latitude"]);
    $longitude = trim($_POST["longitude"]);

    if ($title && $description && $date && $region && $time && $image && $latitude && $longitude) {
        $stmt = $con->prepare("INSERT INTO events (title, description, date, region, time, image, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssdd", $title, $description, $date, $region, $time, $image, $latitude, $longitude);
        if ($stmt->execute()) {
            $successMessage = "Event added successfully!";
        } else {
            $errorMessage = "Error inserting event.";
        }
        $stmt->close();
    } else {
        $errorMessage = "Please fill all fields.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <title>Admin Events</title>
<style>
    body {
        margin: 0;
        font-family: 'Orbitron', sans-serif;
        display: flex;
        background-color: #ecf0f1;
    }

    .sidebar {
        width: 220px;
        background-color: #2c3e50;
        padding: 20px;
        min-height: 100vh;
        color: white;
        position: sticky;
        top: 0;
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
        transition: background 0.3s;
    }

    .sidebar a:hover {
        background-color: #1abc9c;
    }

    .signout {
        background-color: #e74c3c;
    }

    .main {
        flex-grow: 1;
        padding: 40px;
    }

    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        width: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .form-container h2 {
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #bdc3c7;
        box-sizing: border-box;
        transition: border 0.2s ease-in-out;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    textarea:focus {
        outline: none;
        border-color: #3498db;
    }

    button {
        padding: 12px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    button:hover {
        background-color: #2980b9;
    }

    .message {
        margin-top: 15px;
        color: #27ae60;
    }

    .error {
        color: #e74c3c;
    }

    table {
        margin-top: 30px;
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    thead {
        background-color: #34495e;
        color: white;
    }

    th, td {
        padding: 14px 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .delete-button {
        background-color: #e74c3c;
        color: white;
        padding: 6px 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .delete-button:hover {
        background-color: #c0392b;
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
        <div class="form-container">
            <h2>Add Event</h2>
            <form method="POST">
                <div class="form-group">
                    <label>Title*</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Description*</label>
                    <textarea name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Date*</label>
                    <input type="date" name="date" required>
                </div>
                <div class="form-group">
                    <label>Region*</label>
                    <input type="text" name="region" placeholder="e.g. USA, Europe, Global" required>
                </div>
                <div class="form-group">
                    <label>Time*</label>
                    <input type="text" name="time" placeholder="e.g. 2:00 PM EST" required>
                </div>
                <div class="form-group">
                    <label>Image URL*</label>
                    <input type="text" name="image" required>
                </div>

                <div class="form-group">
                     <label>Latitude*</label>
                    <input type="text" name="latitude" placeholder="e.g. 40.7128" required>
                </div>

                <div class="form-group">
                    <label>Longitude*</label>
                    <input type="text" name="longitude" placeholder="e.g. -74.0060" required>
                </div>
                <button type="submit">Add Event</button>
            </form>

 <hr><h3 style="margin-top:40px;">All Events</h3>
<table style="margin-top: 20px; width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <thead>
        <tr style="background-color: #2c3e50; color: white;">
            <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Title</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Date</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Region</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Time</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $res = $con->query("SELECT * FROM events ORDER BY id DESC");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='padding: 8px; border: 1px solid #ccc;'>{$row['id']}</td>";
            echo "<td style='padding: 8px; border: 1px solid #ccc;'>".htmlspecialchars($row['title'])."</td>";
            echo "<td style='padding: 8px; border: 1px solid #ccc;'>{$row['date']}</td>";
            echo "<td style='padding: 8px; border: 1px solid #ccc;'>{$row['region']}</td>";
            echo "<td style='padding: 8px; border: 1px solid #ccc;'>{$row['time']}</td>";
            echo "<td style='padding: 8px; border: 1px solid #ccc;'>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='delete_id' value='{$row['id']}'>
                        <button type='submit' style='background-color:#e74c3c; color:white; border:none; padding:6px 12px; border-radius:5px; cursor:pointer;' onclick='return confirm(\"Are you sure?\")'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>



            <?php if ($successMessage): ?>
                <div class="message"><?php echo $successMessage; ?></div>
            <?php elseif ($errorMessage): ?>
                <div class="error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
