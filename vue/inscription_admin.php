<?php ob_start(); ?>

<h1>Voir inscriptions</h1>

<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>