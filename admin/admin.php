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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Orbitron', sans-serif;
            display: flex;
            background: linear-gradient(145deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            height: 100vh;
            color: white;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.3);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .signout {
            background-color: #e74c3c;
        }

        .main {
            flex-grow: 1;
            padding: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-box {
            max-width: 500px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        .profile-box h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .profile-box p {
            font-size: 16px;
            margin-bottom: 15px;
            color: #e0e0e0;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main {
                padding: 30px;
            }
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
        <div class="profile-box">
            <h1>Welcome, <?php echo htmlspecialchars($admin['fullname']); ?> 👨‍💼</h1>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($admin['email']); ?></p>
        </div>
    </div>
</body>
</html>
