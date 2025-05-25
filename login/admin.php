<?php
session_start();
require_once("../db/db.php");

// kontrollo nëse admini është kyçur
if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}

// merr të dhënat nga databaza
$email = $_SESSION['admin_email'];
$stmt = $con->prepare("SELECT fullname, email FROM admin WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#">Profile</a>
        <a href="#">News</a>
        <a href="#">Events</a>
        <a href="#">Products</a>
        <a href="#">Team</a>
        <a href="../logout.php" class="signout">Sign Out</a>
    </div>

    <div class="main">
        <h1>Welcome, <?php echo htmlspecialchars($admin['fullname']); ?>!</h1>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($admin['email']); ?></p>
    </div>
</body>
</html>
