<?php renderizar('cabecalho'); ?>

<table border="1" cellpadding="5" cellspacing="0" width="60%">
  <caption>Visualização de Ticket</caption>
  <tbody>
    <tr>
      <th>Ticket:</th> 
      <td><?= $ticket->getId(); ?></td>
    </tr>
    <tr>
      <th>Status:</th> 
      <td><?= $ticket->getStatus(); ?></td>
    </tr>
    <tr>
      <th>Data:</th> 
      <td><?= $ticket->getData('d/m/Y H:i:s'); ?></td>
    </tr>
    <tr>
      <th>Título:</th> 
      <td><?= $ticket->getTitulo(); ?></td>
    </tr>
    <tr>
      <td colspan="2"><a href="/tickets">Retornar</a></td>
    </tr>
  </tbody>
</table>

<?php renderizar('rodape'); ?>