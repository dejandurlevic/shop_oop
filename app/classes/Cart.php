<?php

class Cart {
    protected $database;

    public function __construct() {
        global $database;
        $this->database = $database;
    }

    public function add_to_cart($product_id, $user_id) {
        $sql = "INSERT INTO cart (product_id, user_id) VALUES ($product_id, $user_id)";
        $result = $this->database->query($sql);
    }

    public function get_cart_items() {
        $sql = "SELECT p.product_id, p.name, p.price, p.size, p.images 
                FROM cart c 
                INNER JOIN products p ON c.product_id = p.product_id 
                WHERE c.user_id = '" . $_SESSION['user_id'] . "'";
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
