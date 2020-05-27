<?php renderizar('cabecalho'); ?>

<table border="1" cellpadding="5" cellspacing="0" width="60%">
  <caption>Tickets</caption>
  <thead>
    <tr>
      <th></th>
      <th>Ticket</th>
      <th>Status</th>
      <th>Data</th>
      <th>Título</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tickets as $ticket): ?>
      <tr>
        <td><a href="/tickets/detalhes/<?= $ticket->getId(); ?>">Visualizar</a></td>
        <td><?= $ticket->getId(); ?></td>
        <td><?= $ticket->getStatus(); ?></td>
        <td><?= $ticket->getData('d/m/Y H:i:s'); ?></td>
        <td><?= $ticket->getTitulo(); ?></td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$tickets): ?>
      <tr>
        <td colspan="5">Nenhum ticket encontrado</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php renderizar('rodape'); ?>