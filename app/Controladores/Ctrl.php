<?php

namespace Controladores;

use Excecoes\HttpStatusException;

abstract class Ctrl
{
    protected function metodoHttp($metodo)
    {
        if (!in_array($_SERVER['REQUEST_METHOD'], (array) $metodo)) {
            $this->abortar(405);
        }
    }

    protected function redirecionar($uri) 
    {
        header("Location: {$uri}");
        $this->abortar(302);
    }

    protected function usuarioAutenticado()
    {
        if (!autenticado()) {
            flash('É preciso estar autenticado para acessar esta página');
            $this->redirecionar('/autenticacao');
        }
    }

    protected function usuarioAnonimo()
    {
        if (autenticado()) {
            $this->redirecionar('/');
        }
    }

    protected function abortar($statusHttp)
    {
        throw new HttpStatusException($statusHttp);
    }
}