<?php
include 'database.php';
$username = $_GET['username'];
$prod_id = $_GET['id'];
$quantity = $_POST['quantity'];
$del_method = $_POST['del_method'];

$sql_prod = mysqli_query($conn , "SELECT vendor FROM product WHERE id = '$prod_id'");
$result = mysqli_fetch_assoc($sql_prod);
$vendor = $result['vendor'];

$sql = "INSERT INTO myCart (product_id , username ,quantity , del_method , vendor) VALUES ('$prod_id', '$username', '$quantity' ,'$del_method','$vendor')";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Your item has succesfully added to your cart")</script>';
    #echo "Item successfully added to myfav";
    header('refresh: 0; url=index.php?username=' . $username);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
