<?php
include 'database.php';

$shopName = $_GET['shopName'];
$prodName = $_POST['prodName'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];

$message = [];

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

if (isset($_POST['upload_product'])) {
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insert = $conn->query("INSERT into product (prodName, image , uploadDate,  description, category, price, vendor)
            VALUES ('$prodName','$fileName', NOW(), '$description', '$category', '$price', '$shopName')");
            if ($insert) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully. This page will redirect you to your home page shortly";
                header('refresh: 5; url=vendorHomePage.php?shopName=' . $shopName);

            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
