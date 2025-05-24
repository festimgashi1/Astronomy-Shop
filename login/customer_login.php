<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
        }

        .modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .profile-modal {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
            position: relative;
            animation: slideDown 0.4s ease;
        }

        .profile-modal h2 {
            margin-bottom: 20px;
            color: #2d2d7d;
        }

        .profile-modal p {
            margin: 8px 0;
            color: #444;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #888;
        }

        .close-btn:hover {
            color: #000;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes slideDown {
            from {transform: translateY(-20px); opacity: 0;}
            to {transform: translateY(0); opacity: 1;}
        }
    </style>
</head>
<body>

<?php
include '../db/db.php';

$userId = 1;

$query = "SELECT name, surname, email FROM users WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    echo "
    <div class='modal-overlay' id='modal'>
        <div class='profile-modal'>
            <button class='close-btn' onclick=\"document.getElementById('modal').style.display='none'\">&times;</button>
            <h2>User Profile</h2>
            <p><strong>Name:</strong> {$user['name']}</p>
            <p><strong>Surname:</strong> {$user['surname']}</p>
            <p><strong>Email:</strong> {$user['email']}</p>
        </div>
    </div>";
} else {
    echo "<p style='text-align:center;margin-top:20px;'>User not found.</p>";
}
$stmt->close();
?>


</body>
</html>

