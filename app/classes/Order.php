<?php

require_once "DB.php";
require_once "Cart.php";

class Order extends DB{
   
    public function create_order($delivery_address){    
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO orders (user_id, delivery_address) VALUES ($user_id, '$delivery_address')";
        $result = $this->database->query($sql);

        $order_id = $this->database->insert_id;

        $cart = new Cart();
        $cart_items = $cart->get_cart_items();  

        
        foreach($cart_items as $item){
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];
        }

        $sql_cart = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id,  $product_id,  '$quantity')";
        $result = $this->database->query($sql_cart);
    }

        $cart = new Cart();
        $carts = $cart->destroy_cart();
    }

    public function get_orders(){
       
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT orders.orders_id, orders.delivery_address, orders.created_at, order_items.quantity, products.name, products.size, products.images, products.price FROM orders INNER JOIN order_items ON orders.orders_id = order_items.order_id INNER JOIN products ON order_items.product_id = products.product_id WHERE orders.user_id =  $user_id";

            $result = $this->database->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        
    }
}