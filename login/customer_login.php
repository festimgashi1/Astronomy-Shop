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
    <style>
        .main-header {
    background: linear-gradient(135deg, #010103, #030e17);
    padding: 20px 0;
    border-bottom: 2px solid #fff;
    width: 100%;
    box-sizing: border-box;
    position: relative;
    z-index: 100;
}  
@media (max-width: 768px) {
    .main-header .container {
        flex-direction: column;
    }
.container-login {
        width: 95%;
    }
}
.form-container {
    padding: 1.5rem;
}
.main-nav ul {
    display: flex;
    gap: 25px;
    list-style: none;
    padding: 0;
    margin: 0;
}
.container-login {
    width: 100%;
    max-width: 400px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

.main-header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}  
.logo {
        margin-bottom: 1rem;
    }
    .logo img {
    width: 250px;
    height: auto;
}    
.main-nav ul {
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }
   
.main-nav ul li a {
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.main-nav ul li a:hover {
    background-color: #fff;
    color: #0e1a27;
}

body {
    font-family: 'Orbitron', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #0b0d17, #030e17);
    color: #fff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
        .profile-box {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
            color: #333;
        }
        .logout-btn {
            margin-top: 20px;
        }
        button {
            background: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
 <header class="main-header">
        <div class="container">
            <div class="logo"><img src="logo.png" alt="Logo"></div>
            <nav class="main-nav">
                <ul>
                <li><a href='/WEB2_2025_GR12/Home/index.php' >Home</a></li>
                    <li><a href="/WEB2_2025_GR12/events/events.php" >Events</a></li>
                    <li><a href="/WEB2_2025_GR12/news/news.php" >News</a></li>
                    <li><a href="/WEB2_2025_GR12/Shop/shop.php" >Shop</a></li>
                    <li><a href="/WEB2_2025_GR12/aboutus/aboutus.php" >About Us</a></li>
                    <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                    <li><a href="/WEB2_2025_GR12/login/login.php"><img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;"></a></li>
                </ul>
            </nav>
        </div>
    </header>
<?php
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    echo "<div class='profile-box'>
            <h2>User Profile</h2>
            <p><strong>Full Name:</strong> {$user['full_name']}</p>
            <p><strong>Email:</strong> {$user['email']}</p>
            <p><strong>Phone:</strong> {$user['phone']}</p>
            <form method='post' class='logout-btn'>
                <button type='submit' name='logout'>Sign Out</button>
            </form>
          </div>";
} else {
    echo "<p>User not found.</p>";
}
$stmt->close();
?>

</body>
</html>