Astronomy Shop - Space Exploration Website
This is my solution for the WEB2 2025 project (Group 12) - a full PHP + MySQL website about space, built around a shop, a blog-style news section, community events, and a mini game.

What I Built
I created a multi-page website that:

Lets visitors sign up / log in as a customer or as an admin
Sells space-themed products through a shop page, with products loaded dynamically from the database
Shows space news articles (including video content) that admins can manage
Lists community events, where logged-in users can leave comments, save favorites, and have their clicks logged
Includes a small interactive planets game
Sends a welcome email automatically after sign-up (via PHPMailer)
Supports light/dark theme switching, remembered with a cookie
Gives admins a dashboard to manage products, news, events and the team
Pages / Features
Public pages

Home/ - landing page, theme switcher (light/dark, cookie-based)
Shop/ - product catalog, products fetched dynamically via get_products.php
news/ - news articles and videos, with dynamic fetching (fetch_news.php)
events/ - events list, comments (submit_comment.php, fetch_comments.php), favorites (save_favorite.php, remove_favorite.php, get_favorites.php), and click tracking (log_event_click.php)
game/ - a small planets-themed browser game
aboutus/ - about page
login/ - combined login/sign-up page, with validation (name, email, Kosovo phone format +383XXXXXXXX, password length/match)
Admin panel (admin/)

admin.php - admin dashboard/profile
products.php - manage shop products
admin_news.php - manage news articles
admin_events.php - manage events
admin_team.php - manage team members
Backend

db/db.php - MySQL connection (mysqli)
send_email.php + send_mail/PHPMailer-master/ - sends the welcome email on sign-up
logout.php - session termination
Sessions ($_SESSION) are used throughout to track logged-in customers and admins separately
How I Built It
Frontend: plain HTML/CSS/JS per page (no framework) - each section (Home, Shop, events, news, game, login, aboutus) has its own CSS/JS files
Backend: PHP with mysqli, mixing prepared statements (safer, used in most places) and a couple of direct queries
Auth: passwords hashed with PHP's password_hash() / verified with password_verify(); admin and customer accounts are checked against separate tables (admin vs users)
Database: MySQL database named universe, accessed through a single shared connection file (db/db.php)
Email: PHPMailer (bundled under send_mail/PHPMailer-master/) for the sign-up welcome email
Personalization: theme preference stored in a cookie so it persists across visits; per-user event favorites and view logs stored in the database
Getting Started
What You Need
A local PHP server stack - e.g. XAMPP or WAMP (PHP + MySQL + Apache)
This project, placed inside your server's web root (e.g. htdocs/WEB2_2025_GR12)
Setup
Start Apache and MySQL from XAMPP/WAMP
Create a MySQL database named universe (matches db/db.php)
Create the tables the code expects - at minimum: users, admin, products, plus tables for events/comments/favorites (event_views, favorites, comments) and news, matching the columns referenced in the PHP files (e.g. admin_events.php, admin_news.php, products.php)
Open db/db.php and check the credentials match your local MySQL setup (default: user root, empty password)
Configure the sender email/credentials used in send_email.php if you want the welcome email to actually send
Running It
Visit http://localhost/WEB2_2025_GR12/Home/index.php in your browser once the server is running.

What I Learned
This project taught me:

How to structure a multi-page PHP site without a framework
How to use mysqli prepared statements to avoid SQL injection
How to manage sessions for two different user roles (admin vs customer)
How to build small JSON APIs in plain PHP (get_products.php, fetch_news.php, fetch_comments.php) consumed by JS on the frontend
How to integrate a third-party library (PHPMailer) to send transactional emails
How to persist simple user preferences (theme) with cookies
For the Reviewers
This project covers:

Full sign-up/login flow with server-side validation and hashed passwords
A working shop, news, and events system backed by a MySQL database
An admin panel to manage the site's content
AJAX-style JSON endpoints consumed by frontend JavaScript
Email integration via PHPMailer
A bonus interactive game page
Notes / Known Issues
A few things worth cleaning up before treating this as production-ready:

db/db.php:5 uses the default local MySQL credentials (root / empty password) - fine for local dev, but should come from environment variables/config before any real deployment
login/login.php:115 redirects the admin to admin.php but then references $row['email'] right after (a variable that belongs to the customer branch, not the admin one) - worth double-checking that block
Login/sign-up paths are hardcoded as /WEB2_2025_GR12/..., so the project needs to live at that exact folder name under your web root for the redirects to work
aboutus/logs/ looks like a debug/log folder that ended up committed - probably safe to remove or gitignore
Created by Festim Gashi Contact: festimi2005gashi@gmail.com
