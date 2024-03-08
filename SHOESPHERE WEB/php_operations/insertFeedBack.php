<?php
require_once('dbConnection.php');
session_start();

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO userfeedback (user_id, name, email, message) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "isss", $user_id, $name, $email, $message);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['successFeedback'] = "Successful Feedback";
        header("location: ../contact.php?name=$name&user_id=$user_id");
    } else {
        echo "Sending Feedback Failed!";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error in preparing statement.";
}
