<?php

namespace Controladores;

use Modelos\Repositorio;

class TicketsCtrl extends Ctrl
{
    public function __construct()
    {
        $this->usuarioAutenticado();
    }

    public function index()
    {
        $this->metodoHttp('GET');

        $tickets = Repositorio::listarTickets();
        return renderizar('tickets/index', compact('tickets'));
    }

    public function detalhes($id)
    {
        $this->metodoHttp('GET');

        $ticket = Repositorio::listarTickets($id);

        if (!$ticket) {
            $this->abortar(404);
        }

        return renderizar('tickets/detalhes', compact('ticket'));
    }
}