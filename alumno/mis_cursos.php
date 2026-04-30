<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Solo alumnos logueados
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'alumno') {
    header('Location: ../login.php');
    exit;
}

$id_alumno = $_SESSION['usuario'];

// Obtener los cursos en los que está inscrito con todos los datos
$stmt = $pdo->prepare("
    SELECT cursos.*, usuarios.nombre AS nombre_profesor, inscripciones.fecha_inscripcion, inscripciones.id AS id_inscripcion
    FROM inscripciones
    JOIN cursos ON inscripciones.id_curso = cursos.id
    JOIN usuarios ON cursos.id_profesor = usuarios.id
    WHERE inscripciones.id_alumno = ?
    ORDER BY inscripciones.fecha_inscripcion DESC
");
$stmt->execute([$id_alumno]);
$cursos_inscritos = $stmt->fetchAll();
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-panel">

        <div class="panel-header">
            <h1>MIS CURSOS</h1>
            <a href="../cursos.php" class="btn-panel">+ BUSCAR CURSOS</a>
        </div>

        <?php if (isset($_GET['inscrito'])): ?>
            <p class="mensaje-exito" style="text-align:center; padding: 1rem;">
                ✓ ¡Inscripción realizada correctamente! Nos pondremos en contacto contigo pronto.
            </p>
        <?php endif; ?>

        <?php if (empty($cursos_inscritos)): ?>
            <p class="panel-vacio">No estás inscrito en ningún curso todavía. <a href="../cursos.php">Ver cursos disponibles</a>.</p>
        <?php else: ?>
            <div class="lista-panel">
                <?php foreach ($cursos_inscritos as $curso): ?>
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
                                <br><em>Profesor: <?= htmlspecialchars($curso['nombre_profesor']) ?></em>
                                <br><small>Inscrito el: <?= date('d/m/Y', strtotime($curso['fecha_inscripcion'])) ?></small>
                            </p>
                        </div>
                        <div class="tarjeta-panel-acciones">
                            <a href="cancelar_inscripcion.php?id=<?= $curso['id_inscripcion'] ?>" 
                               class="btn-borrar"
                               onclick="return confirm('¿Seguro que quieres cancelar tu inscripción en este curso?')">
                               CANCELAR
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include '../includes/footer.php'; ?>