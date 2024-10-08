<?php
require_once 'app/config/config.php';
require_once 'app/classes/User.php';
require_once 'app/classes/Product.php';

$user = new User();
$productObj = new Product();

$products = $productObj->fetch_all_products();

require_once 'inc/header.php';
?>
 
    <!-- Main Content -->
    <div class="container mt-5">
        <?php if(!$user->is_logged()) : ?>
            <div class="col-md-12">
                <p class="text-center">To see all products available you must login.</p>
            </div>
        <?php else: ?>
            <?php if(isset($_SESSION['message'])) : ?>
                <div class='alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show' role="alert">
                    <?php
                    echo $_SESSION['message']['text'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>
            
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>Welcome to My SHOP</h1>
                </div>
            </div>

            <!-- Display Products -->
            <div class="row mt-5">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                    <p class="card-text"><strong>Size: </strong><?php echo $product['size']; ?></p>
                                    <p class="card-text"><strong>Price: </strong><?php echo $product['price']; ?> USD</p>
                                    <a href="product.php?product_id=<?php echo $product['product_id'];?>" class="btn btn-primary">View Product</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12">
                        <p class="text-center">No products available.</p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
