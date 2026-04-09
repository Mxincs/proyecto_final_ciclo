<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}

$id_usuario = $_SESSION['usuario'];
$id_rutina = $_GET['id'] ?? null;

if (!$id_rutina) {
    header('Location: rutinas.php');
    exit;
}

// Verificar que la rutina pertenece al usuario
$stmt = $pdo->prepare("SELECT * FROM rutinas WHERE id = ? AND id_usuario = ?");
$stmt->execute([$id_rutina, $id_usuario]);
$rutina = $stmt->fetch();

if (!$rutina) {
    header('Location: rutinas.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);

    if (empty($titulo)) {
        $error = 'El título es obligatorio.';
    } else {
        $stmt = $pdo->prepare("UPDATE rutinas SET titulo = ?, descripcion = ? WHERE id = ? AND id_usuario = ?");
        $stmt->execute([$titulo, $descripcion, $id_rutina, $id_usuario]);
        header('Location: rutinas.php');
        exit;
    }
}
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">
            <h1>EDITAR RUTINA</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST" action="editar_rutina.php?id=<?= $id_rutina ?>">
                <div class="campo-form">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($rutina['titulo']) ?>" required>
                </div>
                <div class="campo-form">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="5"><?= htmlspecialchars($rutina['descripcion']) ?></textarea>
                </div>
                <button type="submit" class="btn-auth">GUARDAR CAMBIOS</button>
            </form>

            <p class="enlace-auth"><a href="rutinas.php">← Volver a mis rutinas</a></p>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>