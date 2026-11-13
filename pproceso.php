<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Plantilla Proyecto - Proceso Creativo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/pproceso.css">
</head>
<body>

<div class="main-wrapper">

    <!-- ========== BARRA SUPERIOR ========== -->
    <nav class="barra-superior">
        <a href="pmarca.php" class="logo-mini">
            <img src="logos/logo2.png" alt="TSUKI-CORE" style="height: 35px; width: auto; object-fit: contain;">
        </a>
        <div class="nav-mini">
            <a href="pmarca.php">Nuestra Marca</a>
            <a href="prot.php">Juego</a>
            <a href="pproceso.php" class="activo">Proceso Creativo</a>
            
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <div class="user-menu">
                    <span class="user-name">Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?> ▼</span>
                    <div class="user-dropdown">
                        <a href="auth.php?logout=true">Cerrar Sesión</a>
                        <a href="auth.php?delete_account=true" onclick="return confirm('¿Seguro que quieres eliminar tu cuenta?');" class="delete-link">Eliminar Cuenta</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.php" class="nav-btn-login">Iniciar Sesión</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- ========== CONTENEDOR DE BLOQUEO ========== -->
    <div class="lock-container" id="lockContainer">
        
        <!-- TÍTULO PRINCIPAL -->
        <h1 class="titulo-principal" id="tituloPrincipal">
            ¿Quieres ver cómo hicimos<br>
            todo el proyecto?<br>
            <span class="subtitulo-degradado">Introduce la contraseña</span>
        </h1>

        <!-- FORMULARIO DE CONTRASEÑA (CUADRITOS) -->
        <form class="password-form" id="passwordForm">
            <div class="input-cuadritos" id="inputCuadritos">
                <input type="text" class="char-box" maxlength="1" autocomplete="off" spellcheck="false">
                <input type="text" class="char-box" maxlength="1" autocomplete="off" spellcheck="false">
                <input type="text" class="char-box" maxlength="1" autocomplete="off" spellcheck="false">
                <input type="text" class="char-box" maxlength="1" autocomplete="off" spellcheck="false">
                <input type="text" class="char-box" maxlength="1" autocomplete="off" spellcheck="false">
                <input type="text" class="char-box" maxlength="1" autocomplete="off" spellcheck="false">
            </div>
            <p class="error-msg" id="errorMsg">Contraseña incorrecta. Inténtalo de nuevo.</p>
        </form>

    </div> <!-- Cierra lock-container -->

    <!-- ========== GALERÍA DESBLOQUEADA ========== -->
    <div class="unlocked-content" id="unlockedContent">
        <h2 class="mensaje-desbloqueado">¡Desbloqueado!</h2>
        
        <div class="galeria-proceso">
            <!-- Ya no usamos clases como box-vertical, la imagen manda -->
            <div class="media-box">
                <video src="galeria/1(1).mp4" alt="Proceso 1">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(1).jpeg" alt="Proceso 2">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(2).jpeg" alt="Proceso 3">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(3).jpeg" alt="Proceso 4">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(4).jpeg" alt="Proceso 5">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(5).jpeg" alt="Proceso 6">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(6).jpeg" alt="Proceso 7">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(7).jpeg" alt="Proceso 8">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(8).jpeg" alt="Proceso 9">
            </div>

            <div class="media-box">
                <img src="galeria/1(9).jpeg" alt="Proceso 10">
            </div>

            <div class="media-box">
                <img src="galeria/1(10).jpeg" alt="Proceso 11">
            </div>

            <div class="media-box">
                <img src="galeria/1(11).jpeg" alt="Proceso 12">
            </div>

            <div class="media-box">
                <img src="galeria/1(12).jpeg" alt="Proceso 13">
            </div>
            
            <div class="media-box">
                <img src="galeria/1(13).jpeg" alt="Proceso 14">
            </div>
        </div>
    </div>

    <!-- ========== PISTA SECRETA ========== -->
    <p class="hint-password" id="hintPassword">Pista: Animal representativo de nuestro proyecto</p>

</div> <!-- Cierra main-wrapper -->

<!-- ========== SCRIPT: VALIDAR CONTRASEÑA Y TRANSICIÓN ========== -->
<script>
    const form = document.getElementById('passwordForm');
    const inputs = document.querySelectorAll('.char-box');
    const errorMsg = document.getElementById('errorMsg');
    const lockContainer = document.getElementById('lockContainer');
    const unlockedContent = document.getElementById('unlockedContent');
    const pista = document.getElementById('hintPassword');
    const mainWrapper = document.querySelector('.main-wrapper');
    
    const CONTRASENA_CORRECTA = "CUERVO";

    function verificarPalabra() {
        let palabraIngresada = "";
        inputs.forEach(input => palabraIngresada += input.value.toUpperCase());

        if (palabraIngresada.length === CONTRASENA_CORRECTA.length) {
            if (palabraIngresada === CONTRASENA_CORRECTA) {
                desbloquearGaleria();
            } else {
                mostrarError();
            }
        }
    }

    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            errorMsg.classList.remove('visible');
            e.target.value = e.target.value.toUpperCase();

            if (e.target.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
            verificarPalabra();
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                inputs[index - 1].focus();
            }
            if (e.key === 'ArrowLeft' && index > 0) {
                inputs[index - 1].focus();
            }
            if (e.key === 'ArrowRight' && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener('paste', (e) => {
            e.preventDefault();
            const pasteData = e.clipboardData.getData('text').toUpperCase().trim();
            if (pasteData.length > 0) {
                const chars = pasteData.split('');
                for (let i = 0; i < inputs.length && i < chars.length; i++) {
                    inputs[i].value = chars[i];
                }
                if (chars.length >= inputs.length) {
                    inputs[inputs.length - 1].focus();
                } else {
                    inputs[chars.length].focus();
                }
                verificarPalabra();
            }
        });
    });

    function desbloquearGaleria() {
        lockContainer.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        lockContainer.style.opacity = '0';
        lockContainer.style.transform = 'translateY(-20px)';

        setTimeout(() => {
            lockContainer.style.display = 'none';
            pista.style.display = 'none';

            unlockedContent.style.opacity = '0';
            unlockedContent.style.transform = 'translateY(30px)';
            unlockedContent.style.display = 'block';
            mainWrapper.classList.add('scroll-activado');

            setTimeout(() => {
                unlockedContent.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                unlockedContent.style.opacity = '1';
                unlockedContent.style.transform = 'translateY(0)';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }, 50);
        }, 600); 
    }

    function mostrarError() {
        errorMsg.classList.add('visible');
        inputs.forEach(input => {
            input.classList.add('shake');
            input.style.borderColor = '#ff6b6b'; 
        });
        
        setTimeout(() => {
            inputs.forEach(input => {
                input.classList.remove('shake');
                input.style.borderColor = ''; 
                input.value = ''; 
            });
            inputs[0].focus();
        }, 600);
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault(); 
    });
</script>

</body>
</html>