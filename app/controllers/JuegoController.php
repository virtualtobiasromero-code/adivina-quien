<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

class JuegoController extends Controller
{
    public function menu(): void
    {
        $logueado  = $this->usuarioLogueado();
        $victorias = $logueado ? Usuario::victorias((int) $_SESSION['usuario_id']) : 0;

        $this->render('juego/menu', [
            'logueado'  => $logueado,
            'nombre'    => $logueado ? $_SESSION['usuario_nombre'] : '',
            'victorias' => $victorias,
        ]);
    }

    public function jugar(): void
    {
        $logueado = $this->usuarioLogueado();
        $this->render('juego/jugar', [
            'logueado' => $logueado,
            'nombre'   => $logueado ? $_SESSION['usuario_nombre'] : '',
        ]);
    }

    /** Endpoint AJAX: suma una victoria al usuario logueado. */
    public function guardarVictoria(): void
    {
        if (!$this->esPost())           $this->json(['ok' => false, 'msg' => 'Método no permitido.'], 405);
        if (!$this->usuarioLogueado())  $this->json(['ok' => false, 'msg' => 'No autenticado.'], 401);

        try {
            $total = Usuario::sumarVictoria((int) $_SESSION['usuario_id']);
            $this->json(['ok' => true, 'msg' => '¡Victoria guardada!', 'victorias' => $total]);
        } catch (Exception $e) {
            $this->json(['ok' => false, 'msg' => 'Error al guardar la victoria.'], 500);
        }
    }
}
