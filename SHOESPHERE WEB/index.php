<?php
require_once('php_operations/dbConnection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <!-- Javascript External Link -->
    <script src="main.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- SweetJsAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Animate On Scroll Library CSS CDN-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Animate On Scroll Library JS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a {
            color: #9290C3;
        }

        section {
            height: 100vh;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #shoesLogo {
            width: 600px;
            height: 300px;
        }

        /* TABLET Size */
        @media screen and (max-width: 767px) {
            section {
                height: 100%;
            }

            #sm-margin-start {
                margin: 1rem 0 0 4.5rem;
            }

            #sm-align-content {
                text-align: center;
            }

            #sm-shoesLogo {
                width: 400px;
                height: 150px;
            }

            #sm-padding-top {
                margin-top: 3rem;
            }

            #md-mtop {
                margin-top: 24px;
            }

            #md-py {
                padding: 60px 0px;
            }

        }


        /* IPHONE 14 PRO MAX Size */
        @media screen and (max-width: 430px) {
            #md-py {
                padding: 0px 0px;
            }

            .swiper {
                height: auto;
                width: auto;
                margin: 0 20px;
            }

            .swiper-slide {
                text-align: center;
                font-size: 12px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <section style="background: #070F2B;">
        <nav class="navbar navbar-expand-lg" style="background-color:#1B1A55;">
            <div class="container-fluid">
                <a class="navbar-brand d-flex" href="#">
                    <img src="images/brand.png" alt="brand image" class="navbar-brand" style="width:40px;">
                    <h5 class="navbar-brand fs-3" style="color:#9290C3;">ShoeSphere</h5>
                </a>
                <!-- Toggle button -->
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color:#535C91;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto"> <!-- Added ms-auto class to move the content to the right -->
                        <li class="nav-item">
                            <a href="login.php" class="nav-link fs-5 fw-bold" style="text-decoration:none; color:#9290C3"><i class="bi bi-cart4"></i> Shop Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container mt-5">
            <div class="row justify-content-center align-items-center" id="sm-align-content">
                <div class="col-lg-4 col-md-4">
                    <div class="animate__animated animate__slideInLeft mb-3">
                        <h1 class="typewrite" data-period="2000" data-type='["Stylish Shoes for Every Occasion","Walk with Trendy Confidence","Step into Fashionable Style","Step into Elegance"]'>
                            <span class="wrap"></span>
                        </h1>
                        <p>Elevate your fashion game with our curated collection of shoes. From casual sneakers to elegant heels, we have the perfect pair for every step you take. Discover comfort, style, and quality in every stride.</p>
                    </div>

                    <a href="login.php" id="md-mtop" class="btn btn-lg text-light rounded-pill animate__animated animate__slideInLeft" style="background-color:#535C91;"><i class="bi bi-cart4"></i> Shop Now</a>
                </div>
                <div class="col-lg-8 col-md-6 text-center" id="sm-padding-top">
                    <img src="kd-img/kd2.png" alt="shoe image" class="object-fit-contain" id="sm-shoesLogo">
                </div>
            </div>
        </div>
    </section>

    <section style="background: #070F2B;">
        <div id="md-py" class="container-fluid">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-lg-5 col-md-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <div class="text-center text-light mb-5">
                        <h2><i class="bi bi-stars"></i> Customer Reviews Section</h2>
                    </div>

                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $sql = "SELECT userfeedback.name, userfeedback.message, usertbl.image FROM userfeedback
                            INNER JOIN usertbl ON userfeedback.user_id = usertbl.id;";
                            $query = mysqli_query($connection, $sql);

                            while ($row = mysqli_fetch_assoc($query)) {
                                $name = $row['name'];
                                $message = $row['message'];
                                $image = $row['image'];

                            ?>

                                <div class="swiper-slide">
                                    <div class="card rounded shadow">
                                        <div class="card-body py-3 px-5">
                                            <div class="text-start">
                                                <p class="text-dark"><i class="bi bi-quote text-success fs-4 fw-bold"></i> <?php echo $message ?> <span class="material-icons text-success fs-4 fw-bold">
                                                        format_quote
                                                    </span></p>
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="text-center mb-3">
                                                    <img src="<?php echo $image ?>" alt="" class="rounded-circle border border-3 border-secondary shadow object-fit-cover" style="width:80px;height:80px;">
                                                </div>

                                                <div class="text-center ms-3">
                                                    <p class="text-dark fs-5 fw-bold"> <?php echo $name ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    if (isset($_SESSION['login_error'])) {
        echo "<script> document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                icon: 'error',
                title: 'Incorrect Username or Password!',
            });
        });
        </script>";
        // Unset the session variable to prevent showing the alert on subsequent page loads
        unset($_SESSION['login_error']);
    }
    ?>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });

        AOS.init();
    </script>
</body>

</html>