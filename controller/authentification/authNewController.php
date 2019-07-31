<?php
function classLoader($class)
{
    require_once $class . '.php';
}
spl_autoload_register('classLoader');

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
    require_once('model/AccountManager.php');

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);

    $accountManager = new AccountManager();
    $isAccountAvailable = $accountManager->retrieveAccount($email);
    $accountAvailablility = $isAccountAvailable->fetch();
    
    if (!$accountAvailablility['email']) {
        if (!$accountAvailablility['username']) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $accountManager->insertAccount($username, $hashedPassword, $email, $firstname, $lastname);
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