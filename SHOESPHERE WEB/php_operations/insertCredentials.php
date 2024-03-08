<?php
require_once("dbConnection.php");
session_start();

// Default Image for the new user
$image = "avatars/men2.jpg";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Call Functions
    CheckAccount($name, $username, $email, $password, $image, $connection);
}

function CheckAccount($name, $username, $email, $password, $image, $connection)
{
    // You should only check for existing username or email, not the password
    $sql = "SELECT * FROM usertbl WHERE username = '$username' OR email = '$email'";
    $query = mysqli_query($connection, $sql);

    $exist = mysqli_num_rows($query);

    if ($exist > 0) {
        // If there's an account with the same username or email
        $_SESSION['register_error'] = "This account already exists!";
        header("location: ../register.php");
    } else {
        // If there's no account with the same username or email, proceed to insert data
        InsertData($name, $username, $email, $password, $image, $connection);

        // After We inserted successfully the user credentials we need to get the primary ID and name of the user to forward in main.php
        GetUserID($name, $username, $email, $password, $connection);
    }
}

function InsertData($name, $username, $email, $password, $image, $connection)
{
    $sql = "INSERT INTO usertbl(name, username, email, password, image) VALUES('$name', '$username', '$email', '$password', '$image')";
    $query = mysqli_query($connection, $sql);
}

function GetUserID($name, $username, $email, $password, $connection)
{
    $sql = "SELECT id,name FROM usertbl WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $getUserID = $row['id'];
        $getName = $row['name'];
    }

    // Clear all the data entered by the user
    unset($name);
    unset($username);
    unset($email);
    unset($password);

    header("location: ../main.php?user_id=$getUserID&name=$getName");
}
