<?php
// database details
$host = "localhost";
$user = "root";
$psword = "";
$dbname = "homemadefood1";

$conn = mysqli_connect($host, $user, $psword, $dbname);
if (mysqli_connect_errno()) {
    die("Failed to connect with Mysql: " . mysqli_connect_errno());
}
