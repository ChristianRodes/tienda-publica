<?php
require '../includes/auth.php';
require '../config/db.php';

/* ===============================
   BAJA LÓGICA (ACTIVAR / DESACTIVAR)
   =============================== */
if (isset($_GET['desactivar'])) {
    $id = (int) $_GET['desactivar'];
    $stmt = $pdo->prepare("UPDATE productos SET activo = 0 WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header('Location: productos.php');
    exit;
}

if (isset($_GET['activar'])) {
    $id = (int) $_GET['activar'];
    $stmt = $pdo->prepare("UPDATE productos SET activo = 1 WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header('Location: productos.php');
    exit;
}

/* ===============================
   CREAR PRODUCTO
   =============================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $categoria_id = $_POST['categoria_id'] ?? '';

    if ($nombre !== '' && $precio !== '' && $categoria_id !== '') {
        $stmt = $pdo->prepare("
            INSERT INTO productos (nombre, descripcion, precio, categoria_id)
            VALUES (:nombre, :descripcion, :precio, :categoria_id)
        ");
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria_id' => $categoria_id
        ]);
    }
}

/* ===============================
   DATOS PARA LA VISTA
   =============================== */
$categorias = $pdo->query(
    "SELECT * FROM categorias WHERE activa = 1"
)->fetchAll();

$productos = $pdo->query(
    "SELECT p.*, c.nombre AS categoria
     FROM productos p
     JOIN categorias c ON p.categoria_id = c.id
     ORDER BY p.id DESC"
)->fetchAll();

include '../includes/header.php';
?>

<h2>Gestión de productos</h2>

<h3>Nuevo producto</h3>

<form method="post">
    <input type="text" name="nombre" placeholder="Nombre del producto" required><br><br>

    <textarea name="descripcion" placeholder="Descripción del producto"></textarea><br><br>

    <input type="number" step="0.01" name="precio" placeholder="Precio (€)" required><br><br>

    <select name="categoria_id" required>
        <option value="">-- Selecciona categoría --</option>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>">
                <?= htmlspecialchars($cat['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Crear producto</button>
</form>

<hr>

<h3>Listado de productos</h3>

<table border="1" cellpadding="6">
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>

    <?php foreach ($productos as $prod): ?>
        <tr>
            <td><?= htmlspecialchars($prod['nombre']) ?></td>
            <td><?= number_format($prod['precio'], 2) ?> €</td>
            <td><?= htmlspecialchars($prod['categoria']) ?></td>
            <td><?= $prod['activo'] ? 'Activo' : 'Inactivo' ?></td>
            <td>
                <?php if ($prod['activo']): ?>
                    <a href="?desactivar=<?= $prod['id'] ?>">Desactivar</a>
                <?php else: ?>
                    <a href="?activar=<?= $prod['id'] ?>">Activar</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>
