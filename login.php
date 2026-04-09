<?php
require_once 'includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Si ya hay sesión iniciada redirigir
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    if (empty($email) || empty($contrasena)) {
        $error = 'Todos los campos son obligatorios.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            if ($usuario['rol'] === 'profesor') {
                header('Location: profesor/gestionar_cursos.php');
            } else {
                header('Location: alumno/rutinas.php');
            }
            exit;
        } else {
            $error = 'Email o contraseña incorrectos.';
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">
            <h1>INICIAR SESIÓN</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="campo-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="campo-form">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                <button type="submit" class="btn-auth">ENTRAR</button>
            </form>

            <p class="enlace-auth">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>