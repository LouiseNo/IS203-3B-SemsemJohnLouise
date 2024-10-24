<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root'; // Your database username
$password = ''; // Your database password
$database = 'luisdb'; // Your database name

$connection = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_error()) {
    echo "Error: Unable to connect to MySQL <br>";
    echo "Message: " . mysqli_connect_error() . "<br>";
    exit(); // Stop further execution if the connection fails
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $fullname = $_POST['Fullname'];
    $email = $_POST['Email'];
    $cellno = $_POST['Cellno'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Prepare and bind
    $stmt = $connection->prepare("INSERT INTO louisetb (fullname, email, cellno, username, password) VALUES (?, ?, ?, ?, ?)");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Check if the statement was prepared successfully
    if ($stmt) {
        $stmt->bind_param("sssss", $fullname, $email, $cellno, $username, $hashedPassword);

        if ($stmt->execute()) {
            // Set session variable and redirect
            $_SESSION['username'] = $fullname;
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $stmt->error; // Handle error
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $connection->error; // Handle prepare error
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #2c2c2c; /* Dark background */
            color: #fff; /* White text */
        }
        .container {
            margin-top: 50px;
            background-color: #444; /* Dark gray background */
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            max-width: 400px; /* Set max width for the container */
            margin-left: auto; /* Center horizontally */
            margin-right: auto; /* Center horizontally */
        }
        .form-control {
            height: 40px; /* Set uniform input height */
            font-size: 14px; /* Smaller text size */
            margin-bottom: 15px; /* Space between inputs */
            padding: 10px; /* Consistent padding */
        }
        .btn-primary {
            height: 40px; /* Set button height */
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
    <h1 class="text-center">Registration Form</h1>
    <h4 class="text-center welcome-message">Welcome! Please register below.</h4>

    <form action="" method="post">
        <h3 class="text-center">Create Account</h3>
        <div class="form-group">
            <input type="text" name="Fullname" placeholder="Enter your Fullname" required class="form-control" />
            <input type="email" name="Email" placeholder="Enter your Email" required class="form-control" />
            <input type="text" name="Cellno" placeholder="Enter your Cellphone Number" required class="form-control" />
            <input type="text" name="Username" placeholder="Create your Username" required class="form-control" />
            <div class="input-group">
                <input type="password" name="Password" id="password" placeholder="Create your Password" required class="form-control" />
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="glyphicon glyphicon-eye-open" id="eye-icon"></i>
                </span>
            </div>
            <br>
            <input type="submit" name="register" value="REGISTER" class="btn btn-primary" />
            <br>
            <li><a href="login.php" class="text-white">Login</a></li>
            <li><a href="admin_login.php" class="text-white">Admin</a></li>
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
