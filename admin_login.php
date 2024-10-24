<?php
session_start();

// Predefined credentials
$valid_username = 'admin1';
$valid_password = 'admin1';

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Check if credentials are valid
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect to index.php
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2c2c2c; /* Dark background */
            color: #fff; /* White text */
            display: flex; /* Use flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full height of the viewport */
            margin: 0; /* Remove default margin */
        }
        .container {
            background-color: #444; /* Dark gray background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            max-width: 400px; /* Set max width for the container */
        }
        .form-control {
            height: 35px; /* Smaller input height */
            font-size: 14px; /* Smaller text size */
            margin-bottom: 15px; /* Space between inputs */
        }
        .btn-primary {
            height: 35px; /* Smaller button height */
            font-size: 14px; /* Smaller button text size */
            width: 100%; /* Full width button */
        }
        .form-group {
            text-align: center; /* Center align form group */
        }
        .welcome-message {
            margin-bottom: 20px; /* Space below welcome message */
        }
        li {
            list-style-type: none; /* Remove bullet points */
        }
        .input-group {
            position: relative;
            width: 100%;
        }
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 8px; /* Adjust for better centering */
            cursor: pointer;
            color: #fff; /* Color for the eye icon */
            z-index: 10; /* Ensure it’s above the input */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Admin Login</h1>
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="Username" placeholder="Enter your Username" required class="form-control" />
            <div class="input-group">
                <input type="password" name="Password" id="password" placeholder="Enter your Password" required class="form-control" />
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="glyphicon glyphicon-eye-open" id="eye-icon"></i>
                </span>
            </div>
            <br>
            <input type="submit" name="login" value="LOGIN" class="btn btn-primary" />
            <br>
                        <footer>Programmed by: John Louise Semsem</footer>
        </div>
    </form>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('glyphicon-eye-open');
        eyeIcon.classList.add('glyphicon-eye-close');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('glyphicon-eye-close');
        eyeIcon.classList.add('glyphicon-eye-open');
    }
}
</script>

</body>
</html>
