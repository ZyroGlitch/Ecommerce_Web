<?php
require_once("dbConnection.php");
session_start();

// Set the timezone to your desired location
date_default_timezone_set('Asia/Manila'); // Replace 'Asia/Manila' with your desired timezone

// Get the current date and time
$localDateTime = date('Y-m-d H:i:s');

$name = $_POST['name'];

$user_id = $_POST['user_id'];
$item_name = $_POST['hoopsName'];
$item_price = $_POST['hoopsPrice'];
$item_qty = $_POST['itemqty'];
$item_size = $_POST['item_size'];
$item_img = $_POST['hoopsImg'];

//Multiply the price to his quantity
$subtotal = $item_price * $item_qty;


// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO ordertbl (user_id, item_name, item_price, item_qty, subtotal, item_size, item_img, date_purchased) VALUES (?, ?, ?, ?, ?, ?,?,?)";
$stmt = mysqli_prepare($connection, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssssssss", $user_id, $item_name, $item_price, $item_qty, $subtotal, $item_size, $item_img, $localDateTime);

// Execute the statement
$query = mysqli_stmt_execute($stmt);

// Check if the query was successful
if ($query) {
    // Clear all the data entered by the user
    unset($item_name);
    unset($item_price);
    unset($item_qty);
    unset($item_size);
    unset($item_img);
    unset($subtotal);
    unset($localDateTime);

    $_SESSION['purchaseSuccess'] = "Purcase Successfully";
    header("location: ../main.php?user_id=$user_id&name=$name");
} else {
    // Handle the error (you might want to log the error or show an error message)
    echo "Error: " . mysqli_error($connection);
}
