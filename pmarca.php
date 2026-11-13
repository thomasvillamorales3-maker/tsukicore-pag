<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Plantilla Proyecto - Marca</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/pmarca.css">
</head>
<body>

<!-- ========== BARRA COMPACTA ========== -->
<nav class="barra-compacta" id="barraCompacta">
        <a href="pmarca.php" class="logo-mini">
        <img src="logos/logo2.png" alt="TSUKI-CORE" style="height: 35px; width: auto; object-fit: contain;">
    </a>
        <div class="nav-mini">
        <a href="pmarca.php" class="activo">Nuestra Marca</a>
        <a href="prot.php">Juego</a>
        <a href="pproceso.php">Proceso Creativo</a>
        
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

<div class="main-wrapper">

    <!-- ========== BANNER ========== -->
    <header class="banner-horizontal" id="bannerGrande">
                <div class="logo">
            <img src="logos/logo.png" alt="TSUKI-CORE" style="height: 80px; width: auto; object-fit: contain;">
            
        </div>
        <nav class="nav">
                 <nav class="nav">
            <a href="pmarca.php">Nuestra Marca</a>
            <a href="prot.php">Juego</a>
            <a href="pproceso.php">Proceso Creativo</a>
            
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
        </nav>
    </header>

    <!-- ========== CONTENIDO ========== -->
    <div class="contenido-scroll">

        <div class="bloque">
            <div class="titulo">¿Quiénes somos?</div>
            <div class="texto">
                <p>
                    <span class="empresa">TSUKI-CORE</span> es una empresa encargada de la creación y distribución
                    de juegos independientes, principalmente enfocada en promover la autenticidad y creatividad
                    de sus lanzamientos.
                </p>
            </div>
        </div>

        <div class="bloque">
            <div class="titulo">Nuestro origen</div>
            <div class="texto">
                <p>
                    Desde inicios de 2025 nos venían hablando del proyecto de grado, ese requisito para cumplir
                    el sueño de graduarnos. Nosotros mismos tuvimos la experiencia de exponer en la feria de ese
                    año el proyecto de OneTouch, una pulsera de ayuda para los más pequeños. Fue en esa ocasión
                    que nos dimos cuenta de la cantidad de caminos y posibilidades a explorar cuando llegara el
                    momento de trabajar en nuestro propio proyecto. Sin embargo, en ese mismo espacio notamos
                    algo: varios de los trabajos parecían hechos sin una iniciativa propia y genuina, como si
                    solo buscaran cumplir con el esfuerzo mínimo para conseguir su diploma.
                </p>
            </div>
        </div>

        <div class="bloque">
            <div class="titulo">Nuestra idea</div>
            <div class="texto">
                <p>
                    La idea de empresa nace en Noviembre de 2025, como fruto de la fascinación por el arte y los
                    videojuegos característica de los fundadores, e impulsados por la facilidad de creación que
                    el taller de diseño de páginas web nos ha proporcionado. Su propósito es crear un entorno
                    donde se prioricen los productos de origen independiente que favorezcan la innovación y la
                    creatividad, también aumentando la atención que pueden recibir dentro de la industria.
                </p>
            </div>
        </div>

        <!-- ========== LÍNEA DE TIEMPO ========== -->
        <div class="timeline-seccion">
            <div class="titulo-seccion">Línea del tiempo</div>
            <p class="subtitulo-seccion">El recorrido de la empresa desde su concepción hasta su maquetación virtual.</p>

            <div class="timeline-horizontal">
                <div class="timeline-h-item">
                    <div class="contenido">
                        <span class="fecha">Nov, 2025</span>
                        <div class="punto"></div>
                        <p class="descripcion">Creación del concepto de la empresa</p>
                    </div>
                </div>
                <div class="timeline-h-item">
                    <div class="contenido">
                        <span class="fecha">Feb, 2026</span>
                        <div class="punto"></div>
                        <p class="descripcion">Comienzo de estructuración de la empresa</p>
                    </div>
                </div>
                <div class="timeline-h-item">
                    <div class="contenido">
                        <span class="fecha">Mar/Abr, 2026</span>
                        <div class="punto"></div>
                        <p class="descripcion">Creación de ideas y bocetos para su primer entrega</p>
                    </div>
                </div>
                <div class="timeline-h-item">
                    <div class="contenido">
                        <span class="fecha">Jun, 2026</span>
                        <div class="punto"></div>
                        <p class="descripcion">Primer esfuerzo de ejecución de su primera entrega</p>
                    </div>
                </div>
                <div class="timeline-h-item">
                    <div class="contenido">
                        <span class="fecha">Ago, 2026</span>
                        <div class="punto"></div>
                        <p class="descripcion">Inicio de creación de identidad corporativa</p>
                    </div>
                </div>
                <div class="timeline-h-item">
                    <div class="contenido">
                        <span class="fecha">Sep, 2026</span>
                        <div class="punto"></div>
                        <p class="descripcion">Inicio de maquetación virtual de la empresa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== MISIÓN Y VISIÓN ========== -->
        <div class="mv-seccion">
            <div class="titulo">Misión y Visión</div>
            <div class="mv-grid">
                <div class="mv-card">
                    <h4>Misión</h4>
                    <p>
                        Crear videojuegos independientes con fundamentos creativos, distintivos e inmersivos
                        para captar la atención de los grandes públicos, enfocándonos en el desarrollo de
                        funciones cognitivas, como la lógica, la memoria y la creatividad.
                    </p>
                </div>
                <div class="mv-card">
                    <h4>Visión</h4>
                    <p>
                        Demostrar el valor de los juegos independientes a través de nuestros productos,
                        popularizándolos dentro del mercado público tradicional, con el objetivo de motivar
                        la inversión en ellos.
                    </p>
                </div>
            </div>
        </div>

        <!-- ========== VISOR DE DOCUMENTO TIPO LIBRO ========== -->
        <div class="pdf-seccion">
            <div class="titulo">Manual de Identidad</div>
            <p class="subtitulo-seccion">Acá puedes ver los parametros que seguimos paara nuestras piezas publicitarias.</p>
            
            <div class="libro-wrapper">
                <!-- Este es el contenedor que la librería convertirá en libro -->
                <div id="book" class="libro">
                    
                    <!-- ================= PÁGINAS DEL LIBRO ================= -->
                    <div class="pagina-libro" data-density="hard">
                        <div class="contenido-pagina"><img src="img/1.jpg" alt="Página 1"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/2.jpg" alt="Página 2"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/3.jpg" alt="Página 3"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/4.jpg" alt="Página 4"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/5.jpg" alt="Página 5"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/6.jpg" alt="Página 6"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/7.jpg" alt="Página 7"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/8.jpg" alt="Página 8"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/9.jpg" alt="Página 9"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/10.jpg" alt="Página 10"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/11.jpg" alt="Página 11"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/12.jpg" alt="Página 12"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/13.jpg" alt="Página 13"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/14.jpg" alt="Página 14"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/15.jpg" alt="Página 15"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/16.jpg" alt="Página 16"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/17.jpg" alt="Página 17"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/18.jpg" alt="Página 18"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/19.jpg" alt="Página 19"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/20.jpg" alt="Página 20"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/21.jpg" alt="Página 21"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/22.jpg" alt="Página 22"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/23.jpg" alt="Página 23"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/24.jpg" alt="Página 24"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/25.jpg" alt="Página 25"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/26.jpg" alt="Página 26"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/27.jpg" alt="Página 27"></div>
                    </div>
                    <div class="pagina-libro" data-density="hard">
                        <div class="contenido-pagina"><img src="img/28.jpg" alt="Página 28"></div>
                    </div>
                    <div class="pagina-libro">
                        <div class="contenido-pagina"><img src="img/29.jpg" alt="Página 27"></div>
                    </div>
                    <div class="pagina-libro" data-density="hard">
                        <div class="contenido-pagina"><img src="img/30.jpg" alt="Página 28"></div>
                    </div>
                    <!-- ====================================================== -->

                </div>
            </div>
        </div>

    </div>

</div>

<!-- Librerías para el efecto de libro (StPageFlip) -->
<script src="https://unpkg.com/page-flip/dist/js/page-flip.browser.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const bookElement = document.getElementById('book');
        
        const pageFlip = new St.PageFlip(bookElement, {
            width: 800, // Base horizontal
            height: 450, // Base horizontal
            size: "stretch", 
            minWidth: 400,
            maxWidth: 1000,
            minHeight: 225,
            maxHeight: 600,
            drawShadow: true, 
            showCover: true, 
            mobileScrollSupport: true 
        });

        pageFlip.loadFromHTML(document.querySelectorAll('.pagina-libro'));
        
        // Esto obliga a la librería a recalcular el tamaño si la ventana cambia
        window.addEventListener('resize', () => {
            pageFlip.update();
        });
    });
</script>

<!-- ========== SCRIPT: BARRA COMPACTA ========== -->
<script>
    (function () {
        const banner = document.getElementById('bannerGrande');
        const barra = document.getElementById('barraCompacta');

        if (!banner || !barra) {
            console.warn('No se encontró el banner o la barra compacta');
            return;
        }

        function actualizarBarra() {
            const alturaBanner = banner.getBoundingClientRect().height;
            const umbral = alturaBanner * 0.8;

            if (window.scrollY > umbral) {
                barra.classList.add('visible');
            } else {
                barra.classList.remove('visible');
            }
        }

        window.addEventListener('scroll', actualizarBarra, { passive: true });
        window.addEventListener('resize', actualizarBarra);
        actualizarBarra();
    })();
</script>
<script>
    // Lógica del Modal de Login
    const btnAbrir = document.getElementById('btn-abrir-login');
    const modal = document.getElementById('modalLogin');
    const btnCerrar = document.getElementById('btn-cerrar-login');
    
    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');

    if(btnAbrir && modal) {
        btnAbrir.addEventListener('click', () => {
            modal.classList.add('visible');
        });

        btnCerrar.addEventListener('click', () => {
            modal.classList.remove('visible');
        });

        // Cerrar si se hace clic fuera del cuadro
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('visible');
            }
        });

        // Cambiar entre pestañas
        tabLogin.addEventListener('click', () => {
            tabLogin.classList.add('active');
            tabRegister.classList.remove('active');
            formLogin.style.display = 'block';
            formRegister.style.display = 'none';
        });

        tabRegister.addEventListener('click', () => {
            tabRegister.classList.add('active');
            tabLogin.classList.remove('active');
            formLogin.style.display = 'none';
            formRegister.style.display = 'block';
        });
    }
</script>

</body>
</html>