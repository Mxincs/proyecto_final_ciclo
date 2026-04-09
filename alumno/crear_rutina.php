<?php
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}

$error = '';
$exito = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $id_usuario = $_SESSION['usuario'];

    if (empty($titulo)) {
        $error = 'El título es obligatorio.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO rutinas (titulo, descripcion, id_usuario) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $descripcion, $id_usuario]);
        header('Location: rutinas.php');
        exit;
    }
}
?>

<?php include '../includes/header.php'; ?>

<main>
    <div class="contenedor-auth">
        <div class="caja-auth">
            <h1>NUEVA RUTINA</h1>

            <?php if ($error): ?>
                <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="POST" action="crear_rutina.php">
                <div class="campo-form">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="campo-form">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="5"></textarea>
                </div>
                <button type="submit" class="btn-auth">CREAR RUTINA</button>
            </form>

            <p class="enlace-auth"><a href="rutinas.php">← Volver a mis rutinas</a></p>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>