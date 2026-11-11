<?php
// Controlador base: sesión y renderizado de vistas
abstract class Controller
{
    protected function render(string $vista, array $datos = []): void
    {
        extract($datos, EXTR_SKIP);
        require __DIR__ . '/../views/' . $vista . '.php';
    }

    protected function usuarioLogueado(): bool
    {
        return isset($_SESSION['usuario_id']);
    }

    protected function esPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function json(array $datos, int $codigo = 200): never
    {
        http_response_code($codigo);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($datos);
        exit;
    }
}
