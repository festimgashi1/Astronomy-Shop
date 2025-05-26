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
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 30px; }
        h2 { margin-bottom: 20px; }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
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
    </style>
</head>
<body>
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
</body>
</html>
