<?php
require_once('../php_operations/dbConnection.php');

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM usertbl WHERE id = '$user_id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $image = $row['image'];

    //Apply some changes to the image file directory
    $image = "../" . $image;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Update</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #070F2B;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-lg">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-5 mt-5">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <form action="../php_operations/updateUser_Credentials.php" method="post">
                            <!-- Transfer post values in updateUser_Credentials php operations -->
                            <input type="hidden" value="<?php echo $user_id ?>" name="userID">

                            <div class="text-start">
                                <a href="user.php" class="text-dark fs-2" style="text-decoration:none;"><i class="bi bi-box-arrow-left"></i></a>
                            </div>


                            <div class="text-center">
                                <img src="<?php echo $image ?>" class="border rounded-circle object-fit-cover" style="width:140px; height:140px;">
                            </div>

                            <label for="name" class="form-label">Name:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" placeholder="e.g. John" id="name" value="<?php echo $name ?>" required name="name">
                            </div>

                            <label for="username" class="form-label">Username:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" placeholder="e.g. Skylark" id="username" value="<?php echo $username ?>" required name="username">
                            </div>

                            <label for="email" class="form-label">Email:</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="email" class="form-control" placeholder="e.g. John@gmail.com" id="email" value="<?php echo $email ?>" required name="email">
                            </div>

                            <div class="row justify-content-evenly align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Update</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="d-grid">
                                        <button type="reset" class="btn btn-secondary"><i class="bi bi-x-lg"></i> Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>