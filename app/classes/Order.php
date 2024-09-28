<?php

require_once "DB.php";

class Order extends DB{
   
    public function create_order($delivery_address){
        var_dump($delivery_address);
    }
}