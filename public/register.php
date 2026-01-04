<?php
require '../config/db.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre === '' || $email === '' || $password === '') {
        $errores[] = 'Todos los campos son obligatorios';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Email no válido';
    }

    if (empty($errores)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':nombre' => $nombre,
                ':email' => $email,
                ':password' => $hash
            ]);

            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $errores[] = 'El email ya está registrado';
            } else {
                $errores[] = 'Error al registrar usuario';
            }
        }
    }
}
?>

<?php include '../includes/header.php'; ?>

<h2>Registro</h2>

<?php if ($errores): ?>
    <ul style="color:red;">
        <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Nombre:</label><br>
    <input type="text" name="nombre"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Registrarse</button>
</form>

<?php include '../includes/footer.php'; ?>
