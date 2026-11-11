<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController extends Controller
{
    public function login(): void
    {
        if ($this->usuarioLogueado()) redirigir('menu');

        $error = '';
        if ($this->esPost()) {
            $nombre   = trim($_POST['nombre']   ?? '');
            $password = trim($_POST['password'] ?? '');

            if ($nombre === '' || $password === '') {
                $error = 'Por favor, completá todos los campos.';
            } elseif ($user = Usuario::verificarCredenciales($nombre, $password)) {
                session_regenerate_id(true);
                $_SESSION['usuario_id']     = $user['id'];
                $_SESSION['usuario_nombre'] = $user['nombre'];
                redirigir('menu');
            } else {
                $error = 'Nombre de usuario o contraseña incorrectos.';
            }
        }
        $this->render('auth/login', ['error' => $error, 'nombre' => $_POST['nombre'] ?? '']);
    }

    public function registro(): void
    {
        if ($this->usuarioLogueado()) redirigir('menu');

        $error = $exito = '';
        if ($this->esPost()) {
            $nombre   = trim($_POST['nombre']   ?? '');
            $email    = trim($_POST['email']    ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirm  = trim($_POST['confirm']  ?? '');

            if ($nombre === '' || $email === '' || $password === '' || $confirm === '') {
                $error = 'Por favor, completá todos los campos.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'El correo electrónico no es válido.';
            } elseif (strlen($password) < 6) {
                $error = 'La contraseña debe tener al menos 6 caracteres.';
            } elseif ($password !== $confirm) {
                $error = 'Las contraseñas no coinciden.';
            } elseif (Usuario::existe($nombre, $email)) {
                $error = 'El nombre de usuario o el correo ya están registrados.';
            } else {
                Usuario::crear($nombre, $email, $password);
                $exito = '¡Cuenta creada con éxito! Ya podés iniciar sesión.';
            }
        }
        $this->render('auth/registro', [
            'error'  => $error,
            'exito'  => $exito,
            'nombre' => $_POST['nombre'] ?? '',
            'email'  => $_POST['email']  ?? '',
        ]);
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }
        session_destroy();
        redirigir('menu');
    }
}
