<?php 
$title = 'BEEWATCH- Mon compte'; ?>

<?php ob_start(); ?>
<div id="accountViewDiv_container"></div>
<div id="accountViewDiv">
    <p><?= $_SESSION['user_surname']?> <?= $_SESSION['user_firstname']?></p><br/>
    <div id="accountViewDiv_linksContainer">
        <a href="index.php?action=user_Account_Change_Password">Modifier mon mot de passe</a>
        <a href="index.php?action=user_Account_Deletion">Supprimer mon compte</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>