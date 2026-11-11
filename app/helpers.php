<?php
// Funciones de ayuda disponibles en controladores y vistas

/** Escapa texto para imprimirlo en HTML. */
function e(?string $texto): string
{
    return htmlspecialchars($texto ?? '', ENT_QUOTES, 'UTF-8');
}

/** URL base de la carpeta public/ (funciona en cualquier subcarpeta de WAMP). */
function base_url(): string
{
    return rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
}

/** URL a una ruta del sistema: url('login') => /.../index.php?ruta=login */
function url(string $ruta): string
{
    return base_url() . '/index.php?ruta=' . urlencode($ruta);
}

/** URL a un archivo dentro de public/assets/. */
function asset(string $archivo): string
{
    return base_url() . '/assets/' . ltrim($archivo, '/');
}

function redirigir(string $ruta): never
{
    header('Location: ' . url($ruta));
    exit;
}
