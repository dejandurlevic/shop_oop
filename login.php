<?php
require_once 'app/config/config.php';
require_once 'app/classes/User.php';

$user = new User();

if($user->is_logged()){
    header('location: index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $loged = $user->login($email, $password);

     if(!$loged){
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'Incorrect username or password!';
        header('location: login.php');
        exit();
    }

        header('location: index.php');
        exit();
}
require_once 'inc/header.php';
?>

<div class="container  mt-5">

<?php if(isset($_SESSION['message'])) : ?>
            <div class='alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show' role="alert">
            <?php
            echo $_SESSION['message']['text'];
            unset($_SESSION['message']);
            ?>
            </div>
        <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Don't have an account? <a href="register.php">Register here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
