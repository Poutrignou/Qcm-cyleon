<?php

(!isset($title) ? $title = "" : $title = $title);
(!isset($description) ? $description = "" : $description = $description);
(!isset($otherMeta) ? $otherMeta = "" : $otherMeta = $otherMeta);
(!isset($content) ? $content = "" : $content = $content);
$basePath = "http://http://localhost/Qcm-cyleon/public/"
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?= $description ?>">

      <script src="<?= $basePath ?>script/script.js" defer></script>
      <?= $otherMeta ?>
      <link rel="stylesheet" href="<?= $basePath ?>css/style.css">
      
      <title><?= $title ?></title>
   </head>
   <body>
      <?php require('../app/Utils/header.php'); ?>
      <?= $content ?>
      <?php require('../app/Utils/footer.php'); ?>
   </body>
</html>