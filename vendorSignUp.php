<?php
include 'database.php';

$shopName = $_POST['shopName'];
$description = $_POST['description'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

$message = [];

if (isset($_POST['signup_vendor']) && $_POST['signup_vendor'] == 'Submit') {

    //Checking if user already exist in the database
    $vendor_check = "SELECT * FROM vendors WHERE shopName ='$shopName' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $vendor_check);
    $vendor = mysqli_fetch_assoc($result);

    if (empty($shopName) || empty($description) || empty($email) || empty($phone) || empty($password_1) || empty($password_2)) {
        $message[] = "Please fill in all fields";
    } else if ($vendor) {
        if ($vendor['shopName'] === $shopName) {
            $message[] = "This shop name already exists, please go back and register a new one";
        }
        if ($vendor['email'] === $email) {
            $message[] = "email already exists, please go back and register a new one";
        }
    } else if ($password_1 != $password_2) {
        $message[] = "Please enter the same password";
    }

}

echo "<h3 style='text-align: center; margin-top: 10px;'>" . implode(", ", $message) . "</h3></br>";

if (count($message) == 0) {
    $sql = "INSERT INTO vendors (shopName, description, email, phone, password) VALUES
  ('$shopName', '$description','$email', '$phone', '$password_1')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>Registration Successful!</h3>
        <p>Will direct you to your home page momentarily</p>";
        header('refresh: 2; url=vendorHomePage.php?shopName='.$shopName);
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);

} else {
    echo "<p style='text-align:center;'>Will redirect you back momentarily</p>";
    header('refresh: 2; url=vendorSignUp.html');
}
