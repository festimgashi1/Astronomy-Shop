<?php
session_start();
include '../db/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../login/login.php");
    exit;
}

$userId = $_SESSION['user_id'];

$query = "SELECT full_name, email, phone FROM users WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(145deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
        }

        .main-header {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px 0;
            border-bottom: 1px solid #fff;
        }

        .main-header .container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            padding: 0;
            margin: 0;
        }

        .main-nav ul li a {
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .main-nav ul li a:hover {
            background: #fff;
            color: #0f2027;
        }

        .logo img {
            width: 200px;
        }

        .profile-box {
            max-width: 500px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px 40px;
            border-radius: 15px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        }

        .profile-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            padding-bottom: 10px;
        }

        .profile-box p {
            font-size: 16px;
            color: #f1f1f1;
            margin-bottom: 15px;
        }

        .logout-btn {
            text-align: center;
            margin-top: 30px;
        }

        .logout-btn button {
            background-color: #ff4e50;
            border: none;
            padding: 12px 25px;
            font-size: 15px;
            border-radius: 25px;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn button:hover {
            background-color: #c0392b;
        }

        @media screen and (max-width: 600px) {
            .main-header .container {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .main-nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }

            .logo img {
                width: 160px;
            }
        }
    </style>
</head>
<body>
<header class="main-header">
    <div class="container">
        <div class="logo"><img src="logo.png" alt="Logo"></div>
        <nav class="main-nav">
            <ul>
                <li><a href='/WEB2_2025_GR12/Home/index.php'>Home</a></li>
                <li><a href="/WEB2_2025_GR12/events/events.php">Events</a></li>
                <li><a href="/WEB2_2025_GR12/news/news.php">News</a></li>
                <li><a href="/WEB2_2025_GR12/Shop/shop.php">Shop</a></li>
                <li><a href="/WEB2_2025_GR12/aboutus/aboutus.php">About Us</a></li>
                <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                <li>
                    <a href="<?php echo isset($_SESSION['user_id']) ? '/WEB2_2025_GR12/login/customer_login.php' : '/WEB2_2025_GR12/login/login.php'; ?>">
                        <img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<?php
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    echo "<div class='profile-box'>
            <h2>Your Profile</h2>
            <p><strong>👤 Full Name:</strong> {$user['full_name']}</p>
            <p><strong>📧 Email:</strong> {$user['email']}</p>
            <p><strong>📱 Phone:</strong> {$user['phone']}</p>
            <form method='post' class='logout-btn'>
                <button type='submit' name='logout'>Sign Out</button>
            </form>
          </div>";
} else {
    echo "<div class='profile-box'><p>User not found.</p></div>";
}
$stmt->close();
?>
</body>
</html>
