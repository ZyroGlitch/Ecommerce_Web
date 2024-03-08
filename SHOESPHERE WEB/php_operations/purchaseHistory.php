<?php
$search = "";

if (isset($_POST['select'])) {
    $selection = $_POST['selection'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];

    header("location: ../cart.php?select=$selection&user_id=$user_id&name=$name");
} else if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];

    header("location: ../cart.php?user_id=$user_id&name=$name&search=$search");
}
