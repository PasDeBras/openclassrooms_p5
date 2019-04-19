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
        session_start();
        $_SESSION['id'] = $retrievedAccount['id'];
        $_SESSION['user_username'] = $retrievedAccount['username'];
        $_SESSION['user_email'] = $retrievedAccount['email'];
        $_SESSION['user_password'] = $retrievedAccount['password'];
        $_SESSION['user_surname'] = $retrievedAccount['surname'];
        $_SESSION['user_firstname'] = $retrievedAccount['firstname'];

        header('Location: index.php?action=auth_Verify_Cleared');
    };
}

function verifyStoredCredentials() {
    if ($_SESSION['id']) {
        $accountManager = new OpenClassrooms\P5\Model\AccountManager();
        $retrieveAccountPassword = $accountManager->retrieveAccountPassword($_SESSION['id']);
        $retrievedAccountPassword = $retrieveAccountPassword->fetch();
    } else {
        throw new Exception('ID du compte non-renseigné');
    }
    
}

function disconnectUser() {
    session_destroy();
    header('index.php');
}