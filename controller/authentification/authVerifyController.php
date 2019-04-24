<?php

function disconnectUser() {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    require_once('model/AccountManager.php');
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $retrieveAccount = $accountManager->retrieveAccount($_POST['email']);
    $retrievedAccount = $retrieveAccount->fetch();

    $passwordCheck = password_verify($_POST['password'], $retrievedAccount['password']);
    
    if (!$retrievedAccount['email']) {
        $context = 'errorMail';
    } elseif (!$passwordCheck) {
        $context = 'errorPassword';
    } elseif ($passwordCheck) {
        $_SESSION['id'] = $retrievedAccount['id'];
        $_SESSION['user_username'] = $retrievedAccount['username'];
        $_SESSION['user_email'] = $retrievedAccount['email'];
        $_SESSION['user_password'] = $retrievedAccount['password'];
        $_SESSION['user_surname'] = $retrievedAccount['surname'];
        $_SESSION['user_firstname'] = $retrievedAccount['firstname'];

        header('Location: index.php?action=auth_Verify_Cleared');
    } else {}
} else {
    $context = NULL;
}
require('view/frontend/authentification/authVerifyView.php');