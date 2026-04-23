<?php
require_once 'includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Vista pública — cualquier visitante puede ver los cursos
$stmt = $pdo->query("
    SELECT cursos.*, usuarios.nombre AS nombre_profesor 
    FROM cursos 
    JOIN usuarios ON cursos.id_profesor = usuarios.id 
    ORDER BY cursos.created_at DESC
");
$cursos = $stmt->fetchAll();

?>

<?php include 'includes/header.php'; ?>

<main>
    <div class="contenedor-panel">

        <div class="panel-header">
            <h1>CURSOS</h1>
        </div>

        <?php if (empty($cursos)): ?>
            <p class="panel-vacio">No hay cursos disponibles en este momento.</p>
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
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>