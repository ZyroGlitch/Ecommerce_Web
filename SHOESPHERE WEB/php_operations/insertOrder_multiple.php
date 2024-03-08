<?php
session_start();
require_once('dbConnection.php');


$datetime = $_GET['datetime'];
$name = $_GET['name'];

// Sets of array
$id = array();
$item_name = array();
$item_price = array();
$item_qty = array();
$subtotal = array();
$item_size = array();
$item_img = array();

// READ AND ASSIGN THE VALUES IN ARRAY
$sql = "SELECT * FROM cart_tbl";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $idDB = $row['user_id'];
    $item_nameDB  = $row['item_name'];
    $item_priceDB  = $row['item_price'];
    $item_qtyDB  = $row['item_qty'];
    $subtotalDB = $row['subtotal'];
    $item_sizeDB  = $row['item_size'];
    $item_imgDB  = $row['item_img'];


    array_push($id, $idDB);
    array_push($item_name, $item_nameDB);
    array_push($item_price, $item_priceDB);
    array_push($item_qty, $item_qtyDB);
    array_push($subtotal, $subtotalDB);
    array_push($item_size, $item_sizeDB);
    array_push($item_img, $item_imgDB);
}


// INSERT ALL IN DATABASE
for ($i = 0; $i < count($id); $i++) {
    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO ordertbl (user_id, item_name, item_price, item_qty, subtotal, item_size, item_img, date_purchased) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($connection, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssss", $id[$i], $item_name[$i], $item_price[$i], $item_qty[$i], $subtotal[$i], $item_size[$i], $item_img[$i], $datetime);

    // Execute the statement
    $query = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if ($query) {
        //DELETE ALL DATA FROM cart_tbl
        $sql = "DELETE FROM cart_tbl";
        $query = mysqli_query($connection, $sql);

        $_SESSION['cart_added'] = "Insert all successfully.";
        header("location: ../cart.php?user_id=$idDB&name=$name");
    } else {
        // Handle the error (you might want to log the error or show an error message)
        echo "Error: " . mysqli_error($connection);
    }
}
