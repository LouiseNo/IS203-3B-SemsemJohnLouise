<?php



require('./database.php');



if(isset($_POST['delete'])) {

    $deleteId = $_POST['deleteID'];



    $querrydelete ="DELETE FROM louisetb WHERE ID = $deleteId";

    $sqldelete = mysqli_query($connection,$querrydelete);



    echo'<script>alert("successfully Deleted")</script>';

    echo '<script>window.location.href = "/LUIS/index.php"</script>';

}



?>