<?php $title = 'BEEWATCH - Login'; ?>

<?php ob_start(); ?>
    <form action="index.php?action=auth_New_Create" method="post">
    Nom d'utilisateur:<br>
    <input type="text" name="username" id="username" required><br>
    Mot de passe:<br>
    <input type="password" name="password" id="password" required><br>
    Adresse e-mail:<br>
    <input type="email" name="email" id="email" required><br>
    Prénom:<br>
    <input type="text" name="firstname"><br>
    Nom:<br>
    <input type="text" name="lastname">
    <br>
    <input type="submit" value="Submit">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>