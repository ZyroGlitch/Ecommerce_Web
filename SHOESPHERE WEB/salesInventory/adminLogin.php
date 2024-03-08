<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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

        h1,
        label {
            color: #9290C3;
        }
    </style>
</head>

<body>
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-5 col-md-5">
                <div class="card shadow rounded" style="background-color: #1B1A55;">
                    <form action="../php_operations/checkAdminLogin.php" method="post">
                        <div class="card-body">
                            <div class="text-center">
                                <i class="bi bi-person-circle fw-bold" style="color:#9290C3;font-size:100px;"></i>
                                <h1>Admin</h1>
                            </div>

                            <label for="username" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" placeholder="E.g. John Ford" id="username" required name="username">
                            </div>

                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                                <input type="password" class="form-control" placeholder="E.g. john123" id="password" required name="password">
                            </div>

                            <div class="row justify-content-center align-items-center mb-3">
                                <div class="col-lg-8 col-md-8">
                                    <div class="d-grid">
                                        <button type="submit" class="btn text-light fw-bold" name="adminbtn" style="background-color:#535C91;">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>