<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- sweetalert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        label {
            color: #9290C3;
        }

        /* Tablet Size */
        @media screen and (max-width: 1199px) {
            #register-tablet {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
        }

        /* Mobile Size */
        @media screen and (max-width: 767px) {
            #mobile-gap-button {
                gap: 1rem;
            }

            #register-mobile {
                margin: 1rem;
            }

            #sm-marginX {
                margin: 0 20px;
            }
        }
    </style>
</head>

<body class="vh-100" style="background: #070F2B;">
    <div class="container-lg py-5">
        <div class="row justify-content-between align-items-center" id="register-tablet">
            <div class="col-lg-4 col-md-5 d-none d-xl-block">
                <div class="text-center">
                    <img src="images/signup.svg" alt="signup image" class="object-fit-contain" style="width:500px; height:500px;">
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div id="sm-marginX" class="card h-100" style="background: #1B1A55;">
                    <div class="card-body rounded shadow-lg">
                        <div class="text-center mt-3 mb-4">
                            <img src="images/brand.png" alt="Logo" class="object-fit-cover" style="width:80px; height:auto;">
                            <h2>ShoeSphere</h2>
                        </div>

                        <form action="php_operations/insertCredentials.php" method="post">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <label for="name" class="form-label">Enter Name: </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="e.g. John" required id="name" name="name">
                                    </div>

                                    <label for="username" class="form-label">Enter Username: </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="e.g. johnskie" required id="username" name="username">
                                    </div>

                                    <label for="email" class="form-label">Enter Email: </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-at"></i></span>
                                        <input type="email" class="form-control" placeholder="e.g. john@gmail.com" required id="email" name="email">
                                    </div>

                                    <label for="password" class="form-label">Enter Password: </label>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                                        <input type="password" class="form-control" placeholder="e.g. john123" required id="password" name="password">
                                    </div>

                                    <div class="row justify-content-evenly align-item-center mb-3">
                                        <div class="col-lg-6 col-md-6" id="register-mobile">
                                            <div class="d-grid">
                                                <!-- Use a button element instead of input type submit -->
                                                <input type="submit" class="btn text-light fw-bold rounded-pill" name="submit" style="background-color:#535C91;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="d-grid">
                                                <input type="reset" class="btn text-light fw-bold rounded-pill" name="reset" style="background-color:#535C91;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mb-3">
                                        <a href="login.php" style="color: #9290C3;">I have already an account.</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="index.php" class="btn text-light fw-bold btn-sm" style="background-color:#535C91;"><i class="bi bi-arrow-left"></i> Go to Landing Page</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_SESSION['register_error'])) {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'This account already exist!',
                                    });
                                });
                            </script>";

                            // Unset the session variable to prevent showing the alert on subsequent page loads
                            unset($_SESSION['register_error']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>