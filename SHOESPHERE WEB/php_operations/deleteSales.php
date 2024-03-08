<?php
require_once('dbConnection.php');

$item_id = $_GET['item_id'];

$sql = "DELETE FROM ordertbl WHERE id = '$item_id'";
$query = mysqli_query($connection, $sql);

if ($query) {
    unset($item_id);
    header("location: ../salesInventory/sales.php");
} else {
    echo "Deleting Order from ordertbl was failed!!";
}
