<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$accountManager = new AccountManager();

if (!empty($_GET['action'] == "Delete_Account")) {
  $deleteAccount = $accountManager->deleteAccount($_SESSION['id']);
  header('Location: index.php?action=auth_Verify_Disconnect');
} else {
  require('view/backend/user/account_management/accountDeleteView.php');
}

