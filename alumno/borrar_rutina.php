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

// Verificar que la rutina pertenece al usuario antes de borrar
$stmt = $pdo->prepare("SELECT id FROM rutinas WHERE id = ? AND id_usuario = ?");
$stmt->execute([$id_rutina, $id_usuario]);
$rutina = $stmt->fetch();

if (!$rutina) {
    header('Location: rutinas.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM rutinas WHERE id = ? AND id_usuario = ?");
$stmt->execute([$id_rutina, $id_usuario]);

header('Location: rutinas.php');
exit;
?>