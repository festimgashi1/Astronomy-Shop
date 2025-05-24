<?php

include '../db/db.php';

$loginEmail = $loginPassword = "";
$signupFullName = $signupEmail = $signupPassword = $signupConfirmPassword = $signupPhone = "";
$loginErrors = [];
$signupErrors = [];
$loginMessage = "";
$signupMessage = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$formType = $_POST["formType"] ?? "login";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($formType === "login") {
        $loginEmail = test_input($_POST["login_email"]);
        $loginPassword = test_input($_POST["login_password"]);

        if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
            $loginErrors[] = "Invalid email format.";
            $isValid = false;
        }

        if (strlen($loginPassword) < 8) {
            $loginErrors[] = "Password must be at least 8 characters.";
            $isValid = false;
        }

        if ($isValid) {
            $stmt = mysqli_prepare($con, "SELECT password_hash FROM users WHERE email = ?");
            mysqli_stmt_bind_param($stmt, "s", $loginEmail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $hashedPasswordFromDB);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($loginPassword, $hashedPasswordFromDB)) {
                    $loginMessage = "<div class='success' style='display:block;'>Login successful! Welcome.</div>";
                    $loginEmail = $loginPassword = ""; 
                } else {
                    $loginErrors[] = "Incorrect password.";
                    $loginMessage = "<div class='error' style='display:block;'>Login failed. Invalid credentials.</div>";
                }
            } else {
                $loginErrors[] = "Email not found.";
                $loginMessage = "<div class='error' style='display:block;'>Login failed. Invalid credentials.</div>";
            }

            mysqli_stmt_close($stmt);
        } else {
            $loginMessage = "<div class='error' style='display:block;'>Login failed. Please fix the errors.</div>";
        }
    }

    elseif ($formType === "signup") {
        $signupFullName = test_input($_POST["signup_fullName"]);
        $signupEmail = test_input($_POST["signup_email"]);
        $signupPhone = test_input($_POST["signup_phone"]);
        $signupPassword = test_input($_POST["signup_password"]);
        $signupConfirmPassword = test_input($_POST["signup_confirmPassword"]);

        if (empty($signupFullName) || !preg_match("/^[a-zA-Z ]*$/", $signupFullName)) {
            $signupErrors[] = "Only letters and white space allowed in full name.";
            $isValid = false;
        }

        if (!filter_var($signupEmail, FILTER_VALIDATE_EMAIL)) {
            $signupErrors[] = "Invalid email format.";
            $isValid = false;
        }

        if (!preg_match("/^\+383\d{8}$/", $signupPhone)) {
            $signupErrors[] = "Invalid phone number format.";
            $isValid = false;
        }

        if (strlen($signupPassword) < 8) {
            $signupErrors[] = "Password must be at least 8 characters.";
            $isValid = false;
        }

        if ($signupPassword !== $signupConfirmPassword) {
            $signupErrors[] = "Passwords do not match.";
            $isValid = false;
        }

        if ($isValid) {
            $stmt = mysqli_prepare($con, "SELECT id FROM users WHERE email = ?");
            mysqli_stmt_bind_param($stmt, "s", $signupEmail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                $signupErrors[] = "Email is already registered.";
                $signupMessage = "<div class='error' style='display:block;'>Email already exists.</div>";
            } else {
                $hashedPassword = password_hash($signupPassword, PASSWORD_DEFAULT);
                $stmt = mysqli_prepare($con, "INSERT INTO users (full_name, email, phone, password_hash) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "ssss", $signupFullName, $signupEmail, $signupPhone, $hashedPassword);
                if (mysqli_stmt_execute($stmt)) {
                    $signupMessage = "<div class='success' style='display:block;'>Registration successful!</div>";
                    $signupFullName = $signupEmail = $signupPhone = $signupPassword = $signupConfirmPassword = "";
                } else {
                    $signupMessage = "<div class='error' style='display:block;'>Database error during registration.</div>";
                }
            }

            mysqli_stmt_close($stmt);
        } else {
            $signupMessage = "<div class='error' style='display:block;'>Registration failed. Please fix the errors.</div>";
        }
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo"><img src="logo.png" alt="Logo"></div>
            <nav class="main-nav">
                <ul>
                <li><a href='/WEB2_2025_GR12/Home/index.php' >Home</a></li>
                    <li><a href="/WEB2_2025_GR12/events/events.php" >Events</a></li>
                    <li><a href="/WEB2_2025_GR12/news/news.php" >News</a></li>
                    <li><a href="/WEB2_2025_GR12/Shop/shop.php" >Shop</a></li>
                    <li><a href="/WEB2_2025_GR12/aboutus/aboutus.php" >About Us</a></li>
                    <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                    <li><a href="/WEB2_2025_GR12/login/login.php"><img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;"></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container-login">
            <div class="tabs">
                <div class="tab <?php echo ($formType === "login") ? 'active' : ''; ?>" id="login-tab">Login</div>
                <div class="tab <?php echo ($formType === "signup") ? 'active' : ''; ?>" id="signup-tab">Sign Up</div>
            </div>

            <div class="form-container">
               <div class="form-container">

    <form id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: <?php echo ($formType === 'login') ? 'block' : 'none'; ?>;">
        <input type="hidden" name="formType" value="login">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="login_email" value="<?php echo $loginEmail; ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="login_password" required>
        </div>
        <button type="submit">Login</button>

        <?php if (!empty($loginErrors)): ?>
            <div class="error" style="display:block;">
                <ul>
                    <?php foreach ($loginErrors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($formType === "login") echo $loginMessage; ?>
    </form>

    <form id="signup-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: <?php echo ($formType === 'signup') ? 'block' : 'none'; ?>;">
        <input type="hidden" name="formType" value="signup">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="signup_fullName" value="<?php echo $signupFullName; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="signup_email" value="<?php echo $signupEmail; ?>" required>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="signup_phone" value="<?php echo $signupPhone; ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="signup_password" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="signup_confirmPassword" required>
        </div>
        <button type="submit">Sign Up</button>

        <?php if (!empty($signupErrors)): ?>
            <div class="error" style="display:block;">
                <ul>
                    <?php foreach ($signupErrors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($formType === "signup") echo $signupMessage; ?>
    </form>

</div>

            </div>
        </div>
    </main>

    <script src="login.js"></script>
</body>
</html>
