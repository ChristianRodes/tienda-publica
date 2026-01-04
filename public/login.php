<?php
session_start();
require '../config/db.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $errores[] = 'Email y contraseña obligatorios';
    }

    if (empty($errores)) {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND activo = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email'],
                'rol' => $usuario['rol']
            ];

            header('Location: index.php');
            exit;
        } else {
            $errores[] = 'Credenciales incorrectas';
        }
    }
}
?>

<?php include '../includes/header.php'; ?>

<h2>Iniciar sesión</h2>

<?php if ($errores): ?>
    <ul style="color:red;">
        <?php foreach ($errores as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Entrar</button>
</form>

<?php include '../includes/footer.php'; ?>
