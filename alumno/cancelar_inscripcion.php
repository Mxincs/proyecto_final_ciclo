<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Solo alumnos logueados
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'alumno') {
    header('Location: ../login.php');
    exit;
}

$id_alumno      = $_SESSION['usuario'];
$id_inscripcion = $_GET['id'] ?? null;

if (!$id_inscripcion) {
    header('Location: mis_cursos.php');
    exit;
}

// Verificar que la inscripción pertenece a este alumno antes de borrar
$stmt = $pdo->prepare("SELECT id FROM inscripciones WHERE id = ? AND id_alumno = ?");
$stmt->execute([$id_inscripcion, $id_alumno]);
if (!$stmt->fetch()) {
    header('Location: mis_cursos.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM inscripciones WHERE id = ? AND id_alumno = ?");
$stmt->execute([$id_inscripcion, $id_alumno]);

header('Location: mis_cursos.php');
exit;
?>