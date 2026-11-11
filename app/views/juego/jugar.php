<?php /** VISTA: pantalla de juego. Recibe $logueado y $nombre del controlador. */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina Quien Soy - Vs La Computadora (juego)</title>
    <link rel="icon" href="<?= asset('img/icono.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('css/juego.css') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <!-- HUD del jugador -->
    <div class="hud-jugador">
        <?php if ($logueado): ?>
            <span>🎮 <?= e($nombre) ?></span>
            <a href="<?= url('logout') ?>">Salir</a>
        <?php else: ?>
            <span>Jugando como invitado</span>
            <a href="<?= url('login') ?>">Iniciar sesión</a>
        <?php endif; ?>
        <a href="<?= url('menu') ?>">🏠 Menú</a>
    </div>

    <!--  SECCIÓN 1  => ENCABEZADO: INTERACCIÓN CON EL BOT-->
    <section>
        <div 
        id="bot" 
        class="contenedor"
        >

    </div>
</section>

    <!--  SECCIÓN 2  => GRILLA DE PERSONAJES: DESCARTES Y APARIENCIAS-->
    <section>
    <div
     id="cuadrilla"
    >
    
    </div>
</section>

    <!--  SECCIÓN 3 => PREGUNTAS: CONSULTAS PREDETERMINADAS-->
    <section>
        <div 
        id="preguntas"
        >

    </div>
</section>

<!-- Modal de victoria -->
<div id="modal-victoria">
    <div class="modal-box">
        <h2>🎉 ¡Ganaste!</h2>
        <p id="modal-msg">Adivinaste el personaje de la máquina.</p>
        <span id="modal-victorias" class="victorias-count"></span>
        <div class="modal-btns">
            <button class="btn-reiniciar" onclick="location.reload()">Jugar de nuevo</button>
            <a href="<?= url('menu') ?>" class="btn-menu">Ir al menú</a>
            <?php if (!$logueado): ?>
            <a href="<?= url('registro') ?>" class="btn-login-modal">Registrarse y guardar 🏆</a>
            <?php endif; ?>
        </div>
    </div>
</div>

    <!-- Datos que el controlador le pasa al JavaScript -->
    <script>
        const USUARIO_LOGUEADO     = <?= $logueado ? 'true' : 'false' ?>;
        const USUARIO_NOMBRE       = <?= json_encode($nombre) ?>;
        const URL_GUARDAR_VICTORIA = <?= json_encode(url('guardar-victoria')) ?>;
        const IMG_URL              = <?= json_encode(asset('img/')) ?>;
    </script>
    <script src="<?= asset('js/juego.js') ?>"></script>
</body>
</html>
