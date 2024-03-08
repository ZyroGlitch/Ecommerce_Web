<?php
require_once('php_operations/dbConnection.php');

$id = $_POST['id'];

$user_id = $_POST['user_id'];
$name = $_POST['name'];

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
            height: 100vh;
        }

        /* Mobile Size */
        @media screen and (max-width: 767px) {
            .margin-bottom-sm {
                margin: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-xlg-5 col-lg-5 col-md-8">
                <div class="card rounded shadow">
                    <div class="card-header bg-info">
                        <h2>Customer Concern</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        //Get the values under admin_responsetbl by using primary key id of admin 
                        //response to the specific user
                        $sql = "SELECT * FROM admin_responsetbl WHERE id = '$id'";
                        $query = mysqli_query($connection, $sql);

                        while ($row = mysqli_fetch_assoc($query)) {
                            $response = $row['response'];
                            $date = $row['date'];

                        ?>

                            <div class="row justify-content-center align-content-center">
                                <div class="col-lg-12 col-md-12 text-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="avatars/men5.jpg" alt="goku img" class="rounded-circle object-fit-cover mb-3 me-3" style="width:60px;height:60px;">
                                        <span>
                                            <h4>Admin</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-start align-content-center">
                                <div class="col-lg-12 col-md-12">
                                    <div style="max-height:400px;overflow-y: auto;">
                                        <p><?php echo $response ?></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <p><?php echo $date ?></p>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-footer row justify-content-evenly align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <div class="d-grid">
                                <a href="main.php?user_id=<?php echo $user_id ?>&name=<?php echo $name ?>" class="btn btn-primary"><i class="bi bi-hand-thumbs-up-fill"></i> I understand</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 margin-bottom-sm">
                            <div class="d-grid">
                                <a href="php_operations/deleteAdminResponse.php?id=<?php echo $id ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>