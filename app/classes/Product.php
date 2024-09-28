<?php

require_once "DB.php";

class Product extends DB{
   

    public function fetch_all_products(){
        $sql = "SELECT * FROM products";
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function read($product_id){
        $sql = "SELECT * FROM products WHERE product_id = $product_id";
        $result = $this->database->query($sql);
        return $result->fetch_assoc();
        
    }
}