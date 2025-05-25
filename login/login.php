<?php
session_start();
require_once("../db/db.php");

$signupFullName = $signupEmail = $signupPhone = $signupPassword = $signupConfirmPassword = "";
$signupErrors = [];
$signupMessage = "";
$loginEmail = $loginPassword = "";
$loginErrors = [];
$loginMessage = "";
$formType = $_POST["formType"] ?? "signup";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($formType === "signup") {
        $signupFullName = htmlspecialchars(trim($_POST['signup_fullName']));
        $signupEmail = htmlspecialchars(trim($_POST['signup_email']));
        $signupPhone = htmlspecialchars(trim($_POST['signup_phone']));
        $signupPassword = $_POST['signup_password'];
        $signupConfirmPassword = $_POST['signup_confirmPassword'];

        if (empty($signupFullName) || !preg_match("/^[a-zA-Z ]*$/", $signupFullName)) {
            $signupErrors[] = "Only letters and white space allowed in full name.";
        }

        if (!filter_var($signupEmail, FILTER_VALIDATE_EMAIL)) {
            $signupErrors[] = "Invalid email format.";
        }

        if (!preg_match("/^\\+383\\d{8}$/", $signupPhone)) {
            $signupErrors[] = "Invalid phone number format.";
        }

        if (strlen($signupPassword) < 8) {
            $signupErrors[] = "Password must be at least 8 characters.";
        }

        if ($signupPassword !== $signupConfirmPassword) {
            $signupErrors[] = "Passwords do not match.";
        }

        if (empty($signupErrors)) {
            $hashedPassword = password_hash($signupPassword, PASSWORD_DEFAULT);

            $checkStmt = mysqli_prepare($con, "SELECT id FROM users WHERE email = ?");
            mysqli_stmt_bind_param($checkStmt, "s", $signupEmail);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_store_result($checkStmt);

            if (mysqli_stmt_num_rows($checkStmt) > 0) {
                $signupMessage = "<div class='error'>Email already exists.</div>";
            } else {
                $stmt = mysqli_prepare($con, "INSERT INTO users (full_name, email, phone, password_hash) VALUES (?, ?, ?, ?)");

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $signupFullName, $signupEmail, $signupPhone, $hashedPassword);
                    if (mysqli_stmt_execute($stmt)) {
                        $signupMessage = "<div class='success'>Registration successful!</div>";
                        $signupFullName = $signupEmail = $signupPhone = $signupPassword = $signupConfirmPassword = "";
                    } else {
                        $signupMessage = "<div class='error'>Database error during registration.</div>";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    $signupMessage = "<div class='error'>Failed to prepare the statement.</div>";
                }
            }
            mysqli_stmt_close($checkStmt);
        } else {
            $signupMessage = "<div class='error'>Registration failed. Please fix the errors.</div>";
        }
    }

if ($formType === "login") {
    $loginEmail = htmlspecialchars(trim($_POST['login_email']));
    $loginPassword = $_POST['login_password'];

    if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
        $loginErrors[] = "Invalid email format.";
    }

    if (strlen($loginPassword) < 8) {
        $loginErrors[] = "Password must be at least 8 characters.";
    }

    if (empty($loginErrors)) {
        $stmtAdmin = mysqli_prepare($con, "SELECT fullname, email, hashpassword FROM admin WHERE email = ?");
        mysqli_stmt_bind_param($stmtAdmin, "s", $loginEmail);
        mysqli_stmt_execute($stmtAdmin);
        $resultAdmin = mysqli_stmt_get_result($stmtAdmin);

        if ($adminRow = mysqli_fetch_assoc($resultAdmin)) {
            if (password_verify($loginPassword, $adminRow['hashpassword'])) {
                $_SESSION['admin_email'] = $adminRow['email'];
                $_SESSION['admin_fullname'] = $adminRow['fullname'];
                header("Location: /WEB2_2025_GR12/admin/admin.php");
                $_SESSION['email'] = $row['email'];
                exit;
            } else {
                $loginErrors[] = "Incorrect password for admin.";
                $loginMessage = "<div class='error'>Login failed. Invalid credentials.</div>";
            }
        }
         else {
            $stmt = mysqli_prepare($con, "SELECT id, full_name, email, phone, password_hash FROM users WHERE email = ?");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $loginEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($loginPassword, $row['password_hash'])) {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['full_name'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['phone'] = $row['phone'];

                        header("Location: /WEB2_2025_GR12/login/customer_login.php");

                        exit;
                    } else {
                        $loginErrors[] = "Incorrect password.";
                        $loginMessage = "<div class='error'>Login failed. Invalid credentials.</div>";
                    }
                } else {
                    $loginErrors[] = "Email not found.";
                    $loginMessage = "<div class='error'>Login failed. Invalid credentials.</div>";
                }
                mysqli_stmt_close($stmt);
            } else {
                $loginMessage = "<div class='error'>Failed to prepare the user statement.</div>";
            }
        }
        mysqli_stmt_close($stmtAdmin);
    } else {
        $loginMessage = "<div class='error'>Login failed. Please fix the errors.</div>";
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
