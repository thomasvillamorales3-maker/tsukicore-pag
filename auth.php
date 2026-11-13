<?php
// auth.php
require 'db.php';

// --- REGISTRAR USUARIO ---
if (isset($_POST['register'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Verificar si el correo ya existe
    $check_email = $conn->query("SELECT id FROM usuarios WHERE email='$email'");
    if ($check_email->num_rows > 0) {
        header("Location: registro.php?error=email_exists");
        exit;
    }

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['usuario_id'] = $conn->insert_id;
        $_SESSION['usuario_nombre'] = $nombre;
        header("Location: pmarca.php"); // Redirige al inicio
    } else {
        echo "Error al registrar: " . $conn->error;
    }
}

// --- INICIAR SESIÓN ---
if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            header("Location: pmarca.php");
        } else {
            header("Location: login.php?error=1");
        }
    } else {
        header("Location: login.php?error=1");
    }
}

// --- CERRAR SESIÓN ---
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: pmarca.php");
}

// --- ELIMINAR CUENTA ---
if (isset($_GET['delete_account']) && isset($_SESSION['usuario_id'])) {
    $id = $_SESSION['usuario_id'];
    $conn->query("DELETE FROM usuarios WHERE id=$id");
    session_destroy();
    header("Location: pmarca.php");
}
?>