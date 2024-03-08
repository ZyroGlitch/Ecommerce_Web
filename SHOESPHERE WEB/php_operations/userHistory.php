<?php
$search = "";

if (isset($_POST['select'])) {
    $selection = $_POST['selection'];
    header("location: ../salesInventory/user.php?select=$selection");
} else if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];

    header("location: ../salesInventory/user.php?search=$search");
}
