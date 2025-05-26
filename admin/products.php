<?php
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['admin_email'])) {
    header("Location: ../login/login.php");
    exit();
}

$successMessage = "";
$errorMessage = "";

if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    $deleteStmt = $con->prepare("DELETE FROM products WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);
    if ($deleteStmt->execute()) {
        $successMessage = "Product deleted successfully!";
    } else {
        $errorMessage = "Failed to delete product.";
    }
    $deleteStmt->close();
}

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

$products = $con->query("SELECT * FROM products");
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
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
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
            margin-left: 240px;
            padding: 40px;
            flex-grow: 1;
            width: calc(100% - 240px);
        }

        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 40px;
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

        table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            border: 1px solid #ccc;
            table-layout: fixed;
            font-size: 15px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #34495e;
            color: white;
        }

        td img {
            width: 50px;
            height: auto;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c0392b;
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
                <div class="message"><?= $successMessage ?></div>
            <?php elseif ($errorMessage): ?>
                <div class="error"><?= $errorMessage ?></div>
            <?php endif; ?>
        </div>

        <h2>All Products</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price (€)</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $products->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= number_format($row['price'], 2) ?></td>
                    <td><?= htmlspecialchars($row['category']) ?></td>
                    <td><img src="<?= htmlspecialchars($row['image']) ?>" alt="Product"></td>
                    <td><a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
