<?php renderizar('cabecalho'); ?>

<form action="/autenticacao" method="post">
  <fieldset>
    <legend>Login</legend>

    <p>
      <label for="form-usuario">Usuário</label><br>
      <input id="form-usuario" type="text" name="usuario" maxlength="20">
    </p>

    <p>
      <label for="form-senha">Senha</label><br>
      <input id="form-senha" type="password" name="senha" maxlength="20">
    </p>

    <button type="submit">Entrar</button>
  </fieldset>
</form>

<?php renderizar('rodape'); ?>