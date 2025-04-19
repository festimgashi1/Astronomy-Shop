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
                    <li><a href="/Home/index.html">Home</a></li>
                    <li><a href="/events/events.html">Events</a></li>
                    <li><a href="/news/news.html">News</a></li>
                    <li><a href="/Shop/shop.html">Shop</a></li>
                    <li><a href="/aboutus/aboutus.html">About Us</a></li>
                    <li><a href="/game/game.html">Play</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        <h1>Place the Planets in Their Orbits</h1>
        <div class="game-area">
            <div id="planetSelection" class="planet-selection"></div>
            <div id="solarSystem" class="solar-system">
                <div class="sun"> <img alt="Sun" src="/game/planets/sun.png" style="height: 100px; width: 100px;"> </div>
            </div>
        </div>
        
        <div id="congratulations" class="congratulations hidden">
            Congratulations! You've placed all the planets correctly!
        </div>

        <div class="game-controls">
            <button id="reset-button">Reset Game</button>
        </div>
    </div>
    <script src="game.js"></script>
</body>
</html>