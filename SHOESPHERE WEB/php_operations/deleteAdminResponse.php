<?php
require_once('dbConnection.php');

$id = $_GET['id'];
$user_id = $_GET['user_id'];
$name = $_GET['name'];

$sql = "DELETE FROM admin_responsetbl WHERE id = '$id'";
$query = mysqli_query($connection, $sql);

if ($query) {
    unset($id);
    header("location: ../main.php?user_id=$user_id&name=$name");
} else {
    echo "Deleting admin response failed!!";
}
