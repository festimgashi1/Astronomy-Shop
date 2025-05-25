<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="game.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <header class="main-header">
        <div class="head">
            <div class="logo">
                <img src="./logo.png" alt="">
            </div>
            <div class="main-nav">
                <ul>
                     <li><a href='/WEB2_2025_GR12/Home/index.php' >Home</a></li>
                    <li><a href="/WEB2_2025_GR12/events/events.php" >Events</a></li>
                    <li><a href="/WEB2_2025_GR12/news/news.php" >News</a></li>
                    <li><a href="/WEB2_2025_GR12/Shop/shop.php" >Shop</a></li>
                    <li><a href="/WEB2_2025_GR12/aboutus/aboutus.php" >About Us</a></li>
                    <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                    <li>
    <a href="<?php echo isset($_SESSION['user_id']) ? '/WEB2_2025_GR12/login/customer_login.php' : '/WEB2_2025_GR12/login/login.php'; ?>">
        <img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;">
    </a>
</li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        <h1>Place the Planets in Their Orbits</h1>
        <div class="game-area">
            <div id="planetSelection" class="planet-selection"></div>
            <div id="solarSystem" class="solar-system">
                <div class="sun"> <img alt="Sun" src="/WEB2_2025_GR12/game/planets/sun.png" style="height: 100px; width: 100px;"> </div>
            </div>
        </div>
        
        <div id="congratulations" class="congratulations hidden">
            Congratulations! You've placed all the planets correctly!
        </div>

        <div class="game-controls">
            <button id="reset-button">Reset Game</button>
        </div>
    </div>
    <script src="game.js"></script>'
    
    <div id="timer" class="timer">Time: <span id="time">0.00</span> seconds</div>

    
    <?php
session_start();

if (isset($_POST['completionTime'])) {
    $time = floatval($_POST['completionTime']);
    if (!isset($_SESSION['best_time']) || $time < $_SESSION['best_time']) {
        $_SESSION['best_time'] = $time;
    }
}
?>

</body>
</html>
