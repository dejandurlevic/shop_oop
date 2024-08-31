<?php


    session_start();

    $host_name = 'localhost';
    $db_name = 'shop';
    $username = 'root';
    $pass = '';
    

    $database = mysqli_connect($host_name, $username, $pass, $db_name);

        // Checking if the connection is successful
        if(!$database) {
            die("Connection failed: " . mysqli_connect_error());
        }
    

