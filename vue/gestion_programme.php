<?php ob_start(); ?>

<h1>Gestion des programmes</h1>

<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>