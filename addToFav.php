<?php
include 'database.php';
$username = $_GET['username'];
$id = $_GET['id'];

$sql = "INSERT INTO myfav (username, prod_id) VALUES ('$username','$id')";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Your item has succesfully added to your favourites")</script>';
    #echo "Item successfully added to myfav";
    header('refresh: 0; url=index.php?username=' . $username);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
