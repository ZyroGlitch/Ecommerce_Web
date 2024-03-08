<?php
require_once("dbConnection.php");
session_start();

// Set the timezone to your desired location
date_default_timezone_set('Asia/Manila'); // Replace 'Asia/Manila' with your desired timezone

// Get the current date and time
$localDateTime = date('Y-m-d H:i:s');

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$response = $_POST['response'];

$sql = "INSERT INTO admin_responsetbl (user_id,response,date) VALUES(?,?,?)";
$stmt = mysqli_prepare($connection, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "sss", $user_id, $response, $localDateTime);

// Execute the statement
$query = mysqli_stmt_execute($stmt);

if ($query) {
    // It will delete the notification that already replied by the admin
    $sql = "DELETE FROM concerntbl WHERE id='$id'";
    $query = mysqli_query($connection, $sql);

    header("location: ../salesInventory/sales.php");
} else {
    echo "<h1>Admin Response Failed!!</h1>";
}
