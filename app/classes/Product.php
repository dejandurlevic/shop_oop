<?php

require_once "DB.php";

class Product extends DB{
   

    public function fetch_all_products(){
        $sql = "SELECT * FROM products";
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function create($name, $price, $size, $images){
        $sql = "INSERT INTO products (name, price, size, images) VALUES ('$name', '$price', '$size', '$images')";
        $result = $this->database->query($sql);
    }

    public function read($product_id){
        $sql = "SELECT * FROM products WHERE product_id = $product_id";
        $result = $this->database->query($sql);
        return $result->fetch_assoc();
    }
    public function update($product_id, $name, $price, $size, $images){
        $sql = "UPDATE products SET name = '$name', price = '$price', size = '$size', images = '$images' WHERE product_id = $product_id";
        $result = $this->database->query($sql);
    }
    public function delete($product_id){
        $sql = "DELETE FROM products WHERE product_id = $product_id";
        $result = $this->database->query($sql);
    }
}