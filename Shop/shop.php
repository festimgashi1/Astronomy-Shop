<?php
session_start();
require_once("../db/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submitButton'])) {
    $userid = $_SESSION['user_id'];
    $address = trim($_POST['address']);
    $payment = trim($_POST['payment']);
    $productNames = $_POST['product_name'] ?? [];
    $productQtys = $_POST['product_qty'] ?? [];
    $productPrices = $_POST['product_price'] ?? [];

    if ($address && $payment && !empty($productNames)) {
        $stmt = $con->prepare("INSERT INTO orders (userid, address, payment) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $userid, $address, $payment);
        $stmt->execute();
        $orderId = $stmt->insert_id;
        $stmt->close();

        $stmtItem = $con->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        for ($i = 0; $i < count($productNames); $i++) {
            $stmtItem->bind_param("isid", $orderId, $productNames[$i], $productQtys[$i], $productPrices[$i]);
            $stmtItem->execute();
        }
        $stmtItem->close();

        $successMessage = "Order placed successfully!";
        unset($_SESSION['cart']);
    } else {
        $errorMessage = "Please fill all fields and select at least one product.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="shop.css">
    <style>
        .social-icons a {
            display: inline;
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
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <img src="./photos/logo.png" alt="">
            </div>
            <div class="main-nav">
                <ul>
                    <li><a href='/WEB2_2025_GR12/Home/index.php'>Home</a></li>
                    <li><a href="/WEB2_2025_GR12/events/events.php">Events</a></li>
                    <li><a href="/WEB2_2025_GR12/news/news.php">News</a></li>
                    <li><a href="/WEB2_2025_GR12/Shop/shop.php">Shop</a></li>
                    <li><a href="/WEB2_2025_GR12/aboutus/aboutus.php">About Us</a></li>
                    <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                    <li>
                        <a href="<?php echo isset($_SESSION['user_id']) ? '/WEB2_2025_GR12/login/customer_login.php' : '/WEB2_2025_GR12/login/login.php'; ?>">
                            <img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <header>
        <div class="header">
            <h1><b>Space Shop </b></h1>
            <button class="gomain" onclick="document.getElementById('main').scrollIntoView({behavior: 'smooth'})">
                Explore </button>
        </div>
    </header>
    <main id="main">
        <nav>
            <h3 class="category-btn1">Categories: </h3>
            <button class="category-btn active" data-category="all">All</button>
            <button class="category-btn" data-category="models">Models</button>
            <button class="category-btn" data-category="books">Books</button>
            <button class="category-btn" data-category="clothing">Clothing</button>
            <button id="cart-btn"><img src="https://pngimg.com/d/shopping_cart_PNG4.png"
                    style="width: 35px; height: 35px;"></button>
        </nav>
        <br>
        <div id="product-grid">
            <?php
            $query = "SELECT * FROM products";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product-card'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p>Category: " . htmlspecialchars($row['category']) . "</p>";
                echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
                echo "<button onclick=\"addToCart('" . addslashes($row['name']) . "', " . $row['price'] . ")\">Add to Cart</button>";
                echo "</div>";
            }
            ?>
        </div>

        <div id="popup">
            <span id="closeButton">&times;</span>
            <div>
                <br>
                <?php if (isset($_SESSION['email'])): ?>
                    <fieldset id="emailFieldset">
                        <legend>Email:</legend>
                        <input type="email" id="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly style="width: 350px; background-color: #f0f0f0;">
                    </fieldset>
                    <p id="message2" class="message2"></p>
                <?php else: ?>
                    <fieldset id="emailFieldset">
                        <legend>Email:</legend>
                        <p style="color: red;">You must <a href="/WEB2_2025_GR12/login/login.php" style="color: blue; text-decoration: underline;">log in</a> to place an order.</p>
                    </fieldset>
                <?php endif; ?>
                <br>
               <fieldset id="phoneFieldset">
                 <legend>Phone number:</legend>
                    <?php if (isset($_SESSION['phone'])): ?>
                    <input type="tel" id="phone" value="<?php echo htmlspecialchars($_SESSION['phone']); ?>" readonly style="width: 350px; background-color: #f0f0f0;">
                    <?php else: ?>
                    <input type="tel" id="phone" style="width: 350px;" placeholder="+383 4x xxx xxx" required>
                    <?php endif; ?>
                </fieldset>
                <p id="message1" class="message1"></p>
                <br>
                <fieldset id="addressFieldset">
                    <legend>Address:</legend>
                    <input type="text" id="address" style="width: 350px;" placeholder="country-city" required>
                </fieldset>
                <p id="message3" style=" color: red;" class="message3"></p>                
                <br>
                <fieldset id="paymentFieldset">
    <legend>Payment method:</legend>
    <label>
        <input type="radio" checked="checked" name="radio" value="Cash"> Cash
    </label>
    <label>
        <input type="radio" name="radio" value="VISA"> VISA card
    </label>
    <label>
        <input type="radio" name="radio" value="PayPal"> PayPal
    </label> 
    <label>
        <input type="radio" name="radio" value="Mastercard"> Mastercard
    </label>
</fieldset>

<form method="POST" id="orderForm">
    <input type="hidden" name="address" id="addressHidden">
    <input type="hidden" name="payment" id="paymentHidden">
    <div id="hiddenProducts"></div>
<button type="submit" name="submitButton" id="submitButton" class="done-btn">Submit</button>
</form>
                <p id="message" style="font-weight: bold;" class="message"></p>
            </div>
        </div>         
    </main>

<aside id="cart">
        <button id="close-cart" aria-label="Close cart">&times;</button>
        <h2>Cart:</h2>
        <div id="cart-items"></div>
        <div id="cart-total">Total: $0.00</div>
        <button id="checkout-btn">Checkout</button>
    </aside>


    <footer class="main-footer">
        <div class="container-foot">
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
                        <li><a href="/events/events.php">Events</a></li>
                        <li><a href="/aboutus/aboutus.php">About Us</a></li>
                        <li><a href="/news/news.php">News</a></li>
                        <li><a href="/Shop/shop.php">Shop</a></li>
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

<script>

document.getElementById("submitButton").addEventListener("click", (e) => {
    const cartItems = JSON.parse(localStorage.getItem("cartItems") || "[]"); 
    const address = document.getElementById("address").value;
    const payment = document.querySelector("input[name='radio']:checked").value;

    if (!address) return alert("Address is required");
    if (cartItems.length === 0) return alert("Cart is empty");

    document.getElementById("addressHidden").value = address;
    document.getElementById("paymentHidden").value = payment;

    const hiddenProductsDiv = document.getElementById("hiddenProducts");
    hiddenProductsDiv.innerHTML = "";

    cartItems.forEach(item => {
        hiddenProductsDiv.innerHTML += `
            <input type='hidden' name='product_name[]' value='${item.name}'>
            <input type='hidden' name='product_qty[]' value='${item.qty}'>
            <input type='hidden' name='product_price[]' value='${item.price}'>
        `;
    });

    // ✅ Show message, clear cart, close cart
    alert("✅ The order is on the way!");

    // Clear and close
    localStorage.removeItem("cartItems");
    document.getElementById("cart").classList.remove("open");
    document.body.classList.remove("cart-open");
    renderCart();

    // Submit form
    document.getElementById("orderForm").submit();
});

 window.isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
</script>

<script src="shop.js"></script>
</body>
</html>