<?php
require_once('php_operations/dbConnection.php');

$item_id = $_GET['id'];
$name = $_GET['name'];
$user_id = $_GET['user_id'];

// Update Order using Item ID
$sql = "SELECT * FROM cart_tbl WHERE id='$item_id'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $item_name = $row['item_name'];
    $item_price = $row['item_price'];
    $item_qty = $row['item_qty'];
    $subtotal = $row['subtotal'];
    $item_size = $row['item_size'];
    $item_img = $row['item_img'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest CDN for BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body style="height:100%;background:center center / cover url('images/Cloudy.svg') no-repeat;">
    <div class="container-lg my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <form action="php_operations/updateOrder.php" method="post">
                            <!-- Post Values transfer to updateOrder.php -->
                            <input type="hidden" value="<?php echo $item_id ?>" name="item_id">
                            <input type="hidden" value="<?php echo $item_price ?>" name="item_price">

                            <!-- Get Values transfer into Post in updateOrder.php -->
                            <input type="hidden" value="<?php echo $name ?>" name="name">
                            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">

                            <div class="mb-2">
                                <i class="bi bi-star-fill text-warning fs-4"></i>
                                <i class="bi bi-star-fill text-warning fs-4"></i>
                                <i class="bi bi-star-fill text-warning fs-4"></i>
                                <i class="bi bi-star-fill text-warning fs-4"></i>
                            </div>

                            <div class="text-center mb-3">
                                <img src="<?php echo $item_img ?>" alt="shoes image" style="max-width:200px; height:140px;">
                            </div>

                            <h3 class="text-end text-danger fw-bold">₱<?php echo $item_price ?></h3>
                            <h3><?php echo $item_name ?></h3>

                            <label for="itemquantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control mb-3" value="<?php echo $item_qty ?>" required id="itemquantity" name="new_itemQty">

                            <label for="itemSize" class="form-label">Select Item:</label>
                            <select class="form-select mb-3" required id="itemSize" name="item_size">

                                <!-- Getting the sizes table in database and display to form select -->
                                <?php
                                $sql = "SELECT * FROM sizes";
                                $query = mysqli_query($connection, $sql);

                                while ($row = mysqli_fetch_assoc($query)) {
                                    $size_value = $row['size_value'];
                                    $description = $row['description'];
                                ?>

                                    <option value="<?php echo $size_value ?>" <?php if ($item_size == $size_value) echo 'selected'; ?>> <?php echo $description ?></option>

                                <?php
                                }
                                ?>
                            </select>

                            <div class="d-grid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="d-grid">
                                            <!-- Insert Order to Cart -->
                                            <button type="submit" class="btn btn-warning" name="submit">
                                                <i class="bi bi-pencil-fill"></i> Update
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