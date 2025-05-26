<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "universe";
$port = 3307;

$conn = new mysqli($host, $user, $pass, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, image, title, description, category, sourceUrl FROM space_news ORDER BY date DESC";
$result = $conn->query($sql);
$dynamicNews = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dynamicNews[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Latest Space News</title>
    <link rel="stylesheet" href="../news/news.css">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background-color: #0c1725;
            color: white;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #4197ff;
            padding: 30px;
            font-size: 36px;
        }
        .news-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>Latest Space News</h1>
    <div class="news-container">

        
        <?php foreach ($dynamicNews as $news): ?>
            <div class="news-card">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="news image">
                <div class="news-card-content">
                    <h2><?= htmlspecialchars($news['title']) ?></h2>
                    <p><?= htmlspecialchars($news['description']) ?></p>
                    <span class="category"><?= htmlspecialchars($news['category']) ?></span>
                    <br>
                    <a href="<?= htmlspecialchars($news['sourceUrl']) ?>" target="_blank">Read full story</a>
                </div>
            </div>
        <?php endforeach; ?>

        
        <?php include 'static_news_cards.php'; ?>

    </div>
</body>
</html>
