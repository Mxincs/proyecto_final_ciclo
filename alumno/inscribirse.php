<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Solo alumnos pueden inscribirse
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'alumno') {
    header('Location: ../login.php');
    exit;
}

$id_alumno = $_SESSION['usuario'];
$id_curso  = $_GET['id'] ?? null;

if (!$id_curso) {
    header('Location: ../cursos.php');
    exit;
}

// Obtener datos del curso
$stmt = $pdo->prepare("SELECT cursos.*, usuarios.nombre AS nombre_profesor FROM cursos JOIN usuarios ON cursos.id_profesor = usuarios.id WHERE cursos.id = ?");
$stmt->execute([$id_curso]);
$curso = $stmt->fetch();

if (!$curso) {
    header('Location: ../cursos.php');
    exit;
}

// Comprobar si ya está inscrito
$stmt = $pdo->prepare("SELECT id FROM inscripciones WHERE id_alumno = ? AND id_curso = ?");
$stmt->execute([$id_alumno, $id_curso]);
if ($stmt->fetch()) {
    header('Location: mis_cursos.php');
    exit;
}

// Obtener email del usuario desde la base de datos para pre-rellenar
$stmt = $pdo->prepare("SELECT email FROM usuarios WHERE id = ?");
$stmt->execute([$id_alumno]);
$usuario_db = $stmt->fetch();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_completo  = trim($_POST['nombre_completo']);
    $email            = trim($_POST['email']);
    $telefono         = trim($_POST['telefono']);
    $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
    $posicion         = trim($_POST['posicion']);
    $comentarios      = trim($_POST['comentarios']);

    $posiciones_validas = ['portero', 'defensa', 'centrocampista', 'delantero'];

    if (empty($nombre_completo) || empty($email) || empty($telefono) || empty($fecha_nacimiento) || empty($posicion)) {
        $error = 'Por favor, rellena todos los campos obligatorios.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El email no tiene un formato válido.';
    } elseif (!in_array($posicion, $posiciones_validas)) {
        $error = 'La posición seleccionada no es válida.';
    } else {
        $stmt = $pdo->prepare("
            INSERT INTO inscripciones (id_alumno, id_curso, nombre_completo, email, telefono, fecha_nacimiento, posicion, comentarios) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$id_alumno, $id_curso, $nombre_completo, $email, $telefono, $fecha_nacimiento, $posicion, $comentarios]);
        header('Location: mis_cursos.php?inscrito=1');
        exit;
    }
}
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">

            <h1>INSCRIPCIÓN AL CURSO</h1>
            <p style="text-align:center; margin-bottom: 1.5rem; color: #666;">
                <strong><?= htmlspecialchars($curso['titulo']) ?></strong><br>
                <?php if ($curso['duracion']): ?>
                    Duración: <?= htmlspecialchars($curso['duracion']) ?>
                <?php endif; ?>
                <?php if ($curso['precio']): ?>
                    — Precio: <?= number_format($curso['precio'], 2) ?> €
                <?php endif; ?>
            </p>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST" action="inscribirse.php?id=<?= $id_curso ?>">

                <div class="campo-form">
                    <label for="nombre_completo">Nombre completo *</label>
                    <input type="text" id="nombre_completo" name="nombre_completo" 
                           value="<?= htmlspecialchars($_POST['nombre_completo'] ?? $_SESSION['nombre']) ?>" 
                           required>
                </div>

                <div class="campo-form">
                    <label for="email">Email de contacto *</label>
                    <input type="email" id="email" name="email" 
                           value="<?= htmlspecialchars($_POST['email'] ?? $usuario_db['email']) ?>" 
                           required>
                </div>

                <div class="campo-form">
                    <label for="telefono">Teléfono de contacto *</label>
                    <input type="tel" id="telefono" name="telefono" 
                           value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>" 
                           placeholder="Ej: 600 123 456" required>
                </div>

                <div class="campo-form">
                    <label for="fecha_nacimiento">Fecha de nacimiento *</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                           value="<?= htmlspecialchars($_POST['fecha_nacimiento'] ?? '') ?>" 
                           required>
                </div>

                <div class="campo-form">
                    <label for="posicion">Posición en el campo *</label>
                    <select id="posicion" name="posicion" required>
                        <option value="">Selecciona tu posición</option>
                        <option value="portero"        <?= (($_POST['posicion'] ?? '') === 'portero')        ? 'selected' : '' ?>>Portero</option>
                        <option value="defensa"        <?= (($_POST['posicion'] ?? '') === 'defensa')        ? 'selected' : '' ?>>Defensa</option>
                        <option value="centrocampista" <?= (($_POST['posicion'] ?? '') === 'centrocampista') ? 'selected' : '' ?>>Centrocampista</option>
                        <option value="delantero"      <?= (($_POST['posicion'] ?? '') === 'delantero')      ? 'selected' : '' ?>>Delantero</option>
                    </select>
                </div>

                <div class="campo-form">
                    <label for="comentarios">Comentarios u observaciones</label>
                    <textarea id="comentarios" name="comentarios" rows="4" 
                              placeholder="Cualquier información adicional que quieras hacernos llegar..."><?= htmlspecialchars($_POST['comentarios'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn-auth">CONFIRMAR INSCRIPCIÓN</button>
            </form>

            <p class="enlace-auth"><a href="../cursos.php">← Volver a los cursos</a></p>

        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>