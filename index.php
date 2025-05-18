<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/auth.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    redirect('dashboard.php');
} else {
    redirect('login.php');
}
