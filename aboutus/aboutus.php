<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <title><?php echo $page_title; ?> | <?php echo $site_name; ?></title>
    

 
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="aboutus.css">
    <style>
                body {
            
            margin: 0;
            padding: 0;
            background-color: rgb(8, 3, 33);
            
        }

        #customer-reviews {
            background-color: rgb(8, 3, 33);
            padding: 60px 0;
        }

        .about-section-heading {
            font-size: 32px;
            font-weight: bold;
            color: #2415af;
            text-align: center;
            margin-bottom: 20px;
        }

        .border-line {
            width: 60px;
            height: 3px;
            background-color: #2415af;
            margin: 0 auto 30px auto;
        }

        .review-container {
            display: flex;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 20px;
            overflow: hidden;
        }

        .review-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .review-card:hover {
            transform: translateY(-5px);
        }

        .review-card img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .review-card h3 {
            font-size: 18px;
            margin-bottom: 5px;
            color: black;
        }

        .review-card .stars {
            color: #ffd700;
            margin-bottom: 10px;
        }

        .review-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #0a1856;
        }

        .review-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .review-btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 30px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(101, 134, 255, 0.4);
        }

        .review-btn:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(101, 134, 255, 0.6);
        }
    </style>
</head>
<body>

<?php
function useGlobalsSilently() {
    global $site_name, $page_title, $page_description;
   
    $temp = "$page_title - $site_name - $page_description";
}

useGlobalsSilently();

define('DEBUG_MODE', true);

function debugGlobals() {
    global $site_name, $page_title, $page_description;

    if (DEBUG_MODE) {
        echo "<pre>";
        var_dump(
            isset($site_name) ? $site_name : 'site_name nuk është caktuar',
            isset($page_title) ? $page_title : 'page_title nuk është caktuar',
            isset($page_description) ? $page_description : 'page_description nuk është caktuar'
        );
        echo "</pre>";
    }
}


?>

<?php
$site_name = "NASA Explorers";


$current_file = basename($_SERVER['PHP_SELF']);


$filename_to_title = [
    "index.php" => "Home",
    "events.php" => "Events",
    "news.php" => "News",
    "shop.php" => "Shop",
    "aboutus.php" => "About Us",
    "game.php" => "Play"
];

$page_descriptions = [
    "Home" => "Explore our home page",
    "Events" => "See upcoming space events",
    "News" => "Read space-related news",
    "Shop" => "Browse NASA merchandise",
    "About Us" => "Everything about space",
    "Play" => "Play and explore space"
];


$current_page = $filename_to_title[$current_file] ?? "Home";
$page_title = $current_page;
$page_description = $page_descriptions[$page_title] ?? "";
?>




    <header class="main-header">
        <div class="container">
            <div class="logo">
            <img src="/WEB2_2025_GR12/aboutus/logo.png" alt="Logo" width="100">
            </div>
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

    <section id="about" class="about">
        <div class="stars"></div>
        <div class="twinkling"></div>
    <div id="about-page-banner">
        <div id="about-gradient-banner">
            <div id="about-banner-content">
                <h1 style="font-size: 70px;"><abbr title="Information about our company and team">About Us</abbr></h1>
                <h2 style="font-size: 30px; font-family: Georgia, 'Times New Roman', Times, serif;font-style: italic;">
                <?php echo $page_descriptions[$current_page]; ?>
                </h2>
            </div>
        </div>

    </div>

    <div id="about-page-content">
        <div id="about-section1">
     <h1 class="about-section-heading">
        Who We Are
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="gold" style="vertical-align: middle; margin-left: 10px;">
            <path d="M12 2.5l2.73 6.99h7.26l-5.88 4.28 2.26 6.99-5.88-4.28-5.88 4.28 2.26-6.99-5.88-4.28h7.26z"/>
        </svg>
     </h1>
     <div class="border-line"></div>
     <p class="about-text">
        We are a passionate group of space enthusiasts, united by our love for exploring the mysteries of the universe.
         From the distant galaxies to the planets in our solar system, we are dedicated to bringing the wonders of space to everyone. Our mission is to inspire curiosity, educate the public, and foster a deeper understanding of space science.
<br><br>
     With a strong focus on space exploration, technology, and research, we aim to connect with people of all ages and backgrounds, encouraging them to dream big and look up at the stars.
      Through our efforts, we hope to ignite the spark of discovery in the hearts of future space explorers. 🚀
     </p>
        </div>
        <div id="about-section2">
            <div class="about-section2-text">
                <h1 class="about-section-heading">What We Do</h1>
                <div class="border-line"></div>
                <p class="about-text">
                    We bring the wonders of space to your fingertips. Our platform offers a variety of exciting features to inspire, educate, and create a community that celebrates the mysteries of the universe. 
                    <br>
                    From real-time mission updates and interactive learning experiences to exclusive events and unique merchandise, we make space exploration accessible to all. Whether you're a lifelong space enthusiast or a curious newcomer, there's something here for everyone.

Join us on this journey as we explore the unknown, share knowledge, and spark the imaginations of future explorers. Together, we'll discover what lies beyond the stars!🚀
                </p>
                <ul class="feature-list">
                <?php
    $features = [
        ["title" => "Events", "desc" => "Host and promote space-related events, from live talks to stargazing sessions.", "icon" => "🌠"],
        ["title" => "News", "desc" => "Stay updated with the latest news from NASA and space missions.", "icon" => "📰"],
        ["title" => "Shop", "desc" => "Explore our store for exclusive NASA merchandise and educational materials.", "icon" => "🛒"]
    ];
 foreach ($features as $feature): ?>
        <li class="feature-item">
            <span class="feature-icon"><?php echo $feature['icon']; ?></span>
            <div>
                <h3><?php echo $feature['title']; ?></h3>
                <p><?php echo $feature['desc']; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
                </ul>
            </div>
            <div id="about-section2-image">
                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Space Exploration">
            </div>
        </div>

        <?php
$founders = [
    [
        "id" => "festim",
        "name" => "Festim Gashi",
        "position" => "Aerospace Engineering",
        "image" => "https://images.squarespace-cdn.com/content/v1/5f61676ab765cc4f9c9ecc02/68b67fc4-3e76-4238-b545-f6b844fe3d9c/AlvinDrew.jpg",
        "bio" => "Festim Gashi is a seasoned aerospace engineer specializing in space technologies.With years of experience working on high-profile NASA projects, he is passionate about advancing human capabilities in space exploration."
    ],
    [
        "id" => "getoar",
        "name" => "Getoar Hoxha",
        "position" => "Director of Research at Quilty Analytics",
        "image" => "https://images.squarespace-cdn.com/content/v1/5f61676ab765cc4f9c9ecc02/44ff8118-0b16-4007-85db-e56620de2fa4/CalebHenry.jpg?format=500w",
        "bio" => "Getoar Hoxha is an expert in satellite communications and research analysis.As the Director of Research at Quilty Analytics, he has pioneered numerous studies focusing on improving global connectivity through advanced satellite networks."
    ],
    [
        "id" => "grese",
        "name" => "Grese Ferataj",
        "position" => "Computer Engineering",
        "image" => "https://t3.ftcdn.net/jpg/05/68/84/94/360_F_568849416_oxmxa6E2NrlRWLXxBFRJtrwEYettyhdH.jpg",
        "bio" => "Grese Ferataj is a visionary computer engineer with expertise in AI and software.She has contributed to creating cutting-edge applications in healthcare and education, leveraging AI to solve complex real-world problems."
    ],
    [
        "id" => "jon",
        "name" => "Jon Jashari",
        "position" => "Manager",
        "image" => "https://pbs.twimg.com/media/GcsrV9VWkAAaTq_?format=jpg&name=4096x4096",
        "bio" => "Jon Jashari is a dynamic leader with experience in team and project management.With a strong background in operations and logistics, Jon ensures seamless execution of initiatives."
    ],
    [
        "id" => "gresa",
        "name" => "Gresa Thaci",
        "position" => "The Leader",
        "image" => "https://cdn.azeusconvene.com/wp-content/uploads/Women-CEOs-and-Business-Leaders_banner.jpg",
        "bio" => "Gresa Thaci is a charismatic and results-driven leader who inspires her team.As the driving force behind the organization, she excels in strategic planning, team building, and innovation."
    ]
];
?>

<div id="about-section3">
    <h1 class="about-section-heading">🚀Our Founders</h1>
    <h2 style="color: white;">Meet our Team</h2>
    <div id="about-founders-container">
        <?php foreach ($founders as $founder): ?>
            <div class="about-founders-box"
                data-founder="<?php echo $founder['id']; ?>"
                data-name="<?php echo htmlspecialchars($founder['name']); ?>"
                data-position="<?php echo htmlspecialchars($founder['position']); ?>"
                data-image="<?php echo htmlspecialchars($founder['image']); ?>"
                data-bio="<?php echo htmlspecialchars($founder['bio']); ?>">
                <div class="about-founders-shape">
                    <img src="<?php echo $founder['image']; ?>" width="100%" height="100%">
                </div>
                <div class="about-founders-text">
                    <p class="about-founders-name"><mark><?php echo $founder['name']; ?></mark></p>
                    <p class="about-founders-position"><?php echo $founder['position']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="founder-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.8); z-index:9999;">
    <div style="background:white; padding:20px; max-width:500px; margin:100px auto; border-radius:10px; text-align:center; position:relative;">
        <span onclick="document.getElementById('founder-modal').style.display='none'"
              style="position:absolute; top:10px; right:20px; cursor:pointer; font-size:20px;">&times;</span>

        <img id="modal-image" src="" alt="Founder Image" style="width:100%; max-height:300px; object-fit: contain; border-radius:10px;">
        <h2 id="modal-name" style="margin-top:15px;"></h2>
        <h4 id="modal-position" style="color:gray;"></h4>
        <p id="modal-bio" style="margin-top:15px;"></p>
    </div>
</div>
</div>
         
<?php

$timeline = [
    1958 => "NASA is established",
    1961 => "First American in space: Alan Shepard",
    1969 => "Apollo 11 moon landing",
    1981 => "First Space Shuttle launch",
    1990 => "Hubble Space Telescope launched",
    1998 => "International Space Station construction begins",
    2012 => "Curiosity rover lands on Mars",
    2020 => "SpaceX Crew Dragon first crewed flight"
];

ksort($timeline);
?>

<section id="timeline">
    <div class="container">
        <h2 class="about-section-heading">NASA Timeline</h2>
        <div class="border-line" style="margin-top: 27px; margin-bottom: 27px;"></div>
        <div class="timeline">
            <?php foreach ($timeline as $year => $event): ?>
                <div class="timeline-item">
                    <div class="content">
                        <div class="year"><?= $year ?></div>
                        <div class="event"><?= $event ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

        <section id="customer-reviews">
            <div class="container">
                <h2 class="about-section-heading">Customer Reviews</h2>
                <div class="border-line"></div>
                <div class="review-container" id="reviewContainer">
                    <div class="review-card">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnvTbL5WSUuKYddpZI-SXU6JbudFjCtFCGuw&s" alt="Sarah Johnson">
                        <h3>Sarah Johnson</h3>
                        <div class="stars">★★★★★</div>
                        <p>"The space exploration event I attended was mind-blowing! The virtual reality tour of Mars was so realistic, I felt like I was actually there. Can't wait for the next event!"</p>
                    </div>
                    <div class="review-card">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm0isAZwcyx-H1UVScRALSRfJ-BrHo5euFzA&s" alt="Mike Chen">
                        <h3>Mike Chen</h3>
                        <div class="stars">★★★★☆</div>
                        <p>"I love the weekly space news updates. They keep me informed about the latest discoveries and missions. The articles are easy to understand even for a space novice like me."</p>
                    </div>
                    <div class="review-card">
                        <img src="https://miro.medium.com/v2/resize:fit:1400/1*hATEYt0u5wpq4VqRjsXfhQ.png" alt="Emily Rodriguez">
                        <h3>Emily Rodriguez</h3>
                        <div class="stars">★★★★★</div>
                        <p>"The NASA merchandise in the shop is top-notch! I bought a model of the James Webb Space Telescope, and it's now the centerpiece of my living room. Great quality and fast shipping!"</p>
                    </div>
                    <div class="review-card">
                        <img src="https://cdn.prod.website-files.com/65b930adeca3cfaea4f78aab/65d6b33c2abedc84c2ae7317_Alex-Thompson-full.jpg" alt="Alex">
                        <h3>Alex Thompson</h3>
                        <div class="stars">★★★★★</div>
                        <p>"The NASA merchandise in the shop is top-notch! I bought a model of the James Webb Space Telescope, and it's now the centerpiece of my living room. Great quality and fast shipping!"</p>
                    </div>
                    <div class="review-card">
                        <img src="https://static.wikia.nocookie.net/alex-gilbert-series/images/2/21/118500916_340783543953850_2544225655675891_n.jpg/revision/latest?cb=20201019030934" alt="Olivia">
                        <h3>Olivia Parker</h3>
                        <div class="stars">★★★★</div>
                        <p>"The NASA merchandise in the shop is top-notch! I bought a model of the James Webb Space Telescope, and it's now the centerpiece of my living room. Great quality and fast shipping!"</p>
                    </div>
                </div>
                <div class="review-buttons">
                    <button id="prevReview" class="review-btn">Previous</button>
                    <button id="nextReview" class="review-btn">Next</button>
                </div>

                <div class="center-container">
                    <div class="submit-review">
                        <h3>Leave Your Review</h3>
                        <form id="reviewForm" action="mailto:gresathaci18@gmail.com" method="post" enctype="text/plain">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" required>
                
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" required>
                
                            <label for="stars">Your Rating:</label>
                            <div class="stars">
                                <input type="radio" id="star5" name="rating" value="5"><label for="star5">★★★★★</label>
                                <input type="radio" id="star4" name="rating" value="4"><label for="star4">★★★★☆</label>
                                <input type="radio" id="star3" name="rating" value="3"><label for="star3">★★★☆☆</label>
                                <input type="radio" id="star2" name="rating" value="2"><label for="star2">★★☆☆☆</label>
                                <input type="radio" id="star1" name="rating" value="1"><label for="star1">★☆☆☆☆</label>
                            </div>
                
                            <label for="reviewText">Your Review:</label>
                            <textarea id="reviewText" name="reviewText" rows="4" required></textarea>
                
                            <button type="submit" class="review-btn">Submit Review</button>
                        </form>
                    </div>
                    <div class="success-message" style="display: none; opacity: 0; transition: opacity 0.5s ease; text-align: center; margin-top: 20px;">
                        Successfully Submitted!
                    </div>
                </div>
        </section>
    </section>

    
    
       
        
       
       
       
       
       
       
       
       
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
        crossorigin="anonymous"></script>


<script>
window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"><\/script>');
</script>
<script>
    $(document).ready(function() {
    
    if (typeof jQuery != 'undefined') {
        console.log('jQuery is loaded');
        
        
        $('.about-founders-box').click(function() {
            var founderId = $(this).data('founder');
            showFounderDetails(founderId);
        });
        
        
        $('#modal-close, #founder-modal').click(function(e) {
            if (e.target === this) {
                $('#founder-modal').fadeOut();
            }
        });
        
      
        $('#modal-content').click(function(e) {
            e.stopPropagation();
        });
    } else {
        console.error('jQuery is not loaded');
    }
});

document.querySelectorAll(".about-founders-box").forEach(function(box) {
    box.addEventListener("click", function() {
        const name = box.getAttribute("data-name");
        const position = box.getAttribute("data-position");
        const image = box.getAttribute("data-image");
        const bio = box.getAttribute("data-bio");

        document.getElementById("modal-name").textContent = name;
        document.getElementById("modal-position").textContent = position;
        document.getElementById("modal-image").src = image;
        document.getElementById("modal-bio").textContent = bio;

        document.getElementById("founder-modal").style.display = "block";
    });
});
     
     ////

     const reviews = [
            {
                name: "Sarah Johnson",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnvTbL5WSUuKYddpZI-SXU6JbudFjCtFCGuw&s",
                stars: 5,
                text: "The space exploration event I attended was mind-blowing! The virtual reality tour of Mars was so realistic, I felt like I was actually there. Can't wait for the next event!"
            },
            {
                name: "Mike Chen",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm0isAZwcyx-H1UVScRALSRfJ-BrHo5euFzA&s",
                stars: 4,
                text: "I love the weekly space news updates. They keep me informed about the latest discoveries and missions. The articles are easy to understand even for a space novice like me."
            },
            {
                name: "Emily Rodriguez",
                image: "https://miro.medium.com/v2/resize:fit:1400/1*hATEYt0u5wpq4VqRjsXfhQ.png",
                stars: 5,
                text: "The NASA merchandise in the shop is top-notch! I bought a model of the James Webb Space Telescope, and it's now the centerpiece of my living room. Great quality and fast shipping!"
            },
            {
                name: "Alex Thompson",
                image: "https://cdn.prod.website-files.com/65b930adeca3cfaea4f78aab/65d6b33c2abedc84c2ae7317_Alex-Thompson-full.jpg",
                stars: 5,
                text: "The live stream of the rocket launch was incredible! The commentary was informative, and the HD video quality made me feel like I was right there at the launch site."
            },
            {
                name: "Olivia Parker",
                image: "https://static.wikia.nocookie.net/alex-gilbert-series/images/2/21/118500916_340783543953850_2544225655675891_n.jpg/revision/latest?cb=20201019030934",
                stars: 4,
                text: "I attended the 'Introduction to Astrophotography' workshop, and it was fantastic! The instructor was knowledgeable, and I left with some great tips for capturing night sky images."
            }
        ];

        let currentIndex = 0; 
        const reviewsContainer = document.getElementById("reviewContainer");
        const prevButton = document.getElementById("prevReview");
        const nextButton = document.getElementById("nextReview");

        function displayReviews() {
            reviewsContainer.innerHTML = ""; 

            for (let i = currentIndex; i < currentIndex + 3; i++) {
                const review = reviews[i % reviews.length]; 

                const reviewCard = document.createElement("div");
                reviewCard.classList.add("review-card");
                reviewCard.innerHTML = `
                    <img src="${review.image}" alt="${review.name}">
                    <h3>${review.name}</h3>
                    <div class="stars">${"★".repeat(review.stars)}${"☆".repeat(5 - review.stars)}</div>
                    <p>${review.text}</p>
                `;
                reviewsContainer.appendChild(reviewCard);
            }
        }

        prevButton.addEventListener("click", () => {
            currentIndex = (currentIndex - 3 + reviews.length) % reviews.length; 
            displayReviews();
        });

        nextButton.addEventListener("click", () => {
            currentIndex = (currentIndex + 3) % reviews.length; 
            displayReviews();
        });

        
        displayReviews();
</script>

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