<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Latest Space News</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0c1725;
            color: white;
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            padding: 20px;
            color: #ffd700;
        }
        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .news-card {
            background-color: #1c2a3b;
            border: 1px solid #ffd700;
            border-radius: 8px;
            width: 300px;
            overflow: hidden;
            box-shadow: 0 0 10px #ffd70033;
        }
        .news-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .news-content {
            padding: 15px;
        }
        .news-content h2 {
            font-size: 18px;
            margin: 0 0 10px;
        }
        .news-content p {
            font-size: 14px;
        }
        .news-content a {
            color: #4da6ff;
            text-decoration: none;
        }
        .news-content a:hover {
            text-decoration: underline;
        }
        .news-date {
            font-size: 12px;
            color: #ccc;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h1>🚀 Latest Space News 🚀</h1>
<div class="news-container" id="newsContainer">
    <!-- News cards will be populated here -->
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_news.php')
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('newsContainer');
            container.innerHTML = "";

            data.forEach(news => {
                const card = document.createElement('div');
                card.className = 'news-card';

                card.innerHTML = `
                    <img src="${news.image}" alt="News Image">
                    <div class="news-content">
                        <h2>${news.title}</h2>
                        <p>${news.description.substring(0, 100)}...</p>
                        <a href="${news.sourceUrl}" target="_blank">Read more</a>
                        <div class="news-date">📅 ${news.date}</div>
                    </div>
                `;

                container.appendChild(card);
            });
        })
        .catch(err => {
            console.error("Error fetching news:", err);
            document.getElementById('newsContainer').innerHTML = "<p style='color:red;'>Failed to load news.</p>";
        });
});
</script>

</body>
</html>
