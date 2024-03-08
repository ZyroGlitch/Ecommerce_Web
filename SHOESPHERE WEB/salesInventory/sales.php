<?php
session_start();
require_once('../php_operations/dbConnection.php');

// Select Menu in Purchase History
$selection = "";
if (isset($_GET['select'])) {
    $selection = $_GET['select'];
} else {
    $selection = "Default";
}

// Count the number of user concerns forward to the admin
$totalConcern = 0;
$sql = "SELECT COUNT(id) AS 'totalConcern' FROM concerntbl";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $totalConcern = $row['totalConcern'];
}

$search = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Inventory Page</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- SweetJsAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        body {
            background-color: #070F2B;
        }
    </style>
</head>

<body>
    <section class="h-100">
        <nav class="navbar navbar-light navbar-expand-lg" style="background-color:#1B1A55;">
            <div class="container-fluid px-4">
                <div class="d-flex justify-content-between align-items-center text-light">
                    <div class="text-center">
                        <img src="../images/brand.png" alt="brand image" class="navbar-brand" style="width:40px;">
                    </div>
                    <h5 class="navbar-brand fs-3" style="color:#9290C3;">ShoeSphere</h5>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <div class="me-5">
                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#notification" class="nav-link position-relative fs-5 fw-bold" style="color:#9290C3;"><i class="bi bi-bell-fill"></i> <span class="position-absolute top-0 start-100 translate-middle badge fw-bold" style="color:#9290C3;"> +<?php echo $totalConcern ?> <span class="visually-hidden fw-bold">unread messages</span></span></button>
                    </div>
                    <a href="../login.php" type="button" class="fw-bold fs-5" style="color:#9290C3; text-decoration:none;"><i class="bi bi-cart4"></i> Shop Now</a>
                </div>
            </div>
        </nav>

        <!-- NOTIFICATION OFFCANVAS -->
        <div class="offcanvas offcanvas-end text-bg-light" data-bs-scroll="true" id="notification">
            <div class="offcanvas-header bg-primary text-light border-bottom border-2">
                <h2>Notification</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <table class="table table-hover">
                    <thead>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM concerntbl";
                        $query = mysqli_query($connection, $sql);

                        while ($row = mysqli_fetch_assoc($query)) {
                            $id = $row['id'];
                            $user_id = $row['user_id'];
                            $message = $row['message'];

                            // Check if the user_id get from concerntbl and use that user_id to get the name at usertbl
                            $sql1 = "SELECT * FROM usertbl WHERE id='$user_id'";
                            $query1 = mysqli_query($connection, $sql1);

                            while ($row1 = mysqli_fetch_assoc($query1)) {
                                $name = $row1['name'];
                                $image = $row1['image'];

                                $image = "../" . $image;
                        ?>
                                <form action="viewMessage.php" method="post">
                                    <!-- Transfer the post value to viewMessage.php -->
                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="<?php echo $message ?>" name="message">
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <tr>
                                        <td class="d-flex justify-content-between align-items-center">
                                            <img src="<?php echo $image ?>" alt="goku img" class="rounded-circle object-fit-cover" style="width:60px;height:60px;">
                                            <p class="text-start">Message From <?php echo $name ?>.</p>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-eye-fill"></i> View
                                            </button>
                                        </td>
                                    </tr>

                                </form>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-fluid py-5">
            <div class="row justify-content-between align-items-center mt-2 mb-4">
                <div class="col-lg-4 col-md-4">
                    <form action="../php_operations/salesHistory.php" method="post">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-7 col-md-9">
                                <div class="d-grid">
                                    <select class="form-select" name="selection">
                                        <?php
                                        $sql = "SELECT * FROM selection";
                                        $query = mysqli_query($connection, $sql);

                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $description = $row['description'];
                                            $value = $row['value'];

                                        ?>
                                            <option value="<?php echo $value ?>" <?php if ($selection == $value) echo 'selected'; ?>> <?php echo $description ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="d-grid">
                                    <button type="submit" class="btn fw-bold text-light" name="select" style="background-color:#535C91 ;"><i class="bi bi-search"></i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4">
                    <form action="../php_operations/salesHistory.php" method="post">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-9 col-md-9">
                                <div class="d-grid">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="d-grid">
                                    <button type="submit" class="btn fw-bold text-light" name="searchbtn" style="background-color:#535C91 ;"><i class="bi bi-search"></i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4" style="padding-left: 58px;">
                    <a href="../generatedPDF/generateSalesReport.php?user_id=<?php echo $user_id ?>&name=<?php echo $name ?>" class="btn text-light fw-bold" target="_blank" style="background-color:#535C91 ;"><i class="bi bi-printer"></i> Generate Sales Report</a>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-12 rounded">
                    <div class="card shadow">
                        <div class="card-header bg-light">
                            <h2><i class="bi bi-calendar-check"></i> Sales Report</h2>
                        </div>
                        <div class="card-body">
                            <div style="max-height:380px;overflow-y: auto;">
                                <table class="table table-hover text-center">
                                    <thead class="table-dark">
                                        <th>ID</th>
                                        <th>PRODUCT DETAIL</th>
                                        <th>PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>SUBTOTAL</th>
                                        <th>SIZE</th>
                                        <th>DATE PURCHASED</th>
                                        <th>ACTION</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Get the search value in salesHistory
                                        if (isset($_GET['search'])) {
                                            $search = $_GET['search'];
                                            Search($connection, $search);
                                        } else {
                                            switch ($selection) {
                                                case "Default":
                                                    DefaultOrder($connection);
                                                    break;
                                                case "Ascending":
                                                    AscendingOrder($connection);
                                                    break;
                                                case "Descending":
                                                    DescendingOrder($connection);
                                                    break;
                                                case "Adidas":
                                                    Adidas($connection);
                                                    break;
                                                case "Nike":
                                                    Nike($connection);
                                                    break;
                                                case "KD":
                                                    KD($connection);
                                                    break;
                                                default:
                                                    DefaultOrder($connection);
                                            }
                                        }

                                        function DefaultOrder($connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl";
                                            $query = mysqli_query($connection, $sql);

                                            $total = 0;
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_img = $row['item_img'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                                // Add some changes to the location of images folder
                                                $item_img = "../" . $item_img;

                                        ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                            <p><?php echo $item_name; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>

                                                    <td>
                                                        <div class="row justify-content-evenly align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <!-- Confirmation Modal for deleting user credentials -->
                                                <div class="modal fade" id="deleteValidation_Modal" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this shoes in your cart?</p>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="../php_operations/deleteSales.php?item_id=<?php echo $id ?>" class="btn btn-danger">Yes, I want</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="sales.php" class="btn btn-secondary">I don't want</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }

                                        function AscendingOrder($connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl ORDER BY item_name ASC";
                                            $query = mysqli_query($connection, $sql);

                                            $total = 0;
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_img = $row['item_img'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                                // Add some changes to the location of images folder
                                                $item_img = "../" . $item_img;

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                            <p><?php echo $item_name; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>

                                                    <td>
                                                        <div class="row justify-content-evenly align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Confirmation Modal for deleting user credentials -->
                                                <div class="modal fade" id="deleteValidation_Modal" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this shoes in your cart?</p>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="../php_operations/deleteSales.php?item_id=<?php echo $id ?>" class="btn btn-danger">Yes, I want</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="sales.php" class="btn btn-secondary">I don't want</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }

                                        function DescendingOrder($connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl ORDER BY item_name DESC";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_img = $row['item_img'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                                // Add some changes to the location of images folder
                                                $item_img = "../" . $item_img;

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                            <p><?php echo $item_name; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>

                                                    <td>
                                                        <div class="row justify-content-evenly align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Confirmation Modal for deleting user credentials -->
                                                <div class="modal fade" id="deleteValidation_Modal" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this shoes in your cart?</p>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="../php_operations/deleteSales.php?item_id=<?php echo $id ?>" class="btn btn-danger">Yes, I want</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="sales.php" class="btn btn-secondary">I don't want</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }

                                        function Adidas($connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl WHERE item_name LIKE 'Adidas%'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_img = $row['item_img'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                                // Add some changes to the location of images folder
                                                $item_img = "../" . $item_img;

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                            <p><?php echo $item_name; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>

                                                    <td>
                                                        <div class="row justify-content-evenly align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Confirmation Modal for deleting user credentials -->
                                                <div class="modal fade" id="deleteValidation_Modal" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this shoes in your cart?</p>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="../php_operations/deleteSales.php?item_id=<?php echo $id ?>" class="btn btn-danger">Yes, I want</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="sales.php" class="btn btn-secondary">I don't want</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }

                                        function Nike($connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl WHERE item_name LIKE 'Nike%'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_img = $row['item_img'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                                // Add some changes to the location of images folder
                                                $item_img = "../" . $item_img;

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                            <p><?php echo $item_name; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>

                                                    <td>
                                                        <div class="row justify-content-evenly align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                        function KD($connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl WHERE item_name LIKE 'KD%'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_img = $row['item_img'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                                // Add some changes to the location of images folder
                                                $item_img = "../" . $item_img;
                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start align-items-center">
                                                            <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                            <p><?php echo $item_name; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>

                                                    <td>
                                                        <div class="row justify-content-evenly align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="d-grid">
                                                                    <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Confirmation Modal for deleting user credentials -->
                                                <div class="modal fade" id="deleteValidation_Modal" data-bs-backdrop="static">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this shoes in your cart?</p>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="../php_operations/deleteSales.php?item_id=<?php echo $id ?>" class="btn btn-danger">Yes, I want</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="sales.php" class="btn btn-secondary">I don't want</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }

                                        // Define the Search function
                                        function Search($connection, $search)
                                        {
                                            // Use a prepared statement to prevent SQL injection
                                            $sql = "SELECT * FROM ordertbl WHERE item_name LIKE ?";

                                            // Prepare the statement
                                            $stmt = mysqli_prepare($connection, $sql);

                                            if ($stmt) {

                                                // Set the parameter value
                                                $searchParam = $search . '%';

                                                // Bind the parameter
                                                mysqli_stmt_bind_param($stmt, "s", $searchParam);



                                                // Execute the statement
                                                mysqli_stmt_execute($stmt);

                                                // Get the result set
                                                $result = mysqli_stmt_get_result($stmt);


                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $item_name = $row['item_name'];
                                                    $item_img = $row['item_img'];
                                                    $item_size = $row['item_size'];
                                                    $item_price = $row['item_price'];
                                                    $item_qty = $row['item_qty'];
                                                    $subtotal = $row['subtotal'];
                                                    $date_purchased = $row['date_purchased'];

                                                    // Add some changes to the location of images folder
                                                    $item_img = "../" . $item_img;

                                                ?>
                                                    <tr>
                                                        <td><?php echo $id ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-start align-items-center">
                                                                <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                                <p><?php echo $item_name; ?></p>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $item_size ?></td>
                                                        <td><?php echo $item_price ?></td>
                                                        <td><?php echo $item_qty ?></td>
                                                        <td><?php echo $subtotal ?></td>
                                                        <td><?php echo $date_purchased ?></td>

                                                        <td>
                                                            <div class="row justify-content-evenly align-items-center">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="d-grid">
                                                                        <a href="salesUpdate.php?item_id=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Update</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="d-grid">
                                                                        <button data-bs-toggle="modal" data-bs-target="#deleteValidation_Modal" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Confirmation Modal for deleting user credentials -->
                                                    <div class="modal fade" id="deleteValidation_Modal" data-bs-backdrop="static">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this shoes in your cart?</p>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                    <div class="col-lg-5 col-md-6">
                                                                        <div class="d-grid">
                                                                            <a href="../php_operations/deleteSales.php?item_id=<?php echo $id ?>" class="btn btn-danger">Yes, I want</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-6">
                                                                        <div class="d-grid">
                                                                            <a href="sales.php" class="btn btn-secondary">I don't want</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                        <?php
                                                }

                                                // Close the statement
                                                mysqli_stmt_close($stmt);
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer py-3">
                            <div class="row justify-content-evenly align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="d-grid">
                                                <a href="../index.php" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Go back to Landing Page</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6">
                                            <div class="d-grid">
                                                <a href="user.php" class="btn btn-success"><i class="bi bi-person-check-fill"></i> List of Users</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_SESSION['salesUpdate'])) {
        echo "<script> document.addEventListener('DOMContentLoaded', function() {
                 Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'The sales item ID #" . $_SESSION['salesUpdate'] . " has been updated.',
                    showConfirmButton: false,
                    timer: 2000
                });
            });</script>";
        // Unset the session variable to prevent showing the alert on subsequent page loads
        unset($_SESSION['salesUpdate']);
    }
    ?>
    <script>
        console.log("asdasdasdasd   ")
    </script>
</body>

</html>