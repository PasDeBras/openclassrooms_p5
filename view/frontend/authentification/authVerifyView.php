<?php $title = 'BEEWATCH - Login'; ?>

<?php ob_start(); ?>
    <form action="index.php?action=auth_Verify_Login" method="post">
    Adresse e-mail:<br>
    <input type="email" name="email" id="email" required><br>
    Mot de passe:<br>
    <input type="password" name="password" id="password" required><br>
    <br>
    <input type="submit" value="Submit">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>