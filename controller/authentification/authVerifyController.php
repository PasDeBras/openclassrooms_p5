<?php
require('view/frontend/authentification/authVerifyView.php');
require_once('model/AccountManager.php');

function verifyCredentials($enteredEmail, $enteredPassword) {
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $retrieveAccount = $accountManager->retrieveAccount($enteredEmail);
    $retrievedAccount = $retrieveAccount->fetch();
    
    if (!$retrievedAccount['email']) {
        echo 'email non reconnu';
    } elseif ($retrievedAccount['password'] != $enteredPassword) {
        echo 'mauvais mot de passe';
    } else {
        echo 'loggé';
    };
}