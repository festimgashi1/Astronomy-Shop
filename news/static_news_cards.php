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
        .news-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .news-card {
            background-color: #1e2d3b;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }
        .news-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .news-card-content {
            padding: 15px;
        }
        .news-card h2 {
            color: #ffd700;
            font-size: 18px;
            margin: 0 0 10px;
        }
        .news-card p {
            color: #ccc;
            font-size: 14px;
        }
        .news-card .category {
            display: inline-block;
            background-color: #ccc;
            color: #000;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-top: 10px;
        }
        .news-card a {
            display: inline-block;
            background-color: #1c2e52;
            color: #fff;
            padding: 6px 12px;
            margin-top: 10px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
        }
        .news-card a:hover {
            background-color: #2d4e7b;
        }
    </style>
</head>
<body style="background-color: #0c1725; font-family: 'Orbitron', sans-serif; color: white;">
    <h1 style="text-align: center; color: #4197ff; padding: 30px; font-size: 36px;">Latest Space News</h1>
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
