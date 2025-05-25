<?php
session_start();
require_once("../db/db.php");

// kontrollo nese admini eshte i kyçur
if (!isset($_SESSION['admin_email'])) {
    header("Location: ../login/login.php");
    exit();
}

$successMessage = "";
$errorMessage = "";

// Shto produktin në databazë kur forma dërgohet
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $price = floatval($_POST["price"]);
    $category = trim($_POST["category"]);
    $image = trim($_POST["image"]);

    if ($name && $price && $image) {
        $stmt = $con->prepare("INSERT INTO products (name, price, category, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdss", $name, $price, $category, $image);

        if ($stmt->execute()) {
            $successMessage = "Product added successfully!";
        } else {
            $errorMessage = "Error inserting product.";
        }
        $stmt->close();
    } else {
        $errorMessage = "Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Products</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            height: 100vh;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .signout {
            background-color: #e74c3c;
        }

        .main {
            flex-grow: 1;
            padding: 40px;
        }

        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            margin-top: 10px;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="/WEB2_2025_GR12/admin/admin.php">Profile</a>
        <a href="/WEB2_2025_GR12/admin/admin_news.php">News</a>
        <a href="/WEB2_2025_GR12/admin/admin_events.php">Events</a>
        <a href="/WEB2_2025_GR12/admin/products.php">Products</a>
        <a href="/WEB2_2025_GR12/admin/admin_team.php">Team</a>
        <a href="../logout.php" class="signout">Sign Out</a>
    </div>

    <div class="main">
        <div class="form-container">
            <h2>Add Product</h2>
            <form method="POST">
                <div class="form-group">
                    <label>Product Name*</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Price (€)*</label>
                    <input type="number" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category">
                </div>
                <div class="form-group">
                    <label>Image URL*</label>
                    <input type="text" name="image" required>
                </div>
                <button type="submit">Add Product</button>
            </form>

            <?php if ($successMessage): ?>
                <div class="message"><?php echo $successMessage; ?></div>
            <?php elseif ($errorMessage): ?>
                <div class="error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
