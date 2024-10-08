<?php

require_once "DB.php";

class User extends DB{
   
    public function __construct() {
        // Pokreće sesiju ako nije već pokrenuta
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        parent::__construct(); // Ako DB klasa ima svoj konstruktor
    }


    public function register($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        $result = $this->database->query($sql);

    
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

       
        $sql = "SELECT user_id, password FROM users WHERE email = '$email'";
        $result = $this->database->query($sql);

        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['user_id'];
                return true;
            }
           
        }
            return false;
        
    }

    public function is_logged(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }

    public function is_admin(){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = $user_id AND is_admin = 1";
        $result = $this->database->query($sql);

        if($result->num_rows > 0){
            return true;
        }
        return false;
    }

    public function logout(){
        unset($_SESSION['user_id']);
    }
}
?>
