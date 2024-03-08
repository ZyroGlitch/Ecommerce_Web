<?php
require_once('php_operations/dbConnection.php');
session_start();

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
    <title>Contact Page</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Animate On Scroll Library CSS CDN-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Animate On Scroll Library JS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- SweetJsAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            .sm-marginX {
                margin: 0 25px;
            }

            .vh-100 {
                height: 100% !important;
            }

            .row-marginX {
                margin: 0 25px;
            }

            #row-marginBottom {
                margin-bottom: 60px;
            }

            #sm-marginTop {
                margin-top: 5rem;
            }

            #img-marginY {
                margin: 60px 0;
                text-align: center;
            }
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
                <a class="nav-link fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" style="color:#9290C3;"> <i class="bi bi-menu-button-wide fs-2" style="color:#9290C3;"> <b>Menu</b></i> <i class="fas fa-cart-flatbed fa-xl text-danger"></i></a>
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

    <section class="container-lg my-5 vh-100">
        <div class="row justify-content-around align-items-center row-marginX">
            <div class="text-center mb-5">
                <h2>Have Some Questions?</h2>
                <p>Thank you for your interest in our services. Please fill out the form or e-mail us at <u>shoesphere@gmail.com</u> and we will get back to you promptly regarding your request.</p>
            </div>

            <div id="row-marginBottom" class="col-lg-6 col-md-6 bg-light rounded shadow p-4">
                <form action="php_operations/addConcern.php" method="post">
                    <!-- Include user_id in addConcern.php -->
                    <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
                    <input type="hidden" value="<?php echo $name ?>" name="name">

                    <h2 class="text-danger mb-3">Contact Us</h2>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="bi bi-person-circle"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="e.g. Username" required name="username">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-at"></i></span>
                        <input type="text" class="form-control" placeholder="e.g. Email" required name="email">
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="message" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>

                    <button type="submit" class="btn btn-danger" name="submit">
                        Send Message
                    </button>
                </form>
            </div>

            <div class="col-lg-5 col-md-5">
                <h2>Request a Call Back</h2>
                <p class="lead fw-bold">
                    <i class="bi bi-telephone-inbound-fill"></i> 09615607681
                </p>
                <p class="lead fw-bold">
                    <i class="bi bi-envelope-at-fill"></i> shoesphere@gmail.com
                </p>
                <p class="lead fw-bold">
                    <i class="bi bi-geo-alt-fill"></i> Prk. Bayanihan Sampao, Isulan Sultan Kudarat
                </p>
                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="https://www.facebook.com/johnford.buliag.2" target="_blank"><i class="bi bi-facebook fs-1 text-primary"></i></a>
                    <a href="https://www.facebook.com/messages/t/100014083090139" target="_blank"><i class="bi bi-messenger fs-1 text-primary"></i></a>
                    <a href="https://www.instagram.com/johnfordbuliag/" target="_blank"><i class="bi bi-instagram fs-1 text-danger"></i></a>
                    <a href="https://github.com/ZyroGlitch?tab=repositories" target="_blank"><i class="bi bi-github fs-1 text-light"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="container vh-100">
        <div class="row justify-content-between align-items-center vh-100 row-marginX">
            <h2 id="sm-marginTop" class="text-center fs-1 mb-2" data-aos="fade-up" data-aos-duration="3000">Your Feedback Is Important For Us</h2>

            <div id="img-marginY" class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-duration="3000">
                <img src="images/Customer feedback.svg" alt="" class="object-fit-cover" style="width:400px; height:auto;">
            </div>

            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="3000">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <form action="php_operations/insertFeedBack.php" method="post">
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">

                            <div class="card-title mb-3">
                                <h2 class="text-danger">Send us your Feedback</h2>
                            </div>

                            <label for="name" class="form-label">Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name" required>
                            </div>

                            <label for="email" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">@</span>
                                <input type="email" class="form-control" placeholder="Enter your email" id="email" name="email" required>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="message" name="message" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Message...</label>
                            </div>

                            <button type="submit" class="btn btn-danger" name="submit">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_SESSION['successConcern'])) {
            echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                icon: 'success',
                title: 'Your Concern Has Been Successfully Inserted',
            });
           });
       </script>";
            // Unset the session variable to prevent showing the alert on subsequent page loads
            unset($_SESSION['successConcern']);
        } else if (isset($_SESSION['successFeedback'])) {
            echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                icon: 'success',
                title: 'Your Feedback Has Been Successfully Inserted',
            });
           });
       </script>";
            // Unset the session variable to prevent showing the alert on subsequent page loads
            unset($_SESSION['successFeedback']);
        }
        ?>
    </section>



    <script>
        AOS.init();
    </script>
</body>

</html>