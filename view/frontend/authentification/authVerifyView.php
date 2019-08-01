<?php $title = 'BEEWATCH - Login'; ?>

<?php ob_start(); ?>
<div id="verifyAccountView_div">
    <form action="index.php?action=auth_Verify_Login" method="post">
        <?php if ($context == 'accountCreated'){?>Compte créé avec succès.<?php } ?><br>
        Adresse e-mail:<br>
        <input type="email" name="email" id="email" required><?php if ($context == 'errorMail'){?>L'adresse e-mail saisie n'a pas été reconnue.<?php } ?><br>
        Mot de passe:<br>
        <input type="password" name="password" id="password" required><?php if ($context == 'errorPassword'){?>Le mot de passe saisi est incorrect.<?php } ?><br>
        <br>
        <input id="AccountView_submitBtn" type="submit" value="Submit">
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>