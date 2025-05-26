<?php
session_start();
require_once("../db/db.php");

if (!isset($_SESSION['admin_email'])) {
    header("Location: ../login/login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM founders WHERE id = $id");
    header("Location: admin_team.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $image = $_POST['image'];
    $bio = $_POST['bio'];

    $stmt = $con->prepare("INSERT INTO founders (name, position, image, bio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $position, $image, $bio);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_team.php");
    exit();
}

$founders = mysqli_query($con, "SELECT * FROM founders");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Team Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            display: flex;
            background: linear-gradient(145deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            height: 100vh;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.3);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
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

        h2 { margin-bottom: 20px; }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            color: #000;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: green;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            background: #fff;
            color: #000;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        img {
            width: 50px;
            height: auto;
        }

        .delete-btn {
            background: red;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main {
                padding: 20px;
            }
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
        <h2>Add New Team Member</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="position" placeholder="Position" required>
            <input type="text" name="image" placeholder="Image URL" required>
            <textarea name="bio" placeholder="Short bio..." rows="4" required></textarea>
            <button type="submit">Add Member</button>
        </form>

        <h2>Team Members</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Image</th>
                <th>Bio</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($founders)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['position']) ?></td>
                <td><img src="<?= $row['image'] ?>"></td>
                <td><?= htmlspecialchars(substr($row['bio'], 0, 80)) ?>...</td>
                <td><a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this member?')">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
