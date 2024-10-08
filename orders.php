<?php
require_once 'app/classes/Order.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/User.php';

$user = new User();

if(!$user->is_logged()) {
    header('location: login.php');
    exit();
}

$order = new Order();
$orders = $order->get_orders();
require_once 'inc/header.php';
?>
            <?php if(isset($_SESSION['message'])) : ?>
                <div class='alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show' role="alert">
                    <?php
                    echo $_SESSION['message']['text'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">My Orders</h2>

    <?php if (!empty($orders)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Delivery Address</th>
                        <th>Order Date</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo ($order['orders_id']); ?></td>
                            <td><?php echo ($order['name']); ?></td>
                            <td><?php echo ($order['size']); ?></td>
                            <td><?php echo ($order['quantity']); ?></td>
                            <td><?php echo ($order['price']); ?> €</td>
                            <td><?php echo ($order['delivery_address']); ?></td>
                            <td><?php echo (date('d-m-Y H:i', strtotime($order['created_at']))); ?></td>
                            <td><img src="path_to_images/<?php echo ($order['images']); ?>" alt="<?= $order['images'] ?>" width="50"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No orders found.
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
