<?php
require_once('dbConnection.php');
session_start();

$user_id = $_POST['user_id'];
$name = $_POST['name'];

$username = $_POST['username'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO concerntbl (user_id, username, email, message) VALUES(?,?,?,?)";
$stmt = mysqli_prepare($connection, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssss", $user_id, $username, $email, $message);

// Execute the statement
$query = mysqli_stmt_execute($stmt);

if ($query = 1) {
    unset($username);
    unset($email);
    unset($message);

    $_SESSION['successConcern'] = "Successful Inserted";
    header("location: ../contact.php?user_id=$user_id&name=$name");
} else {
    echo "<h1>Sending concern failed!!</h1>";
}
