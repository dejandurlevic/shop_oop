<?php
require_once 'app/config/config.php';
require_once 'app/classes/User.php';

$user = new User();

if($user->is_logged()){
    header('location: index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $created = $user->register($username, $email, $password);

    if($created){
        $_SESSION['message']['type'] = 'success';
         $_SESSION['message']['text'] = 'User successfully registered, login below!';
        header('location: login.php');
        exit();
    }else{
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'User was not successfully registered!';
        header('location: register.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

    <?php if(isset($_SESSION['message'])) : ?>
            <div class='alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show' role="alert">
            <?php
            echo $_SESSION['message']['text'];
            unset($_SESSION['message']);
            ?>
            </div>
        <?php endif; ?>


        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Already have an account? <a href="login.php">Login here</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
