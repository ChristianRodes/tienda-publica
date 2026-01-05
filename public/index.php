<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '../config/db.php';
include '../includes/header.php';

/* Obtener productos activos */
$stmt = $pdo->query("SELECT * FROM productos WHERE activo = 1");
$productos = $stmt->fetchAll();
?>

<h2>Tienda</h2>

<?php if (isset($_SESSION['mensaje_carrito'])): ?>
    <p style="background:#d4edda; padding:10px;">
        <?= $_SESSION['mensaje_carrito'] ?>
        (<?= array_sum(array_column($_SESSION['carrito'], 'cantidad')) ?> artículos)
        – <a href="carrito.php">Ver carrito</a>
    </p>
    <?php unset($_SESSION['mensaje_carrito']); ?>
<?php endif; ?>

<?php if (empty($productos)): ?>
    <p>No hay productos disponibles.</p>
<?php else: ?>
    <?php foreach ($productos as $producto): ?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
            <p><?= htmlspecialchars($producto['descripcion']) ?></p>
            <strong><?= number_format($producto['precio'], 2) ?> €</strong>

            <form method="post" action="carrito.php">
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                <input type="hidden" name="redirect" value="index">
                <button type="submit">Añadir al carrito</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>
