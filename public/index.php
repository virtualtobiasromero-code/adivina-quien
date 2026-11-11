<?php
// CONTROLADOR FRONTAL: único punto de entrada. Ej: index.php?ruta=login
session_start();

require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/JuegoController.php';

// ruta => [Controlador, método]
$rutas = [
    'menu'             => ['JuegoController', 'menu'],
    'juego'            => ['JuegoController', 'jugar'],
    'guardar-victoria' => ['JuegoController', 'guardarVictoria'],
    'login'            => ['AuthController',  'login'],
    'registro'         => ['AuthController',  'registro'],
    'logout'           => ['AuthController',  'logout'],
];

$ruta = $_GET['ruta'] ?? 'menu';

if (!isset($rutas[$ruta])) {
    http_response_code(404);
    exit('Página no encontrada.');
}

[$clase, $metodo] = $rutas[$ruta];
(new $clase())->$metodo();
