<?php

namespace Controladores;

class AutenticacaoCtrl extends Ctrl
{
    public function index()
    {
        $this->metodoHttp(['GET', 'POST']);
        $this->usuarioAnonimo();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return renderizar('autenticacao/index');
        }

        if (empty($_POST['usuario']) || empty($_POST['senha'])) {
            flash('O preenchimento dos campos é obrigatório');
            $this->redirecionar('/autenticacao');
        }

        if ($_POST['usuario'] != AUTENTICACAO_USUARIO || $_POST['senha'] != AUTENTICACAO_SENHA) {
            flash('Usuário/senha inválido(s)');
            $this->redirecionar('/autenticacao');
        }

        $_SESSION['autenticado'] = 1;
        $this->redirecionar('/');
    }

    public function sair()
    {
        $this->usuarioAutenticado();
        
        unset($_SESSION['autenticado']);
        flash('Até a próxima, usuário');
        $this->redirecionar('/autenticacao');
    }
}