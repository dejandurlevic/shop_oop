<?php
require_once 'app/config/config.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/User.php';


$cart = new Cart();
$cart_items = $cart->get_cart_items();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Checkout Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <!-- Order Summary -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h4>Order Summary</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Product name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['size']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><img src="<?php echo $item['images']; ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Your cart is empty.</td>
                </tr>
            <?php endif; ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Shipping Details Form -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h4>Shipping Details</h4>
            <form action="process_order.php" method="POST">
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
                
                <!-- Payment Section -->
                <h4>Payment Information</h4>
                <div class="mb-3">
                    <label for="cardName" class="form-label">Cardholder Name</label>
                    <input type="text" class="form-control" id="cardName" name="cardName" placeholder="Name on card" required>
                </div>
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiration" class="form-label">Expiration Date</label>
                        <input type="text" class="form-control" id="expiration" name="expiration" placeholder="MM/YY" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Place Order</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
