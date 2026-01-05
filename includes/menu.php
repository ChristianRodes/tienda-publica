<?php
// Contador del carrito (solo mostrar, NUNCA redirigir)
$carritoCantidad = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $carritoCantidad += $item['cantidad'];
    }
}
?>

<nav>
    <a href="/tienda-publica/public/index.php">Inicio</a> |
    <a href="/tienda-publica/public/carrito.php">
        Carrito (<?= $carritoCantidad ?>)
    </a> |

    <?php if (isset($_SESSION['usuario'])): ?>
        Hola <strong><?= htmlspecialchars($_SESSION['usuario']['nombre']) ?></strong>
        (<?= $_SESSION['usuario']['rol'] ?>)

        <?php if (
            $_SESSION['usuario']['rol'] === 'admin' ||
            $_SESSION['usuario']['rol'] === 'empleado'
        ): ?>
            | <a href="/tienda-publica/admin/index.php">Panel Admin</a>
        <?php endif; ?>

        | <a href="/tienda-publica/public/logout.php">Cerrar sesión</a>
    <?php else: ?>
        <a href="/tienda-publica/public/login.php">Login</a> |
        <a href="/tienda-publica/public/register.php">Registrarse</a>
    <?php endif; ?>
</nav>
