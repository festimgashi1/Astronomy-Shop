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
                    <li><a href="/Home/index.html" >Home</a></li>
                    <li><a href="/events/events.html" >Events</a></li>
                    <li><a href="/news/news.html" >News</a></li>
                    <li><a href="/Shop/shop.html" >Shop</a></li>
                    <li><a href="/aboutus/aboutus.html" >About Us</a></li>
                    <li><a href="/game/game.html">Play</a></li>
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
            <div class="event-card" data-region="Europe" data-time="future" data-description="Part of NASA's Commercial Lunar Payload Services (CLPS) program, Firefly Aerospace’s Blue Ghost Mission One lander will deliver 10 science and technology payloads to the Moon.
            Part of the agency’s broader Artemis campaign, CLPS aims to conduct science on the Moon for the benefit of all, including experiments and demos that support missions with crew on the lunar surface." data-lat="51.5074" data-lng="-0.1278">
                <img src="https://www.nasa.gov/wp-content/uploads/2023/09/blue-ghost-mission-1-landed-rendering.webp?resize=1536,851" alt="CLPS Flight: Firefly Aerospace’s Blue Ghost Mission One">
                <h3>CLPS Flight: Firefly Aerospace’s Blue Ghost Mission One</h3>
                <p class="event-time">Date: 2025-01-10</p>
                <p class="event-time">Time: 2:00 PM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="USA" data-time="future" data-description="Embark on an unforgettable journey through the cosmos at Cosmic Wonders: A Night with NASA. Taking place at the Kennedy Space Center on Saturday, March 16, 2025, this event promises an evening of discovery, innovation, and celestial beauty.
            Explore NASA’s latest missions and groundbreaking research with interactive exhibits, meet world-renowned astronauts and scientists, and witness a live demonstration of space exploration technologies. Engage in hands-on activities like building your own mini rocket or navigating a virtual rover on Mars." data-lat="40.7128" data-lng="-74.0060">
                <img src="https://images.csmonitor.com/csm/2016/11/1011628_1_1102-space-station-interior_standard.jpg?alias=standard_900x600" alt="International Space Station Tour">
                <h3>International Space Station Tour</h3>
                <p class="event-time">Date: 2025-03-16</p>
                <p class="event-time">Time: 3:00 PM CEST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="USA" data-time="future" data-description="Join us as we commemorate 35 years of cosmic discovery at the Hubble Space Telescope Anniversary Event on Saturday, April 20, 2025, at the Smithsonian National Air and Space Museum in Washington, D.C.
            Celebrate the legacy of one of humanity's most iconic scientific achievements with an inspiring day of activities, talks, and breathtaking visuals. Immerse yourself in the wonder of Hubble’s greatest discoveries through an exclusive exhibit featuring high-resolution images of distant galaxies, nebulas, and exoplanets." data-lat="38.8954" data-lng="-77.0365">
                <img src="https://science.nasa.gov/wp-content/uploads/2023/07/49812591788-5432805837-o.png?w=3072&format=webp" alt="Hubble Space Telescope Anniversary">
                <h3>Hubble Space Telescope Anniversary</h3>
                <p class="event-time">Date: 2025-04-20</p>
                <p class="event-time">Time: 1:00 PM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Asia" data-time="future" data-description="Join us at the Lunar Base Research Symposium on Thursday, July 18, 2025, hosted at the Asia-Pacific Space Research Center in Singapore, where the brightest minds in lunar research and space exploration gather to discuss the future of humanity’s presence on the Moon.
            Explore the latest advancements in lunar habitat design, sustainable resource use, and the technology needed to build a permanent base on the Moon. Engage with experts from NASA, the China National Space Administration (CNSA), and other leading space agencies as they share their vision for the next generation of lunar exploration.    
            This symposium brings together scientists, engineers, and policy makers to discuss key research areas and global collaboration, helping to pave the way for a new era of space exploration.           
            Be part of this exciting journey as we look toward the Moon and beyond!" data-lat="1.3521" data-lng="103.8198">
                <img src="https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2019/07/artist_impression_of_a_moon_base_concept/19471139-2-eng-GB/Artist_impression_of_a_Moon_Base_concept.jpg" alt="Lunar Base Research Symposium">
                <h3>Lunar Base Research Symposium</h3>
                <p class="event-time">Date: 2025-07-18</p>
                <p class="event-time">Time: 4:00 PM JST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="USA" data-time="future" data-description="Embark on an inspiring journey into the future of space exploration at the Space Exploration Summit, taking place on Friday, September 6, 2025, at the California Science Center in Los Angeles. This premier event brings together leaders in space science, technology, and policy to chart the course for humanity's next great adventures among the stars. The summit concludes with the unveiling of a visionary roadmap titled Beyond the Horizon: Humanity’s Journey into Deep Space that outlines the next 50 years of exploration.
            Join scientists, engineers, policymakers, and enthusiasts for this one-of-a-kind gathering, and be part of the movement propelling humanity toward the stars. Early registration discounts are available now." data-lat="34.0522" data-lng="-118.2437">
                <img src="https://www.apu.apus.edu/images/site/apu/why-should-we-explore-space.jpeg" alt="Space Exploration Summit">
                <h3>Space Exploration Summit</h3>
                <p class="event-time">Date: 2025-09-06</p>
                <p class="event-time">Time: 10:00 AM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Europe" data-time="future" data-description="Experience the beauty and mystery of the cosmos at Astronomy Night with NASA, taking place on Saturday, August 10, 2025, at the stunning European Southern Observatory (ESO) Headquarters in Garching, Germany.
            Join NASA scientists and astronomers for an unforgettable evening celebrating the universe. Immerse yourself in the awe-inspiring world of stars, planets, and galaxies, and learn about NASA’s groundbreaking missions that uncover the secrets of the cosmos.          
            This free, family-friendly event invites everyone, from curious beginners to seasoned stargazers, to share in the wonder of astronomy. Together, let’s explore the infinite possibilities of the night sky." data-lat="48.2603" data-lng="11.6284">
                <img src="https://intrepidmuseum.org/sites/default/files/styles/hero_small/public/2023-08/ASTROLIVE_%20NASA-GSFC_20171208_Archive_e000226~orig.jpeg.webp?itok=qBmgbzvb" alt="Astronomy Night with NASA">
                <h3>Astronomy Night with NASA</h3>
                <p class="event-time">Date: 2024-08-10</p>
                <p class="event-time">Time: 6:00 PM CET</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Europe" data-time="future" data-description="Discover the wonders of space at the Space Science Expo, taking place on Saturday, October 12, 2025, at the European Space Agency (ESA) Centre in Paris, France.
            This exciting event brings together space enthusiasts, scientists, and innovators from around the world to showcase the latest advancements in space science and technology. From interactive exhibits to live demonstrations, visitors will have the opportunity to explore cutting-edge missions, discover the science behind space exploration, and gain insight into humanity’s next great adventures in the cosmos.          
            Join top space experts for panel discussions, explore NASA’s latest space missions, and engage in hands-on activities that bring the mysteries of the universe closer to home.           
            Whether you're a student, a professional, or simply passionate about space, the Space Science Expo is the perfect opportunity to immerse yourself in the incredible future of space exploration." data-lat="48.8566" data-lng="2.3522">
                <img src="https://www.sciencefriday.com/wp-content/uploads/2023/03/pillars-of-creation-webb-min.png" alt="Space Science Expo">
                <h3>Space Science Expo</h3>
                <p class="event-time">Date: 2025-10-12</p>
                <p class="event-time">Time: 2:00 PM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="USA" data-time="future" data-description="Join us for an exciting event celebrating the Juno Mission to Jupiter on Thursday, May 15, 2025, at the Space Center Houston in Houston, Texas, USA.
            This special event marks the ongoing journey of NASA’s Juno spacecraft, which has been orbiting Jupiter since 2016, providing groundbreaking insights into the gas giant’s atmosphere, magnetic field, and interior. Explore the science behind Juno’s incredible discoveries and hear from the scientists who are revealing the mysteries of Jupiter.           
            Enjoy interactive exhibits, expert talks, and an up-close look at the technology behind Juno’s success. Witness breathtaking images and data from the mission, and learn how these findings are reshaping our understanding of the largest planet in our solar system.            
            Don’t miss this opportunity to be part of this thrilling adventure into the heart of the cosmos. Early registration is recommended to secure your spot in this unforgettable event." data-lat="29.7604" data-lng="-95.3698">
                <img src="https://assets.science.nasa.gov/dynamicimage/assets/science/psd/solar/internal_resources/4204/Jupiter_against_black_background_of_space.jpeg?w=2260&h=2260&fit=clip&crop=faces%2Cfocalpoint" alt="Juno Mission to Jupiter">
                <h3>Juno Mission to Jupiter</h3>
                <p class="event-time">Date: 2025-05-15</p>
                <p class="event-time">Time: 12:00 PM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="USA" data-time="future" data-description="Join us for an unforgettable experience at the Mars Rover Landing event on Wednesday, August 5, 2025, at the Kennedy Space Center Visitor Complex in Cape Canaveral, Florida, USA.
            Celebrate the next milestone in interplanetary exploration as we mark the landing of NASA's latest Mars rover. Discover how the rover will search for signs of past life, analyze Mars’ surface, and test new technologies to prepare for future human missions.            
            Through exciting exhibits and presentations, learn about the innovative technology behind the rover’s landing, how it will explore the Martian terrain, and the future of space exploration on Mars. Be part of live demonstrations, discussions with NASA engineers, and watch the rover’s landing through immersive simulators." data-lat="28.3922" data-lng="-80.6077">
                <img src="https://cdn.mos.cms.futurecdn.net/q7ZubLErqWQDQ2UjHg2R3H.jpg" alt="Mars Rover Landing">
                <h3>Mars Rover Landing</h3>
                <p class="event-time">Date: 2024-08-05</p>
                <p class="event-time">Time: 10:00 AM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Asia" data-time="future" data-description="Experience the thrill of space like never before at NASA Spacewalk Live, happening on Saturday, October 18, 2025, at the Asia-Pacific Space Exploration Center in Tokyo, Japan.
            Get a front-row seat to one of NASA’s most exciting spacewalks, broadcast live as astronauts step outside the International Space Station to perform critical tasks in space. Witness the awe-inspiring beauty of Earth from above and learn about the vital work astronauts do to maintain and upgrade the station.            
            Engage with NASA experts during live Q&A sessions, explore cutting-edge space technology, and participate in interactive activities that bring the wonders of space exploration to life. Learn about the history of spacewalks, the science behind them, and the future of human space exploration." data-lat="35.6762" data-lng="139.6503">
                <img src="https://www.nasa.gov/wp-content/uploads/2023/07/iss069e018537-1.jpg" alt="NASA Spacewalk Live" >
                <h3>NASA Spacewalk Live</h3>
                <p class="event-time">Date: 2025-10-10</p>
                <p class="event-time">Time: 5:00 PM JST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Asia" data-time="future" data-description="The Spectro-Photometer for the History of the Universe, Epoch of Reionization and Ices Explorer (SPHEREx) mission will provide the first all-sky spectral survey. Over a two-year planned mission, the SPHEREx Observatory will collect data on more than 450 million galaxies along with more than 100 million stars in the Milky Way in order to explore the origins of the universe.">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/08/spherex-march2022-update-still01-r08-spacebackground-5760x3240-1.jpg?resize=1536,864" alt="SPHEREx">
                <h3>SPHEREx</h3>
                <p class="event-time">Date: 2025-04-10</p>
                <p class="event-time">Time: 5:00 PM JST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Global" data-time="future" data-description="A partial solar eclipse occurs when the Moon covers only a part of the Sun, sometimes resembling a bite taken out of a cookie. A partial solar eclipse can only be safely observed with a special solar filter or by looking at the Sun's reflection. This partial eclipse will be visible throughout Greenland and most of northern Europe and northern Russia. It will be best seen from Canada with 93% coverage.">
                <img src="https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2017/08/a_partial_solar_eclipse_seen_from_space/17109542-1-eng-GB/A_partial_solar_eclipse_seen_from_space_pillars.png" alt="Partial Solar Eclipse">
                <h3>Partial Solar Eclipse</h3>
                <p class="event-time">Date: 2025-03-29</p>
                <p class="event-time">Time: unknown</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Global" data-time="future" data-description=" The Lyrids is an average shower, usually producing about 20 meteors per hour at its peak. It is produced by dust particles left behind by comet C/1861 G1 Thatcher, which was discovered in 1861. The shower runs annually from April 16-25. It peaks this year on the night of the night of the 22nd and morning of the 23rd. These meteors can sometimes produce bright dust trails that last for several seconds. The thin crescent moon will not pose much of a problem so this should be a good show. Best viewing will be from a dark location after midnight. Meteors will radiate from the constellation Lyra, but can appear anywhere in the sky.">
                <img src="http://images-assets.nasa.gov/image/NHQ202108110003/NHQ202108110003~small.jpg" alt="Lyrids Meteor Shower">
                <h3>Lyrids Meteor Shower</h3>
                <p class="event-time">Date: 2025-04-22</p>
                <p class="event-time">Time: unknown</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Asia" data-time="future" data-description=" A total lunar eclipse occurs when the Moon passes completely through the Earth's dark shadow, or umbra. During this type of eclipse, the Moon will gradually get darker and then take on a rusty or blood red color. The eclipse will be visible throughout all of Asia and Australia and the central and eastern parts of Europe and Africa. ">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Lunar_eclipse_04-15-2014_by_R_Jay_GaBany.jpg/1200px-Lunar_eclipse_04-15-2014_by_R_Jay_GaBany.jpg" alt="Total Lunar Eclipse">
                <h3>Total Lunar Eclipse</h3>
                <p class="event-time">Date: 2025-09-07</p>
                <p class="event-time">Time: 4:00 PM EST</p>
                <button class="favorite-btn">⭐</button>
            </div> 
            <div class="event-card" data-region="Global" data-time="future" data-description=" The Draconids is a minor meteor shower producing only about 10 meteors per hour. It is produced by dust grains left behind by comet 21P Giacobini-Zinner, which was first discovered in 1900. The Draconids is an unusual shower in that the best viewing is in the early evening instead of early morning like most other showers. The shower runs annually from October 6-10 and peaks this year on the the night of the 7th. Unfortunately the glare from the nearly full moon will block most of the meteors this year. Combined with the low hourly rate it would probably be best to skip this one unless you are really patient. Best viewing will be in the early evening from a dark location far away from city lights. Meteors will radiate from the constellation Draco, but can appear anywhere in the sky. ">
                <img src="https://static.independent.co.uk/2020/10/07/10/draconid%20meteor%20shower%202020.jpg?width=1200" alt="Draconids Meteor Shower">
                <h3>Draconids Meteor Shower</h3>
                <p class="event-time">Date: 2025-10-07</p>
                <p class="event-time">Time: 7:00 PM EST</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="USA" data-time="future" data-description=" The pair of astronauts will have spent eight more months in space than originally planned, after their ride to the International Space Station (ISS), Boeing’s Starliner spacecraft, displayed several anomalies on its inaugural crewed flight. NASA elected to send Wilmore and Williams back on a SpaceX Crew Dragon capsule, instead. They will be joined on their return trip by astronaut Nick Hague and cosmonaut Aleksandr Gorbunov. ">
                <img src="https://www.usatoday.com/gcdn/authoring/authoring-images/2024/07/10/USAT/74353409007-2155551084.jpg?width=1733&height=1206&fit=crop&format=pjpg&auto=webp" alt="Astronauts Butch Wilmore and Sunni Williams return from the International Space Station">
                <h3>Astronauts Butch Wilmore and Sunni Williams return from the International Space Station</h3>
                <p class="event-time">Date: 2025-02-25</p>
                <p class="event-time">Time: N/A</p>
                <button class="favorite-btn">⭐</button>
            </div>
            <div class="event-card" data-region="Global" data-time="future" data-description=" A year of celestial wonders starts off with a stunning planetary pairing! On January 18, two neighboring worlds of Venus and Saturn will appear less than half a degree apart in the sky, about 30–45 minutes after sunset. Look for the two planets shining in the southwest about a third of the way up the sky.
            Venus, the brighter of the two, will shine a brilliant white, with Saturn right next to it appearing slightly dimmer and more golden. Though you will be able to see both with the naked eye, binoculars will enhance the view, and a small telescope will even reveal Saturn’s iconic rings. ">
                <img src="https://astro786.com/wp-content/uploads/2019/08/saturn-image.png" alt=" Saturn and Venus conjunction">
                <h3> Saturn and Venus conjunction</h3>
                <p class="event-time">Date: 2025-01-18</p>
                <p class="event-time">Time: after sunset</p>
                <button class="favorite-btn">⭐</button>
            </div>

            <div class="event-card" data-region="USA" data-time="future" data-description=" Starliner-1 will carry NASA astronauts Mike Fincke and Scott Tingle, along with Canadian Space Agency astronaut Joshua Kutryk, to the International Space Station. The crew will live and work on the Space Station for approximately six months. ">
                <img src="https://www.nasa.gov/wp-content/uploads/2024/08/53850328598_513c2158ce_o.jpg?resize=1536,1024" alt=" NASA’s Boeing Starliner-1">
                <h3> NASA’s Boeing Starliner-1</h3>
                <p class="event-time">Date: 2025</p>
                <p class="event-time">Time: not set</p>
                <button class="favorite-btn">⭐</button>
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