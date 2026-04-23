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

// Verificar que el curso pertenece a este profesor antes de borrar
$stmt = $pdo->prepare("SELECT id FROM cursos WHERE id = ?");
$stmt->execute([$id_curso]);
$curso = $stmt->fetch();

if (!$curso) {
    header('Location: gestionar_cursos.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
$stmt->execute([$id_curso]);

header('Location: gestionar_cursos.php');
exit;
?>