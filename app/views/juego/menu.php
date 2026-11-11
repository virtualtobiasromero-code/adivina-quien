<?php /** VISTA: menú principal. Recibe $logueado, $nombre y $victorias del controlador (sin consultar la BD). */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina el Personaje - Vs La Computadora</title>
    <link rel="icon" href="<?= asset('img/icono.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('css/menu.css') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adivina Quién Soy - VS La Máquina. El clásico ¿Quién es Quién? en tu navegador.">
</head>
<body>

    <!-- Panel de sesión (esquina superior derecha) -->
    <div class="panel-sesion">
        <?php if ($logueado): ?>
            <span class="victorias-badge">🏆 <?= (int) $victorias ?> victorias</span>
            <span class="saludo">¡Hola, <?= e($nombre) ?>!</span>
            <a href="<?= url('logout') ?>" class="btn-sesion btn-logout">Cerrar sesión</a>
        <?php else: ?>
            <a href="<?= url('login') ?>"    class="btn-sesion btn-login">Iniciar sesión</a>
            <a href="<?= url('registro') ?>" class="btn-sesion btn-registro">Registrarse</a>
        <?php endif; ?>
    </div>

    <!-- Texto de presentación -->
    <section class="texto">
        <h1>Adivina el Personaje</h1>
        <p>Bienvenido a "Adivina el Personaje", en donde tu objetivo sera adivinar el personaje en que esta pensando la maquina por medio de preguntas y descartes
            <br>¡Has clic en el siguiente boton para iniciar a jugar!
        </p>
    </section>

    <!-- Botón "Jugar" -->
    <div>
        <a href="<?= url('juego') ?>">
            <button><img src="<?= asset('img/jugar.png') ?>" alt="Jugar"></button>
        </a>
    </div>

    <!-- Botón "Cómo jugar" -->
    <div>
        <button type="button" id="btn-como-jugar" class="btn-como-jugar">❓ Cómo jugar</button>
    </div>

    <!-- Ventana con las explicaciones del juego -->
    <div id="modal-como-jugar" class="modal-ayuda" role="dialog" aria-modal="true" aria-labelledby="titulo-ayuda">
        <div class="modal-ayuda-caja">
            <h2 id="titulo-ayuda">¿Cómo se juega?</h2>
            <div class="ayuda-contenido">
                <p><strong>🎯 Objetivo:</strong> la máquina eligió en secreto a uno de los 16 personajes. ¡Tenés que descubrir cuál es!</p>
                <ol>
                    <li><strong>Hacé preguntas:</strong> en la parte de abajo de la pantalla están las preguntas. Hacé <em>clic</em> sobre una y la máquina te responderá <b>Si</b> o <b>No</b>. Las preguntas ya respondidas cambian de color.</li>
                    <li><strong>Descartá personajes:</strong> en la grilla, arrastrá la pieza verde de arriba de un personaje hasta la caja celeste de abajo. El personaje se pondrá en blanco y negro. ¿Te equivocaste? Arrastrá la pieza de vuelta arriba.</li>
                    <li><strong>Adiviná:</strong> cuando creas saber quién es, arrastrá la foto del personaje hasta la caja de arriba de todo (la de la máquina).</li>
                </ol>
                <p>Si acertás, ¡ganás la partida! Si no, la máquina te avisará y podrás seguir intentando.</p>
                <p><strong>🏆 Victorias:</strong> iniciá sesión o registrate para que se guarden tus victorias.</p>
            </div>
            <button type="button" id="btn-cerrar-ayuda" class="btn-cerrar-ayuda">¡Entendido!</button>
        </div>
    </div>

    <div>
        <p class="derechos">
            <a href="https://patreon.com/adivina_quien_soy?utm_medium=unknown&utm_source=join_link&utm_campaign=creatorshare_creator&utm_content=copyLink">Noticias y Membresías (Donar)</a><br>
            <a href="<?= asset('derechos-legales.txt') ?>">&copy;2025 Grupo C16</a>
        </p>
    </div>

    <script>
        (function () {
            var modal  = document.getElementById('modal-como-jugar');
            var abrir  = document.getElementById('btn-como-jugar');
            var cerrar = document.getElementById('btn-cerrar-ayuda');
            function mostrar() { modal.classList.add('activo'); cerrar.focus(); }
            function ocultar() { modal.classList.remove('activo'); abrir.focus(); }
            abrir.addEventListener('click', mostrar);
            cerrar.addEventListener('click', ocultar);
            modal.addEventListener('click', function (e) { if (e.target === modal) ocultar(); });
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && modal.classList.contains('activo')) ocultar(); });
        })();
    </script>
</body>
</html>
<!--©2025 | C16-->
