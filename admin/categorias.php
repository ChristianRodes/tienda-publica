<?php
require '../includes/auth.php';
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');

    if ($nombre !== '') {
        $stmt = $pdo->prepare("INSERT INTO categorias (nombre) VALUES (:nombre)");
        $stmt->execute([':nombre' => $nombre]);
    }
}

$categorias = $pdo->query("SELECT * FROM categorias")->fetchAll();

include '../includes/header.php';
?>

<h2>Gestión de Categorías</h2>

<form method="post">
    <input type="text" name="nombre" placeholder="Nueva categoría">
    <button type="submit">Crear categoría</button>
</form>

<ul>
    <?php foreach ($categorias as $cat): ?>
        <li><?= htmlspecialchars($cat['nombre']) ?></li>
    <?php endforeach; ?>
</ul>

<?php include '../includes/footer.php'; ?>
