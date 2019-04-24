<?php

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
    require_once('model/AccountManager.php');
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $isAccountAvailable = $accountManager->retrieveAccount($_POST['email']);
    $accountAvailablility = $isAccountAvailable->fetch();
    
    if (!$accountAvailablility['email']) {
        if (!$accountAvailablility['username']) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $accountManager->insertAccount($_POST['username'], $hashedPassword, $_POST['email'], $_POST['firstname'], $_POST['lastname']);
            $context = 'accountCreated';
        } else {
            $context = 'existingEmail';
        }
    } else {
        $context = 'existingUser';
    }
    
} else {
    $context = NULL;
}

require('view/frontend/authentification/authNewView.php');