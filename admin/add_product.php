<?php

require_once '../app/config/config.php';
require_once '../app/classes/User.php';
require_once '../app/classes/Product.php';

$user = new User();

if ($user->is_logged() && $user->is_admin()) :

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $images = $_POST['photo_path'];
        
        $product_obj = new Product();
        $product_obj->create($name, $price, $size, $images);

        header('location: index.php');
        exit();
    }

endif;

require_once '../inc/header.php';
?>

<div class="container mt-5">
    <h2 class="mb-4">Add New Product</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" required>
        </div>
        <div class="mb-3">
            <label for="size" class="form-label">Product Size</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="Enter product size" required>
        </div>
        <input type="hidden" name="photo_path" id="photoPathInput">
        
        <div class="mb-3">
            <label class="form-label">Upload Image</label>
            <div id="dropzone-upload" class="dropzone border border-secondary rounded p-3"></div>
        </div>
        
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzoneUpload = {
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init: function (){
            this.on("success", function(file, respose){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById('photoPathInput').value = jsonResponse.photo_path;
                }else{
                    console.error(jsonResponse.error);
                    
                }
            });
        }
    };
</script>
