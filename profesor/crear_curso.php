<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Solo profesores pueden acceder
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'profesor') {
    header('Location: ../index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo      = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $duracion    = trim($_POST['duracion']);
    $precio      = trim($_POST['precio']);
    $id_profesor = $_SESSION['usuario'];

    if (empty($titulo)) {
        $error = 'El título es obligatorio.';
    } else {
        $precio = $precio !== '' ? $precio : null;
        $stmt = $pdo->prepare("INSERT INTO cursos (titulo, descripcion, duracion, precio, id_profesor) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $descripcion, $duracion, $precio, $id_profesor]);
        header('Location: gestionar_cursos.php');
        exit;
    }
}
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">
            <h1>NUEVO CURSO</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST" action="crear_curso.php">
                <div class="campo-form">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="campo-form">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4"></textarea>
                </div>
                <div class="campo-form">
                    <label for="duracion">Duración (ej: 2 horas)</label>
                    <input type="text" id="duracion" name="duracion">
                </div>
                <div class="campo-form">
                    <label for="precio">Precio (€)</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0">
                </div>
                <button type="submit" class="btn-auth">CREAR CURSO</button>
            </form>

            <p class="enlace-auth"><a href="gestionar_cursos.php">← Volver a gestionar cursos</a></p>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>