<?php

class DB {

    protected $database;

    public function __construct()
    {
        $host_name = 'localhost';
        $db_name = 'shop';
        $username = 'root';
        $pass = '';

// Create a database connection
        $this->database = mysqli_connect($host_name, $username, $pass, $db_name);

// Check if the connection was successful
        if (!$this->database) {
            die("Connection failed: " . mysqli_connect_error());
        }

    }
}