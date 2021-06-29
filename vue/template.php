<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=getChemin()?>/public/style/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=getChemin()?>/public/style/main.css" />
    <title>Camp de jour des nerds</title>
  </head>

  <body>
    <?php require('vue/navbar.php') ?>

    <div class="container">
      <?= $contenu ?>
    </div>

    <?php require('vue/footer.php') ?>
    <script src="<?=getChemin()?>/public/javascript/jquery-3.6.0.min.js"></script>
    <script src="<?=getChemin()?>/public/javascript/bootstrap.bundle.min.js"></script>
    <script src="<?=getChemin()?>/public/javascript/javaScript.js"></script>
  </body>
</html>
