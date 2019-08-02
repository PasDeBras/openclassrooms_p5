<?php $title = 'BEEWATCH - Changer mon MDP'; ?>

<?php ob_start(); ?>
    <form id="passwordChangeForm" action="index.php?action=Change_Password" method="post">
    <div id="passwordChangeForm_typable">
        <p id="passwordChangeForm_typable_left">Nouveau mot de passe:</p>
        <input id="passwordChangeForm_typable_right" type="password" name="password" id="password" required>
    </div>
    
    <input id="passwordChangeForm_inputBtn" type="submit" value="Confirmer">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>