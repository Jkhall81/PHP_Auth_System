<?php

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/auth.php';

$auth = new Auth();
$error = '';

if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    if (!validate_csrf($_POST['csrf_token'])) {
        $error = 'Invalid CSRF token';
    } else {
        $username = sanitize($_POST['username']);
        $password = $_POST['password'];

        if ($auth->login($username, $password)) {
            redirect('dashboard.php');
        } else {
            $error = 'Invalid username or password';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">
                    Login
                </h2>
                <?php displayError($error); ?>
                <form action="" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="register.php">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>