<?php
include 'database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$message = [];

if (isset($_POST['login_buyer']) && $_POST['login_buyer'] == 'Submit') {

    //Checking if user already exist in the database
    $user_check = "SELECT * FROM buyer WHERE email ='$email' and password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result)) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in successfully";
        $username = $user['username'];
        echo "<h1 style='text-align: center; margin-top: 10px;'>Welcome " . $username . "!</h1>";
        header('refresh:2; url=index.php?username=' . $username);
    } else {
        $message[] = "Wrong username/password combination, please try again";

    }
}

echo "<h3 style='text-align: center; margin-top: 10px;'>" . implode(", ", $message) . "</h3>";

$_SESSION['message'] = $message;

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['username']);
    header('url=userLogin.html');

}
