<?php
require_once('dbConnection.php');

$user_id = $_GET['user_id'];

// Call all the functions
GetUserTable($user_id, $connection);
DeleteUser($user_id, $connection);

GetUserConcern($user_id, $connection);
DeleteUserConcern($user_id, $connection);

GetUserOrder($user_id, $connection);



// Function for getting the user credentials and transfer to archives
function GetUserTable($user_id, $connection)
{
    $sql = "SELECT * FROM usertbl WHERE id = '$user_id'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        $name = $row['name'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $image = $row['image'];


        // Transfer all the user credentials to userArchives
        // Use prepared statements to prevent SQL injection
        $sql1 = "INSERT INTO usersarchive (user_id, name, username, email, password, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql1);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $username, $email, $password, $image);

        // Execute the statement
        $query1 = mysqli_stmt_execute($stmt);

        if ($query1) {
            unset($name);
            unset($username);
            unset($email);
            unset($password);
            unset($image);
        } else {
            echo "Transferring the user credentials failed!";
        }
    }
}

// Delete the user credentials once it transferred successfuly all the data.
function DeleteUser($user_id, $connection)
{
    $sql = "DELETE FROM usertbl WHERE id = '$user_id'";
    $query = mysqli_query($connection, $sql);

    if ($query) {
    } else {
        echo "Deleting user record using ID failed!!";
    }
}

function GetUserConcern($user_id, $connection)
{
    $sql = "SELECT * FROM concerntbl WHERE user_id = '$user_id'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $message = $row['message'];


        $sql1 = "INSERT INTO concernarchive (user_id, username, email, message) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql1);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $user_id, $username, $email, $message);

        // Execute the statement
        $query1 = mysqli_stmt_execute($stmt);

        // Check if the query was successful
        if ($query1) {
            // Clear all the data transfer in the user archives
            unset($username);
            unset($email);
            unset($message);
        } else {
            // Handle the error (you might want to log the error or show an error message)
            echo "Transferring the user concerns failed!";
        }
    }
}

// Delete the user concern once it transferred successfuly all the data.
function DeleteUserConcern($user_id, $connection)
{
    $sql = "DELETE FROM concerntbl WHERE user_id = '$user_id'";
    $query = mysqli_query($connection, $sql);

    if ($query) {
    } else {
        echo "Deleting user concerns using ID failed!!";
    }
}

// Get and transfer the user orders into our order archives
function GetUserOrder($user_id, $connection)
{
    $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        $user_id = $row['user_id'];
        $item_name = $row['item_name'];
        $item_price = $row['item_price'];
        $item_qty = $row['item_qty'];
        $subtotal = $row['subtotal'];
        $item_size = $row['item_size'];
        $item_img = $row['item_img'];
        $date_purchased = $row['date_purchased'];


        $sql1 = "INSERT INTO orderarchive (item_id, user_id, item_name, item_price, item_qty, subtotal, item_size, item_img, date_purchased) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql1);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssssss", $id, $user_id, $item_name, $item_price, $item_qty, $subtotal, $item_size, $item_img, $date_purchased);

        // Execute the statement
        $query1 = mysqli_stmt_execute($stmt);

        // Check if the query was successful
        if ($query1) {
            header("location: ../salesInventory/user.php");
        } else {
            // Handle the error (you might want to log the error or show an error message)
            echo "Transferring the user orders failed!";
        }
    }
}
