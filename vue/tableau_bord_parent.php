<?php ob_start(); ?>

<h1>TABLEAU BORD PARENTS!!</h1>

<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>