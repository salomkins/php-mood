<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
    </tr>

<?php

krsort($messages);
foreach ($messages as $message) { ?>
  <tr>
      <td><?= $message->name; ?></td>
      <td><?= $message->email; ?></td>
      <td><?= $message->message; ?></td>
  </tr>
<?php }

?>



</table>
