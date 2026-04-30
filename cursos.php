<?php
require_once 'includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Obtener todos los cursos
$stmt = $pdo->query("
    SELECT cursos.*, usuarios.nombre AS nombre_profesor 
    FROM cursos 
    JOIN usuarios ON cursos.id_profesor = usuarios.id 
    ORDER BY cursos.created_at DESC
");
$cursos = $stmt->fetchAll();

// Si el usuario es alumno, obtener sus inscripciones para saber en cuáles ya está
$inscripciones_alumno = [];
if (isset($_SESSION['usuario']) && $_SESSION['rol'] === 'alumno') {
    $stmt2 = $pdo->prepare("SELECT id_curso FROM inscripciones WHERE id_alumno = ?");
    $stmt2->execute([$_SESSION['usuario']]);
    $inscripciones_alumno = array_column($stmt2->fetchAll(), 'id_curso');
}
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

                        <!-- Botón de inscripción solo para alumnos -->
                        <?php if (isset($_SESSION['usuario']) && $_SESSION['rol'] === 'alumno'): ?>
                            <div class="tarjeta-panel-acciones">
                                <?php if (in_array($curso['id'], $inscripciones_alumno)): ?>
                                    <span class="btn-inscrito">✓ INSCRITO</span>
                                <?php else: ?>
                                    <a href="alumno/inscribirse.php?id=<?= $curso['id'] ?>" class="btn-editar">INSCRIBIRSE</a>
                                <?php endif; ?>
                            </div>
                        <?php elseif (!isset($_SESSION['usuario'])): ?>
                            
                            <!-- Usuario no logueado: invitar a registrarse -->
                            <div class="tarjeta-panel-acciones">
                                <a href="login.php" class="btn-editar">INICIAR SESIÓN PARA INSCRIBIRSE</a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include 'includes/footer.php'; ?>