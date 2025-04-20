<?php
$loginEmail = $loginPassword = "";
$signupFullName = $signupEmail = $signupPassword = $signupConfirmPassword = $signupPhone = "";
$allErrors = [];
$validationMessage = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$formType = $_POST["formType"] ?? "login";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($formType === "login") {
        $loginEmail = test_input($_POST["login_email"]);
        if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
            $allErrors[] = "Invalid email format.";
            $isValid = false;
        }

        if (empty($_POST["login_password"])) {
            $allErrors[] = "Password is required.";
            $isValid = false;
        } else {
            $loginPassword = test_input($_POST["login_password"]);
            if (strlen($loginPassword) < 8) {
                $allErrors[] = "Password must be at least 8 characters.";
                $isValid = false;
            }
        }

        if ($isValid) {
            $validationMessage = "<div class='success'>Login successful! Your information is valid.</div>";
        } else {
            $validationMessage = "<div class='error'>Login failed. Please fix the following errors:</div>";
        }

    } elseif ($formType === "signup") {
        if (empty($_POST["signup_fullName"])) {
            $allErrors[] = "Full name is required.";
            $isValid = false;
        } else {
            $signupFullName = test_input($_POST["signup_fullName"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $signupFullName)) {
                $allErrors[] = "Only letters and white space allowed in full name.";
                $isValid = false;
            }
        }

        if (empty($_POST["signup_email"])) {
            $allErrors[] = "Email is required.";
            $isValid = false;
        } else {
            $signupEmail = test_input($_POST["signup_email"]);
            if (!filter_var($signupEmail, FILTER_VALIDATE_EMAIL)) {
                $allErrors[] = "Invalid email format.";
                $isValid = false;
            }
        }

        if (empty($_POST["signup_phone"])) {
            $allErrors[] = "Phone number is required.";
            $isValid = false;
        } else {
            $signupPhone = $_POST["signup_phone"];
            if (!preg_match("/^\+383\d{8}$/", $signupPhone)) {
                $allErrors[] = "Invalid phone number format. Please use +383 followed by 8 digits.";
                $isValid = false;
            }
        }

        if (empty($_POST["signup_password"])) {
            $allErrors[] = "Password is required.";
            $isValid = false;
        } else {
            $signupPassword = test_input($_POST["signup_password"]);
            if (strlen($signupPassword) < 8) {
                $allErrors[] = "Password must be at least 8 characters.";
                $isValid = false;
            }
        }

        if (empty($_POST["signup_confirmPassword"])) {
            $allErrors[] = "Please confirm your password.";
            $isValid = false;
        } else {
            $signupConfirmPassword = test_input($_POST["signup_confirmPassword"]);
            if ($signupPassword !== $signupConfirmPassword) {
                $allErrors[] = "Passwords do not match.";
                $isValid = false;
            }
        }

        if ($isValid) {
            $validationMessage = "<div class='success'>Registration successful! Your account has been created.</div>";
        } else {
            $validationMessage = "<div class='error'>Registration failed. Please fix the following errors:</div>";
        }
    }
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
                    <li><a href="/WEB2_2025_GR12/news/news.html" >News</a></li>
                    <li><a href="/WEB2_2025_GR12/Shop/shop.html" >Shop</a></li>
                    <li><a href="/WEB2_2025_GR12/aboutus/aboutus.html" >About Us</a></li>
                    <li><a href="/WEB2_2025_GR12/game/game.php">Play</a></li>
                    <li><a href="/login/login.php"><img src="/WEB2_2025_GR12/login/login.png" style="width: 35px; height: 35px;"></a></li>
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
                    <?php if (!empty($allErrors) && $formType === "login"): ?>
                        <div class="error">
                            <ul>
                                <?php foreach ($allErrors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php echo $validationMessage; ?>
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
                    <?php if (!empty($allErrors) && $formType === "signup"): ?>
                        <div class="error">
                            <ul>
                                <?php foreach ($allErrors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php echo $validationMessage; ?>
                </form>
            </div>
        </div>
    </main>

    <script src="login.js"></script>
</body>
</html>
