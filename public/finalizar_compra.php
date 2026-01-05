<?php
session_start();
require '../config/db.php';

/* ===============================
   SI NO HAY CARRITO → TIENDA
   =============================== */
if (empty($_SESSION['carrito'])) {
    header('Location: index.php');
    exit;
}

/* Usuario (puede ser invitado) */
$usuario_id = $_SESSION['usuario']['id'] ?? null;

/* Calcular total */
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}

try {
    $pdo->beginTransaction();

    /* Crear pedido */
    $stmt = $pdo->prepare("
        INSERT INTO pedidos (usuario_id, total, estado)
        VALUES (:usuario_id, :total, 'pagado')
    ");
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':total' => $total
    ]);

    $pedido_id = $pdo->lastInsertId();

    /* Detalle del pedido */
    $stmtDetalle = $pdo->prepare("
        INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, precio)
        VALUES (:pedido_id, :producto_id, :cantidad, :precio)
    ");

    foreach ($_SESSION['carrito'] as $producto_id => $item) {
        $stmtDetalle->execute([
            ':pedido_id' => $pedido_id,
            ':producto_id' => $producto_id,
            ':cantidad' => $item['cantidad'],
            ':precio' => $item['precio']
        ]);
    }

    $pdo->commit();

    /* Vaciar carrito */
    $_SESSION['carrito'] = [];

} catch (Exception $e) {
    $pdo->rollBack();
    die('Error al procesar el pedido');
}

include '../includes/header.php';
?>

<h2>Pedido confirmado</h2>

<p>Gracias por tu compra.</p>
<p><strong>Número de pedido:</strong> <?= $pedido_id ?></p>
<p><strong>Total pagado:</strong> <?= number_format($total, 2) ?> €</p>

<br>

<a href="index.php">Volver a la tienda</a>

<?php include '../includes/footer.php'; ?>
