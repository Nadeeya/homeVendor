<?php
include 'database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$message = [];

if (isset($_POST['login_seller']) && $_POST['login_seller'] == 'Submit') {

    //Checking if user already exist in the database
    $user_check = "SELECT * FROM vendors WHERE email ='$email' and password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result)) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in successfully";
        $shopName = $user['shopName'];
        echo "<h1 style='text-align: center; margin-top: 10px;'>Welcome back!</h1>";
        header('refresh:2; url=vendorHomePage.php?shopName='.$shopName);
    } else {
        $message[] = "Wrong username/password combination, please try again";

    }
}

echo "<h3 style='text-align: center; margin-top: 10px;'>" . implode(", ", $message) . "</h3>";

$_SESSION['message'] = $message;

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['username']);
    header('url=sellerLogInPage.html');

}
