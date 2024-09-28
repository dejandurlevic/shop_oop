<?php

require_once 'app/config/config.php';
require_once 'app/classes/Product.php';
require_once 'app/classes/Cart.php';

$product = new Product();
$result = $product->read($_GET['product_id']);


if($_SERVER['REQUEST_METHOD'] == "POST") {  
    if (isset($result['product_id'])) {
        $product_id = $result['product_id'];
        $user_id = $_SESSION['user_id'];
        $quantity = $_POST['quantity'];

        $cart = new Cart();

        $cart->add_to_cart($product_id, $user_id, $quantity);

        header("location: cart.php");
        exit();
    } else {
        echo "Product not found.";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="<?= $result['images'] ?>" class="card-img-top" alt="<?= $result['images'] ?>">
                <div class="card-body">
                    <h5 class="card-title">Name: <?= $result['name'] ?></h5>
                    <p class="card-text">Size: <?= $result['size'] ?></p>
                    <p class="card-text"><strong>Price: <?= $result['price'] ?>$</strong></p>
                    <form action="" method="POST">
                        <input type="number" name="quantity">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
               
                </div>
                <div class="card-footer text-muted">
                         <?= $result['created_at'] ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
