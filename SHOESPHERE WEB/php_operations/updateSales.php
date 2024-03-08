<?php
session_start();
require_once('dbConnection.php');

$item_id = $_POST['item_id'];
$new_itemQty = $_POST['new_itemQty'];
$item_size = $_POST['item_size'];
$item_price = $_POST['item_price'];

//Calculate the subtotal
$subtotal = $item_price * $new_itemQty;


$sql = "UPDATE ordertbl SET item_qty = '$new_itemQty', subtotal = '$subtotal', item_size = '$item_size' WHERE id = '$item_id'";
$query = mysqli_query($connection, $sql);

if ($query) {
    unset($new_itemQty);
    unset($item_size);
    unset($item_price);
    unset($subtotal);

    $_SESSION['salesUpdate'] = $item_id;
    header("location: ../salesInventory/sales.php");
} else {
    echo "Deleting Order from ordertbl was failed!!";
}
