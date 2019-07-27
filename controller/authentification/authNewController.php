<?php
function classLoader($class)
{
    require_once $class . '.php';
}
spl_autoload_register('classLoader');

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
    require_once('model/AccountManager.php');
    $accountManager = new AccountManager();
    $isAccountAvailable = $accountManager->retrieveAccount($_POST['email']);
    $accountAvailablility = $isAccountAvailable->fetch();
    
    if (!$accountAvailablility['email']) {
        if (!$accountAvailablility['username']) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $accountManager->insertAccount($_POST['username'], $hashedPassword, $_POST['email'], $_POST['firstname'], $_POST['lastname']);
            $context = 'accountCreated';
            header('Location: index.php?action=auth_Verify');
            
        } else {
            $context = 'existingUser';
        }
    } else {
        $context = 'existingEmail';
    }
    
} else {
    $context = NULL;
}

require('view/frontend/authentification/authNewView.php');