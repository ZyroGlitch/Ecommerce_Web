<?php
require_once('php_operations/dbConnection.php');
session_start();

$user_id = $_GET['user_id'];
$name = $_GET['name'];

// Convert all first character of each word name of the user
$name = ucwords($name);

// Getting the updated image of user
$sql = "SELECT image FROM usertbl WHERE id = '$user_id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $image = $row['image'];
}


$notification = 0;
// Getting the updated number of notifications
$sql1 = "SELECT COUNT(id) AS 'totalNotification' FROM admin_responsetbl WHERE user_id = '$user_id'";
$query1 = mysqli_query($connection, $sql1);

while ($row = mysqli_fetch_assoc($query1)) {
    $notification = $row['totalNotification'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Sphere</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- SweetJsAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .nav-link {
            color: #9290C3;
        }

        /* Tablet Size */
        @media screen and (max-width: 767px) {
            .margin-bottom-sm {
                margin-bottom: 48px;
            }
        }
    </style>
</head>

<body style="background: #070F2B;">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#1B1A55;">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center text-light">
                <div class="text-center">
                    <img src="images/brand.png" alt="brand image" class="navbar-brand" style="width:40px;">
                </div>
                <h5 class="navbar-brand fs-3" style="color:#9290C3;">ShoeSphere</h5>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="text-light me-5">
                    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#notification" class="nav-link position-relative fs-5 fw-bold" style="color:#9290C3;"><i class="bi bi-bell-fill fw-bold"></i> <span class="position-absolute top-0 start-100 translate-middle badge fw-bold" style="color:#9290C3;"> <b> +<?php echo $notification ?> </b> <span class="visually-hidden">unread messages</span></span></button>
                </div>
                <div>
                    <a class="nav-link fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" style="color:#535C91 ;"> <i class="bi bi-menu-button-wide fs-2" style="color:#9290C3;"> <b>Menu</b></i> <i class="fas fa-cart-flatbed fa-xl" style="color:#9290C3;"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MENU OFFCANVAS -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="demo" style="background-color: #070F2B;">
        <div class="offcanvas-header border-bottom border-2" style="background-color: #1B1A55;">
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
                    <th></th>
                    <th></th>
                </thead>
                <tbody class="text-center">

                    <?php
                    $sql = "SELECT * FROM admin_responsetbl WHERE user_id='$user_id'";
                    $query = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id'];
                        $response = $row['response'];
                        $date = $row['date'];

                    ?>

                        <form action="viewMessage.php" method="post">
                            <!-- Transfer the post value to viewMessage.php -->
                            <input type="hidden" value="<?php echo $id ?>" name="id">
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                            <input type="hidden" value="<?php echo $name ?>" name="name">

                            <tr>
                                <td class="d-flex justify-content-between align-items-center">
                                    <img src="avatars/men5.jpg" alt="goku img" class="rounded-circle object-fit-cover" style="width:60px;height:60px;">
                                    <p class="text-center">Message From Admin.</p>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-eye-fill"></i> View
                                    </button>
                                </td>
                            </tr>
                        </form>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-lg my-5">
        <div class="row justify-content-center align-content-center" id="adidas">
            <div class="col-lg-4 col-md-4 h-100 margin-bottom-sm h-100">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="adidas-img/adidas1.png" alt="shoes image" style="max-width:200px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱3000</h3>
                        <h3>Adidas Men's Hoops</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Adidas Men's Hoops: Unrivaled comfort and style, boasting a responsive Boost midsole and sleek design for the ideal fusion of performance and fashion.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Adidas Men's Hoops" name="hoopsName">
                                    <input type="hidden" value="3000" name="hoopsPrice">
                                    <input type="hidden" value="adidas-img/adidas1.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Adidas Men's Hoops" name="hoopsName">
                                    <input type="hidden" value="3000" name="hoopsPrice">
                                    <input type="hidden" value="adidas-img/adidas1.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 h-100 margin-bottom-sm">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="adidas-img/adidas2.png" alt="shoes image" style="max-width:220px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱4000</h3>
                        <h3>Adidas Alpha Sneakers</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Step into superior performance and street-ready style with Adidas Alpha Sneakers, where responsive cushioning meets iconic design for a stride that stands out.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Adidas Alpha Sneakers" name="hoopsName">
                                    <input type="hidden" value="4000" name="hoopsPrice">
                                    <input type="hidden" value="adidas-img/adidas2.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Adidas Alpha Sneakers" name="hoopsName">
                                    <input type="hidden" value="4000" name="hoopsPrice">
                                    <input type="hidden" value="adidas-img/adidas2.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 h-100">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="adidas-img/adidas3.png" alt="shoes image" style="max-width:230px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱5000</h3>
                        <h3>Adidas Crazyflight</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Adidas Crazyflight: Elevate your run with unmatched comfort and energy return, seamlessly blending technology and contemporary design for a stylish.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Adidas Crazyflight" name="hoopsName">
                                    <input type="hidden" value="5000" name="hoopsPrice">
                                    <input type="hidden" value="adidas-img/adidas3.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Adidas Crazyflight" name="hoopsName">
                                    <input type="hidden" value="5000" name="hoopsPrice">
                                    <input type="hidden" value="adidas-img/adidas3.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2ND ROW OF ITEMS -->
        <div class="row justify-content-center align-items-center mt-5" id="Nike">
            <div class="col-lg-4 col-md-4 h-100 margin-bottom-sm">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="Nike-img/shoe1.png" alt="shoes image" style="max-width:200px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱5000</h3>
                        <h3>Nike Men's Sneaker</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Nike Men's Sneaker: Agile comfort, responsive cushioning, and innovative design redefine your run, offering style and performance in every step.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Nike Men's Sneaker" name="hoopsName">
                                    <input type="hidden" value="5000" name="hoopsPrice">
                                    <input type="hidden" value="Nike-img/shoe1.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Nike Men's Sneaker" name="hoopsName">
                                    <input type="hidden" value="5000" name="hoopsPrice">
                                    <input type="hidden" value="Nike-img/shoe1.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 h-100 margin-bottom-sm">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="Nike-img/shoe2.png" alt="shoes image" style="max-width:220px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱6000</h3>
                        <h3>Nike Men's Dunk Low</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Nike Men's Dunk Low: Limitless comfort, energy return, and sleek design. Precision-engineered with React technology, it's a stride ahead in performance and style.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Nike Men's Dunk Low" name="hoopsName">
                                    <input type="hidden" value="6000" name="hoopsPrice">
                                    <input type="hidden" value="Nike-img/shoe2.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Nike Men's Dunk Low" name="hoopsName">
                                    <input type="hidden" value="6000" name="hoopsPrice">
                                    <input type="hidden" value="Nike-img/shoe2.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 h-100">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="Nike-img/shoe3.png" alt="shoes image" style="max-width:200px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱6000</h3>
                        <h3>Nike Women's Dunk Low</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Nike Women's Dunk Low: Embrace natural motion with flexibility and lightweight design for a liberating run that combines comfort and modern aesthetics.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Nike Women's Dunk Low" name="hoopsName">
                                    <input type="hidden" value="6000" name="hoopsPrice">
                                    <input type="hidden" value="Nike-img/shoe3.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="Nike Women's Dunk Low" name="hoopsName">
                                    <input type="hidden" value="6000" name="hoopsPrice">
                                    <input type="hidden" value="Nike-img/shoe3.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3RD ROW OF ITEMS -->
        <div class="row justify-content-center align-items-center mt-5" id="KD">
            <div class="col-lg-4 col-md-4 h-100 margin-bottom-sm">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="kd-img/kd1.png" alt="shoes image" style="max-width:200px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱7000</h3>
                        <h3>KD Trey 5</h3>
                        <p class="text-muted" style="text-align:justify;">
                            KD Trey 5: Unleash on-court excellence with dynamic design, precision fit, and responsive cushioning—a perfect fusion of comfort and style for peak performance.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="KD Trey 5" name="hoopsName">
                                    <input type="hidden" value="7000" name="hoopsPrice">
                                    <input type="hidden" value="kd-img/kd1.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="KD Trey 5" name="hoopsName">
                                    <input type="hidden" value="7000" name="hoopsPrice">
                                    <input type="hidden" value="kd-img/kd1.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 h-100 margin-bottom-sm">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="kd-img/kd2.png" alt="shoes image" style="max-width:220px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱8000</h3>
                        <h3>KD Sky Walk</h3>
                        <p class="text-muted" style="text-align:justify;">
                            Elevate your game with KD Sky Walk: Dynamic design, precision fit, and responsive cushioning create a perfect blend of comfort and style.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="KD Sky Walk" name="hoopsName">
                                    <input type="hidden" value="8000" name="hoopsPrice">
                                    <input type="hidden" value="kd-img/kd2.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="KD Sky Walk" name="hoopsName">
                                    <input type="hidden" value="8000" name="hoopsPrice">
                                    <input type="hidden" value="kd-img/kd2.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 h-100">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        </div>

                        <div class="text-center mb-3">
                            <img src="kd-img/kd3.png" alt="shoes image" style="max-width:200px; height:140px;">
                        </div>

                        <h3 class="text-end text-danger fw-bold">₱10,000</h3>
                        <h3>KD Blazer Mid</h3>
                        <p class="text-muted" style="text-align:justify;">
                            KD Blazer Mid: Precision fit, responsive cushioning, and dynamic design converge for on-court excellence—a fusion of comfort and style in every step.
                        </p>

                        <div class="row justify-content-center align-items-center g-3">
                            <div class="col-lg-6 col-md-6">
                                <form action="buyOrder.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="KD Blazer Mid" name="hoopsName">
                                    <input type="hidden" value="10000" name="hoopsPrice">
                                    <input type="hidden" value="kd-img/kd3.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-credit-card-fill"></i> Buy
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <!-- Post Values transfer to InsertOrder.php -->
                                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                                    <input type="hidden" value="KD Blazer Mid" name="hoopsName">
                                    <input type="hidden" value="10000" name="hoopsPrice">
                                    <input type="hidden" value="kd-img/kd3.png" name="hoopsImg">

                                    <!-- Transfer the Get value into post directly to order.php -->
                                    <input type="hidden" value="<?php echo $name ?>" name="name">

                                    <div class="d-grid">
                                        <!-- Insert Order to Cart -->
                                        <button type="submit" class="btn btn-danger" name="submit">
                                            <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_SESSION['purchaseSuccess'])) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Item Purchase Successfully',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>";
        // Unset the session variable to prevent showing the alert on subsequent page loads
        unset($_SESSION['purchaseSuccess']);
    } else if (isset($_SESSION['cartAdded'])) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Successfully added to Cart',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>";
        // Unset the session variable to prevent showing the alert on subsequent page loads
        unset($_SESSION['cartAdded']);
    }
    ?>
</body>

</html>