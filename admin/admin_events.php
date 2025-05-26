<?php 
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['admin_email'])) {
    header("Location: ../login/login.php");
    exit();
}

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $date = trim($_POST["date"]);
    $region = trim($_POST["region"]);
    $time = trim($_POST["time"]);
    $image = trim($_POST["image"]);
    $latitude = trim($_POST["latitude"]);
    $longitude = trim($_POST["longitude"]);

    if ($title && $description && $date && $region && $time && $image) {
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
    <title>Admin Events</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f4f4f4;
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

        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            margin-top: 10px;
            color: green;
        }

        .error {
            color: red;
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

            <?php if ($successMessage): ?>
                <div class="message"><?php echo $successMessage; ?></div>
            <?php elseif ($errorMessage): ?>
                <div class="error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
