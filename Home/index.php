<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Exploration</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <style>
        .solar-system {
            background-color: #030619;
            padding: 50px 0;
        }

        .solar-system h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #fff;
        }

        .planet-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .planet-item {
            background-color: #1a1f36;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .planet-item:hover {
            transform: translateY(-5px);
        }

        .planet-item img {
            width: 80%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .planet-item h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #4a90e2;
        }

        .planet-item p {
            font-size: 0.9rem;
            color: #ccc;
        }

        .social-icons a img {
            width: 60px;
            height: 60px;
            margin-right: 5px;
        }
        .social-icons a:hover {
            color: #4a90e2;
        }
    </style>

    <?php
   
    class Header {
        private $logo;
        private $navItems;

        public function __construct($logo, $navItems) {
            $this->logo = $logo;
            $this->navItems = $navItems;
        }

        public function getLogo() {
            return $this->logo;
        }

        public function setLogo($logo) {
            $this->logo = $logo;
        }

        public function getNavItems() {
            return $this->navItems;
        }

        public function setNavItems($navItems) {
            $this->navItems = $navItems;
        }

        public function render() {
            echo '<header class="main-header">
                <div class="container">
                    <div class="logo">
                        <img src="'.$this->logo.'" alt="">
                    </div>
                    <nav class="main-nav">
                        <ul style="margin-left: 170px;">';
            
            foreach ($this->navItems as $item) {
                echo '<li><a href="'.$item['link'].'">'.$item['text'].'</a></li>';
            }
            
            echo '</ul>
                    </nav>
                </div>
            </header>';
        }
    }

   
    class HeroSection {
        private $title;
        private $description;
        private $imageUrl;
        private $buttonText;

        public function __construct($title, $description, $imageUrl, $buttonText) {
            $this->title = $title;
            $this->description = $description;
            $this->imageUrl = $imageUrl;
            $this->buttonText = $buttonText;
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

        public function getImageUrl() {
            return $this->imageUrl;
        }

        public function setImageUrl($imageUrl) {
            $this->imageUrl = $imageUrl;
        }

        public function getButtonText() {
            return $this->buttonText;
        }

        public function setButtonText($buttonText) {
            $this->buttonText = $buttonText;
        }

        public function render() {
            echo '<section class="hero">
                <div class="hero-content">
                    <div class="hero-image">
                        <img src="'.$this->imageUrl.'" alt="Galaxy Image">
                    </div>
                    <div class="hero-text">
                        <h1>'.$this->title.'</h1>
                        <p>'.$this->description.'</p>
                        <a href="#explore" class="btn">'.$this->buttonText.'</a>
                    </div>
                </div>
            </section>';
        }
    }

  
    class ContentItem {
        protected $title;
        protected $description;
        protected $imageUrl;
        protected $link;

        public function __construct($title, $description, $imageUrl, $link) {
            $this->title = $title;
            $this->description = $description;
            $this->imageUrl = $imageUrl;
            $this->link = $link;
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

        public function getImageUrl() {
            return $this->imageUrl;
        }

        public function setImageUrl($imageUrl) {
            $this->imageUrl = $imageUrl;
        }

        public function getLink() {
            return $this->link;
        }

        public function setLink($link) {
            $this->link = $link;
        }
    }

    
    class Event extends ContentItem {
        private $date;
        private $location;

        public function __construct($title, $description, $imageUrl, $link, $date, $location) {
            parent::__construct($title, $description, $imageUrl, $link);
            $this->date = $date;
            $this->location = $location;
        }

        public function render() {
            echo '<div class="event-item">
                <img src="'.$this->imageUrl.'" alt="'.$this->title.'">
                <h3>'.$this->title.'</h3>
                <p>Date: '.$this->date.'</p>
                <p>Location: '.$this->location.'</p>
                <a href="'.$this->link.'" class="btn">Learn More</a>
            </div>';
        }
    }

   
    class News extends ContentItem {
        public function render() {
            echo '<div class="news-item">
                <img src="'.$this->imageUrl.'" alt="'.$this->title.'">
                <h3>'.$this->title.'</h3>
                <p>'.$this->description.'</p>
                <a href="'.$this->link.'" class="btn">Read More</a>
            </div>';
        }
    }

 
    class Product extends ContentItem {
        private $price;

        public function __construct($title, $description, $imageUrl, $link, $price) {
            parent::__construct($title, $description, $imageUrl, $link);
            $this->price = $price;
        }

        public function render() {
            echo '<div class="product-item">
                <img src="'.$this->imageUrl.'" alt="'.$this->title.'">
                <h3>'.$this->title.'</h3>
                <p>Price: $'.$this->price.'</p>
                <a href="'.$this->link.'" class="btn">Add to Cart</a>
            </div>';
        }
    }

    class Planet {
        private $name;
        private $description;
        private $imageUrl;

        public function __construct($name, $description, $imageUrl) {
            $this->name = $name;
            $this->description = $description;
            $this->imageUrl = $imageUrl;
        }

        public function render() {
            echo '<div class="planet-item">
                <img src="'.$this->imageUrl.'" alt="'.$this->name.'">
                <h3>'.$this->name.'</h3>
                <p>'.$this->description.'</p>
            </div>';
        }
    }

    class Footer {
        private $aboutText;
        private $contactInfo;
        private $socialLinks;

        public function __construct($aboutText, $contactInfo, $socialLinks) {
            $this->aboutText = $aboutText;
            $this->contactInfo = $contactInfo;
            $this->socialLinks = $socialLinks;
        }

        public function render() {
            echo '<footer class="main-footer">
                <div class="container">
                    <div class="footer-content">
                        <div class="footer-section">
                            <h3>About Us</h3>
                            <p>'.$this->aboutText.'</p>
                        </div>
                        <div class="footer-section">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="#events">Events</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#news">News</a></li>
                                <li><a href="#shop">Shop</a></li>
                                <li><a href="https://www.instagram.com/" target="_blank">Contact</a></li>
                            <li><a href="/login/login.html"><img src="/login/login.png"
                        style="width: 35px; height: 35px;"></a></li>
                            </ul>
                        </div>
                        <div class="footer-section">
                            <h3>Contact Us</h3>
                            <p>'.$this->contactInfo['phone'].'</p>
                            <p>'.$this->contactInfo['email'].'</p>
                            <p>'.$this->contactInfo['address'].'</p>
                        </div>
                        <div class="footer-section">
                            <address>
                            <h3>Follow Us</h3>
                            <div class="social-icons">';
            
            foreach ($this->socialLinks as $link) {
                echo '<a href="'.$link['url'].'" target="_blank"><img src="'.$link['icon'].'" alt="'.$link['name'].'"></a>';
            }
            
            echo '</address>
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
            </footer>';
        }
    }

    
    $navItems = [
        ['text' => 'Home', 'link' => '/Home/nasahome.html'],
        ['text' => 'Events', 'link' => '/events/events.html'],
        ['text' => 'News', 'link' => '/news/news.html'],
        ['text' => 'Shop', 'link' => '/Shop/shop.html'],
        ['text' => 'About Us', 'link' => '/aboutus/aboutus.html'],
        ['text' => 'Play', 'link' => '/game/game.html']
        ['text' => 'login' , 'link' => '/login/login.png']
    ];
    $header = new Header('./logo.png', $navItems);
    $header->render();

    $hero = new HeroSection(
        'Discover the Planet',
        'Explore the wonders of our cosmic neighborhood and uncover the mysteries of the universe.',
        'https://stsci-opo.org/STScI-01EVVDJBQ3MR00CE6R5HP7F9N5.jpg',
        'Start Exploring'
    );
    $hero->render();
    ?>

    <section id="events" class="events">
        <div class="container">
            <h2>Upcoming Events</h2>
            <div class="event-list">
                <?php
                $events = [
                    new Event(
                        'Annual Space Conference',
                        '',
                        'https://spacecenter.org/wp-content/uploads/2023/04/event-schsupernova1.jpg',
                        '/events/events.html',
                        'August 15-17, 2024',
                        'Houston, TX'
                    ),
                    new Event(
                        'Community Stargazing Night',
                        '',
                        'https://images.wsj.net/im-220063/?width=700&height=467',
                        '/events/events.html',
                        'September 5, 2024',
                        'Central Park Observatory'
                    ),
                    new Event(
                        'Youth Space Camp',
                        '',
                        'https://www.spacecamp.com/images/Gallery/Space9to11/images/Space%20Camp%20cockpit.jpg',
                        '/events/events.html',
                        'July 1-14, 2024',
                        'Cape Canaveral, FL'
                    )
                ];

                foreach ($events as $event) {
                    $event->render();
                }
                ?>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Space Exploration is dedicated to advancing humanity's understanding of the universe. Our team of scientists, engineers, and visionaries work tirelessly to push the boundaries of space exploration and inspire the next generation of cosmic adventurers.</p>
                    <p>Founded in 2010, we have been at the forefront of groundbreaking research and innovative space technologies. Our mission is to make space accessible to all and to unravel the mysteries of the cosmos.</p>
                </div>
                <div class="about-image">
                    <img src="https://boomsupersonic.com/wp-content/uploads/2021/10/127hEH6-zzA7KCJ_kRUHAIA.jpeg" alt="Our Team">
                </div>
            </div>
        </div>
    </section>

    <section id="news" class="news">
        <div class="container">
            <h2>Latest News</h2>
            <div class="news-list">
                <?php
                $newsItems = [
                    new News(
                        'New Earth-like Exoplanet Discovered',
                        'Scientists have identified a potentially habitable planet orbiting a nearby star.',
                        'https://science.nasa.gov/wp-content/uploads/2023/06/lp79118d-beautyshot-jpg.webp?w=1024',
                        '/news/news.html'
                    ),
                    new News(
                        'Mars Mission Reaches Crucial Milestone',
                        'The latest Mars rover has successfully collected and analyzed soil samples.',
                        'https://cdn.images.express.co.uk/img/dynamic/151/590x/secondary/NASA-Mars-mission-update-insight-probe-spacecraft-halfway-Mars-1470826.jpg?r=1534849996616',
                        '/news/news.html'
                    ),
                    new News(
                        'International Space Station Expands Living Quarters',
                        'A new module has been added to the ISS, increasing its capacity for scientific research.',
                        'https://whychinese.co.za/wp-content/uploads/2023/03/Tiangong-expansion-1780x890.jpg',
                        '/news/news.html'
                    )
                ];

                foreach ($newsItems as $news) {
                    $news->render();
                }
                ?>
            </div>
        </div>
    </section>

    <section id="shop" class="shop">
        <div class="container">
            <h2>Space Shop</h2>
            <div class="product-list">
                <?php
                $products = [
                    new Product(
                        'Flight Suit',
                        '',
                        'https://www.shopnasa.com/cdn/shop/products/flight_suit_white_1000psi_800x.jpg?v=1582660811',
                        '/Shop/shop.html',
                        '49.99'
                    ),
                    new Product(
                        'Starship Chrome Model',
                        '',
                        'https://shop.spacex.com/cdn/shop/products/Unknown-1_800x.png?v=1681580111',
                        '/Shop/shop.html',
                        '174.99'
                    ),
                    new Product(
                        'Telescope N 114/900 EQ-1e',
                        '',
                        'https://www.astroshop.eu/Produktbilder/zoom/11266_1/Omegon-Telescope-N-114-900-EQ-1.jpg',
                        '/Shop/shop.html',
                        '239.99'
                    ),
                    new Product(
                        'Omegon 2.1x42 Wide-Field Binoculars',
                        '',
                        'https://www.astroart-store.com/tuotekuvat/800x800/Omegon_OM2x42.jpg',
                        '/Shop/shop.html',
                        '179.50'
                    )
                ];

                foreach ($products as $product) {
                    $product->render();
                }
                ?>
            </div>
        </div>
    </section>

    <section id="explore" class="solar-system">
        <div class="container">
            <h2>Explore Our Solar System</h2>
            <div class="planet-grid">
                <?php
                $planets = [
                    new Planet(
                        'Mercury',
                        'The smallest planet, closest to the Sun.',
                        'home/hphotos/Remove-bg.ai_1735925604605.png'
                    ),
                    new Planet(
                        'Venus',
                        'Often called Earth\'s twin due to its similar size.',
                        'home/hphotos/Remove-bg.ai_1735925614440.png'
                    ),
                    new Planet(
                        'Earth',
                        'Our home planet, the only known planet with life.',
                        'home/hphotos/Remove-bg.ai_1735925588927.png'
                    ),
                    new Planet(
                        'Mars',
                        'Known as the Red Planet, target for future exploration.',
                        'home/hphotos/Remove-bg.ai_1735925570984.png'
                    ),
                    new Planet(
                        'Jupiter',
                        'The largest planet in our solar system.',
                        'home/hphotos/Remove-bg.ai_1735925932226.png'
                    ),
                    new Planet(
                        'Saturn',
                        'Famous for its prominent ring system.',
                        'home/hphotos/Remove-bg.ai_1735926178512.png'
                    ),
                    new Planet(
                        'Uranus',
                        'An ice giant with a tilted axis.',
                        'home/hphotos/Remove-bg.ai_1735925488282.png'
                    ),
                    new Planet(
                        'Neptune',
                        'The windiest planet in our solar system.',
                        'home/hphotos/Remove-bg.ai_1735925580988.png'
                    )
                ];

                foreach ($planets as $planet) {
                    $planet->render();
                }
                ?>
            </div>
        </div>
    </section>

    <?php
    
    $footer = new Footer(
        'We are dedicated to advancing humanity\'s understanding of the universe through innovation, research, and exploration. Join us on this incredible journey!',
        [
            'phone' => '+1 (555) 123-4567',
            'email' => 'info@spaceagency.com',
            'address' => '123 Space Exploration Blvd, Houston, TX'
        ],
        [
            ['name' => 'Instagram', 'url' => 'https://www.instagram.com/', 'icon' => 'https://static.vecteezy.com/system/resources/previews/038/447/961/non_2x/ai-generated-instagram-logo-free-png.png'],
            ['name' => 'Facebook', 'url' => 'https://www.facebook.com/', 'icon' => 'https://cdn.pixabay.com/photo/2021/06/15/12/51/facebook-6338508_960_720.png'],
            ['name' => 'Twitter', 'url' => 'https://x.com/?lang=en', 'icon' => 'https://static.vecteezy.com/system/resources/previews/023/986/680/non_2x/twitter-logo-twitter-logo-transparent-twitter-icon-transparent-free-free-png.png'],
            ['name' => 'YouTube', 'url' => 'https://www.youtube.com/?app=desktop', 'icon' => 'https://static.vecteezy.com/system/resources/thumbnails/023/986/480/small_2x/youtube-logo-youtube-logo-transparent-youtube-icon-transparent-free-free-png.png']
        ]
    );
    $footer->render();
    ?>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        const heroContent = document.querySelector('.hero-content');
        const heroImage = document.querySelector('.hero-image');

        window.addEventListener('scroll', () => {
            const scrollPosition = window.pageYOffset;
            if (heroContent) {
                heroContent.style.transform = `translateY(${scrollPosition * 0.5}px)`;
            }
            if (heroImage) {
                heroImage.style.transform = `translateY(${scrollPosition * 0.2}px)`;
            }
        });

        const sections = document.querySelectorAll('.section');
        const animateOnScroll = () => {
            const triggerBottom = window.innerHeight / 5 * 4;
            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < triggerBottom) {
                    section.classList.add('animate');
                } else {
                    section.classList.remove('animate');
                }
            });
        };
        window.addEventListener('scroll', animateOnScroll);

        const menuToggle = document.createElement('div');
        menuToggle.classList.add('menu-toggle');

        document.querySelector('.main-header .container').appendChild(menuToggle);

        const nav = document.querySelector('.main-nav');

        menuToggle.addEventListener('click', () => {
            nav.classList.toggle('show');
            nav.classList.toggle('show')
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                nav.classList.remove('show');
            }
        });
    </script>

    
</body>
</html>