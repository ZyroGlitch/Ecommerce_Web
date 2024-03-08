<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- SweetJsAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        @media screen and (min-width: 768px) and (max-width: 1199px) {
            #tablet-variation {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
        }
    </style>
</head>

<body class="vh-100" style="background: #070F2B;">
    <div class="container-lg pt-5">
        <div class="row justify-content-between align-items-center" id="tablet-variation">
            <div class="col-lg-4 col-md-5 d-none d-xl-block">
                <span class="text-center">
                    <img src="images/signin.svg" alt="signup image" class="object-fit-contain" style="width:500px; height:500px;">
                </span>
            </div>
            <div class="col-lg-5 col-md-7" id="tablet-card">
                <div class="card h-100 rounded shadow-lg" style="background: #1B1A55;">
                    <div class="card-body">
                        <div class="text-center mt-2 mb-4">
                            <img src="images/brand.png" alt="Logo" class="object-fit-cover" style="width:80px; height:auto;">
                            <h2>ShoeSphere</h2>
                        </div>

                        <form action="php_operations/checkLogin.php" method="post">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <label for="username" class="form-label">Enter Username </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="e.g. Johnskie" required id="username" name="username">
                                    </div>

                                    <label for="password" class="form-label">Enter Password </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                                        <input type="password" class="form-control" placeholder="e.g. john123" required id="password" name="password">
                                    </div>

                                    <div class="text-end mb-3">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#resetPassModal" style="color: #9290C3;">Forgot Password? </a>
                                    </div>

                                    <div class="row justify-content-evenly align-item-center mb-3 g-3" id="mobile-gap-button">
                                        <div class="col-lg-6 col-md-5">
                                            <div class="d-grid">
                                                <input type="submit" class="btn text-light fw-bold rounded-pill" value="Login" name="submit" style="background-color:#535C91;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5">
                                            <div class="d-grid">
                                                <input type="reset" class="btn text-light fw-bold rounded-pill" name="reset" style="background-color:#535C91;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mb-3">
                                        <a href="register.php" style="color: #9290C3;">Create an account.</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="index.php" class="btn text-light fw-bold btn-sm" style="background-color:#535C91;"><i class="bi bi-arrow-left"></i> Go to Landing Page</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_SESSION['login_error'])) {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Incorrect Username or Password!',
                                    });
                                });
                            </script>";
                            // Unset the session variable to prevent showing the alert on subsequent page loads
                            unset($_SESSION['login_error']);
                        } else if (isset($_SESSION['updatePass_error'])) {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Username and email doesn't exist!!',
                                    });
                                });
                            </script>";
                            // Unset the session variable to prevent showing the alert on subsequent page loads
                            unset($_SESSION['updatePass_error']);
                        } else if (isset($_SESSION['updateSuccessful'])) {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Your password has been successfully updated.',
                                    });
                                });
                            </script>";

                            unset($_SESSION['login_error']);
                            unset($_SESSION['updatePass_error']);
                            unset($_SESSION['updateSuccessful']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="resetPassModal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="php_operations/updatePassword.php" method="post">
                    <div class="modal-header bg-danger">
                        <h1 class="modal-title fs-5 text-light">Reset Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="username" class="form-label text-dark">Username: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" placeholder="e.g. john ford" required id="username" name="username">
                        </div>

                        <label for="gmail" class="form-label text-dark">Email: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-at"></i></span>
                            <input type="email" class="form-control" placeholder="e.g. john@gmail.com" required id="gmail" name="email">
                        </div>

                        <label for="password" class="form-label text-dark">New Password: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                            <input type="password" class="form-control" placeholder="e.g. john123" required id="password" name="newPassword">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>