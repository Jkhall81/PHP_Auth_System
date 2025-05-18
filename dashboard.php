<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/auth.php';

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    redirect('login.php');
}

$user = $auth->getUser();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Auth System</a>
            <div class="navbar-nav">
                <span class="nav-item nav-link">Welcome, <?php echo htmlspecialchars($user['username']); ?></span>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>User Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                        <p>Member since: <?php echo date('F j, Y', strtotime($user['created_at'] ?? 'now')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>