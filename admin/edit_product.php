<?php

require_once '../app/config/config.php';
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';

$user = new User();

if($user->is_logged() && $user->is_admin()) :

    $product_obj = new Product();
    $product = $product_obj->read($_GET['id']);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $product_id = $_GET['id'];
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $size = $_POST['product_size'];
        $images = $_POST['product_image'];

        $product_obj->update($product_id, $name, $price, $size, $images);

        header('location: index.php');
        exit();
    }

endif;

require_once '../inc/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Edit Product</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['name']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_price">Product Price</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" value="<?php echo $product['price']; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_description">Product Size</label>
                            <input class="form-control" id="product_size" name="product_size" rows="4" value="<?php echo $product['size']; ?>"></input>
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_image">Product Image</label>
                            <input type="text" class="form-control" id="product_image" name="product_image" value="<?php echo $product['images']; ?>">
                        </div>
                        <input type="hidden" name="product_id" value="">
                        <button type="submit" class="btn btn-success btn-block">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Bootstrap JS  -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
