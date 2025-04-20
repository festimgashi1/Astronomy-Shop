<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space News Today</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
     crossorigin="anonymous" referrerpolicy="no-referrer"/>
     <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="news.js">
    <link rel="stylesheet" href="news1.js">
</head>
<body>

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
                    <li><a href="/WEB2_2025_GR12/Shop/shop.html" >Shop</a></li>
                    <li><a href="/WEB2_2025_GR12/aboutus/aboutus.php" >About Us</a></li>
                    <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                    <li><a href="/login/login.php"><img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;"></a></li>
                </ul>
            </nav>
        </div>
        </div>
    </header>

    <header id="header1">
        <h1 style="font-size: 36px; color: white; background-color: #ffd700;">Space News Today</h1>
    </header>

    <main> 

        <div class="slider-container">
            <div class="image-container">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/10/54050312989-7f2d600d29-o.jpg" alt="image" class="active">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/11/as12-46-6728orig.jpg" alt="image">
                <img src="https://smd-cms.nasa.gov/wp-content/uploads/2023/12/nasa-mars-desktop-8k.jpg" alt="">
                <img src="https://science.nasa.gov/wp-content/uploads/2023/06/solar-system-illustration-16x9-1.jpg" alt="">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/12/iss072e189028orig.jpg" alt="image">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/11/pia22081orig.jpg" alt="image">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/03/fy25-budget-cover-no-text.png?w=1536" alt="">
                <img src="https://images.pexels.com/photos/1169754/pexels-photo-1169754.jpeg?cs=srgb&dl=pexels-philippedonn-1169754.jpg&fm=jpg" alt="">
                <img src="https://science.nasa.gov/wp-content/uploads/2024/05/europa-clipper-16x9-1.jpg?w=4096&format=jpeg" alt="">
            </div>            
        </div>
        <hr color="#ffd700" style="margin-top: 20px;"
        <article id="featured-article">
            <h1 style="font-size: 36px; padding-top: 10px; text-align: left; padding-left: 10px;">The Latest Space News</h1>
            <h2 style="padding: 10px 10px 0px 0px; color: white; padding-left: 10px;">NASA's Artemis Program: The Next Giant Leap</h2>
            <p style="color: white; padding-left: 10px;" class="subtitle">Humanity's return to the Moon and beyond</p>
            <div class="article-content">
                <div class="image-container1">
                    <img src="https://i.ytimg.com/vi/9YDfmbmLxwc/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBzW48f_aPClYW1FndH9jgcpRZwog" alt="Artemis mission concept art" id="featured-image">
                    <img src="https://media.licdn.com/dms/image/v2/D5612AQHtzNYRDIK61Q/article-cover_image-shrink_600_2000/article-cover_image-shrink_600_2000/0/1702547652997?e=2147483647&v=beta&t=L6Bbn-Dbn_elKI8Hsrdw7lrBmCJkk1KIygB1qFzX5ng" alt="">
                    <img src="https://editverse.com/wp-content/uploads/2024/12/Space-Launch-System-SLS-1024x585.jpg" alt="">
                </div>
                <p style="color: white; padding-left: 10px;">NASA's Artemis program aims to land the first woman and the next man on the Moon by 2024, paving the way for sustainable lunar exploration and eventual missions to Mars. This ambitious project represents the next era of human spaceflight and scientific discovery.</p>
                <a href="https://www.nasa.gov/news-release/nasa-publishes-artemis-plan-to-land-first-woman-next-man-on-moon-in-2024/" target="_blank" class="read-more">Read more about Artemis</a>
            </div>
            <p style="transform: translateX(44%); ">The sound of Universe</p>
            <video  width="650px" height="340px" controls style="object-fit: fill; padding-left: 10px;">
                <source src="Artemis Accords_ Celebrating 50 Country Signatories.mp4" type="video/mp4">
            </video>
            <audio style="width: 500px; transform: translateY(-500%); margin-left: 5px;" controls>
                <source src="Nasa releases audio of what a black hole 'sounds' like.mp4" type="audio/mp4">
            </audio>
        </article>

        <hr color="#ffd700" style="margin-top: 10px;">
<div class="container">
    <h1>Detailed Space News Timeline</h1>
    <table id="spaceNewsTable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Source</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $spaceNews = [
                [
                    "title" => "SpaceX Starship Completes High-Altitude Test",
                    "description" => "Elon Musk's spacecraft prototype achieves major milestone",
                    "category1" => "Technology",
                    "image" => "https://i.ytimg.com/vi/GwC0aLsG7Rc/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAWTxxoPUSy6SlT9POCmGsuozo3AA",
                    "sourceUrl" => "https://www.aljazeera.com/news/2024/6/7/spacex-rocket-completes-first-full-test-flight-after-surviving-re-entry",
                    "date" => "2023-06-07"
                ],
                [
                    "title" => "New Exoplanet Discovered in Habitable Zone",
                    "description" => "Astronomers find Earth-like planet orbiting nearby star",
                    "category1" => "Astronomy",
                    "image" => "https://i.abcnewsfe.com/a/c04d41c8-a24f-422e-be1e-2a7aacc26285/Super-Earth-ht-er-240205_1707153488302_hpMain_16x9.jpg",
                    "sourceUrl" => "https://science.nasa.gov/universe/exoplanets/discovery-alert-a-super-earth-in-the-habitable-zone/",
                    "date" => "2024-02-05"
                ],
                [
                    "title" => "James Webb Space Telescope Reveals Cosmic Secrets",
                    "description" => "Revolutionary observatory provides unprecedented views of the universe",
                    "category1" => "Science",
                    "image" => "https://cdn.abcotvs.com/dip/images/12347150_101922-wls-pillars-of-creation-img.jpg",
                    "sourceUrl" => "https://scitechdaily.com/webb-telescope-uncovers-bright-ancient-galaxies-that-challenge-cosmic-theories/",
                    "date" => "2022-07-11"
                ],
                [
                    "title" => "NASA's Perseverance Rover Discovers Ancient Delta on Mars",
                    "description" => "The rover has found evidence of an ancient river delta in Jezero Crater, supporting the theory that Mars once had flowing water.",
                    "category1" => "Exploration",
                    "image" => "https://cdn.mos.cms.futurecdn.net/5boWV7QPgeCo4LaCNZHeDc.jpg",
                    "sourceUrl" => "https://www.nasa.gov/missions/mars-2020-perseverance/perseverance-rover/nasas-perseverance-rover-deciphers-ancient-history-of-martian-lake/",
                    "date" => "2021-02-18"
                ],
                [
                    "title" => "SpaceX Successfully Launches Starlink Satellites",
                    "description" => "SpaceX has launched another batch of Starlink satellites, expanding its global internet coverage network.",
                    "category1" => "Technology",
                    "image" => "https://satelliteprome.com/wp-content/uploads/2020/01/SpaceX.jpg",
                    "sourceUrl" => "https://spaceflightnow.com/2024/12/03/live-coverage-spacex-to-launch-starlink-satellites-on-falcon-9-rocket-from-cape-canaveral-6/",
                    "date" => "2024-12-03"
                ],
                [
                    "title" => "China Announces Plans for Lunar Research Station",
                    "description" => "China has revealed plans to build a permanent research station on the Moon's south pole by 2030.",
                    "category1" => "Space Policy",
                    "image" => "https://cdn.i-scmp.com/sites/default/files/styles/og_image_scmp_generic/public/d8/images/canvas/2024/09/09/f1fe71b8-95dc-44ec-909e-48fc6089aa90_cd9d588c.jpg?itok=vkb_rd9N&v=1725861205",
                    "sourceUrl" => "https://english.www.gov.cn/news/202409/07/content_WS66dbeb9dc6d0868f4e8eab63.html",
                    "date" => "2023-09-07"
                ],
                [
                    "title" => "Astronomers Detect Mysterious Radio Signal from Distant Galaxy",
                    "description" => "Scientists have picked up an unusual radio signal from a galaxy billions of light-years away, sparking curiosity about its origin.",
                    "category1" => "Astrophysics",
                    "image" => "https://static.techno-science.net/illustration/Source/PO/2024/11/11/russian-astronomers-di-1.jpg",
                    "sourceUrl" => "https://www.space.com/radio-signal-ancient-galaxy-record-breaking-distance",
                    "date" => "2024-11-11"
                ],
                [
                    "title" => "NASA and ESA Collaborate on Mars Sample Return Mission",
                    "description" => "The space agencies are working together to bring the first samples from Mars back to Earth for detailed study.",
                    "category1" => "Exploration",
                    "image" => "https://science.nasa.gov/wp-content/uploads/2023/06/msr-family-final-7-27-slidetorightforbetanasasite-2000px-cropped.jpg?w=4096&format=jpeg",
                    "sourceUrl" => "https://www.esa.int/Science_Exploration/Human_and_Robotic_Exploration/Exploration/Mars_sample_return",
                    "date" => "2024-11-13"
                ],
                
            ];

            
            usort($spaceNews, function($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });
            
            foreach ($spaceNews as $news) {
                echo "<tr>";
                echo "<td>{$news['date']}</td>";
                echo "<td><img src='{$news['image']}' alt='news image' style='width: 100px; height: auto;'></td>";
                echo "<td>{$news['title']}</td>";
                echo "<td>{$news['description']}</td>";
                echo "<td>{$news['category1']}</td>";
                echo "<td><a href='{$news['sourceUrl']}' target='_blank'>Source</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
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
                    <li><a href="https://www.nasa.gov/sitemap/" target="_blank">Sitemap </a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="news.js"></script>
    <script src="news1.js"></script>
</body>
</html>