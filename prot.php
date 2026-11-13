<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Raveneye - TSUKI-CORE</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&display=swap" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/prot.css">
</head>
<body>

<div class="main-wrapper">

    <!-- ========== BARRA SUPERIOR ========== -->
    <nav class="barra-superior">
        <a href="pmarca.php" class="logo-mini">
            <img src="logos/logo2.png" alt="TSUKI-CORE" style="height: 40px; width: auto; object-fit: contain;">
        </a>
        <div class="nav-mini">
            <a href="pmarca.php">Nuestra Marca</a>
            <a href="prot.php" class="activo">Juego</a>
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

    <!-- ========== CONTENIDO ========== -->
    <div class="contenido-scroll">

        <!-- Presentación del Juego -->
        <div class="bloque">
            <div class="titulo">Raveneye</div>
            <div class="texto">
                <p>
                    Sumérgete en una experiencia narrativa donde el estado mental y la introspección 
                    son los verdaderos protagonistas. <strong>Raveneye</strong> es nuestro primer lanzamiento 
                    independiente, un viaje audiovisual diseñado para resonar contigo.
                </p>
            </div>
        </div>

        <!-- ========== CONTENEDOR DEL JUEGO (GODOT) ========== -->
        <div class="juego-seccion">
            <div class="game-wrapper">
                <!-- 
                  AQUÍ VA EL JUEGO DE GODOT. 
                  Cuando exportes tu juego a HTML5, renombra el archivo principal a "index.html" 
                  y mételo en una carpeta llamada "juego" (o ajusta la ruta en el src).
                -->
                <iframe src="juego/index.html" class="game-frame" allowfullscreen></iframe>
            </div>
        </div>

        <!-- ========== ZONA DE RESEÑAS ========== -->
        <div class="resenas-seccion">
            <div class="titulo">Reseñas del Juego</div>
            <p class="subtitulo-seccion">Comparte tu experiencia con Raveneye.</p>

            <!-- Formulario de Reseña (Ver, Crear o Editar) -->
            <?php if(isset($_SESSION['usuario_id'])): 
                $id_user = $_SESSION['usuario_id'];
                // Buscamos si el usuario ya tiene una reseña y traemos sus datos
                $check_resena = $conn->query("SELECT calificacion, comentario FROM resenas WHERE usuario_id = $id_user");
                $mi_resena = $check_resena->fetch_assoc();
                ?>
                
                <form action="procesar_resena.php" method="POST" class="form-resena">
                    <div class="rating-selector">
                        <label for="calificacion">Calificación:</label>
                        <select name="calificacion" id="calificacion" required>
                            <!-- Si ya tiene reseña, marcamos su opción actual -->
                            <option value="5" <?php if($mi_resena && $mi_resena['calificacion'] == 5) echo 'selected'; ?>>⭐⭐⭐⭐⭐ (5/5)</option>
                            <option value="4" <?php if($mi_resena && $mi_resena['calificacion'] == 4) echo 'selected'; ?>>⭐⭐⭐⭐ (4/5)</option>
                            <option value="3" <?php if($mi_resena && $mi_resena['calificacion'] == 3) echo 'selected'; ?>>⭐⭐⭐ (3/5)</option>
                            <option value="2" <?php if($mi_resena && $mi_resena['calificacion'] == 2) echo 'selected'; ?>>⭐⭐ (2/5)</option>
                            <option value="1" <?php if($mi_resena && $mi_resena['calificacion'] == 1) echo 'selected'; ?>>⭐ (1/5)</option>
                        </select>
                    </div>
                    <!-- Rellenamos el textarea con su comentario previo (si existe) -->
                    <textarea name="comentario" placeholder="¿Qué te pareció el juego? Cuéntanos..." required><?php if($mi_resena) echo htmlspecialchars($mi_resena['comentario']); ?></textarea>
                    
                    <?php if($mi_resena): ?>
                        <button type="submit" class="btn-enviar-resena" style="background: linear-gradient(135deg, #7c4dff, #4527a0);">Actualizar mi Reseña</button>
                    <?php else: ?>
                        <button type="submit" class="btn-enviar-resena">Publicar Reseña</button>
                    <?php endif; ?>
                </form>

            <?php else: ?>
                <!-- Si no está logueado -->
                <div class="login-prompt">
                    <p>Debes iniciar sesión para dejar una reseña.</p>
                    <a href="login.php" class="nav-btn-login">Iniciar Sesión</a>
                </div>
            <?php endif; ?>

            <!-- Lista de Reseñas -->
            <div class="lista-resenas">
                <?php
                $sql_resenas = "SELECT r.calificacion, r.comentario, r.fecha, u.nombre, u.id AS user_id 
                                FROM resenas r 
                                JOIN usuarios u ON r.usuario_id = u.id 
                                ORDER BY r.fecha DESC";
                $resultado_resenas = $conn->query($sql_resenas);

                if ($resultado_resenas->num_rows > 0) {
                    while($resena = $resultado_resenas->fetch_assoc()) {
                        // Comprobar si esta reseña es del usuario actual usando su ID
                        $es_mi_resena = (isset($_SESSION['usuario_id']) && $resena['user_id'] == $_SESSION['usuario_id']);
                        
                        $clase_extra = $es_mi_resena ? ' mi-resena' : '';
                        
                        echo '<div class="resena-card' . $clase_extra . '">';
                        echo '<div class="resena-header">';
                        
                        if ($es_mi_resena) {
                            echo '<strong>' . htmlspecialchars($resena['nombre']) . ' <span style="font-size:0.6rem; color:#fff; background:#7c4dff; padding:2px 6px; border-radius:4px; margin-left:5px; vertical-align: middle;">TU RESEÑA</span></strong>';
                        } else {
                            echo '<strong>' . htmlspecialchars($resena['nombre']) . '</strong>';
                        }

                        echo '<span class="estrellas">';
                        for($i = 0; $i < $resena['calificacion']; $i++) echo '⭐';
                        echo '</span>';
                        echo '</div>';
                        echo '<p>' . htmlspecialchars($resena['comentario']) . '</p>';
                        echo '<span class="fecha-resena">' . date('d/m/Y', strtotime($resena['fecha'])) . '</span>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-resenas">Aún no hay reseñas. ¡Sé el primero en opinar!</p>';
                }
                ?>
            </div>
                        <!-- ... Aquí termina el bucle de las reseñas y el div de lista-resenas ... -->
            </div> <!-- Cierra lista-resenas -->

            <!-- NUEVO: PROMEDIO DE PUNTUACIÓN -->
            <?php
            $sql_promedio = "SELECT AVG(calificacion) AS promedio, COUNT(id) AS total FROM resenas";
            $resultado_promedio = $conn->query($sql_promedio);
            $datos_promedio = $resultado_promedio->fetch_assoc();
            
            $promedio = $datos_promedio['promedio'];
            $total = $datos_promedio['total'];
            
            // Redondeamos a 1 decimal (ej. 4.5)
            $promedio_formateado = number_format($promedio, 1);
            ?>

            <div class="promedio-seccion">
                <div class="promedio-numero"><?php echo $total > 0 ? $promedio_formateado : '0.0'; ?></div>
                <div class="promedio-info">
                    <div class="promedio-estrellas">
                        <?php 
                        if ($total > 0) {
                            // Mostramos estrellas llenas según el promedio redondeado
                            $estrellas_llenas = round($promedio);
                            for($i = 0; $i < 5; $i++) {
                                echo $i < $estrellas_llenas ? '⭐' : '☆';
                            }
                        } else {
                            echo '☆☆☆☆☆';
                        }
                        ?>
                    </div>
                    <p>Basado en <?php echo $total; ?> <?php echo $total == 1 ? 'reseña' : 'reseñas'; ?></p>
                </div>
            </div>

        </div> <!-- Cierra resenas-seccion -->
        </div>

    </div>

</div>

</body>
</html>