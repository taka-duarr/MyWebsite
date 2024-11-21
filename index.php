<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['user_login'])) {
    // Jika sudah login, arahkan ke dashboard
    require_once "./dashboard.php";
    exit;
} else {
    // Jika belum login, arahkan ke halaman login
    require_once "./login.php";
    exit;
}
?>