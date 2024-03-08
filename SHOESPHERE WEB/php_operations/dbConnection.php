<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "ecommerce_shoesphereweb";

$connection = mysqli_connect($servername, $username, $password, $databasename);

if (!$connection) {
    die("Can't connect to the databasenae " . mysqli_connect_error());
}

// echo "Successfully connected to the database: " . $databasename . "</br>";
