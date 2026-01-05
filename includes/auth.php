<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: /tienda-publica/public/login.php');
    exit;
}

$rol = $_SESSION['usuario']['rol'];

if ($rol !== 'admin' && $rol !== 'empleado') {
    // Usuario logueado pero sin permisos
    header('Location: /tienda-publica/public/index.php');
    exit;
}
