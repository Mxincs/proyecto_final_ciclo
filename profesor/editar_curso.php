<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Solo profesores pueden acceder
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'profesor') {
    header('Location: ../index.php');
    exit;
}

$id_profesor = $_SESSION['usuario'];
$id_curso    = $_GET['id'] ?? null;

if (!$id_curso) {
    header('Location: gestionar_cursos.php');
    exit;
}

// Verificar que el curso pertenece a este profesor
$stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
$stmt->execute([$id_curso]);
$curso = $stmt->fetch();

if (!$curso) {
    header('Location: gestionar_cursos.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo      = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $duracion    = trim($_POST['duracion']);
    $precio      = trim($_POST['precio']);

    if (empty($titulo)) {
        $error = 'El título es obligatorio.';
    } else {
        $precio = $precio !== '' ? $precio : null;
        $stmt = $pdo->prepare("UPDATE cursos SET titulo = ?, descripcion = ?, duracion = ?, precio = ? WHERE id = ?");
        $stmt->execute([$titulo, $descripcion, $duracion, $precio, $id_curso]);
        header('Location: gestionar_cursos.php');
        exit;
    }
}
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">
            <h1>EDITAR CURSO</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST" action="editar_curso.php?id=<?= $id_curso ?>">
                <div class="campo-form">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo"
                           value="<?= htmlspecialchars($curso['titulo']) ?>" required>
                </div>
                <div class="campo-form">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4"><?= htmlspecialchars($curso['descripcion']) ?></textarea>
                </div>
                <div class="campo-form">
                    <label for="duracion">Duración (ej: 2 horas)</label>
                    <input type="text" id="duracion" name="duracion"
                           value="<?= htmlspecialchars($curso['duracion']) ?>">
                </div>
                <div class="campo-form">
                    <label for="precio">Precio (€)</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0"
                           value="<?= htmlspecialchars($curso['precio']) ?>">
                </div>
                <button type="submit" class="btn-auth">GUARDAR CAMBIOS</button>
            </form>

            <p class="enlace-auth"><a href="gestionar_cursos.php">← Volver a gestionar cursos</a></p>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>