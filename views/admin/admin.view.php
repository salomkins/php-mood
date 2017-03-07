<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
    </tr>

    <?php use function htmlspecialchars as e ?>

<?php foreach ($messages as $message) : ?>
  <tr>
      <td><?= e($message->name); ?></td>
      <td><?= e($message->email); ?></td>
      <td><?= e($message->message); ?></td>
  </tr>
<?php endforeach; ?>

</table>
