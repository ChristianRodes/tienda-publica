<nav>
    <a href="/tienda-publica/public/index.php">Inicio</a> |
    <a href="/tienda-publica/public/categorias.php">Categorías</a> |
    <a href="/tienda-publica/public/contacto.php">Contacto</a> |

    <?php if (isset($_SESSION['usuario'])): ?>
        Hola <strong><?= htmlspecialchars($_SESSION['usuario']['nombre']) ?></strong>
        (<?= $_SESSION['usuario']['rol'] ?>) |
        <a href="/tienda-publica/public/logout.php">Cerrar sesión</a>
    <?php else: ?>
        <a href="/tienda-publica/public/register.php">Registrarse</a> |
        <a href="/tienda-publica/public/login.php">Login</a>
    <?php endif; ?>
</nav>
