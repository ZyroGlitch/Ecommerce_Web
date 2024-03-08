<?php
require_once('dbConnection.php');

// Values that need to transfer back to cart.php
$name = $_POST['name'];
$user_id = $_POST['user_id'];

$item_id = $_POST['item_id'];
$item_price = $_POST['item_price'];
$new_itemQty = $_POST['new_itemQty'];
$item_size = $_POST['item_size'];


// Set the latest subtotal
$subtotal = $item_price * $new_itemQty;

$sql = "UPDATE cart_tbl SET item_qty='$new_itemQty', subtotal='$subtotal', item_size='$item_size' WHERE id='$item_id'";
$query = mysqli_query($connection, $sql);

if ($query = 1) {
    unset($item_id);
    unset($item_price);
    unset($new_itemQty);
    unset($item_size);

    header("location: ../cart.php?name=$name&user_id=$user_id");
} else {
    echo "<h1>Update Failed!!</h1>";
}
