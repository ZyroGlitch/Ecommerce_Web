<?php
session_start();
require_once('dbConnection.php');

$username = $_POST['username'];
$email = $_POST['email'];
$newPassword = $_POST['newPassword'];

$sql = "SELECT username,email FROM usertbl WHERE username='$username' AND email='$email'";
$query = mysqli_query($connection, $sql);

$exist = mysqli_num_rows($query);

if ($exist > 0) {
    // Update the password in usertbl 
    UpdatePassword($username, $email, $newPassword, $connection);

    unset($username);
    unset($email);
    unset($newPassword);

    $_SESSION['updateSuccessful'] = "Update successful";
    header("location: ../login.php");
} else {
    $_SESSION['updatePass_error'] = "Account doesn't exist!";
    header("location: ../login.php");
}

function UpdatePassword($username, $email, $newPassword, $connection)
{
    $sql = "UPDATE usertbl SET password='$newPassword' WHERE username='$username' AND email='$email'";
    $query = mysqli_query($connection, $sql);
}
