<?php
require_once('php_operations/dbConnection.php');

$user_id = $_GET['user_id'];
$name = $_GET['name'];


// Count the total items in the cart
$sql = "SELECT COUNT(id) as totalCart FROM cart_tbl WHERE user_id = '$user_id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $totalCart = $row['totalCart'];
}

// Getting the total Orders and total amount customer purchased
$sql1 = "SELECT SUM(item_qty) as totalOrders, SUM(subtotal) as totalAmount FROM ordertbl WHERE user_id = '$user_id'";
$query1 = mysqli_query($connection, $sql1);

while ($row = mysqli_fetch_assoc($query1)) {
    $totalOrders = $row['totalOrders'];
    $totalAmount = $row['totalAmount'];
}


// Getting the email and the updated image of user
$sql2 = "SELECT email,image FROM usertbl WHERE id = '$user_id'";
$query2 = mysqli_query($connection, $sql2);

while ($row = mysqli_fetch_assoc($query2)) {
    $email = $row['email'];
    $image = $row['image'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #070F2B;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            color: #9290C3;
            font-weight: bold;
        }

        .nav-link {
            color: #9290C3;
        }

        /* Mobile Size */
        @media screen and (max-width: 767px) {
            .mobile-bottom-sm {
                margin-bottom: 24px;
            }

            .font-size-sm {
                font-size: 40px;
                margin-bottom: 40px;
            }

            #sm-margintop {
                margin: 0 25px;
            }

            #sm-padding {
                padding: 30px 0;
            }

        }
    </style>
</head>

<body class="vh-100">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#1B1A55;">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center text-light">
                <div class="text-center">
                    <img src="images/brand.png" alt="brand image" class="navbar-brand" style="width:40px;">
                </div>
                <h5 class="navbar-brand fs-3" style="color:#9290C3;">ShoeSphere</h5>
            </div>

            <div>
                <a class="nav-link fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" style="color:#9290C3;"> <i class="bi bi-menu-button-wide fs-2"> <b>Menu</b></i> <i class="fas fa-cart-flatbed fa-xl"></i></a>
            </div>
        </div>
    </nav>

    <!-- MENU OFFCANVAS -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" id="demo" style="background-color:#070F2B;">
        <div class="offcanvas-header border-bottom border-2" style="background-color:#1B1A55;">
            <div class="d-flex justify-content-start align-items center">
                <img src="<?= isset($image) ? $image : 'avatars/men2.jpg' ?>" alt="goku img" class="rounded-circle shadow object-fit-cover" style="width:60px;height:60px;">
                <h4 class="ms-3 mt-3"><?php echo $name; ?></h4>
            </div>
            <button type="button" class="btn-close fw-bold" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: #9290C3;"></button>
        </div>

        <div class="offcanvas-body">
            <!-- A grey horizontal navbar that becomes vertical on small screens -->
            <nav class="navbar navbar-dark" style="background-color:#070F2B;">

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

    <div class="container-fluid my-5">
        <div id="sm-margintop" class="row justify-content-evenly align-content-center">
            <div class="col-lg-4 col-md-4 rounded shadow p-3 mobile-bottom-sm" style="background-color:#1B1A55;">
                <div class="text-center">
                    <img src="<?= isset($image) ? $image : 'avatars/men2.jpg' ?>" alt="goku img" class="rounded-circle border border-3 border-light shadow object-fit-cover" style="width: 160px; height: 160px;">
                </div>

                <div class="text-center mt-3">
                    <h4><?php echo $name ?></h4>
                    <h5><?php echo $email ?></h5>
                </div>

                <div class="row justify-content-evenly align-items-center mt-3">
                    <div class="col-lg-6 col-md-6">
                        <div class="d-grid">
                            <button data-bs-toggle="modal" data-bs-target="#avatarModal" class="btn text-light fw-bold" style="background-color:#535C91 ;"><i class="bi bi-pencil-square"></i> Edit Avatar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sm-padding" class="col-lg-7 col-md-7">
                <div class="text-center my-3">
                    <h2 class="font-size-sm">Profile</h2>
                </div>

                <div class="row justify-content-evenly align-content-center my-2">
                    <div class="col-lg-3 col-md-4 shadow border-top border-danger border-5 mobile-bottom-sm" style="background-color:#1B1A55;">
                        <div class="d-grid text-center">
                            <div class="d-flex flex-column justify-content-center py-5">
                                <p><i class="bi bi-cart-fill fs-1 fw-bold" style="color:#9290C3;"></i></p>
                                <h5 class="font-size-sm"><?php echo $totalCart ?> Cart Items</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 shadow border-top border-success border-5 mobile-bottom-sm" style="background-color:#1B1A55;">
                        <div class="d-grid text-center">
                            <div class="d-flex flex-column justify-content-center py-5">
                                <p><i class="bi bi-clipboard2-check-fill fs-1 fw-bold" style="color:#9290C3;"></i></p>
                                <h5 class="font-size-sm"><?php echo $totalOrders ?> Orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 shadow border-top border-primary border-5 mobile-bottom-sm" style="background-color:#1B1A55;">
                        <div class="d-grid text-center">
                            <div class="d-flex flex-column justify-content-center py-5">
                                <p><i class="bi bi-wallet-fill fs-1 fw-bold" style="color:#9290C3;"></i></p>
                                <h5 class="font-size-sm">₱<?php echo $totalAmount ?> <br>Amount Purchase</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Avatars Modal -->
    <div class="modal fade" id="avatarModal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-light">SELECT AVATAR</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-evenly align-content-center">
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/girl1.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/girl1.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/girl2.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/girl2.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/girl3.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/girl3.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly align-content-center mt-3">
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/girl4.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/girl4.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/girl5.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/girl5.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/girl6.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/girl6.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly align-content-center mt-3">
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/men1.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/men1.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/men2.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/men2.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/men3.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/men3.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly align-content-center mt-3">
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/men4.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/men4.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/men5.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/men5.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="php_operations/insert_Image.php?image=<?php echo "avatars/men6.jpg" ?>&user_id=<?php echo $user_id ?>&name=<?php echo $name ?>">
                                <img src="avatars/men6.jpg" alt="Avatar 1" class="rounded shadow object-fit-cover" style="width:100px; height:100px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>