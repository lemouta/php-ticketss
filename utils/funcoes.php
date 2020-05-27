<?php

function renderizar($caminho, array $contexto = []) {
    extract($contexto);
    require_once(RAIZ."/telas/{$caminho}.php");
}

function autenticado() {
    return !empty($_SESSION['autenticado']);
}

function flash($mensagem = null) {
    if (!$mensagem) {
        return !empty($_SESSION['flash_mensagem'])
            ? $_SESSION['flash_mensagem']
            : '';
    }

    $_SESSION['flash_mensagem'] = $mensagem;
    $_SESSION['flash_reqid'] = REQID;
}