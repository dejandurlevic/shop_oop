<?php

require_once '../app/config/config.php';
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';

$user = new User();

if ($user->is_logged() && $user->is_admin()) :

    $products = new Product();
    $products = $products->fetch_all_products();

    require_once '../inc/header.php';
?>


    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Admin Management</h1>
            <a href="add_product.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Product</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price (€)</th>
                            <th scope="col">Size</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <th scope="row"><?php echo ($product['product_id']); ?></th>
                                <td><?php echo ($product['name']); ?></td>
                                <td><?php echo ($product['price']); ?></td>
                                <td><?php echo ($product['size']); ?></td>
                                <td><img src="<?php echo ($product['images']); ?>" alt="<?= $product['images'] ?>" width="50" height="50"></td>
                                <td><?php echo ($product['created_at']); ?></td>
                                <td class="actions">
                                    <a href="edit_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="delete_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
</body>
</html>

<?php endif; ?>
