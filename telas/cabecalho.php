<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP-TICKETSS</title>
</head>
<body>
  <h1>PHP-TICKETSS</h1>

  <hr>

  <?php if (autenticado()): ?>
    <p>Olá, usuário! &bull; <a href="/autenticacao/sair">Sair</a></p>
  <?php endif; ?>
  
  <?php if (flash()): ?>
    <h3><?= flash(); ?></h3>
  <?php endif; ?>