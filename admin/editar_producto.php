<?php
require '../includes/auth.php';
require '../config/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: productos.php');
    exit;
}

/* Obtener producto */
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch();

if (!$producto) {
    header('Location: productos.php');
    exit;
}

/* Actualizar producto */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $categoria_id = $_POST['categoria_id'] ?? '';

    if ($nombre !== '' && $precio !== '' && $categoria_id !== '') {
        $stmt = $pdo->prepare("
            UPDATE productos 
            SET nombre = :nombre,
                descripcion = :descripcion,
                precio = :precio,
                categoria_id = :categoria_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria_id' => $categoria_id,
            ':id' => $id
        ]);

        header('Location: productos.php');
        exit;
    }
}

/* Categorías */
$categorias = $pdo->query("SELECT * FROM categorias WHERE activa = 1")->fetchAll();

include '../includes/header.php';
?>

<h2>Editar producto</h2>

<form method="post">
    <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>

    <textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea><br><br>

    <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required><br><br>

    <select name="categoria_id" required>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>"
                <?= $cat['id'] == $producto['categoria_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Guardar cambios</button>
    <a href="productos.php">Cancelar</a>
</form>

<?php include '../includes/footer.php'; ?>
