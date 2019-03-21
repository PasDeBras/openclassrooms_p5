<?php $title = 'BEEWATCH - Login'; ?>

<?php ob_start(); ?>
    <form>
    Nom d'utilisateur:<br>
    <input type="text" name="username" id="username" required><br>
    Mot de passe:<br>
    <input type="password" name="password" id="password" required><br>
    Repeter le mot de passe:<br>
    <input type="password" name="passwordcheck" id="passwordcheck" required><br>
    Adresse e-mail:<br>
    <input type="email" name="email" id="email" required><br>
    Prénom:<br>
    <input type="text" name="firstname"><br>
    Nom:<br>
    <input type="text" name="lastname">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>