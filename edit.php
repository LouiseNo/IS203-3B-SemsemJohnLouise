<?php

require('./Database.php');



if (isset($_POST['edit'])){

    $editID = $_POST['editID'];

    $editF = $_POST['editF'];

    $editE = $_POST['editE'];

    $editC = $_POST['editC'];

   
}



if (isset($_POST['update'])){

    $updateID = $_POST['updateID'];

    $updateF = $_POST['updateF'];

    $updateE = $_POST['updateE'];

    $updateC= $_POST['updateC'];



    $queryupdate = "UPDATE louisetb SET Fullname = '$updateF', Email ='$updateE', Cellno ='$updateC' WHERE ID = $updateID ";

    $sqlupdate = mysqli_query($connection, $queryupdate);



    echo '<script>alert("Successfully Edited!")</script>';

    echo '<script>window.location.href = "/LUIS/index.php"</script>';

}





?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

                              

    <br>



<div class="container">

    <center>

<h1>EDIT INFORMATION</h1>

</center>

<br>

<form action="" method="post">

        <h3>Edit User Info</h3>

        <input type="text" name="updateF" placeholder="Enter your Fullname" value="<?php echo$editF ?>" required />

        </br></br>

        <input type="text" name="updateE" placeholder="Enter your Email" value="<?php echo$editE?>" required />

        </br></br>

        <input type="text" name="updateC" placeholder="Enter your Cellphone Number" value="<?php echo$editC?>" required />

        </br></br>

        <input type="submit" name="update" value="EDIT"  class="btn btn-primary" />

        <input type="hidden" name="updateID" value="<?php echo$editID?>"  />




    </form>




</div>



</body>

</html>