<?php
require_once("dbConnection.php");
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['errors'];

    //Check if the username and password exist in our database
    $sql = "SELECT * FROM usertbl WHERE username='$username' AND password='$password'";
    $query = mysqli_query($connection, $sql);
    $exist = mysqli_num_rows($query);

    //We need to get the userID to transfer in our main.php
    $sql1 = "SELECT * FROM usertbl WHERE username='$username' AND password='$password'";
    $query1 = mysqli_query($connection, $sql1);

    while ($row = mysqli_fetch_assoc($query1)) {
        $user_id = $row['id'];
        $name = $row['name'];
    }


    if ($exist > 0) {
        unset($username);
        unset($password);
        unset($_SESSION['login_error']);

        header("location: ../loaderScreen.php?user_id=$user_id&name=$name");
    } else {
        // Store an error message in the session if needed
        $_SESSION['login_error'] = "Incorrect Username and Password!!";
        header("location: ../login.php");
    }
}
