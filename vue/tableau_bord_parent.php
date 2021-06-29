<?php ob_start(); ?>

<h1>Erreur</h1>

<div class="alert alert-danger mt-4" role="alert">
  <h4 class="alert-heading">TABLEAU BORD PARENTS!!</h4>
  <hr>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>