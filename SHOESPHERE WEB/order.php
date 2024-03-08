<?php
session_start();
require_once('php_operations/dbConnection.php');

$name = $_POST['name'];

$user_id = $_POST['user_id'];
$item_name = $_POST['hoopsName'];
$item_price = $_POST['hoopsPrice'];
$item_img = $_POST['hoopsImg'];

// Getting the updated image of user
$sql = "SELECT image FROM usertbl WHERE id = '$user_id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $image = $row['image'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Modal Page</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        body {
            height: 100%;
            background-color: #070F2B;
        }
    </style>
</head>

<body>
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
    <div class="offcanvas offcanvas-end text-bg-light" data-bs-scroll="true" id="demo">
        <div class="offcanvas-header bg-light border-bottom border-2">
            <div class="d-flex justify-content-start align-items center">
                <img src="<?= isset($image) ? $image : 'avatars/men2.jpg' ?>" alt="goku img" class="rounded-circle shadow object-fit-cover" style="width:60px;height:60px;">
                <h4 class="ms-3 mt-3"><?php echo $name; ?></h4>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <!-- A grey horizontal navbar that becomes vertical on small screens -->
            <nav class="navbar navbar-light bg-light">

                <div class="container-fluid">
                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-danger" href="main.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-houses-fill"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group dropend">
                                <a type="button" href="main.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>" class="nav-link fs-4 text-danger me-2"><i class="bi bi-bag-heart-fill"></i> Product</a>
                                <a type="button" class="nav-link fs-4 text-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item fs-5" href="#adidas"><i class="bi bi-arrow-right-circle-fill"></i> Adidas</a></li>
                                    <li><a class="dropdown-item fs-5" href="#Nike"><i class="bi bi-arrow-right-circle-fill"></i> Nike</a></li>
                                    <li><a class="dropdown-item fs-5" href="#KD"><i class="bi bi-arrow-right-circle-fill"></i> KD</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-danger" href="cart.php?user_id=<?php echo $user_id ?>&name=<?php echo $name ?>"><i class="bi bi-cart-check-fill"></i> Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-danger" href="profile.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-person-fill"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-danger" href="about.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-info-square-fill"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-danger" href="contact.php?name=<?php echo $name ?>&user_id=<?php echo $user_id ?>"><i class="bi bi-telephone-fill"></i> Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-4 text-danger" href="login.php"><i class="bi bi-door-open-fill"></i> Signout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container-lg my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <form action="php_operations/insertOrder.php" method="post">
                            <!-- Post Values transfer to InsertOrder.php -->
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                            <input type="hidden" value="<?php echo $item_name ?>" name="hoopsName">
                            <input type="hidden" value="<?php echo $item_price ?>" name="hoopsPrice">
                            <input type="hidden" value="<?php echo $item_img ?>" name="hoopsImg">

                            <!-- Transfer the name value for offcanvas -->
                            <input type="hidden" value="<?php echo $name ?>" name="name">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mb-2">
                                    <i class="bi bi-star-fill text-warning fs-4"></i>
                                    <i class="bi bi-star-fill text-warning fs-4"></i>
                                    <i class="bi bi-star-fill text-warning fs-4"></i>
                                    <i class="bi bi-star-fill text-warning fs-4"></i>
                                </div>

                                <div class="">
                                    <a href="main.php?user_id=<?php echo $user_id ?>&name=<?php echo $name ?>" class="text-dark fs-2" style="text-decoration:none;"><i class="bi bi-box-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="text-center mb-3">
                                <img src="<?php echo $item_img ?>" alt="shoes image" style="max-width:200px; height:140px;">
                            </div>

                            <h3 class="text-end text-danger fw-bold">₱<?php echo $item_price ?></h3>
                            <h3><?php echo $item_name ?></h3>

                            <label for="itemquantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control mb-3" value="1" required id="itemquantity" name="itemqty">

                            <label for="itemSize" class="form-label">Select Item:</label>
                            <select class="form-select mb-3" required id="itemSize" name="item_size">
                                <option selected value="Size 7">Size 7 - 9.625 inches</option>
                                <option value="Size 8">Size 8 - 9.875 inches</option>
                                <option value="Size 9">Size 9 - 10.1875 inches</option>
                                <option value="Size 10">Size 10 - 10.5 inches</option>
                                <option value="Size 11">Size 11 - 10.75 inches</option>
                                <option value="Size 12">Size 12 - 11.0625 inches</option>
                                <option value="Size 13">Size 13 - 11.25 inches</option>
                                <option value="Size 14">Size 14 - 11.5625 inches</option>
                                <option value="Size 15">Size 15 - 11.875 inches</option>
                            </select>

                            <div class="d-grid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="d-grid">
                                            <!-- Insert Order to Cart -->
                                            <button type="submit" class="btn btn-danger" name="submit">
                                                <i class="bi bi-bag-heart-fill"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="d-grid">
                                            <button type="reset" class="btn btn-secondary" name="reset">
                                                <i class="bi bi-x-lg"></i> Reset
                                            </button>
                                        </div>
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