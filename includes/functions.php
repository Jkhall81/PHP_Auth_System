<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function redirect($url)
{
    header("Location: $url");
    exit();
}

function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

function displayError($error)
{
    if (!empty($error)) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
}

function displaySuccess($message)
{
    if (!empty($message)) {
        echo '<div class="alert alert-success">' . $message . '</div>';
    }
}

function csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validate_csrf($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
