<?php

class User {
    protected $database;

    public function __construct() {
        global $database;
        $this->database = $database;
    }

    public function register($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        $result = $this->database->query($sql);

        // Check the result
        if ($result) {
            $_SESSION['user_id'] = $result->insert_id;
            return true;
        } else {
            echo "Error: " . $this->database->error;
            return false;
        }

        return $result;
    }
    public function login($email, $password) {

        // Prepare the SQL statement
        $sql = "SELECT user_id, password FROM users WHERE email = '$email'";
        $result = $this->database->query($sql);

        if($result->num_rows > 1){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['user_id'];
                return true;
            }
           
        }
            return false;
        
    }
}
?>
