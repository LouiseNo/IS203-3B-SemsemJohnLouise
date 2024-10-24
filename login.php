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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Prepare and execute the statement
    $stmt = $connection->prepare("SELECT password, fullname FROM louisetb WHERE username = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPassword, $fullname);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Set session variable and redirect to index.php
                $_SESSION['username'] = $fullname;
                header("Location: website.php");
                exit;
            } else {
                echo "Invalid password. Please try again.";
            }
        } else {
            echo "User not found. Please check your username.";
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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <center>
        <h1>Login Form</h1>
        <h4 class="welcome-message">Welcome! Please log in below.</h4>
    </center>

    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" name="Username" placeholder="Enter your Username" required class="form-control" />
                    </div>
                    <div class="col-xs-12">
                        <div class="input-group">
                            <input type="password" name="Password" id="password" placeholder="Enter your Password" required class="form-control" />
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="glyphicon glyphicon-eye-open" id="eye-icon"></i>
                            </span>
                        </div>
                    </div>
                    
                    <center>
                    <div class="col-xs-12">
                    <br>
                        <input type="submit" name="login" value="LOGIN" class="btn btn-primary" />
                        <br>
                        <li><a href="registration.php">Register</a></li>
                        
                        <li><a href="admin_login.php">Admin Login</a></li>
                        <br>
                        <footer>Programmed by: John Louise Semsem</footer>
                    </div>
                    </center>
                </div>
            </div>
        </form>
    </div>
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
