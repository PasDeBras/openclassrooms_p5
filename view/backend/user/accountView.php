<?php 
$title = 'BEEWATCH- Mon compte'; ?>

<?php ob_start(); ?>
<p>Bienvenue, <?= $_SESSION['user_surname']?> <?= $_SESSION['user_firstname']?>.</p><br/>
<a href="index.php?action=user_Account_Change_Password">Modifier mon mot de passe</a>
<a href="index.php?action=">Supprimer mon compte</a>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>