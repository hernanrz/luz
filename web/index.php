<?php require dirname(__DIR__) . '/app/bootstrap.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Apagones</title>
  </head>
  <body>
    <form action="tweet.php" onsubmit="javascript:void(0)" method="get">
      <label for="state">Selecciona tu estado: </label>
      <select id="state" name="state">
      <?php foreach (array_keys(REGION_DATA) as $state): ?>
        <option value="<?= $state ?>"><?= $state ?></option>
      <?php endforeach; ?>
      </select>
      <button type="submit">Buscar</button>
    </form>
  </body>
</html>