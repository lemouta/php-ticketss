<?php

namespace Excecoes;

class HttpStatusException extends \Exception 
{
    public function __construct($codigo)
    {
        parent::__construct(null, $codigo);
    }
}