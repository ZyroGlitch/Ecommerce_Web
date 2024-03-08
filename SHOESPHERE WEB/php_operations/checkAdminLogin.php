<?php
require_once('dbConnection.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admintbl WHERE username='$username' AND password='$password'";
$query = mysqli_query($connection, $sql);

$exist = mysqli_num_rows($query);

if ($exist > 0) {
    unset($username);
    unset($password);

    header("location: ../salesInventory/adminLoaderScreen.php");
} else {
    $_SESSION['login_error'] = "Admin Login Failed!";
    header("location: ../salesInventory/adminLogin.php");
}
