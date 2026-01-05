<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Online</title>
</head>
<body>

<header>
    <h1>Tienda Online</h1>
    <?php include __DIR__ . '/menu.php'; ?>
</header>

<hr>
