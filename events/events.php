<?php
session_start();
?>

<?php 
class Event {
    protected $title;
    protected $description;
    protected $region;
    protected $date;
    protected $time;

    public function __construct($title, $description, $region, $date, $time) {
        $this->title = $title;
        $this->description = $description;
        $this->region = $region;
        $this->date = $date;
        $this->time = $time;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function displayCard() {
        echo "<div class='event-card' data-region='{$this->region}' data-time='{$this->time}' data-description='{$this->description}'>";
        echo "<img src='images/space.jpg' alt='Event Image'>";
        echo "<h3>{$this->title}</h3>";
        echo "<div class='event-time'>{$this->date}</div>";
        echo "<div class='event-time'>{$this->time}</div>";
        echo "</div>";
    }
}


class SpecialEvent extends Event {
    private $specialNote;

    public function __construct($title, $description, $region, $date, $time, $specialNote) {
        parent::__construct($title, $description, $region, $date, $time);
        $this->specialNote = $specialNote;
    }

    public function getSpecialNote() {
        return $this->specialNote;
    }

    public function setSpecialNote($note) {
        $this->specialNote = $note;
    }

    public function displayCard() {
        parent::displayCard();
        echo "<p class='special-note'>{$this->specialNote}</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA Events</title>
    <link rel="stylesheet" href="events.css">
    <script defer src="events.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="comment.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <img src="./logofoto.png" alt="Space Exploration Logo">
            </div>
            <nav class="main-nav">
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
            </nav>
            
        </div>
    </header>
    <header class="picture-header">
        <h1>NASA Events and Discoveries</h1>
    </header>
    <main>
        <div id="sidebar-container">

            <div id="filter-container">
                <h2>Filter Events</h2>
                <label for="region">Filter by Region:</label>
                <select id="region">
                    <option value="all">All Regions</option>
                    <option value="USA">USA</option>
                    <option value="Europe">Europe</option>
                    <option value="Asia">Asia</option>
                    <option value="Global">Global</option>
                </select>
    
                <label for="time">Filter by Time:</label>
                <select id="time">
                    <option value="all">All Times</option>
                    <option value="future">Future</option>
                    <option value="past">Past</option>
                </select>
    
                <label for="favorite-filter">
                    <input type="checkbox" id="show-favorites">
                    Show Favorites
                </label>
            </div>
            <div id="random-fact-section">
                <h2>Did You Know?</h2>
                <p id="fact-display">Click the button below to learn something fascinating about Astronomy!</p>
                <button id="fact-button">Show Me a Fact</button>
            </div>

            <div id="countdown-section">  
                <h2>Next Event Countdown</h2>  
                <p id="countdown-timer">Loading...</p>  
            </div> 
    
        </div>

<div id="events-container">
<?php
require_once("../db/db.php");
$sql = "SELECT * FROM events ORDER BY date DESC";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = htmlspecialchars($row['title']);
        $description = htmlspecialchars($row['description']);
        $date = htmlspecialchars($row['date']);
        $image = htmlspecialchars($row['image']);
        $region = htmlspecialchars($row['region']);
        $time = htmlspecialchars($row['time']);

        echo '<div class="event-card" data-region="'.$region.'" data-time="'.$time.'" data-description="'.$description.'">';
        echo '<img src="'.$image.'" alt="Event Image">';
        echo '<h3>'.$title.'</h3>';
        echo '<p class="event-time">Date: '.$date.'</p>';
        echo '<p class="event-time">Time: '.$time.'</p>';
        echo '<button class="favorite-btn">⭐</button>';
        echo '</div>';
    }
} else {
    echo "<p style='text-align:center;'>No events found.</p>";
}
?>
</div>
</div>
    </main>
    
    <div id="event-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal">&times;</span>
            <img id="modal-image" alt="Event Image">
            <h2 id="modal-title"></h2>           
            <p id="modal-date"></p>
            <p id="modal-time"></p>
            <p id="modal-description"></p>
        </div>
    </div>

    <div id="map-container">
        <div id="map"></div>
    </div></div>

    <script>  
        function updateCountdown(targetDate) {  
            const timerElement = document.getElementById('countdown-timer');  
            const interval = setInterval(() => {  
                const now = new Date().getTime();  
                const distance = targetDate - now;  
    
                if (distance < 0) {  
                    clearInterval(interval);  
                    timerElement.textContent = 'Event Started!';  
                    return;  
                }  
    
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));  
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));  
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));  
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);  
    
                timerElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;  
            }, 1000);  
        }  
    

        const nextEventDate = new Date('2025-01-18T15:00:00');  
        updateCountdown(nextEventDate);  
    </script> 

<div class="comment-section" style="margin-top: 60px; padding: 20px; background: #111; color: #fff;">
    <h3>Leave a Comment</h3>
    <form id="comment-form" style="display: flex; flex-direction: column; gap: 10px;">
      <input type="hidden" id="comment-user-id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
        <input type="text" id="comment-event-title" placeholder="Event Title" required style="padding: 8px;">
        <textarea id="comment-text" placeholder="Your comment..." required style="padding: 8px;"></textarea>
        <button type="submit" style="padding: 8px; background: #4CAF50; border: none; color: white;">Submit</button>
    </form>
    <div id="comments-container" style="margin-top: 20px;"></div>
</div>

    
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>
                        We are dedicated to advancing humanity's understanding of the universe through innovation, 
                        research, and exploration. Join us on this incredible journey!
                    </p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="/events/events.html">Events</a></li>
                        <li><a href="/aboutus/aboutus.html">About Us</a></li>
                        <li><a href="/news/news.html">News</a></li>
                        <li><a href="/Shop/shop.html">Shop</a></li>
                        <li><a href="https://www.instagram.com/" target="_blank">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>+1 (555) 123-4567</p>
                    <p>info@spaceagency.com</p>
                    <p>123 Space Exploration Blvd, Houston, TX</p>
                </div>
                <div class="footer-section">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/" target="_blank"><img src="https://static.vecteezy.com/system/resources/previews/038/447/961/non_2x/ai-generated-instagram-logo-free-png.png" alt=""></a>
                        <a href="https://www.facebook.com/" target="_blank"><img src="https://cdn.pixabay.com/photo/2021/06/15/12/51/facebook-6338508_960_720.png" alt="" style="width: 45px; height: 52px; padding-bottom: 7px;"></a>
                        <a href="https://x.com/?lang=en" target="_blank"><img src="https://static.vecteezy.com/system/resources/previews/023/986/680/non_2x/twitter-logo-twitter-logo-transparent-twitter-icon-transparent-free-free-png.png" alt="" style="margin-right: 1px;"></a>
                        <a href="https://www.youtube.com/?app=desktop" target="_blank"><img src="https://static.vecteezy.com/system/resources/thumbnails/023/986/480/small_2x/youtube-logo-youtube-logo-transparent-youtube-icon-transparent-free-free-png.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Space Exploration Agency. All rights reserved.</p>
                <ul>
                    <li><a href="https://www.nasa.gov/privacy/#privacy-policy" target="_blank">Privacy Policy</a></li>
                    <li><a href="https://science.nasa.gov/learn/basics-of-space-flight/glossary/" target="_blank">Terms of Use</a></li>
                    <li><a href="https://www.nasa.gov/sitemap/" target="_blank">Sitemap</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>