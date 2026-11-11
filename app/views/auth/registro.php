<?php /** VISTA: registro. Recibe $error, $exito, $nombre y $email del controlador. */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Adivina el Personaje</title>
    <link rel="icon" href="<?= asset('img/icono.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('css/auth.css') ?>">
</head>
<body>
    <div class="card">
        <h1>🎭 Crear cuenta</h1>
        <p class="subtitle">Registrate para guardar tus victorias</p>

        <?php if ($error): ?><div class="alert alert-error"><?= e($error) ?></div><?php endif; ?>
        <?php if ($exito): ?><div class="alert alert-success"><?= e($exito) ?></div><?php endif; ?>

        <?php if (!$exito): ?>
        <form method="POST" action="<?= url('registro') ?>" novalidate>
            <div class="form-group">
                <label for="nombre">Nombre de usuario</label>
                <input id="nombre" type="text" name="nombre" value="<?= e($nombre) ?>" placeholder="ej: jugador123" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="<?= e($email) ?>" placeholder="tu@email.com" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Mínimo 6 caracteres" required>
            </div>
            <div class="form-group">
                <label for="confirm">Confirmar contraseña</label>
                <input id="confirm" type="password" name="confirm" placeholder="Repetí tu contraseña" required>
            </div>
            <button type="submit" class="btn-primary">Crear cuenta</button>
        </form>
        <?php endif; ?>

        <div class="links">
            ¿Ya tenés cuenta? <a href="<?= url('login') ?>">Iniciar sesión</a>
            &nbsp;·&nbsp;
            <a href="<?= url('menu') ?>">Volver al menú</a>
        </div>
    </div>
</body>
</html>
