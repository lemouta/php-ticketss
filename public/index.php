<?php

define('REQID', rand(100, 999).time());
define('RAIZ', __DIR__.'/..');

define('INDEX_CTRL', 'tickets');

define('AUTENTICACAO_USUARIO', 'admin');
define('AUTENTICACAO_SENHA', '12345');

require_once(RAIZ.'/utils/funcoes.php');

// Registrando função para tratar erros e exceções não esperados
$trataErro = function ($err, $msg, $arq, $linha, $contexto = null) {
    http_response_code(500);
    
    echo "<b style=\"color: red\">ERRO: {$err} {$msg} {$arq}:{$linha}</b><br>";
    if ($contexto) {
        echo '<pre>'.print_r($contexto, true).'</pre>';
    }
};
set_error_handler($trataErro);
set_exception_handler(function ($e) use ($trataErro) {
    return $trataErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
});

// Autoloading
spl_autoload_register(function ($namespaceClasse) {
    $caminhoClasse = RAIZ.'/app/'.str_replace('\\', '/', $namespaceClasse).'.php';
    require_once($caminhoClasse);
});

session_start();

// Verificação da classe e método a serem invocados
$uri = parse_url($_SERVER['REQUEST_URI']);

$segmentos = $uri['path'] == '/'
    ? [INDEX_CTRL]
    : explode('/', trim($uri['path'], '/'));

if (empty($segmentos[1])) {
    $segmentos[1] = 'index';
}

$controlador = '\\Controladores\\'.ucfirst($segmentos[0]).'Ctrl';
$acao = strtolower($segmentos[1]);

try {
    $ctrl = new $controlador();
    
    if (method_exists($ctrl, $acao)) {
        call_user_func_array([$ctrl, $acao], array_slice($segmentos, 2));
    } else {
        http_response_code(404);
    }
} catch (\Excecoes\HttpStatusException $e) {
    http_response_code($e->getCode());
}

// Limpando mensagem flash de requisição anterior
if (!empty($_SESSION['flash_mensagem']) && $_SESSION['flash_reqid'] != REQID) {
    unset($_SESSION['flash_mensagem'], $_SESSION['flash_reqid']);
}
