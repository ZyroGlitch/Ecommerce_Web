<?php
$search = "";


if (isset($_POST['select'])) {
    $selection = $_POST['selection'];
    header("location: ../salesInventory/sales.php?select=$selection");
} else if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];

    header("location: ../salesInventory/sales.php?search=$search");
}
