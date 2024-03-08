<?php
require_once('dbConnection.php');
session_start();

$item_id = $_GET['id'];
$name = $_GET['name'];
$user_id = $_GET['user_id'];

$sql = "DELETE FROM cart_tbl WHERE id = '$item_id'";
$query = mysqli_query($connection, $sql);

if ($query = 1) {
    unset($item_id);

    $_SESSION['deleteItem'] = "Deleting an item to cart";
    header("location: ../cart.php?name=$name&user_id=$user_id");
} else {
    echo "Error Found at your deleteOrder.php";
}
