<?php
session_start();

$valid_username = "nash";
$valid_password = "password";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($valid_username == $username && $valid_password == $password) {
    $_SESSION['username'] = $username;
    $_SESSION['authenticated'] = true;
    header('Location: /index.php');
    exit;
} else {
    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
    } else {
        $_SESSION['failed_attempts'] += 1;
    }
    header('Location: /login.php');
    exit;
}

