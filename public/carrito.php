<?php
session_start();
require '../config/db.php';
include '../includes/header.php';

/* Inicializar carrito si no existe */
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

/* ===============================
   AÑADIR PRODUCTO
   =============================== */
if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id AND activo = 1");
    $stmt->execute([':id' => $id]);
    $producto = $stmt->fetch();

    if ($producto) {
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$id] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => 1
            ];
        }

        $_SESSION['mensaje_carrito'] = 'Producto añadido al carrito';
    }

    /* Volver a index si venía de ahí */
    if (isset($_POST['redirect']) && $_POST['redirect'] === 'index') {
        header('Location: index.php');
        exit;
    }
}

/* ===============================
   INCREMENTAR / DECREMENTAR
   =============================== */
if (isset($_GET['sumar'])) {
    $id = (int) $_GET['sumar'];
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']++;
    }
}

if (isset($_GET['restar'])) {
    $id = (int) $_GET['restar'];
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']--;
        if ($_SESSION['carrito'][$id]['cantidad'] <= 0) {
            unset($_SESSION['carrito'][$id]);
        }
    }
}

/* ===============================
   ELIMINAR PRODUCTO
   =============================== */
if (isset($_GET['eliminar'])) {
    $id = (int) $_GET['eliminar'];
    unset($_SESSION['carrito'][$id]);
}

/* ===============================
   MOSTRAR CARRITO
   =============================== */
?>

<h2>Carrito de la compra</h2>

<?php if (empty($_SESSION['carrito'])): ?>
    <p>El carrito está vacío.</p>
    <a href="index.php">Volver a la tienda</a>

<?php else: ?>

<table border="1" cellpadding="6">
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th>Acciones</th>
    </tr>

    <?php
    $total = 0;
    foreach ($_SESSION['carrito'] as $id => $item):
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;
    ?>
        <tr>
            <td><?= htmlspecialchars($item['nombre']) ?></td>
            <td><?= number_format($item['precio'], 2) ?> €</td>
            <td>
                <a href="?restar=<?= $id ?>">−</a>
                <?= $item['cantidad'] ?>
                <a href="?sumar=<?= $id ?>">+</a>
            </td>
            <td><?= number_format($subtotal, 2) ?> €</td>
            <td>
                <a href="?eliminar=<?= $id ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td colspan="2"><strong><?= number_format($total, 2) ?> €</strong></td>
    </tr>
</table>

<br>

<a href="index.php">Seguir comprando</a> |
<a href="finalizar_compra.php">Finalizar compra</a>

<?php endif; ?>

<?php include '../includes/footer.php'; ?>
