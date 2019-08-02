<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

require('view/backend/user/account_management/passwordChangeView.php');

$accountManager = new AccountManager();

if (!empty($_GET['action'] == "Change_Password") && !empty($_POST['password'])) {
  $password = htmlspecialchars($_POST['password']);
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $changePassword = $accountManager->changeAccountPassword($_SESSION['id'], $hashedPassword);
  require('view/backend/user/account_management/passwordChangeView.php?action=user_Account_Inbox');
} else {
  require('view/backend/user/account_management/passwordChangeView.php');
}