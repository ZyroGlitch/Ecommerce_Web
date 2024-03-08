<?php
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$message = $_POST['message'];
$name = $_POST['name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Response Page</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body style="height:100%;background:center center / cover url('../images/Cloudy.svg') no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 mt-5">
                <div class="card rounded shadow">
                    <div class="card-header bg-info">
                        <h2>Admin Response</h2>
                    </div>
                    <div class="card-body">
                        <form action="../php_operations/adminResponse.php" method="post">
                            <!-- Transfer all values to adminResponse.php -->
                            <input type="hidden" value="<?php echo $id ?>" name="id">
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">

                            <h4>Message: </h4>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="response" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Response</label>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-send-fill"></i> Send</button>
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