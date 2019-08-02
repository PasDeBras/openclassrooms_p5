<?php $title = 'BEEWATCH - Supprimer mon compte'; ?>

<?php ob_start(); ?>
    <form id="deleteAccountForm"  action="index.php?action=Delete_Account" method="post">
    <p>Etes vous sur de vouloir supprimer ce compte ?</p>
    <input id="deleteAccountForm_inputBtn" type="submit" value="Confirmer">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>