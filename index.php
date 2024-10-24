<?php
session_start(); // Start the session to access session variables
require('./read.php'); // Assuming this file contains the database connection and queries

// Initialize variables
$searchTerm = '';
$sqlAccount = "SELECT * FROM louisetb"; // Adjust your table name here

// Handle search
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    // Sanitize input to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($connection, $searchTerm);
    $sqlAccount = "SELECT * FROM louisetb WHERE  Email LIKE '%$searchTerm%' OR Cellno LIKE '%$searchTerm%'  OR Fullname LIKE '%$searchTerm%'";
}

if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        echo "<p>SMS sent successfully!</p>";
    } elseif ($_GET['status'] === 'error') {
        echo "<p>Failed to send SMS.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Louisetb</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #589287; /* Set background color to pink */
        }
        .navbar {
            margin-bottom: 20px;
            text-align: center;
        }
        .navbar-nav {
            float: none; /* Remove float to center the items */
            display: inline-block; /* Make the list inline */
        }
        .navbar-nav > li {
            display: inline-block; /* Align the items inline */
        }
        .navbar-nav > li > a {
            font-weight: bold; /* Bold font for navbar items */
            color: #333; /* Set a darker color */
        }
        .navbar-nav > li > a:hover {
            color: #007bff; /* Change color on hover */
        }
        .welcome-message {
            font-size: 50px;
            color: #333;
        }
        .btn-primary, .btn-success {
            width: 70%; /* Full width buttons */
        }
        .table {
            border: 2px solid #333; /* Border for the table */
            border-collapse: collapse; /* Collapse borders */
        }
        .table th, .table td {
            border: 2px solid #333; /* Border for table cells */
            padding: 10px; /* Padding inside cells */
        }
        .table th {
            background-color: #f2f2f2; /* Header background color */
        }
        
    </style>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">ADMIN</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="record.php">View Records</a></li>
                    <li><a href="#">Other Option</a></li>
                </ul>
            </li>
            <li><a href="email.php">Email</a></li> 
            <li><a href="SMS.php">SMS</a></li>
            <li><a href="website.php">Website</a></li>
            <li>
                <form action="logout.php" method="post" style="display:inline;">
                    <button type="submit" class="btn btn-link navbar-btn">Log Out</button>
                </form>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <center>
        <h1>Welcome to User Records </h1>
        <?php if (isset($_SESSION['username'])): ?>
            <h4 class="welcome-message">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! We're glad to have you back!</h4>
        <?php else: ?>
            <h4 class="welcome-message">Hello! Admin.</h4>
        <?php endif; ?>
    </center>
    <br>

    <div class="form-container">
    <form action="index.php" method="post">
        <center>
        <h3>Create</h3>
        </center>
        <br>
        
        <div class="form-group">
        
            <div class="row" style="margin-bottom: 0;"> <!-- Remove bottom margin -->
        
                <div class="col-xs-12 col-sm-3" style="padding-right: 3px;">
                    <input type="text" name="Fullname" placeholder="Enter your Fullname" required class="form-control" />                       
                </div>               
                
                <div class="col-xs-12 col-sm-3" style="padding-right: 3px;">
                    <input type="text" name="Email" placeholder="Enter your Email" required class="form-control" />
                </div>
                
                <div class="col-xs-12 col-sm-3" style="padding-right: 3px;">
                    <input type="text" name="Cellno" placeholder="Enter your Cellphone Number" required class="form-control" style="margin-bottom: 0;" />
                </div>

                <div class="col-xs-12 col-sm-3" style="padding-right: 3px;">
                    <input type="text" name="Username" placeholder="Create your Username" required class="form-control" style="margin-bottom: 0;" />
                </div>
                
                <div class="col-xs-12 col-sm-3" style="padding-right: 3px;">
                    <input type="text" name="Password" placeholder="Create your Password" required class="form-control" style="margin-bottom: 0;" />
                </div>
               
                <div class="col-xs-9 col-sm-2" style="padding-left: 10px;">
                    <input type="submit" name="create" value="CREATE" class="btn btn-primary" style="width: 100%; margin-top: 0;" />
                </div>
            </div>
            
        </div>
        
    </form>
</div>

    <!-- Search Form -->
    <form action="" method="post" class="form-inline">
    <center>
        <div class="form-group">
            <input type="text" name="searchTerm" class="form-control" placeholder="Search by Fullname, ID, or Cellno" value="<?php echo htmlspecialchars($searchTerm); ?>" />
            <input type="submit" name="search" value="SEARCH" class="btn btn-primary" />
        </div>
        </center>
    </form>
    <br>

    <table class="table">
        <tr class="success">
            <th>ID</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Cellphone Number</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        
        <?php 
        // Execute the query and fetch results
        $result = mysqli_query($connection, $sqlAccount);
        while ($results = mysqli_fetch_array($result)) { ?>
            <tr class="danger">
                <td><?php echo $results['ID'] ?></td>
                <td><?php echo $results['Fullname'] ?></td>
                <td><?php echo $results['Email'] ?></td>
                <td><?php echo $results['Cellno'] ?></td>
                <td><?php echo $results['Username'] ?></td>
                <td><?php echo $results['Password'] ?></td>
                <td>
                    <form action="Edit.php" method="post" style="display:inline;">
                        <input type="submit" name="edit" value="EDIT" class="btn btn-success" />
                        <input type="hidden" name="editID" value="<?php echo $results['ID'] ?>">
                        <input type="hidden" name="editF" value="<?php echo $results['Fullname'] ?>">
                        <input type="hidden" name="editE" value="<?php echo $results['Email'] ?>">
                        <input type="hidden" name="editC" value="<?php echo $results['Cellno'] ?>">
                        <input type="hidden" name="editU" value="<?php echo $results['Username'] ?>">
                        <input type="hidden" name="editP" value="<?php echo $results['Password'] ?>">
                    </form>
                    <form action="Delete.php" method="post" style="display:inline;">
                        <input type="submit" name="delete" value="DELETE" class="btn btn-primary" />
                        <input type="hidden" name="deleteID" value="<?php echo $results['ID'] ?>">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<center>
            <h1> Programmed by: John Louise Semsem</h1>
            </center>
</body>
</html>
