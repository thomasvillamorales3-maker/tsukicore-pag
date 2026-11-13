<?php
// db.php
$host = "localhost";
$user = "root"; // En WAMP por defecto es root
$password = ""; 
$dbname = "tsukicore_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Iniciamos sesión global para saber si el usuario está logueado
session_start();
?>