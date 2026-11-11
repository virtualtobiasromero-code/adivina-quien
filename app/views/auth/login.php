<?php /** VISTA: login. Recibe $error y $nombre del controlador. */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Adivina el Personaje</title>
    <link rel="icon" href="<?= asset('img/icono.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('css/auth.css') ?>">
</head>
<body>
    <div class="card">
        <h1>🔑 Iniciar sesión</h1>
        <p class="subtitle">Ingresá tu cuenta para guardar victorias</p>

        <?php if ($error): ?><div class="alert alert-error"><?= e($error) ?></div><?php endif; ?>

        <form method="POST" action="<?= url('login') ?>" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre de usuario</label>
                <input id="nombre" type="text" name="nombre" value="<?= e($nombre) ?>" placeholder="Tu usuario" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Tu contraseña" required>
            </div>
            <button type="submit" class="btn-primary">Entrar al juego</button>
        </form>

        <div class="links">
            ¿No tenés cuenta? <a href="<?= url('registro') ?>">Registrarse</a>
            &nbsp;·&nbsp;
            <a href="<?= url('menu') ?>">Volver al menú</a>
        </div>
    </div>
</body>
</html>
