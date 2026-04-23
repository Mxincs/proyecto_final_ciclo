<?php
require_once 'includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$error = '';
$exito = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = trim($_POST['nombre']);
    $email     = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);
    $rol       = $_POST['rol'];

    if (empty($nombre) || empty($email) || empty($contrasena)) {
        $error = 'Todos los campos son obligatorios.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El email no es válido.';
    } elseif (strlen($contrasena) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres.';
    } elseif ($rol === 'profesor') {

        // Validar código secreto solo si el rol es profesor
        $codigo = trim($_POST['codigo_profesor'] ?? '');
        if ($codigo !== CODIGO_PROFESOR) {
            $error = 'El código de acceso para profesores no es válido.';
        }
    }

    if (empty($error)) {

        // Comprobar si el email ya existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Ya existe una cuenta con ese email.';
        } else {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, contrasena, rol) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $email, $hash, $rol]);
            $exito = 'Cuenta creada correctamente. Ya puedes iniciar sesión.';
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">
            <h1>CREAR CUENTA</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <?php if ($exito): ?>
                <p class="mensaje-exito"><?= htmlspecialchars($exito) ?></p>
                <a href="login.php" class="btn-auth">Ir al login</a>
            <?php else: ?>

            <form method="POST" action="registro.php">
                <div class="campo-form">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan García" required>
                </div>
                <div class="campo-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Ej: sucorreo@gmail.com" required>
                </div>
                <div class="campo-form">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Mínimo 6 caracteres" required>
                </div>
                <div class="campo-form">
                    <label for="rol">Rol</label>
                    <select id="rol" name="rol" onchange="toggleCodigoProfesor(this.value)">
                        <option value="alumno">Alumno</option>
                        <option value="profesor">Profesor</option>
                    </select>
                </div>

                <!-- Campo código profesor — oculto por defecto, aparece al seleccionar Profesor -->
                <div class="campo-form" id="campo-codigo" style="display: none;">
                    <label for="codigo_profesor">Código de acceso para profesores</label>
                    <input type="password" id="codigo_profesor" name="codigo_profesor" placeholder="Introduce el código secreto">
                    <p>El código se lo debe proporcionar el administrador</p>
                </div>

                <button type="submit" class="btn-auth">CREAR CUENTA</button>
            </form>

            <p class="enlace-auth">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>

            <?php endif; ?>
        </div>
    </div>
</main>

<script>

    // Muestra u oculta el campo de código según el rol seleccionado
    function toggleCodigoProfesor(rol) {
        const campo = document.getElementById('campo-codigo');
        campo.style.display = rol === 'profesor' ? 'flex' : 'none';
    }
</script>

<?php include 'includes/footer.php'; ?>