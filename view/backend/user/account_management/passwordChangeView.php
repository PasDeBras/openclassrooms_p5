<?php $title = 'BEEWATCH - Changer mon MDP'; ?>

<?php ob_start(); ?>
    <form action="index.php?action=Change_Password" method="post">
    Nouveau mot de passe:<br>
    <input type="password" name="password" id="password" required><br>
    <br>
    <input type="submit" value="Submit">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>