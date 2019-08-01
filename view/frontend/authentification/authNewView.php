<?php $title = 'BEEWATCH - Login'; ?>

<?php
ob_start();
if ($context == NULL || $context == 'existingEmail' || $context == 'existingUser') {?>
<div id="newAccountView_div">
    <form action="index.php?action=auth_New_Create" method="post">
        <h1>Creer mon compte</h2>

        Nom d'utilisateur:<br>
        <input type="text" name="username" id="username" required><?php if ($context == 'existingUser'){?>Nom d'utilisateur déja existant.<?php } ?><br>
        Mot de passe:<br>
        <input type="password" name="password" id="password" required><br>
        Entrez à nouveau le mot de passe:<br>
        <input type="password" id="password_confirmation" required><br>
        Adresse e-mail:<br>
        <input type="email" name="email" id="email" required><?php if ($context == 'existingEmail'){?>Email déja existant.<?php } ?><br>
        Prénom:<br>
        <input type="text" name="firstname"><br>
        Nom:<br>
        <input type="text" name="lastname">
        <br>
        <input id="AccountView_submitBtn" type="submit" value="Submit" onclick="return passwordValidator()">
    </form>
</div>

<?php
} elseif ($context == 'accountCreated') {?>
    <p>Compte créé.</p>
<?php
}

$content = ob_get_clean();

require('view/frontend/template.php'); ?>