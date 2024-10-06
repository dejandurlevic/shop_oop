<?php
require_once 'app/config/config.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/User.php';
require_once 'app/classes/Order.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $delivery_address = $_POST['address'] . ", " . $_POST['city'] . ", " . $_POST['postalCode'] . ", " . $_POST['country'];

    $order = new Order();
    $ship = $order->create_order($delivery_address);

    $_SESSION['message']['type'] = 'success';
    $_SESSION['message']['text'] = 'You have successfully ordered the products!';
    header('location: orders.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Checkout Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <!-- Shipping Details Form -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h4>Shipping Details</h4>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
                </div>
                <div class="mb-3">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Enter your postal code" required>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Place Order</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
