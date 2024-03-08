<?php
session_start();
require_once("php_operations/dbConnection.php");

$user_id = $_GET['user_id'];
$name = $_GET['name'];

$_SESSION['count'] = 0;
$totalPrice = 0;

// Select Menu in Purchase History
$selection = "";
if (isset($_GET['select'])) {
    $selection = $_GET['select'];
} else {
    $selection = "Default";
}

// Set the timezone to your desired location
date_default_timezone_set('Asia/Manila'); // Replace 'Asia/Manila' with your desired timezone

// Get the current date and time
$localDateTime = date('Y-m-d H:i:s');

// Getting the updated image of user
$sql = "SELECT image FROM usertbl WHERE id = '$user_id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $image = $row['image'];
}


$search = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart Page</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- SweetJsAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #070F2B;
        }

        .nav-link {
            color: #9290C3;
        }



        /* Mobile Size */
        @media screen and (max-width: 767px) {
            .margin-container-sm {
                margin-bottom: 48px;
            }

            .margin-col-sm {
                margin-bottom: 24px;
            }

            .margin-button-sm {
                margin-bottom: 12px;
            }

            .vh-100 {
                height: 100% !important;
            }

            #sm-marginXY {
                margin: 60px 25px;
            }

            #sm-paddingX {
                padding: 0px 25px;
            }

            select,
            #search-marginBottom {
                margin-bottom: 15px;
            }

            #sm-marginReceipt {
                margin-bottom: 30px;
                margin-top: 40px;
                text-align: center;
            }

            #sm-marginTop {
                margin-top: 30px;
            }

        }
    </style>
</head>

<body>
    <section class="vh-100">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#1B1A55;">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center text-light">
                    <div class="text-center">
                        <img src="images/brand.png" alt="brand image" class="navbar-brand" style="width:40px;">
                    </div>
                    <h5 class="navbar-brand fs-3" style="color:#9290C3;">ShoeSphere</h5>
                </div>

                <div>
                    <a class="nav-link fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"> <i class="bi bi-menu-button-wide fs-2" style="color:#9290C3;"> <b>Menu</b></i> <i class="fas fa-cart-flatbed fa-xl" style="color:#9290C3;"></i></a>
                </div>
            </div>
        </nav>

        <!-- MENU OFFCANVAS -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="demo" style="background-color: #070F2B;">
            <div class="offcanvas-header border-bottom border-2" style="background-color: #1B1A55 ;">
                <div class="d-flex justify-content-start align-items center">
                    <img src="<?= isset($image) ? $image : 'avatars/men2.jpg' ?>" alt="goku img" class="rounded-circle shadow object-fit-cover" style="width:60px;height:60px;">
                    <h4 class="ms-3 mt-3" style="color:#9290C3;"><?php echo $name; ?></h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: #9290C3;"></button>
            </div>

            <div class="offcanvas-body">
                <!-- A grey horizontal navbar that becomes vertical on small screens -->
                <nav class="navbar navbar-dark" style="background-color: #070F2B;">

                    <div class="container-fluid">
                        <!-- Links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link fs-4" href="main.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-houses-fill"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <div class="btn-group dropend">
                                    <a type="button" href="main.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>" class="nav-link fs-4 me-2"><i class="bi bi-bag-heart-fill"></i> Product</a>
                                    <a type="button" class="nav-link fs-4 dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item fs-5" href="#adidas"><i class="bi bi-arrow-right-circle-fill"></i> Adidas</a></li>
                                        <li><a class="dropdown-item fs-5" href="#Nike"><i class="bi bi-arrow-right-circle-fill"></i> Nike</a></li>
                                        <li><a class="dropdown-item fs-5" href="#KD"><i class="bi bi-arrow-right-circle-fill"></i> KD</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-4" href="cart.php?user_id=<?php echo $user_id ?>&name=<?php echo $name ?>"><i class="bi bi-cart-check-fill"></i> Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-4" href="profile.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-person-fill"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-4" href="about.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-info-square-fill"></i> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-4" href="contact.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-telephone-fill"></i> Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-4" href="login.php"><i class="bi bi-door-open-fill"></i> Signout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container-fluid mt-4 margin-container-sm">
            <div id="sm-marginXY" class="row justify-content-evenly align-content-center">
                <div class="col-lg-8 col-md-12 rounded shadow p-4 bg-light margin-col-sm">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <h3>Shopping Cart</h3>
                    </div>

                    <div style="max-height:380px;overflow-y: auto;">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>PRODUCT DETAILS</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>SUBTOTAL</th>
                                    <th>SIZE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM cart_tbl WHERE user_id='$user_id'";
                                $query = mysqli_query($connection, $sql);

                                while ($row = mysqli_fetch_assoc($query)) {
                                    $id = $row['id'];
                                    $item_name = $row['item_name'];
                                    $item_price = $row['item_price'];
                                    $item_qty = $row['item_qty'];
                                    $subtotal = $row['subtotal'];
                                    $item_size = $row['item_size'];
                                    $item_img = $row['item_img'];

                                    $_SESSION['count']++;
                                    $totalPrice += $subtotal;

                                    // Unique modal ID for each row
                                    $modal_id = 'deleteValidation_Modal_' . $id;
                                ?>

                                    <tr class="text-center">
                                        <td>
                                            <h5><?php echo $id; ?></h5>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <img src="<?php echo $item_img; ?>" alt="goku img" class="me-3" style="max-width:70px;height:50px;">
                                                <p><?php echo $item_name; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            ₱<?php echo $item_price; ?>
                                        </td>
                                        <td>
                                            <?php echo $item_qty; ?>
                                        </td>
                                        <td>
                                            ₱<?php echo $subtotal ?>
                                        </td>
                                        <td>
                                            <?php echo $item_size; ?>
                                        </td>
                                        <td>
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-lg-5 col-md-5 margin-button-sm">
                                                    <div class="d-grid">
                                                        <button data-bs-toggle="modal" data-bs-target="#<?php echo $modal_id; ?>" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash3-fill"></i> Remove
                                                        </button>

                                                        <!-- Confirmation Modal for deleting cart item -->
                                                        <div class="modal fade" id="<?php echo $modal_id; ?>" data-bs-backdrop="static">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5">User Action Confirmation</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-start">Are you sure you want to delete item id #<?php echo $id ?>?</p>
                                                                    </div>
                                                                    <div class="modal-footer d-flex justify-content-evenly align-items-center">
                                                                        <div class="col-lg-5 col-md-6">
                                                                            <div class="d-grid">
                                                                                <a href="php_operations/deleteOrder.php?id=<?php echo $id ?>&name=<?php echo $name ?>&user_id=<?php echo $user_id ?>" class="btn btn-danger">Yes, I want</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-5 col-md-6">
                                                                            <div class="d-grid">
                                                                                <a href="cart.php?id=<?php echo $id ?>&name=<?php echo $name ?>&user_id=<?php echo $user_id ?>" class="btn btn-secondary">I don't want</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="d-grid">
                                                        <a href="orderUpdate.php?id=<?php echo $id ?>&name=<?php echo $name ?>&user_id=<?php echo $user_id ?>" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-fill"></i> Update
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>



                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 bg-light rounded shadow p-4">
                    <div class="border-bottom mb-3">
                        <h3>Order Summary</h3>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5><?php echo $_SESSION['count']; ?> ITEMS</h5>
                        <h5>₱<?php echo $totalPrice; ?></h5>
                    </div>

                    <div class="mb-4">
                        <h5>Do you have any discount code?</h5>
                        <p class="text-muted">Only one discount code per order can be applied.</p>

                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-8 col-md-8 margin-col-sm">
                                <div class="d-grid">
                                    <input id="discount" type="text" class="form-control" placeholder="Your code here" name="discountCode">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="d-grid">
                                    <button class="btn btn-danger" id="applybtn">APPLY</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6>SUBTOTAL: </h6>
                        <h6>₱<?php echo $totalPrice; ?></h6>
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-bottom mb-2">
                        <h6>DISCOUNT: </h6>
                        <h6 id="discountValue">None</h6>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6>TOTAL COST</h6>
                        <h6 id="totalCost">₱<?php echo $totalPrice; ?></h6>
                    </div>

                    <div class="d-grid">
                        <!-- Checkout Order-->
                        <a href="php_operations/insertOrder_multiple.php?datetime=<?php echo $localDateTime ?>&name=<?php echo $name ?>" class="btn btn-success">
                            <i class="bi bi-cart-check-fill"></i> CHECKOUT
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vh-100">
        <div id="sm-paddingX" class="container-fluid py-4">
            <h1 class="pb-3" style="color: #9290C3;">Purchase History</h1>
            <div class="row justify-content-between align-content-center mt-2 mb-4">
                <div class="col-lg-4 col-md-4">
                    <form action="php_operations/purchaseHistory.php" method="post">
                        <!-- post input hidden user_id and name -->
                        <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                        <input type="hidden" value="<?php echo $name ?>" name="name">

                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-9 col-md-9">
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
                                    <button type="submit" class="btn text-light fw-bold" name="select" style="background-color: #535C91 ;"><i class="bi bi-search"></i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4">
                    <form action="php_operations/purchaseHistory.php" method="post">
                        <!-- post input hidden user_id and name -->
                        <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                        <input type="hidden" value="<?php echo $name ?>" name="name">

                        <div id="sm-marginTop" class="row justify-content-center align-items-center">
                            <div id="search-marginBottom" class="col-lg-9 col-md-9">
                                <div class="d-grid">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn text-light fw-bold" name="searchbtn" style="background-color: #535C91 ;"><i class="bi bi-search"></i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="sm-marginReceipt" class="col-lg-3 col-md-4">
                    <a href="generatedPDF/checkOutReceipt.php?user_id=<?php echo $user_id ?>&name=<?php echo $name ?>" class="btn text-light fw-bold" target="_blank" style="background-color: #535C91 ;"><i class="bi bi-printer"></i> Print Order Fulfillment</a>
                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="card rounded shadow">
                        <div class="card-body">
                            <div style="max-height:380px;overflow-y: auto;">
                                <table class="table table-hover text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Get the search value in salesHistory
                                        if (isset($_GET['search'])) {
                                            $search = $_GET['search'];
                                            Search($user_id, $connection, $search);
                                        } else {
                                            switch ($selection) {
                                                case "Default":
                                                    DefaultOrder($user_id, $connection);
                                                    break;
                                                case "Ascending":
                                                    AscendingOrder($user_id, $connection);
                                                    break;
                                                case "Descending":
                                                    DescendingOrder($user_id, $connection);
                                                    break;
                                                case "Adidas":
                                                    Adidas($user_id, $connection);
                                                    break;
                                                case "Nike":
                                                    Nike($user_id, $connection);
                                                    break;
                                                case "KD":
                                                    KD($user_id, $connection);
                                                    break;
                                                default:
                                                    DefaultOrder($user_id, $connection);
                                            }
                                        }



                                        function DefaultOrder($user_id, $connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                        ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td class="text-start"><?php echo $item_name ?></td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                        function AscendingOrder($user_id, $connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id' ORDER BY item_name ASC";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td class="text-start"><?php echo $item_name ?></td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                        function DescendingOrder($user_id, $connection)
                                        {
                                            $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id' ORDER BY item_name DESC";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td class="text-start"><?php echo $item_name ?></td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                        function Adidas($user_id, $connection)
                                        {
                                            // Escape the user_id to prevent SQL injection
                                            $user_id = mysqli_real_escape_string($connection, $user_id);

                                            $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id' AND item_name LIKE 'Adidas%'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td class="text-start"><?php echo $item_name ?></td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                        function Nike($user_id, $connection)
                                        {
                                            // Escape the user_id to prevent SQL injection
                                            $user_id = mysqli_real_escape_string($connection, $user_id);

                                            $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id' AND item_name LIKE 'Nike%'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td class="text-start"><?php echo $item_name ?></td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }

                                        function KD($user_id, $connection)
                                        {
                                            // Escape the user_id to prevent SQL injection
                                            $user_id = mysqli_real_escape_string($connection, $user_id);

                                            $sql = "SELECT * FROM ordertbl WHERE user_id = '$user_id' AND item_name LIKE 'KD%'";
                                            $query = mysqli_query($connection, $sql);

                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_name'];
                                                $item_size = $row['item_size'];
                                                $item_price = $row['item_price'];
                                                $item_qty = $row['item_qty'];
                                                $subtotal = $row['subtotal'];
                                                $date_purchased = $row['date_purchased'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td class="text-start"><?php echo $item_name ?></td>
                                                    <td><?php echo $item_size ?></td>
                                                    <td><?php echo $item_price ?></td>
                                                    <td><?php echo $item_qty ?></td>
                                                    <td><?php echo $subtotal ?></td>
                                                    <td><?php echo $date_purchased ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }

                                        // Define the Search function
                                        function Search($user_id, $connection, $search)
                                        {
                                            // Use a prepared statement to prevent SQL injection
                                            $sql = "SELECT * FROM ordertbl WHERE item_name LIKE ? AND user_id = ?";

                                            // Prepare the statement
                                            $stmt = mysqli_prepare($connection, $sql);

                                            if ($stmt) {

                                                // Set the parameter value
                                                $searchParam = $search . '%';

                                                // Bind the parameter
                                                mysqli_stmt_bind_param($stmt, "ss", $searchParam, $user_id);



                                                // Execute the statement
                                                mysqli_stmt_execute($stmt);

                                                // Get the result set
                                                $result = mysqli_stmt_get_result($stmt);


                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $item_name = $row['item_name'];
                                                    $item_size = $row['item_size'];
                                                    $item_price = $row['item_price'];
                                                    $item_qty = $row['item_qty'];
                                                    $subtotal = $row['subtotal'];
                                                    $date_purchased = $row['date_purchased'];

                                                ?>
                                                    <tr>
                                                        <td><?php echo $id ?></td>
                                                        <td class="text-start"><?php echo $item_name ?></td>
                                                        <td><?php echo $item_size ?></td>
                                                        <td><?php echo $item_price ?></td>
                                                        <td><?php echo $item_qty ?></td>
                                                        <td><?php echo $subtotal ?></td>
                                                        <td><?php echo $date_purchased ?></td>
                                                    </tr>

                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    if (isset($_SESSION['cart_added'])) {
        echo "<script> document.addEventListener('DOMContentLoaded', function() {
                 Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Item successfully inserted.',
                    showConfirmButton: false,
                    timer: 2500
                });
            });</script>";
        // Unset the session variable to prevent showing the alert on subsequent page loads
        unset($_SESSION['cart_added']);
    }
    ?>


    <script>
        document.querySelector('#applybtn').addEventListener('click', function() {
            const validDiscountCode = "ZYRO123";

            var discounttxt = document.querySelector('#discount');
            var getValue = discounttxt.value;

            var subtotal = document.querySelector('#subtotal');

            if (getValue == validDiscountCode) {
                var tenPercent = document.querySelector('#discount').setAttribute('value', .10);

                <?php
                $discountAmount = $totalPrice * 0.1;
                $latesTotalCost = $totalPrice - $discountAmount;

                echo "var discountAmountPhp = $discountAmount;";
                echo "var totalCost = $latesTotalCost;";
                ?>

                document.querySelector('#discountValue').innerHTML = "₱" + discountAmountPhp;

                document.querySelector('#totalCost').setAttribute('value', totalCost);
                document.querySelector('#totalCost').innerHTML = "₱" + totalCost;
            }
        });
    </script>
</body>

</html>