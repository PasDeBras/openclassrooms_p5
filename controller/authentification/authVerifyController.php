<?php

require_once('model/AccountManager.php');
function login() {
    require('view/frontend/authentification/authVerifyView.php');
}

function verifyCredentials($enteredEmail, $enteredPassword) {
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $retrieveAccount = $accountManager->retrieveAccount($enteredEmail);
    $retrievedAccount = $retrieveAccount->fetch();

    $passwordCheck = password_verify($enteredPassword, $retrievedAccount['password']);
    
    if (!$retrievedAccount['email']) {
        echo 'email non reconnu';
    } elseif (!$passwordCheck) {
        echo 'mauvais mot de passe';
    } elseif ($passwordCheck) {
        $_SESSION['id'] = $retrievedAccount['id'];
        $_SESSION['user_username'] = $retrievedAccount['username'];
        $_SESSION['user_email'] = $retrievedAccount['email'];
        $_SESSION['user_password'] = $retrievedAccount['password'];
        $_SESSION['user_surname'] = $retrievedAccount['surname'];
        $_SESSION['user_firstname'] = $retrievedAccount['firstname'];

        header('Location: index.php?action=auth_Verify_Cleared');
    } else {
        echo 'Erreur';
    };
}

function disconnectUser() {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}