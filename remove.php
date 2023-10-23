<?php
include 'database.php';
$username = $_GET['username'];
$id = $_GET['id'];

$sql = "DELETE FROM cart WHERE prod_id = '" . $id . "' AND username = '" . $username . "'";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Succesfully removed from favourites")</script>';
    header('refresh: 0; url=myFav.php?username=' . $username);
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
