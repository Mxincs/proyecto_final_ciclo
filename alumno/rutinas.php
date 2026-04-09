<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Proteger la página — solo usuarios logueados
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}

$id_usuario = $_SESSION['usuario'];
$stmt = $pdo->prepare("SELECT * FROM rutinas WHERE id_usuario = ? ORDER BY created_at DESC");
$stmt->execute([$id_usuario]);
$rutinas = $stmt->fetchAll();
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-panel">

        <div class="panel-header">
            <h1>MIS RUTINAS</h1>
            <a href="crear_rutina.php" class="btn-panel">+ NUEVA RUTINA</a>
        </div>

        <?php if (empty($rutinas)): ?>
            <p class="panel-vacio">No tienes rutinas todavía. ¡Crea tu primera rutina!</p>
        <?php else: ?>
            <div class="lista-panel">
                <?php foreach ($rutinas as $rutina): ?>
                    <div class="tarjeta-panel">
                        <div class="tarjeta-panel-info">
                            <h3><?= htmlspecialchars($rutina['titulo']) ?></h3>
                            <p><?= htmlspecialchars($rutina['descripcion']) ?></p>
                        </div>
                        <div class="tarjeta-panel-acciones">
                            <a href="editar_rutina.php?id=<?= $rutina['id'] ?>" class="btn-editar">EDITAR</a>
                            <a href="borrar_rutina.php?id=<?= $rutina['id'] ?>" class="btn-borrar" onclick="return confirm('¿Seguro que quieres eliminar esta rutina?')">BORRAR</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include '../includes/footer.php'; ?>