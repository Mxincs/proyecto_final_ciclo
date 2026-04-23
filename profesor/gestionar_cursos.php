<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Solo profesores pueden acceder
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'profesor') {
    header('Location: ../index.php');
    exit;
}

// Obtener todos los cursos creados por este profesor
$stmt = $pdo->prepare("
    SELECT cursos.*, usuarios.nombre AS nombre_profesor 
    FROM cursos 
    JOIN usuarios ON cursos.id_profesor = usuarios.id 
    ORDER BY cursos.created_at DESC
");
$stmt->execute();
$cursos = $stmt->fetchAll();

?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-panel">

        <div class="panel-header">
            <h1>GESTIONAR CURSOS</h1>
            <a href="crear_curso.php" class="btn-panel">+ NUEVO CURSO</a>
        </div>

        <?php if (empty($cursos)): ?>
            <p class="panel-vacio">No has creado ningún curso todavía. ¡Crea tu primer curso!</p>
        <?php else: ?>
            <div class="lista-panel">
                <?php foreach ($cursos as $curso): ?>
                    <div class="tarjeta-panel">
                        <div class="tarjeta-panel-info">
                            <h3><?= htmlspecialchars($curso['titulo']) ?></h3>
                            <p>
                                <?= htmlspecialchars($curso['descripcion']) ?>
                                <?php if ($curso['duracion'] || $curso['precio']): ?>
                                    <br>
                                    <?php if ($curso['duracion']): ?>
                                        <strong>Duración:</strong> <?= htmlspecialchars($curso['duracion']) ?>
                                    <?php endif; ?>
                                    <?php if ($curso['precio']): ?>
                                        — <strong>Precio:</strong> <?= number_format($curso['precio'], 2) ?> €
                                    <?php endif; ?>
                                <?php endif; ?>
                                <br><em>Creado por: <?= htmlspecialchars($curso['nombre_profesor']) ?></em>
                            </p>
                        </div>
                        <div class="tarjeta-panel-acciones">
                            <a href="editar_curso.php?id=<?= $curso['id'] ?>" class="btn-editar">EDITAR</a>
                            <a href="borrar_curso.php?id=<?= $curso['id'] ?>" class="btn-borrar"
                               onclick="return confirm('¿Seguro que quieres eliminar este curso?')">BORRAR</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include '../includes/footer.php'; ?>