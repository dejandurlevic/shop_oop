<?php

require_once "DB.php";

class Cart extends DB{
   
    public function add_to_cart($product_id, $user_id, $quantity) {
        $sql = "INSERT INTO cart (product_id, user_id, quantity) VALUES ($product_id, $user_id, $quantity)";
        $result = $this->database->query($sql);
    }

    public function get_cart_items() {
        $sql = "SELECT p.product_id, p.name, p.price, p.size, p.images, c.quantity 
                FROM cart c 
                INNER JOIN products p ON c.product_id = p.product_id 
                WHERE c.user_id = '" . $_SESSION['user_id'] . "'";
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
