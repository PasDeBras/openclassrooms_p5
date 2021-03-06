<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

function disconnectUser() {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    require_once('model/AccountManager.php');
    $accountManager = new AccountManager();
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
        $_SESSION['user_friendlist'] ="";
 
        $friendshipLinksManager = new FriendshiplinksManager();
        $readFriendshipLinks = $friendshipLinksManager->readFriendshipLinks($_SESSION['id']);
        
        while ($friend = $readFriendshipLinks->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user_friendlist'] .="<friend>" . $friend['accountid'] . "</friend>";
        }  
        header('Location: index.php?action=auth_Verify_Cleared');
    } else {}
} elseif (!empty($_GET['account_Created']) == 1) {
    $context = 'accountCreated';
} else {
    $context = NULL;
}
require('view/frontend/authentification/authVerifyView.php');