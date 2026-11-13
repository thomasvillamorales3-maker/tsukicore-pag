<?php
require 'db.php';

if (isset($_SESSION['usuario_id'])) {
    header("Location: pmarca.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Crear Cuenta - TSUKI-CORE</title>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pmarca.css">
    <style>
        .auth-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem; background: linear-gradient(180deg, #2d1b4e 0%, #0a0a0a 50%, #2d1b4e 100%); }
        .auth-card { background: rgba(30, 18, 50, 0.8); border: 1px solid rgba(120, 80, 180, 0.4); border-radius: 16px; padding: 3rem; width: 100%; max-width: 450px; box-shadow: 0 20px 50px rgba(0,0,0,0.8); text-align: center; backdrop-filter: blur(10px); }
        .auth-card h2 { font-family: 'Archivo Black', sans-serif; color: #fff; font-size: 1.8rem; margin-bottom: 2rem; letter-spacing: 1px; }
        .auth-form input { width: 100%; padding: 0.9rem 1.2rem; margin-bottom: 1.2rem; background: rgba(10, 5, 20, 0.6); border: 1px solid rgba(120, 80, 180, 0.4); border-radius: 8px; color: #fff; font-family: 'Satoshi', sans-serif; outline: none; transition: border-color 0.3s; }
        .auth-form input:focus { border-color: #b388ff; box-shadow: 0 0 15px rgba(179, 136, 255, 0.2); }
        .btn-enviar { width: 100%; padding: 1rem; background: linear-gradient(135deg, #b388ff, #7c4dff); border: none; border-radius: 8px; color: #fff; font-family: 'Archivo Black', sans-serif; font-size: 1rem; cursor: pointer; transition: transform 0.2s; margin-top: 1rem; }
        .btn-enviar:hover { transform: scale(1.02); }
        .auth-link { display: block; margin-top: 1.5rem; color: rgba(255,255,255,0.6); font-family: 'Satoshi', sans-serif; text-decoration: none; font-size: 0.9rem; }
        .auth-link:hover { color: #b388ff; }
        .error-php { color: #ff6b6b; font-family: 'Satoshi', sans-serif; margin-bottom: 1rem; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <h2>Crear Cuenta</h2>
            
            <?php if(isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
                <p class="error-php">Este correo ya está registrado.</p>
            <?php endif; ?>

            <form action="auth.php" method="POST" class="auth-form">
                <input type="text" name="nombre" placeholder="Tu Nombre" required>
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" name="register" class="btn-enviar">Registrarse</button>
            </form>
            
            <a href="login.php" class="auth-link">¿Ya tienes cuenta? Inicia sesión aquí</a>
            <a href="pmarca.php" class="auth-link" style="margin-top: 0.5rem; color: rgba(255,255,255,0.4);">Volver al inicio</a>
        </div>
    </div>
</body>
</html>