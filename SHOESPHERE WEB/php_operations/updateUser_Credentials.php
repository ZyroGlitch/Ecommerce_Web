<?php
require_once("dbConnection.php");

$userID = $_POST['userID'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];

$sql = "UPDATE usertbl SET name = '$name', username = '$username', email = '$email' WHERE id = '$userID'";
$query = mysqli_query($connection, $sql);

if ($query) {
    unset($name);
    unset($username);
    unset($email);
    header("location: ../salesInventory/user.php");
} else {
    echo "Update User Credentials Failed!";
}
