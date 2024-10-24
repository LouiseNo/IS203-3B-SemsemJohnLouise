<?php
require('./database.php'); // Ensure this points to your database connection file

if (isset($_POST['create'])) {
    // Sanitize input values
    $Fullname = mysqli_real_escape_string($connection, $_POST['Fullname']);
    $Email = mysqli_real_escape_string($connection, $_POST['Email']);
    $Cellno = mysqli_real_escape_string($connection, $_POST['Cellno']);
   
    

    // Create the insert query
    $queryCreate = "INSERT INTO louisetb (Fullname, Email, Cellno) VALUES ('$Fullname', '$Email', '$Cellno')";

    // Execute the query
    $sqlCreate = mysqli_query($connection, $queryCreate);

    if ($sqlCreate) {
        echo '<script>alert("Successfully Created")</script>';
       
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($connection);
    }
}
?>
