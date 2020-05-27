<?php

namespace Modelos;

class Ticket 
{
    private $id;
    private $data;
    private $status;
    private $titulo;

    public function __construct($id, $data, Status $status, $titulo)
    {
        $this->id = $id;
        $this->data = $data;
        $this->status = $status;
        $this->titulo = $titulo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getData($formato = null)
    {
        return $formato ? date($formato, $this->data) : $this->data;
    }

    public function getStatus($descricao = true)
    {
        return $descricao ? $this->status->getDescricao() : $this->status;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
}