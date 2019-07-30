<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$accountManager = new AccountManager(); 

$context= NULL;
$listOfAccounts = $accountManager->readAllAccounts();

require('view/backend/user/account_management/membersListView.php');