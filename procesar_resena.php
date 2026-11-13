<?php
require 'db.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $calificacion = intval($_POST['calificacion']);
    $comentario = $conn->real_escape_string($_POST['comentario']);

    // Verificamos si ya existe una reseña
    $check = $conn->query("SELECT id FROM resenas WHERE usuario_id = $usuario_id");
    
    if ($check->num_rows > 0) {
        // SI YA EXISTE: La actualizamos
        $sql = "UPDATE resenas SET calificacion = $calificacion, comentario = '$comentario' WHERE usuario_id = $usuario_id";
    } else {
        // SI NO EXISTE: La insertamos
        $sql = "INSERT INTO resenas (usuario_id, calificacion, comentario) VALUES ($usuario_id, $calificacion, '$comentario')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: prot.php");
    } else {
        echo "Error al guardar la reseña: " . $conn->error;
    }
}
?>