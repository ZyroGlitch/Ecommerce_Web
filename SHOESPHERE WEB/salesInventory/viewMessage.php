<?php
require_once('../php_operations/dbConnection.php');

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$message = $_POST['message'];
$name = $_POST['name'];

$sql = "SELECT image FROM usertbl WHERE id = '$user_id'";
$query = mysqli_query($connection, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $image = $row['image'];

    $image = "../" . $image;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message Page</title>

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
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-5 col-md-5">
                <div class="card rounded shadow">
                    <div class="card-header bg-info">
                        <h2>Customer Concern</h2>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center align-content-center">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="<?php echo $image ?>" alt="goku img" class="rounded-circle object-fit-cover mb-3 me-3" style="width:60px;height:60px;">
                                    <span>
                                        <h4><?php echo $name ?></h4>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-start align-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div style="max-height:400px;overflow-y: auto;">
                                    <p><?php echo $message ?></p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p>July 29,2024</p>
                        </div>
                    </div>
                    <div class="card-footer row justify-content-evenly align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <form action="sendResponse.php" method="post">
                                <!-- Transfer the post value to viewMessage.php -->
                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                <input type="hidden" value="<?php echo $message ?>" name="message">
                                <input type="hidden" value="<?php echo $name ?>" name="name">

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-send-plus"></i> Reply</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="d-grid">
                                <a href="sales.php" class="btn btn-secondary"><i class="bi bi-hand-thumbs-up"></i> I Understand</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>