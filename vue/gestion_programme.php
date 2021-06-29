<?php ob_start(); ?>

<h1>Erreur</h1>

<div class="alert alert-danger mt-4" role="alert">
  <h4 class="alert-heading">gestion programmes (ADMINISTRATEUR)</h4>
  <hr>
  <p><?=$msgErreur?></p>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>