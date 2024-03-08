<?php
require_once('php_operations/dbConnection.php');

$user_id = $_GET['user_id'];
$name = $_GET['name'];

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
    <title>About ShoeSphere</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="...">

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Animate On Scroll Library CSS CDN-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Animate On Scroll Library JS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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

        section {
            height: 100vh;
        }



        /* Mobile Size */
        @media screen and (max-width: 767px) {
            .h-100-sm {
                height: 100%;
            }

            #margin-se-sm {
                padding: 0 12px;
                text-align: center;
            }

            .margin-bottom-sm {
                margin-bottom: 36px;
            }
        }

        /* Mobile Size */
        @media screen and (max-width: 575px) {
            .sm-marginX {
                margin: 0 25px;
            }
        }
    </style>
</head>

<body>
    <section class="h-100-sm">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#1B1A55;">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center text-light">
                    <div class="text-center">
                        <img src="images/brand.png" alt="brand image" class="navbar-brand" style="width:40px;">
                    </div>
                    <h5 class="navbar-brand fs-3" style="color:#9290C3;">ShoeSphere</h5>
                </div>

                <div>
                    <a class="nav-link fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" style="color:#9290C3;"> <i class="bi bi-menu-button-wide fs-2"> <b>Menu</b></i></a>
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
                <button type="button fw-bold" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: #9290C3;"></button>
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

        <div class="container py-5">
            <div class="text-center pb-5" data-aos="fade-up" data-aos-duration="3000">
                <h2>Quality Services</h2>
            </div>
            <div class="row justify-content-center align-content-center text-center sm-marginX">
                <div class="col-lg-4 col-md-4">
                    <div class="bg-light shadow rounded p-3 my-3" data-aos="fade-up" data-aos-duration="3000">
                        <!-- Icon fontawesome -->
                        <i class="fa-solid fa-shoe-prints fa-4x my-3 text-danger"></i>

                        <h3 class="text-dark">Fitting Services</h3>
                        <p class="text-muted text-dark">Offering fitting services to ensure customers find shoes that are not only
                            stylish but also comfortable and suitable for their individual needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="bg-light shadow rounded p-3 my-3" data-aos="fade-up" data-aos-duration="3000">
                        <!-- Icon fontawesome -->
                        <i class="fa-solid fa-spa fa-4x text-danger my-3"></i>

                        <h3 class="text-dark">Comfort Zones</h3>
                        <p class="text-muted text-dark pb-4">Creating comfortable areas within the store for customers to try on
                            shoes and
                            make decisions at their own pace.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="bg-light shadow rounded p-3 my-3" data-aos="fade-up" data-aos-duration="3000">
                        <!-- Icon fontawesome -->
                        <i class="fa-solid fa-hand-holding-heart fa-4x text-danger my-3"></i>

                        <h3 class="text-dark">Sustainability Initiatives</h3>
                        <p class="text-muted text-dark">Incorporating sustainable and environmentally friendly practices, such as
                            eco-friendly packaging or partnerships with sustainable brands.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="h-100-sm" id="margin-se-sm">
        <div class="container-fluid py-5">
            <div class="text-center pb-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                <h2>Onsite Location</h2>
            </div>
            <div class="row justify-content-evenly align-items-start h-100 sm-marginX">
                <div class="col-lg-5 col-md-5 p-3 bg-light text-dark border-start border-5 border-danger shadow margin-bottom-sm" data-aos="fade-up" data-aos-duration="3000">
                    <h2 class="font-monospace text-dark"><i class="bi bi-geo-alt-fill"></i> ShoeSphere Location</h2>
                    <p class="text-muted text-dark fw-bold">Isulan Sultan Kudarat, South Cotabato.</p>
                    <p class="text-muted text-dark fw-bold">Prk. Bayanihan, Sampao.</p>
                </div>
                <div class="col-lg-5 col-md-5 text-center" data-aos="fade-up" data-aos-duration="3000">
                    <img src="images/location.PNG" alt="location img" class="img-thumbnail shadow">
                </div>
            </div>
        </div>
    </section>

    <script>
        AOS.init();
    </script>
</body>

</html>