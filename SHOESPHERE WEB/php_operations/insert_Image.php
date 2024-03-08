<?php
require_once('dbConnection.php');

$name = $_GET['name'];
$user_id = $_GET['user_id'];
$image = $_GET['image'];

$sql = "UPDATE usertbl SET image = '$image' WHERE id = '$user_id'";
$query = mysqli_query($connection, $sql);

if ($query) {
    unset($image);
    header("location: ../profile.php?user_id=$user_id&name=$name");
} else {
    echo "Updating your image is failed!!";
}
